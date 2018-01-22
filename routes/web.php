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
    return view('home/index');
});
/*Route::get('/search', function () {
    return view('home/index');
});*/

Route::get('search', 'SearchController@index')->name('search');
Route::post('search', 'SearchController@simpleSearch')->name('simple-search');
Route::post('advance-search', 'SearchController@advanceSearch')->name('advance-search');

Auth::routes();
Route::get('/home', 'HomeController@index');
Route::get('/dashboard', 'HomeController@dashboard');

Route::get('admin/students/importExport', 'FileController@importExportView')->name('import_export');
Route::get('admin/students/downloadExcel/{type}', 'FileController@exportFile')->name('export');
Route::post('admin/students/importExcel', 'FileController@importFile')->name('import');

Route::get('user/profile/view', 'UserController@getUserProfileView')->name('view_user_profile');

