<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Decision extends Model
{
    protected $guarded = ['id'];

    public function home_physiotherapy_programs() {
        return $this->belongsToMany('App\HomePhysiotherapyProgram', 'decision_hpp')->withPivot('password');
    }
}
