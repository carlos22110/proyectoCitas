<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor_Patient extends Model

{
    public $table = "doctor_patient";
    public $timestamps = false;
    protected $fillable = ['doctor_id', 'patient_id'];
    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }
    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
}
