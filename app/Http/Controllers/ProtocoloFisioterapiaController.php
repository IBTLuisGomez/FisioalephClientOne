<?php

namespace App\Http\Controllers;

use App\ProtocoloFisioterapia;
use App\DiagnosisPlan;
use Illuminate\Http\Request;
use App\CatCIE10;
use App\Http\Controllers\CRUDController;

class ProtocoloFisioterapiaController extends CRUDController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(array $attributes = array()){
        parent::__construct();
        $this->index_search_fields = array(
            'name'
        );
        $this->printTableHeader = true;
        $this->route_path = 'protocolos_fisioterapia';
        $this->class_name = '\App\ProtocoloFisioterapiaController';
        $this->model_name = '\App\ProtocoloFisioterapia';
        $this->short_model_name = 'ProtocoloFisioterapia';
        $this->file_output = 'images/protocolos_fisioterapia/';
        $this->A_validator = [
            'name' => 'required',
        ];
        $this->A_validator_messages = [
            'name.required'=>'El campo de nombre es obligatorio',
        ];
        $this->relationships = [
            'cie10_risk_factors',
            'cie10_lesions_pf',
            'tests_and_meassurements',
            'keywords',
            'anato_physiology_glosary_item',
        ];
        $this->file_relationships = [
        ];
        $this->keys = [
            'index' => [
                'name'=>'Nombre',
                'version'=>'Versión',
            ],
            'create' => [
                ['label'=>'Nombre', 'type'=>'separator', 'class' => "no_print", 'tag'=>'h4', 'no_count' => true],
                ['key'=>'name', 'label'=>'', 'class' => "no_print", 'type'=>'text'],
                'anato_physiology_glosary_item'=>[
                    'single' => true,
                    'addRoute' => 'anato_physiology_glosary_item.create',
                    'viewRoute' => 'anato_physiology_glosary_item.show',
                    'key'=>'anato_physiology_glosary_item',
                    "print"=>true,
                    'label'=>'Categoría anatómica/fisiológica',
                    'type'=>'autocompletable_multiple',
                    'class'=>'anato_physiology_glosary_item',
                    'name'=>'anato_physiology_glosary_item',
                    'url'=>'anato_physiology_glosary_item/ajaxGet'
                ],
                'keywords'=>[
                    'single' => false,
                    'addRoute' => 'keywords.create',
                    'viewRoute' => 'keywords.show',
                    'key'=>'keywords',
                    'label'=>'Palabras Clave',
                    'type'=>'autocompletable_multiple',
                    'class'=>'autocompletable_cie10_lesions',
                    'name'=>'keywords',
                    'url'=>'keywords/ajaxGet'
                ],
                ['label'=>'Código', 'type'=>'separator', 'class' => "no_print", 'tag'=>'h4', 'no_count' => true],
                ['key'=>'code', 'label'=>'', 'class' => "no_print", 'type'=>'text'],
                'cie10_risk_factors'=>[
                    'key'=>'cie10_risk_factors',
                    "print"=>false,
                    'label'=>'CIE10 asociados (Enfermedades, complicaciones)',
                    'type'=>'autocompletable_multiple',
                    'class'=>'autocompletable_cie10_risks',
                    'name'=>'cie10_risk_factors',
                    'url'=>'ajax_get_cie10',
                    'onAdd' => 'addCie10',
                    'onRemove' => 'removeCie10',
                    'viewRoute' => 'cie10.show',
                ],
                ['label'=>'Páginas', 'type'=>'separator', 'class' => "no_print", 'tag'=>'h4', 'no_count' => true],
                ['key'=>'pages', 'label'=>'', 'class' => "no_print", 'type'=>'text'],
                ['label'=>'Version', 'type'=>'separator', 'class' => "no_print", 'tag'=>'h4', 'no_count' => true],
                ['key'=>'version', 'label'=>'', 'class' => "no_print", 'type'=>'text'],
                ['label'=>'Revisado por', 'type'=>'separator', 'class' => "no_print", 'tag'=>'h4', 'no_count' => true],
                ['key'=>'revised_by', 'label'=>'', 'class' => "no_print", 'type'=>'text'],
                ['label'=>'Elaborado por', 'type'=>'separator', 'class' => "no_print", 'tag'=>'h4', 'no_count' => true],
                ['key'=>'made_by', 'label'=>'', 'class' => "no_print", 'type'=>'text'],

                ['label'=>'Objetivos', 'type'=>'separator', 'tag'=>'h4'],
                ['key'=>'objective', 'label'=>'', 'type'=>'textarea', 'rows' => 3],


                ['label'=>'Alcance', 'type'=>'separator', 'tag'=>'h4'],
                ['key'=>'reach', 'label'=>'', 'type'=>'textarea', 'rows'=>3],

                ['label'=>'Definiciones y Abreviaturas', 'type'=>'separator', 'tag'=>'h4'],
                ['key'=>'abbreviations', 'label'=>'', 'type' => 'textarea'],

                ['label'=>'4. Contendio de la guía', 'type'=>'separator', 'tag'=>'h4'],

                ['label'=>'4.1 Criterios de Inclusión', 'type'=>'separator', 'tag'=>'h5'],

                ['key'=>'text_risk_factors', 'label'=>'4.1.1 Factores de Riesgo', 'type' => 'textarea', 'rows' => 5],

                ['key'=>'text_lesions', 'label'=>'4.1.2 Lesiones, Limitación Funcional o Discapacidad', 'type' => 'textarea', 'rows' => 3],

                ['label'=>'4.2 Examen', 'type'=>'separator', 'tag'=>'h5'],

                ['key'=>'clinical_history', 'label'=>'4.2.1 Historia clínica', 'type' => 'textarea', 'rows'=> 5],

                ['key'=>'text_revision_systems', 'label'=>'4.2.2 Revisión por sistemas', 'type' => 'textarea'],

                'tests_and_meassurements'=>[
                    'key'=>'tests_and_meassurements',
                    'label'=>'4.3 Pruebas y medidas (catálogo de pruebas y medidas funcionales)',
                    
                    'type'=>'autocompletable_multiple',
                    'class'=>'tests_and_meassurements',
                    'name'=>'tests_and_meassurements',
                    'url'=>'diagnosis_plan/ajaxGet',
                    'viewRoute' => 'diagnosis_plan.show',
                ],

                ['key'=>'prognosis', 'label'=>'4.4 Pronóstico', 'type'=>'textarea'],

                // ['key'=>'intervention', 'label'=>'4.6 Intervención', 'type'=>'textarea'],

                ['key'=>'cie10_frames', 'label'=>'', 'type' => 'div'],

                // ['label'=>'Equipos y elementos con los que cuenta el servicio de fisioterapia para el manejo de pacientes', 'type'=>'separator', 'tag'=>'h4'],
                // ['label'=>'Equipos y elementos con los que cuenta el servicio de fisioterapia para la atención de esta condición', 'type'=>'separator', 'tag'=>'h4'],

                // ['key'=>'text_equipment_and_elements', 'label'=>'', 'type'=>'textarea'],
                ['label'=>'Bibliografía', 'link' => ['text' => 'APA ITEMS', 'class'=>"no_print", 'href' => 'https://www.cva.itesm.mx/biblioteca/pagina_con_formato_version_oct/apaweb.html'], 'type'=>'separator', 'tag'=>'h4'],
                ['key'=>'bibliography', 'label'=>'', 'type'=>'textarea', 'rows'=>'4'],
                ['key'=>'is_sealed', 'label'=>'Sellar versión', 'type'=>'checkbox', "print"=>false],
            ],
        ];
    }

    public function getAllWithRelationShips($id){
        return ProtocoloFisioterapia::where('id',$id)->with('cie10_risk_factors_complete')->first();
    }

    public function newVersion ($id) {
        $protocol = ProtocoloFisioterapia::find($id);
        $newProtocol = $protocol->replicate();
        $newProtocol->is_sealed = false;
        $newProtocol->name = $newProtocol->name . "($newProtocol->id)";
        $newProtocol->save();
        return redirect(route('protocolos_fisioterapia.edit', $newProtocol->id));
    }
}
