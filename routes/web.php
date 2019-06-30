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

Route::view('/', 'welcome');
Auth::routes();

Route::get('/login/patient', 'Auth\LoginController@showPatientLoginForm');
Route::get('/login/doctor', 'Auth\LoginController@showDoctorLoginForm');
Route::get('/register/patient', 'Auth\RegisterController@showPatientRegisterForm');
Route::get('/register/doctor', 'Auth\RegisterController@showDoctorRegisterForm');

Route::post('/login/patient', 'Auth\LoginController@patientLogin');
Route::post('/login/doctor', 'Auth\LoginController@doctorLogin');
Route::post('/register/patient', 'Auth\RegisterController@createPatient');
Route::post('/register/doctor', 'Auth\RegisterController@createDoctor');

Route::view('/home', 'home')->middleware('auth');
Route::view('/patient', 'patient');
Route::view('/doctor', 'doctor');

Route::get('appointments', function()
{
    return view('pages.appointments');
});

Route::get('admin', function()
{
    return view('admin');
});

Route::resource('patients','PatientController');
Route::resource('doctors','DoctorController');
Route::resource('prescriptions','PrescriptionController');
Route::resource('medicines','MedicineController');

/* Route::get('/home', 'HomeController@index')->name('home'); */
Route::get('/approve/{id}', 'DoctorController@approve');