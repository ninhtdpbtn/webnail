<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';
    public $timestamps = false;
    protected $fillable  = [
        'name_booking','phone_booking','image_booking',
        'email_booking','id_user','time_booking',
        'description_booking','status_booking'
    ];

}
