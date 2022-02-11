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
			<h2><strong>HISTORIA CLÍNICA DE FISIOTERAPIA</strong></h2>
		</div>
	</div>
	{{Form::hidden('patient_id',$patient_id)}}
	{{Form::hidden('clinicalHistoryType','physiotherapy')}}
	@include('clinical_histories.phisiotherapy_sections.cause_of_appoinment')
	@include('clinical_histories.phisiotherapy_sections.pain')
	@include('clinical_histories.phisiotherapy_sections.evolution')
	@include('clinical_histories.phisiotherapy_sections.vital_signs')
	@include('clinical_histories.phisiotherapy_sections.antecedents_no_patological')
	@include('clinical_histories.phisiotherapy_sections.antecedents_familial')
	@include('clinical_histories.phisiotherapy_sections.valorations_postural')
	@include('clinical_histories.phisiotherapy_sections.valorations_exploración_muscular')
	@include('clinical_histories.phisiotherapy_sections.valoration_cicatriz_quirurgica')
	@include('clinical_histories.phisiotherapy_sections.valoration_gait')
	@include('clinical_histories.phisiotherapy_sections.valorations_exploración_traslations')
	@include('clinical_histories.phisiotherapy_sections.valoration_muscular_strenght')
	@include('clinical_histories.phisiotherapy_sections.valoration_goniometry')
	@include('clinical_histories.phisiotherapy_sections.valorations_exploración_neurológica')
	@include('clinical_histories.phisiotherapy_sections.valoration_cranial_nerves')
	@include('clinical_histories.phisiotherapy_sections.neurodinamy')
	@include('clinical_histories.phisiotherapy_sections.valoration_spasticity')
	@include('clinical_histories.phisiotherapy_sections.valoration_hipotony')
	@include('clinical_histories.phisiotherapy_sections.aesthetics')
	@include('clinical_histories.phisiotherapy_sections.valoration_gineco_obstetric')
	@include('clinical_histories.phisiotherapy_sections.valoration_diagnosis')
	@include('clinical_histories.phisiotherapy_sections.specific_tests')
	<div class="row">
		<script type="text/javascript">
			$(function(){
				$("#btn_add_image_workup").click(function(){
					new_image_workup=$('#image_workup_example').clone();
					new_image_workup.removeAttr('id');
					new_image_workup.removeAttr('disabled');
					new_image_workup.removeAttr('style');
					new_image_workup.appendTo($("#div_image_workup"));
				});
			});
		</script>
		{{-- <div class='col-lg-12'>
			<h3 style="display: inline">Estudios de Imagen</h3><button  id="btn_add_image_workup" type="button" class="btn btn-primary"><i class="fas fa-plus"></i></button>
		</div>
		<div class='col-lg-12' id="div_image_workup">
			{{Form::file('image_workup[]',['id'=>'image_workup_example','placeholder'=>'Estudios de Imagen', 'disabled'=>true, 'style'=>'display:none'])}}
		</div> --}}
	</div>
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