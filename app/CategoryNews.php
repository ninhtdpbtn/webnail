<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryNews extends Model
{
    protected $table = 'category_news';
    public $timestamps = true;
    protected $fillable = ['name','status'];
}
