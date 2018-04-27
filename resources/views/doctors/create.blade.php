@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear Médico</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'doctors.store']) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Nombre del médico') !!}
                            {!! Form::text('name',null,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('surname', 'Apellido del médico') !!}
                            {!! Form::text('surname',null,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', 'Email del médico') !!}
                            {!! Form::text('email',null,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password', 'Contraseña del médico') !!}
                            {!! Form::text('password',null,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('NIF', 'NIF del médico') !!}
                            {!! Form::text('NIF',null,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('birthdate', 'Fecha de nacimiento del médico') !!}
                            {!! Form::text('birthdate',null,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('speciality', 'Especialidad del médico') !!}
                            {!! Form::text('speciality',null,['class'=>'form-control', 'required']) !!}
                        </div>

                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection