<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\ClinicalHistory;
use App\Patient;
use App\Valoration;
use App\Decision;
use App\Laboratorio;
use App\ClinicalHistoryDiagnosis;
use Illuminate\Http\Request;
use Auth;
use Str;
use Illuminate\Support\Facades\Cache;

class ClinicalHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $stop_extend = false)
    {
        $request->session()->put('opened_patient', $request->patient_id);
        $request->session()->put('id_clinical_history', $request->id_clinical_history);
        $patient_id=!empty($request->patient_id)?$request->patient_id:1;
        $patient = Patient::find($request->patient_id);
        $antecedents=$this->_getParameterFromClinicalHistory($patient_id,'antecedents');
        // dd($this->_getParameterFromClinicalHistory($patient_id,'valorations'));
        $valorations=$this->_getParameterFromClinicalHistory($patient_id,'valorations') ? $this->_getParameterFromClinicalHistory($patient_id,'valorations')->reverse() : false;
        // dd($valorations->where('name','Características')->where('section','pain'));
        $abstract_24=$this->_getParameterFromClinicalHistory($patient_id,'valorations','abstract_24_hours_nutriology');
        $clinicalHistory=Patient::find($patient_id)->clinicalHistory;
        if (!$clinicalHistory) {
            $patient->clinicalHistory()->create([
                'user_id' => Auth::user()->id
            ]);
            $clinicalHistory = $patient->clinicalHistory();
        }
        $allFiles = $this->_allFiles($patient_id);
        // dd(Auth::user()->rol->name);
        // dd($request->id_clinical_history);
        $requested_valoration_id = $request->id_clinical_history;
        if((Auth::user()->rol->name=="fisioterapeuta" && ($request->id_clinical_history == 1 || !$request->id_clinical_history)) || ($request->id_clinical_history==1 && Auth::user()->rol->name=='admin')){
            return view('clinical_histories.create_fisiotherapy_clinical_history')->with('patient_id',!empty($patient_id)?$patient_id:false)->
                with('patient', $patient)->
                with('antecedents',$antecedents)->
                with('clinicalHistory',$clinicalHistory)->
                with('abstract_24',$abstract_24)->
                with('valorations',$valorations)->
                with('files', $allFiles);
        }
        if((Auth::user()->rol->name=="rehabilitador" && ($request->id_clinical_history == 1 || !$request->id_clinical_history)) || ($request->id_clinical_history==1 && Auth::user()->rol->name=='admin')){
            return view('clinical_histories.create_clinical_history_rehabilitation')->with('patient_id',!empty($patient_id)?$patient_id:false)->
                with('patient', $patient)->
                with('antecedents',$antecedents)->
                with('clinicalHistory',$clinicalHistory)->
                with('abstract_24',$abstract_24)->
                with('valorations',$valorations);
        }
        elseif (((Auth::user()->rol->name=='admin' || Auth::user()->rol->name=="nutriologo") && ($request->id_clinical_history==2 || !$request->id_clinical_history)) ) {
            return view('clinical_histories.create_nutriology_clinical_history')->with('patient_id',!empty($patient_id)?$patient_id:false)->
                with('patient', $patient)->
                with('antecedents',$antecedents)->
                with('abstract_24',$abstract_24)->
                with('valorations',$valorations);
        }
        elseif ((Auth::user()->rol->name=="traumatologo" || ($request->id_clinical_history==3 && Auth::user()->rol->name=='admin'))) {
            return view('clinical_histories.create_traumatology_clinical_history')->with('patient_id',!empty($patient_id)?$patient_id:false)->
                with('patient', $patient)->
                with('antecedents',$antecedents)->
                with('valorations',$valorations);
        }
        elseif ($request->id_clinical_history==4) {
            return view('valorations.create_valoration_muscular')->with('patient_id',!empty($patient_id)?$patient_id:false)->
                with('patient', $patient)->
                with('antecedents',$antecedents)->
                with('stop_extend', $stop_extend)->
                with('valorations',$valorations);
        }
        //NÓRDICO
        elseif ($request->id_clinical_history==5) {
            return view('valorations.create_valoration_nordic')->with('patient_id',!empty($patient_id)?$patient_id:false)->
                with('patient', $patient)->
                with('antecedents',$antecedents)->
                with('valorations',$valorations);
        }
        //MANO
        elseif ($request->id_clinical_history==6) {
            return view('valorations.create_valoration_physiotherapy_hand')->with('patient_id',!empty($patient_id)?$patient_id:false)->
                with('patient', $patient)->
                with('antecedents',$antecedents)->
                with('valorations',$valorations);
        }
        //ELBOW
        elseif ($request->id_clinical_history==7) {
            return view('valorations.laboral_physiotherapy.create_valoration_laboral_elbow')->with('patient_id',!empty($patient_id)?$patient_id:false)->
                with('patient', $patient)->
                with('antecedents',$antecedents)->
                with('valorations',$valorations);
        }
        //SHOULDER
        elseif ($request->id_clinical_history==8) {
            return view('valorations.laboral_physiotherapy.create_valoration_laboral_shoulder')->with('patient_id',!empty($patient_id)?$patient_id:false)->
                with('patient', $patient)->
                with('antecedents',$antecedents)->
                with('valorations',$valorations);
        }
        //Cervical column
        elseif ($request->id_clinical_history==9) {
            return view('valorations.laboral_physiotherapy.create_valoration_cervical_column')->with('patient_id',!empty($patient_id)?$patient_id:false)->
                with('patient', $patient)->
                with('antecedents',$antecedents)->
                with('valorations',$valorations);
        }
        //LUMBAR COLUMN

        elseif ($request->id_clinical_history==10) {
            return view('valorations.laboral_physiotherapy.create_valoration_lumbar_column')->with('patient_id',!empty($patient_id)?$patient_id:false)->
                with('patient', $patient)->
                with('antecedents',$antecedents)->
                with('valorations',$valorations);
        }
        //LUMBAR COLUMN
        elseif ($request->id_clinical_history==11) {
            return view('valorations.create_valoration_weight_lifting')->with('patient_id',!empty($patient_id)?$patient_id:false)->
                with('patient', $patient)->
                with('antecedents',$antecedents)->
                with('valorations',$valorations);
        }
        //POSTURE
        elseif ($request->id_clinical_history==12) {
            return view('valorations.valoration_postural')->with('patient_id',!empty($patient_id)?$patient_id:false)->
                with('patient', $patient)->
                with('antecedents',$antecedents)->
                with('valorations',$valorations);
        }
        //MARCHA
        elseif ($request->id_clinical_history==13) {
            return view('valorations.create_valoration_gait')->with('patient_id',!empty($patient_id)?$patient_id:false)->
                with('patient', $patient)->
                with('antecedents',$antecedents)->
                with('valorations',$valorations);
        }
        //GONIOMETRY
        elseif ($request->id_clinical_history==14) {
            return view('valorations.create_valoration_goniometry')->with('patient_id',!empty($patient_id)?$patient_id:false)->
                with('patient', $patient)->
                with('antecedents',$antecedents)->
                with('valorations',$valorations);
        }

        //Evolución SOAP
        elseif ($request->id_clinical_history==15 && (Auth::user()->rol->name=='admin' || Auth::user()->rol->name=='fisioterapeuta' || Auth::user()->rol->name=='nutriologo' || Auth::user()->rol->name=='rehabilitador')) {
            return view('valorations.create_valoration_evolution_physiotherapy')->with('patient_id',!empty($patient_id)?$patient_id:false)->
                with('patient', $patient)->
                with('antecedents',$antecedents)->
                with('clinical_history',$clinicalHistory)->
                with('valorations',$valorations);
        }
        //PROGRAMA FISIOTERAPEUTICO EN CASA
        elseif ($request->id_clinical_history==16) {
            return view('valorations.create_home_physiotherapy_program')->with('patient_id',!empty($patient_id)?$patient_id:false)->
                with('patient', $patient)->
                with('antecedents',$antecedents)->
                with('valorations',$valorations);
        }
        //VALORACIÓN FUNCIONAL
        elseif ($request->id_clinical_history==17) {
            return view('valorations.create_valoration_functional_valoration')->with('patient_id',!empty($patient_id)?$patient_id:false)->
                with('patient', $patient)->
                with('antecedents',$antecedents)->
                with('valorations',$valorations);
        }

        //VALORACIÓN DEPORTIVA
        elseif ($request->id_clinical_history==18) {
            return view('valorations.create_valoration_deportive_valoration')->with('patient_id',!empty($patient_id)?$patient_id:false)->
                with('patient', $patient)->
                with('antecedents',$antecedents)->
                with('valorations',$valorations);
        }
                //Valoración pediátrica
        elseif ($request->id_clinical_history==19) {
            return view('valorations.create_valoration_pediatric_valoration')->with('patient_id',!empty($patient_id)?$patient_id:false)->
                with('patient', $patient)->
                with('antecedents',$antecedents)->
                with('valorations',$valorations);
        }
        //HC de rehabilitación
        elseif ($request->id_clinical_history==20 && (Auth::user()->rol->name=='admin' || Auth::user()->rol->name=='rehabilitador')) {
            return view('clinical_histories.create_clinical_history_rehabilitation')->with('patient_id',!empty($patient_id)?$patient_id:false)->
                with('patient', $patient)->
                with('antecedents',$antecedents)->
                with('valorations',$valorations);
        }//VALORATION ortopedia
        elseif ($request->id_clinical_history==21 && (Auth::user()->rol->name=='admin' || Auth::user()->rol->name=='traumatologo')) {
            return view('clinical_histories.create_clinical_history_orthopedy')->with('patient_id',!empty($patient_id)?$patient_id:false)->
                with('patient', $patient)->
                with('antecedents',$antecedents)->
                with('valorations',$valorations);
        }
        elseif ($request->id_clinical_history==22 && (Auth::user()->rol->name=='admin' || Auth::user()->rol->name=='fisioterapeuta')) {
            return view('valorations.section_valoration_muscular_valoration_knee')->with('patient_id',!empty($patient_id)?$patient_id:false)->
                with('patient', $patient)->
                with('antecedents',$antecedents)->
                with('valorations',$valorations);
        }
        elseif ($request->id_clinical_history==23 && (Auth::user()->rol->name=='admin' || Auth::user()->rol->name=='fisioterapeuta')) {
            return view('valorations.section_valoration_muscular_valoration_feet')->with('patient_id',!empty($patient_id)?$patient_id:false)->
                with('patient', $patient)->
                with('antecedents',$antecedents)->
                with('valorations',$valorations);
        }
        elseif ($request->id_clinical_history==24 && (Auth::user()->rol->name=='admin')) {
            return view('valorations.create_valoration_reflexology_valoration')->with('patient_id',!empty($patient_id)?$patient_id:false)->
                with('patient', $patient)->
                with('antecedents',$antecedents)->
                with('valorations',$valorations);
        }
        elseif ($request->id_clinical_history==25 && (Auth::user()->rol->name=='admin')) {
            return view('clinical_histories.create_acupuncture_clinical_history')->with('patient_id',!empty($patient_id)?$patient_id:false)->
                with('patient', $patient)->
                with('antecedents',$antecedents)->
                with('valorations',$valorations);
        }
        elseif ($request->id_clinical_history==26) {
            $newObjective = $request->input('new_objective', false);
            $lastObjective = !$newObjective ? ($clinicalHistory->valorations->where('section', 'physiotherapy_classic_objective')->last()) : null;
            $allObjectives = !$newObjective ? ($clinicalHistory->valorations->where('section', 'physiotherapy_classic_objective')) : null;
            return view('clinical_histories.classic_physiotherapy')->with('patient_id',!empty($patient_id)?$patient_id:false)->
                with('patient', $patient)->
                with('clinical_history',$clinicalHistory)->
                with('antecedents',$antecedents)->
                with('valorations',$valorations)->
                with('lastObjective',$lastObjective)->
                with('allObjectives',$allObjectives);
        }
        else{
            return view('clinical_histories.create_fisiotherapy_clinical_history')->
                with('patient_id',!empty($patient_id)?$patient_id:false)->
                with('patient', $patient)->
                with('antecedents',$antecedents)->
                with('clinicalHistory',$clinicalHistory)->
                with('abstract_24',$abstract_24)->
                with('valorations',$valorations);
        }
    }

    public function printValoration(Request $request) {
        $data = $request->input('data');
        $objectivesNames = array_map( function ($objective) {
            return $objective['name'];
        }, $data);
        $objectivesNames = array_filter($objectivesNames, function ($objective) {
            return !!$objective;
        });
        $patientId = $request->input('patient_id');
        $clinicalHistoryId = Patient::find($patientId)->clinicalHistory->id;
        $valorations = \DB::table('valorations')
            ->where('clinical_history_id', $clinicalHistoryId)
            ->where('section', 'physiotherapy_classic_objective')
            ->orWhere('section', 'physiotherapy_classic_numero_de_sesion')
            ->orWhere('section', 'physiotherapy_classic_actividades')
            ->orWhere('section', 'physiotherapy_classic_observaciones')
            ->orWhere('section', 'physiotherapy_classic_fisioterapeuta')
            ->orderBy('updated_at')
            ->get();

        $workingUpdatedAt = '';
        $sessionsArray = [];
        foreach ($valorations->where('section', 'physiotherapy_classic_objective') as $valorationObjective) {
            if ($objectivesNames){
                if(!in_array($valorationObjective->json_values, $objectivesNames)) continue;
            }
            $valoration = $valorations->where('updated_at', $valorationObjective->updated_at);
            $array = [];
            $objective = $valoration->where('name', "Objetivo")->first() ? $valoration->where('name', "Objetivo")->first()->json_values : '';
            $array['Objetivo'] = $valoration->where('name', "Objetivo")->first() ? $valoration->where('name', "Objetivo")->first()->json_values : '';
            $array['Numero de sesión'] = $valoration->where('name', "Numero de sesión")->first() ? $valoration->where('name', "Numero de sesión")->first()->json_values : '';
            $array['updated_at'] = $valoration->where('name', "Numero de sesión")->first() ? $valoration->where('name', "Numero de sesión")->first()->updated_at : '';
            $array['Actividades'] = $valoration->where('name', "Actividades")->first() ?$valoration->where('name', "Actividades")->first()->json_values : '';
            $array['Observaciones'] = $valoration->where('name', "Observaciones")->first() ?$valoration->where('name', "Observaciones")->first()->json_values : '';
            $array['Fisioterapeuta'] = $valoration->where('name', "Fisioterapeuta")->first() ?$valoration->where('name', "Fisioterapeuta")->first()->json_values : '';
            $sessionsArray[$objective][] = $array;
        }
        $orderedSessionArray = [];
        array_walk($sessionsArray, function ($sessionDate, $key) use (&$orderedSessionArray) {
            uasort($sessionDate, function ($sessionA, $sessionB) use (&$orderedSessionArray) {
                return $sessionA['Numero de sesión'] > $sessionB['Numero de sesión'];
            });
            $orderedSessionArray[$key] = $sessionDate;
        });
        return ($sessionsArray);

    }

    public function _getParameterFromClinicalHistory($patient_id,$parameter,$name=false){
        if(!empty($patient_id)){
            if(($patient=Patient::find($patient_id))){
                if($patient->clinicalHistory){
                    if(!$name){
                        return $patient->clinicalHistory->$parameter;
                    }else{
                        return $patient->clinicalHistory->$parameter->where('name',$name);
                    }
                }
            }
        }
        return false;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->session()->has('opened_patient')){
            $patient_id = $request->session()->get('opened_patient');
            $id_clinical_history = $request->session()->get('id_clinical_history');
            $clinical_history=new ClinicalHistory();

            $A_request = $request->all();
            $A_request['patient_id'] = !empty($request->patient_id)? $request->patient_id : $request->session()->get('opened_patient');
            $clinical_history->saveHistory($A_request);
            $request->session()->forget('opened_patient');
            $request->session()->forget('id_clinical_history');
            return redirect(action('ClinicalHistoryController@create',['patient_id' => $patient_id, 'id_clinical_history'=>$id_clinical_history ]))->with('modifiedSuccess','Historia Modificada');
        }else{
            return redirect(action('ClinicalHistoryController@index'))->with('modifiedFailure','Hubo un error al crear la nota');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClinicalHistory  $clinicalHistory
     * @return \Illuminate\Http\Response
     */
    public function show(ClinicalHistory $clinicalHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClinicalHistory  $clinicalHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(ClinicalHistory $clinicalHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClinicalHistory  $clinicalHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClinicalHistory $clinicalHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClinicalHistory  $clinicalHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClinicalHistory $clinicalHistory)
    {
        //
    }

    public function createDecision(Request $request, $patient_id = 0) {
        if($patient_id){
            $patient = Patient::find($patient_id);
        } else{
            $patient = Patient::find($request->patient_id);
        }
        $decisions = Decision::with('home_physiotherapy_programs')->where('patient_id', $patient->id)->get()->toArray();
        $decisions = array_map(function($element){
            $element['user'] = \App\User::find($element['user_id']); 
            $element['patient'] = \App\Patient::find($element['patient_id']); 
            return $element;
        }, $decisions);
        $clinics = \App\Clinic::all();
        return view('clinical_histories.clinical_decision')
        ->with('patient', $patient)
        ->with('user', Auth::user())
        ->with('clinics', $clinics)
        ->with('json_decisions', json_encode($decisions));
    }

    public function storeDecision (Request $request) {
        Validator::make($request->all(), [
            'text' => 'required'
            ], [
               'text.required' => 'El campo de texto de la receta es requerido.'
            ]
        )->validate();
        $A_request = $request->all();
        unset($A_request['home_physiotherapy_programs']);
        unset($A_request['_token']);
        $decision = new Decision();
        $decision->user_id = Auth::id();
        $decision->fill($A_request);
        $decision->save();

        if (!empty($request->home_physiotherapy_programs)) {
            $syncArray = [];
            $home_physiotherapy_programs = $request->home_physiotherapy_programs;
            array_walk($home_physiotherapy_programs, function ($element) use (&$syncArray) {
                $syncArray[$element] = ['password' => Str::random(10)];
            });
            $decision->home_physiotherapy_programs()->sync($syncArray);
        }
        return redirect(route('history.decision.create', $request->patient_id));
    }

    public function createLaboratoryOrder(Request $request, $patient_id = 0) {
        if($patient_id){
            $patient = Patient::find($patient_id);
        } else{
            $patient = Patient::find($request->patient_id);
        }
        $decisions = Decision::where('patient_id', $patient->id)->get()->toArray();
        $decisions = array_map(function($element){
            $element['user'] = \App\User::find($element['user_id']);
            $element['patient'] = \App\Patient::find($element['patient_id']);
            return $element;
        }, $decisions);
        return view('clinical_histories.laboratory_order')
        ->with('patient', $patient)
        ->with('user', Auth::user())
        ->with('studies', Laboratorio::STUDIES)
        ->with('json_decisions', json_encode($decisions));
    }

    public function storeLaboratoryOrder (Request $request) {
        $A_request = $request->all();
        unset($A_request['_token']);
        $decision = new Decision();
        $decision->user_id = Auth::id();
        $decision->fill($A_request);
        $decision->save();
        return redirect(route('history.decision.create', $request->patient_id));
    }

    public function valorationDelete (Request $request, $updated_at) {
        $parsedUpdatedAt = str_replace('T', ' ', $updated_at);
        $valorations = \DB::table('valorations')
            ->where('updated_at', str_replace('T', ' ', $parsedUpdatedAt))
            ->delete();
        return $valorations;
    }

    public function allFiles(Request $request, $patientId) {
        return $this->_allFiles($patientId);
    }

    private function _allFiles($patientId) {
        return [];
        $files = $this->_findMetadataByName("${patientId}_clinical_history_", true);
        return $files;
    }

    public function addFile(Request $request) {
        $ext = $request->file->extension();
        $name = $request->file->getClientOriginalName();
        $patientId = $request->patient_id;
        $randomString = Str::random(5);
        $title = "${patientId}_clinical_history_${randomString}_${name}";
        \Storage::disk('google')->put($title, $request->file->get());
        Cache::store('redis')->forget('google_files');
        return response('success');
    }
    
    public function removeFile(Request $request, $path) {
        \Storage::disk('google')->delete($path);
        return response('success');
    }

    public function downloadFile(Request $request, $fileId) {
        return \Storage::disk('google')->download($fileId);
    }

    public function _findMetadataByName ($name, $isFile = true) {
        $files = Cache::store('redis')->remember('google_files', 43200, function () {
            return \Storage::disk('google')->files();
        });
        $directories = Cache::store('redis')->remember('google_files', 43200, function () {
            return \Storage::disk('google')->directories();
        });
        $filesAdapter = Cache::store('redis')->remember('google_files_adapter', 43200, function () {
            \Storage::disk('google')->files();
            return \Storage::disk('google')->getAdapter(); 
        });
        $directoriesAdapter = Cache::store('redis')->remember('google_directories_adapter', 43200, function () {
            \Storage::disk('google')->directories();
            return \Storage::disk('google')->getAdapter();
        });
        $files = $isFile ? $files : $directories;
        $gDriveAdapter = $isFile ? $filesAdapter : $directoriesAdapter;
        $folderMetadata = [];
        foreach ($files as $file) {
            $metadata = $gDriveAdapter->getMetadata($file);
            if ( strpos($metadata['name'], $name) !== false) {
                $folderMetadata[] = $metadata;
            }
        }
        return $folderMetadata;
    }
}
