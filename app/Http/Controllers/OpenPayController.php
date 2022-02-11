<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Product;
use App\Order;
use Openpay;
use App\User;
use App\DownloadLink;
use App\Mail\OrderCreated;
// use Illuminate\Support\Facades\Mail;
use Redirect,Response,DB,Config;
use Mail;
class OpenPayController extends Controller
{

    public function store(Request $request){
      //configurado para stripe
      ini_set('max_execution_time', 600);
        $checkout_final_report=[];
        if(empty($request->product_id)){
          $checkout_final_report=Product::getFinalCheckoutReport($request->products);
        }
        $reditect = $request->redirect;

        $A_request=$request->all();
        unset(
            $A_request["_token"],
            $A_request["products"],
            $A_request["redirect"],
            $A_request["product"],
            $A_request["buyer_expire_month"],
            $A_request["buyer_expire_year"],
            $A_request["buyer_security_code"],
            $A_request["deviceIdHiddenFieldName"],
            $A_request["token_id"],
            $A_request["telephone_card"]
        );

        //setear automaticamente estado y municipio ya que solo se puede este por el momento
        $A_request["state_send_address"]=14;
        $A_request["municipality_send_address"]=651;


        if(isset($A_request["appoinment_date"])){
            $A_request["appoinment_date"]=$A_request["appoinment_date"]." ".$A_request["appoinment_time"];
        }
        if($checkout_final_report){
          $A_request["json_report"] = json_encode($checkout_final_report);
        }

        //create codes for downloadeble products
        // dd($checkout_final_report);
        $A_request["delivery"]=$request->delivery?true:false;
        $A_request["store_pickup"]=$request->delivery?true:false;
        $A_request["telephone"]=$request->card_telephone?$request->card_telephone:false;
        unset($A_request["appoinment_time"]);
        unset($A_request["payment_method_id"]);
        $order=new Order($A_request);

            unset($A_request["address_visit"]); //usaremos esto para setear la dirección en caso de que este on

            if(!$request->buyer_name){
              $A_request["buyer_name"]=$request->appoinment_patient_name;
            }
            if(true){
                if($order){
                  if(!$checkout_final_report){
                    $order->buyer_name=$order->appoinment_patient_name;
                  }
                    try{
                      $order->save();
                      $user = User::find(1);
                      $amount = ($checkout_final_report?$checkout_final_report["total_price"]:Product::find($request->product_id)->price_mxn) * 100;
                      $stripeCharge = $user->charge($amount, request()->input('payment_method_id'));
                      $order->token_id=$stripeCharge->id;
                      $order->delivery=false;
                      $order->save();
                      $C_download_links = new Collection();
                      if(!empty($checkout_final_report['products'])){
                          foreach ($checkout_final_report['products'] as $key => $product) {
                              $product = Product::find($product['id']);
                              if($product->is_downloadable){
                                $download_link = new DownloadLink();
                                $download_link->code = Product::generateRandomCode();
                                $download_link->order_id = $order->id;
                                $C_download_links->push($product->download_links()->save($download_link));
                              }
                          }
                      }
                      //condicionar
                  }
                  catch (\OpenpayApiTransactionError $e) {
                    if($e->getErrorCode()==3001){
                       echo "Su tarjeta ha sido declinada";
                   }
                   return view('openpay.errors.generic')->with('error',"error en la transaccion".$e->getErrorCode().$e->getMessage());
               } catch (\OpenpayApiRequestError $e) {
                   return view('openpay.errors.generic')->with('error','ERROR on the request: ' . $e->getMessage());

               } catch (\OpenpayApiConnectionError $e) {
                   return view('openpay.errors.generic')->with('error','ERROR while connecting to the API: ' . $e->getMessage());

               } catch (\OpenpayApiAuthError $e) {
                   return view('openpay.errors.generic')->with('error','ERROR on the authentication: ' . $e->getMessage());
               } catch (\OpenpayApiError $e) {
                   return view('openpay.errors.generic')->with('error','ERROR on the API: ' . $e->getMessage());

               } catch (Exception $e) {
                   return view('openpay.errors.generic')->with('error','Error on the script: ' . $e->getMessage());
               }
             }
           }
       else{
          unset($order->appoinment_time);
          $order->buyer_name=$order->appoinment_patient_name;
          $order->save();
          return redirect(action("AppoinmentController@create_appointment_for_product",$A_request['product_id']))->with('message','Tu cita ha sido creada, muchas gracias por reservar con nosotros');
       }
       if(!empty($order->card_email)){
        Mail::to($order->card_email)->send(new OrderCreated($order));
       }
      if(!empty($reditect)){
        if($reditect == 'appoinment'){
          return redirect(action("AppoinmentController@create_appointment_for_product",$A_request['product_id']))->with('message','Tu cita ha sido creada, muchas gracias por reservar con nosotros');
        }
      }
      session()->forget("IDs_cart_products");
      return redirect()->action("OpenPayController@detalles_de_compra",["id"=>$order->id,"mail_status"=>((Mail::failures())?false:true)]);
   }
   public function detalles_de_compra($id, $mail_status){
    $order=Order::find($id);
    return view("openpay.success")->with("order",$order)->with("mail_status",$mail_status)->with("OrderMessage","¡Tu compra se realizó con éxito!");
   }
   public function send_email(Order $order){
      Mail::to(request()->all()["email"])->send(new OrderCreated($order));
      return view("openpay.success")->with("order",$order)->with("mail_status","mail-status",((Mail::failures())?false:true))->with("OrderMessage","El email se ha re-enviado!");
   }
}