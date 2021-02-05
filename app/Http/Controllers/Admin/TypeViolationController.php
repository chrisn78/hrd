<?php

namespace App\Http\Controllers\Admin;
use App\activitylog;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\typeviolation;
use App\violation;
use Illuminate\Http\Request;

class TypeViolationController extends Controller
{
    public function index()
    {

        $items = typeviolation::all();
        return view('pages.admin.datatypev.index',[
            'items' => $items
        ]);
    }
    public function create()
    {
        return view('pages.admin.datatypev.create');
    }
    public function store(Request $request)
    {
        $data = $request->all();

        $log = new activitylog();
        $log->nama_user = Auth::user()->info_kary->nama_kary;
        $log->dept = Auth::user()->info_kary->data_positions->department;
        $log->roles = Auth::user()->roles;
        $log->action = "Add Violation";
        $log->description = "Add Data Violation, Category : '$request->category', Violation : '$request->nama_sp'";
        $log->save();

        typeviolation::create($data);
        if($request->button == 'exit'){
            return redirect()->route('type_violation.index');
        }else{
            return redirect()->route('type_violation.create');
        }
    }
    public function edit($id)
    {
        $item=typeviolation::FindOrFail($id);

        return view('pages.admin.datatypev.edit',[
            'vio'=>$item
        ]);
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $typev = typeviolation::FindOrFail($id);

        if($typev['category'] != $request->category ){
            $name=$typev['category'];
            $log = new activitylog();
            $log->nama_user = Auth::user()->info_kary->nama_kary;
            $log->dept = Auth::user()->info_kary->data_positions->department;
            $log->roles = Auth::user()->roles;
            $log->action = "Edit Type Violation";
            $log->description = "Change violation category($id) from '$name' to '$request->category'";
            $log->save();
        }
        if($typev['nama_sp'] != $request->nama_sp ){
            $name=$typev['nama_sp'];
            $log = new activitylog();
            $log->nama_user = Auth::user()->info_kary->nama_kary;
            $log->dept = Auth::user()->info_kary->data_positions->department;
            $log->roles = Auth::user()->roles;
            $log->action = "Edit Type Violation";
            $log->description = "Change name of violation($id) from '$name' to '$request->nama_sp'";
            $log->save();
        }
        $item=typeviolation::findorfail($id);

        $item->update($data);
        return redirect()->route('type_violation.index');
    }
    public function destroy($id)
    {
        $item=typeviolation::findorfail($id);
        $item->delete();

        return redirect()->route('type_violation.index');
    }
}
