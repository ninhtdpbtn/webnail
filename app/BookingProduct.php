<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingProduct extends Model
{
    protected $table = "booking_product";
    public $timestamp = false;
    protected $fillable = ['id_booking','id_product','status_booking_product'];
}
