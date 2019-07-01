<?php

namespace App\Http\Controllers;

use DB;
use App\medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $medicines = medicine::latest()->paginate(10);
  
        return view('medicines.index',compact('medicines'))
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
        return view('medicines.create');
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
            'trade_name' => 'required',
            'generic_name' => 'required',
        ]);
  
        medicine::create($request->all());
   
        return redirect()->route('medicines.index')
                        ->with('success','Medicine added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show(medicine $medicine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit(medicine $medicine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, medicine $medicine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy($med_id)
    {
        //
        //$medicine->delete();

        DB::table('medicines')->where('id', '=', $med_id)->delete();
  
        return redirect()->route('medicines.index');
    }
}
