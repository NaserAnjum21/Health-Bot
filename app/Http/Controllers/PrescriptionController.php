<?php

namespace App\Http\Controllers;

use App\appointment;
use App\medicine;
use App\medicine_log;
use App\patient;
use App\prescription;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $prescriptions = prescription::latest()->paginate(10);

        return view('prescriptions.index', compact('prescriptions'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prescriptions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $app_id)
    {
        /**
         *$request->validate([
         *    'patient_id' => 'required',
         *]);
         */
        $app = appointment::find($app_id);

        $pres = new prescription();
        $pres->patient_id = $app->patient_id;
        $pres->doctor_id = $app->doctor_id;
        $pres->time = now();
        $pres->symptoms = $request->symptoms;
        $pres->directions = $request->directions;
        $pres->next_visit_date = $request->next_visit_date;
        $pres->save();

        $medicines = $request->medicine;
        $index = 0;

        foreach ($medicines as $med) {

            $med_log = new medicine_log;

            $imed = medicine::where('trade_name', '=', $med)->first();

            if ($imed) {
                $med_log->medicine_id = $imed->id;
            }

            if ($request->dose[$index]) {
                $med_log->dose = $request->dose[$index];
            }

            $med_log->prescription_id = $pres->id;
            $med_log->save();

            $index = $index + 1;

        }

        return redirect('show_doc_appointments')
            ->with('success', 'Prescription Given successfully.');

    }

    public function show_prescription_form($app_id)
    {
        $app = appointment::find($app_id);
        $patient = patient::find($app->patient_id);

        return view('pages.doc_prescription', ['app' => $app], ['patient' => $patient]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function show(prescription $prescription)
    {
        //
        return view('prescriptions.show', compact('prescription'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function edit(prescription $prescription)
    {
        return view('prescriptions.edit', compact('prescription'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, prescription $prescription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function destroy(prescription $prescription)
    {
        //
        $prescription->delete();

        return redirect()->route('prescriptions.index')
            ->with('success', 'Prescription removed successfully.');
    }
}
