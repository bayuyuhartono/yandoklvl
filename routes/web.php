<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('beranda');
});
//beranda
Route::get('beranda', 'DashboardCon@index')->name('beranda');

//pengumuman
Route::get('pengumuman', 'PengumumanCon@index')->name('pengumuman');

//ajuan
Route::get('ajuan', 'AjuanCon@index')->name('ajuan');
Route::get('ajuancancel', 'AjuanCon@index')->name('ajuancancel');
Route::post('otpcheck', 'AjuanCon@proses')->name('otpcheck');
Route::post('add', 'AjuanCon@store')->name('add');

//upload
Route::get('upload', 'UploadCon@index')->name('upload');
Route::get('uploadcancel', 'UploadCon@index')->name('uploadcancel');
Route::get('cekupload', 'UploadCon@cekupload')->name('cekupload');
Route::post('otpupload', 'UploadCon@proses')->name('otpupload');
Route::post('send', 'UploadCon@store')->name('send');

//status
Route::get('status', 'StatusCon@index')->name('status');
Route::get('cek', 'StatusCon@cek')->name('cek');

//alur
Route::get('alur', 'AlurCon@index')->name('alur');

//carabayar
Route::get('carabayar', 'CaraBayarCon@index')->name('carabayar');

//kontak
Route::get('kontak', 'KontakCon@index')->name('kontak');