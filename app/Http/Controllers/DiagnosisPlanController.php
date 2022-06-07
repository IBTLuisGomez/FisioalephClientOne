<?php

namespace App\Http\Controllers;

use App\DiagnosisPlan;
use Illuminate\Http\Request;
use \App\Http\Controllers\CRUDController;
use Illuminate\Support\Facades\Validator;

class DiagnosisPlanController extends CRUDController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(array $attributes = array()){
        parent::__construct();

        $this->printTableHeader = true;
        $this->route_path = 'diagnosis_plan';
        $this->title = 'Pruebas y medidas funcionales';
        $this->class_name = '\App\DiagnosisPlanController';
        $this->model_name = '\App\DiagnosisPlan';
        $this->short_model_name = 'DiagnosisPlan';
        $this->file_output = 'images/plans_images/diagnosis/';
        $this->relationships = [
            'OutsideResource'=>'outside_resources',
            'Keyword'=>'keywords',
            'anato_physiology_glosary_item',
        ];
        $this->A_validator = [
            'name' => 'required',
            'description' => 'required'];
        $this->A_validator_messages=[
            'name.required'=>'El campo de nombre es obligatorio',
            'description.required'=>'El campo de descripción es obligatorio',
        ];
        $this->file_relationships = [
            'ImageResource'=>'image_resources'
        ];
        $this->permissions = ['edit' => 'physiotherapyOffice.edit_diagnosis_plan'];
        $this->keys = [
            'index' => [
                'name'=>'Nombre',
                'description'=>'Descripción',
            ],
            'create' => [
                'name'=>['key' => 'name' , 'label' => 'Nombre', 'type' => 'text', "class"=>'no_print'],
                'anato_physiology_glosary_item'=>[
                    'single' => true,
                    'addRoute' => 'anato_physiology_glosary_item.create',
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
                    'key'=>'keywords',
                    'label'=>'Palabras Clave',
                    'type'=>'autocompletable_multiple',
                    'class'=>'autocompletable_cie10_lesions',
                    'name'=>'keywords',
                    'url'=>'keywords/ajaxGet'
                ],
                'pages' => ['key'=>'pages', 'label' => 'Páginas', 'type' => 'text', "class"=>"no_print"],
                'version' => ['key'=>'version', 'label' => 'Version', 'type' => 'text', "class"=>"no_print"],
                'code' => ['key'=>'code', 'label' => 'Código', 'type' => 'text', "class" =>"no_print"],
                'author' => ['key'=>'made_by', 'label' => 'Elaborado por', 'type' => 'text', "class"=>"no_print"],
                'revisor' => ['key'=>'revised_by', 'label' => 'Revisor', 'type' => 'text', "class"=>"no_print"],
                'description' => ['key' => 'description' , 'label' => 'Descripción', 'type' => 'textarea'],
                'outside_resources'=>['key'=>'outside_resources', 'label'=>'Enlaces externos', 'type' => 'multiple_urls'],
                'image_resources'=>['key'=>'image_resources', 'label'=>'Imágenes. Tests. Pruebas. Medidas funcionales.', 'type' => 'multiple_images'],
                'bibliography'=>['key'=>'bibliography', 'label'=>'Bibliografía', 'type' => 'textarea', 'rows'=>'3'],
                ['key'=>'is_sealed', 'label'=>'Sellar versión', 'type'=>'checkbox', "print"=>false],
            ]
        ];
    }
    // public function show($id){
    //     return view('CRUDViews.view')->with('O_model', DiagnosisPlan::with('outside_resources')->with('image_resources')->find($id));
    // }
    public function newVersion ($id) {
        $diagnosisPlan = DiagnosisPlan::find($id);
        $newdiagnosisPlan = $diagnosisPlan->replicate();
        $newdiagnosisPlan->is_sealed = false;
        $newdiagnosisPlan->name = $newdiagnosisPlan->name . "($newdiagnosisPlan->id)";
        $newdiagnosisPlan->save();
        return redirect(route('diagnosis_plan.edit', $newdiagnosisPlan->id));
    }
}
