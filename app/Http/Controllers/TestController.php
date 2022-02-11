<?php

namespace App\Http\Controllers;

use App\Cie9Mc;
use App\Order;
use App\CatCIE10;
use App\User;
use App\UserRol;
use App\Valoration;
use App\Parametrization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ProductCategory;
use App\Product;
use App\Clinic;
use Carbon\Carbon;
use DB;
use Hash;
use Storage;

class TestController extends Controller
{
public function index($uuid = false){
    Storage::disk('google')->put('test.txt', 'Hello World');
    dd("hi");
    return;
    $user = User::find(1);
    $user->password = bcrypt('123456');
    $user->save();
    dd($user);
    exit;
    $discount = Parametrization::where("parameter","global_discount")->first();
    $discount->value = 0;
    dd($discount->save());
    exit;
    // dd(Auth::attempt(['email'=>'rehabilitador@recuperat.com', 'password'=>'123456']));
    // $passwords = [
    //     'yk3mu32kjh',
    //     'x1m6e1ej39',
    //     '80jdcw7f42',
    //     'ainubjvmev',
    //     'fil91zit2j',
    //     '7gbb4rguyf',
    //     'v3nqbxnny6',
    //     'hsxtwhwyl4',
    // ];
    // $password_list = [];
    // $users = User::all();
    // foreach ($users as $key => $user) {
    //     $user->password = bcrypt($passwords[$key]);
    //     $user->save();
    //     echo($user->email);
    //     echo('<br/>');
    //     echo($passwords[$key]);
    //     echo('<br/>');
    //     echo('<br/>');
    // }
    // return;
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "http://devfactura.in/api/v3/cfdi33/".$uuid."/pdf");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
   "Content-Type: application/json",
    "F-PLUGIN: " . '9d4095c8f7ed5785cb14c0e3b033eeb8252416ed',
    "F-Api-Key: ". 'JDJ5JDEwJEkuQVdxdk1XOWJBVDd3NVNBbXlYTHVBa0k2YmdVTVVKZUJJU3locVUwQ2JmQ2RmN0REaVhh',
    "F-Secret-Key: " . 'JDJ5JDEwJHFya0dMTFlnei5DQmkzZjhpRGg3N3VSWFhEMkNVMk1COGgxdmlWSEd4WnBtTTVkdEl4TWx5'
));

$response = curl_exec($ch);
curl_close($ch);

$filename = 'factura';

header('Content-Type: application/pdf');
header("Content-Transfer-Encoding: Binary");
header('Content-disposition: attachment; filename="' . $filename . '.pdf"');
echo $response;
        // $dra = User::where('email','like','%cinti%')->first();
        // $dra->user_rol_id = 3;
        // $dra->save();
        // dd($dra);
        // dd(Valoration::all()->last());
    	// dd(Order::where("appoinment_date",'!=',null)->get());
    	// return Parametrization::create(['parameter'=>'compra_minimo_requerido', 'value'=>150]);


    	// $target_date = Carbon::createFromDate('2020','03','04');
    	// foreach(CatCIE10::where('created_at','!=',null)->get() as $cie10){
    	// 	$cie10->user_id = 1;
    	// 	$cie10->save();
    	// }
    	// dd(CatCIE10::where('created_at','!=',null)->get() );
    }
}
