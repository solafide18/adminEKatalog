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
Route::get('/profile', 'Web\ProfileController@index');
Route::get('/profile/index', 'Web\ProfileController@index');