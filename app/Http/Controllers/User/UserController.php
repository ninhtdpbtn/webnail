<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 8/3/2020
 * Time: 5:26 PM
 */

namespace App\Http\Controllers\User;


use App\Exports\ExcelExport;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{

    public function admin(){
        //booking_product
        $booking = count(DB::table('booking_product')->get());
        $huy_dat_lich = count(DB::table('booking_product')->where('status_booking_product',3)->get());
        $don_dat_lich_hoan_thanh = count(DB::table('booking_product')->where('status_booking_product',2)->get());
        $don_dat_lich = count(DB::table('booking_product')->where('status_booking_product',1)->get());
        $ty_le_huy_don = ceil($huy_dat_lich/$booking*100);
        $ty_le_dat_lich_hoan_thanh = ceil($don_dat_lich_hoan_thanh/$booking*100);
        $ty_le_dat_lich = ceil($don_dat_lich/$booking*100);

        //liên hệ
        $tong_lien_he = count(DB::table('lien_he')->get());
        $thu_da_xem = count(DB::table('lien_he')->where('status',2)->get());
        $thu_chua_xem = count(DB::table('lien_he')->where('status',1)->get());
        $ty_le_xem_thu = ceil($thu_da_xem/$tong_lien_he*100);
        $ty_le_thu_chua_xem = ceil($thu_chua_xem/$tong_lien_he*100);

        //product
        $product = DB::table('product')->get();

        //news
        $news = DB::table('news')->where('status',1)->get();
        $news_cho_dang = DB::table('news')->where('status',2)->get();

        //expert
        $expert = DB::table('expert')->get();

        //user
        $user = DB::table('user')->where('status',1)->get();

        //category_news
        $category_news = DB::table('category_news')->get();

        //category_product
        $category_product = DB::table('category_product')->get();

        $san_pham_thang = DB::table('booking_product')
            ->join('product','booking_product.id_product','=','product.id_product')
            ->join('booking','booking_product.id_booking','=','booking.id_booking')
            ->where('booking_product.status_booking_product',2)
            ->whereMonth('booking.created_at',date('m'))
            ->get();
//        dd($san_pham_thang);
        $san_pham_nam = DB::table('booking_product')
            ->join('product','booking_product.id_product','=','product.id_product')
            ->join('booking','booking_product.id_booking','=','booking.id_booking')
            ->where('booking_product.status_booking_product',2)
            ->whereYear('booking.created_at',date('Y'))
            ->get();
        foreach ($san_pham_thang as $value)
        {
            $tong_thang[] = $value->price;
        }
        $total_thang = array_sum($tong_thang);
        foreach ($san_pham_nam as $value)
        {
            $tong_nam[] = $value->price;
        }
        $total_nam = array_sum($tong_nam);



        return view('admin.home',compact('don_dat_lich','don_dat_lich_hoan_thanh','ty_le_huy_don',
            'huy_dat_lich','thu_chua_xem','thu_da_xem','product','news','news_cho_dang','expert','user','category_product',
            'total_thang','total_nam','category_news','ty_le_dat_lich_hoan_thanh','ty_le_dat_lich','ty_le_xem_thu','ty_le_thu_chua_xem'));
    }
    public function tra_cuu_don_hang(Request $request){
        $request->validate(
            [
                'time_1' => 'required',
                'time_2' => 'required',
            ],
            [
                'time_1.required' => "Hãy nhập thời gian ",
                'time_2.required' => "Hãy nhập chọn thời gian",

            ]
        );
        $a = $request->time_1;
        $b = $request->time_2;
        $booking = DB::table('booking_product')
            ->join('product','booking_product.id_product','=','product.id_product')
            ->join('booking','booking_product.id_booking','=','booking.id_booking')
            ->whereDate('booking.created_at','>=',$request->time_1)
            ->whereDate('booking.created_at','<=',$request->time_2)
            ->paginate(7);
//        dd($booking);
        if ($booking == null){
            return redirect()->route('search_date')->with('baoloi','Thời gian tìm kiếm không có hoặc không hợp lệ');
        }
//        dd($booking);
        return view('admin.tra_cuu',compact('a','b','booking'));

    }
    public function export_booking_product(Request $request){
        $a = $request->a;
        $b = $request->b;
        $file = Excel::download(new ExcelExport($a,$b), 'BookingProduct.xlsx');
        return $file;
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
            ->where('booking_product.status_booking_product',1)
            ->get();
        return view('web.thong_tin_dat_lich_user', compact('list'));
    }
    public function search_date(){
        return view('admin.search_date');
    }

}