<?php

namespace App\Exports;

use App\karyawan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;


class KaryawanExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return karyawan::all();
    }
     public function headings(): array
    {
        return [
            '#',
            'NIK',
            'No Payroll',
            'ID Posisi',
            'Join Date',
            'Image Path',
            'Nama',
            'Alamat',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Agama',
            'Gender',
            'Gol Darah',
            'Status Pernikahan',
            'Nama Istri',
            'Nama Anak',
            'Pendidikan',
            'No HP',
            'No Rek BCA',
            'NPWP',
            'BPJS Kes',
            'BPJS TK',
            'Status Posisi',

        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }
}