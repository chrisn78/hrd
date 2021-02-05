<?php

namespace App\Http\Controllers\Admin;

use App\karyawan;
use App\training;
use App\activitylog;
use App\Http\Controllers\Controller;

use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DataPesertaTrainController extends Controller
{
    public function editPeserta($id)
    {
        $item = training::FindOrFail($id);
        $data_train = training::get();
        $data_karys = karyawan::with(['data_positions'])->get();
        $kpt = DB::table('karyawans')
            ->join('positions', 'karyawans.id_position', '=', 'positions.id')
            ->join('karyawan_training', 'karyawans.id', '=', 'karyawan_training.karyawan_id')
            ->join('trainings', 'karyawan_training.training_id', '=', 'trainings.id')
            ->where('trainings.id', $id)
            ->whereNull('trainings.deleted_at')
            ->get();
        return view('pages.admin.datatrain.editpeserta', [
            'item' => $item,
            'data_train' => $data_train,
            'data_karys' => $data_karys,
            'kpt' => $kpt,
        ]);
    }
    public function storePeserta(Request $request)
    {
        $training = training::findOrFail($request->training_id);
        $kary = Karyawan::with(['data_positions'])->findOrFail($request->karyawan_id);
        $dept = $kary->data_positions->department;
        $datetrain = Carbon::parse($training->tgl_train)->format('d F Y');
        $log = new activitylog();
        $log->nama_user = Auth::user()->info_kary->nama_kary;
        $log->dept = Auth::user()->info_kary->data_positions->department;
        $log->roles = Auth::user()->roles;
        $log->action = "Add Training Participant";
        $log->description = "Add participant Named : '$kary->nama_kary', Dept : '$dept', To training : '$training->judul_training', Date : '$datetrain' ";
        $log->save();
        $training -> karyawan()->attach($request->karyawan_id);
        return redirect()->route('data_peserta_edit', $request->training_id);
    }
    public function removePeserta($t_id, $k_id)
    {
        $training = training::findOrFail($t_id);
        $karyawan = karyawan::findOrFail($k_id);
        $kary = Karyawan::with(['data_positions'])->findOrFail($k_id);
        $dept = $kary->data_positions->department;
        $datetrain = Carbon::parse($training->tgl_train)->format('d F Y');
        $log = new activitylog();
        $log->nama_user = Auth::user()->info_kary->nama_kary;
        $log->dept = Auth::user()->info_kary->data_positions->department;
        $log->roles = Auth::user()->roles;
        $log->action = "Remove Training Participant";
        $log->description = "Remove participant Named : '$kary->nama_kary', Dept : '$dept', From training : '$training->judul_training', Date : '$datetrain' ";
        $log->save();
        $training->karyawan()->detach($karyawan);
        return redirect()->route('data_peserta_edit', $t_id);
    }
}
