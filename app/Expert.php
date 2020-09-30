<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    protected $table = 'expert';
    public $timestamps = true;
    protected $fillable = [
        'name','location',
        'avatar','status'
    ];
}
