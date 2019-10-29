<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;

class PatientController extends Controller
{
    public function index(){
    	return view("patient.index")->with("collection",Patient::all());
    }
}
