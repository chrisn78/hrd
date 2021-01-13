<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DataPositionRequest;
use Illuminate\Http\Request;
use App\Position;
use Illuminate\Support\Str;

class DataJabController extends Controller
{
    public function index()
    {
        $items = Position::all();
        return view('pages.admin.datjab.index',[
            'items' => $items
        ]);
    }
    public function create()
    {
        return view('pages.admin.datjab.create');
    }
    public function store(DataPositionRequest $request)
    {
        $data = $request->all();
        Position::create($data);
        return redirect()->route('data-jab.index');
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

        $item=Position::findorfail($id);

        $item->update($data);
        return redirect()->route('data-jab.index');
    }
    public function destroy($id)
    {
        $item=Position::findorfail($id);
        $item->delete();

        return redirect()->route('data-jab.index');
    }
}