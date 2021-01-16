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

		// import data
		Excel::import(new KaryawanImport, $file);

		// notifikasi dengan session
		Session::flash('sukses','Data Karyawan Berhasil Diimport!');

		// alihkan halaman kembali
		return redirect()->route('data_kary.index');
	}
}