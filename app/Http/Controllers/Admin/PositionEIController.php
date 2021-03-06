<?php

namespace App\Http\Controllers\Admin;

use App\Exports\PositionExport;
use Session;
use App\Imports\PositionImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\position;

class PositionEIController extends Controller
{

    public function export_excel()
	{
        return Excel::download(new PositionExport, 'jabatan.xlsx');
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
		Excel::import(new PositionImport, $file);

		// notifikasi dengan session
		Session::flash('sukses','Data Jabatan Berhasil Diimport!');

		// alihkan halaman kembali
		return redirect()->route('data-jab.index');
	}
}