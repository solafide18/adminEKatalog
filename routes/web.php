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

Route::get('/', 'Web\HomeController@index');
Route::get('/home', 'Web\HomeController@index');
Route::get('/home/index', 'Web\HomeController@index');
Route::get('/login', 'Web\LoginController@index');
Route::post('/login', 'Web\LoginController@login');
Route::get('/login/index', 'Web\LoginController@index');
Route::get('/profile', 'Web\ProfileController@index');
Route::get('/profile/index', 'Web\ProfileController@index');
Route::get('/kompcorevalue', 'Web\KompCoreValueController@index');
Route::get('/kompcorevalue/index', 'Web\KompCoreValueController@index');
Route::get('/kompmanajerial', 'Web\KompManajerialController@index');
Route::get('/kompmanajerial/index', 'Web\KompManajerialController@index');
Route::get('/kompsosialcultural', 'Web\KompSosialCulturalController@index');
Route::get('/kompsosialcultural/index', 'Web\KompSosialCulturalController@index');
Route::get('/rencanapengembangan', 'Web\RencanaPengembanganController@index');
Route::get('/rencanapengembangan/index', 'Web\RencanaPengembanganController@index');