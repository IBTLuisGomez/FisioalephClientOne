<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Offer extends Model
{
	protected $guarded=["id"];
    public function type(){
    	return $this->belongsTo("App\OfferType","offer_type_id");
    }
    public function products(){
    	return $this->belongsToMany("App\Product","offer_product","offer_id","product_id")->withPivot("qty");
    }
}
