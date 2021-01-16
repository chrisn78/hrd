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
            'no_rek',
            'npwp',
            'bpjskes',
            'bpjstk',
            'status_posisi',
            'remarks'
    ];

    protected $hidden = [];
    public function data_positions(){
        return $this->belongsTo(Position::class,'id_position','id');
    }
    public function training()
    {
        return $this->belongsToMany(training::class);
    }
}