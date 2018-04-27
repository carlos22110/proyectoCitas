@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear paciente</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'patients.store']) !!}

                        <div class="form-group">
                            <div class="form-group">
                                {!! Form::label('symptom_id', 'ID del síntoma') !!}
                                {!! Form::text('name',null,['class'=>'form-control', 'required']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('name', 'Nombre del paciente') !!}
                                {!! Form::text('name',null,['class'=>'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('surname', 'Apellido del paciente') !!}
                                {!! Form::text('surname',null,['class'=>'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('email', 'Email del paciente') !!}
                                {!! Form::text('email',null,['class'=>'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('password', 'Contraseña del paciente') !!}
                                {!! Form::text('password',null,['class'=>'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('NIF', 'NIF del paciente') !!}
                                {!! Form::text('NIF',null,['class'=>'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('birthdate', 'Fecha de nacimiento del paciente') !!}
                                {!! Form::text('birthdate',null,['class'=>'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                            {!! Form::label('nuhsa', 'NUHSA del paciente') !!}
                            {!! Form::text('nuhsa',null,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('medicalhistory', 'Historial medico del paciente') !!}
                            {!! Form::text('medicalhistory',null,['class'=>'form-control', 'required']) !!}
                        </div>
                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection