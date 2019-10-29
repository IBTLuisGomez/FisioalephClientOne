@extends("layouts.basic")
@section("partial_js")
<script type="text/javascript">
	$(function(){
		$("#product_img").change(readURL);	
	});
	function unsetImg(event){
		event.preventDefault();
		target=$($(event.target).attr("target"));
		$("#img_preview").hide();
		target.val('');

	}
	function readURL() {
		input=this;
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$("#img_preview").show();
				$('#img_preview')
				.attr('src', e.target.result)
				.width(150)
				.height(200);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>
@endsection
@section("content")
<div class="container">
	@if (session('message'))
	    <div class="alert alert-success">
	        {{ session('message') }}
	    </div>
	@endif
	<form action="{{isset($product)?route('store.update',$product->id):route('store.store')}}" method="post" enctype="multipart/form-data">
		@csrf
		@if(isset($product))
		<input type="hidden" name="_method" value="PUT">
		@endif
		<label for="product_name">Nombre</label>
		<input class="form-control" id="product_name" type="text" name="name" value="{{isset($product)?$product->name:''}}"/>
		<label for="active">Activo</label>
		<input type="checkbox" name="active" {{isset($product)?(($product->active)?'checked':''):""}}>
		<br>
		<label for="product_description">Descripción</label>
		<textarea class="form-control" id="product_description" type="text" name="description">{{isset($product)?$product->description:''}}</textarea>
		<label for="product_price_mxn">Precio</label>
		<input type="number" step=".01" class="form-control" id="product_price_mxn" name="price_mxn" value="{{isset($product)?$product->price_mxn:''}}"></input>
		<label for="product_img">Imagen</label>
		<br>
			@isset($product)
				<img id="img_preview" style="{{($product->img)?'display:block':'display:none'}}" src="{{'/images/'.$product->img}}" alt="No se encontró imagen">
			@endif
				<img id="img_preview" style="display: none">
		<br>
		<div class="custom-file">
			<input type="file" class="custom-file-input" name="img" id="product_img" lang="es">
			<label class="custom-file-label" for="product_img">Seleccionar Archivo</label>
			<button class="btn btn-warning" target="#product_img" onclick="unsetImg(event)" style="margin-bottom: 20px">Quitar Imagen</button>
		</div>
		<label for="product_category_id">Seleccionar Archivo</label>
		<select id="product_category_id" autocomplete="off" name="product_category_id" class="form-control">
			<option value="">Seleccione una categoría</option>
			@foreach($categories as $category)
			<option value="{{$category->id}}" {{($category->id==(isset($product)?$product->product_category_id:0))?"selected=selected":""}}>{{$category->name}}</option>
			@endforeach
		</select>
		@if(isset($product))
		<input type="submit" class="btn btn-primary" value="Actualizar"/>
		@else
		<input type="submit" class="btn btn-primary" value="Crear"/>
		@endif
	</form>
</div>
@endsection