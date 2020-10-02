<?php
namespace App\Http\Controllers\News;


use App\CategoryNews;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\News;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class NewsController extends Controller
{
    public function listNews(){
        $pro = News::joinCategoryNews()
            ->statusNews(1)
            ->select('news.id','news.title','news.image','news.details',
                'news.short_title','category_news.name')
            ->paginate(7);
        return view('admin.news.list',compact('pro'));
    }
    public function cho_dang_bai(){
        $pro = News::joinCategoryNews()
            ->statusNews(2)
            ->select('news.id','news.title','news.image','news.details',
                'news.short_title','category_news.name')
            ->paginate(7);
        return view('admin.news.list',compact('pro'));
    }
    public function dang_bai_viet($id){
        $request = News::where('id',$id)->first();
        $data = ([
            'title'=>$request->title,
            'details'=>$request->details,
            'image'=>$request->image,
            'short_title'=>$request->short_title,
            'status'=> 1,
            'slug'=>$request->slug,
        ]);
        News::where('id',$id)->update($data);
        return redirect()->route('listNews');
    }
    public function addNews(){
        $pro =News::get();
        $data = CategoryNews::get();
        return view('admin.news.add',compact('pro','data'));
    }
    public function saveNews(Request $request){
        $request->validate(
            [
                'title' => 'required|min:5|max:500|unique:News,title',
                'details'=>'required|min:10|max:5000|',
                'image'=>'required|image',
                'status'=>'required',
                'short_title'=>'required|min:5',
                'id_category_news'=>'required',
            ],
            [
                'title.required' => "Hãy nhập title",
                'id_category_news.required' => "Hãy chọn danh mục",
                'title.min' => "Tiêu đề không được dưới 5 ký tự",
                'title.max' => "Tiêu đề không được vượt quá 500 ký tự",
                'title.unique' => "Tiêu đề đã tồn tại",
                'details.required' => "Hãy nhập detail",
                'details.min' => "Mô tả không được dưới 10 ký tự",
                'image.required' => "Hãy nhập image",
                'image.image' => "Ảnh không đúng định dạng",
                'status.required' => "Hãy chọn trạn thái",
                'short_title.required' => "Hãy nhập short_title",
                'short_title.min' => "Không được dưới 5 ký tự",
                'short_title.max' => "Không được vượt quá 500 ký tự",

            ]
        );
        $data = array_merge($request->all(),[
            'slug' => '',
        ]);
        unset($data['_token']);

        $file = $request->file('image');
        $destinationPath = 'uploads';
        $file->move($destinationPath,$file->getClientOriginalName());
        $link_img = '/uploads/'.$file->getClientOriginalName();
        $data['image'] = $link_img;

        $id_news = News::insertGetId($data);
        News::where('id',$id_news)->update(['slug'=>Str::slug($request->title.$id_news,'-'),]);
        return redirect()->route('listNews')->with('mess', 'Thêm thành công');
    }
    public function editNews($id){
        $pro =News::find($id);
        $name_category_news = CategoryNews::joinNews()
            ->where('news.id',$id)
            ->first();
        $data = CategoryNews::where('category_news.id','<>',$name_category_news->id_category_news)
            ->get();
        return view('admin.news.edit',compact('pro','data','name_category_news'));
    }
    public function updateNews(Request $request, $id){

        $request->validate(
            [
                'title' =>   [
                    'required','min:5','max:500',
                    Rule::unique('News')->ignore($request->id, 'id'),
                ],
                'details'=>'required|min:10',
//                    'image'=>'required|image',
                'status'=>'required',
                'short_title'=>'required|min:5|max:500|',
                'id_category_news'=>'required',
            ],
            [
                'title.required' => "Hãy nhập title",
                'id_category_news.required' => "Hãy chọn danh mục",
                'title.min' => "Tiêu đề không được dưới 5 ký tự",
                'title.max' => "Tiêu đề không được vượt quá 500 ký tự",
                'title.unique' => "Tiêu đề đã tồn tại",
                'details.required' => "Hãy nhập detail",
                'details.min' => "Mô tả không được dưới 10 ký tự",
                'status.required' => "Hãy chọn trạng thái",
                'short_title.required' => "Hãy nhập short_title",
                'short_title.min' => "Không được dưới 5 ký tự",
                'short_title.max' => "Không được vượt quá 500 ký tự",

            ]
        );

        $data = array_merge($request->all(),
            ['slug'=>Str::slug($request->title.$id,'-'),]
        );
        unset($data['_token']);
        if($request->file('image')){
            $file = $request->file('image');
            $destinationPath = 'uploads';
            $file->move($destinationPath,$file->getClientOriginalName());
            $link_img = '/uploads/'.$file->getClientOriginalName();
            $data['image'] = $link_img;
        }
        else{
            $news_image = DB::table('news')->find($id);
            $data['image'] =$news_image->image;
        }
        News::where('id',$id)
            ->update($data);
        return redirect()->route('listNews')->with('mess', 'Sửa thành công');
    }
    public function deleteNews($id)
    {
        News::where('id',$id)->delete();
        return redirect()->route('listNews')->with('mess', 'Xoá thành công');
    }
    public function cho_dang_deleteNews($id)
    {
        News::where('id',$id)->delete();
        return redirect()->route('cho_dang_bai')->with('thongbao', 'Xoá thành công');
    }

    public function search_news(Request $request){
        $pro = News::joinCategoryNews()
            ->where('title','like','%'.$request->key.'%')
            ->select('news.id','news.title','news.image','news.details',
                'news.short_title','category_news.name')
            ->paginate(7);
        return view('admin.news.list',compact('pro'));
    }
    public function detail_news($id){
        $detail_news = CategoryNews::joinNews()
            ->where('news.id',$id)
            ->first();
        return view('admin.news.detail_news',compact('detail_news'));
    }
}