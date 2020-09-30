<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 8/12/2020
 * Time: 9:46 AM
 */

namespace App\Http\Controllers\Booking;


use App\Http\Controllers\Controller;
use http\Env\Request;
use Illuminate\Support\Facades\DB;
class BookingController extends Controller
{
    public function listBooking(){
        $data = DB::table('booking_product')
            ->join('product','product.id_product','=','booking_product.id_product')
            ->join('booking','booking.id_booking','=','booking_product.id_booking')
            ->join('expert','expert.id','=','booking_product.id_expert')
            ->where('booking_product.status_booking_product',1)
            ->paginate(7);
//        dd($data);
        return view('admin.booking.list',compact('data'));
    }
    public function booking_finish(){
        $data = DB::table('booking_product')
            ->join('product','product.id_product','=','booking_product.id_product')
            ->join('booking','booking.id_booking','=','booking_product.id_booking')
            ->join('expert','expert.id','=','booking_product.id_expert')
            ->where('booking_product.status_booking_product',2)
            ->paginate(7);
//        dd($data);
        return view('admin.booking.booking_finish',compact('data'));
    }
    public function updateBooking($id_product,$id_booking){
        DB::table('booking_product')
            ->where('id_product', $id_product)
            ->where('id_booking',$id_booking)
            ->update(['status_booking_product' => 2]);
        return redirect()->route('listBooking')->with('mess', 'Xoá thành công');
    }
    public function deleteBooking($id_product,$id_booking){
        DB::table('booking_product')
            ->where('id_product', $id_product)
            ->where('id_booking',$id_booking)
            ->update(['status_booking_product' => 3]);
        $email_booking = DB::table('booking_product')
            ->join('product','product.id_product','=','booking_product.id_product')
            ->join('booking','booking.id_booking','=','booking_product.id_booking')
            ->join('expert','expert.id','=','booking_product.id_expert')
            ->where('booking_product.id_booking',$id_booking)
            ->where('booking_product.id_product',$id_product)
            ->select('booking.email_booking')
            ->first();
        \Mail::to($email_booking->email_booking)->send(new \App\Mail\HuyBooking($email_booking));
        return redirect()->route('listBooking')->with('mess', 'Xoá thành công');
    }
    public function deleteBooking_finish($id_product,$id_booking){
        DB::table('booking_product')
            ->where('id_product', $id_product)
            ->where('id_booking',$id_booking)
            ->update(['status_booking_product' => 4]);
        return redirect()->route('booking_finish')->with('mess', 'Xoá thành công');
    }
    public function search_booking(Request $request){
        $booking = DB::table('booking')
            ->where('name_booking','like','%'.$request->key.'%')
            ->get();
        return view('admin.booking.search',compact('booking'));
    }
    public function detlete_booking_user($id_product ,$id_booking){
        $sp = DB::table('booking_product')->where('id_product', $id_product)
            ->where('id_booking',$id_booking)
            ->first();
        if (!$sp) {
            return abort(404, 'Sản phẩm không tồn tại');
        }
        $data = [
            'id_booking' => $id_booking,
            'id_product' => $id_product,
            'status_booking_product' => 3,
        ];
        DB::table('booking_product')
            ->where('id_booking',$id_booking)
            ->where('id_product', $id_product)
            ->update($data);
        return redirect()->route('dat_lich_user')->with('thongbao','Xóa thành công');

    }

}