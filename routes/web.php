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
Route::get('patient', function () {
    $posts = DB::table('admin_posts')->get();
    return view('patient', ['posts' => $posts]);
});
Route::view('/doctor', 'doctor');

Route::get('appointments', function () {
    return view('pages.appointments');
});

Route::get('bodymap', function () {
    return view('pages.bodymap');
});

Route::get('demo', function () {
    return view('pages.demo');
});

Route::get('updateDocProfile', function () {
    return view('pages.updateDoc');
});

Route::get('patProfile', function () {
    return view('pages.patient_profile');
});

Route::get('docProfile', function () {
    return view('pages.doctor_profile');
});


Route::get('admin', function () {
    return view('admin');
});



Route::resource('patients', 'PatientController');
Route::resource('doctors', 'DoctorController');
Route::resource('prescriptions', 'PrescriptionController');
Route::resource('medicines', 'MedicineController');
Route::resource('appointments', 'AppointmentController');


Route::get('admin_report','AdminController@admin_report');
/* admin_post */
Route::get('admin_post','AdminController@admin_post');
Route::post('createPost', 'AdminController@createPost');
Route::get('removePost/{id}', 'AdminController@removePost');

/* Route::get('/home', 'HomeController@index')->name('home'); */
Route::post('storeApp/{id}', 'AppointmentController@store');
Route::post('confirm/{id}', 'AppointmentController@confirm');
Route::post('reschedule/{id}', 'AppointmentController@reschedule');
Route::post('cancelFromPat/{id}', 'AppointmentController@cancelFromPatient');
Route::post('cancelFromDoc/{id}', 'AppointmentController@cancelFromDoctor');
Route::get('show_pat_appointments', 'AppointmentController@show_pat_appointments');
Route::get('show_pat_prescriptions', 'AppointmentController@show_pat_prescriptions');
Route::get('show_doc_appointments', 'AppointmentController@show_doc_appointments');
Route::get('show_doc_prescriptions', 'AppointmentController@show_doc_prescriptions');

Route::post('storePresc/{id}', 'PrescriptionController@store');
Route::get('showPrescForm/{id}', 'PrescriptionController@show_prescription_form');
Route::get('showPresc/{id}', 'PrescriptionController@show_prescription');

Route::post('updatePat', 'PatientController@update');
Route::get('my_health/{id}','PatientController@my_health');

Route::get('select_doctor', 'DoctorController@select_doctor');
Route::get('/approve/{id}', 'DoctorController@approve');
Route::get('/disapprove/{id}', 'DoctorController@disapprove');
Route::get('/refer/{id}', 'DoctorController@refer');
Route::get('searchDoctor', 'DoctorController@searchDoctor')->name('doctor.search');
Route::post('updateDoc', 'DoctorController@update');
Route::post('rate/{id}', 'DoctorController@rate');
Route::any('doctorSearch', 'DoctorController@doctorSearch')->name('doctor.search2');

Route::get('show_pat_medicines/{id}','MedicineLogController@pat_medicine');

Route::get('pickmedicine', 'MedicineController@autocomplete')->name('pickmedicine');
Route::get('pickdisease', 'DiseaseController@autocomplete')->name('pickdisease');