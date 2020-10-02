<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "news";
    public $timestamps = false;
    protected $fillable = [
        'title','details','image',
        'status','short_title',
        'slug','id_category_news'
    ];
    public function scopeJoinCategoryNews($query){
        return $query->join('category_news','news.id_category_news','=','category_news.id');

    }
    public function scopeStatusNews($query ,$i){
        return $query->where('news.status',$i);

    }
}
