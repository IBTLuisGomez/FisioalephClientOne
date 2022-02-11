<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TerapeuticPlan extends Model
{
    protected $guarded = ['id'];

    public function outside_resources(){
    	return $this->hasMany('App\OutsideResource', 'terapeutic_plan_id','id');
    }
    public function image_resources(){
    	return $this->hasMany('App\ImageResource', 'terapeutic_plan_id','id');
    }

    public function keywords(){
    	return $this->belongsToMany('App\Keyword', 'keyword_terapeutic_plan');
    }

    public function anato_physiology_glosary_item(){
    	return $this->belongsTo('App\AnatoPhysiologyGlosaryItem', 'anato_physiology_glosary_item_id');
    }
}
