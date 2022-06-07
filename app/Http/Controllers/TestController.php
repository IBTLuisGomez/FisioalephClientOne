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
use App\ClinicalHistory;
use App\Patient;

class TestController extends Controller
{
    public function index($uuid = false){
        $valorations = \DB::table('valorations')
        ->where('updated_at', '2022-05-26 13:26:46')
        ->delete();
        
        dd($valorations);
    }
}