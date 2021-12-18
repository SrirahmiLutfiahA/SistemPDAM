<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $count_user = DB::table('users')->count() - 1;
        $count_aduan = DB::table('pengaduan')->count();
        return view('admin/dashboard', compact('count_user','count_aduan'));
    }

    public function laporan()
    {
        return view('admin/laporan');
    }

    public function print($tglAwal, $tglAkhir){
        $data_aduan = Pengaduan::all()->whereBetween('created_at',[$tglAwal, $tglAkhir]);
        return view('admin/report', compact('data_aduan'));
    }

    public function data()
    {
         $data_user = DB::table('users')->get();
         return view('admin/datapelanggan')->with('users',$data_user);
    }
 
}
