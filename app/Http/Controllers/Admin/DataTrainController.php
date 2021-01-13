<?php

namespace App\Http\Controllers\Admin;

use App\training;
use Carbon\Carbon;
use App\DataKaryawan;
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
        $duration =  $start->diff($finish);
        $data['duration'] = $duration->format('%H:%i');
        $data['start'] = $start;
        $data['finish'] = $finish;

        Training::create($data);
        return redirect()->route('data_train.index');
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