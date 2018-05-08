@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear cita</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'appointments.store']) !!}

                        <div class="form-group">
                            <div class="form-group">
                                {!! Form::label('date', 'Fecha y hora de la cita') !!}
                                {!! Form::text('date',null,['class'=>'form-control', 'required']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('reason', 'Motivo de la cita') !!}
                                {!! Form::text('reason',null,['class'=>'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('patient_id', 'ID del paciente') !!}
                                {!! Form::text('patient_id',null,['class'=>'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('doctor_id', 'ID del doctor') !!}
                                {!! Form::text('doctor_id',null,['class'=>'form-control', 'required']) !!}
                            </div>

                            {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection