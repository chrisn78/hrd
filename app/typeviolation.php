<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class typeviolation extends Model
{
    use SoftDeletes;
    protected $fillable = [
            'category',
            'nama_sp',
    ];

    protected $hidden = [];
    public function data_kary(){
        return $this->hasMany(violation::class,'id_sp','id');
    }
}