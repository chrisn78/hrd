<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class position extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name_position',
        'level',
        'department',
        'basic_salary',
        'remark'
    ];

    protected $hidden = [];

    public function data_karys(){
        return $this->hasMany(karyawan::class,'id_position','id');
    }

}