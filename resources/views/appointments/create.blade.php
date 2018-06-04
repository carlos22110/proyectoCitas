@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Pedir cita</div>

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
{{--                            <div class="form-group">
                                {!! Form::label('doctor', 'ID del doctor') !!}
                                {!! Form::text('doctor_id',null,['class'=>'form-control', 'required']) !!}
                            </div>--}}
                           {!! Form::label('doctor_id', 'Especialidad del médico') !!}



                            <select name="doctor_id">

                                @foreach ($docs as $doctor)

                                    <option  value="{{$doctor->id}}" > {{ $doctor->speciality}}</option>

                                @endforeach

                                {{ Form::select('doctor_id') }}

                            </select>

{{--                            <select name="doctor_id">

                                @foreach ((array)$doctors_id as $doctor_id)

                                    <option>{{ $doctor_id}}</option>

                                @endforeach

                                {{ Form::select('doctor_id') }}

                            </select>--}}


                            {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                            {!! Form::close() !!}

                            {!! Form::open(['route' => 'patients.appointments', 'method' => 'get']) !!}
                            {!!   Form::submit('Ver citas', ['class'=> 'btn btn-secondary'])!!}
                            {!! Form::close() !!}



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection