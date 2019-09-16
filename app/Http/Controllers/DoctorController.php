<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;

use DB;
use Auth;
use App\Quotation;
use App\Doctor;
use Illuminate\Http\Request;

/**
 * @group Doctor Functionalities
 *
 * APIs for managing doctor related methods
 */

class DoctorController extends Controller
{
    /**
     * Display a list of doctors
     *
     */
    public function index()
    {
        //
        $doctors = doctor::latest()->paginate(10);
  
        return view('doctors.index',compact('doctors'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }


    
    /**
     * Approve a doctor (by admin)
     *
     */

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


    /**
     * Disapprove a doctor (by admin)
     *
     */
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
     * Refer a doctor (by other registered doctors)
     *
     */

    public function refer(Request $request)
    {
        //

        DB::table('doctors')
        ->where('id', $request->id)
        ->update(
            ['is_doctor' => 2]
        );

        return redirect('/doctors');
    }

    /**
     * Rating and giving feedback to doctor
     *
     * @bodyParam dr_id int the ID of the rated doctor
     */

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

        $pat_id = Auth::guard('patient')->id();

        DB::table('feedbacks')->insert([
            'patient_id' => $pat_id,
            'doctor_id' => $dr_id,
            'rating' => $req_rate,
            'comments' => $request->feedback,
        ]);

        return redirect()->back()->with('success','Rating and feedback given successfully');
    }


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
     * Update doctor profile
     *
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

            if (!empty($request->license_no)) {
                $doctor->license_no= $request->license_no;
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
     * Show sorted doctor list to patient
     *
     */

    public function select_doctor()
    {
        $doctors = Doctor::where ('is_doctor', 'LIKE', '%' . '1' . '%') 
                        ->get ();
        if (count ( $doctors ) > 0)
        {
            $doctors = $doctors->sort(function ($a, $b) {
                $a_app_count = DB::table('appointments')
                                        ->where('doctor_id', $a->id)
                                        ->count();
                $a_score = 6* $a->rate_sum / $a->rate_count - 4* ( $a->fee/100) + 3* $a_app_count ;

                $b_app_count = DB::table('appointments')
                                        ->where('doctor_id', $b->id)
                                        ->count();
                $b_score = 6* $b->rate_sum / $b->rate_count - 4* ( $b->fee/100) + 3* $b_app_count ;


                if ($a_score == $b_score) {
                    return 0;
                }
                return ($a_score > $b_score) ? -1 : 1;
            });
        }
        
        return view('pages.select_doctor', ['doctors' => $doctors]);
    }


    /**
     * Search Doctors
     * 
     * Patient can search by name, location, speciality
     * 
     */

    public function doctorSearch()
    {
        
        $name= Input::get ( 'name' );
        $spec = Input::get ( 'spec' );
        $loc = Input::get ( 'loc' );
        $doctors = Doctor::where ( 'name', 'LIKE', '%' . $name . '%' )
                        ->where ( 'speciality', 'LIKE', '%' . $spec . '%' )
                        ->where ( 'work_address', 'LIKE', '%' . $loc . '%' )
                        ->where ('is_doctor', 'LIKE', '%' . '1' . '%') //->orderByraw(' 6* rate_sum / rate_count - 4* (fee/100) DESC')
                        ->get ();
        if (count ( $doctors ) > 0)
        {
            $doctors = $doctors->sort(function ($a, $b) {
                $a_app_count = DB::table('appointments')
                                        ->where('doctor_id', $a->id)
                                        ->count();
                $a_score = 6* $a->rate_sum / $a->rate_count - 4* ( $a->fee/100) + 3* $a_app_count ;

                $b_app_count = DB::table('appointments')
                                        ->where('doctor_id', $b->id)
                                        ->count();
                $b_score = 6* $b->rate_sum / $b->rate_count - 4* ( $b->fee/100) + 3* $b_app_count ;


                if ($a_score == $b_score) {
                    return 0;
                }
                return ($a_score > $b_score) ? -1 : 1;
            });
            return view ( 'pages.select_doctor', ['doctors' => $doctors] )->withDetails ( $doctors )->withQuery ( $name )->withQuery ( $spec )->withQuery ( $loc );
        }
            
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
