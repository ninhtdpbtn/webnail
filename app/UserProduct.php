<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProduct extends Model
{
    protected $table = 'user_product';
    public $timestamps = true;
    protected $fillable = [
        'id_user','id_product',
        'status'
    ];
}
