<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProduct extends Model
{
    protected $table = 'user_product';
    public $timestamps = false;
    protected $fillable = [
        'id_user','id_product',
        'status'
    ];
}
