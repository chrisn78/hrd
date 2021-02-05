<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TypeVioDropController extends Controller
{
    public function myformAjax($id)
    {
       $cities = DB::table("typeviolations")
                    ->where("category",$id)
                    ->pluck("nama_sp","id");
        return json_encode($cities);
    }
}