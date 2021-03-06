<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 8/3/2020
 * Time: 5:27 PM
 */

namespace App\Http\Controllers\Expert;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Expert;


class ExpertController extends Controller
{
    //Expert
    public function listExpert(){
        $expert = Expert::where('status', 0)->get();
        return view('admin.expert.list',['expert'=>$expert]);
    }
    public function addExpert(){
        return view('admin.expert.add');
    }
    public function saveExpert(Request $request){
        $request->validate(
            [
                'name' => 'required|min:2|max:30|unique:expert,name',
                'location'=>'required|min:5|max:100',
                'avatar'=>'required|image'
            ],
            [
                'name.required' => "Hãy nhập tên combo",
                'name.unique' => "Tên chuyên gia đã tồn tại",
                'name.min' => "Tên chuyên không được dưới 2 ký tự",
                'name.max' => "Tên chuyên gia không được vượt quá 30 ký tự",
                'location.required' => "Hãy nhập giá combo",
                'location.min' => "Không được dưới 5 ký tự",
                'location.max' => "Không được vượt quá 100 ký tự",
                'avatar.required' => "Hãy nhập image",
                'avatar.image' => "Ảnh không đúng định dạng",
            ]
        );
        $data = array_merge($request->all(),[
            'status' => 0,
        ]);
        $file = $request->file('avatar');
        $destinationPath = 'uploads';
        $file->move($destinationPath,$file->getClientOriginalName());
        $link_img = '/uploads/'.$file->getClientOriginalName();
        $data['avatar'] = $link_img;

        Expert::create($data);
        return redirect()->route('listExpert')->with('mess', 'Thêm thành công');
    }
    public function editExpert($id){
        $pro = Expert::find($id);
        return view('admin.expert.edit' ,['pro' => $pro]);
    }
    public function updateExpert(Request $request, $id){
        $request->validate(
            [
                'name' => 'required|min:2|max:30',
                'location'=>'required|min:5|max:100',
            ],
            [
                'name.required' => "Hãy nhập tên combo",
                'name.min' => "Tên chuyên không được dưới 2 ký tự",
                'name.max' => "Tên chuyên gia không được vượt quá 30 ký tự",
                'location.required' => "Hãy nhập giá combo",
                'location.min' => "Không được dưới 5 ký tự",
                'location.max' => "Không được vượt quá 100 ký tự",
            ]
        );

        $data = array_merge($request->all(),[
            'status' => 0,
        ]);
        $avatar = Expert::find($id);
        unset($data['_token']);
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $destinationPath = 'uploads';
            $file->move($destinationPath,$file->getClientOriginalName());
            $link_img = '/uploads/'.$file->getClientOriginalName();
            $data['avatar'] = $link_img;
        }
        else{
            $data['avatar'] = "$avatar->avatar";
        }
        Expert::where('id',$id)
            ->update($data);
        return redirect()->route('listExpert')->with('mess', 'Sửa thành công');
    }

    public function deleteExpert($id){
        $expert = Expert::where('id',$id)->first();
        Expert::where('id',$id)->update([
            'name' =>$expert->name,
            'avatar' =>$expert->avatar,
            'location' =>$expert->location,
            'status' => 1,
        ]);
        return redirect()->route('listExpert')->with('mess', 'Xoá thành công');
    }

}