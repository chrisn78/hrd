<?php

namespace App\Http\Controllers\Admin;

use App\karyawan;
use App\position;
use App\activitylog;
use App\Http\Requests\Admin\DataKaryRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DataKaryController extends Controller
{
    public function index()
    {
        $deptAccess = Auth::user()->dept;
        $title1 = 'aktif';
        switch($deptAccess){
            case "acc":
                $items = Karyawan::whereHas('data_positions', function($q)
                {
                    $q->where('department',Auth::user()->info_kary->data_positions->department);
                })
                ->whereHas('data_positions', function($q) {
                    $q->where('level','!=','Level I');
                })
                ->where('status_posisi','!=','deactive')
                ->get();
                return view('pages.admin.datkary.index', [
                    'items' => $items,
                    'title1' => $title1
                ]);
            break;
            case "hrsec":
                $items = Karyawan::whereHas('data_positions', function($q)
                {
                    $q->where('department','human resource')->orWhere('department','security');
                })
                ->where('status_posisi','!=','deactive')
                ->get();
                return view('pages.admin.datkary.index', [
                    'items' => $items,
                    'title1' => $title1
                ]);
            break;
            case "hkls":
                $items = Karyawan::whereHas('data_positions', function($q)
                {
                    $q->where('department','housekeeping')->orWhere('department','laundry')->orWhere('department','spa & recreation');
                })
                ->where('status_posisi','!=','deactive')
                ->get();
                return view('pages.admin.datkary.index', [
                    'items' => $items,
                    'title1' => $title1
                ]);
            break;
            case "all":
                $items = Karyawan::with(['data_positions'])
                ->where('status_posisi','!=','deactive')
                ->get();
                return view('pages.admin.datkary.index', [
                    'items' => $items,
                    'title1' => $title1
                ]);
            break;
            default:
            $items = Karyawan::whereHas('data_positions', function($q)
                {
                    $q->where('department',Auth::user()->info_kary->data_positions->department);
                })
                ->where('status_posisi','!=','deactive')
                ->get();
                return view('pages.admin.datkary.index', [
                    'items' => $items,
                    'title1' => $title1
                ]);
        }
    }
    public function create()
    {
        $data_positions = position::all();
        return view('pages.admin.datkary.create', ['data_positions' => $data_positions]);
    }
    public function show($id)
    {
        $item = Karyawan::with(['data_positions'])->findOrFail($id);
        $items = DB::table('karyawans')
            ->join('violations', 'karyawans.id', '=', 'violations.id_kary')
            ->join('typeviolations', 'typeviolations.id', '=', 'violations.id_sp')
            ->where('violations.id_kary',$id)
            ->whereNull('violations.deleted_at')
            ->orderBy('violations.tgl_sp',"ASC")
            ->get();
        return view('pages.admin.datkary.detail', [
            'item' => $item,
            'items' => $items,
        ]);
    }
    public function store(DataKaryRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/foto',
            'public'
        );

        $log = new activitylog();
        $log->nama_user = Auth::user()->info_kary->nama_kary;
        $log->dept = Auth::user()->info_kary->data_positions->department;
        $log->roles = Auth::user()->roles;
        $log->action = "Add Worker";
        $log->description = "Add New Worker Named : $request->nama_kary";
        $log->save();

        Karyawan::create($data);
        if($request->button == 'exit'){
            return redirect()->route('data_kary.index');
        }else{
            return redirect()->route('data_kary.create');
        }
    }

    public function edit($id)
    {
        $item = Karyawan::with(['data_positions'])->FindOrFail($id);
        $data_positions = Position::all();

        return view('pages.admin.datkary.edit', [
            'item' => $item,
            'data_positions' => $data_positions
        ]);
    }
    public function update(DataKaryRequest $request, $id)
    {
        $data = $request->all();
        $foto = $request->file('image');
        if($foto) {
            $data['image'] = $request->file('image')->store(
            'assets/foto',
            'public'
            );
        }
        $kary = karyawan::FindOrFail($id);
        if($kary['id_position'] != $request->id_position ){
            $name=$kary['id_position'];
            $log = new activitylog();
            $log->nama_user = Auth::user()->info_kary->nama_kary;
            $log->dept = Auth::user()->info_kary->data_positions->department;
            $log->roles = Auth::user()->roles;
            $log->action = "Edit Worker";
            $log->description = "Change id position of $request->nama_kary  from $name to $request->id_position";
            $log->save();
        }
        if($kary['status_posisi'] != $request->status_posisi ){
            $name=$kary['status_posisi'];
            $log = new activitylog();
            $log->nama_user = Auth::user()->info_kary->nama_kary;
            $log->dept = Auth::user()->info_kary->data_positions->department;
            $log->roles = Auth::user()->roles;
            $log->action = "Edit Worker";
            $log->description = "Change position status of $request->nama_kary from $name to $request->status_posisi";
            $log->save();
        }
        if($kary['no_rek'] != $request->no_rek ){
            $name=$kary['no_rek'];
            $log = new activitylog();
            $log->nama_user = Auth::user()->info_kary->nama_kary;
            $log->dept = Auth::user()->info_kary->data_positions->department;
            $log->roles = Auth::user()->roles;
            $log->action = "Edit Worker";
            $log->description = "Change No Account of $request->nama_kary from $name to $request->no_rek";
            $log->save();
        }
        if ($request->remarks != null){
            if ($kary['remarks'] = null  )
            {
                $log = new activitylog();
                $log->nama_user = Auth::user()->info_kary->nama_kary;
                $log->dept = Auth::user()->info_kary->data_positions->department;
                $log->roles = Auth::user()->roles;
                $log->action = "Edit Worker";
                $log->description = "Add remark of $request->nama_kary $request->remark";
                $log->save();
            } else
            {
                $name=$kary['remarks'];
                $log = new activitylog();
                $log->nama_user = Auth::user()->info_kary->nama_kary;
                $log->dept = Auth::user()->info_kary->data_positions->department;
                $log->roles = Auth::user()->roles;
                $log->action = "Edit Worker";
                $log->description = "Change remark of $request->nama_kary from $name to $request->remarks";
                $log->save();
            }
        }

        $item = Karyawan::findorfail($id);
        $item->update($data);
        return redirect()->route('data_kary.index');
    }
    public function destroy($id)
    {
        $item = Karyawan::findorfail($id);

        $item->delete();

        return redirect()->route('data_kary.index');
    }
}
