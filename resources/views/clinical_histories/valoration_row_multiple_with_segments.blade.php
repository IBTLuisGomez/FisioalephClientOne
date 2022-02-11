@foreach($informaciones as $vista)

<div class="modal" tabindex="-1" role="dialog" id="{{'modal_'.'_'.$vista['Vista']}}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{$vista['Vista']}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<h3>Referencia</h3>
        <p>{{$vista['Referencia']}}</p>
    	<h3>Evaluación</h3>
	    <p>{{$vista['Evaluación']}}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="col-lg-12">
	<h4 style="display: inline"><strong>{{$vista['Vista']}}</strong></h4> <i class="fa fa-sm fa-question" data-toggle="modal" data-target="#{{'modal_'.'_'.$vista['Vista']}}"></i>
</div>
	@foreach($segmentos as $segmento)
	<div class="col-lg-12">
		<strong>{{$segmento}}</strong>
	</div>
		@foreach($modifiers as $modifier)
		<div class="col-lg-4">
			{{Form::label(str_replace(' ','_',$segmento).str_replace(' ','_',$modifier)."[$S_order][json_values]", $modifier)}}
			@if(isset($default))
				@if($default==null || !$default->count())
					{{Form::text(str_replace(' ','_',$segmento).str_replace(' ','_',$modifier)."[$S_order][json_values]",null,['class'=>'form-control'])}}
				@else
						@php
							$already_created=false;
						@endphp
					@foreach($default as $key=>$value)
						@if($value->name==$S_label && $value->section==str_replace(' ','_',$segmento).str_replace(' ','_',$modifier))
							@php
								$already_created=true;
							@endphp
							{{Form::text(str_replace(' ','_',$segmento).str_replace(' ','_',$modifier)."[$S_order][json_values]",$value->json_values,['class'=>'form-control'])}}
						@endif
					@endforeach
					@if(!$already_created)
						{{Form::text(str_replace(' ','_',$segmento).str_replace(' ','_',$modifier)."[$S_order][json_values]",null,['class'=>'form-control'])}}
					@endif
				@endif
			@else
				{{Form::text(str_replace(' ','_',$segmento).str_replace(' ','_',$modifier)."[$S_order][json_values]",null,['class'=>'form-control'])}}
			@endif
		</div>
		@endforeach
	@endforeach
@endforeach

