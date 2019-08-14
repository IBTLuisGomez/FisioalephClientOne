@extends("layouts.basic")
@section("content")
<div class="container">
	<form action="/tienda" method="post" enctype="multipart/form-data">
		@csrf
		<label for="product_name">Nombre</label>
		<input class="form-control" id="product_name" type="text" name="name"/>
		<label for="product_description">Descripción</label>
		<textarea class="form-control" id="product_description" type="text" name="description"></textarea>
		<label for="product_price_mxn">Precio</label>
		<input type="number" class="form-control" id="product_price_mxn" name="price_mxn"></input>
		<label for="product_img">Imagen</label>
		<div class="custom-file">
		  <input type="file" class="custom-file-input" name="img" id="product_img" lang="es">
		  <label class="custom-file-label" for="product_img">Seleccionar Archivo</label>
		</div>
		<input type="submit" class="btn btn-primary" value="Crear"/>
	</form>
</div>
@endsection