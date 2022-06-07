<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Decision;
use App\DecisionHpp;
use App\HomePhysiotherapyProgram;
use \Illuminate\Support\Facades\Route;
class DecisionController extends Controller
{
    function apiHomePhysiotherapyProgramShow(Request $request, $password) {
        $hpfId = DecisionHpp::where('password', $password)->first()->home_physiotherapy_program;
        $homePhysiotherapyProgram = $hpfId->with('exercise.image_resources')
            ->with('massage.image_resources')
            ->with('physical_agent.image_resources')
            ->with('prescription.image_resources')
            ->with('contraindication')
            ->with('contraindication')
            ->find($hpfId->id);
        return response($homePhysiotherapyProgram, 200);
    }

    public function show (Request $request, $password) {
        $decisionId = $request->input('decisionId', false);
        $clinic = null;
        $patient = null;
        $decision = json_encode('');
        if ($decisionId){
            $decision = Decision::find($decisionId);
            $decision->patient = $decision->patient;
            $decision->clinic = $decision->clinic;
        }
        if (is_numeric($password)) {
            $hpf = HomePhysiotherapyProgram::find($password);
        } else {
            $hpf = DecisionHpp::where('password', $password)->first()->home_physiotherapy_program;
        }
        return view('decision.show')
            ->with('useVue', true)
            ->with('hppId', $hpf->id)
            ->with('decision', $decision);
    }
}
