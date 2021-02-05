<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DataPositionRequest;
use Illuminate\Http\Request;
use App\activitylog;
use App\loginlog;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class DataLogController extends Controller
{
    public function loginlog()
    {
      $items = loginlog::orderBy('created_at','DESC')
                ->get();
      return view('pages.admin.datalog.login',[
            'items' => $items
        ]);
    }
    public function activitylog()
    {
      $items = activitylog::orderBy('created_at','DESC')
                ->get();
      return view('pages.admin.datalog.activity',[
            'items' => $items
        ]);
    }
}