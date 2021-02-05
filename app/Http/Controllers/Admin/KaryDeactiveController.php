<?php

namespace App\Http\Controllers\Admin;

use App\karyawan;
use App\Position;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KaryDeactiveController extends Controller
{
    public function index()
    {
        if(Auth::user()->dept == "all") {
        $items = Karyawan::with(['data_positions'])
                ->where('status_posisi','Deactive')
                ->get();
        $title1 = 'nonaktif';
        return view('pages.admin.datkary.index', [
            'items' => $items,
            'title1' => $title1
        ]);
        }
        elseif(Auth::user()->dept == "acc") {
        $items = Karyawan::whereHas('data_positions', function($q)
                {
                    $q->where('department','accounting');
                })
                ->whereHas('data_positions', function($q) {
                    $q->where('level','!=','Level I');
                })
                ->where('status_posisi','Deactive')
                ->get();
        $title1 = 'nonaktif';
        return view('pages.admin.datkary.index', [
            'items' => $items,
            'title1' => $title1
        ]);
        }
        elseif(Auth::user()->dept == "hrsec") {
        $items = Karyawan::whereHas('data_positions', function($q)
                {
                    $q->where('department','human resource' || 'security'  );
                })
                // ->orWhereHas('data_positions', function($q) {
                //     $q->where('department','security');
                // })
                ->where('status_posisi','Deactive')
                ->get();
        $title1 = 'nonaktif';
        return view('pages.admin.datkary.index', [
            'items' => $items,
            'title1' => $title1
        ]);
        }
        elseif(Auth::user()->dept == "hkls") {
        $items = Karyawan::whereHas('data_positions', function($q)
                {
                    $q->where('department','housekeeping')->orwhere('department','laundry')->orwhere('department','spa & recreation');
                })
                ->where('status_posisi','Deactive')
                ->get();
       $title1 = 'nonaktif';
        return view('pages.admin.datkary.index', [
            'items' => $items,
            'title1' => $title1
        ]);
        }
        elseif(Auth::user()->dept == "fo") {
        $items = Karyawan::whereHas('data_positions', function($q)
                {
                    $q->where('department','front office');
                })
                ->where('status_posisi','Deactive')
                ->get();
        $title1 = 'nonaktif';
        return view('pages.admin.datkary.index', [
            'items' => $items,
            'title1' => $title1
        ]);
        }
        elseif(Auth::user()->dept == "fbs") {
        $items = Karyawan::whereHas('data_positions', function($q)
                {
                    $q->where('department','f&b service');
                })
                ->where('status_posisi','Deactive')
                ->get();
        $title1 = 'nonaktif';
        return view('pages.admin.datkary.index', [
            'items' => $items,
            'title1' => $title1
        ]);
        }
        elseif(Auth::user()->dept == "fbp") {
        $items = Karyawan::whereHas('data_positions', function($q)
                {
                    $q->where('department','f&b product');
                })
                ->where('status_posisi','Deactive')
                ->get();
        $title1 = 'nonaktif';
        return view('pages.admin.datkary.index', [
            'items' => $items,
            'title1' => $title1
        ]);
        }
        elseif(Auth::user()->dept == "eng") {
        $items = Karyawan::whereHas('data_positions', function($q)
                {
                    $q->where('department','engineering');
                })
                ->where('status_posisi','Deactive')
                ->get();
       $title1 = 'nonaktif';
        return view('pages.admin.datkary.index', [
            'items' => $items,
            'title1' => $title1
        ]);
        }
        elseif(Auth::user()->dept == "s&m") {
        $items = Karyawan::whereHas('data_positions', function($q)
                {
                    $q->where('department','sales & marketing');
                })
                ->where('status_posisi','Deactive')
                ->get();
        $title1 = 'nonaktif';
        return view('pages.admin.datkary.index', [
            'items' => $items,
            'title1' => $title1
        ]);
        }
    }

    public function show($id)
    {
        $item = Karyawan::with('data_positions')->findOrFail($id);

        return view('pages.admin.datkary.detail', [
            'item' => $item
        ]);
    }
}