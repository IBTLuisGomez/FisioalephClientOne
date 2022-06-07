<div class="row">
			<div class="col-xl-12">
				<h4><strong>Diagnóstico</strong></h4>
			</div>
		</div>
		<div class="row">
				@php
					$count=0;
				@endphp
					<div class="col-xl-12">
						
					@include('clinical_histories.antecedents',['name'=>'valoration_diagnosis','S_label'=>'Diagnóstico','show_label'=>false,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'3'],'textType'=>'textarea'])
					</div>
					{{-- @dd($clinicalHistory); --}}
						@include('inputs/ajax_autocompletable_multiple',[
							'value'=>[
								'key'=>'diagnosis',
								'label'=>'CIE10',
								'class'=>'autocompletable_cie10',
								'name'=>'diagnosis',
								'url'=>'ajax_get_cie10',
							],
							'defult_values'=>($clinicalHistory)?$clinicalHistory->cie10Diagnosis():null,
							
						])
					<div class="col-xl-3">
					</div>
					<div class="col-xl-12">
						<h4><strong>Tratamiento</strong></h4>
					</div>
					<div class="col-xl-12">
					@include('clinical_histories.antecedents',['name'=>'valoration_diagnosis','S_label'=>'Objetivos del tratamiento','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'3'],'textType'=>'textarea'])
					</div>
					<div class="col-xl-12">
					@include('clinical_histories.antecedents',['name'=>'valoration_diagnosis','S_label'=>'Número de sesiones recomendadas','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'3'],'textType'=>'textarea'])
					</div>
					<div class="col-xl-12">
					@include('clinical_histories.antecedents',['name'=>'valoration_diagnosis','S_label'=>'Indicaciones','show_label'=>true,'S_order'=>(++$count), 'antecedent_type_id'=>2,'default'=>(($valorations)?$valorations:null),'textClass'=>['class'=>'form-control','rows'=>'3'],'textType'=>'textarea'])
					</div>
					@include('inputs/ajax_autocompletable_multiple',[
						'value'=>[
							'key'=>'treatment',
							'label'=>'CIE9-MC',
							'class'=>'autocompletable_cie9_mc',
							'name'=>'treatments',
							'url'=>'ajax_get_cie9_mc',
						],
						'defult_values'=>($clinicalHistory)?$clinicalHistory->cie9Treatments():null,
					])
		</div>