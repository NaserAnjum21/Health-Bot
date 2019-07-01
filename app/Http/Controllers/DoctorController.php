<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Quotation;
use App\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $doctors = doctor::latest()->paginate(10);
  
        return view('doctors.index',compact('doctors'))
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
    }

    public function approve(Request $request)
    {
        //

        DB::table('doctors')
        ->where('id', $request->id)
        ->update(
            ['is_doctor' => 1]
        );

        return redirect('/doctors');
    }

    public function disapprove(Request $request)
    {
        //

        DB::table('doctors')
        ->where('id', $request->id)
        ->update(
            ['is_doctor' => 0]
        );

        return redirect('/doctors');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
        $id =Auth::id();
        $doctors= DB::table('doctors')
        ->where('id', $id)
        ->get();

        $doctor = $doctors[0];

        return view('doctors.edit',['doctor' => $doctor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $doc_id = Auth::guard('doctor')->id();
        DB::table('doctors')
        ->where('id', $doc_id)
        ->update([
            'work_address' => $request->address,
            'qualification' => $request->qualification,
            'speciality' => $request->speciality,
        ]);

        return redirect('/doctor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
