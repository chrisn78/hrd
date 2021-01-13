<?php

namespace App\Http\Controllers\Admin;

use App\karyawan;
use App\position;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
            $fbs = DB::table('karyawans')
            ->join('positions', 'karyawans.id_position', '=', 'positions.id')
            ->where('positions.department', 'F&B Service')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $acc = DB::table('karyawans')
            ->join('positions', 'karyawans.id_position', '=', 'positions.id')
            ->where('positions.department', 'Accounting')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $fo = DB::table('karyawans')
            ->join('positions', 'karyawans.id_position', '=', 'positions.id')
            ->where('positions.department', 'Front Office')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $fbp = DB::table('karyawans')
            ->join('positions', 'karyawans.id_position', '=', 'positions.id')
            ->where('positions.department', 'F&B Product')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $hr = DB::table('karyawans')
            ->join('positions', 'karyawans.id_position', '=', 'positions.id')
            ->where('positions.department', 'Human Resource')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $hk = DB::table('karyawans')
            ->join('positions', 'karyawans.id_position', '=', 'positions.id')
            ->where('positions.department', 'Housekeeping')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $sm = DB::table('karyawans')
            ->join('positions', 'karyawans.id_position', '=', 'positions.id')
            ->where('positions.department', 'Sales & Marketing')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $eng = DB::table('karyawans')
            ->join('positions', 'karyawans.id_position', '=', 'positions.id')
            ->where('positions.department', 'Engineering')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $spa = DB::table('karyawans')
            ->join('positions', 'karyawans.id_position', '=', 'positions.id')
            ->where('positions.department', 'SPA & Recreation')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $ldy = DB::table('karyawans')
            ->join('positions', 'karyawans.id_position', '=', 'positions.id')
            ->where('positions.department', 'Laundry')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $sct = DB::table('karyawans')
            ->join('positions', 'karyawans.id_position', '=', 'positions.id')
            ->where('positions.department', 'Security')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $male = DB::table('karyawans')
            ->where('jenis_kel', 'MALE')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $female = DB::table('karyawans')
            ->where('jenis_kel', 'FEMALE')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $pkwt = DB::table('karyawans')
            ->where('status_posisi', 'PKWT')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $dw = DB::table('karyawans')
            ->where('status_posisi', 'DW')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $buddha = DB::table('karyawans')
            ->where('agama', 'buddha')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $hindu = DB::table('karyawans')
            ->where('agama', 'hindu')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $islam = DB::table('karyawans')
            ->where('agama', 'islam')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $katolik = DB::table('karyawans')
            ->where('agama', 'katolik')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $kristen = DB::table('karyawans')
            ->where('agama', 'kristen')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $sma = DB::table('karyawans')
            ->where('pendidikan', 'sma')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $smk = DB::table('karyawans')
            ->where('pendidikan', 'smk')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $d1 = DB::table('karyawans')
            ->where('pendidikan', 'd1')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $d2 = DB::table('karyawans')
            ->where('pendidikan', 'd2')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $d3 = DB::table('karyawans')
            ->where('pendidikan', 'd3')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $d4 = DB::table('karyawans')
            ->where('pendidikan', 'd4')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $s1 = DB::table('karyawans')
            ->where('pendidikan', 's1')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $s2 = DB::table('karyawans')
            ->where('pendidikan', 's2')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $gola = DB::table('karyawans')
            ->where('gol_darah', 'A')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $golaa = DB::table('karyawans')
            ->where('gol_darah', 'A+')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $golb = DB::table('karyawans')
            ->where('gol_darah', 'B')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $golbb = DB::table('karyawans')
            ->where('gol_darah', 'B+')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $golab = DB::table('karyawans')
            ->where('gol_darah', 'AB')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $golo = DB::table('karyawans')
            ->where('gol_darah', 'O')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $goloo = DB::table('karyawans')
            ->where('gol_darah', 'O+')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $single = DB::table('karyawans')
            ->where('status', 'S')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $kawin = DB::table('karyawans')
            ->where('status', 'K')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $k1 = DB::table('karyawans')
            ->where('status', 'K1')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $k2 = DB::table('karyawans')
            ->where('status', 'K2')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $k3 = DB::table('karyawans')
            ->where('status', 'K3')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $k4 = DB::table('karyawans')
            ->where('status', 'K4')
            ->whereNull('karyawans.deleted_at')
            ->count();
        return view('pages.admin.dashboard',[
            'karyawan' => karyawan::count(),
            'acc' => $acc,
            'fo' => $fo,
            'hr' => $hr,
            'fbs' => $fbs,
            'fbp' => $fbp,
            'sm' => $sm,
            'eng' => $eng,
            'hk' => $hk,
            'spa' => $spa,
            'ldy' => $ldy,
            'sct' => $sct,
            'male' => $male,
            'female' => $female,
            'pkwt' => $pkwt,
            'dw' => $dw,
            'buddha' => $buddha,
            'hindu' => $hindu,
            'islam' => $islam,
            'katolik' => $katolik,
            'kristen' => $kristen,
            'sma' => $sma,
            'smk' => $smk,
            'd1' => $d1,
            'd2' => $d2,
            'd3' => $d3,
            'd4' => $d4,
            's1' => $s1,
            's2' => $s2,
            'gola' => $gola,
            'golaa' => $golaa,
            'golb' => $golb,
            'golbb' => $golbb,
            'golab' => $golab,
            'golo' => $golo,
            'goloo' => $goloo,
            'single' => $single,
            'kawin' => $kawin,
            'k1' => $k1,
            'k2' => $k2,
            'k3' => $k3,
            'k4' => $k4,
            ]);
    }
}