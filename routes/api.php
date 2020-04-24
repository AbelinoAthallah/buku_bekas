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

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');

//////////////////////////////////////////////////////BUKU
Route::post('/simpan_buku', 'BukuController@store');
Route::put('/ubah_buku/{id}','BukuController@update');
Route::delete('/hapus_buku/{id}','BukuController@destroy');
Route::get('/tampil_buku','BukuController@tampil_buku');

//////////////////////////////////////////////////////JENISBUKU
Route::post('/simpan_jenis', 'JenisController@store');
Route::put('/ubah_jenis/{id}','JenisController@update');
Route::delete('/hapus_jenis/{id}','JenisController@destroy');
Route::get('/tampil_jenis','JenisController@tampil_jenis');

//////////////////////////////////////////////////////Transaksi
Route::post('/simpan_transaksi', 'TransaksiController@store');
Route::get('/tampil_transaksi','TransaksiController@tampil_transaksi');

//////////////////////////////////////////////////////DETAIL
Route::post('/simpan_detail', 'DetailController@store');
Route::get('/tampil_detail','DetailController@tampil_detail');
