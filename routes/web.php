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

Route::get('/', 'PostcodeController@index')->name('home');
Route::get('/seed', 'PostcodeController@seedPostcode')->name('seed');
// Route::get('/getpostcode', 'PostcodeController@findPostcode')->name('getpostcode');
// Route::get('/', function () {
//     return view('welcome');
// });
