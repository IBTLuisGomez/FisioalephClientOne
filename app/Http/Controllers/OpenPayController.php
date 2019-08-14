<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OpenPayController extends Controller
{
    public function process(Request $request){
    	try{
    		$openpay = \Openpay::getInstance('mdbhkyfb9gkcma14zvbh',
    		  env('OPENPAY_PRIVATE_KEY'));
    		$customer = array(
    		     'name' => "Luis Esteban",
    		     'last_name' =>"Ruelas Zaragoza",
    		     'phone_number' => "3339455534",
    		     'email' => "luise.ruelasz@gmail.com",);

    		$chargeData = array(
    		    'method' => 'card',
    		    'source_id' => $request->token_id,
    		    'amount' => (float)1000,
    		    'description' => "lechita rica",
    		    // 'use_card_points' => $_POST["use_card_points"], // Opcional, si estamos usando puntos
    		    'device_session_id' => $request->deviceIdHiddenFieldName,
    		    'customer' => $customer
    		    );
    		$charge = $openpay->charges->create($chargeData);
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
    dd($charge);
    }

}
