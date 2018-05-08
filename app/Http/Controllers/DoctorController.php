<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{

   /* public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $doctors = Doctor::all();

        return view('doctors/index')->with('doctors', $doctors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('doctors/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [

            'speciality' => 'required|max:255'

        ]);

        //TODO: Primero crear un User y hacer un $user->save()
        // TODO: Una vez guardado el usuario acceder al Id que se haya generado $user->id

        $user = new User($request->all());

        //$user->name = Input::get('name');

        $user->password=Hash::make($user['password']);
        //$user->password = Hash::make(Input::get('password'));

        $user->save();

        $doctor = new Doctor($request->all());
        $doctor['user_id'] = $user->id;

        $doctor->save();


            // $user->id ->save($doctor->user_id);

            // return redirect('especialidades');

        flash('Médico creado correctamente');

        return redirect()->route('doctors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('doctor.profile', ['doctor' => Doctor::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $doctor = Doctor::find($id);
        return view('doctors/edit',['doctor'=> $doctor ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'speciality' => 'required|max:255'
        ]);

        $doctor = Doctor::find($id);
        $doctor->fill($request->all());

        $doctor->save();

        flash('Médico modificado correctamente');

        return redirect()->route('doctors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $doctor = Doctor::find($id);
        $doctor->delete();
        flash('Médico borrado correctamente');

        return redirect()->route('doctors.index');
    }
}
