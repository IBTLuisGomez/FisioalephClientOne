<?php

namespace App\Http\Controllers;

use App\ProtocoloFisioterapiaLMG;
use Illuminate\Http\Request;

class ProtocoloFisioterapiaLMGController extends CRUDController
{
    public function __construct(array $attributes = array()){
        parent::__construct();
        $this->index_search_fields = array(
            'name'
        );
        $this->route_path = 'protocolos_fisioterapia_lmg';
        $this->class_name = '\App\ProtocoloFisioterapiaLMGController';
        $this->model_name = '\App\ProtocoloFisioterapiaLMG';
        $this->short_model_name = 'ProtocoloFisioterapiaLMG';
        // $this->file_output = 'images/protocolos_fisioterapia/';
        $this->A_validator = [
            'name' => 'required',
        ];
        $this->A_validator_messages = [
            'name.required'=>'El campo de nombre es obligatorio',
        ];
        // $this->relationships = [
        //     'cie10_risk_factors',
        //     'cie10_lesions_pf',
        //     'tests_and_meassurements',
        // ];
        $this->file_relationships = [
        ];
        $this->keys = [
            'index' => [
                'name'=>'Nombre',
            ],
            'user_id' => true,
            'create' => [
                ['key'=>'name', 'label'=>'Nombre', 'type'=>'text'],

                ['key'=>'mild_phisiotherapy_sesions', 'label'=>'Leve Sesión', 'type'=>'textarea', 'rows'=>4],

                ['key'=>'mild_phisiotherapy_time', 'label'=>'Leve Tiempo', 'type'=>'text'],

                ['key'=>'mild_phisiotherapy_number_of_sesions', 'label'=>'Leve Tiempo', 'type'=>'text'],

                ['key'=>'moderate_phisiotherapy_sesions', 'label'=>'Moderado Sesión', 'type'=>'textarea', 'rows'=>4],

                ['key'=>'moderate_phisiotherapy_time', 'label'=>'Moderado Tiempo', 'type'=>'text'],

                ['key'=>'moderate_phisiotherapy_number_of_sesions', 'label'=>'Moderado Tiempo', 'type'=>'text'],

                ['key'=>'severe_phisiotherapy_sesions', 'label'=>'Grave Sesión', 'type'=>'textarea', 'rows'=>4],

                ['key'=>'severe_phisiotherapy_time', 'label'=>'Grave Tiempo', 'type'=>'text'],

                ['key'=>'severe_phisiotherapy_number_of_sesions', 'label'=>'Grave Tiempo', 'type'=>'text'],

            ]
        ];
    }
}
