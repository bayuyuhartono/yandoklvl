<?php

namespace App\Http\Controllers;

use Alert;
use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AjuanCon extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        if (request()->is('ajuancancel')) {
            Session::flush();
        };
        if (!Session::get('setsession')) {
            $sess_data = sessgen();
            Session::put('setsession', $sess_data);
        }

        return view('pages/ajuan', ['id' => Session::get('setsession')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data_uuid = Session::get('setsession');
        $sekarang = date('Y-m-d H:i:s');
        $otp = $request->otptext;
        $dbtemp = DB::table('ajuan_temp')->where('uuid', $data_uuid['sess_id'])
            ->orderBy('tgl_ajuan', 'desc')
            ->first();
        $kode = $dbtemp->kode;
        if (Hash::check($otp, $kode)) {
            // insert data ke table ajuan
            DB::table('ajuan')->insert([
                'uuid' => $data_uuid['sess_id'],
                'nama' => $request->nama,
                'nim' => $request->nim,
                'email' => $request->email,
                'jumlah' => 10,
                'tgl_ajuan' => $sekarang,
                'telepon' => $request->telepon,
                'handphone' => $request->handphone,
                'kode_status' => '01',
            ]);
            DB::table('ajuan_history')->insert([
                'uuid_ajuan' => $data_uuid['sess_id'],
                'kode_status' => '01',
                'tanggal' => $sekarang,
                'oleh' => $data_uuid['sess_id'],
            ]);
            Session::flush();
            Alert::success('Data Akan Diproses', 'Berhasil');
            return redirect('beranda'); 
        } else {
            Alert::success('Kode Verifikasi Salah', 'Gagal');
            return view('pages/otpcheck', ['data' => $request]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function proses(Request $request)
    {
        // check data
        $this->validate($request, [
            'nama' => 'required|min:3|max:30',
            'nim' => 'required',
            'email' => 'required',
            'telepon' => 'required',
            'handphone' => 'required',
        ]);

        if (DB::table('ajuan')->where('nim', $request->nim)
            ->where('kode_status','<>', 11)
            ->where('kode_status','<>', 12)
            ->where('kode_status','<>', 07)
            ->exists()) {
            Alert::success('Ajuan dengan NIM ' . $request->nim . ' Sedang Dalam Proses !', 'Gagal');
            return view('pages/ajuan', ['id' => Session::get('setsession')]);
            exit ();
        }

        $data_uuid = Session::get('setsession');
        if (DB::table('ajuan_temp')->where('uuid', $data_uuid)->doesntExist()) {
            // simpan ke db otp
            $otp = mt_rand(1000, 9999);
            $sekarang = date('Y-m-d H:i:s');
            // kirim email otp
            $email = $request->email;
            // Mail::to($email)->send(new App\Mail\OtpChecking($otp));
            $subject = 'Kode OTP';
            save_mail($email, $subject, $otp);
            DB::table('ajuan_temp')->insert([
                'uuid' => $data_uuid['sess_id'],
                'nama' => $request->nama,
                'nim' => $request->nim,
                'email' => $request->email,
                'jumlah' => 10,
                'tgl_ajuan' => $sekarang,
                'telepon' => $request->telepon,
                'handphone' => $request->handphone,
                'kode' => Hash::make($otp),
            ]);
            // alihkan halaman ke halaman ajuan
            return view('pages/otpcheck', ['data' => $request]);
        } else {
            Alert::success('', 'Ajuan Anda Belum Selesai');
            $request_in_db = DB::table('ajuan_temp')->where('uuid', $data_uuid)->first();
            return view('pages/otpcheck', ['data' => $request_in_db]);
        }
    }

}

function sessgen()
{
    $timestamp = time();
    $ip = $_SERVER['REMOTE_ADDR'];
    $sess_data = [];
    $sess_data['sess_id'] = md5($timestamp . "_" . $ip);
    $sess_data['sess_lock'] = 0;
    return $sess_data;
}

function save_mail($kepada, $subject, $pesan)
{
    $sekarang = date('Y-m-d H:i:s');
    $from = 'noreply-lintar@untar.ac.id';
    $kepada 	= str_replace("'", "", $kepada);
    $subject 	= str_replace("'", "''", $subject);
    $pesan 		= str_replace("'", "''", $pesan);
    $connection = DB::connection('sqlsrv_mail');
    $u = $connection->table('se_email')->insert([
        'send_from' => $from,
        'send_to' => $kepada,
        'email_subject' => $subject,
        'email_body' => $pesan,
        'save_at' => $sekarang,
        'status' => '0'
    ]);
}