<div class="col-xs-12 col-md-4 col-lg-3" style="{{!($product->active)?'opacity: 0.5; filter: alpha(opacity=50);':''}}">
	<div style="text-align: center; font-weight: bold;"><a href="{{action('ProductController@show',$product->id)}}" class="text-dark btn" style="font-weight: bold;">{{$product->name}}</a>
		@if(!($product->active))
			Desactivado
		@endif
		@if(Auth::user())
			@if(Auth::user()->user_rol_id==1)
				<a href="{{action('ProductController@edit',$product->id)}}" style="color: blue; text-decoration: underline;"> (Editar)</a>
			@endif
		@endif
	</div>
	<div style="text-align: center">
		@if($product->img)
			@if(file_exists(public_path("images")."/".$product->img))
				<img src="{{'images/'.$product->img}}" style="height: 25vh; width: 15vw;" onclick="window.open({{'\''.action('ProductController@show',$product->id).'\''}})">
				@else
					<span style="height: 200px" onclick="window.open({{'\''.action('ProductController@show',$product->id).'\''}})" class="fas fa-prescription-bottle fa-10x"></span>
			@endif
			@else
				<span style="height: 200px" onclick="window.open({{'\''.action('ProductController@show',$product->id).'\''}})" class="fas fa-prescription-bottle fa-10x"></span>
		@endif 
	</div>
	@if($product->active)
	<div style="text-align: center; font-weight: bold;">
		${{$product->price_mxn}}
	</div>
		<div style="text-align: center">
				@if($product->product_category)
					@if($product->product_category->id==1)
						<a style="cursor: pointer;" href="{{action('AppoinmentController@create_appointment_for_product',$product->id)}}" class="btn btn-primary">Agendar</a>
					@endif
				@endif
				<button class="btn btn-warning" product-target="{{$product->id}}" style="display:
				@if($SESSION_products)
					{{array_key_exists($product->id,$SESSION_products)?"inline":"none"}}
				@else
					none
				@endif
				" onclick="manageCart(event,false)">Quitar del Carrito</button>
				<button class="btn btn-primary" product-target="{{$product->id}}" onclick="manageCart(event,true)">Comprar</button>
		</div>
	@endif
</div>