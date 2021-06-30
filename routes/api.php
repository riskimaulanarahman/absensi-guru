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

//master data surat
Route::apiResource('/surat-masuk','masterdatasurat\suratmasuk\SuratmasukController');
Route::apiResource('/surat-keluar','masterdatasurat\suratkeluar\SuratkeluarController');
Route::apiResource('/surat-pelayanan','masterdatasurat\suratpelayanan\SuratpelayananController');
Route::post('/upload-berkas/{id}/{module}','BerkasController@update')->name('uploadberkas');

//master user
Route::apiResource('/master-user','masteruser\LoginUserController');

//generate qr
Route::apiResource('/generate-qr','API\GenerateController');

//absensi
Route::apiResource('/form-absensi','API\AbsensiController');

//data absensi
Route::apiResource('/data-absensi','API\ReportController');
