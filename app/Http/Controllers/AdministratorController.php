<?php

namespace App\Http\Controllers;

use App\Administrator;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{

    public function __construct()
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
        $administrators = Administrator::all();

        return view('administrators/index')->with('administrators', $administrators);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('administrator/create');
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

        ]);
        $administrator = new Administrator($request->all());
        $administrator->save();

        // return redirect('especialidades');

        flash('Administrador creado correctamente');

        return redirect()->route('administrators.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        //
        return view('administrator.profile', ['administrator' => Administrator::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
        $administrator = Administrator::find($id);
        return view('administrators/edit',['administrator'=> $administrator ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
        ]);

        $administrator = Administrator::find($id);
        $administrator->fill($request->all());

        $administrator->save();

        flash('Administrador modificado correctamente');

        return redirect()->route('administrators.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $administrator = Administrator::find($id);
        $administrator->delete();
        flash('Administrador borrado correctamente');

        return redirect()->route('administrators.index');
    }
}
