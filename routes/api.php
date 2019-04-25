<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('test', function () {
    return 'API Test';
});

Route::post('register', 'APIuserController@register');
Route::post('login', 'APIuserController@authenticate');

Route::group(['middleware' => 'jwt.verify'], function () { 
    Route::get('user', 'APIuserController@getAuthenticatedUser');
    Route::get('ajuan', 'APIajuanCon@getsession');
    Route::get('ajuan/status/{nim}', 'APIajuanCon@getajuanstatus');
    Route::post('ajuan/proses_temp', 'APIajuanCon@proses_temp');
    Route::post('ajuan/store', 'APIajuanCon@store');
});