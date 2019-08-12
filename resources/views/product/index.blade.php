@extends("layouts.basic")
@section("partial_css")

@endsection
@section("partial_js")
	<script type="text/javascript" src="/js/globals2.js"></script>
@endsection
@section("content")
	<input type="hidden" id="csrf_token" value="{{csrf_token()}}">
	<div class="container" style="margin-top:56px">
		<div class="row">
			<a href="/tienda/create"><button class="btn btn-light">Añadir</button></a>	
		</div>
		<div class="row">
			<h5>Producto</h5>
		</div>
		<div class="row">
			@foreach($C_products as $product)
				@include("store.product_individual.product_individual",compact($product,$SESSION_products))
			@endforeach		
		</div>
	</div>
	<div class="d-flex" style="margin-top: 50px">
	    <div class="mx-auto">
			{{ $C_products->links() }}
		</div>
	</div>
@endsection