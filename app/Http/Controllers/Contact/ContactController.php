<?php

namespace App\Http\Controllers\Contact;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function list_contact(){
        $listContact = DB::table('lien_he')->where('status',1)->paginate(7);
        return view('admin.contact.list_contact',compact('listContact'));
    }
    public function watched_contact(){
        $listContact = DB::table('lien_he')->where('status',2)->paginate(7);
        return view('admin.contact.watched_contact',compact('listContact'));
    }
    public function detail_contact($id){
        $listContact = DB::table('lien_he')->where('id',$id)->first();
        $data =[
            'name' => $listContact->name,
            'phone' => $listContact->phone,
            'email' => $listContact->email,
            'detail' => $listContact->detail,
            'status' => 2,
        ];
        DB::table('lien_he')->where('id',$id)->update($data);
        return view('admin.contact.detail_contact',compact('listContact'));
    }
    public function detail_watched_contact($id){
        $listContact = DB::table('lien_he')->where('id',$id)->first();
        return view('admin.contact.detail_watched_contact',compact('listContact'));
    }
    public function delete_contact($id){
        $listContact = DB::table('lien_he')->find($id);
        $data =[
            'name' => $listContact->name,
            'phone' => $listContact->phone,
            'email' => $listContact->email,
            'detail' => $listContact->detail,
            'status' => 3,
        ];
        DB::table('lien_he')->where('id',$id)->update($data);
        return redirect()->route('watched_contact')->with('thongbao','Xóa thành công thư liên hệ'.' '.'#'.$id);
    }
    public function delete_all_contact(){
        $listContact = DB::table('lien_he')->where('status',2)->get();
        foreach ($listContact as $value){
            $data = [
                'name' => $value->name,
                'phone' => $value->phone,
                'email' => $value->email,
                'detail' => $value->detail,
                'status' => 3,
            ];
            DB::table('lien_he')->where('status',2)->update($data);
        }
        return redirect()->route('watched_contact')->with('thongbao','Xóa thành công tất cả thư đã đọc');
    }
}