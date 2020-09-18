<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 8/3/2020
 * Time: 10:43 AM
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Product;
use App\News;
use Mail;
use App\Http\Requests\Validate_time;
use Carbon\Carbon;
class WebController extends Controller
{
    public function home(){
        $combo = DB::table('product')->where('id_category',6)->paginate(3);
        $news =DB::table('news')->paginate(3);
        $product = DB::table('product')->where('id_category',2)->paginate(3);
        return view('index',compact('combo','news','product'));
    }
    public function contact(){
        return view('web.contact');
    }
    public function postcontact(Request $request){
        $request->validate(
            [
                'name' => 'required|min:2|max:40',
                'phone'=>'required|numeric',
                'detail' => 'required|max:600',

            ],
            [
                'name.required' => "Hãy nhập name",
                'name.min' => "Bạn hãy nhập đúng họ tên",
                'name.max' => "Tên không được quá 40 ký tự",
                'phone.required' => "Số điện thoai không được để trống",
                'phone.numeric' => "Số điện thoai phải là số",
                'detail.required' => "Hãy nhập nội dung",
                'detail.max' => "Nội dung không được quá 600 ký tự",

            ]
        );
        $data = array_merge($request->all(),[
            'status' => 1,
        ]);
        unset($data['_token']);
        DB::table('lien_he')->insert($data);
        return redirect()->route('contact')->with('thongbao','gửi liên hệ thành công');
    }

