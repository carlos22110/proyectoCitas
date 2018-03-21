<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    //

    protected $fillable = ['description'];

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
}
