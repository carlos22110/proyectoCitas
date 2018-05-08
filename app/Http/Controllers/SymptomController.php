<?php

namespace App\Http\Controllers;

use App\Symptom;
use Illuminate\Http\Request;

class SymptomController extends Controller
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

        $symptoms = Symptom::all();

        return view('symptoms/index')->with('symptoms', $symptoms);
    }


    public function create()
    {
        //
        return view('symptoms/create');
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
            'description' => 'required|max:255',
            'patient_id' => 'required|max:255'
        ]);

        $symptom = new Symptom($request->all());
        $symptom->save();

        // return redirect('especialidades');

        flash('Síntoma creado correctamente');

        return redirect()->route('symptoms.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        //
        return view('symptom.profile', ['symptom' => Symptom::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $symptom = Symptom::find($id);
        return view('symptoms/edit',['symptom'=> $symptom ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'description' => 'required|max:255',
            'patient_id' => 'required|max:255'
        ]);

        $symptom = Symptom::find($id);
        $symptom->fill($request->all());

        $symptom->save();

        flash('Síntoma modificado correctamente');

        return redirect()->route('symptoms.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $symptom = Symptom::find($id);
        $symptom->delete();
        flash('Síntoma borrado correctamente');

        return redirect()->route('symptoms.index');
    }

    public function  destroyAll()
    {
        $symptoms = Symptom::all();
        foreach ($symptoms as $symptom){
            $symptom->delete();
        }


    }
}
