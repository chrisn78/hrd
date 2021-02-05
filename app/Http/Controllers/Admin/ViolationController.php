<?php

namespace App\Http\Controllers\Admin;

use App\activitylog;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TypeVioRequest;
use Illuminate\Http\Request;
use App\violation;
use App\karyawan;
use App\typeviolation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use function PHPSTORM_META\type;

class ViolationController extends Controller
{
    public function index()
    {
        if(Auth::user()->dept == "all") {
        $items = DB::table('karyawans')
            ->join('positions', 'karyawans.id_position', '=', 'positions.id')
            ->join('violations', 'karyawans.id', '=', 'violations.id_kary')
             ->join('typeviolations', 'typeviolations.id', '=', 'violations.id_sp')
            ->select('nama_kary','image','name_position','department','violations.id','violations.tgl_sp','violations.detail_sp','typeviolations.nama_sp','typeviolations.category')
            ->whereNull('violations.deleted_at')
            ->get();
        return view('pages.admin.datasp.index',[
            'items' => $items
        ]);
        }elseif(Auth::user()->dept == "acc") {
        $items = DB::table('karyawans')
            ->join('positions', 'karyawans.id_position', '=', 'positions.id')
            ->join('violations', 'karyawans.id', '=', 'violations.id_kary')
             ->join('typeviolations', 'typeviolations.id', '=', 'violations.id_sp')
            ->select('nama_kary','image','name_position','department','violations.id','violations.tgl_sp','violations.detail_sp','typeviolations.nama_sp','typeviolations.category')
            ->whereNull('violations.deleted_at')
            ->where('positions.department','=','accounting')
            ->get();
        return view('pages.admin.datasp.index',[
            'items' => $items
        ]);
        }elseif(Auth::user()->dept == "fo") {
        $items = DB::table('karyawans')
            ->join('positions', 'karyawans.id_position', '=', 'positions.id')
            ->join('violations', 'karyawans.id', '=', 'violations.id_kary')
             ->join('typeviolations', 'typeviolations.id', '=', 'violations.id_sp')
            ->select('nama_kary','image','name_position','department','violations.id','violations.tgl_sp','violations.detail_sp','typeviolations.nama_sp','typeviolations.category')
            ->whereNull('violations.deleted_at')
            ->where('positions.department','=','front office')
            ->get();
        return view('pages.admin.datasp.index',[
            'items' => $items
        ]);
        }elseif(Auth::user()->dept == "fbs") {
        $items = DB::table('karyawans')
            ->join('positions', 'karyawans.id_position', '=', 'positions.id')
            ->join('violations', 'karyawans.id', '=', 'violations.id_kary')
             ->join('typeviolations', 'typeviolations.id', '=', 'violations.id_sp')
            ->select('nama_kary','image','name_position','department','violations.id','violations.tgl_sp','violations.detail_sp','typeviolations.nama_sp','typeviolations.category')
            ->whereNull('violations.deleted_at')
            ->where('positions.department','=','f&b service')
            ->get();
        return view('pages.admin.datasp.index',[
            'items' => $items
        ]);
        }elseif(Auth::user()->dept == "fbp") {
        $items = DB::table('karyawans')
            ->join('positions', 'karyawans.id_position', '=', 'positions.id')
            ->join('violations', 'karyawans.id', '=', 'violations.id_kary')
             ->join('typeviolations', 'typeviolations.id', '=', 'violations.id_sp')
            ->select('nama_kary','image','name_position','department','violations.id','violations.tgl_sp','violations.detail_sp','typeviolations.nama_sp','typeviolations.category')
            ->whereNull('violations.deleted_at')
            ->where('positions.department','=','f&b product')
            ->get();
        return view('pages.admin.datasp.index',[
            'items' => $items
        ]);
        }elseif(Auth::user()->dept == "s&m") {
        $items = DB::table('karyawans')
            ->join('positions', 'karyawans.id_position', '=', 'positions.id')
            ->join('violations', 'karyawans.id', '=', 'violations.id_kary')
             ->join('typeviolations', 'typeviolations.id', '=', 'violations.id_sp')
            ->select('nama_kary','image','name_position','department','violations.id','violations.tgl_sp','violations.detail_sp','typeviolations.nama_sp','typeviolations.category')
            ->whereNull('violations.deleted_at')
            ->where('positions.department','=','sales & marketing')
            ->get();
        return view('pages.admin.datasp.index',[
            'items' => $items
        ]);
        }elseif(Auth::user()->dept == "eng") {
        $items = DB::table('karyawans')
            ->join('positions', 'karyawans.id_position', '=', 'positions.id')
            ->join('violations', 'karyawans.id', '=', 'violations.id_kary')
             ->join('typeviolations', 'typeviolations.id', '=', 'violations.id_sp')
            ->select('nama_kary','image','name_position','department','violations.id','violations.tgl_sp','violations.detail_sp','typeviolations.nama_sp','typeviolations.category')
            ->whereNull('violations.deleted_at')
            ->where('positions.department','=','engineering')
            ->get();
        return view('pages.admin.datasp.index',[
            'items' => $items
        ]);
        }elseif(Auth::user()->dept == "hkls") {
        $items = DB::table('karyawans')
            ->join('positions', 'karyawans.id_position', '=', 'positions.id')
            ->join('violations', 'karyawans.id', '=', 'violations.id_kary')
             ->join('typeviolations', 'typeviolations.id', '=', 'violations.id_sp')
            ->select('nama_kary','image','name_position','department','violations.id','violations.tgl_sp','violations.detail_sp','typeviolations.nama_sp','typeviolations.category')
            ->whereNull('violations.deleted_at')
            ->where('positions.department','=','housekeeping')
            ->orwhere('positions.department','=','laundry')
            ->orwhere('positions.department','=','spa')
            ->get();
        return view('pages.admin.datasp.index',[
            'items' => $items
        ]);
        }elseif(Auth::user()->dept == "hrsec") {
        $items = DB::table('karyawans')
            ->join('positions', 'karyawans.id_position', '=', 'positions.id')
            ->join('violations', 'karyawans.id', '=', 'violations.id_kary')
             ->join('typeviolations', 'typeviolations.id', '=', 'violations.id_sp')
            ->select('nama_kary','image','name_position','department','violations.id','violations.tgl_sp','violations.detail_sp','typeviolations.nama_sp','typeviolations.category')
            ->whereNull('violations.deleted_at')
            ->where('positions.department','=','human resource')
            ->orwhere('positions.department','=','security')
            ->get();
        return view('pages.admin.datasp.index',[
            'items' => $items
        ]);
        }
    }
    public function create()
    {
        $data_karys = karyawan::with(['data_positions'])->get();
        return view('pages.admin.datasp.create', [
            'data_karys' => $data_karys,
        ]);
    }
    public function store(TypeVioRequest $request)
    {
        $data = $request->all();
        $kary = karyawan::FindOrFail($request->id_kary);
        $worker = $kary['nama_kary'];
        $vio = typeviolation::FindOrFail($request->id_sp);
        $datesp = Carbon::parse($request->tgl_sp)->format('d F Y');
        $nmsp = $vio['nama_sp'];
        $log = new activitylog();
        $log->nama_user = Auth::user()->info_kary->nama_kary;
        $log->dept = Auth::user()->info_kary->data_positions->department;
        $log->roles = Auth::user()->roles;
        $log->action = "Add Worker Violation";
        $log->description = "Add Worker Violation, Name : '$worker', Violation : '$nmsp' , Date : '$datesp' ";
        $log->save();

        violation::create($data);
        if($request->button == 'exit'){
            return redirect()->route('violation.index');
        }else{
            return redirect()->route('violation.create');
        }
    }
    public function edit($id)
    {
        $item = DB::table('karyawans')
            ->join('positions', 'karyawans.id_position', '=', 'positions.id')
            ->join('violations', 'karyawans.id', '=', 'violations.id_kary')
            ->join('typeviolations', 'typeviolations.id', '=', 'violations.id_sp')
            ->select('nama_kary','name_position','department','violations.id_kary','typeviolations.category')
            ->where('violations.id',$id)
            ->whereNull('violations.deleted_at')
            ->first();
        $vio = violation::with(['data_kary'])->FindOrFail($id);
        return view('pages.admin.datasp.edit',[
            'item'=>$item,
            'vio'=>$vio
        ]);
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $vio = violation::FindOrFail($id);

        if($vio['id_kary'] != $request->id_kary ){
            $kary = karyawan::FindOrFail($vio->id_kary);
            $kary1 = karyawan::FindOrFail($request->id_kary);
            $log = new activitylog();
            $log->nama_user = Auth::user()->info_kary->nama_kary;
            $log->dept = Auth::user()->info_kary->data_positions->department;
            $log->roles = Auth::user()->roles;
            $log->action = "Edit Worker Violation";
            $log->description = "Change worker($id) from '$kary->nama_kary' to '$kary1->nama_kary'";
            $log->save();
        }
        if($vio['id_sp'] != $request->id_sp ){
            $wvio = typeviolation::FindOrFail($vio->id_sp);
            $wvio1 = typeviolation::FindOrFail($request->id_sp);
            $kary1 = karyawan::FindOrFail($request->id_kary);
            $log = new activitylog();
            $log->nama_user = Auth::user()->info_kary->nama_kary;
            $log->dept = Auth::user()->info_kary->data_positions->department;
            $log->roles = Auth::user()->roles;
            $log->action = "Edit Worker Violation";
            $log->description = "Change violation category of '$kary1->nama_kary' from '$vio->id_sp' '$wvio->category' to '$request->id_sp' '$wvio1->category'";
            $log->save();
        }
        if($vio['tgl_sp'] != $request->tgl_sp ){
            $datesp = Carbon::parse($request->tgl_sp)->format('d F Y');
            $name=Carbon::parse($vio['tgl_sp'])->format('d F Y');
            $kary1 = karyawan::FindOrFail($request->id_kary);
            $log = new activitylog();
            $log->nama_user = Auth::user()->info_kary->nama_kary;
            $log->dept = Auth::user()->info_kary->data_positions->department;
            $log->roles = Auth::user()->roles;
            $log->action = "Edit Worker Violation";
            $log->description = "Change date violation of '$kary1->nama_kary' from '$name' to '$datesp'";
            $log->save();
        }
        if($vio['detail_sp'] != $request->detail_sp ){
            $kary1 = karyawan::FindOrFail($request->id_kary);
            $name=$vio['detail_sp'];
            $log = new activitylog();
            $log->nama_user = Auth::user()->info_kary->nama_kary;
            $log->dept = Auth::user()->info_kary->data_positions->department;
            $log->roles = Auth::user()->roles;
            $log->action = "Edit Worker Violation";
            $log->description = "Change detail violation of '$kary1->nama_kary' from '$name' to '$request->detail_sp'";
            $log->save();
        }

        $item=violation::findorfail($id);

        $item->update($data);
        return redirect()->route('violation.index');
    }
    public function destroy($id)
    {
        $item=violation::findorfail($id);
        $item->delete();

        return redirect()->route('violation.index');
    }
}
