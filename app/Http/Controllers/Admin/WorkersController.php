<?php

namespace App\Http\Controllers\Admin;

use App\karyawan;
use App\Position;
use App\Http\Requests\Admin\DataKaryRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorkersController extends Controller
{
    public function index()
    {
            $item = Karyawan::with(['data_positions'])->findOrFail(Auth::user()->id_kary);
                $items = DB::table('karyawans')
                        ->join('violations', 'karyawans.id', '=', 'violations.id_kary')
                        ->join('typeviolations', 'typeviolations.id', '=', 'violations.id_sp')
                        ->where('violations.id_kary',Auth::user()->id_kary)
                        ->whereNull('violations.deleted_at')
                        ->orderBy('violations.tgl_sp',"ASC")
                        ->get();
                    // $aksesgaji = "y";
                    return view('pages.admin.datkary.detail', [
                        'item' => $item,
                        'items' => $items,
                        // 'akses' => $aksesgaji
                ]);
    }
}