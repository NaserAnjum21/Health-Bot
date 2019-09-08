<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;

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

    public function rate(Request $request, $dr_id)
    {
        //
        $doctor= Doctor::find($dr_id);

        $req_rate= (int)$request->rating;

        $old_rating_sum = $doctor->rate_sum;
        $old_count = $doctor->rate_count;

        if($req_rate > 5) $req_rate=5;
        if($req_rate < 0) $req_rate=0;

        $new_rating_sum =  $old_rating_sum + $req_rate;
        $new_count= $old_count + 1 ;

        $doctor->rate_sum= $new_rating_sum;
        $doctor->rate_count= $new_count;

        $doctor->save();

        return redirect()->back()->with('success','Rating and feedback given successfully');
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

        $doctor= Doctor::find($doc_id);

        if ($doctor) {
            if (!empty($request->name)) {
                $doctor->name = $request->name;
            }

            if (!empty($request->email)) {
                $doctor->email = $request->email;
            }

            if (!empty($request->phone)) {
                $doctor->contact_no = $request->phone;
            }

            if (!empty($request->address)) {
                $doctor->work_address = $request->address;
            }

            if (!empty($request->qualification)) {
                $doctor->qualification = $request->qualification;
            }

            if (!empty($request->speciality)) {
                $doctor->speciality = $request->speciality;
            }

            if (!empty($request->visiting_hours)) {
                $doctor->visiting_hours = $request->visiting_hours;
            }

            if (!empty($request->fee)) {
                $doctor->fee= $request->fee;
            }

            if (!empty($request->file)) {
                $fname = "pp_" . time();
                $filename = $fname . '.' . request()->file->getClientOriginalExtension();
                $doctor->profile_pic = $filename;
                $request->file->storeAs('doctors', $filename);
            }

            $doctor->save();
        }
        return redirect()->back()
            ->with('success', 'You have successfully updated your profile.');
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

    public function doctorSearch()
    {
        $name= Input::get ( 'name' );
        $spec = Input::get ( 'spec' );
        $loc = Input::get ( 'loc' );
        $doctors = Doctor::where ( 'name', 'LIKE', '%' . $name . '%' )
                        ->where ( 'speciality', 'LIKE', '%' . $spec . '%' )
                        ->where ( 'work_address', 'LIKE', '%' . $loc . '%' )
                        ->where ('is_doctor', 'LIKE', '%' . '1' . '%')
                        ->orderByraw(' 6* rate_sum / rate_count - 4* (fee/100) DESC')
                        ->get ();
        if (count ( $doctors ) > 0)
            return view ( 'pages.select_doctor', ['doctors' => $doctors] )->withDetails ( $doctors )->withQuery ( $name )->withQuery ( $spec )->withQuery ( $loc );
        else
            return view ( 'pages.select_doctor', ['doctors' => $doctors] )->withMessage ( 'No Details found. Try to search again !' );
    }

    public function searchDoctor(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('doctors')
         ->where('name', 'like', '%'.$query.'%')
         ->orWhere('work_address', 'like', '%'.$query.'%')
         ->orWhere('qualification', 'like', '%'.$query.'%')
         ->orWhere('speciality', 'like', '%'.$query.'%')
         ->orderBy('name')
         ->get();
         
      }
      else
      {
        $data = DB::table('doctors')
        ->orderBy('name')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        if($row->is_doctor==true)
        {
            $doctors.push($row);
            $output .= '
            <tr>
            <td>'.$row->name.'</td>
            <td>'.$row->email.'</td>
            <td>'.$row->work_address.'</td>
            <td>'.$row->qualification.'</td>
            <td>'.$row->speciality.'</td>
            </tr>
            ';
        }
        
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row,
       'doctor_data' => $doctors
      );

      echo json_encode($data);

      return view('pages.search_doctor',compact('doctors'));
     }
    }
}
