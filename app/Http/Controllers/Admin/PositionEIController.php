<?php

namespace App\Http\Controllers\Admin;
use Session;
use App\Imports\PositionImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\position;

class PositionEIController extends Controller
{
    public function import_excel(Request $request)
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);

		// menangkap file excel
		$file = $request->file('file');

		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();

		// upload ke folder file_siswa di dalam folder public
		$file->move('file_position',$nama_file);

		// import data
		Excel::import(new PositionImport, public_path('/file_position/'.$nama_file));

		// notifikasi dengan session
		Session::flash('sukses','Data Jabatan Berhasil Diimport!');

		// alihkan halaman kembali
		return redirect()->route('data-jab.index');
	}
}