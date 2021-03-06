@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear síntoma</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'symptoms.store']) !!}

                        <div class="form-group">
                            {!! Form::label('description', 'Descripción del síntoma') !!}
                            {!! Form::text('description',null,['class'=>'form-control', 'required']) !!}
                        </div>
{{--                        <div class="form-group">
                        {!! Form::label('patient_id', 'ID del paciente al que pertenece') !!}
                        {!! Form::text('patient_id',null,['class'=>'form-control', 'required']) !!}
                        </div>--}}
                        {!! Form::label('patient_id', 'Nombre del paciente') !!}



                        <select name="patient_id">

                            @foreach ($patients as $patient)


                                <option id="$patient->id" value="{{$patient->id}}">{{ $patient->user->name }} {{$patient->user->surname }}


                                </option >

                            @endforeach

                            {{ Form::select('patient_id') }}


                        </select>

                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

