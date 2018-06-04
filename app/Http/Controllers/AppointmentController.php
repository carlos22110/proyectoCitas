<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Patient;
use App\Doctor;
use App\Doctor_Patient;
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


        $doctor_patients = Doctor_Patient::all();
        $doctors= Doctor::all();

        $user = Auth::user();


       $patient = $user->patient;


        foreach ($doctor_patients as $doctor_patient) {
            if ($patient->id == $doctor_patient->patient_id) {
                $doctors_id[] = $doctor_patient->doctor_id;
             //   array_add($doctors_id,'doctor_id',$doctor_patient->doctor_id);
            }
        }

        foreach ($doctors as $doctor ){
            foreach ($doctors_id as $doctor_id){
                if($doctor->id == $doctor_id) {
                $docs[] = $doctor;
             }
            }
        }

        return view('appointments/create')->with('doctors_id',$doctors_id)->with('docs',$docs);
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
          //  'doctor_id' => 'required|max:255',
           // 'patient_id' => 'required|max:255'
        ]);

        $user = Auth::user();

        $patients = Patient::all();
        foreach ($patients as $patient) {
            if ($user->id == $patient->user_id) {
                $patients_id=$patient['id'];
            }
        }

        $appointment = new Appointment($request->all());
        $appointment->patient_id = $patients_id;
      //  $appointment['patient_id'] = $user->patient['id'];
        $appointment->save();



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
            //'doctor_id' => 'required|max:255'
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
