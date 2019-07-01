<?php

namespace App\Http\Controllers;

use Auth;
use DB;
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
  
        return view('prescriptions.index',compact('prescriptions'))
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
    public function store(Request $request,$app_id)
    {
        /** 
        *$request->validate([
        *    'patient_id' => 'required',
        *]);
        */
        $apps = DB::table('appointments')->where([
            ['id', '=', $app_id],
        ])->get();

        DB::table('prescriptions')->insert([
            'patient_id' => $apps[0]->patient_id,
            'doctor_id' => $apps[0]->doctor_id,
            'time' => now(),
            'symptoms' => $request->symptoms,
            'directions' => $request->directions,
            'next_visit_date' => $request->next_visit_date,
            ]);
        

        return redirect('show_doc_appointments')
                        ->with('success','Prescription Given successfully.');

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
        return view('prescriptions.show',compact('prescription'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function edit(prescription $prescription)
    {
        return view('prescriptions.edit',compact('prescription'));
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
                        ->with('success','Prescription removed successfully.');
    }
}
