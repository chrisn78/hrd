<?php

namespace App\Imports;
use Carbon\Carbon;
use App\training;
use Maatwebsite\Excel\Concerns\ToModel;

class DataTrainingImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $tgltrain = Carbon::parse(($row[2]- 25569) * 86400)->format('Y-m-d');
        $start= Carbon::parse(($row[3]- 25569) * 86400)->format('H:i');
        $finish = Carbon::parse(($row[4]- 25569) * 86400)->format('H:i');
        $duration = Carbon::parse(($row[5]- 25569) * 86400)->format('H:i');
        // dd($row[6]);
        // dd($lhr);
        return new training([
            'judul_training' => $row[0],
            'speaker' => $row[1],
            'tgl_train' => $tgltrain,
            'start' => $start,
            'finish' => $finish,
            'duration' => $duration,
        ]);
    }
}