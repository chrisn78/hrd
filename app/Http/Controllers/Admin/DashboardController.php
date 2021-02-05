<?php

namespace App\Http\Controllers\Admin;

use App\karyawan;
use App\position;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index(Request $request)
    {
            $karyawan = DB::table('karyawans')
            ->where('status_posisi','!=', 'deactive')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $fbs = DB::table('karyawans')
            ->join('positions', 'karyawans.id_position', '=', 'positions.id')
            ->where('positions.department', 'F&B Service')
            ->where('status_posisi','!=', 'deactive')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $acc = DB::table('karyawans')
            ->join('positions', 'karyawans.id_position', '=', 'positions.id')
            ->where('positions.department', 'Accounting')
            ->where('status_posisi','!=', 'deactive')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $fo = DB::table('karyawans')
            ->join('positions', 'karyawans.id_position', '=', 'positions.id')
            ->where('positions.department', 'Front Office')
            ->where('status_posisi','!=', 'deactive')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $fbp = DB::table('karyawans')
            ->join('positions', 'karyawans.id_position', '=', 'positions.id')
            ->where('positions.department', 'F&B Product')
            ->where('status_posisi','!=', 'deactive')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $hr = DB::table('karyawans')
            ->join('positions', 'karyawans.id_position', '=', 'positions.id')
            ->where('positions.department', 'Human Resource')
            ->where('status_posisi','!=', 'deactive')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $hk = DB::table('karyawans')
            ->join('positions', 'karyawans.id_position', '=', 'positions.id')
            ->where('positions.department', 'Housekeeping')
            ->where('status_posisi','!=', 'deactive')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $sm = DB::table('karyawans')
            ->join('positions', 'karyawans.id_position', '=', 'positions.id')
            ->where('positions.department', 'Sales & Marketing')
            ->where('status_posisi','!=', 'deactive')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $eng = DB::table('karyawans')
            ->join('positions', 'karyawans.id_position', '=', 'positions.id')
            ->where('positions.department', 'Engineering')
            ->where('status_posisi','!=', 'deactive')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $spa = DB::table('karyawans')
            ->join('positions', 'karyawans.id_position', '=', 'positions.id')
            ->where('positions.department', 'SPA & Recreation')
            ->where('status_posisi','!=', 'deactive')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $ldy = DB::table('karyawans')
            ->join('positions', 'karyawans.id_position', '=', 'positions.id')
            ->where('positions.department', 'Laundry')
            ->where('status_posisi','!=', 'deactive')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $sct = DB::table('karyawans')
            ->join('positions', 'karyawans.id_position', '=', 'positions.id')
            ->where('positions.department', 'Security')
            ->where('status_posisi','!=', 'deactive')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $male = DB::table('karyawans')
            ->where('jenis_kel', 'MALE')
            ->where('status_posisi','!=', 'deactive')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $female = DB::table('karyawans')
            ->where('jenis_kel', 'FEMALE')
            ->where('status_posisi','!=', 'deactive')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $pkwt = DB::table('karyawans')
            ->where('status_posisi', 'PKWT')
            ->where('status_posisi','!=', 'deactive')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $dw = DB::table('karyawans')
            ->where('status_posisi', 'DW')
            ->where('status_posisi','!=', 'deactive')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $buddha = DB::table('karyawans')
            ->where('agama', 'buddha')
            ->where('status_posisi','!=', 'deactive')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $hindu = DB::table('karyawans')
            ->where('agama', 'hindu')
            ->where('status_posisi','!=', 'deactive')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $islam = DB::table('karyawans')
            ->where('agama', 'islam')
            ->where('status_posisi','!=', 'deactive')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $katolik = DB::table('karyawans')
            ->where('agama', 'katolik')
            ->where('status_posisi','!=', 'deactive')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $kristen = DB::table('karyawans')
            ->where('agama', 'kristen')
            ->where('status_posisi','!=', 'deactive')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $smp = DB::table('karyawans')
            ->where('pendidikan', 'smp')
            ->where('status_posisi','!=', 'deactive')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $smk = DB::table('karyawans')
            ->where('pendidikan', 'smk/sma')
            ->where('status_posisi','!=', 'deactive')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $d1 = DB::table('karyawans')
            ->where('pendidikan', 'd1')
            ->where('status_posisi','!=', 'deactive')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $d2 = DB::table('karyawans')
            ->where('pendidikan', 'd2')
            ->where('status_posisi','!=', 'deactive')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $d3 = DB::table('karyawans')
            ->where('pendidikan', 'd3')
            ->where('status_posisi','!=', 'deactive')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $d4 = DB::table('karyawans')
            ->where('pendidikan', 'd4')
            ->where('status_posisi','!=', 'deactive')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $s1 = DB::table('karyawans')
            ->where('pendidikan', 's1')
            ->where('status_posisi','!=', 'deactive')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $s2 = DB::table('karyawans')
            ->where('pendidikan', 's2')
            ->where('status_posisi','!=', 'deactive')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $gola = DB::table('karyawans')
            ->where('gol_darah', 'A')
            ->where('status_posisi','!=', 'deactive')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $golaa = DB::table('karyawans')
            ->where('gol_darah', 'A+')
            ->where('status_posisi','!=', 'deactive')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $golb = DB::table('karyawans')
            ->where('gol_darah', 'B')
            ->where('status_posisi','!=', 'deactive')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $golbb = DB::table('karyawans')
            ->where('gol_darah', 'B+')
            ->where('status_posisi','!=', 'deactive')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $golab = DB::table('karyawans')
            ->where('gol_darah', 'AB')
            ->where('status_posisi','!=', 'deactive')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $golo = DB::table('karyawans')
            ->where('gol_darah', 'O')
            ->where('status_posisi','!=', 'deactive')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $goloo = DB::table('karyawans')
            ->where('gol_darah', 'O+')
            ->where('status_posisi','!=', 'deactive')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $single = DB::table('karyawans')
            ->where('status', 'S')
            ->where('status_posisi','!=', 'deactive')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $kawin = DB::table('karyawans')
            ->where('status', 'K')
            ->where('status_posisi','!=', 'deactive')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $k1 = DB::table('karyawans')
            ->where('status', 'K1')
            ->where('status_posisi','!=', 'deactive')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $k2 = DB::table('karyawans')
            ->where('status', 'K2')
            ->where('status_posisi','!=', 'deactive')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $k3 = DB::table('karyawans')
            ->where('status', 'K3')
            ->where('status_posisi','!=', 'deactive')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $k4 = DB::table('karyawans')
            ->where('status', 'K4')
            ->where('status_posisi','!=', 'deactive')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $mk01 = DB::table('karyawans')
            ->where('status_posisi','!=', 'deactive')
            ->whereRaw('DATEDIFF(CURDATE(),join_date)/365 < 1')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $mk12 = DB::table('karyawans')
            ->where('status_posisi','!=', 'deactive')
            ->whereRaw('DATEDIFF(CURDATE(),join_date)/365 >= 1 AND DATEDIFF(CURDATE(),join_date)/365 <= 2 ')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $mk23 = DB::table('karyawans')
            ->where('status_posisi','!=', 'deactive')
            ->whereRaw('DATEDIFF(CURDATE(),join_date)/365 > 2 AND DATEDIFF(CURDATE(),join_date)/365 <= 3 ')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $mk34 = DB::table('karyawans')
            ->where('status_posisi','!=', 'deactive')
            ->whereRaw('DATEDIFF(CURDATE(),join_date)/365 > 3 AND DATEDIFF(CURDATE(),join_date)/365 <= 4 ')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $mk45 = DB::table('karyawans')
            ->where('status_posisi','!=', 'deactive')
            ->whereRaw('DATEDIFF(CURDATE(),join_date)/365 > 4 AND DATEDIFF(CURDATE(),join_date)/365 <= 5 ')
            ->whereNull('karyawans.deleted_at')
            ->count();
            $mk5 = DB::table('karyawans')
            ->where('status_posisi','!=', 'deactive')
            ->whereRaw('DATEDIFF(CURDATE(),join_date)/365 > 5')
            ->whereNull('karyawans.deleted_at')
            ->count();

            $ultah = karyawan::whereRaw('DAYOFYEAR(curdate()) <= DAYOFYEAR(tgl_lahir) AND DAYOFYEAR(curdate()) + 7 >=  dayofyear(tgl_lahir)')
                        ->where('status_posisi','!=', 'deactive')
                        ->orderByRaw('DAYOFYEAR(tgl_lahir)')
                        ->get();
            // $loginlog = DB::table('loginlogs')
            //             ->where('action','=', 'login')
            //             ->orderBy('created_at','DESC')
            //             ->get();
            // dd(Auth::user());
        return view('pages.admin.dashboard',[
            'karyawan' => $karyawan,
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
            'smp' => $smp,
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
            'mk01' => $mk01,
            'mk12' => $mk12,
            'mk23' => $mk23,
            'mk34' => $mk34,
            'mk45' => $mk45,
            'mk5' => $mk5,
            'ultah' => $ultah,
            ]);
    }
}