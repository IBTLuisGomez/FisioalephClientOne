<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobAnalysisController extends CRUDController
{
    public function __construct(array $attributes = array()){
        parent::__construct();

        $this->route_show = 'job_analysis.show';
        $this->index_search_fields = array(
            'name'
        );
        $this->route_path = 'job_analysis';
        $this->class_name = '\App\JobAnalysisController';
        $this->model_name = '\App\JobAnalysis';
        $this->short_model_name = 'JobAnalysis';
        // $this->file_output = 'images/plans_images/diagnosis/';
        $this->A_validator = [
            // 'name' => 'required',
        ];
        $this->A_validator_messages = [
            // 'name.required'=>'El campo de nombre es obligatorio',
        ];
        $this->relationships = [
        ];
        $this->file_relationships = [

        ];
        $this->keys = [
            'index' => [
                'patient_id'=>'PacienteId',
                // 'user_id.filter'=>'Usuario',
            ],
            'user_id' => true,
            'create' => [
                // ['key'=>'name', 'label'=>'Nombre', 'type'=>'text'],
                // ['key'=>'code', 'label'=>'Clave', 'type'=>'text'],
            ]
        ];
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('valorations.create_job_analysis')->
            with('valorations', [])
            ->with('useVue', true);
    }
}
