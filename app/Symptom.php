<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    //
    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
}
