<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Doctor;
use App\Patient;
use Auth;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Notification;
use App\Notifications\MyNotification;

/**
 * @group Appointment Management
 *
 * APIs for managing appointment logics
 */

class AppointmentController extends Controller
{
    
    /**
     * Create and store an appointment.
     *
     * @bodyParam dr_id int the ID of the appointed doctor
     */
    public function store(Request $request, $dr_id)
    {
        //
        $pat_id = Auth::guard('patient')->id();

        $combinedDT = date('Y-m-d H:i:s', strtotime("$request->date $request->time"));

        $cur_time = Carbon::now();
        if($cur_time> $combinedDT)
        {
            return redirect()->back()->with('error', 'You have given invalid datetime. Past time ');
        }

        $patConflictApp = DB::table('appointments')
            ->where('time', $combinedDT)
            ->where('patient_id', $pat_id)
            ->get();

        if (!$patConflictApp->isEmpty()) {
            return redirect()->back()->with('error', 'You have appointment at the same time. Try different time');
        }

        $docConflictApp = DB::table('appointments')
            ->where('time', $combinedDT)
            ->where('doctor_id', $dr_id)
            ->where('status', 'confirmed')
            ->get();

        if (!$docConflictApp->isEmpty()) {
            return redirect()->back()->with('error', 'The doctor do not have free slot at this time. Try different time');
        }

        DB::table('appointments')->insert([
            'patient_id' => $pat_id,
            'doctor_id' => $dr_id,
            'time' => $combinedDT,
            'status' => 'pending',
        ]);

        /*
        $doctor= Doctor::find($dr_id);
        $patient= Patient::find($pat_id);

        $details = [
            'greeting' => 'Hi Doctor',
            'body' => 'You have an appointment request.',
            'thanks' => 'Thank you.',
            'actionText' => 'Check details',
            'actionURL' => url('/show_doc_appointments'),
            'app_id' => 101
        ];

        Notification::send($doctor, new MyNotification($details));
        */

        //session()->flash('msg', 'Successfully done the operation.');
        return redirect()->back()->with('success', 'Appointment Request Successfully Done. Wait for confirmation.');
    }

    /**
     * Reschedule an appointment from doctor side
     *
     * @bodyParam app_id int the ID of the appointment to be rescheduled
     */

    public function reschedule(Request $request, $app_id)
    {
        //

        $app = Appointment::find($app_id);

        $combinedDT = date('Y-m-d H:i:s', strtotime("$request->date $request->time"));

        if ($app) {
            $app->status = 'confirmed';
            if ($combinedDT) {
                $app->time = $combinedDT;
            }
            $app->save();

        }
        return redirect()->back()->with('success', 'Appointment rescheduled');
    }


    /**
     * Confirm an appointment.
     *
     */

    public function confirm(Request $request)
    {
        //

        DB::table('appointments')
            ->where('id', $request->id)
            ->update([
                'status' => 'confirmed',
            ]);

        return redirect('/show_doc_appointments');
    }

    /**
     * Cancel an Appointment from Patient
     *
     * @bodyParam app_id int the ID of the appointment to be cancelled
     */

    public function cancelFromPatient(Request $request, $app_id)
    {
        //

        $app = Appointment::find($app_id);

        if ($app) {
            $app->status = 'cancelled';
            if (!empty($request->result)) {
                $app->cancel_reason = $request->result;
            }
            $app->save();
            return redirect()->back()->with('success', 'Appointment succesfully cancelled');
        }
        return redirect()->back();
    }

    /**
     * Show Patient Appointments
     *
     */

    public function show_pat_appointments()
    {
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
    }


    /**
     * Show Patient Prescriptions
     *
     */

    public function show_pat_prescriptions()
    {
        $pat_id = Auth::guard('patient')->id();
        $prescriptions = DB::table('prescriptions')->where([
            ['patient_id', '=', $pat_id],
        ])->get();

        return view('pages.pat_prescription', ['prescriptions' => $prescriptions]);
    }


    /**
     * Show Doctor Appointments
     *
     */

    public function show_doc_appointments()
    {
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
    }


    /**
     * Show Doctor Prescriptions
     *
     */

    public function show_doc_prescriptions()
    {
        $doc_id = Auth::guard('doctor')->id();
        $prescriptions = DB::table('prescriptions')->where([
            ['doctor_id', '=', $doc_id],
        ])->get();

        return view('pages.doc_prescription', ['prescriptions' => $prescriptions]);
    }

}
