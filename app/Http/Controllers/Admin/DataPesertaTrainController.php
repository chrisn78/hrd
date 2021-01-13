<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\karyawan;
use App\training;
use App\Http\Requests\Admin\DataPesertaTrainRequest;
use App\Http\Controllers\Controller;
use App\karyawan_training;
use Illuminate\Http\Request;

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
        $training -> karyawan()->attach($request->karyawan_id);
        return redirect()->route('data_peserta_edit', $request->training_id);
    }
    public function removePeserta($t_id, $k_id)
    {
        $training = training::findOrFail($t_id);
        $karyawan = karyawan::findOrFail($k_id);
        $training->karyawan()->detach($karyawan);
        return redirect()->route('data_peserta_edit', $t_id);
    }
}