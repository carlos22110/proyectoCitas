<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use phpDocumentor\Reflection\Types\Boolean;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','surname','birthdate','NIF','address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function patient()
    {
        return $this->hasOne('App\Patient');
    }
    public function doctor()
    {
        return $this->hasOne('App\Doctor');
    }
    public function administrator()
    {
        return $this->hasOne('App\Administrator');
    }


    public function isDoctor()
    {

        $doctors = Doctor::all();
        foreach ($doctors as $doctor) {
            if ($this->id == $doctor->user_id) {
                return true;
            }
        }
          return false;
    }

    public function isPatient(){
        $patients = Patient::all();
        foreach ($patients as $patient)
            if ($this->id==$patient->user_id) {
                      return true;
            }

        return false;
    }

//    public function isAdministrator(){
        //logica para comprobar si es admin
 //       return true;
 //   }
}
