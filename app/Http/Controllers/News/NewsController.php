<?php
namespace App\Http\Controllers\News;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\News;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;


class NewsController extends Controller
{
        public function listNews(){
            $pro = DB::table('category_news')
                ->join('news','news.id_category_news','=','category_news.id')
                ->where('news.status',1)
                ->paginate(7);
//            dd($pro);
            return view('admin.news.list',compact('pro'));
        }
        public function cho_dang_bai(){
            $pro = DB::table('category_news')
                ->join('news','news.id_category_news','=','category_news.id')
                ->where('news.status',2)
                ->paginate(7);
            return view('admin.news.cho_dang_bai',compact('pro'));
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
            $pro =DB::table('news')->get();
            $data = DB::table('category_news')->get();
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
            $data = ([
                'title'=>$request->title,
                'id_category_news'=>$request->id_category_news,
                'details'=>$request->details,
                'image'=>$request->image,
                'short_title'=>$request->short_title,
                'status'=>$request->status,
                'slug'=>'',
            ]);
            unset($data['_token']);
            if($request->hasFile('image')){
                $file = $request->file('image');
                $destinationPath = 'uploads';
                $file->move($destinationPath,$file->getClientOriginalName());
                $link_img = '/uploads/'.$file->getClientOriginalName();
                $data['image'] = $link_img;
            }
            else{
                $data['image'] ='';
            }
            $id_news = DB::table('news')->insertGetId($data);
            DB::table('news')->update(['slug'=>Str::slug($request->title.$id_news,'-'),]);
            return redirect()->route('listNews')->with('mess', 'Thêm thành công');
        }
        public function updateNews(Request $request, $id){

            $request->validate(
                [
                    'title' =>   [
                        'required','min:5','max:500',
                        Rule::unique('News')->ignore($request->id, 'id'),
                    ],
                    'details'=>'required|min:10',
                    'image'=>'required|image',
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
                    'image.required' => "Hãy nhập image",
                    'image.image' => "Ảnh không đúng định dạng",
                    'status.required' => "Hãy chọn trạng thái",
                    'short_title.required' => "Hãy nhập short_title",
                    'short_title.min' => "Không được dưới 5 ký tự",
                    'short_title.max' => "Không được vượt quá 500 ký tự",

                ]
            );

            $data = ([
                'title'=>$request->title,
                'id_category_news'=>$request->id_category_news,
                'details'=>$request->details,
                'image'=>$request->image,
                'status'=>$request->status,
                'short_title'=>$request->short_title,
                'slug'=>Str::slug($request->title.'-'.$request->id,'-'),
            ]);
            unset($data['_token']);
            if($request->file('image')){
                $file = $request->file('image');
                $destinationPath = 'uploads';
                $file->move($destinationPath,$file->getClientOriginalName());
                $link_img = '/uploads/'.$file->getClientOriginalName();
                $data['image'] = $link_img;
            }
            else{
                $data['image'] ='';
            }
            DB::table('news')->where('id',$id)
                ->update($data);
            DB::table('news')->where('id', $id)
                ->update(['slug'=>Str::slug($request->title.$id,'-'),]);
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
        public function editNews($id){
            $pro =DB::table('news')->find($id);
            $name_category_news = DB::table('category_news')
                ->join('news','news.id_category_news','=','category_news.id')
                ->where('news.id',$id)
                ->first();
            $data = DB::table('category_news')
                ->where('category_news.id','<>',$name_category_news->id_category_news)
                ->get();
//            dd($name_category_news,$data);
            return view('admin.news.edit',compact('pro','data','name_category_news'));
        }
        public function search_news(Request $request){
            $news = News::where('title','like','%'.$request->key.'%')
                            ->get();
            return view('admin.news.search',compact('news'));

        }
        public function detail_news($id){
            $detail_news = DB::table('category_news')
                ->join('news','news.id_category_news','=','category_news.id')
                ->where('news.id',$id)
                ->first();
//            $detail_news = News::where('id',$id)->first();
            return view('admin.news.detail_news',compact('detail_news'));
        }
}