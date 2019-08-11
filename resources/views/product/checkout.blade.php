@extends("layouts.basic")
@section("partial_js")
	<script type="text/javascript" src="/js/globals.js"></script>
	<script type="text/javascript" src="/js/product_checkout2.js"></script>
@endsection
@section("content")
	<input type="hidden" id="csrf_token" value="{{csrf_token()}}">
	<div class="d-inline-flex w-100">
		<div class="w-75" style="margin-top: 80px; margin-left: 20px">
			@foreach($C_products as $product)
				<div class="w-100 d-inline-flex row-checkout">
					<div class="p-2">
						@if(file_exists(public_path("images")."/".$product->img))
							<img style="float: left;" src="{{'images/'.$product->img}}">
							@else
							<span style="float: left; height: 200px;" class="fas fa-tablets fa-10x"></span>
						@endif 
					</div>
					<div class="d-flex-column w-75">
						<div class="w-100">
							<div class="font-weight-bold">{{$product->name}}</div>
							<div>{{$product->description}}</div>
							<label class="font-weight-bold">Precio</label>
							<div><text>${{$product->price_mxn}}</text></div>
						</div>
						<div>
							<div class="w-100">
								<label for="qty_{{$product->id}}" style="font-weight: bold;">Cantidad (Unidades)</label>
							</div>
							<div class="d-inline-flex mt-2">
								<input min="0" product-price="{{$product->price_mxn}}" product-qty="{{$SESSION_products[$product->id]['product_info']['qty']}}" id="qty_{{$product->id}}" type="number" size="3" style="width: 25%" class="price form-control input-md" product-target="{{$product->id}}" name="product[{{$product->id}}][qty]" value="{{$SESSION_products[$product->id]['product_info']['qty']}}"/>
								
								<button type="button" class="ml-4 btn btn-danger btn-sm" onclick="remove_from_checkout(event)" product-target="{{$product->id}}">
									<i class="fa fa-trash" style="pointer-events: none;"></i>
								</button>
							</div>
						</div>
					</div>
				</div>
			@endforeach
		</div>
		<div class="w-25" style="margin-top: 80px;">
			@foreach($C_products as $product)
					<ul>
						<li>
							<div class="d-inline-flex w-100">
								<div style="width: 45%">
									<text class="font-weight-bold">{{$product->name}} </text>
								</div>
								<div style="width: 35%">
									x<text class="total_individual_quantity" product-target="{{$product->id}}">{{$SESSION_products[$product->id]['product_info']['qty']}}</text>
								</div>
								<div style="width: 20%" class="ml-auto mr-5" style="text-align: right;">
									$<text class="total_individual_price" product-target="{{$product->id}}">${{$product->price_mxn * $SESSION_products[$product->id]['product_info']['qty']}}</text>
								</div>
							</div>
						</li>
					</ul>
			@endforeach
			<hr/>
			<div class="d-inline-flex w-100">
				<div class="w-50 font-weight-bold ml-5">Total</div>
				<div class="ml-auto w-25 mr-3">
					$<text id="checkout_total"></text>
				</div>
			</div>
		</div>
	</div>
@endsection