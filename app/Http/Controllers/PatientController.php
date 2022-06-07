<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\State;
use App\User;
use Validator;
use Auth;

class PatientController extends Controller
{

    public function index(Request $request){
        $collection=[];
        if(!empty($request->all()['search'])){
            $collection = Patient::all();
            $term = $request->all()['search'];
            $collection= $collection->filter(function ($patient) use ($term) {
                return is_numeric(strpos(strtolower($patient->full_name), strtolower($term)));
            });
            if (!Auth::user()->admin &&
                (Auth::user()->rol->name=="traumatologo" ||
                Auth::user()->rol->name=="rehabilitador" ||
                Auth::user()->rol->name=="nutriologo")) {
                $collection = $collection->where('responsible_id', Auth::user()->id);
            }
        }
        if($request->input('laboral') == 1) {
            return view("patient.laboral_job_analysis_index")->with("collection",$collection);
        }
        else if($request->input('laboral') == 5) {
            return view("patient.nordic_index")->with("collection",$collection);
        }else if($request->input('laboral') == 11) {
            return view("patient.cargas_index")->with("collection",$collection);
        }else if($request->input('laboral') == 2) {
            return view("patient.evaluaciones_index")->with("collection",$collection);
        }else {
            return view("patient.index")->with("collection",$collection);
        }
    }
    public function create(){
        $responsibleIdOptions = User::all()->pluck('name', 'id');
    	return view("patient.create")->with('states',State::all())
            ->with('responsibleIdOptions',$responsibleIdOptions);
    }
    public function edit(Patient $paciente){

        $responsibleIdOptions = User::all()->pluck('name', 'id');

    	return view("patient.create")
            ->with('states',State::all())
            ->with('responsibleIdOptions',$responsibleIdOptions)
            ->with('model', $paciente);
    }
    public function store(Request $request) {
        $res = $this->_store_patient($request);
        return $res ? $res : redirect(action('PatientController@index'))->with(['createdPatient'=>'Tu paciente ha sido creado']);
    }
    public function update(Request $request, Patient $paciente){
        $res = $this->_store_patient($request, $paciente);
        return $res ? $res : redirect(action('PatientController@index'))->with(['createdPatient'=>'Tu paciente ha sido modificado']);
    }
    
    public function destroy(Request $request, Patient $paciente){
        $res = $paciente->delete();
        return redirect(action('PatientController@index'))->with(['createdPatient'=>'Tu paciente ha sido eliminado']);
    }

    private function _store_patient($request ,$patient = false){
            $validator=Validator::make($request->all(),[
                    'name' => 'required|max:255',
                    'surname' => 'required|max:255',
                    'birth_date' => 'required|before:'.date(now()),
                    'birth_state_id'=>[
                        'required',
                        'integer',
                        function($attribute, $value, $fail){
                            if($value==33){
                                $fail('Por favor selecciona un estado de nacimiento');
                            }
                        }
                    ],
                    'birth_municipality_id'=>[
                        'required',
                        'integer',
                        function($attribute, $value, $fail){
                            if($value==1 || $value==0){
                                $fail('Por favor selecciona un municipio de nacimiento');
                            }
                        }
                    ]
                ], [
                    'name.required' => 'El nombre debe ser definido',
                    'surname.required' => 'El apellido paterno debe ser definido',
                    'birth_date.required' => 'La fecha de nacimiento debe ser definida',
                    'birth_date.before' => 'Introduce una fecha de nacimiento antes del día de hoy',
                    'birth_municipality_id.required' => 'Por favor selecciona un municipio de nacimiento',
                ]);
                if ($validator->fails()) {
                    return redirect(route('pacientes.create'))
                    ->withErrors($validator)
                    ->withInput();
            }
            $A_request=$request->all();
            unset($A_request['_token']);
            if(!$patient){
                $patient=new Patient($A_request);
            }else{
                $patient->fill($A_request);
            }
            $patient->save();
            return null;
    }
}
