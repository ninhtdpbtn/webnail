<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "news";
    public $timestamp = false;
    protected $fillable = ['name','slug'];
}