    public function products(){
        $date = Product::where('status',1)->where('id_category','<>',6)->paginate(9);
        return view('web.products',['date'=>$date]);
    }
    public function oderProduct($slug){
        $check = DB::table('product')->where('slug',$slug)->first();
        if (!$check){
            return abort(404, 'Sản phẩm không tồn tại');
        }
        $detail_product = DB::table('product')
            ->where('product.slug',$slug)
            ->first();
        $category_by_id = DB::table('product')
            ->join('category_product','category_product.id','=', 'product.id_category')
            ->where('product.id_category',$detail_product->id_category)
            ->where('product.slug','!=',$slug)
            ->get();
        return view('web.oderProduct',compact('detail_product','category_by_id'));
    }
    public function bog(){
        $blog = DB::table('news')->where('status',1)->paginate(9);
        return view('web.bog',compact('blog'));
    }
    public function detailBog($slug){
        $check = DB::table('news')->where('slug',$slug)->first();
        if (!$check){
            return abort(404, 'Sản phẩm không tồn tại');
        }
        $data =DB::table('news')->where('slug',$slug)->get();
        $blog = DB::table('news')->where('slug','!=',$slug)
            ->where('status',1)
            ->get();
        return view('web.detailBog',compact('data','blog'));
    }
    public function staff(){
        $expert = DB::table('expert')->get();
        return view('web.staff',['expert'=>$expert]);
    }
    public function combo(){
        $combo = DB::table('product')->where('id_category',6)->get();
        return view('web.combo',compact('combo'));
    }
    public function datlich(){
        $data = DB::table('expert')->get();
        $cart = Session::get('cart');
            Session::put('cart',$cart);
        $mang_id = array_keys($cart); // lấy danh sách id sản phẩm để lấy thông tin chi tiết sản phẩm trong giỏ hàng
        $listSP = DB::table('product')->whereIn('id_product', $mang_id)->get();
        foreach ($listSP as $value)
        {
            $tong[] = $value->price;
        }
        $total = array_sum($tong);
        return view('web.datlich',compact('data','cart','listSP','total'));

    }
    public function datlich_user(){
        $gio_hang = DB::table('user_product')
            ->where('id_user',Auth::user()->id)
            ->where('status',1)
            ->first();
        if ($gio_hang == null){
            return redirect()->route('home');
        }
        $join_us_sp = DB::table('user_product')
            ->join('product','product.id_product','=', 'user_product.id_product')
            ->where('user_product.id_user',Auth::user()->id)
            ->where('user_product.status',1)
            ->get();
        foreach ($join_us_sp as $value)
        {
            $tong[] = $value->price;
        }
        $total = array_sum($tong);
        $data = DB::table('expert')->get();
        return view('web.datlich',compact('data','join_us_sp','total'));
    }
    public function savebooking( Request $request){
        $request->validate(
            [
                'name_booking' => 'required|min:2|max:30',
                'email_booking' => 'required|email',
                'time_booking' => 'required|date|after:now',
                'id_expert' => 'required',
                'description_booking' => 'required|min:3|max:500',
                'phone_booking'=>'required|digits:10',
                'id_product'=>'required',
            ],
            [
                'time_booking.required' => "Thời gian không được để trống",
                'time_booking.after' => "Không được chọn thời gian đã qua",
                'id_product.required' => "Phải chọn ít nhất 1 sản phẩm",
                'id_expert.required' => "Chuyên gia không được để trống",
                'name_booking.required' => "Hãy nhập tên combo",
                'email_booking.required' => "Email không được để trống",
                'email_booking.email' => "Bạn phải nhập email",
                'name_booking.min' => "Tên combo không được dưới 2 ký tự",
                'name_booking.max' => "Tên combo không được vượt quá 30 ký tự",
                'description_booking.required' => "Hãy nhập description",
                'description_booking.min' => "description không được dưới 3 ký tự",
                'description_booking.max' => "description không được vượt quá 500 ký tự",
                'phone_booking.required' => "Hãy nhập số điện thoại của bạn",
                'phone_booking.digits' => "Số điện thoại không hợp lệ ",
            ]
        );

        $data =[
            'name_booking' => $request->name_booking,
            'phone_booking' => $request->phone_booking,
            'email_booking' => $request->email_booking,
            'time_booking' => $request->time_booking,
            'description_booking' => $request->description_booking,
            'id_user' => Auth::user()->id,
            'status_booking' => 1,
        ];
//        $a = $request->time_booking;
//        dd($a);
        unset($data['_token']);
        if($request->hasFile('image_booking')){
            $file = $request->file('image_booking');
            $destinationPath = 'uploads';
            $file->move($destinationPath,$file->getClientOriginalName());
            $link_img = '/uploads/'.$file->getClientOriginalName();
            $data['image_booking'] = $link_img;
        }
        else{
            $data['image_booking'] ='';
        }
        $id_booking = DB::table('booking')->insertGetId($data);
        $arr = $request->id_product;
//        dd($arr);
        if ($arr != null){
            foreach ($arr as $value){
                $updated_gio_hang =[
                    'id_user' => Auth::user()->id,
                    'id_product' => $value,
                    'status' => 2,
                ];
                DB::table('user_product')->where('id_user',Auth::user()->id)
                    ->where('id_product',$value)
                    ->update($updated_gio_hang);
            }
        }
        if ($arr != null){
            foreach ($arr as $value){
                $data = [
                    'id_booking' => $id_booking,
                    'id_product' => $value,
                    'id_expert' => $request->id_expert,
                    'status' => 1,
                ];
                DB::table('booking_product')->insert($data);
            }
        }
        \Mail::to($request->email_booking)->send(new \App\Mail\GuiMail($data));
        return redirect()->route('home')->with('mess', 'Đặt hàng thành công');
    }
    public function giohang(Request $request){
        if (!Session::has('cart') || empty(Session::get('cart'))) {
            // chưa khởi tạo giỏ hàng hoặc giỏ hàng rỗng
            // hãy chuyển về trang danh sách sản phẩm hoặc hiển thị thông báo gì đó...
            return redirect()->route('home')->with('mess', 'Chưa có sản phẩm nào trong giỏ hàng');
        }
        // chỉ lấy dữ liệu thôi nhé.
        $cart = Session::get('cart');
            // cập nhật lại session giỏ hàng
            Session::put('cart',$cart);
        $mang_id = array_keys($cart); // lấy danh sách id sản phẩm để lấy thông tin chi tiết sản phẩm trong giỏ hàng
        $listSP = DB::table('product')->whereIn('id_product', $mang_id)->get();
        return view('web.giohang',compact('listSP','cart'));
    }
    public function addbooking($id){
//        dd($id);
        if(Session::has('cart')){
            // đã mua sản phẩm nào đó rồi, lấy thông tin cart ra một biến mảng để làm việc
            $cart = Session::get('cart');
            if(isset($cart[$id]))
                return redirect()->route('Home.giohang')->with('thongbao','Sản phẩm đã có trong giỏ hàng vui lòng chọn sản phẩm khác');
            else
                $cart[$id] = 1; // chưa mua sản phẩm hiện tại
            Session::put('cart',$cart);  // gán lại vào session
        }else{
            // chưa mua bất kỳ sản phẩm nào, khởi tạo cart và gán sản phẩm đầu tiên
            Session::put('cart',[$id=>1]);
        }
        return redirect()->route('Home.giohang')->with('mess','Thêm thành công');
    }

