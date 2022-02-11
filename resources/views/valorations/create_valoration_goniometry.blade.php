@php
	$count=0;
    $evaluaciones = [
        ['type'=>'s','titulo'=>'Columna Cervical', 'name'=>'columna_cervical', 'valoraciones'=>[
                    'Flexión 0° a 45°',
                    'Extensión 0° a 45°',
                    'Rotación Izquierda 0° a 45°',
                    'Rotación Derecha 0° a 45°',
                    'Inclinación Izquierda 0° a 45°',
                    'Inclinación Derecha 0° a 45°',
                ],
            'explanation' => 'valoraciones/goniometria/columna_cervical.png'
        ],
        ['type'=>'s', 'titulo'=>'Columna Lumbar', 'name'=>'columna_lumbar','valoraciones'=>[
                    'Flexión 0° a 45°',
                    'Extensión 0° a 45°',
                    'Rotación Izquierda 0° a 45°',
                    'Rotación Derecha 0° a 45°',
                    'Inclinación Izquierda 0° a 45°',
                    'Inclinación Derecha 0° a 45°',
                    'explanation' => 'valoraciones/goniometria/columna_lumbar.png'
                ],
            'explanation' => 'valoraciones/goniometria/columna_lumbar.png'
        ],
        ['type'=>'lr', 'titulo'=>'Hombro', 'name'=>'hombro', 'valoraciones'=>[
                    'Flexión 180°',
                    'Extensión 60°',
                    'Abducción 180°',
                    'Aducción 30°',
                    'Rotación Externa 90°',
                    'Rotación Interna 70°',
                ],
            'explanation' => 'valoraciones/goniometria/hombro.png'
            ],

        ['type'=>'lr', 'titulo'=>'Codo', 'name'=>'codo', 'valoraciones'=>[
                    'Flexión 150°',
                    'Extensión 150° a 0/-10°',
                    'Pronación 90°',
                    'Supinación 80°',
                ],
            'explanation' => 'valoraciones/goniometria/codo.png'
            ],
        ['type'=>'lr', 'titulo'=>'Muñeca', 'name'=>'muneca', 'valoraciones'=>[
                    'Flexión 80',
                    'Extensión 70°',
                    'Desviación cubital 40°',
                    'Desviación Radial 30°',
                ],
            'explanation' => 'valoraciones/goniometria/muneca.png'
            ],
        ['type'=>'lr', 'titulo'=>'Pulgar', 'name'=>'pulgar', 'valoraciones'=>[
                    'Abducción 70',
                    'Abducción 70° a 0°',
                    'Oposición (Pulpejo a base de 5to dedo)',
                    'Flexión MCF 50°',
                    'Extensión MCF 50° a 0°',
                    'Flexión IF 80°',
                    'Extensión IF 80° a 0/-10°',
                ],
            'explanation' => 'valoraciones/goniometria/pulgar.png'
            ],
        ['type'=>'lr', 'titulo'=>'Dedos', 'name'=>'dedos', 'valoraciones'=>[
                    'Flexión MCF 90°',
                    'Extensión MCF 0° a 45°',
                    'Flexión IFP a 100°',
                    'Extensión IFP a 100° a 0°',
                    'Flexión IFD 90°',
                    'Extensión IFD 90° a 0°',
                    'Abducción-Aducción',
                ],
            'explanation' => 'valoraciones/goniometria/mano.png'
            ],
        ['type'=>'lr', 'titulo'=>'Cadera', 'name'=>'cadera', 'valoraciones'=>[
                    'Flexión 0° a 120°',
                    'Extensión 0° a 30°',
                    'Abducción 0° a 45°',
                    'Adducción 0°a 30°',
                    'Rotación Interna 0°a 45°',
                    'Rotación Externa 0° a 45°'
                ],
            'explanation' => 'valoraciones/goniometria/cadera.png'
            ],
        ['type'=>'lr', 'titulo'=>'Rodilla', 'name'=>'rodilla', 'valoraciones'=>[
                    'Flexión 0° - 135°',
                    'Extensión 0° - 10°'
                ],
            'explanation' => 'valoraciones/goniometria/rodilla.png'
            ],
        ['type'=>'lr', 'titulo'=>'Tobillo', 'name'=>'tobillo', 'valoraciones'=>[
                    'Flex. D. 0º - 20º',
                    'Flex. P. 0º - 50º',
                    'Inv. 0º - 35º',
                    'Eve. 0º - 15º'
                ],
            'explanation' => 'valoraciones/goniometria/tobillo.png'
            ],
        ['type'=>'lr', 'titulo'=>'Hallux', 'name'=>'hallux', 'valoraciones'=>[
                    'Flex. MTF 0º - 45º',
                    'Ext. MTF 0º- 70º',
                    'Flex. A.I.F 0º-90º',
                    'Ext. A.I.F. 0º'
                ],
            'explanation' => 'valoraciones/goniometria/hallux.png'
            ],
        ['type'=>'lr', 'titulo'=>'Dedos del pie', 'name'=>'dedos_del_pie', 'valoraciones'=>[
                    'Flexión MCF 90°',
                    'Extensión MCF 0 a 45°',
                    'Flexión IFP 100°',
                    'Extensión IFP 100 a 0°',
                    'Flexión IFD 90°',
                    'Extensión IFD 90 a 0°'
                ],
            'explanation' => 'valoraciones/goniometria/pie.png'
            ],
                
    ];

