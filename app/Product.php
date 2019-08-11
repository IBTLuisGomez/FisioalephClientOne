<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use SoftDeletes;
    protected $fillable = [
    	'name',
    	'img',
    	'description',
        'price_mxn',
    ];

    public static function getProductByIds($array){
		$Selector_products=[];
    	foreach($array as $key=>$value){
    	    if(!$Selector_products){
    	        $Selector_products=static::where("id","=",$key);
    	        continue;
    	    }
    	    $Selector_products->orWhere("id","=",$key);
    	}
    	return $Selector_products?$Selector_products->get():[];
    }
}
