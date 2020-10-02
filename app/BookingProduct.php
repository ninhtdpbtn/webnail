<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BookingProduct extends Model
{
    protected $table = "booking_product";
    public $timestamps = false;
    protected $fillable = [
        'id_booking','id_product',
        'status_booking_product',
    ];
    public function scopeJoinBookingProduct($query)
    {
        return $query ->join('product','product.id_product','=','booking_product.id_product')
            ->join('booking','booking.id_booking','=','booking_product.id_booking')
            ->join('expert','expert.id','=','booking_product.id_expert');
    }

    public function scopeStatusBookingProduct($query ,$id)
    {
        return $query->where('booking_product.status_booking_product',$id);
    }

    public function scopeIdProduct($query ,$id_product)
    {
        return $query ->where('id_product',$id_product);
    }

    public function scopeIdBooking($query ,$id_booking)
    {
        return $query ->where('id_booking',$id_booking);
    }

    public function scopeTonghop ($query , $a ,$b){
        return $query->join('product','booking_product.id_product','=','product.id_product')
            ->join('booking','booking_product.id_booking','=','booking.id_booking')
            ->where('booking_product.status_booking_product' ,'=',2)
            ->whereDate('booking.created_at' ,'>=',$a)
            ->whereDate('booking.created_at' ,'<=',$b)
            ->select(DB::raw("date(booking.created_at) as date"),DB::raw("SUM(price) as price"),DB::raw("COUNT(booking_product.id_product) as product"))
            ->groupBy(DB::raw("date(booking.created_at)"));
    }
    public function scopeSearch_booking ($query , $time1 ,$time2){
        return $query->join('product','booking_product.id_product','=','product.id_product')
            ->join('booking','booking_product.id_booking','=','booking.id_booking')
            ->whereDate('booking.created_at','>=',"$time1")
            ->whereDate('booking.created_at','<=',"$time2");
    }
    public function scopeProductMonth($query)
    {
        return $query->join('product','booking_product.id_product','=','product.id_product')
            ->join('booking','booking_product.id_booking','=','booking.id_booking')
            ->where('booking_product.status_booking_product',2)
            ->whereMonth('booking.created_at',date('m'));
    }
    public function scopeProductYear($query)
    {
        return $query->join('product','booking_product.id_product','=','product.id_product')
            ->join('booking','booking_product.id_booking','=','booking.id_booking')
            ->where('booking_product.status_booking_product',2)
            ->whereYear('booking.created_at',date('Y'));
    }
    public function scopeBookingUser($query ,$id)
    {
        return $query ->join('booking','booking.id_booking','=','booking_product.id_booking')
            ->join('product','product.id_product','=','booking_product.id_product')
            ->join('expert','expert.id','=','booking_product.id_expert')
            ->where('booking.id_user',$id)
            ->where('booking.status_booking',1)
            ->where('booking_product.status_booking_product',1);
    }
}
