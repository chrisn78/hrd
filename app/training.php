<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class training extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'judul_training',
        'speaker',
        'tgl_train',
        'start',
        'finish',
        'duration'
    ];

    protected $hidden = [];

    public function karyawan()
    {
        return $this->belongsToMany(karyawan::class);
    }

}