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

Route::get('search_doctor', function () {
    $doctors = DB::table('doctors')->where([
        ['is_doctor', '=', '1'],
    ])->get();
    return view('pages.search_doctor', ['doctors' => $doctors]);
});

Route::get('select_doctor', function () {
    
    $doctors = DB::table('doctors')->where([
        ['is_doctor', '=', '1'],
    ])->orderByraw(' 6* rate_sum / rate_count - 4* (fee/100) DESC')->get();

    return view('pages.select_doctor', ['doctors' => $doctors]);
});

Route::get('show_pat_appointments', function () {
    $pat_id = Auth::guard('patient')->id();
    $apps = DB::table('appointments')->where([
        ['patient_id', '=', $pat_id],
    ])->get();

    foreach ($apps as $app) {
        if ($app->time < now()) {
            //$app->status= 'finished';

            DB::table('appointments')
                ->where('id', $app->id)
                ->update(
                    ['status' => 'finished']
                );

            //$app->save();
        }

    }

    return view('pages.pat_appointment', ['apps' => $apps]);
});

Route::get('show_pat_prescriptions', function () {
    $pat_id = Auth::guard('patient')->id();
    $prescriptions = DB::table('prescriptions')->where([
        ['patient_id', '=', $pat_id],
    ])->get();

    return view('pages.pat_prescription', ['prescriptions' => $prescriptions]);
});

Route::get('show_doc_prescriptions', function () {
    $doc_id = Auth::guard('doctor')->id();
    $prescriptions = DB::table('prescriptions')->where([
        ['doctor_id', '=', $doc_id],
    ])->get();

    return view('pages.doc_prescription', ['prescriptions' => $prescriptions]);
});

Route::get('show_pat_medicines', function()
{
    $pat_id= Auth::guard('patient')->id();

    return view('pages.pat_medicine');
});

Route::get('show_doc_appointments', function () {
    $doc_id = Auth::guard('doctor')->id();
    $apps = DB::table('appointments')->where([
        ['doctor_id', '=', $doc_id],
    ])->get();

    $prescriptions = DB::table('prescriptions')->get();

    foreach ($apps as $app) {
        if ($app->time < now()) {
            //$app->status= 'finished';

            DB::table('appointments')
                ->where('id', $app->id)
                ->update(
                    ['status' => 'finished']
                );

            //$app->save();
        }

    }

    //$patients= DB::table('patients')->get();

    return view('pages.doc_appointment', ['apps' => $apps],['prescriptions'=>$prescriptions]);
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

Route::post('storePresc/{id}', 'PrescriptionController@store');
Route::get('showPrescForm/{id}', 'PrescriptionController@show_prescription_form');

Route::post('updatePat', 'PatientController@update');

Route::post('updateDoc', 'DoctorController@update');
Route::post('rate/{id}', 'DoctorController@rate');
Route::get('/approve/{id}', 'DoctorController@approve');
Route::get('/disapprove/{id}', 'DoctorController@disapprove');
Route::get('searchDoctor', 'DoctorController@searchDoctor')->name('doctor.search');
Route::any('doctorSearch', 'DoctorController@doctorSearch')->name('doctor.search2');

Route::get('pickmedicine', 'MedicineController@autocomplete')->name('pickmedicine');
Route::get('pickdisease', 'DiseaseController@autocomplete')->name('pickdisease');
