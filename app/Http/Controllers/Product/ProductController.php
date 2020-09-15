<?php
namespace App\Http\Controllers\Product;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use Illuminate\Support\Str;
use App\User;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    //Product
    public function listProduct()
    {
        $pro = DB::table('product')
        ->join('category_product','category_product.id','=','product.id_category')
        ->where('product.status',1)
        ->paginate(7);
//        dd($pro);
//        $pro = Product::where('status',1)->paginate(7);
        return view('admin.product.list',compact('pro'));
    }

    public function addProduct()
    {
        $data = DB::table('category_product')->get();
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
        $data = ([
            'name_product'=>$request->name_product,
            'id_category'=>$request->id_category,
            'price'=>$request->price,
            'image'=>$request->image,
            'description'=>$request->description,
            'status'=> 1,
            'slug'=> '',
        ]);
        unset($data['_token']);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $destinationPath = 'uploads';
            $file->move($destinationPath, $file->getClientOriginalName());
            $link_img = '/uploads/' . $file->getClientOriginalName();
            $data['image'] = $link_img;
        } else {
            $data['image'] = '';
        }
        $id_product = DB::table('product')->insertGetId($data);
        DB::table('product')->update(['slug'=>Str::slug($request->name_product.$id_product,'-'),]);
        return redirect()->route('listProduct')->with('mess', 'Thêm thành công');
    }
    public function editProduct($id)
    {
        $data = DB::table('category_product')->get();
        $pro = DB::table('product')->where('id_product',$id)->first();
//        dd($id,$data,$pro);
        return view('admin.product.edit', compact('data','pro'));
    }
    public function updateProduct(Request $request, $id)
    {
        $request->validate(
            [
                'name_product' =>
                    [
                        'required','min:5','max:60',
                        Rule::unique('product')->ignore($request->id, 'id_product')
                    ],
                'price' => 'required|numeric',
                'image' => 'required|image',
                'description' => 'required|min:5|max:1000|',
            ],
            [
                'name_product.required' => "Hãy nhập name",
                'name_product.min' => "Tên sản phẩm không được dưới 5 ký tự",
                'name_product.max' => "Tên sản phẩm không được vượt quá 60 ký tự",
                'name_product.unique' => "Tên sản phẩm đã tồn tại",
                'price.required' => "Hãy nhập price",
                'price.numeric' => "Giá sản phẩm phải là số",
                'image.required' => "Hãy nhập image",
                'image.image' => "Định dạng ảnh không phải (jpeg, png, bmp, gif, or svg)",
                'description.required' => "Hãy nhập description",
                'description.min' => "Mô tả sản phẩm không được dưới 5 ký tự",
                'description.max' => "Mô tả sản phẩm không được vượt quá 1000 ký tự ",

            ]
        );

        $data = ([
            'name_product'=>$request->name_product,
            'id_category'=>$request->id_category,
            'price'=>$request->price,
            'image'=>$request->image,
            'description'=>$request->description,
        ]);
        unset($data['_token']);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $destinationPath = 'uploads';
            $file->move($destinationPath, $file->getClientOriginalName());
            $link_img = '/uploads/' . $file->getClientOriginalName();
            $data['image'] = $link_img;
        } else {
            $data['image'] = '';
        }
        DB::table('product')->where('id_product', $id)->update($data);
        $id_product = DB::table('product')->where('id_product', $id)->first();
        DB::table('product')->where('id_product', $id)
            ->update(['slug'=>Str::slug($request->name_product.$id_product->id_product,'-'),]);
        return redirect()->route('listProduct')->with('mess', 'Sửa thành công');
    }

    public function deleteProduct($id)
    {
        DB::table('product')->where('id_product',$id)->delete();
        return redirect()->route('listProduct')->with('thongbao','Xóa thành công sản phẩm');
    }
    public function search(Request $request)
    {
        $product = Product::where('name_product', 'like', '%' . $request->key . '%')
            ->get();
        return view('web.search', compact('product'));
    }

    public function search_product(Request $request)
    {
        $product = Product::where('name', 'like', '%' . $request->key . '%')
            ->get();
        return view('admin.product.search', compact('product'));
    }
    public function detail_product($id){
        $product = Product::where('id_product',$id)->first();
        return view('admin.product.detail_product',compact('product'));


    }


}