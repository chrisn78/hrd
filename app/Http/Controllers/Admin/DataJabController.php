<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DataPositionRequest;
use Illuminate\Http\Request;
use App\position;
use App\activitylog;
use Illuminate\Support\Facades\Auth;

class DataJabController extends Controller
{
    public function index()
    {
        $deptName = Auth::user()->info_kary->data_positions->department;
        $deptAccess = Auth::user()->dept;
        switch($deptAccess){
            case "acc":
                $items = position::where('department',$deptName)->Where('level','!=','Level I')
                        ->get();
                        return view('pages.admin.datjab.index',['items' => $items]);
            break;
            case "hrsec":
                $items = position::where('department',$deptName)->orWhere('department','security')
                        ->get();
                        return view('pages.admin.datjab.index',['items' => $items]);
            break;
            case "hkls":
                $items = position::where('department',$deptName)->orWhere('department','laundry')->orWhere('department','spa & recreation')
                        ->get();
                        return view('pages.admin.datjab.index',['items' => $items]);
            break;
            case "all":
                $items = position::all();
                         return view('pages.admin.datjab.index',['items' => $items]);
            break;
            default:
            $items =position::where('department',$deptName)->get();
                    return view('pages.admin.datjab.index',['items' => $items]);
        }
    }
    public function create()
    {
        return view('pages.admin.datjab.create');
    }
    public function store(DataPositionRequest $request)
    {
        $data = $request->all();
        $log = new activitylog();
        $log->nama_user = Auth::user()->info_kary->nama_kary;
        $log->dept = Auth::user()->info_kary->data_positions->department;
        $log->roles = Auth::user()->roles;
        $log->action = "Add Position";
        $log->description = "Add Data Position Named '$request->name_position' of $request->department dept";
        $log->save();
        position::create($data);

        if($request->button == 'exit'){
            return redirect()->route('data-jab.index');
        }else{
            return redirect()->route('data-jab.create');
        }
    }
    public function edit($id)
    {
        $item=Position::FindOrFail($id);

        return view('pages.admin.datjab.edit',[
            'item'=>$item
        ]);
    }
    public function update(DataPositionRequest $request, $id)
    {
        $data = $request->all();

        $position = position::FindOrFail($id);

        if($position['name_position'] != $request->name_position ){
            $name=$position['name_position'];
            $log = new activitylog();
            $log->nama_user = Auth::user()->info_kary->nama_kary;
            $log->dept = Auth::user()->info_kary->data_positions->department;
            $log->roles = Auth::user()->roles;
            $log->action = "Edit Position";
            $log->description = "Change name of position($id) from '$name' to '$request->name_position'";
            $log->save();
        }
        if($position['name_position'] != $request->name_position ){
            $pname=$request->name_position;
        } else {
            $pname=$position['name_position'];
        }
        if ($position['level'] != $request->level){
            $name=$position['level'];
            $log = new activitylog();
            $log->nama_user = Auth::user()->info_kary->nama_kary;
            $log->dept = Auth::user()->info_kary->data_positions->department;
            $log->roles = Auth::user()->roles;
            $log->action = "Edit Position";
            $log->description = "Change level($id)($pname) from '$name' to '$request->level'";
            $log->save();
        }
        if ($position['department'] != $request->department){
            $name=$position['department'];
            $log = new activitylog();
            $log->nama_user = Auth::user()->info_kary->nama_kary;
            $log->dept = Auth::user()->info_kary->data_positions->department;
            $log->roles = Auth::user()->roles;
            $log->action = "Edit Position";
            $log->description = "Change department($id)($pname) from '$name' to '$request->department'";
            $log->save();
        }
        if ($position['basic_salary'] != $request->basic_salary){
            $name=$position['basic_salary'];
            $log = new activitylog();
            $log->nama_user = Auth::user()->info_kary->nama_kary;
            $log->dept = Auth::user()->info_kary->data_positions->department;
            $log->roles = Auth::user()->roles;
            $log->action = "Edit Position";
            $log->description = "Change number of salary($id)($pname) from '$name' to '$request->basic_salary'";
            $log->save();
        }
        if ( is_Null($position['remark']) && $position['remark'] != $request->remark ){
            $log = new activitylog();
            $log->nama_user = Auth::user()->info_kary->nama_kary;
            $log->dept = Auth::user()->info_kary->data_positions->department;
            $log->roles = Auth::user()->roles;
            $log->action = "Edit Position";
            $log->description = "Add remark($id)($pname) : '$request->remark'";
            $log->save();
        } elseif ( !empty($position['remark']) && $position['remark'] != $request->remark ){
            $name=$position['remark'];
            if($request->remark == null)
            {
            $log = new activitylog();
            $log->nama_user = Auth::user()->info_kary->nama_kary;
            $log->dept = Auth::user()->info_kary->data_positions->department;
            $log->roles = Auth::user()->roles;
            $log->action = "Edit Position";
            $log->description = "Delete remark($id)($pname) : '$name'";
            $log->save();
            }
            else
            {
            $log = new activitylog();
            $log->nama_user = Auth::user()->info_kary->nama_kary;
            $log->dept = Auth::user()->info_kary->data_positions->department;
            $log->roles = Auth::user()->roles;
            $log->action = "Edit Position";
            $log->description = "Change remark($id)($pname) from '$name' to '$request->remark'";
            $log->save();
            }
        }
        $item=position::FindOrFail($id);
        $item->update($data);

        return redirect()->route('data-jab.index');
    }
    public function destroy($id)
    {
        $item=position::findorfail($id);
        $item->delete();

        return redirect()->route('data-jab.index');
    }
}