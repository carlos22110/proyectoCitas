<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\User;
use App\Doctor_Patient;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorPatientController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $doctor_patients = Doctor_Patient::all();

        return view('doctor_patient/index')->with('doctor_patients', $doctor_patients);
    }


    public function create()
    {
        //
        $patients = Patient::all();
       // $pats = Patient::all();
        $doctor_patients = Doctor_Patient::all();
        $user = Auth::user();

        foreach ($patients as $patient){
            $pats[]=$patient;
        }

        $doctors = Doctor::all();
        foreach ($doctors as $doctor) {
            if ($user->id == $doctor->user_id) {
                $doctor_id=$doctor['id'];
            }
        }

        foreach ($doctor_patients as $doctor_patient){
            if($doctor_id == $doctor_patient->doctor_id){
                foreach ($patients as $patient) {
                    if($patient->id == $doctor_patient->patient_id) {
                        $rest[]=$patient;
                    }
                }
            }
        }
        $pati=array_diff($pats, $rest);


        return view('doctor_patient/create')->with('patients', $pati);
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
/*        $this->validate($request, [

             'patient_id' => 'required|max:255'
        ]);*/

        $user = Auth::user();

        $doctors = Doctor::all();
        foreach ($doctors as $doctor) {
            if ($user->id == $doctor->user_id) {
                $doctor_id=$doctor['id'];
            }
        }

        $doctor_patient = new Doctor_Patient($request->all());
        $doctor_patient->doctor_id = $doctor_id;
        //  $appointment['patient_id'] = $user->patient['id'];
        $doctor_patient->save();



        flash('Relación añadida correctamente correctamente');

        return redirect()->route('doctor_patient.index');
    }





    /**
     * Display the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
/*    public function destroy($id)
    {
        //
        $doctor_patient = Doctor_Patient::find($id);
        $doctor_patient->delete();
        flash('Relación borrada correctamente');

        return redirect()->route('doctor_patient.create');
    }*/

    public function destroy($id)
    {
        //
        $doctor_patients = Doctor_Patient::find($id);
        $doctor_patients->delete();
        flash('Relación borrada correctamente');

        return redirect()->route('doctor_patient.index');
    }

}
