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
Route::get('/', 'Admin\AuthController@showFormLogin')->name('login');
Route::get('login', 'Admin\AuthController@showFormLogin')->name('login');
Route::post('login', 'Admin\AuthController@login');
// Route::get('register', 'Admin\AuthController@showFormRegister')->name('register');
// Route::post('register', 'Admin\AuthController@register');

Route::group(['middleware' => 'auth'],function() {
    Route::get('/dashboard','Admin\DashboardController@index')->name('dashboard');
    Route::resource('data_kary','Admin\DataKaryController');
    Route::get('/data_p_t/{t_id}/{k_id}','Admin\DataPesertaTrainController@removePeserta')->name('data_peserta_remove');
    Route::get('/data_p_t/{id}','Admin\DataPesertaTrainController@editPeserta')->name('data_peserta_edit');
    Route::post('/data_p_t','Admin\DataPesertaTrainController@storePeserta')->name('data_peserta_store');
    Route::resource('data_train','Admin\DataTrainController');
    Route::resource('kary_deactive','Admin\KaryDeactiveController');
    Route::resource('violation','Admin\ViolationController');
    Route::resource('data-jab','Admin\DataJabController',['except'> ['show']]);
    Route::get('/kary/export_excel', 'Admin\KaryawanEIController@export_excel')->name('kary_export');
    Route::post('/kary/import_excel', 'Admin\KaryawanEIController@import_excel')->name('kary_import');
    Route::post('/post/import_excel', 'Admin\PositionEIController@import_excel')->name('post_import');
    Route::get('/post/export_excel', 'Admin\PositionEIController@export_excel')->name('post_export');
    Route::post('/training/import_excel', 'Admin\DataTrainingImportController@import_excel')->name('training_import');
    Route::get('/training/export_excel', 'Admin\DataTrainingImportController@export_excel')->name('training_export');
    Route::get('deptchart', 'Admin\EchartController@deptchart')->name('deptchart');
    Route::get('loginlog', 'Admin\DataLogController@loginlog')->name('loginlog');
    Route::get('activitylog', 'Admin\DataLogController@activitylog')->name('activitylog');
    Route::get('logout', 'Admin\AuthController@logout')->name('logout');
    Route::resource('changepass', 'Admin\ChangePassController');
    Route::resource('data_user','Admin\DataUserController');
    Route::resource('profile_kary','Admin\WorkersController');
    Route::resource('type_violation','Admin\TypeViolationController');
    Route::post('subcat', 'Admin\TypeVioDropController@myformAjax')->name('subcat');
    Route::get('myform/ajax/{id}',array('as'=>'myform.ajax','uses'=>'Admin\TypeVioDropController@myformAjax'));
    // Route::resource('data-user','DataUserController@index');
});
