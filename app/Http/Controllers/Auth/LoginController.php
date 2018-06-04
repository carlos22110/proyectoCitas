<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Patient;
use App\Doctor;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';


    protected function redirectTo(){
        $user = Auth::user();

        $doctors = Doctor::all();
        foreach ($doctors as $doctor) {
            if ($user->id == $doctor->user_id) {
                return '/doctors';
            }
        }
        $patients = Patient::all();
        foreach ($patients as $patient){
            if ($user->id == $patient->user_id) {
                return '/appointments';
            }
        }

        return '/home';

      /*  dd($user->NIF);
        if($user->isDoctor()){
            return '/doctors';
            //ir a medico.index return '/medico';
        }
        else if ($user->isPatient()){
            return '/patients';
            //ir a paciente.index
        }
        else{ //si es administrador
            return '/home';
        }*/
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
