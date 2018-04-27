<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();

        return view('users/index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users/create');
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

            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'birthdate' => 'required|max:255',
            'NIF' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'administrator_id' => 'required|exists:administrators,id'

        ]);
        $user = new User($request->all());
        $user->save();

        flash('Usuario creado correctamente');

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('user.profile', ['user' => User::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
        return view('users/edit',['doctor'=> $user ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'birthdate' => 'required|max:255',
            'NIF' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255'
        ]);

        $user = User::find($id);
        $user->fill($request->all());

        $user->save();

        flash('Usuario modificado correctamente');

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        $user->delete();
        flash('Usuario borrado correctamente');

        return redirect()->route('users.index');
    }
}
