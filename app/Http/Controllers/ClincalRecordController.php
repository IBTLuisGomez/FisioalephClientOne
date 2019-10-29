<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Patient;
class ClincalRecordController extends Controller
{
    public function patient_list(){
    	$patients= Patient::all();
    	return view("clinical_record.patient_list")->with(compact("patients"));
    }
}
