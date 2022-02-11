@extends('layouts.basic')
@section('content')
{{Form::model($model,['route'=>['historia.store',$patient_id]])}}
@if($model)
{{ method_field('PATCH') }}
@endif
@push('css')
@if(!empty($stop_extend))
<script type="text/javascript">
	window.onload= hideStuff;
	function hideStuff(){
		$('body > :not(form)').hide();
		$('body > div').css('cssText', 'display:none !important;');
	}
</script>
@endif
<style type="text/css">
	.ui-autocomplete {
	            max-height: 200px;
	            overflow-y: auto;
	            /* prevent horizontal scrollbar create_valoration_muscular*/
	            overflow-x: hidden;
	            /* add padding to account for vertical scrollbar */
	            padding-right: 20px;
	        } 
	input[type=radio] {
	    border: 0px !important;
	    width: 20px !important;
	    height: 20px !important;
	}
</style>
@endpush
@push('javascript')
<script type="text/javascript">
	$(function(){
		$(".autocompletable_cie10").on('input',function(event){
			$(this).autocomplete({
				source: function( request, response ) {
			        $.ajax({
			          url: "/ajax_get_cie10/"+$(event.target).val(),
			          method:'get',
			          success: function( data ) {
			           		response(data);
			          	}
			        });
			      },
				minLength: 0,
				delay: 0,
				max:10,
                scroll:true,
				select:function(event, item){
			    }
			}).focus(function () {
			    $(this).autocomplete("search");
			});
		});
		
	});
</script>
@endpush
<div class="container note_container">
	<div class="row">
		<div class="col-xl-12">
			@if (session('modifiedSuccess'))
			    <div class="alert alert-success">
			        {{ session('modifiedSuccess') }}
			    </div>
			@endif
		</div>
	</div>
	@include('reports.row_print_report')
	<div class=row>
		<div class="col-xl-12">
			<h2><strong>VALORACIÓN MUSCULAR</strong></h2>
		</div>
	</div>
	{{Form::hidden('patient_id',$patient_id)}}
	@include('valorations.muscular_valoration_sections.section_valoration_muscular_valoration_hip')
	@include('valorations.muscular_valoration_sections.section_valoration_muscular_valoration_knee')
	@include('valorations.muscular_valoration_sections.section_valoration_muscular_valoration_ankle')
	@include('valorations.muscular_valoration_sections.section_valoration_muscular_valoration_foot')
	@include('valorations.muscular_valoration_sections.section_valoration_muscular_valoration_scapula')
	@include('valorations.muscular_valoration_sections.section_valoration_muscular_valoration_shoulder')
	@include('valorations.section_valoration_muscular_valoration_elbow')
	@include('valorations.section_valoration_muscular_valoration_forearm')
	@include('valorations.section_valoration_muscular_valoration_wrist')
	@include('valorations.section_valoration_muscular_valoration_fingers')
	@include('valorations.section_valoration_muscular_valoration_trunk')
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