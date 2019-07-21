<?php

namespace App\Http\Controllers;

use App\patient;
use Auth;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('patients.create');
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
            'email' => 'required',
        ]);

        patient::create($request->all());

        return redirect()->route('patients.index')
            ->with('success', 'Patient Registered successfully.');
    }

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

    /**
     * Display the specified resource.
     *
     * @param  \App\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\patient  $patient
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(patient $patient)
    {
        $patient->delete();

        return redirect()->route('patients.index')
            ->with('success', 'Patient deleted successfully');
    }
}
