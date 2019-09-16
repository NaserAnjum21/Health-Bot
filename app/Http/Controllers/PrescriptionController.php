<?php

namespace App\Http\Controllers;

use App\appointment;
use App\medicine;
use App\medicine_log;
use App\Disease_log;
use App\Disease;
use App\patient;
use App\prescription;
use Illuminate\Http\Request;

/**
 * @group Prescription Management
 *
 * APIs for handling prescription functionalities
 */

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the Prescriptions.
     *
     */
    public function index()
    {
        //
        $prescriptions = prescription::latest()->paginate(10);

        return view('prescriptions.index', compact('prescriptions'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    
    public function create()
    {
        return view('prescriptions.create');
    }

    /**
     * Create and store an prescription
     * 
     * This also stores values to Medicine and Disease Log table
     *
     * @bodyParam app_id int the ID of the corresponding appointment 
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
        $diseases = $request->disease;
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

            if ($request->duration[$index]) {
                $med_log->course_duration = $request->duration[$index];
            }

            $med_log->prescription_id = $pres->id;
            $med_log->save();

            $index = $index + 1;

        }

        $index = 0;

        foreach ($diseases as $dis) {

            $dis_log = new disease_log;

            $idis = disease::where('name', '=', $dis)->first();

            if ($idis) {
                $dis_log->disease_id = $idis->id;
            }

            $dis_log->prescription_id = $pres->id;
            $dis_log->save();

            $index = $index + 1;

        }

        return redirect('show_doc_appointments')
            ->with('success', 'Prescription Given successfully.');

    }

    /**
     * Show a presctiption form to doctor
     *
     */

    public function show_prescription_form($app_id)
    {
        $app = appointment::find($app_id);
        $patient = patient::find($app->patient_id);

        return view('pages.give_prescription', ['app' => $app], ['patient' => $patient]);

    }

    /**
     * Show Prescription Details
     *
     */

    public function show_prescription($presc_id)
    {
        $presc = prescription::find($presc_id);


        $med_logs = \App\prescription::find($presc_id)->medicine_logs;
        $dis_logs = \App\prescription::find($presc_id)->disease_logs;

        return view('pages.show_prescription',
                        compact(
                            'presc',
                            'med_logs',
                            'dis_logs'
                        )
                    );

    }

    
    public function show(prescription $prescription)
    {
        //
        return view('prescriptions.show', compact('prescription'));
    }

    
    public function edit(prescription $prescription)
    {
        return view('prescriptions.edit', compact('prescription'));
    }

    
    public function update(Request $request, prescription $prescription)
    {
        //
    }

    public function destroy(prescription $prescription)
    {
        //
        $prescription->delete();

        return redirect()->route('prescriptions.index')
            ->with('success', 'Prescription removed successfully.');
    }
}
