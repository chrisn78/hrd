<?php

namespace App\Http\Controllers\Admin;

use App\karyawan;
use App\Position;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KaryDeactiveController extends Controller
{
    public function index()
    {
        $items = Karyawan::with(['data_positions'])
                ->where('status_posisi','Deactive')
                ->get();
        $title1 = 'nonaktif';
        return view('pages.admin.datkary.index', [
            'items' => $items,
            'title1' => $title1
        ]);
    }

    public function show($id)
    {
        $item = Karyawan::with(['data_positions'])->findOrFail($id);

        return view('pages.admin.datkary.detail', [
            'item' => $item
        ]);
    }
}