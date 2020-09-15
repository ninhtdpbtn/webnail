<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 8/3/2020
 * Time: 5:26 PM
 */

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class UserController extends Controller
{

    public function admin(){
        return view('admin.home');
    }

    public function login(){
        return view('login.home');
    }
    public function addLogin(){
        return view('login.addLogin');
    }
    public function saveLogin(Request $request){
        $request->validate(
            [
                'name' => 'required|min:2|max:25',
                'email'=>'required|email|unique:User,email',
                'image'=>'required|image',
                'phone'=>'required|regex:/(03)[0-9]{8}/|unique:User,phone',
                'address'=>'required|min:2|max:20|',
                'password' => 'required|min:5|max:12|',
                'password_confirmation' => 'same:password',
            ],
            [
                'name.required' => "Hãy nhập name",
                'name.min' => "Name không được dưới 2 ký tự",
                'name.max' => "Name không được quá 25 ký tự",
                'email.required' => "Hãy nhập email",
                'email.email' => "Email không hợp lê",
                'email.unique' => "Email này đã được sử dụng vui lòng nhập email khác",
                'image.required' => "Hãy chon ảnh đại diện",
                'image.image' => "Định dạng ảnh không phải (jpeg, png, bmp, gif, or svg)",
                'phone.required' => "Hãy nhập số điện thoại của bạn",
                'phone.regex' => "Số điện thoại không hợp lệ ( phải bắt đầu bằng 03 và phải đủ 10 số)",
                'phone.unique' => "Số điện thoại của bạn đã được đăng ký",
                'address.required' => "Hãy nhập address",
                'address.min' => "Address không được dưới 3 ký tự",
                'address.max' => "Address không được vượt quá 20 ký tự",
                'password.required' => "Hãy nhập password",
                'password.min' => "Password không được để dưới 5 ký tự",
                'password.max' => "Password không được vượt quá 12 ký tự",
                'password_confirmation.required' => 'Hãy nhập lại mật khẩu',
                'password_confirmation.same' => 'Mật khẩu không trùng nhau',
            ]
        );
        $data = array_merge($request->all(),[
            'password' => bcrypt($request->password),
            'status' => 1,
        ]);
//        unset($data['_token']);
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
//        DB::table('user')->insert($data);
        User::create($data);
        return redirect()->route('login')->with('mess', 'Chúc mừng bạn đã đăng ký thành công');
    }
    public function getlogin(Request $request){
        $email['info'] =$request->email;
        $password =$request->password;
        if(Auth::attempt(['email'=>$email ,'password'=>$password]) && Auth::user()->status == 1){
            return redirect()->route('home')->with('mess', 'Chúc mừng bạn đã đăng nhập thành công');
        }else if(Auth::attempt(['email'=>$email ,'password'=>$password]) && Auth::user()->status == 2){
            return redirect()->route('admin')->with('mess', 'Chúc mừng bạn đã đăng nhập thành công');
        }else{
            return redirect()->route('login')->with('thongbao', 'Đăng nhập thất bại , tài khoản hoặc mật khẩu không chính xác');
        }
    }
    // USER
    public function listUser(){
        $user = User::paginate(7);
        return view('admin.user.list',['user' =>$user]);
    }
    public function addUser(){
        return view('admin.user.add');
    }
    public function saveUser(Request $request){
        $request->validate(
            [
                'name' => 'required|min:2|max:25',
                'email'=>'required|email|unique:User,email',
                'image'=>'required|image',
                'phone'=>'required|regex:/(03)[0-9]{8}/|unique:User,phone',
                'address'=>'required|min:2|max:20|',
                'password' => 'bail|required|min:5|max:12|',
                'password_confirmation' => 'bail|same:password',
            ],
            [
                'name.required' => "Hãy nhập name",
                'name.min' => "Name không được dưới 2 ký tự",
                'name.max' => "Name không được quá 25 ký tự",
                'email.required' => "Hãy nhập email",
                'email.email' => "Email không hợp lê",
                'email.unique' => "Email này đã được sử dụng vui lòng nhập email khác",
                'image.required' => "Hãy chon ảnh đại diện",
                'image.image' => "Định dạng ảnh không phải (jpeg, png, bmp, gif, or svg)",
                'phone.required' => "Hãy nhập số điện thoại của bạn",
                'phone.regex' => "Số điện thoại không hợp lệ ( phải bắt đầu bằng 03 và phải đủ 10 số)",
                'phone.unique' => "Số điện thoại của bạn đã được đăng ký",
                'address.required' => "Hãy nhập address",
                'address.min' => "Address không được dưới 3 ký tự",
                'address.max' => "Address không được vượt quá 20 ký tự",
                'password.min' => "Password không được để dưới 5 ký tự",
                'password.max' => "Password không được vượt quá 12 ký tự",
                'password_confirmation.required' => 'Hãy nhập lại mật khẩu',
                'password_confirmation.same' => 'Mật khẩu không trùng nhau',
            ]
        );
        $data = ([
            'name'=>$request->name,
            'email'=>$request->email,
            'image'=>$request->image,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'password'=>bcrypt($request->password),
            'status'=>$request->status,
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
        DB::table('user')->insert($data);
        return redirect()->route('listUser')->with('mess', 'Thêm thành công');
    }
    public function editUser($id){
        $pro =DB::table('user')->find($id);
        return view('admin.user.edit',['pro'=>$pro]);
    }
    public function updateUser(Request $request, $id){
        $request->validate(
            [
                'name' => 'required|min:2|max:25',
                'email'=>[
                    'required',
                    Rule::unique('user')->ignore($request->id),
                ],
                'image'=>'required|image',
                'phone'=>
                    [
                        'required',
                        'regex:/(03)[0-9]{8}/',
                        Rule::unique('user')->ignore($request->id, 'id'),
                    ],
                'address'=>'required|min:2|max:20|',
                'password' => 'bail|required|min:5|max:12|',
                'password_confirmation' => 'bail|required|same:password',
            ],
            [
                'name.required' => "Hãy nhập name",
                'name.min' => "Name không được dưới 2 ký tự",
                'name.max' => "Name không được quá 25 ký tự",
                'email.required' => "Hãy nhập email",
                'email.unique' => "Email đã được sử dụng",
                'image.required' => "Hãy chon ảnh đại diện",
                'image.image' => "Định dạng ảnh không phải (jpeg, png, bmp, gif, or svg)",
                'phone.required' => "Hãy nhập số điện thoại của bạn",
                'phone.regex' => "Số điện thoại không hợp lệ ( phải bắt đầu bằng 03 và phải đủ 10 số)",
                'phone.unique' => "Số điện thoại đã được sử dụng",
                'address.required' => "Hãy nhập address",
                'address.min' => "Address không được dưới 3 ký tự",
                'address.max' => "Address không được vượt quá 20 ký tự",
                'password.required' => "Hãy nhập password",
                'password.min' => "Password không được để dưới 5 ký tự",
                'password.max' => "Password không được vượt quá 12 ký tự",
                'password_confirmation.required' => 'Hãy nhập lại mật khẩu',
                'password_confirmation.same:password' => 'Mật khẩu không trùng nhau',
                'password_confirmation.same' => 'Mật khẩu không trùng nhau',
            ]
        );

        $data = ([
            'name'=>$request->name,
            'email'=>$request->email,
            'image'=>$request->image,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'password'=>bcrypt($request->password),
            'status'=>$request->status,
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
        DB::table('user')
            ->where('id',$id)
            ->update($data);
        return redirect()->route('listUser')->with('mess', 'Sửa thành công');
    }
    public function deleteUser($id)
    {
        DB::table('user')
            ->where('id', $id)
            ->delete();
        return redirect()->route('listUser')->with('mess', 'Xoá thành công');
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect()->route('home')->with('mess', 'Logout thành công');
        }
    }
    public function search_user(Request $request){
        $user =User::where('name','like','%'.$request->key.'%')
                        ->get();
        return view('admin.user.search',compact('user'));
    }
    public function dat_lich_user(){
        $list = DB::table('booking_product')
            ->join('booking','booking.id_booking','=','booking_product.id_booking')
            ->join('product','product.id_product','=','booking_product.id_product')
            ->join('expert','expert.id','=','booking_product.id_expert')
            ->where('booking.id_user',Auth::user()->id)
            ->where('booking.status_booking',1)
            ->where('booking_product.status',1)
            ->get();
        return view('web.thong_tin_dat_lich_user', compact('list'));
    }


}