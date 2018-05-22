@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear Administrador</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'administrators.store']) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Nombre del administrador') !!}
                            {!! Form::text('name',null,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('surname', 'Apellido del administrador') !!}
                            {!! Form::text('surname',null,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', 'Email del administrador') !!}
                            {!! Form::text('email',null,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password', 'Contraseña del administrador') !!}
                            {!! Form::text('password',null,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('NIF', 'NIF del administrador') !!}
                            {!! Form::text('NIF',null,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('birthdate', 'Fecha de nacimiento del administrador (aaaa-mm-dd)') !!}
                            {!! Form::text('birthdate',null,['class'=>'form-control', 'required']) !!}
                        </div>


                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection