<script type="text/javascript">
	@if(!empty($default))
		var opened_valoration = 0;
		// var valorations = {!!json_encode($default->where('user_id', auth()->id())->groupBy('name')->sortBy('created_at'))!!}; //solo las notas del usuario
		var valorations = {!!json_encode($default->groupBy('name')->sortBy('created_at'))!!};
		$(()=>{
			let keys = Object.keys(this.valorations);
			this.valorations = keys.map((key, valoration_group)=>{
				return [key, this.valorations[key]];
			});
			renderPreviousEvaluation();
		});

		function changeEvaluation(next){
			let sum = true;
			if(next && this.opened_valoration != 0){
				this.opened_valoration --;
				sum = false;
			}
			else if(!next){
				this.opened_valoration ++;
			}
			let has_changed = renderPreviousEvaluation();
			if(!has_changed){
				if (sum){
					this.opened_valoration--;
				}else{
					this.opened_valoration++;
				}
			}
		}

		function renderPreviousEvaluation(){
			let changed = false;
			$(this.valorations).each((key, valoration_group)=>{
				let name = valoration_group[0];
				J_name = $("[name='"+name+"']");
				if(J_name.length > 0){
					$(valoration_group[1]).each((order, valoration)=>{
						if (J_name.attr("section") != valoration.section){
							return;
						}
						if(J_name.length > 0){
							if(order ==  window.opened_valoration){
								$("#date_previous").html('');
								$("#date_previous").append(valoration.created_at);
								let row = $("<strong>",{
									html:valoration.name + ': '
								});
								div_row = $("<div>");
								div_row.append(row);
								div_row.append(valoration.json_values);
								J_name.html('');
								J_name.append(div_row);
								changed = true;
							}
						}
					});

				}
			});
			return changed;
		}
	
	@endif
</script>
@if(!empty($default))
<a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Ver anteriores</a>
<div class="modal fade" id="modal-id">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Evaluaciones Previas</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<strong>Fecha: </strong><div style="display: inline" id="date_previous"></div>
						</div>
					</div>
					@foreach($parameters as $parameter)
						<div class="row">
							<div class="col-lg-12" name = '{{$parameter['name']}}' section = '{{$parameter['section']}}'>
							</div>
						</div>
					@endforeach
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="changeEvaluation(false)">Anterior</button>
				<button type="button" class="btn btn-primary" onclick="changeEvaluation(true)">Siguiente</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
@endif
