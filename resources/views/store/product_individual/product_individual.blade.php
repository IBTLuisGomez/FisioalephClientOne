<div class="col-xs-12 col-md-4 col-lg-3">
	<div style="text-align: center; font-weight: bold;"><a href="{{action('ProductController@show',$product->id)}}" class="text-dark btn" style="font-weight: bold;">{{$product->name}}</a></div>
	<div style="text-align: center">
		@if(file_exists(public_path("images")."/".$product->img))
			<img src="{{'images/'.$product->img}}" onclick="window.open({{'\''.action('ProductController@show',$product->id).'\''}})">
			@else
			<span style="height: 200px" onclick="window.open({{'\''.action('ProductController@show',$product->id).'\''}})" class="fas fa-tablets fa-10x"></span>
		@endif 
	</div>
	<div style="text-align: center">
			<button class="btn btn-warning" product-target="{{$product->id}}" style="display:
			@if($SESSION_products)
				{{array_key_exists($product->id,$SESSION_products)?"inline":"none"}}
			@else
				none
			@endif
			" onclick="manageCart(event,false)">Quitar del Carrito</button>
			<button class="btn btn-primary" product-target="{{$product->id}}" onclick="manageCart(event,true)">Comprar</button>
	</div>
</div>