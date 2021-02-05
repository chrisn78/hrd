<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class violation extends Model
{
    use SoftDeletes;
    protected $fillable = [
            'id_kary',
            'id_sp',
            'tgl_sp',
            'detail_sp',
    ];

    protected $hidden = [];
    public function data_kary(){
        return $this->belongsTo(karyawan::class,'id_kary','id');
    }
    public function data_type(){
        return $this->belongsTo(typeviolation::class,'id_sp','id');
    }
}