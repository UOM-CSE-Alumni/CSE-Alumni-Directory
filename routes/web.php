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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin/dashboard');
});

Route::get('admin/students/importExport', 'FileController@importExport')->name('import_export');
Route::get('admin/students/downloadExcel/{type}', 'FileController@downloadExcel')->name('export');
Route::post('admin/students/importExcel', 'FileController@importExcel')->name('import');