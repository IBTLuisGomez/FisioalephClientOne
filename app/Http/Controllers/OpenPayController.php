<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Product;
use \App\Order;
class OpenPayController extends Controller
{
    // public function revision(Request $request){
    //     return view("openpay.revision")->with(["request"=>$request->all()]);
    // }
    public function store(Request $request){
            // dd($request->all());
            // dd($request->all());
        $checkout_final_report=Product::getFinalCheckoutReport($request->products);
        $A_request=$request->all();
        unset(
            $A_request["_token"],
            $A_request["products"],
            $A_request["product"],
            $A_request["buyer_expire_month"],
            $A_request["buyer_expire_year"],
            $A_request["buyer_security_code"],
            $A_request["deviceIdHiddenFieldName"],
            $A_request["token_id"],
            $A_request["telephone_card"]
        );
        if(isset($A_request["appoinment_date"])){
            $A_request["appoinment_date"]=$A_request["appoinment_date"]." ".$A_request["appoinment_time"];
        }
        if($checkout_final_report){
          $A_request["json_report"] = json_encode($checkout_final_report);
        }
        $A_request["delivery"]=$request->delivery?true:false;
        $A_request["store_pickup"]=$request->store_pickup?true:false;
        unset($A_request["appoinment_time"]);

            unset($A_request["address_visit"]); //usaremos esto para setear la dirección en caso de que este on

            if(!$request->buyer_name){
              $A_request["buyer_name"]=$request->appoinment_patient_name;
            }
            $order=new Order($A_request);
            if(($request->delivery)||($request->products)){
                if($order){
                    try{
                      $openpay = \Openpay::getInstance('m2mgdlkwrobevetfttwx',
                        'sk_65d02a91ba934af5a1877ef2b0f5d6be');
                      $customer = array(
                       'name' => $request->buyer_name,
                         // 'last_name' =>"OOOOO",
                       'phone_number' => $request->telephone_card,
                       'email' => "luise.ruelasz@gmail.com",);

                      $chargeData = array(
                        'method' => 'card',
                        'source_id' => $request->token_id,
                        'amount' => $checkout_final_report?$checkout_final_report["total_price"]:Product::find($request->product_id)->price_mxn,
                        'description' => 'Cargo Naturissima',
                        'device_session_id' => $request->deviceIdHiddenFieldName,
                            'order_id' => 'ORDEN2-'.$order->id,//cambiar por el id de la orden
                            'customer'=>$customer
                        );
                      $charge = $openpay->charges->create($chargeData);
                      $order->token_id=$charge->id;
                      //condicionar
                  }catch (\OpenpayApiTransactionError $e) {
                    if($e->getErrorCode()==3001){
                       echo "Su tarjeta ha sido declinada";
                   }
                   else echo "error en la transaccion";

               } catch (\OpenpayApiRequestError $e) {
                   error_log('ERROR on the request: ' . $e->getMessage(), 0);

               } catch (\OpenpayApiConnectionError $e) {
                   error_log('ERROR while connecting to the API: ' . $e->getMessage(), 0);

               } catch (\OpenpayApiAuthError $e) {
                   error_log('ERROR on the authentication: ' . $e->getMessage(), 0);

               } catch (\OpenpayApiError $e) {
                   error_log('ERROR on the API: ' . $e->getMessage(), 0);

               } catch (Exception $e) {
                   error_log('Error on the script: ' . $e->getMessage(), 0);
               }
           }
       }
      $order->save();
      $session=session();
      if($session->has("IDs_cart_products")){
          $session->forget("IDs_cart_products");
          dd($session->has("IDs_cart_products"));
          $session->forget("products");
      }
      dd($order);
   }
}