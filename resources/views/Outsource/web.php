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

Route::get('updateDocProfile', function()
{
    return view('pages.updateDoc');
});


Route::get('select_doctor', function()
{
    $doctors = DB::table('doctors')->where([
        ['is_doctor', '=', '1'],
    ])->get();

    return view('pages.select_doctor',['doctors' => $doctors]);
});

Route::get('show_pat_home', function()
{
    $pat_id= Auth::guard('patient')->id();
    /*$medication = DB::table('medici')->where([
        ['patient_id', '=', $pat_id],
    ])->get();

    return view('pages.pat_prescription',['prescriptions' => $prescriptions]);*/
    return view('patient');
});

Route::get('show_pat_appointments', function()
{
    $pat_id= Auth::guard('patient')->id();
    $apps = DB::table('appointments')->where([
        ['patient_id', '=', $pat_id],
    ])->get();

    return view('pages.pat_appointment',['apps' => $apps]);
});

Route::get('show_pat_notifications', function()
{
    $pat_id= Auth::guard('patient')->id();
    /* $apps = DB::table('appointments')->where([
        ['patient_id', '=', $pat_id],
    ])->get(); */

    return view('pages.pat_notifications');
});

Route::get('show_pat_prescriptions', function()
{
    $pat_id= Auth::guard('patient')->id();
    $prescriptions = DB::table('prescriptions')->where([
        ['patient_id', '=', $pat_id],
    ])->get();

    return view('pages.pat_prescription',['prescriptions' => $prescriptions]);
});

Route::get('show_pat_medication', function()
{
    $pat_id= Auth::guard('patient')->id();
    /*$medication = DB::table('medici')->where([
        ['patient_id', '=', $pat_id],
    ])->get();

    return view('pages.pat_prescription',['prescriptions' => $prescriptions]);*/
    return view('pages.pat_medication');
});

Route::get('show_doc_appointments', function()
{
    $doc_id= Auth::guard('doctor')->id();
    $apps = DB::table('appointments')->where([
        ['doctor_id', '=', $doc_id],
    ])->get();

    //$patients= DB::table('patients')->get();

    return view('pages.doc_appointment',['apps' => $apps]);
});

Route::get('admin', function()
{
    return view('admin');
});

Route::resource('patients','PatientController');
Route::resource('doctors','DoctorController');
Route::resource('prescriptions','PrescriptionController');
Route::resource('medicines','MedicineController');
Route::resource('appointments','AppointmentController');

/* Route::get('/home', 'HomeController@index')->name('home'); */
Route::post('storeApp/{id}','AppointmentController@store');
Route::post('storePresc/{id}','PrescriptionController@store');
Route::post('confirm/{id}','AppointmentController@confirm');
Route::post('updateDoc','DoctorController@update');
Route::get('/approve/{id}', 'DoctorController@approve');
Route::get('/disapprove/{id}', 'DoctorController@disapprove');