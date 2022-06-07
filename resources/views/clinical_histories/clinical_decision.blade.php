@extends('layouts.basic')
@push('javascript')
<style>
	.print_only {
		display: none
	}
</style>
<script type="text/javascript">
	var array_decision = [];
	var active_decision = 0;
	$(function(){
		$("#div_hfp_row").hide()
		$("#cb_hfp").prop( "checked", false );
		window.array_decision = {!!$json_decisions!!};
		let last_element = (array_decision[array_decision.length - 1]);
		window.active_decision = array_decision.length - 1;
		$("#decision_text").html(last_element.text);
		$("#responsible_text").html(last_element.user.name);
		$("#license_text").html(last_element.user.license);
		$("#responsible_text").html(last_element.user.name);
		$("#sign_text").html(`${last_element.user.name} CP: ${last_element.user.license}`);
		const aHpp = last_element.home_physiotherapy_programs;
		let domUl = mapToLi(aHpp, $("<ul></ul>"), last_element);
		if (aHpp && !aHpp.length > 0) {
			$("#hpp").hide()
			$("label[for='hpp']").hide()
			$("#hpp").addClass("no_print")
			$("label[for='hpp']").addClass("no_print")
		} else {
			$("#hpp,label[for='hpp']").removeClass('no_print')
			$("#hpp,label[for='hpp']").show()
			$("#hpp").html('');
			$("#hpp").append(domUl);
		}
	});
	function changeDecisionText(previous){
		if (active_decision == 0 && previous) return
		if (active_decision == (array_decision.length - 1) && !previous) return
		if(previous){
			window.active_decision--;
		} else {
			window.active_decision++;
		}
		var decision = window.array_decision[active_decision];

		const aHpp = decision.home_physiotherapy_programs;
		let domUl = aHpp ? mapToLi(aHpp, $("<ul></ul>"), decision) : [];
		$("#show_decision_text").html(decision.text);
		$("#responsible_text").html(decision.user.name);
		$("#sign_text").html(decision.user.name);
		if (aHpp && !aHpp.length > 0) {
			$("#hpp").hide()
			$("label[for='hpp']").hide()
			$("#hpp").addClass("no_print")
			$("label[for='hpp']").addClass("no_print")
		} else {
			$("#hpp,label[for='hpp']").removeClass('no_print')
			$("#hpp,label[for='hpp']").show()
			$("#hpp").html('');
			$("#hpp").append(domUl);
		}
	}
	function mapToLi (array, domUl, decision) {
		console.log(decision)

			array.forEach(function (element) {
				const domA = $("<a></a>", {
					html: element.name,
					target: '_blank',
					href: "/home_physiotherapy_program/" + element.id + '/edit'
				});
				const sendByWhatsapp = $('<a></a>', {
					html: '- Mandar por Whatsapp',
					href: '#',
					class: "no_print",
					password: element.pivot.password,
				}).click(function (event) {
					const a = $(event.target);
					sendHomePhysiotherapeuticProgramWhatsapp(a.attr("password"), decision);
				});
				const domLi = $("<li></li>").append(domA).append(sendByWhatsapp);
				domUl.append(domLi);
			});
			return domUl;
		}
	function sendHomePhysiotherapeuticProgramWhatsapp(password, decision) {
		const phone = prompt('Ingresa el numero de telefono a 10 dígitos');
		const text = "Consulta tu programa fisioterapéutico en www.recuperatfisioterapia.com/decision/" + password + "?decisionId=" + decision.id;
		window.open("https://web.whatsapp.com/send?phone=52" + phone + "&text=" + text);

	}
</script>
@endpush
@section('content')
<div class="container">
	@if (!empty($errors))
		@if ($errors->any())
			<div class="row">
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			</div>
		@endif
	@endif
	<div class="modal" tabindex="-1" role="dialog" id="modal_previous">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Recetas</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body note_container">
			  @include('reports.row_print_report', ['hide_header' => true])
			  <label for="responsible_text" class="d-inline"><strong>Responsable: </strong></label>
			  <p id="responsible_text" class="d-inline"></p>
				<br>
			  {{-- <label for="license_text" class="d-inline"><strong>Cédula profesional:</strong></label>
			  <p id="license_text" class="d-inline"></p>
				<br> --}}
	      <label for="decision_text"><strong>Contenido:</strong></label>
			  <p id="decision_text"></p>
	      	<label for="hpp"><strong>Programa fisioterapéutico en casa:</strong></label>
			  <div id="hpp"></div>
				<div class="w-100 text-right">
					<label for="sign_text" class="d-none"><strong>__________________________________</strong></label>
					<p id="sign_text" class="print_only"></p>
				</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" onclick="changeDecisionText(true)"><span><i class="fas fa-angle-left"></i></span></button>
	        <button type="button" class="btn btn-primary" onclick="changeDecisionText(false)"><span><i class="fas fa-angle-right"></i></span></button>
	      </div>
	    </div>
	  </div>
	</div>
	<div class="row">
		<div class="col">
			<button class="btn btn-primary" data-toggle="modal" data-target="#modal_previous">Ver Anteriores</button>
		</div>
  </div>
	{{Form::open(['route' => 'history.decision.store'])}}
	<div class="row">
		@include('patient.patient_header', ['patient' => (!empty($patient)? $patient: false)])
		{{Form::hidden('patient_id', $patient->id)}}
		<div class="col-md-12">
				<label for="decision">Contenido de la Receta</label>
				{{Form::textarea('text', '', ['class'=>'form-control'])}}
		</div>
	</div>
	<div class="row" class="no_print">
		<div class="col-lg-12">
			<select name="clinic_id" id="" class="form-control">
				@foreach($clinics as $clinic)
				<option value="{{$clinic->id}}">{{$clinic->name}}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="row no_print">
		<div class="col-lg-12">
			<label for="cb_hfp">Añadir programa terapéutico en casa</label>
		</div>
		<div class="col-lg-12">
			<input type="checkbox" class="checkbox lg" onClick="$('#div_hfp_row').toggle()" id="cb_hfp">
		</div>
	</div>
	<div class="row" id="div_hfp_row">
			@include('inputs/ajax_autocompletable_multiple',[
				'value'=>[
					'key'=>'home_physiotherapy_programs',
					'label'=>'Programa fisioterapéutico en casa',
					'class'=>'home_physiotherapy_programs',
					'name'=>'home_physiotherapy_programs',
					'url'=>'api/home_physiotherapy_program/search',
				],
				'defult_values'=>[],
			])
	</div>
	<br>
	<div class="row">
		<div class="col-md-12">
				{{Form::submit('Agregar Receta', ['class' => 'btn btn-primary'])}}
		</div>
	</div>
	{{Form::close()}}
</div>
@endsection