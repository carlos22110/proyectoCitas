<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Doctor;
use App\Patient;
use App\Symptom;
use App\User;
use App\Doctor_Patient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection as Collection;

class PatientController extends Controller
{

/*    public function __construct()
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
        $patients = Patient::all();

        return view('patients/index')->with('patients', $patients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $symptoms = Symptom::all()->pluck('description','id');

        return view('patients/create',['symptoms'=>$symptoms]);
      //  return view('patients/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'medicalHistory' => 'required|max:255',
            'nuhsa' => 'required|max:255',
            //'symptom_id' => 'required|exists:symptoms,id'
        ]);

        $user = new User($request->all());

        $user->password=Hash::make($user['password']);
        $user->save();



        $patient = new Patient($request->all());
        $patient['user_id'] = $user->id;
        $patient->save();

        // return redirect('especialidades');

        flash('Paciente creado correctamente');

        return redirect()->route('patients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('patient.profile', ['patient' => Patient::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $patient = Patient::find($id);
        $symptoms = Symptom::all()->pluck('description','id');

        return view('patients/edit',['patient'=> $patient, 'symptoms' =>$symptoms]);
    }

    public function appointments()
    {

        $appointments = Appointment::all();
        $user = Auth::user();
        $patient=$user->patient;
      //  $appointmentss[]=[];

        foreach ($appointments as $appointment) {
            if ($patient->id == $appointment->patient_id) {
                $appointmentss[] = $appointment;
            }
        }
        $collection = Collection::make($appointmentss);
        $sorted = $collection->sortBy('date');
        return view('patients/appointments')->with('appointments', $sorted);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'medicalHistory' => 'required|max:255',
            'nuhsa' => 'required|max:255',
            //'symptom_id' => 'required|exists:symptoms,id'
        ]);

        $patient = Patient::find($id);
        $patient->fill($request->all());

        $patient->save();

        flash('Paciente modificado correctamente');

        return redirect()->route('patients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $patient = Patient::find($id);
        $patient->delete();
        flash('Paciente borrado correctamente');

        return redirect()->route('patients.index');
    }
}
