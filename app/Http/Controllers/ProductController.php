<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $pagination_elements=4;
    public function index()
    {        
        return view("product/index")->with("C_products",DB::table('products')->paginate($this->pagination_elements))->with('SESSION_products', session()->get("IDs_cart_products"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("product/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$A_product=$request->all();
    	unset($A_product["_token"]);
    	$Img_product_image=$A_product["img"];
    	$S_image_name=time().uniqid(rand()).".".$Img_product_image->getClientOriginalExtension();
    	$A_product["img"]=$S_image_name;
    	$res=$Img_product_image->move(public_path("images"),$S_image_name);
    	$O_product=new Product($A_product);
    	$O_product->save();
        return redirect(action("ProductController@index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        dd("holasdgsg");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function checkout(){
        $products_id=session()->get("IDs_cart_products");
        $products=Product::getProductByIds($products_id);
        return view("product/checkout")->with("C_products",$products)->
            with('SESSION_products', session()->get("IDs_cart_products"));
    }

    public function AJAX_manageCart(Request $request){
        $session=session();
        if(!$session->has("products")){
            $session->put("products",[]);
        }
        $key="IDs_cart_products.".$request->product_info['id'];
        if($request->cart_method=="put"){
            $key.=".product_info";
        }
        $session->{$request->cart_method}($key,$request->product_info);
        if($request->cart_method == "none"){
            return json_encode([
                "code"=>"200",
                "IDs_cart_products"=>$session->get("IDs_cart_products"),
                "text"=>"(".sizeof($session->get("IDs_cart_products")).")",
            ]);
        }
        if(($session->has($key) && $request->cart_method == "put")
            || (!$session->has($key) && $request->cart_method == "forget")){
            return json_encode([
                "code"=>"200",
                "IDs_cart_products"=>$session->get("IDs_cart_products"),
                "text"=>($request->cart_method=="put")?"Producto agregado con éxito a tu carrito de compras":"Producto eliminado con éxito del carrito de compras",
            ]);
        }
        return json_encode([
                "code"=>"400",
                "IDs_cart_products"=>$session->get("IDs_cart_products"),
                "text"=>"Error indefinido",
            ]);
    }
}
