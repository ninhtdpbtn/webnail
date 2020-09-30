<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "news";
    public $timestamp = true;
    protected $fillable = [
        'title','details','image',
        'status','short_title',
        'slug','id_category_news'
    ];
}
