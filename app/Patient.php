<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
class Patient extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
	protected $guarded=["id"];
    public function getAgeAttribute(){
    	return Carbon::parse($this->attributes['birth_date'])->age;
    }
    public function getFullNameAttribute(){
    	return $this->attributes['name']." ".$this->attributes['surname'].(($this->attributes['second_surname'])?(" ".$this->attributes['second_surname']):"");
    }
    public function clinicalHistory(){
    	return $this->hasOne('App\ClinicalHistory','patient_id','id');
    }
}
