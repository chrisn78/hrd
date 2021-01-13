<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class karyawan_training extends Model
{
    use SoftDeletes;
    protected $fillable = [
            'training_id',
            'karyawan_id',
        ];
}