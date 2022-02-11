<div class="row">
	<div class="col-xl-12">
		<h4><strong>Cuestionario Nórdico de síntomas músculo-tendinosos</strong></h4>
	</div>
</div>
<div class="row">
	@php
		$count=0;
		$valorations=!empty($valorations)?$valorations:false;
		$body_parts=[
			'Cuello'=>['type'=>'radio','Sí','No'],
			'Hombro'=>['type'=>'checkbox','Izq','Der','Ambos','No'],
			'Dorsal o Lumbar'=>['type'=>'radio','Sí','No'],
			'Codo o Antebrazo'=>['type'=>'checkbox','Izq','Der','Ambos','No'],
			'Muñeca o manos'=>['type'=>'checkbox','Izq','Der','Ambos','No'],
		];
		$body_parts_1_to_5=[
			'Cuello'=>['type'=>'radio','1','2','3','4','5'],
			'Hombro'=>['type'=>'radio','1','2','3','4','5'],
			'Espalda (dorsal)'=>['type'=>'radio','1','2','3','4','5'],
			'Espalda (lumbar)'=>['type'=>'radio','1','2','3','4','5'],
			'Brazo'=>['type'=>'radio','1','2','3','4','5'],
			'Codo'=>['type'=>'radio','1','2','3','4','5'],
			'Antebrazo'=>['type'=>'radio','1','2','3','4','5'],
			'Muñeca o manos'=>['type'=>'radio','1','2','3','4','5'],
			'Pierna'=>['type'=>'radio','1','2','3','4','5'],
			'Rodilla'=>['type'=>'radio','1','2','3','4','5'],
			'Pantorrilla'=>['type'=>'radio','1','2','3','4','5'],
			'Pie'=>['type'=>'radio','1','2','3','4','5'],
		];
		$body_parts_yes_or_no=[
			'Cuello'=>['type'=>'radio','Sí','No'],
			'Hombro'=>['type'=>'radio','Sí','No'],
			'Dorsal o Lumbar'=>['type'=>'radio','Sí','No'],
			'Codo o Antebrazo'=>['type'=>'radio','Sí','No'],
			'Muñeca o manos'=>['type'=>'radio','Sí','No'],
		];
		$body_parts_for_12_months=[
			'Cuello'=>['type'=>'radio','1 a 7 días','8 a 30 días','>30 días no seguidos','Siempre'],
			'Hombro'=>['type'=>'radio','1 a 7 días','8 a 30 días','>30 días no seguidos','Siempre'],
			'Dorsal o Lumbar'=>['type'=>'radio','1 a 7 días','8 a 30 días','>30 días no seguidos','Siempre'],
			'Codo o Antebrazo'=>['type'=>'radio','1 a 7 días','8 a 30 días','>30 días no seguidos','Siempre'],
			'Muñeca o manos'=>['type'=>'radio','1 a 7 días','8 a 30 días','>30 días no seguidos','Siempre'],
		];
		$body_parts_pain_episode_duration=[
			'Cuello'=>['type'=>'radio','<1hr','1-24hrs','1-7 días','1-4 semanas','>1 mes'],
			'Hombro'=>['type'=>'radio','<1hr','1-24hrs','1-7 días','1-4 semanas','>1 mes'],
			'Dorsal o Lumbar'=>['type'=>'radio','<1hr','1-24hrs','1-7 días','1-4 semanas','>1 mes'],
			'Codo o Antebrazo'=>['type'=>'radio','<1hr','1-24hrs','1-7 días','1-4 semanas','>1 mes'],
			'Muñeca o manos'=>['type'=>'radio','<1hr','1-24hrs','1-7 días','1-4 semanas','>1 mes'],
		];
		$body_parts_incapacitation_from_work_duration=[
			'Cuello'=>['type'=>'radio','Nunca','1-7 días','1 a 4 semanas','>1 mes'],
			'Hombro'=>['type'=>'radio','Nunca','1-7 días','1 a 4 semanas','>1 mes'],
			'Dorsal o Lumbar'=>['type'=>'radio','Nunca','1-7 días','1 a 4 semanas','>1 mes'],
			'Codo o Antebrazo'=>['type'=>'radio','Nunca','1-7 días','1 a 4 semanas','>1 mes'],
			'Muñeca o manos'=>['type'=>'radio','Nunca','1-7 días','1 a 4 semanas','>1 mes'],
		];
	@endphp
	<div class="col-xl-12">
		1.-Has tenido molestias en:
	</div>
	@foreach($body_parts as $body_part=>$options)
		<div class="col-xl-4">
				@include('clinical_histories.valoration_row_options_nordic',[
				'name'=>'valoration_tendons_and_muscle_nordic_'.strtolower($body_part),
				'S_label'=>$body_part,
				'radio_options'=>$options,
				'S_order'=>(++$count),
				'checkbox'=>$options['type']=='checkbox'?true:null,
				'default'=>($valorations)?
				$valorations->where('section','valoration_tendons_and_muscle_nordic_'.strtolower($body_part)):
				[]
				])
		</div>
	@endforeach
	<div class="col-xl-12">
		Sí a contestado que no a todas estas preguntas, por favor termine la encuesta. <br/>
	</div>

	<div class="col-xl-12">
		2.- Desde hace cuanto tienes molestias en:
	</div>
	@foreach($body_parts as $body_part=>$options)
		<div class="col-xl-4">
			@include('valorations.muscular_valoration_sections.muscular_valoration_row',[
				'name'=>'valoration_tendons_and_muscle_nordic_how_long_'.$body_part,
				'S_label'=>$body_part,
				'label_show'=>true,
				'textarea_rows'=>1,
				'S_order'=>(++$count),'default'=>(($valorations)?$valorations:null),])
		</div>
	@endforeach
	<div class="col-xl-12">
		3.- Has necesitado cambiar de puesto de trabajo
	</div>
	@foreach($body_parts as $body_part=>$options)
		<div class="col-xl-3">
			@include('clinical_histories.valoration_row_options_nordic',[
			'name'=>'valoration_tendons_and_muscle_nordic_change_in_job_'.strtolower($body_part),
			'S_label'=>$body_part,
			'radio_options'=>['Sí','No'],
			'S_order'=>(++$count),
			'default'=>($valorations)?
			$valorations->where('section','valoration_tendons_and_muscle_nordic_change_in_job_'.strtolower($body_part)):
			[]
			])
		</div>
	@endforeach
	<div class="col-xl-12">
		4.- ¿Ha tenido molestias en los últimos 12 meses en...?
	</div>
	@foreach($body_parts as $body_part=>$options)
		<div class="col-xl-3">
			@include('clinical_histories.valoration_row_options_nordic',[
			'name'=>'valoration_tendons_and_muscle_nordic_complained_lately_about_'.strtolower($body_part),
			'S_label'=>$body_part,
			'radio_options'=>['Sí','No'],
			'S_order'=>(++$count),
			'default'=>($valorations)?
			$valorations->where('section','valoration_tendons_and_muscle_nordic_complained_lately_about_'.strtolower($body_part)):
			[]
			])
		</div>
	@endforeach
	<div class="col-xl-12">
		Sí a contestado que no a todos los apartados de la pregunta 4, por favor termine la encuesta.. <br/>
	</div>
	<div class="col-xl-12">
		5.- ¿Cuanto tiempo ha tenido molestias en los ultimos 12 meses en...?
	</div>
	@foreach($body_parts_for_12_months as $body_part=>$options)
		<div class="col-xl-6">
			@include('clinical_histories.valoration_row_options_nordic',[
			'name'=>'valoration_tendons_and_muscle_nordic_complained_last_12_months_'.strtolower($body_part),
			'S_label'=>$body_part,
			'radio_options'=>$options,
			'S_order'=>(++$count),
			'default'=>($valorations)?
			$valorations->where('section','valoration_tendons_and_muscle_nordic_complained_last_12_months_'.strtolower($body_part)):
			[]
			])
		</div>
	@endforeach
	<div class="col-xl-12">
		6.- ¿Cuanto dura cada episodio de molestia en...?
	</div>
	@foreach($body_parts_pain_episode_duration as $body_part=>$options)
		<div class="col-xl-6">
			@include('clinical_histories.valoration_row_options_nordic',[
			'name'=>'valoration_tendons_and_muscle_nordic_pain_episode_duration_'.strtolower($body_part),
			'S_label'=>$body_part,
			'radio_options'=>$options,
			'S_order'=>(++$count),
			'default'=>($valorations)?
			$valorations->where('section','valoration_tendons_and_muscle_nordic_pain_episode_duration_'.strtolower($body_part)):
			[]
			])
		</div>
	@endforeach
	<div class="col-xl-12">
		7.- ¿Cuanto tiempo estas molestias le han impedido hacer su trabajo en los últimos meses?
	</div>
	@foreach($body_parts_incapacitation_from_work_duration as $body_part=>$options)
		<div class="col-xl-6">
			@include('clinical_histories.valoration_row_options_nordic',[
			'name'=>'valoration_tendons_and_muscle_nordic_incapacitation_from_work_duration_'.strtolower($body_part),
			'S_label'=>$body_part,
			'radio_options'=>$options,
			'S_order'=>(++$count),
			'default'=>($valorations)?
			$valorations->where('section','valoration_tendons_and_muscle_nordic_incapacitation_from_work_duration_'.strtolower($body_part)):
			[]
			])
		</div>
	@endforeach
	<div class="col-xl-12">
		8.- ¿Has recibido tratamiento por estas mokestias los últimos 12 meses?
	</div>
	@foreach($body_parts_yes_or_no as $body_part=>$options)
		<div class="col-xl-6">
			@include('clinical_histories.valoration_row_options_nordic',[
			'name'=>'valoration_tendons_and_muscle_nordic_received_treatment_'.strtolower($body_part),
			'S_label'=>$body_part,
			'radio_options'=>$options,
			'S_order'=>(++$count),
			'default'=>($valorations)?
			$valorations->where('section','valoration_tendons_and_muscle_nordic_received_treatment_'.strtolower($body_part)):
			[]
			])
		</div>
	@endforeach
	<div class="col-xl-12">
		9.- ¿Ha tenido molestias en los últimos 7 días?
	</div>
	@foreach($body_parts_yes_or_no as $body_part=>$options)
		<div class="col-xl-6">
			@include('clinical_histories.valoration_row_options_nordic',[
			'name'=>'valoration_tendons_and_muscle_nordic_pain_7_days_prior_'.strtolower($body_part),
			'S_label'=>$body_part,
			'radio_options'=>$options,
			'S_order'=>(++$count),
			'default'=>($valorations)?
			$valorations->where('section','valoration_tendons_and_muscle_nordic_pain_7_days_prior_'.strtolower($body_part)):
			[]
			])
		</div>
	@endforeach
	<div class="col-xl-12">
		10.- ¿Califique las molestias del 1 al 5, siendo 1 una molestia mínima y 5 molestias muy fuertes?
	</div>
	@foreach($body_parts_1_to_5 as $body_part=>$options)
		<div class="col-xl-6">
			@include('clinical_histories.valoration_row_options_nordic',[
			'name'=>'valoration_tendons_and_muscle_nordic_pain_evaluation_1_to_5_'.strtolower($body_part),
			'S_label'=>$body_part,
			'radio_options'=>$options,
			'S_order'=>(++$count),
			'default'=>($valorations)?
			$valorations->where('section','valoration_tendons_and_muscle_nordic_pain_evaluation_1_to_5_'.strtolower($body_part)):
			[]
			])
		</div>
	@endforeach


	<div class="col-xl-12">
		11.- ¿A qué factores atribuye sus molestias?
	</div>
	@foreach($body_parts_1_to_5 as $body_part=>$options)
		<div class="col-xl-4">
			@include('valorations.muscular_valoration_sections.muscular_valoration_row',['name'=>'valoration_tendons_and_muscle_nordic_pain_attribution_'.$body_part,
				'S_label'=>$body_part,
				'label_show'=>true,
				'textarea_rows'=>1,
				'S_order'=>(++$count),'default'=>(($valorations)?$valorations:null),])
		</div>
	@endforeach

	<div class="col-xl-12">
		12.- Zonas de dolor y comentarios libres:
	</div>
		<div class="col-xl-6">
			@include('valorations.muscular_valoration_sections.muscular_valoration_row',['name'=>'valoration_tendons_and_muscle_last_comments_'.$body_part,
				'S_label'=>'Zonas de dolor y último comentario',
				'label_show'=>false,
				'textarea_rows'=>5,
				'S_info'=>'Se puede agregar cualquier comentario que el trabajador considere importante, en relación con sus molestias y/o las actividades que desarrolla. Es válido
elaborar diagramas para señalar las regiones que presentan molestias.',
				'S_order'=>(++$count),'default'=>(($valorations)?$valorations:null),])
		</div>
		<div class="col-xl-6">
			<img src="/images/zonas_dolorosas.png">
		</div>

</div>










