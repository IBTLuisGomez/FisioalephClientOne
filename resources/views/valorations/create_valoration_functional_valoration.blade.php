@php
$count=0;
$parameters = [
	'Bañarse'=>[
		'No requiere ayuda',
		'Requiere ayuda para lavarse alguna parte del cuerpo',
		'Requiere ayuda para lavarse más de una parte del cuerpo',
		'No se baña',
	],
	'Vestirse'=>[
		'Se viste solo, toma la ropa solo',
		'Requiere ayuda solo para abrocharse los zapatos',
		'Requiere ayuda para el vestido',
		'No se viste solo',
	],
	'Uso del baño (sanitario)'=>[
		'Va solo, se arergla solo, usa urinal o el cómodo solo',
		'Requiere ayuda para ir al baño y para asearse o vestirse después',
		'No va al retrete',
	],
	'Levantarse'=>[
		'Se levanta y acuesta solo, puede usar bastón',
		'Se levanta y acuesta con ayuda',
		'Es incapaz de levantase solo',
	],
	'Comida'=>[
		'Come solo, sin ayuda, usa los cubiertos correctamente',
		'Requiere ayuda para cortar la carne o los alimentos',
		'Requiere ayuda total para comer',
		'Se alimenta por medio de una sonda',
	],
	'Continencias'=>[
		'Continencia día y noche',
		'Incontinencia ocasional nocturna',
		'Incontinencia total',
	],
];
@endphp
@extends("layouts.basic")
@section("content")
@push('javascript')
@endpush
<script type="text/javascript">

</script>
<div class="container note_container">
	@include('reports.row_print_report')
 <div class="row">
    <div class="col-lg-12">
        <strong>Valoración funcional: ÍNDICE DE KATZ</strong>
    </div>
</div>
 <div class="row">
    <div class="col-lg-12">
        <strong>Objetivo: </strong>
        <p>Evaluar el nivel de autonomía o dependencia funcional de una persona
mayor para la realización de actividades de la vida diaria básicas: baño, vestido,
uso de retrete, movilización, incontinencia y alimentación.</p>
    </div>
</div>
 <div class="row">
    <div class="col-lg-12">
        <strong>Estructura: </strong>
        <p>Consta de seis preguntas en los que se evalúan las actividades de la
vida diaria proporcionando un índice de autonomía-dependencia.</p>
    </div>
</div>
 <div class="row">
    <div class="col-lg-12">
        <strong>Puntuación: </strong>
        <ul>
        	<li>0 puntos = normal</li>
        	<li>1 punto = muy levemente incapacitado</li>
        	<li>2 puntos = levemente incapacitado</li>
        	<li>3 puntos =moderadamente incapacitado</li>
        	<li>4 puntos = incapacitado</li>
        	<li>5 puntos = severamente incapacitado</li>
        	<li>6 puntos = inválido</li>
        </ul>
    </div>
</div>
 <div class="row">
    <div class="col-lg-12">
    <p>
    	Se considera que un paciente que se niega a realizar una función no hace esa
    	función, aunque se le considere capaz.
    </p>
    	<strong>Total:</strong> el resultado se informa utilizando la letra adecuada en cada caso, por
    	ejemplo: Índice de Katz: C.
    </div>
</div>
<div class="row">
	<div class="col-lg-12">
		<table class="table">
			<tr>
				<td><strong>Parámetro</strong></td>
				<td><strong>Valor</strong></td>
			</tr>
			@foreach($parameters as $key => $paramenter)
				<tr>
					<td><strong>{{$key}}</strong></td>
					<td><strong>Valor</strong></td>
				</tr>
				@foreach($paramenter as $value)
					<tr>
						<td>{{$value}}</td>
						<td> @include('clinical_histories.valoration_row',[
			            'name'=>'home_physiotherapy_program_exercises',
			            'S_label'=>strtolower(str_replace(' ', '_', $value)),
			            'label_show' => false,
			            'S_order'=>(++$count),
			            'default'=>(($valorations)?$valorations:null),])
        			</td>
					</tr>
				@endforeach
			@endforeach

		</table>
	</div>
	<div class="col-lg-12">
		<div class="row">
			<div class="col-lg-8">
				<strong>PUNTAJE TOTAL</strong>
			</div>
			<div class="col-lg-4">
				@include('clinical_histories.valoration_row',[
		            'name'=>'functional_total',
		            'S_label'=>strtolower(str_replace(' ', '_', $value)),
		            'label_show' => false,
		            'S_order'=>(++$count),
		            'default'=>(($valorations)?$valorations:null),])
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<strong>Observaciones</strong>
			</div>
			<div class="col-lg-12">
				@include('clinical_histories.valoration_row',[
		            'name'=>'functional_total',
		            'textarea'=>true,
		            'rows'=>'3',
		            'S_label'=>strtolower(str_replace(' ', '_', $value)),
		            'label_show' => false,
		            'S_order'=>(++$count),
		            'default'=>(($valorations)?$valorations:null),])
			</div>
		</div>
	</div>
</div>


</div>    
@endsection
