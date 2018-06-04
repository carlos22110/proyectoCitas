@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Médico Paciente</div>


                    <div class="panel-body">


                        {!! Form::open(['route' => 'doctor_patient.store']) !!}

                        <div class="form-group">

{{--                            <div class="form-group">
                                {!! Form::label('patient_id', 'ID del paciente') !!}
                                {!! Form::text('patient_id',null,['class'=>'form-control', 'required']) !!}
                            </div>--}}






                            {!! Form::label('patient_id', 'Nombre del paciente') !!}



                            <select name="patient_id">

                                            @foreach ($patients as $patient)


                                        <option id="$patient->id" value="{{$patient->id}}">{{ $patient->user->name }}


                                        </option >

                                            @endforeach

                                                {{ Form::select('patient_id') }}


                                     </select>







                        </div>

                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection