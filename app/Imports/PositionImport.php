<?php

namespace App\Imports;

use App\position;
use Maatwebsite\Excel\Concerns\ToModel;

class PositionImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new position([
            'level' => $row[0],
            'name_position' => $row[1],
            'department' => $row[2]
        ]);
    }
}