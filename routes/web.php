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

Route::get('doctors/patients', 'DoctorController@patients')->name('doctors.patients');
Route::get('patients/appointments', 'PatientController@appointments')->name('patients.appointments');
Route::get('doctors/appointments', 'DoctorController@appointments')->name('doctors.appointments');
Route::delete('doctors/destroyRel/{id}', 'DoctorController@destroyRel')->name('doctors.destroyRel');
//Route::delete('patients/destroyAll', 'PatientController@destroyAll')->name('patients.destroyAll');

Route::resource('users', 'UserController');
Route::resource('administrators', 'AdministratorController');
Route::resource('doctors', 'DoctorController');
Route::resource('patients', 'PatientController');
Route::resource('symptoms', 'SymptomController');
Route::resource('appointments', 'AppointmentController');
Route::resource('doctor_patient', 'DoctorPatientController');











Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
