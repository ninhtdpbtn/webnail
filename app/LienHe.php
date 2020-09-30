<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LienHe extends Model
{
    protected $table = 'lien_he';
    public $timestamps = true;
    protected $fillable = [
        'name','email','phone',
        'detail','status'
    ];
}
