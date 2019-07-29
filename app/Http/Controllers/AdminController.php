<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\appointment;
use App\medicine;
use App\medicine_log;
use App\patient;
use App\prescription;
use App\Doctor;
use DB;

class AdminController extends Controller
{
    //

    public function getMostGivenMedicine()
    {
        $meds = DB::table("medicines")
        ->select("medicines.*",
            DB::raw("(SELECT count(*) FROM medicine_logs
                WHERE medicine_logs.medicine_id = medicines.id
                GROUP BY medicine_logs.medicine_id) as med_count"))
        ->get();
        return $meds;
    }

    public function getMostDiagnosedDisease()
    {
        $dis = DB::table("diseases")
        ->select("diseases.*",
            DB::raw("(SELECT count(*) FROM disease_logs
                WHERE disease_logs.disease_id = diseases.id
                GROUP BY disease_logs.disease_id) as dis_count"))
        ->get();
        return $dis;
    }

    public function getHighestRatedDoctors()
    {
        $most_recom_doc = DB::table('doctors')->where([
            ['is_doctor', '=', '1'],
            ])->orderBy(DB::raw("`rate_sum` / `rate_count`"), 'desc')->get();
        return $most_recom_doc;
    }

    public function getMostAppointedDoctors()
    {
        $most_visited_doc = DB::table("doctors")
        ->select("doctors.*",
            DB::raw("(SELECT count(*) FROM appointments
                WHERE appointments.doctor_id = doctors.id
                GROUP BY appointments.doctor_id) as app_count"))
        ->get();
        return $most_visited_doc;
    }

    public function getMostRegularPatients()
    {
        $most_visited_doc = DB::table("patients")
        ->select("patients.*",
            DB::raw("(SELECT count(*) FROM appointments
                WHERE appointments.patient_id = patients.id
                GROUP BY appointments.patient_id) as app_count"))
        ->get();
        return $most_visited_doc;
    }
    
    public function getMonthlyStat()
    {
        $cur_month = date('m');
        $total_app = DB::table("appointments")
            ->whereRaw('MONTH(time) = ?',[$cur_month])
            ->count();

        $finished_app = DB::table("appointments")
        ->whereRaw('MONTH(time) = ?',[$cur_month])
        ->where('status','finished')
        ->count();
        
        

        return view('pages.monthly_report',
            compact('total_app','finished_app'));
        
    }


    public function admin_report()
    {
        
        $most_visited_doc= $this->getMostAppointedDoctors();
        $most_recom_doc= $this->getHighestRatedDoctors();
        $most_regular_pat= $this->getMostRegularPatients();
        $most_given_med = $this->getMostGivenMedicine();
        $most_found_dis= $this->getMostDiagnosedDisease();

        $cur_month = date('m');

        $total_app = DB::table("appointments")
            ->whereRaw('MONTH(time) = ?',[$cur_month])
            ->count();

        $finished_app = DB::table("appointments")
        ->whereRaw('MONTH(time) = ?',[$cur_month])
        ->where('status','finished')
        ->count();

        $pending_app = DB::table("appointments")
        ->whereRaw('MONTH(time) = ?',[$cur_month])
        ->where('status','pending')
        ->count();

        $cancelled_app = DB::table("appointments")
        ->whereRaw('MONTH(time) = ?',[$cur_month])
        ->where('status','cancelled')
        ->count();

        $reg_doc = DB::table("doctors")
        ->whereRaw('MONTH(created_at) = ?',[$cur_month])
        ->count();

        $reg_pat = DB::table("patients")
        ->whereRaw('MONTH(created_at) = ?',[$cur_month])
        ->count();

        $total_presc = DB::table("prescriptions")
        ->whereRaw('MONTH(created_at) = ?',[$cur_month])
        ->count();

        $total_med = DB::table("medicine_logs")
        ->whereRaw('MONTH(created_at) = ?',[$cur_month])
        ->count();

        $total_dis = DB::table("disease_logs")
        ->whereRaw('MONTH(created_at) = ?',[$cur_month])
        ->count();

        /*
        return view('pages.admin_report',
        ['most_visited_doc' => $most_visited_doc],
        ['most_given_med' => $most_given_med],
        ['most_recom_doc' => $most_recom_doc]);
        */

        return view('pages.admin_report',
                    compact('most_visited_doc','most_regular_pat','most_given_med','most_recom_doc','most_found_dis',
                            'total_app','finished_app','pending_app','cancelled_app',
                            'reg_doc','reg_pat','total_presc','total_med','total_dis')
                    );

    }

}
