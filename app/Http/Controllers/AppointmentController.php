<?php
namespace App\Http\Controllers;
use App\Appointment;
use App\Doctor;
use App\Patient;
use Auth;
use DB;
use Illuminate\Http\Request;
use Notification;
use App\Notifications\MyNotification;
class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $dr_id)
    {
        //
        $pat_id = Auth::guard('patient')->id();
        $combinedDT = date('Y-m-d H:i:s', strtotime("$request->date $request->time"));
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
     * Display the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}