    public function giohang_user(){
        $user_product = DB::table('user_product')
            ->join('product','product.id_product','=', 'user_product.id_product')
            ->where('user_product.id_user',Auth::user()->id)
            ->where('user_product.status',1)
            ->get();
        return view('web.giohang',compact('user_product'));
    }
    public function addbooking_gio_hang($id){
        $user_product = DB::table('user_product')->where('id_user',Auth::user()->id)
            ->where('id_product',$id)
            ->where('status',1)
            ->first();
        if ($user_product){
            return redirect()->route('giohang_user')->with('thongbao','Sản phẩm này đã có trong giỏ hàng vui lòng chọn sản phẩm khác');
        }
        $data = [
            'id_user' => Auth::user()->id,
            'id_product' => $id,
            'status' => 1,
        ];
        DB::table('user_product')->insert($data);
        return redirect()->route('giohang_user')->with('mess','Thêm thành công');
    }
    public function delete_gio_hang($id)
    {
        $sp = DB::table('user_product')->where('id_product', $id)->first();
        if (!$sp) {
            return abort(404, 'Sản phẩm không tồn tại');
        }
        $data = [
            'id_user' => Auth::user()->id,
            'id_product' => $id,
            'status' => 2,
        ];
        DB::table('user_product')->where('id_product', $id)
            ->update($data);
        return redirect()->route('giohang_user')->with('thongbao','Xóa thành công');
    }
    public function addbooking_combo($id){
        if(Session::has('cart')){
            // đã mua sản phẩm nào đó rồi, lấy thông tin cart ra một biến mảng để làm việc
            $cart = Session::get('cart');
            if(isset($cart[$id]))
                $cart[$id] ++;  // đã mua sản phẩm $id rồi, tăng số lượng
            else
                $cart[$id] = 1; // chưa mua sản phẩm hiện tại

            Session::put('cart',$cart);  // gán lại vào session
        }else{
            // chưa mua bất kỳ sản phẩm nào, khởi tạo cart và gán sản phẩm đầu tiên
            Session::put('cart',[$id=>1]);
        }
        return redirect()->route('giohang_combo');
    }
    public function updatebook(Request $request){
        $cart = Session::get('cart');
        if($request->isMethod('post')){
            foreach($request->all() as $input_name =>$val){

                if(strpos($input_name,'qt_')!==false){
                    $id = str_replace('qt_','',$input_name); // tách lấy id trong chuỗi

                    if(intval($val) <1){
                        // số lượng nhỏ hơn 1 ==> xóa sản phẩm khỏi giỏ hàng
                        unset($cart[$id]);
                    }else
                        $cart[$id] = $val; // gán số lượng mới

                }
            }
            // cập nhật lại session giỏ hàng
            Session::put('cart',$cart);
        }
        $mang_id = array_keys($cart); // lấy danh sách id sản phẩm để lấy thông tin chi tiết sản phẩm trong giỏ hàng

        $listSP = DB::table('product')->whereIn('id', $mang_id)->get();

        return view('web.giohang',['listsp'=>$listSP],['cart'=>$cart]);
    }
    public function removebook($id){
        $cart = Session::get('cart');
        unset ($cart[$id]);   
        Session::put('cart',$cart);
        return redirect()->route('Home.giohang')->with('thongbao','Xóa thành công');
    }
    public function oder_booking(Request $request){
        $request->validate(
            [
                'name_booking' => 'required|min:2|max:30',
                'email_booking' => 'required|email',
                'time_booking' => 'required',
                'id_expert' => 'required',
                'description_booking' => 'required|min:3|max:500',
                'phone_booking'=>'required|digits:10',
                'id_product'=>'required',
            ],
            [
                'time_booking.required' => "Thời gian không được để trống",
                'time_booking.date' => "Thời gian chọn phải lớn hơn thời gian hiện tại",
                'id_product.required' => "Phải chọn ít nhất 1 sản phẩm",
                'id_expert.required' => "Chuyên gia không được để trống",
                'name_booking.required' => "Hãy nhập tên combo",
                'email_booking.required' => "Email không được để trống",
                'email_booking.email' => "Bạn phải nhập email",
                'name_booking.min' => "Tên combo không được dưới 2 ký tự",
                'name_booking.max' => "Tên combo không được vượt quá 30 ký tự",
                'description_booking.required' => "Hãy nhập description",
                'description_booking.min' => "description không được dưới 3 ký tự",
                'description_booking.max' => "description không được vượt quá 500 ký tự",
                'phone_booking.required' => "Hãy nhập số điện thoại của bạn",
                'phone_booking.digits' => "Số điện thoại không hợp lệ",
            ]
        );

        $data =[
            'name_booking' => $request->name_booking,
            'phone_booking' => $request->phone_booking,
            'email_booking' => $request->email_booking,
            'time_booking' => $request->time_booking,
            'description_booking' => $request->description_booking,
            'status_booking' => 1,
        ];
        unset($data['_token']);
        if($request->hasFile('image_booking')){
            $file = $request->file('image_booking');
            $destinationPath = 'uploads';
            $file->move($destinationPath,$file->getClientOriginalName());
            $link_img = '/uploads/'.$file->getClientOriginalName();
            $data['image_booking'] = $link_img;
        }
        else{
            $data['image_booking'] ='';
        }
        $id_booking = DB::table('booking')->insertGetId($data);
        $arr = $request->id_product;

        if ($arr != null){
            foreach ($arr as $value){
                $data = [
                    'id_booking' => $id_booking,
                    'id_product' => $value,
                    'id_expert' => $request->id_expert,
                    'status' => 1,
                ];
                DB::table('booking_product')->insert($data);
            }
        }
        \Mail::to($request->email_booking)->send(new \App\Mail\GuiMail($data));
        return redirect()->route('home')->with('mess', 'Đặt hàng thành công');
    }
    public function test(){
        return view('web.share.test');
    }
    public function test_validate(Validate_time $request){

        return view('web.share.test');
    }


}