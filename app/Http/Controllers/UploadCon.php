<?php

namespace App\Http\Controllers;

use Alert;
use App;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UploadCon extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->is('uploadcancel')) {
            Session::flush();
        };
        if (!Session::get('setsession')) {
            $timestamp = time();
            $ip = $_SERVER['REMOTE_ADDR'];
            $sess_data = [];
            $sess_data['sess_id'] = md5($timestamp . "_" . $ip);
            $sess_data['sess_lock'] = 0;
            Session::put('setsession', $sess_data);
        }
        return view('pages/upload', ['data' => '0']);
    }

    public function cekupload(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->nim_up;
        $data = '0';
        $upload = DB::table('ajuan')->select('uuid', 'nama', 'email', 'nim', 'kode_status')
            ->where('nim', $cari)
            ->orderBy('tgl_ajuan', 'desc')
            ->first();
        if ($upload != null) {
            if ($upload->kode_status == 8) {
                Session::put('sessionuuidajuan', $upload->uuid);
                $data = '1';
            } else {
                Alert::success('', 'Tidak Ada Permintaan Upload Untuk NIM ini');
            }
        } else {
            Alert::success('', 'Tidak Ada History Permintaan Untuk NIM ini');
        }

        // mengirim data detail_ajuan ke view index
        return view('pages/upload', [
            'data' => $data,
            'user' => $upload,
        ]);
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
        $data_uuid_base = Session::get('sessionuuidajuan');
        $sekarang = date('Y-m-d H:i:s');
        $otp = $request->otptextupl;
        $dbtemp = DB::table('ajuan_temp')->where('uuid', $data_uuid['sess_id'])
            ->orderBy('tgl_ajuan', 'desc')
            ->first();
        $kode = $dbtemp->kode;
        if (Hash::check($otp, $kode)) {
            // insert data ke table ajuan
            DB::table('ajuan')
                ->where('uuid', $data_uuid_base)
                ->update([
                    'doc_ijazah' => $dbtemp->doc_ijazah,
                    'doc_transkrip' => $dbtemp->doc_transkrip,
                    'kode_status' => '09',
                ]);
            DB::table('ajuan_history')->insert([
                'uuid_ajuan' => $data_uuid_base,
                'kode_status' => '09',
                'tanggal' => $sekarang,
                'oleh' => $data_uuid['sess_id'],
            ]);
            Session::flush();
            Alert::success('Data Akan Diproses', 'Berhasil');
            return redirect('beranda'); 
        } else {
            Alert::success('Kode Verifikasi Salah', 'Gagal');
            $request_in_db = DB::table('ajuan_temp')->where('uuid', $data_uuid)->first();
            return view('pages/otpupload', ['data' => $request_in_db]);
        }
    }

    public function proses(Request $request)
    {
        // check data
        $this->validate($request, [
            'ijazah' => 'required',
            'transkrip' => 'required',
        ]);

        $data_uuid = Session::get('setsession');
        $data_uuid_base = Session::get('sessionuuidajuan');
        if (DB::table('ajuan_temp')->where('uuid', $data_uuid)->doesntExist()) {
            // check data
            // simpan ke db otp
            $otp = mt_rand(1000, 9999);
            $sekarang = date('Y-m-d H:i:s');

            $name = 'ij-' . $request->nim . '.' . 'pdf';
            $path = Storage::putFileAs(
                'public/file_upload', $request->file('ijazah'), $name
            );
            $request->doc_ijazah = $name;

            $name2 = 'tr-' . $request->nim . '.' . 'pdf';
            $path2 = Storage::putFileAs(
                'public/file_upload', $request->file('transkrip'), $name2
            );
            $request->doc_transkrip = $name2;

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
                'doc_ijazah' => $request->doc_ijazah,
                'doc_transkrip' => $request->doc_transkrip,
                'kode' => Hash::make($otp),
                'uuid_ajuan' => $data_uuid_base,
            ]);

            // alihkan halaman ke halaman ajuan
            Alert::success('', 'Cek Kode OTP');
            return view('pages/otpupload', ['data' => $request]);
        } else {
            Alert::success('', 'Ajuan Anda Belum Selesai');
            $request_in_db = DB::table('ajuan_temp')->where('uuid', $data_uuid)->first();
            return view('pages/otpupload', ['data' => $request_in_db]);
        }
    }
}

function save_mail($kepada, $subject, $pesan)
{
    $sekarang = date('Y-m-d H:i:s');
    $from = 'noreply-lintar@untar.ac.id';
    $kepada = str_replace("'", "", $kepada);
    $subject = str_replace("'", "''", $subject);
    $pesan = str_replace("'", "''", $pesan);
    $connection = DB::connection('sqlsrv_mail');
    $u = $connection->table('se_email')->insert([
        'send_from' => $from,
        'send_to' => $kepada,
        'email_subject' => $subject,
        'email_body' => $pesan,
        'save_at' => $sekarang,
        'status' => '0',
    ]);
}
