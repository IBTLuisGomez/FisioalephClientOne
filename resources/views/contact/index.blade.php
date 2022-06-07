@extends("layouts.basic")
@section("content")
<div class="container">
	<div class="row">
		<div class="col-12">
			<div style="overflow: hidden;">
			<div style="overflow: hidden;">
				<img style="float:right; margin-right: 20px; height: 20vw; width: 20vw;" class="home_image" src="images/contactanos.jpg"/>
				<h3 style="font-weight: bold">Contáctanos</h3>
				<a class="btn btn-primary btn-sm" style="text-decoration: none; color:white;" href="{{route('information.create')}}">Pide información</a>
				<h4 style="font-weight: bold">Valle Imperial</h4>
				<p>
					Blvd. Valle imperial # 260 -18, cruza con Avenida Antiguo Camino a Copalita y Calle Las Torres, planta alta, Colonia La Periquera, C.P 45134, Zapopan Jalisco.
				</p>
				<p>
					<strong>
					Teléfono local:
					</strong>
					(33) 9688-6699
					<br/>
					<strong>
						Celular (Whatsapp):
					</strong>
					(33) 2351-7843
					<br>
						<strong>Correo electrónico:</strong> recuperatf@gmail.com
				</p>
			</div>
			<div style="overflow: hidden;">
				<img style="float:left; margin-right: 20px; height: 20vw; width: 20vw;" class="home_image" src="images/contactanos_t_center.jpeg"/>
				<h4 style="font-weight: bold">T-Center</h4>
				<p>
					Juan Gil Preciado #8905, Local 4, Tesistán. CP: 45200, Plaza T-Center
				</p>
				<p>
					<strong>
						Teléfono local:
					</strong>
						(33) 3803-4475
						<br/>
					<strong>
						Celular (Whatsapp):
					</strong>
					(33) 2407-4211
					<br>
					<strong>Correo electrónico:</strong> recuperatf@gmail.com
				</p>
			</div>
			</div>
		</div>
	</div>
</div>
@endsection