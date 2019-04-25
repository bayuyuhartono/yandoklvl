<?php

namespace App\Http\Controllers;

use App;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class APIajuanCon extends Controller
{
    public function getsession()
    {
        return response()->json(['sess' => sessgen()]);
    }

    public function getajuanstatus($nim)
    {
        $ajuan = DB::table('ajuan')->select('uuid', 'nim', 'nama', 'email', 'tgl_ajuan')
            ->where('nim', $nim)
            ->orderBy('tgl_ajuan', 'desc')
            ->get();
        return response()->json(['data' => $ajuan]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'uuid' => 'required',
            'nama' => 'required|min:3|max:30',
            'nim' => 'required',
            'email' => 'required',
            'telepon' => 'required',
            'handphone' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
        $sekarang = date('Y-m-d H:i:s');
        $otp = $request->otptext;
        $dbtemp = DB::table('ajuan_temp')->where('uuid', $request->uuid)
            ->orderBy('tgl_ajuan', 'desc')
            ->first();
        $kode = $dbtemp->kode;
        if (Hash::check($otp, $kode)) {
            // insert data ke table ajuan
            DB::table('ajuan')->insert([
                'uuid' => $request->uuid,
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
                'uuid_ajuan' => $request->uuid,
                'kode_status' => '01',
                'tanggal' => $sekarang,
                'oleh' => $request->uuid,
            ]);
            return response()->json(['store' => 'success']);
        } else {
            return response()->json($validator->errors()->toJson(), 400);
        }
    }

    public function proses_temp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'uuid' => 'required',
            'nama' => 'required|min:3|max:30',
            'nim' => 'required',
            'email' => 'required',
            'telepon' => 'required',
            'handphone' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        if (DB::table('ajuan')->where('nim', $request->nim)
            ->where('kode_status', '<>', 11)
            ->where('kode_status', '<>', 12)
            ->where('kode_status', '<>', 07)
            ->exists()) {
            return response()->json($validator->errors()->toJson(), 999);
        }

        // simpan ke db otp
        $otp = mt_rand(1000, 9999);
        $sekarang = date('Y-m-d H:i:s');
        // kirim email otp
        $email = $request->email;
        Mail::to($email)->send(new App\Mail\OtpChecking($otp));
        $subject = 'Kode OTP';
        // save_mail($email, $subject, $otp);
        DB::table('ajuan_temp')->insert([
            'uuid' => $request->uuid,
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
        return response()->json(['store' => 'success', 'otp' => $otp]);
    }

}

function sessgen()
{
    $timestamp = time();
    $ip = $_SERVER['REMOTE_ADDR'];
    $sess_data = md5($timestamp . "_" . $ip);
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
