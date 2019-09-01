<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\prescription;
use App\medicine_log;
use App\medicine;
use Carbon\Carbon;
use DB;


class MedicineLogController extends Controller
{
    public function pat_medicine($patient_id)
    {
        $prescription_id = DB::table('prescriptions')
            ->select('id')
            ->where('patient_id', '=', [$patient_id])
            ->get();

        $pres_id = json_decode(json_encode($prescription_id), true);

        $medicines = DB::table('medicine_logs')
            ->whereIn('prescription_id', $pres_id)
            ->get();

        $morning_med = [];
        $noon_med = [];
        $evening_med = [];

        $count = 1;
        foreach ($medicines as $medicine) {
            $start = Carbon::parse($medicine->created_at);
            $now = Carbon::now();
            $elapsed_time = $now->diffInDays($start);

            if ($elapsed_time <= $medicine->course_duration) {
                $med_name = DB::table('medicines')
                    ->where('id', '=', [$medicine->medicine_id])
                    ->get();
                $due_time = $medicine->course_duration - $elapsed_time;

                $m_dose = substr($medicine->dose, -3, 1);
                if ($m_dose != '0') {
                    foreach ($med_name as $m_name) {
                        $mm = [$m_name->trade_name, $m_dose, $due_time];
                        $morning_med[$count] = $mm;
                    }
                }

                $n_dose = substr($medicine->dose, -2, 1);
                if ($n_dose != '0') {
                    foreach ($med_name as $m_name) {
                        $nm = [$m_name->trade_name, $n_dose, $due_time];
                        $noon_med[$count] = $nm;
                    }
                }

                $e_dose = substr($medicine->dose, -1, 1);
                if ($e_dose != '0') {
                    foreach ($med_name as $m_name) {
                        $em = [$m_name->trade_name, $e_dose, $due_time];
                        $evening_med[$count] = $em;
                    }
                }
                $count = $count + 1;
            }
        }

        $time = Carbon::now('Asia/Dhaka');
        $t_format = $time->format('h:i');
        $hour = $time->format('H');
        if($hour > 12){
            $h_format = 'pm';
        }
        else{
            $h_format = 'am';
        }

        return view(
            'pages.pat_medicine',
            compact(
                'morning_med',
                'noon_med',
                'evening_med',
                't_format',
                'h_format'
            )
        );
    }
}
