<?php

namespace App\Http\Controllers\Admin;

use App\Exports\DataTrainingExport;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\DataTrainingImport;
use Maatwebsite\Excel\Facades\Excel;

class DataTrainingImportController extends Controller
{
    public function export_excel()
	{
        return Excel::download(new DataTrainingExport, 'training.xlsx');
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
		Excel::import(new DataTrainingImport, $file);

		// notifikasi dengan session
		Session::flash('sukses','Data Training Berhasil Diimport!');

		// alihkan halaman kembali
		return redirect()->route('data_train.index');
	}
}