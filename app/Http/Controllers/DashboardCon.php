<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;
use App\Ajuan;

class DashboardCon extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ajuanmodel = Ajuan::all();
        return view('pages/dashboard', [
            'ajuan_timeline' => $ajuanmodel,
            'ajuan' => [],
            'detail_ajuan' => [],
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

        if ($ajuan->isEmpty()) {
            Alert::success('', 'Data Pengajuan Nim Ini Tidak Ada');
        }
        // mengirim data detail_ajuan ke view index
        $ajuanmodel = Ajuan::all();
        return view('pages/dashboard',[
            'ajuan_timeline' => $ajuanmodel, 
            'ajuan' => $ajuan, 
            'detail_ajuan' => $detail_ajuan
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
