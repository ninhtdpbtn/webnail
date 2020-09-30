<?php
namespace App\Http\Controllers\Product;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\CategoryProduct;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function listProduct()
    {
        $pro = Product::join('category_product','category_product.id','=','product.id_category')
            ->where('product.status',1)
            ->paginate(7);
        return view('admin.product.list',compact('pro'));
    }

    public function addProduct()
    {
        $data = CategoryProduct::get();
        return view('admin.product.add',compact('data'));
    }

    public function saveProduct(Request $request)
    {
        $request->validate(
            [
                'name_product' => 'required|min:3|max:60|unique:product,name_product',
                'price' => 'required|numeric',
                'image' => 'required|image',
                'description' => 'required|min:5|max:1000|',
            ],
            ['   name_product.unique' => 'Tên sản phẩm đã tồn tại',
                'name_product.required' => "Hãy nhập name",
                'name_product.min' => "Tên sản phẩm không được dưới 3 ký tự",
                'name_product.max' => "Tên sản phẩm không được vượt quá 60 ký tự",
                'price.required' => "Hãy nhập price",
                'price.numeric' => "Giá sản phẩm phải là số",
                'image.required' => "Hãy nhập image",
                'image.image' => "Định dạng ảnh không phải (jpeg, png, bmp, gif, or svg)",
                'description.required' => "Hãy nhập description",
                'description.min' => "Mô tả sản phẩm không được dưới 5 ký tự",
                'description.max' => "Mô tả sản phẩm không được vượt quá 1000 ký tự ",

            ]
        );
        $data = array_merge($request->all(),[
            'status' => 1,
            'slug' => ''
        ]);
        unset($data['_token']);

        $file = $request->file('image');
        $destinationPath = 'uploads';
        $file->move($destinationPath, $file->getClientOriginalName());
        $link_img = '/uploads/' . $file->getClientOriginalName();
        $data['image'] = $link_img;

        $id_product = Product::insertGetId($data);
        Product::update(['slug'=>Str::slug($request->name_product.$id_product,'-'),]);
        return redirect()->route('listProduct')->with('mess', 'Thêm thành công');
    }

    public function editProduct($id)
    {
        $data = CategoryProduct::get();
        $pro = Product::where('id_product',$id)->first();
        return view('admin.product.edit', compact('data','pro'));
    }

    public function updateProduct(Request $request, $id)
    {
        $request->validate(
            [
                'name_product' =>
                    [
                        'required','min:5','max:60',
                        Rule::unique('product')->ignore($request->id,'id_product'),
                    ],
                'price' => 'required|numeric',
                'description' => 'required|min:5|max:1000|',
            ],
            [
                'name_product.required' => "Hãy nhập name",
                'name_product.min' => "Tên sản phẩm không được dưới 5 ký tự",
                'name_product.max' => "Tên sản phẩm không được vượt quá 60 ký tự",
                'name_product.unique' => "Tên sản phẩm đã tồn tại",
                'price.required' => "Hãy nhập price",
                'price.numeric' => "Giá sản phẩm phải là số",
                'description.required' => "Hãy nhập description",
                'description.min' => "Mô tả sản phẩm không được dưới 5 ký tự",
                'description.max' => "Mô tả sản phẩm không được vượt quá 1000 ký tự ",
            ]
        );
        $data = array_merge($request->all(),[
         'status' => 1,
        ]);
        $image = Product::where('id_product',"$id")->first();
        unset($data['_token']);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $destinationPath = 'uploads';
            $file->move($destinationPath, $file->getClientOriginalName());
            $link_img = '/uploads/' . $file->getClientOriginalName();
            $data['image'] = $link_img;
        } else {
            $data['image'] = "$image->image";
        }
        Product::where('id_product', $id)
            ->update($data);
        Product::where('id_product', $id)
            ->update(['slug'=>Str::slug($request->name_product.$id,'-'),]);
        return redirect()->route('listProduct')->with('mess', 'Sửa thành công');
    }

    public function deleteProduct($id)
    {
        Product::where('id_product',$id)->update(['status'=> 2]);
        return redirect()->route('listProduct')->with('thongbao','Xóa thành công sản phẩm');
    }

    public function search_product(Request $request)
    {
        $pro = Product::join('category_product','product.id_category','=','category_product.id')
            ->where('name_product', 'like', '%' . $request->key . '%')
            ->paginate(7);
        return view('admin.product.list',compact('pro'));
    }

    public function detail_product($id){
        $product = Product::join('category_product','product.id_category','=','category_product.id')
        ->where('id_product',$id)
        ->select('product.name_product','product.created_at','product.updated_at','product.id_product'
            ,'product.image','product.price','product.description','category_product.name')
        ->first();
        return view('admin.product.detail_product',compact('product'));
    }


}