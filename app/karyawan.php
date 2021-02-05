<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
    use SoftDeletes;
    protected $fillable = [
            'nik',
            'no_payroll',
            'id_position',
            'join_date',
            'image',
            'nama_kary',
            'alamat',
            'tempat_lahir',
            'tgl_lahir',
            'agama',
            'jenis_kel',
            'gol_darah',
            'status',
            'istri',
            'anak',
            'pendidikan',
            'no_hp',
            'no_hp1',
            'no_rek',
            'npwp',
            'bpjskes',
            'bpjstk',
            'status_posisi',
            'remark'
    ];

    protected $hidden = [];
    public function data_positions(){
        return $this->belongsTo('App\position', 'id_position');
    }
    public function training()
    {
        return $this->belongsToMany(training::class);
    }
    public function data_violation(){
        return $this->hasMany(violation::class,'id_kary','id');
    }
    public function data_user(){
        return $this->hasOne(User::class,'id_kary','id');
    }
}