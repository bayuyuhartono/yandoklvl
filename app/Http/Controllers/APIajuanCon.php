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
    public function getajuan()
    {
        $ajuan = DB::table('ajuan')->select('uuid', 'nim', 'nama', 'email', 'tgl_ajuan')
            ->orderBy('tgl_ajuan', 'desc')
            ->get();
        return response()->json(['data' => $ajuan]);
    }

    public function proses(Request $request)
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
