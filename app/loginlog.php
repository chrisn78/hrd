<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loginlog extends Model
{
    protected $fillable = [
        'id_user',
        'dept',
        'roles',
        'login',
        'logout',
        'timeout'
    ];

    public function data_user1(){
         return $this->belongsTo('App\user', 'id_user');
    }
}