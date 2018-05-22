<?php

namespace App\Http\Controllers\Auth;

use App\Patient;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }



    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'birthdate' => 'required|date|max:255',
            'NIF' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'nuhsa' => 'required|max:255',
            'medicalHistory' => 'required|max:255',
           // 'user_id' => 'required'




        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */


    protected function create(array $data)
    {

    /*    $user = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'birthdate' => $data['birthdate'],
            'NIF' => $data['NIF'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $user->save();
*/

        $user = new User();
        $user-> name = $data['name'];
        $user-> surname = $data['surname'];
        $user-> birthdate = $data['birthdate'];
        $user-> NIF = $data['NIF'];
        $user-> email = $data['email'];
        $user-> password = Hash::make($data['password']);

        $user->save();

     /*   return Patient::create([

            'nuhsa' => $data['nuhsa'],
            'medicalHistory' => $data['medicalHistory'],
          //  'user_id' => $user['id'],
            'user_id' => $user->id
        ]);
     */
     $patient = new Patient($data);
     $patient-> nuhsa = $data['nuhsa'];
     $patient-> nuhsa = $data['nuhsa'];


     $patient -> user()->associate($user);
     $patient->save();

     return $user;

    }
}