@endphp
@extends("layouts.basic")
@section("content")
@push('javascript')
@endpush
<style type="text/css">
    .modal-dialog{text-align:center; display: table}
    .modal-content{display:inline-block;}
</style>
    <div class="container">
    	<div class="row">
    		<div class="col-xl-12">
    			<h4><strong>GONIOMETRÍA</strong></h4>
    		</div>
            @foreach($evaluaciones as $key=>$evaluacion)
            <div class="col-xl-12">
                <strong>{{$evaluacion['titulo']}}</strong>
            </div>
            <div class="col-xl-12">
                @if(!empty($evaluacion['explanation']))
                    <a class="btn btn-primary" data-toggle="modal" href='#{{$key}}_modal_id'>Ver explicación</a>
                    <div class="modal fade" id="{{$key}}_modal_id">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Explicación</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <img src="{{'/images/'.$evaluacion['explanation']}}">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
                @if($evaluacion['type'] == 's')
                    
                    @foreach($evaluacion['valoraciones'] as $valoracion)
            			<div class="col-xl-4">
                            @include('clinical_histories.valoration_row',[
                            'name'=>str_replace('', '', $valoracion),
                            'S_label'=>$valoracion,
                            'S_order'=>(++$count),
                            'default'=>(($valorations)?$valorations:null),])
                        </div>
                    @endforeach
                @else
            @foreach($evaluaciones as $evaluacion)
                    @foreach($evaluacion['valoraciones'] as $valoracion)
                        <div class="col-xl-5">
                            @include('clinical_histories.valoration_row',[
                            'name'=>str_replace(' ', '', $valoracion),
                            'S_label'=>$valoracion.' lado izquierdo',
                            'S_order'=>(++$count),
                            'default'=>(($valorations)?$valorations:null),])
                        </div>
                        <div class="col-xl-5">
                            @include('clinical_histories.valoration_row',[
                            'name'=>str_replace(' ', '', $valoracion),
                            'S_label'=>$valoracion.' lado derecho',
                            'S_order'=>(++$count),
                            'default'=>(($valorations)?$valorations:null),])
                        </div>
                    @endforeach
            @endforeach
                @endif
            @endforeach
            <div class="col-xl-6">
                @include('clinical_histories.valoration_row_options_nordic',[
                'name'=>'valoration_goniometry_movilización',
                'S_label'=>'Movilización',
                'radio_options'=>[
                    'type'=>'radio','activa','pasiva', 'asistida',
                ],
                'S_order'=>(++$count),
                'default'=>($valorations)?
                $valorations->where('section','valoration_goniometry_movilización'):
                []
                ])
            </div>
            <div class="col-xl-6">
                @include('clinical_histories.valoration_row_options_nordic',[
                'name'=>'valoration_goniometry_limitation',
                'S_label'=>'Evidencia de factores que limitan el movimiento',
                'radio_options'=>[
                    'type'=>'radio','si','no',
                ],
                'S_order'=>(++$count),
                'default'=>($valorations)?
                $valorations->where('section','valoration_goniometry_movilización'):
                []
                ])
            </div>
            <div class="col-xl-6">
                @include('clinical_histories.valoration_row_options_nordic',[
                'name'=>'valoration_goniometry_hiperflexibiily',
                'S_label'=>'Hiper flexibiilidad',
                'radio_options'=>[
                    'type'=>'radio','si','no',
                ],
                'S_order'=>(++$count),
                'default'=>($valorations)?
                $valorations->where('section','valoration_goniometry_movilización'):
                []
                ])
            </div>
           
            <div class="col-lg-12">
                    @include('clinical_histories.valoration_row',[
                    'name'=>'goniometry_conclusiones',
                    'S_label'=>'Conclusiones',
                    'S_order'=>(++$count),
                    'default'=>(($valorations)?$valorations:null),])
            </div>           
    	</div>
    </div>    
@endsection
