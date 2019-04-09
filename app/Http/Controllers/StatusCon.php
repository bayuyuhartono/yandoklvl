<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class StatusCon extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ajuan = [];
        $detail_ajuan = [];
        return view('pages/status',[
            'ajuan' => $ajuan, 
            'detail_ajuan' => $detail_ajuan
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cek(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->nimcari;

        $ajuan = DB::table('ajuan')->select('uuid','nim','nama','email','tgl_ajuan')
        ->where('nim','like',"%".$cari."%")
        ->orderBy('tgl_ajuan','desc')
        ->get();
    
        // mengambil data dari table pegawai sesuai pencarian data
        $detail_ajuan = DB::table('ajuan')
        ->rightJoin('ajuan_history', 'ajuan.uuid', '=', 'ajuan_history.uuid_ajuan')
        ->rightJoin('master_status_history', 'ajuan_history.kode_status', '=', 'master_status_history.kode_status')
        ->select('ajuan.uuid','master_status_history.nama_status','ajuan_history.tanggal')
        ->where('ajuan.nim', $cari)
        ->orderBy('ajuan_history.recid','asc')
        ->get();

        // mengirim data detail_ajuan ke view index
        return view('pages/status',[
            'ajuan' => $ajuan, 
            'detail_ajuan' => $detail_ajuan
            ]);
    }
}
