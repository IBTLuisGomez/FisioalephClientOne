<?php

namespace App\Http\Controllers;

use App\TerapeuticPlan;
use Illuminate\Http\Request;
use \App\Http\Controllers\CRUDController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class TerapeuticPlanController extends CRUDController
{
    public function create()
    {
        return view('terapeutic_plan.add')->
        with('title',!empty($this->title)?$this->title:null)->
        with('form_method','post')->
        with('form_url',route($this->route_path.'.store'))->
        with('patient_id',!empty($this->patient_id)? $this->patient_id : null)->
        with('default', [])->
        with('keys', $this->keys['create']);
    }
    public function edit($id, $stop_extend = false)
    {
        $model = $this->model_name::where('id',$id)->first();
        if(!empty($this->relationships)){
            foreach ($this->relationships as $key => $relationship_name) {
                if(!empty($this->keys['edit'])){
                    if(empty($this->keys['edit'][$relationship_name]['default'])) {
                        $this->keys['edit'][$relationship_name]['default']=$model->$relationship_name;
                    }
                }else{
                    $collection = $model->$relationship_name;
                    if(!$collection) {
                        unset($this->keys['create'][$relationship_name]['default']);
                        continue;
                    }
                    $this->keys['create'][$relationship_name]['default'] = get_class($collection) == "Illuminate\Database\Eloquent\Collection" ? $model->$relationship_name : collect()->add($model->$relationship_name);
                }
            }
        }
        if(!empty($this->file_relationships)){
            foreach ($this->file_relationships as $key => $relationship_name) {
                if(!empty($this->keys['edit'])){
                    $this->keys['edit'][$relationship_name]['default']=$model->$relationship_name;
                }else{
                    $this->keys['create'][$relationship_name]['default']=$model->$relationship_name;
                }
            }
        }
        return view('terapeutic_plan.add')->
        with('form_method','put')->
        with('route_prefix',$this->route_path)->
        with('form_url',route($this->route_path.'.store'))->
        with('keys',(!empty($this->keys['edit']))?$this->keys['edit']:$this->keys['create'])->
        with('stop_extend',$stop_extend)->
        with('patient_id',!empty($this->patient_id)? $this->patient_id : null)->
        with('protocol', $this->class_name == '\App\ProtocoloFisioterapiaController' ? $model : null)->
        with('O_model',$model)->
        with('printTableHeader', !empty($this->printTableHeader) ? $this->printTableHeader : null);

    }
    public function show($id)
    {
        $model = $this->model_name::where('id',$id)->first();
        if(!empty($this->relationships)){
            foreach ($this->relationships as $key => $relationship_name) {
                if(!empty($this->keys['edit'])){
                    if(empty($this->keys['edit'][$relationship_name]['default'])) {
                        $this->keys['edit'][$relationship_name]['default']=$model->$relationship_name;
                    }
                }else{
                    $collection = $model->$relationship_name;
                    if(!$collection) {
                        unset($this->keys['create'][$relationship_name]['default']);
                        continue;
                    }
                    $this->keys['create'][$relationship_name]['default'] = get_class($collection) == "Illuminate\Database\Eloquent\Collection" ? $model->$relationship_name : collect()->add($model->$relationship_name);
                }
            }
        }
        if(!empty($this->file_relationships)){
            foreach ($this->file_relationships as $key => $relationship_name) {
                if(!empty($this->keys['edit'])){
                    $this->keys['edit'][$relationship_name]['default']=$model->$relationship_name;
                }else{
                    $this->keys['create'][$relationship_name]['default']=$model->$relationship_name;
                }
            }
        }
        return view('terapeutic_plan.view')->
        with('form_method','put')->
        with('route_prefix',$this->route_path)->
        with('form_url',route($this->route_path.'.store'))->
        with('keys',$this->keys['create'])->
        with('stop_extend',false)->
        with('patient_id',!empty($this->patient_id)? $this->patient_id : null)->
        with('protocol', $this->class_name == '\App\ProtocoloFisioterapiaController' ? $model : null)->
        with('O_model',$model)->
        with('printTableHeader', !empty($this->printTableHeader) ? $this->printTableHeader : null)->
        with('newVersionRoute', $this->route_path ? $this->route_path.'.new_version'  : null );

    }

    public function newVersion ($id) {
        $terapeuticPlan = TerapeuticPlan::find($id);
        $newTerapeuticPlan = $terapeuticPlan->replicate();
        $newTerapeuticPlan->is_sealed = false;
        $newTerapeuticPlan->name = $newTerapeuticPlan->name . "($newTerapeuticPlan->id)";
        $newTerapeuticPlan->save();
        return redirect(route('terapeutic_plan.edit', $newTerapeuticPlan->id));
    }

    public function update(Request $request, $id)
    {
        $model = $this->model_name::where('id',$id)->first();
        if($extras = $request->input('extras',null)){
            $model->extras = json_encode($extras);
        } else {
            $model->extras = json_encode([]);
        }
        if(!empty($this->A_validator_update)){
            $this->A_validator_update = array_map(
                function ($string) use ($model) {
                    $string = str_replace('{{id}}', $model->id, $string);
                    return $string;
                },
                $this->A_validator_update
            );
            Validator::make($request->all(), $this->A_validator_update, $this->A_validator_messages)->validate();
        } elseif (!empty($this->A_validator)) {
            Validator::make($request->all(), $this->A_validator, $this->A_validator_messages)->validate();
        }
        $A_request=$request->all();
        unset($A_request['_token']);
        unset($A_request['refresh']);
        $A_relationships = [];
        if (!empty($this->files)) {
            foreach ($this->files as $fileField) {
                if ($request->$fileField) {
                    $originalFileName = $request->file($fileField)->getClientOriginalName();
                    $tmpFile = $request->file($fileField)->getPathName();
                    $A_request[$fileField] = $originalFileName;
                    Storage::cloud()->put($originalFileName, $request->$fileField->get());
                }
            }
        }
        if(!empty($this->relationships)){
        foreach ($this->relationships as $key => $relationship_name) {
                if(!empty($A_request[$relationship_name])){
                    $A_relationships[$relationship_name]['value']=$A_request[$relationship_name];
                    $A_relationships[$relationship_name]['model']='\App\\'.$key;
                    $A_relationships[$relationship_name]['type']='normal';
                }
                else{
                    $A_relationships[$relationship_name]['model']='\App\\'.$key;
                    $A_relationships[$relationship_name]['value']=[];
                    $A_relationships[$relationship_name]['type']='normal';
                }
                unset($A_request[$relationship_name]);
                }
        }
        if(!empty($this->file_relationships)){
            foreach ($this->file_relationships as $key => $relationship_name) {
                if(!empty($A_request[$relationship_name])){
                    $A_relationships[$relationship_name]['file']=$A_request[$relationship_name];
                    $A_relationships[$relationship_name]['model']='\App\\'.$key;
                    $A_relationships[$relationship_name]['type']='file';

                }
                else{
                    $A_relationships[$relationship_name]['type']='file';
                    $A_relationships[$relationship_name]['model']='\App\\'.$key;
                    $A_relationships[$relationship_name]['file']=[];
                }
                unset($A_request[$relationship_name]);
            }
        }
        if(($id = Auth::id()) && !empty($this->keys['user_id'])){
            $model->user_id = $id;
        }
        $model->update($A_request);
        foreach ($A_relationships as $relationship_name => $relationship) {
            $class = explode('\\', get_class($model->$relationship_name()));
            $rel_model = $class [sizeof($class)-1];
            if($relationship['type'] == 'file'){;
                //delete non required images
                $filesToDelete = $model->$relationship_name;
                foreach ($relationship['file'] as $file) {
                    if (is_string($file)) {
                        $filesToDelete = $filesToDelete->where('url', '!=', $file);
                        continue;
                    }
                    $S_file_name = time().uniqid(rand()).".".$file->getClientOriginalExtension();
                    $relationship['value']['url'] = $this->file_output.$S_file_name;
                    $res = $file->move(public_path($this->file_output),$S_file_name);
                    $A_model_info['url'] = $this->file_output.$S_file_name;
                    $model_route = $relationship['model'];
                    $model_class = new $model_route($A_model_info);
                    $model->$relationship_name()->save($model_class);
                }
                foreach ($filesToDelete as $file) {
                    $file->delete();
                }
            }else{
            if($rel_model == "HasMany"){
                $model->$relationship_name()->delete();
                $model_route=$relationship['model'];
                foreach ($relationship['value'] as $inmodel_info){
                    $model_class =  new $model_route($inmodel_info);
                    $model->$relationship_name()->save($model_class);
                }
            }
            elseif ('BelongsTo' == $rel_model) {
                $keyName = $model->$relationship_name()->getForeignKeyName();
                if (empty($relationship['value'][0])) {
                    $model->$keyName = null;
                }else {
                   $model->$keyName = $relationship['value'][0];
                }
                $model->save();
            }
            else{
                $model->$relationship_name()->sync($relationship['value']);
            }
            }

        }
        if($request->input('refresh')){
            return redirect()->route($this->route_path.'.edit_stop_extend', ['id'=>$model->id, 'stop_extend' =>true]);
            return view('CRUDViews.add')->
            with('form_method','put')->
            with('route_prefix',$this->route_path)->
            with('form_url',route($this->route_path.'.store'))->
            with('keys',$this->keys['create'])->
            with('O_model',$model)->
            with('stop_extend', true);
        }
        return redirect(route($this->route_path.'.index'))->with('success','Se ha modificado con exito');
    }

    public function __construct(array $attributes = array()){
        parent::__construct();

        $this->route_path = 'terapeutic_plan';
        $this->printTableHeader = true;
        $this->permissions = ['edit' => 'physiotherapyTherapeuticPlan.see'];
        $this->class_name = '\App\TerapeuticPlanController';
        $this->model_name = '\App\TerapeuticPlan';
        $this->short_model_name = 'TerapeuticPlan';
        $this->file_output = 'images/plans_images/diagnosis/';
        $this->A_validator = [
            'name' => 'required',
            'description' => 'required'];
        $this->A_validator_messages = [
            'name.required'=>'El campo de nombre es obligatorio',
            'description.required'=>'El campo de descripción es obligatorio',
        ];
        $this->relationships = [
            'OutsideResource'=>'outside_resources',
            'keywords',
            'anato_physiology_glosary_item',
        ];
        $this->file_relationships = [
            'ImageResource'=>'image_resources'
        ];
        $this->keys = [
            'index' => [
                'name'=>'Nombre',
                'description'=>'Descripción',
            ],
            'create' => [
                ['label'=>'Nombre', 'type'=>'separator', 'class' => "no_print", 'tag'=>'h4', 'no_count' => true],
                ['key'=>'name', 'label'=>'', 'class' => "no_print", 'type'=>'text'],
                ['label'=>'Description', 'type'=>'separator', 'class' => "no_print", 'tag'=>'h4', 'no_count' => true],
                ['key' => 'description' , 'label' => '', 'type' => 'text'],
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
                ['label'=>'Código', 'type'=>'separator', 'class' => "no_print", 'tag'=>'h4', 'no_count' => true],
                ['key'=>'code', 'label'=>'', 'class' => "no_print", 'type'=>'text'],
                ['label'=>'Páginas', 'type'=>'separator', 'class' => "no_print", 'tag'=>'h4', 'no_count' => true],
                ['key'=>'pages', 'label'=>'', 'class' => "no_print", 'type'=>'text'],
                ['label'=>'Version', 'type'=>'separator', 'class' => "no_print", 'tag'=>'h4', 'no_count' => true],
                ['key'=>'version', 'label'=>'', 'class' => "no_print", 'type'=>'text'],
                ['label'=>'Revisado por', 'type'=>'separator', 'class' => "no_print", 'tag'=>'h4', 'no_count' => true],
                ['key'=>'revised_by', 'label'=>'', 'class' => "no_print", 'type'=>'text'],
                ['label'=>'Elaborado por', 'type'=>'separator', 'class' => "no_print", 'tag'=>'h4', 'no_count' => true],
                ['key'=>'made_by', 'label'=>'', 'class' => "no_print", 'type'=>'text'],
                ['label'=>'Enlaces externos', 'type'=>'separator', 'class' => "no_print", 'tag'=>'h4', 'no_count' => true],
                'outside_resources'=>['key'=>'outside_resources', 'label'=>'', 'type' => 'multiple_urls'],
                ['label'=>'Imágenes', 'type'=>'separator', 'class' => "no_print", 'tag'=>'h4', 'no_count' => true],
                'image_resources'=>['key'=>'image_resources', 'label'=>'Imágenes', 'type' => 'multiple_images'],
                ['type'=>'extras', 'items'=> [
                    ['label' => 'Fases',
                    'type' => 'text',
                    'key' => 'phases',
                    'multiple' => true,]
                    ]
                ],
                ['key'=>'is_sealed', 'label'=>'Sellar versión', 'type'=>'checkbox', "print"=>false],
            ]
        ];
    }
}
