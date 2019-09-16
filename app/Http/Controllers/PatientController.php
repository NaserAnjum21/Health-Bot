<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\patient;
use App\prescription;
use App\medicine_log;
use App\medicine;
use App\appointment;
use App\doctor;
use Carbon\Carbon;
use DB;

/**
 * @group Patient Functionalities
 *
 * APIs for managing patient related methods
 */

class PatientController extends Controller
{
    /**
     * Display a listing of patients
     *
     */
    public function index()
    {
        //
        $patients = patient::latest()->paginate(10);

        return view('patients.index', compact('patients'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        //
        return view('patients.create');
    }

    
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        patient::create($request->all());

        return redirect()->route('patients.index')
            ->with('success', 'Patient Registered successfully.');
    }

    /**
     * Update patient profile
     *
     */

    public function update(Request $request)
    {
        $pat_id = Auth::guard('patient')->id();
        $patient = patient::find($pat_id);

        if ($patient) {
            if (!empty($request->name)) {
                $patient->name = $request->name;
            }

            if (!empty($request->email)) {
                $patient->email = $request->email;
            }

            if (!empty($request->phone)) {
                $patient->contact_no = $request->phone;
            }

            if (!empty($request->address)) {
                $patient->address = $request->address;
            }

            if (!empty($request->height)) {
                $patient->height = $request->height;
            }

            if (!empty($request->weight)) {
                $patient->weight = $request->weight;
            }

            if (!empty($request->bloodgroup)) {
                $patient->bloodgroup = $request->bloodgroup;
            }

            if (!empty($request->file)) {
                $fname = "pp_" . time();
                $filename = $fname . '.' . request()->file->getClientOriginalExtension();
                $patient->profile_pic = $filename;
                $request->file->storeAs('patients', $filename);
            }

            $patient->save();
        }
        return redirect()->back()
            ->with('success', 'You have successfully updated your profile.');
    }

    
    public function show(patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    
    public function edit(patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    
    public function destroy(patient $patient)
    {
        $patient->delete();

        return redirect()->route('patients.index')
            ->with('success', 'Patient deleted successfully');
    }

    /**
     * Show health overview to patient
     *
     * @bodyParam patient_id int the ID of the patient user
     */

    public function my_health($patient_id)
    {
        $appointment = DB::table('appointments')
            ->where('patient_id', '=', [$patient_id])
            ->get();

        $count = 0;
        $appointments = [];
        foreach ($appointment as $app) {
            $time = Carbon::parse($app->time);
            $now = Carbon::now();
            if ($time->gt($now)) {
                $app_date = $time->format('d.M.Y');
                $app_time = $time->format('h:i');
                $hour =  $time->format('H');
                if ($hour > 12) {
                    $app_hour = 'pm';
                } else {
                    $app_hour = 'am';
                }

                $doctor = DB::table('doctors')
                    ->where('id', '=', [$app->doctor_id])
                    ->get();

                foreach ($doctor as $doc) {
                    $appointments[$count] = [$doc->name, $app_time, $app_hour, $app_date];
                    $count = $count + 1;
                }
            }
        }



        $infos = DB::table('patients')
            ->where('id', '=', [$patient_id])
            ->get();



        $prescription_id = DB::table('prescriptions')
            ->select('id')
            ->where('patient_id', '=', [$patient_id])
            ->get();

        $pres_id = json_decode(json_encode($prescription_id), true);

        $medicines = DB::table('medicine_logs')
            ->whereIn('prescription_id', $pres_id)
            ->get();

        $morning_med = [];
        $noon_med = [];
        $evening_med = [];

        $count = 1;
        foreach ($medicines as $medicine) {
            $start = Carbon::parse($medicine->created_at);
            $now = Carbon::now();
            $elapsed_time = $now->diffInDays($start);

            if ($elapsed_time <= $medicine->course_duration) {
                $med_name = DB::table('medicines')
                    ->where('id', '=', [$medicine->medicine_id])
                    ->get();
                $due_time = $medicine->course_duration - $elapsed_time;

                $m_dose = substr($medicine->dose, -3, 1);
                if ($m_dose != '0') {
                    foreach ($med_name as $m_name) {
                        $mm = [$m_name->trade_name, $m_dose, $due_time];
                        $morning_med[$count] = $mm;
                    }
                }

                $n_dose = substr($medicine->dose, -2, 1);
                if ($n_dose != '0') {
                    foreach ($med_name as $m_name) {
                        $nm = [$m_name->trade_name, $n_dose, $due_time];
                        $noon_med[$count] = $nm;
                    }
                }

                $e_dose = substr($medicine->dose, -1, 1);
                if ($e_dose != '0') {
                    foreach ($med_name as $m_name) {
                        $em = [$m_name->trade_name, $e_dose, $due_time];
                        $evening_med[$count] = $em;
                    }
                }
                $count = $count + 1;
            }
        }

        $time = Carbon::now('Asia/Dhaka');
        $t_format = $time->format('h:i');
        $hour = $time->format('H');
        if ($hour > 12) {
            $h_format = 'pm';
        } else {
            $h_format = 'am';
        }

        return view(
            'pages.my_health',
            compact(
                'appointments',
                'infos',
                'morning_med',
                'noon_med',
                'evening_med',
                't_format',
                'h_format'
            )
        );
    }
}
