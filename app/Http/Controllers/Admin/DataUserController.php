<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\karyawan;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;
use App\activitylog;

class DataUserController extends Controller
{
    public function index()
    {
        $items = DB::table('users')
            ->join('karyawans', 'karyawans.id', '=', 'users.id_kary')
            ->select('users.id','users.gender','users.dept','users.email','users.password','users.roles','karyawans.nama_kary')
            ->get();
        return view('pages.admin.datuser.index',[
            'items' => $items
        ]);
    }
    public function create()
    {
        $data_kary = Karyawan::with(['data_positions'])->get();
        return view('pages.admin.datuser.create', ['data_kary' => $data_kary]);
    }
    public function store(Request $request)
    {
        $rules = [
            'id_kary'               => 'required',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|confirmed'
        ];

        $messages = [
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
        $kary1 = karyawan::FindOrFail($request->id_kary);
        $log = new activitylog();
        $log->nama_user = Auth::user()->info_kary->nama_kary;
        $log->dept = Auth::user()->info_kary->data_positions->department;
        $log->roles = Auth::user()->roles;
        $log->action = "Add User";
        $log->description = "Add User Named : '$kary1->nama_kary', dept access : '$request->dept', roles : '$request->roles' ";
        $log->save();

        $user = new User;
        $user->id_kary = $request->id_kary;
        $user->gender = $request->gender;
        $user->dept = $request->dept;
        $user->email = strtolower($request->email);
        $user->roles = strtolower($request->roles);
        $user->password = Hash::make($request->password);
        $user->email_verified_at = \Carbon\Carbon::now();
        $simpan = $user->save();
        if($request->button == 'exit'){
            if($simpan){
            Session::flash('success', 'Penambahan User Berhasil');
            return redirect()->route('data_user.index');
        } else {
            Session::flash('errors', ['' => 'Penambahan User Gagal!']);
            return redirect()->route('data_user.create');
        }
        }else{
            if($simpan){
            Session::flash('success', 'Penambahan User Berhasil');
            return redirect()->route('data_user.create');
        } else {
            Session::flash('errors', ['' => 'Penambahan User Gagal!']);
            return redirect()->route('data_user.create');
        }
        }

    }
    public function edit($id)
    {
        $item=user::with(['info_kary'])->FindOrFail($id);
        return view('pages.admin.datuser.edit',[
            'item'=> $item
        ]);
    }
    public function update(Request $request, $id)
    {
        $item = user::findorfail($id);
        $namakary = $item->info_kary->nama_kary;
        if($request->password) {
            $pass = Hash::make($request->password);
            if($item['email'] != $request->email ){
                $log = new activitylog();
                $log->nama_user = Auth::user()->info_kary->nama_kary;
                $log->dept = Auth::user()->info_kary->data_positions->department;
                $log->roles = Auth::user()->roles;
                $log->action = "Change Email";
                $log->description = "Changed email of user Named : '$namakary', from : '$item->email', to : '$request->email' ";
                $log->save();
            }
            if($item['dept'] != $request->dept ){
                $log = new activitylog();
                $log->nama_user = Auth::user()->info_kary->nama_kary;
                $log->dept = Auth::user()->info_kary->data_positions->department;
                $log->roles = Auth::user()->roles;
                $log->action = "Change Dept Access";
                $log->description = "Changed dept access of user Named : '$namakary', from : '$item->dept', to : '$request->dept' ";
                $log->save();
            }
            if($item['email'] != $request->email ){
                $log = new activitylog();
                $log->nama_user = Auth::user()->info_kary->nama_kary;
                $log->dept = Auth::user()->info_kary->data_positions->department;
                $log->roles = Auth::user()->roles;
                $log->action = "Change Role";
                $log->description = "Changed role of user Named : '$namakary', from : '$item->roles', to : '$request->roles' ";
                $log->save();
            }
            $log = new activitylog();
                $log->nama_user = Auth::user()->info_kary->nama_kary;
                $log->dept = Auth::user()->info_kary->data_positions->department;
                $log->roles = Auth::user()->roles;
                $log->action = "Change Password";
                $log->description = "Changed password of user Named : '$namakary'";
                $log->save();
            $item->dept = $request->dept;
            $item->email = $request->email;
            $item->password = $pass;
            $item->roles = $request->roles;
            $item->save();
            return redirect()->route('data_user.index');
        }else{
            if($item['email'] != $request->email ){
                $log = new activitylog();
                $log->nama_user = Auth::user()->info_kary->nama_kary;
                $log->dept = Auth::user()->info_kary->data_positions->department;
                $log->roles = Auth::user()->roles;
                $log->action = "Change Email";
                $log->description = "Changed email of user Named : '$namakary', from : '$item->email', to : '$request->email' ";
                $log->save();
            }
            if($item['dept'] != $request->dept ){
                $log = new activitylog();
                $log->nama_user = Auth::user()->info_kary->nama_kary;
                $log->dept = Auth::user()->info_kary->data_positions->department;
                $log->roles = Auth::user()->roles;
                $log->action = "Change Dept Access";
                $log->description = "Changed dept access of user Named : '$namakary', from : '$item->dept', to : '$request->dept' ";
                $log->save();
            }
            if($item['email'] != $request->email ){
                $log = new activitylog();
                $log->nama_user = Auth::user()->info_kary->nama_kary;
                $log->dept = Auth::user()->info_kary->data_positions->department;
                $log->roles = Auth::user()->roles;
                $log->action = "Change Role";
                $log->description = "Changed role of user Named : '$namakary', from : '$item->roles', to : '$request->roles' ";
                $log->save();
            }
            $item->dept = $request->dept;
            $item->email = $request->email;
            $item->roles = $request->roles;
            $item->save();
            return redirect()->route('data_user.index');
        }


    }
    public function destroy($id)
    {
        $item=User::findorfail($id);
        $item->delete();

        return redirect()->route('data_user.index');
    }
}
