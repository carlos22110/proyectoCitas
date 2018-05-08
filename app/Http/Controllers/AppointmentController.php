<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{

 /*   public function __construct()
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
        $appointments = Appointment::all();

        return view('appointments/index')->with('appointments', $appointments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('appointments/create');
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
            'date' => 'required|max:255',
            'reason' => 'required|max:255',
            'doctor_id' => 'required|max:255',
            'patient_id' => 'required|max:255'
        ]);

        $appointment = new Appointment($request->all());
        $appointment->save();

        // return redirect('especialidades');

        flash('Cita creada correctamente');

        return redirect()->route('appointments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        //
        return view('appointment.profile', ['appointment' => Appointment::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $appointment = Appointment::find($id);

        return view('appointments/edit',['appointment'=> $appointment ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $this->validate($request, [
            'date' => 'required|max:255',
            'reason' => 'required|max:255',
            'doctor_id' => 'required|max:255'
        ]);

        $appointment = Appointment::find($id);
        $appointment->fill($request->all());

        $appointment->save();

        flash('Cita modificada correctamente');

        return redirect()->route('appointments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $appointment = Appointment::find($id);
        $appointment->delete();
        flash('Cita borrada correctamente');

        return redirect()->route('appointments.index');
    }
}
