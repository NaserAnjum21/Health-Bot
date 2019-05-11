<?php

namespace App\Http\Controllers;

use Auth;
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
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'patient_id' => 'required',
            'details' => 'required',
        ]);

        $id = Auth::id();
        $pr = prescription::create([
            'patient_id' => $request->patient_id,
            'name' => $request->name,
            'doctor_id' => $id,
            'medicine' => $request->medicine,
            'details' => $request->details,
            'next_visit_date' => $request->next_visit_date,
            ]);
        $pr->save();

        return redirect()->route('prescriptions.index')
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
