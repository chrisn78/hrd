<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class activitylog extends Model
{
    protected $fillable = [
        'action',
        'description',
        'nama_user',
        'dept',
        'roles'
    ];
}
