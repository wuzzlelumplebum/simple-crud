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



Auth::routes();

Route::resource('/', 'HomeController');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['role:1,99']], function() {
    Route::resource('users', 'UserController');
});

Route::get('/export-pdf', 'UserController@exportPDF')->name('export-pdf');

Route::get('export-excel', 'UserController@exportExcel')->name('export-excel');