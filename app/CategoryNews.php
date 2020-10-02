<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryNews extends Model
{
    protected $table = 'category_news';
    public $timestamps = false;
    protected $fillable = ['name','status'];

    public function scopeJoinNews($query){
        return $query->join('news','news.id_category_news','=','category_news.id');

    }
}
