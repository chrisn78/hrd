<?php

namespace App\Http\Controllers\Admin;

use App\karyawan;
use App\Position;
use App\Http\Requests\Admin\DataKaryRequest;
use App\Http\Controllers\Controller;
use App\training;
use Illuminate\Http\Request;

class DataKaryController extends Controller
{
    public function index()
    {
        $items = Karyawan::with(['data_positions'])
                ->where('status_posisi','PKWT')
                ->orWhere('status_posisi','DW')
                ->get();
        $item1 = 'edit';
        return view('pages.admin.datkary.index', [
            'items' => $items,
            'item1' => $item1
        ]);
    }
    public function create()
    {
        $data_positions = Position::all();
        return view('pages.admin.datkary.create', ['data_positions' => $data_positions]);
    }
    public function show($id)
    {
        $item = Karyawan::with(['data_positions'])->findOrFail($id);

        return view('pages.admin.datkary.detail', [
            'item' => $item
        ]);
    }
    public function store(DataKaryRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/foto',
            'public'
        );

        Karyawan::create($data);
        return redirect()->route('data_kary.index');
    }

    public function edit($id)
    {
        $item = Karyawan::with(['data_positions'])->FindOrFail($id);
        $data_positions = Position::all();

        return view('pages.admin.datkary.edit', [
            'item' => $item,
            'data_positions' => $data_positions
        ]);
    }
    public function update(DataKaryRequest $request, $id)
    {
        $data = $request->all();
        $foto = $request->file('image');
        if($foto) {
            $data['image'] = $request->file('image')->store(
            'assets/foto',
            'public'
            );
        }

        $item = Karyawan::findorfail($id);

        $item->update($data);
        return redirect()->route('data_kary.index');
    }
    public function destroy($id)
    {
        $item = Karyawan::findorfail($id);
        $item->delete();

        return redirect()->route('data_kary.index');
    }
}