<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function appointment()
    {
        return $this->hasMany('App\Appointment');
    }
    public function symptom()
    {
        return $this->hasMany('App\Symptom');
    }
    public function doctors()
    {
        return $this->belongsToMany('App\Doctor');
    }
}
