@extends('layouts.basic')
@section('content')
{{Form::model($model,['route'=>['historia.store',$patient_id],'id' =>'form_fisioterapia'])}}
@if($model)
{{ method_field('PATCH') }}
@endif
@push('css')
<style type="text/css">
	.ui-autocomplete {
        max-height: 200px;
        overflow-y: auto;
        overflow-x: hidden;
        padding-right: 20px;
    } 

</style>
@endpush
@push('javascript')
@endpush
@include('menus.sidebar_protocolos');
<div class="container note_container">
	@include('reports.row_print_report')
	<div class="row">
		<div class="col-xl-12">
			@if (session('modifiedSuccess'))
			    <div class="alert alert-success">
			        {{ session('modifiedSuccess') }}
			    </div>
			@endif
		</div>
	</div>
	<div class=row>
		<div class="col-xl-12">
			<h2><strong>HISTORIA CLÍNICA DE ACUPUNTURA</strong></h2>
		</div>
	</div>
  @php
    $count = 0;
  @endphp
	{{Form::hidden('patient_id',$patient_id)}}
	{{Form::hidden('clinicalHistoryType','physiotherapy')}}
  @include('clinical_histories.antecedents', ['name'=>'blood_preassure','S_label'=>'Presión Arterial','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])
  @include('clinical_histories.antecedents', ['name'=>'pregnancy','S_label'=>'Embarazo','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])
  @include('clinical_histories.antecedents', ['name'=>'feeding','S_label'=>'Alimentación','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])
  @include('clinical_histories.antecedents', ['name'=>'water','S_label'=>'Ingesta de agua','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])
  @include('clinical_histories.antecedents', ['name'=>'physical_actividy','S_label'=>'Actividad física','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])
  @include('clinical_histories.antecedents', ['name'=>'vision','S_label'=>'Visión','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])
  @include('clinical_histories.antecedents', ['name'=>'sexual_activity','S_label'=>'Actividad Sexual','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])
  @include('clinical_histories.antecedents', ['name'=>'audition','S_label'=>'Audición','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])
  @include('clinical_histories.antecedents', ['name'=>'skin_problems','S_label'=>'Afecciones de la piel','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])
  @include('clinical_histories.antecedents', ['name'=>'olfacy','S_label'=>'Olfato','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])
  @include('clinical_histories.antecedents', ['name'=>'medicine','S_label'=>'Medicamentos','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])
  @include('clinical_histories.antecedents', ['name'=>'sleep_quality','S_label'=>'Calidad de sueño','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])
  @include('clinical_histories.antecedents', ['name'=>'alcoholism','S_label'=>'Alcoholismo','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])
  @include('clinical_histories.antecedents', ['name'=>'tabaquism','S_label'=>'Tabaquismo','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])
  @include('clinical_histories.antecedents', ['name'=>'drugs','S_label'=>'Drogas','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])
	<h4>Salud general</h4>
  @include('clinical_histories.antecedents', ['name'=>'diabetes','S_label'=>'Diabetes','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])
  @include('clinical_histories.antecedents', ['name'=>'hipertension','S_label'=>'Hipertensión','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])
  @include('clinical_histories.antecedents', ['name'=>'hepatitis','S_label'=>'Hepatitis','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])
  @include('clinical_histories.antecedents', ['name'=>'airways','S_label'=>'Vías respiratorias','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])
  @include('clinical_histories.antecedents', ['name'=>'asthma','S_label'=>'Asma','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])
  @include('clinical_histories.antecedents', ['name'=>'urinary_tract','S_label'=>'Vías urinarias','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])
  @include('clinical_histories.antecedents', ['name'=>'constipation','S_label'=>'Estreñimiento','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])
  @include('clinical_histories.antecedents', ['name'=>'colitis','S_label'=>'Colitis','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])
  @include('clinical_histories.antecedents', ['name'=>'gastritis','S_label'=>'Gastritis','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])
  @include('clinical_histories.antecedents', ['name'=>'arthritis','S_label'=>'Artritis','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])
  @include('clinical_histories.antecedents', ['name'=>'alergies','S_label'=>'Alergias','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])
  @include('clinical_histories.antecedents', ['name'=>'ostheoporosis','S_label'=>'Osteoporosis','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])
	<h4>Antecedentes clínicos</h4>
  @include('clinical_histories.antecedents', ['name'=>'surgery','S_label'=>'Cirugías','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])
  @include('clinical_histories.antecedents', ['name'=>'protesis','S_label'=>'Prótesis','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])
  @include('clinical_histories.antecedents', ['name'=>'cancer','S_label'=>'Cáncer','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])
  @include('clinical_histories.antecedents', ['name'=>'stds','S_label'=>'ETS','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])
  @include('clinical_histories.antecedents', ['name'=>'lab_and_image','S_label'=>'Estudios de laboratorio e imagen','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])
  @include('clinical_histories.antecedents', ['name'=>'infectious_diseases','S_label'=>'Infectocontagiosas','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])
	<h4>Antecedentes clínicos</h4>
  @include('clinical_histories.antecedents', ['name'=>'cause','S_label'=>'Motivo de consulta','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])
  @include('clinical_histories.antecedents', ['name'=>'pain','S_label'=>'Dolor','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])
  @include('clinical_histories.antecedents', ['name'=>'contact','S_label'=>'Contacto','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])
  @include('clinical_histories.antecedents', ['name'=>'observations','S_label'=>'Observaciones','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])
	<h4>Tratamiento</h4>
  @include('clinical_histories.antecedents', ['name'=>'needles','S_label'=>'Agujas','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])
  @include('clinical_histories.antecedents', ['name'=>'suckers','S_label'=>'Ventosas','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])
  @include('clinical_histories.antecedents', ['name'=>'moxa','S_label'=>'Moxa','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])
  @include('clinical_histories.antecedents', ['name'=>'bleeding','S_label'=>'Sangría','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])
  @include('clinical_histories.antecedents', ['name'=>'electro_acupuncture','S_label'=>'Electro acupuntura','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])
  @include('clinical_histories.antecedents', ['name'=>'seeds','S_label'=>'Semillas','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'2'],'textType'=>'textarea'])

	<div class="row">
		<div class="col-xl-12">
			<br>
			{{Form::submit('Aceptar',['class'=>'btn btn-primary'])}}
			<a href="{{route('pacientes.index')}}" class="btn btn-light">Atras</a>
		</div>
	</div>
</div>
{{Form::close()}}
@endsection