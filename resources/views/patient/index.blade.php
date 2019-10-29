@extends("layouts.basic")
@section("content")
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<table>
					<tr>
						<th>Nombre</th>
					</tr>
					@foreach($collection as $model)
						<tr>
							<td>
								<strong>{{$model->name}}</strong>
								<br/>
								Edad: 
								<br/>
								Fecha de nacimiento: {{$model->name}}
								<br/>
								Ocupación:{{$model->job}}
							</td>
						</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
@endsection