<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', 'HomeController@index');
Route::get('/absensi', 'API\AbsensiController@index');
Route::get('/form-absensi/{kode}', 'API\AbsensiController@formabsensi');
Route::apiResource('/api/data-absensi','API\ReportController');

Route::group( ['as' => 'admin.','middleware' => ['auth']], function() {

    Route::get('/', 'HomeController@index')->name('index');

    //master user
    Route::get('/master-user','masteruser\LoginUserController@show')->name('masteruser');
    //
    Route::get('/generate-qr','API\GenerateController@show')->name('generateqr');

    Route::get('/data-absensi','API\ReportController@show')->name('report');

    
});

require __DIR__.'/auth.php';
