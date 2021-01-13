<?php

namespace App\Imports;
use Carbon\Carbon;
use App\karyawan;
use Maatwebsite\Excel\Concerns\ToModel;

class KaryawanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        $time1 = Carbon::parse(($row[4]- 25569) * 86400)->format('Y-m-d');
        $lhr = strtotime($row[6]);
        $time2 = Carbon::parse(($row[6]- 25569) * 86400)->format('Y-m-d');
        // dd($row[6]);
        // dd($lhr);
        return new karyawan([
            'nik' => $row[0],
            'no_payroll' => $row[1],
            'id_position' => $row[2],
            'nama_kary' => $row[3],
            'join_date' => $time1,
            'tempat_lahir' => $row[5],
            'tgl_lahir' => $time2,
            'alamat' => $row[7],
            'jenis_kel' => $row[8],
            'agama' => $row[9],
            'gol_darah' => $row[10],
            'status_posisi' => $row[11],
            'pendidikan' => $row[12],
            'status' => $row[13],
            'image' => $row[14]
        ]);

    }
}