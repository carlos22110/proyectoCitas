@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar citas</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($appointment, [ 'route' => ['appointments.update',$appointment->id], 'method'=>'PUT']) !!}

                        <div class="form-group">
                            {!! Form::label('date', 'Fecha de la cita') !!}
                            {!! Form::text('date',$appointment->date,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('reason', 'Motivo de la cita') !!}
                            {!! Form::text('reason',$appointment->reason,['class'=>'form-control', 'required']) !!}
                        </div>
{{--                        <div class="form-group">
                            {!! Form::label('doctor_id', 'ID del doctor') !!}
                            {!! Form::text('doctor_id',$appointment->doctor_id,['class'=>'form-control', 'required']) !!}
                        </div>--}}

                        {!! Form::label('doctor_id', 'Especialidad del médico') !!}



                        <select name="doctor_id">

                            @foreach ($docs as $doctor)

                                <option  value="{{$doctor->id}}" > {{ $doctor->speciality}}</option>

                            @endforeach

                            {{ Form::select('doctor_id') }}

                        </select>



                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
