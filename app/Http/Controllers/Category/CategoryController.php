<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 8/3/2020
 * Time: 5:18 PM
 */

namespace App\Http\Controllers\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
// Category
    public function listCategory(){
        $category_product = DB::table('category_product')->get();
        return view('admin.category_product.list' ,compact('category_product'));
    }
    public function addCategory(){
        return view('admin.category_product.add');
    }
    public function saveCategory(Request $request){
        $request->validate(
            [
                'name' => 'required|min:2|max:30|unique:category_product,name',
            ],
            [
                'name.required' => "Hãy nhập tên danh mục",
                'name.min' => "Tên danh mục không được dưới 2 ký tự",
                'name.max' => "Tên danh mục không được vượt quá 30 ký tự",
                'name.unique' => "Tên danh mục đã được sử dụng vui lòng nhập tên danh mục khác",
            ]
        );
        $data = $request->all();
        unset($data['_token']);
        DB::table('category_product')->insert($data);
        return redirect()->route('listCategory')->with('mess', 'Thêm thành công');
    }

    public function editCategory($id){
        $pro = DB::table('category_product')->find($id);
        return view('admin.category_product.edit', ['pro' => $pro]);
    }
    public function updateCategory( $id,Request $request){
        $request->validate(
            [
                'name' =>
                    [
                        'required','min:2','max:100',
                        Rule::unique('category_product')->ignore($request->id, 'id'),
                    ],
            ],
            [
                'name.required' => "Hãy nhập tên danh mục",
                'name.min' => "Tên danh mục không được dưới 2 ký tự",
                'name.max' => "Tên danh mục không được vượt quá 100 ký tự",
                'name.unique' => "Tên danh mực đã tồn tại",
            ]
        );
        $data = $request->all();
        unset($data['_token']);
        DB::table('category_product')
            ->where('id',$id)
            ->update($data);
        return redirect()->route('listCategory')->with('mess', 'Sửa thành công');
    }
    public function deleteCategory($id)
    {
        DB::table('category_product')
            ->where('id', $id)
            ->delete();
        return redirect()->route('listCategory')->with('mess', 'Xoá thành công');
    }


}