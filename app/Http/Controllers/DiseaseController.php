<?php

namespace App\Http\Controllers;

use App\Disease;
use Illuminate\Http\Request;

/**
 * @group Disease Management
 *
 * APIs for managing diseases
 */

class DiseaseController extends Controller
{
    
    public function autocomplete(Request $request)
    {
        $data = Disease::select("name")
                ->where("name","LIKE","%{$request->input('query')}%")
                ->get();
   
        return response()->json($data);
    }

}
