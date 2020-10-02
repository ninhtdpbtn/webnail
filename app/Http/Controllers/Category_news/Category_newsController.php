<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 8/3/2020
 * Time: 5:18 PM
 */

namespace App\Http\Controllers\Category_news;
use App\CategoryNews;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class Category_newsController extends Controller
{
// Category
    public function list_category_news(){
        $list = CategoryNews::where('status',0)->get();
        return view('admin.category_news.list_category_news',compact('list') );
    }
    public function list_add_category_news(){
        return view('admin.category_news.add_category_news' );
    }
    public function list_edit_category_news($id){
        $list_edit = CategoryNews::where('id',$id)->first();
        return view('admin.category_news.edit_category_news',compact('list_edit') );
    }
    public function add_category_news(Request $request){
        $request->validate(
            [
                'name' =>
                    [
                        'required','min:2','max:100',
                        Rule::unique('category_news')->ignore($request->id, 'id'),
                    ],
            ],
            [
                'name.required' => "Hãy nhập tên danh mục",
                'name.min' => "Tên danh mục không được dưới 2 ký tự",
                'name.max' => "Tên danh mục không được vượt quá 100 ký tự",
                'name.unique' => "Tên danh mực đã tồn tại",
            ]
        );
        CategoryNews::insert([
            'name' => $request->name,
            'status' => 0,
        ]);
        return redirect()->route('list_category_news')->with('mess', 'Thêm thành công');
    }
    public function edit_category_news(Request $request ,$id){
        $request->validate(
            [
                'name' =>
                    [
                        'required','min:2','max:100',
                        Rule::unique('category_news')->ignore($request->id, 'id'),
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
        CategoryNews::where('id',$id)->update($data);
        return redirect()->route('list_category_news')->with('mess', 'Sửa thành công');
    }
    public function delete_category_news($id){
       CategoryNews::where('id',$id)->delete();
        return redirect()->route('list_category_news');
    }
}