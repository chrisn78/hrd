<?php

namespace App\Http\Controllers\Admin;

use App\training;
use App\activitylog;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DataTrainRequest;
use Illuminate\Http\Request;
use SebastianBergmann\Timer\Duration;

class DataTrainController extends Controller
{
    public function index()
    {
        $items = Training::all();
        $item2 = DB::table('trainings')
        ->whereNull('trainings.deleted_at')
        ->select(DB::raw("SEC_TO_TIME(SUM(TIME_TO_SEC(duration))) AS `result`"))
        ->pluck('result');

        $item4 = trim($item2, '[""]');
        return view('pages.admin.datatrain.index',[
            'items' => $items,
            'items2' =>$item4
        ]);
    }

    public function create()
    {

        return view('pages.admin.datatrain.create');
    }
    public function store(DataTrainRequest $request)
    {
        $data = $request->all();
        $finish = Carbon::parse($request->finish);
        $start = Carbon::parse($request->start);
        $datetrain = Carbon::parse($request->tgl_train)->format('d F Y');
        $log = new activitylog();
        $log->nama_user = Auth::user()->info_kary->nama_kary;
        $log->dept = Auth::user()->info_kary->data_positions->department;
        $log->roles = Auth::user()->roles;
        $log->action = "Add Training";
        $log->description = "Add Data Training : '$request->judul_training' , Speaker : '$request->speaker' , 'Tanggal $datetrain' ";
        $log->save();
        $duration =  $start->diff($finish);
        $data['duration'] = $duration->format('%H:%i');
        $data['start'] = $start;
        $data['finish'] = $finish;

        Training::create($data);
        if($request->button == 'exit'){
            return redirect()->route('data_train.index');
        }else{
            return redirect()->route('data_train.create');
        }
    }
    public function edit($id)
    {
        $item=Training::FindOrFail($id);

        return view('pages.admin.datatrain.edit',[
            'item'=>$item
        ]);
    }
    public function update(DataTrainRequest $request, $id)
    {
        $data = $request->all();
        $finish = Carbon::parse($request->finish);
        $start = Carbon::parse($request->start);
        $duration =  $start->diff($finish);
        $data['duration'] = $duration->format('%H:%i');
        $data['start'] = $start;
        $data['finish'] = $finish;

        $train = training::FindOrFail($id);
        $datetrain = Carbon::parse($request->tgl_train)->format('d F Y');
        $start1 = Carbon::parse($request->start)->format('H:i:s');
        $finish1 = Carbon::parse($request->finish)->format('H:i:s');
        if($train['judul_training'] != $request->judul_training ){
            $name=$train['judul_training'];
            $log = new activitylog();
            $log->nama_user = Auth::user()->info_kary->nama_kary;
            $log->dept = Auth::user()->info_kary->data_positions->department;
            $log->roles = Auth::user()->roles;
            $log->action = "Edit Training";
            $log->description = "Change title of training($id) from '$name' to '$request->judul_training'";
            $log->save();
        }
        if($train['judul_training'] != $request->judul_training ){
            $tname=$request->judul_training;
        } else {
            $tname=$train['judul_training'];
        }
        if($train['speaker'] != $request->speaker ){
            $name=$train['speaker'];
            $log = new activitylog();
            $log->nama_user = Auth::user()->info_kary->nama_kary;
            $log->dept = Auth::user()->info_kary->data_positions->department;
            $log->roles = Auth::user()->roles;
            $log->action = "Edit Training";
            $log->description = "Change speaker($id)($tname) from '$name' to '$request->speaker'";
            $log->save();
        }
        if($train['tgl_train'] != $request->tgl_train ){
            $name=Carbon::parse($train['tgl_train'])->format('d F Y');
            $log = new activitylog();
            $log->nama_user = Auth::user()->info_kary->nama_kary;
            $log->dept = Auth::user()->info_kary->data_positions->department;
            $log->roles = Auth::user()->roles;
            $log->action = "Edit Training";
            $log->description = "Change date of training($id)($tname) from '$name' to '$datetrain'";
            $log->save();
        }
        if($train['start'] != $start ){
            $name=Carbon::parse($train['start'])->format('H:i:s');
            $log = new activitylog();
            $log->nama_user = Auth::user()->info_kary->nama_kary;
            $log->dept = Auth::user()->info_kary->data_positions->department;
            $log->roles = Auth::user()->roles;
            $log->action = "Edit Training";
            $log->description = "Change start time($id)($tname) from '$name' to '$start1'";
            $log->save();
        }
        if($train['finish'] != $finish ){
            $name=Carbon::parse($train['finish'])->format('H:i:s');
            $log = new activitylog();
            $log->nama_user = Auth::user()->info_kary->nama_kary;
            $log->dept = Auth::user()->info_kary->data_positions->department;
            $log->roles = Auth::user()->roles;
            $log->action = "Edit Training";
            $log->description = "Change finish time($id)($tname) from '$name' to '$finish1'";
            $log->save();
        }
        $item=Training::findorfail($id);

        $item->update($data);
        return redirect()->route('data_train.index');
    }
    public function destroy($id)
    {
        $item=Training::findorfail($id);
        $item->delete();

        return redirect()->route('data_train.index');
    }

}
