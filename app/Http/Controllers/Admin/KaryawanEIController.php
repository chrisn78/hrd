<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Exports\KaryawanExport;
use App\Imports\KaryawanImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\karyawan;

class KaryawanEIController extends Controller
{
    public function export_excel()
	{
		return Excel::download(new KaryawanExport, 'karyawan.xlsx');
    }
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
		$file->move('file_kary',$nama_file);

		// import data
		Excel::import(new KaryawanImport, public_path('/file_kary/'.$nama_file));

		// notifikasi dengan session
		Session::flash('sukses','Data Karyawab Berhasil Diimport!');

		// alihkan halaman kembali
		return redirect()->route('data_kary.index');
	}
}