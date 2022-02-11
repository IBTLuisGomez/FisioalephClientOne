@extends('layouts.basic')
@section('content')
{{Form::model($model,['route'=>['historia.store',$patient_id]])}}
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
	input[type=radio], input[type=checkbox] {
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
			<h2><strong>HISTORIA CLÍNICA DE REFLEXOLOGÍA</strong></h2>
		</div>
	</div>
	@php
		$count=0;
	@endphp
	{{Form::hidden('patient_id',$patient_id)}}
	<div class="row">
		<div class="col-xl-12">
			@include('valorations.laboral_physiotherapy.valoration_row_options_laboral_evaluation',			[
						'name'=>'history_reflexology',
						'S_label'=>'SI TIENE O PADECE PERIÓDICAMENTE ALGUNO DE ESTOS PROBLEMAS MARQUE LA CASILLA CORRESPONDIENTE',
						'radio_options'=>[
              'Acidez','Circulación','Gripe', 'Prostático',
              'Acné','Colesterol','Hemorroides', 'Renales',
              'Alergias de la piel','Contracturas','Hígado', 'Stress',
              'Alergias respiratorias','Depresión','Hipertensión', 'Úlceras',
              'Anemia','Diabetes','Insomnio', 'Vesíula',
              'Artrosis','Diarrea','Insuficiencia Sexual', 'Zumbidos',
              'Asma','Digestión lenta','Menopausia',
              'Caída de cabello', 'Divertículos', 'Nerviosismo',
              'Calambres', 'Dolor Menstrual', 'Obesidad',
              'Cáncer', 'Edemas', 'Oculares',
              'Cardiopatías', 'Encías', 'Osteoporosis',
              'Cefalea', 'Envejecimiento', 'Pédida de memoria',
              'Celulitis', 'Estreñimiento', 'Psoriasis',
            ],
            'label_width' => '100%',
            'divClass' => ' ',
            'checkboxesFlexClass' => ' ',
						'S_order'=>(++$count),
						'checkbox'=>true,
						'default'=>($valorations)?
						$valorations->where('section','history_reflexology'):
						[]
						])
		</div>
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