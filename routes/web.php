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

// Route::get('/','Admin\DashboardController@index', function () {
//     return view('layouts.admin');
// });
// Route::get('/', function () {
//     return view('welcome');
// });


Route::prefix('/')
    ->namespace('Admin')
    ->group(function() {
    Route::get('/','DashboardController@index')->name('dashboard');
    Route::resource('data_kary','DataKaryController');
    Route::get('/data_p_t/{t_id}/{k_id}','DataPesertaTrainController@removePeserta')->name('data_peserta_remove');
    Route::get('/data_p_t/{id}','DataPesertaTrainController@editPeserta')->name('data_peserta_edit');
    Route::post('/data_p_t','DataPesertaTrainController@storePeserta')->name('data_peserta_store');
    Route::resource('data_train','DataTrainController');
    Route::resource('data-jab','DataJabController',['except'> ['show']]);
    Route::get('/kary/export_excel', 'KaryawanEIController@export_excel')->name('kary_export');
    Route::post('/kary/import_excel', 'KaryawanEIController@import_excel')->name('kary_import');
    Route::post('/post/import_excel', 'PositionEIController@import_excel')->name('post_import');;
    Route::get('deptchart', 'EchartController@deptchart')->name('deptchart');;;
    // Route::resource('data-user','DataUserController@index');
});