function manageCart(e, add){
	J_e_target=$(e.target);
	ID_product=J_e_target.attr("product-target");
	if(add){
		B_answer=window.confirm("¿Deseas agregar este producto al carrito?");
	}else{
		B_answer=window.confirm("¿Deseas quitar este producto del carrito?");
	}
	if(B_answer){
		$.ajax({
			method:"post",
			url:"/tienda/manage_cart",
			data:{
				product_info:{
					id:ID_product,
					qty:1
				},
				cart_method:add?"put":"forget",
				_token: $("#csrf_token").val(),
			},
			success:function(data){
				data=JSON.parse(data);
				console.log("data");
				console.log(data);
				modifyCartSize(Object.size(data.IDs_cart_products));
				renderRemoveFromCartButtons(data.IDs_cart_products);
				alert(data.text);
			},
			failure:function(){
				alert("error de conexión");		
			}
		});
	}
}
//will render the buttons it they are in the cart, according to the json encode returned by the function in the controller
function renderRemoveFromCartButtons(IDs_cart){
	$("button.btn-warning").css("display","none");
	$.each(IDs_cart,function(key, value){
		console.log("value");
		console.log(value);
		console.log(value.product_info.id);
		$("button.btn-warning[product-target="+value.product_info.id+"]").css("display","inline");
	});
}
function modifyCartSize(size){
	$("#div_cart_size").html("("+size+")");
}
Object.size = function(obj) {
    var size = 0, key;
    for (key in obj) {
        if (obj.hasOwnProperty(key)) size++;
    }
    return size;
};