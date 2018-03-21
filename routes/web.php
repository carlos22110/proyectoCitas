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

Route::delete('doctors/destroyAll', 'DoctorController@destroyAll')->name('doctors.destroyAll');
Route::delete('patients/destroyAll', 'PatientController@destroyAll')->name('patients.destroyAll');


Route::resource('doctors', 'DoctorController');
Route::resource('patients', 'PatientController');
Route::resource('symptoms', 'SymptomController');
Route::resource('appointments', 'AppointmentsController');











Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
