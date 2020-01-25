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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/get/KategoriKompetensi', 'Api\KategoriKompetensiController@get');
Route::get('/Kompetensi/{id}', 'Api\KompetensiController@get');
Route::post('/Kompetensi', 'Api\KompetensiController@post');
Route::post('/Kompetensi/Level/{id}', 'Api\KompetensiController@addLevel');
Route::post('/Kompetensi/editLevel/{id}', 'Api\KompetensiController@editLevel');
Route::get('/Kompetensi/listKompetensi/{id}', 'Api\KompetensiController@listKompetensi');
Route::get('/Kompetensi/listLevelKompetensi/{id}', 'Api\KompetensiController@listLevelKompetensi');

Route::delete('/Kompetensi/deleteLevel/{id}/{lvl}', 'Api\KompetensiController@deleteLevel');

Route::get('/pegawai/kompetensi', 'Api\KompetensiPegawaiController@getListKompetensiPegawai');
Route::get('/pegawai/kompetensi/{idPegawai}/status/{isAdmin}', 'Api\KompetensiPegawaiController@getListKompetensiPegawaiByPegawaiId');
Route::post('/pegawai/kompetensi', 'Api\KompetensiPegawaiController@postKompetensiPegawai');
Route::delete('/pegawai/kompetensi/{id}', 'Api\KompetensiPegawaiController@deleteKopetensiPegawai');
Route::put('/pegawai/kompetensi', 'Api\KompetensiPegawaiController@putKompetensiPegawai');

Route::get('/admin', 'Api\AdministratorController@getAdmin');
Route::post('/admin', 'Api\AdministratorController@addAdmin');
Route::delete('/admin/{id}', 'Api\AdministratorController@deleteAdmin');

Route::get('/pegawai/listPegawai', 'Api\KompetensiPegawaiController@getListPegawai');
Route::get('/pegawai/listPegawai/{pin}/search', 'Api\KompetensiPegawaiController@getListPegawaiById');
Route::get('/pegawai/listKompetensiLevel', 'Api\KompetensiPegawaiController@getListKompetensiLevel');
Route::get('/pegawai/listPegawai/{id}', 'Api\KompetensiPegawaiController@getDetailKompetensi');

Route::get('/dashboard/getChart/{id}', 'Api\DashboardController@getChart');

Route::get('/kompetensi/{id}/gap', 'Api\KompetensiController@getGapConfig');
Route::post('/kompetensi/{id}/gap', 'Api\KompetensiController@addGapConfig');
Route::delete('/kompetensi/gap/{id}', 'Api\KompetensiController@deleteGapConfig');
Route::get('/kompetensi/{komId}/level/{ess}', 'Api\KompetensiController@getLevelKompetensiByKompetensiAndEsselon');
Route::get('/kompetensi/levelKompetensi/{esselon}', 'Api\KompetensiController@getLevelKompetensiByEsselon');

Route::get('/kompetensi/levelKompetensi/{id}/gap/{gap}', 'Api\KompetensiController@getGapByGapAndLevelKompetensi');
Route::get('/kompetensi/levelKompetensi/gap/{id}', 'Api\KompetensiController@getGapByLevelKompetensi');
