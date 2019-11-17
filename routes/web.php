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

<<<<<<< HEAD
Route::get('/', 'Web\HomeController@index');
Route::get('/home', 'Web\HomeController@index');
Route::get('/home/index', 'Web\HomeController@index');
=======
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/home/index', 'HomeController@index');
Route::get('/login', 'Login2Controller@index');
>>>>>>> 54df3d7740acfe65129e267a2a1ad2b1b8bebdab
