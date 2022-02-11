@php
	$count=0;

	$segmentos = [
		'Cabeza-cuello',
		'Hombros',
		'Codos',
		'Tronco',
		'Cadera',
		'Rodillas',
		'Tobillos'
	];
	$modifiers = [
		'Derecho',
		'Izquierdo',
		'Notas'
	];
	$informaciones = [
		[
		'Vista' =>'Anterior',
		'Referencia'=> '
			Vertex. 
			Escotadura esternal. 
			Apéndice xifoides.
			Espina ilíaca anterosuperior.
			Sínfisis del pubis. 
			Punto equidistante entre ambos cóndilos mediales. 
			Puntos equidistantes de ambos maléolos.
		',
		'Evaluación' => '
			Alineación de abeza y cuello.
			Simetría de hombros. 
			Simetría de glándula mamaria. 
			Alineación de rodillas (genu valgo, genu varo).
			Coincidencia de la línea de la plomada con la articulación subastragalina.
		'
		],
		[
		'Vista' =>'Posterior',
		'Referencia'=> '
			Vertex.
			Tubérculo posterior del occipucio.
			Apófisis espinosa de C7. 
			Línea Inter glútea. 
			Punta equidistante a ambos cóndilos femorales. 
			Línea esquidistante a ambos maléolos. 
		',
		'Evaluación' => '
			Alineación de cabeza y cuello. 
			Simetría de hombros. 
			Simetría de escapulas.
			Alineación de columna (procesos espinosos). 
			Simetría de pliegues abdominales. 
			Simetría de crestas iliacas. 
			Simetría de pliegues glúteos. 
			Alineación de rodillas (simetría de huecos poplíteos).
			Alineación de tobillos.
			Alineación de calcáneo respecto al tendón de Aquiles. 
		'
		],
		[
		'Vista' =>'Lateral',
		'Referencia'=> '
			Apófisis mastoides. 
			Articulación acromio clavicular. 
			Interlinea articular de codo.
			Línea medio axilar. 
			Delante de trocante mayor. 
			Detrás de cóndilos femorales. 
			Maléolo externo. 
		',
		'Evaluación' => '
			Curvatura normal
			Hiperlordosis cervical.
			Rectificación cervical.
			Proyección de cabeza y cuello.
			Curvatura dorsal normal. 
			Hipercifosis dorsal.
			Dorso plano.
			Curvatura lumbar normal.
			Hiperlordosis lumbar.
			Rectificación lumbar.
			Abdomen.
			Anteversión pélvica.
			Retroversión pélvica.
			Alineación de las rodillas (genu recurvatum).
		'
		]
	];
@endphp
@extends("layouts.basic")
@section("content")
@push('javascript')
@endpush
    <div class="container note_container">
    	@include('reports.row_print_report')
    	<div class="row">
    		<div class="col-xl-12">
    			<h4><strong>VALORACIÓN POSTURAL</strong></h4>
    		</div>
    		<div class="row">		
	    		@include('clinical_histories.valoration_row_multiple_with_segments',[
	    		            'segmentos' => $segmentos,
	    		            'modifiers' => $modifiers,
	    		            'informaciones' => $informaciones,
	    		            'name'=>'valoration_labolar_physiotherapy_vertical_region',
	    		            'S_order'=>$count++,
	    		            'S_label'=>'Región de levantamiento vertical',
	    		            'img'=>'/images/valoraciones/fisioterapia_laboral_cargas/fl_cargas_img1.png'
	    		        ]
	    		)
    		</div>
    	</div>
    </div>    
@endsection
