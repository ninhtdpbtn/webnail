<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";
    public $timestamps = false;
    protected $fillable = [
        'name_product','id_category',
        'image','price','slug',
        'status','description'
    ];
}
