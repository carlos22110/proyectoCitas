<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    //

    protected $fillable = ['description', 'patient_id'];

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
}
