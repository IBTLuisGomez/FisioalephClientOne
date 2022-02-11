	<div class="row">
		<div class="col-xl-4">
			<div class="row">
				<div class="col-xl-12">
					@include('valorations.laboral_physiotherapy.valoration_row_options_laboral_evaluation',			[
							'name'=>'valoration_laboral_elbow_second_line',
							'S_label'=>'Dolor en región medial del codo',
							'radio_options'=>['Sí','No'],
							'S_order'=>(++$count),
							'label_width'=>"100%",
							'default'=>($valorations)?
							$valorations->where('section','valoration_laboral_elbow'):
							[]
							])
				</div>
				<div class="col-xl-12">
					@include('valorations.laboral_physiotherapy.valoration_row_options_laboral_evaluation',			[
							'name'=>'valoration_laboral_elbow_second_line',
							'S_label'=>'Aumento del dolor a la presión',
							'radio_options'=>['Sí','No'],
							'S_order'=>(++$count),
							'label_width'=>"100%",
							'default'=>($valorations)?
							$valorations->where('section','valoration_laboral_elbow'):
							[]
							])
				</div>
				<div class="col-xl-12">
					@include('valorations.laboral_physiotherapy.valoration_row_options_laboral_evaluation',			[
							'name'=>'valoration_laboral_elbow_second_line',
							'S_label'=>'Epicondilitis Crónica',
							'radio_options'=>['Sí','No'],
							'S_order'=>(++$count),
							'label_width'=>"100%",
							'default'=>($valorations)?
							$valorations->where('section','valoration_laboral_elbow'):
							[]
							])
				</div>
			</div>
		</div>
		<div class="col-xl-4">
				<div class="col-xl-12">
					@include('valorations.laboral_physiotherapy.valoration_row_options_laboral_evaluation',			[
							'name'=>'valoration_laboral_elbow_second_line',
							'S_label'=>'Cozen',
							'radio_options'=>['Sí','No'],
							'S_order'=>(++$count),
							'label_width'=>"100%",
							'default'=>($valorations)?
							$valorations->where('section','valoration_laboral_elbow_second_line'):
							[]
							])
				</div>
				<div class="col-xl-12">
					@include('valorations.laboral_physiotherapy.valoration_row_options_laboral_evaluation',			[
							'name'=>'valoration_laboral_elbow_second_line',
							'S_label'=>'Milis',
							'radio_options'=>['Sí','No'],
							'S_order'=>(++$count),
							'label_width'=>"100%",
							'default'=>($valorations)?
							$valorations->where('section','valoration_laboral_elbow_second_line'):
							[]
							])
				</div>
				<div class="col-xl-12">
					@include('valorations.laboral_physiotherapy.valoration_row_options_laboral_evaluation',			[
							'name'=>'valoration_laboral_elbow_second_line',
							'S_label'=>'Silla',
							'radio_options'=>['Sí','No'],
							'S_order'=>(++$count),
							'label_width'=>"100%",
							'default'=>($valorations)?
							$valorations->where('section','valoration_laboral_elbow_second_line'):
							[]
							])
				</div>
		</div>
		<div class="col-xl-4">
				<div class="col-xl-12">
					@include('valorations.laboral_physiotherapy.valoration_row_options_laboral_evaluation',			[
							'name'=>'valoration_laboral_elbow_second_line',
							'S_label'=>'I/Elongación',
							'radio_options'=>['Sí','No'],
							'S_order'=>(++$count),
							'label_width'=>"100%",
							'default'=>($valorations)?
							$valorations->where('section','valoration_laboral_elbow_second_line'):
							[]
							])
				</div>
				<div class="col-xl-12">
					@include('valorations.laboral_physiotherapy.valoration_row_options_laboral_evaluation',			[
							'name'=>'valoration_laboral_elbow_second_line',
							'S_label'=>'II/Acción',
							'radio_options'=>['Sí','No'],
							'S_order'=>(++$count),
							'label_width'=>"100%",
							'default'=>($valorations)?
							$valorations->where('section','valoration_laboral_elbow_second_line'):
							[]
							])
				</div>
				<div class="col-xl-12">
					@include('valorations.laboral_physiotherapy.valoration_row_options_laboral_evaluation',			[
							'name'=>'valoration_laboral_elbow_second_line',
							'S_label'=>'III/Reposo',
							'radio_options'=>['Sí','No'],
							'S_order'=>(++$count),
							'label_width'=>"100%",
							'default'=>($valorations)?
							$valorations->where('section','valoration_laboral_elbow_second_line'):
							[]
							])
				</div>
		</div>
	</div>