<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\karyawan;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;
use App\activitylog;

class ChangePassController extends Controller
{
    public function index()
    {
        $item=user::with(['info_kary'])->FindOrFail(Auth::user()->id);
        return view('pages.admin.datuser.changepass',[
            'item'=> $item
        ]);
    }
    public function update(Request $request, $id)
    {
        $item = user::with(['info_kary'])->findorfail($id);
        if($request->password) {
            $pass = Hash::make($request->password);
            $namakary = $item->info_kary->nama_kary;
            if($item['email'] != $request->email ){
                $log = new activitylog();
                $log->nama_user = Auth::user()->info_kary->nama_kary;
                $log->dept = Auth::user()->info_kary->data_positions->department;
                $log->roles = Auth::user()->roles;
                $log->action = "Change Email";
                $log->description = "User Named : '$namakary' has changed email from : '$item->email', to : '$request->email' ";
                $log->save();
            }
            $log = new activitylog();
                $log->nama_user = Auth::user()->info_kary->nama_kary;
                $log->dept = Auth::user()->info_kary->data_positions->department;
                $log->roles = Auth::user()->roles;
                $log->action = "Change Password";
                $log->description = "User Named : '$namakary' has changed his/her password ";
                $log->save();

            $item->email = $request->email;
            $item->password = $pass;
            $item->save();
            return redirect()->route('logout');
        }else{
            $namakary = $item->info_kary->nama_kary;
            if($item['email'] != $request->email ){
                $log = new activitylog();
                $log->nama_user = Auth::user()->info_kary->nama_kary;
                $log->dept = Auth::user()->info_kary->data_positions->department;
                $log->roles = Auth::user()->roles;
                $log->action = "Change Email";
                $log->description = "User Named : '$namakary' has changed email from : '$item->email', to : '$request->email' ";
                $log->save();
            }
            $item = user::findorfail($id);
            $item->email = $request->email;
            $item->save();
            return redirect()->route('logout');
        }

    }
}