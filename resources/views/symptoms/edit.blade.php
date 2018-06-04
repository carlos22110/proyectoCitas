@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar síntoma</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($symptom, [ 'route' => ['symptoms.update',$symptom->id], 'method'=>'PUT']) !!}

                        <div class="form-group">
                            {!! Form::label('description', 'Descripción del síntoma') !!}
                            {!! Form::text('description',$symptom->nuhsa,['class'=>'form-control', 'required']) !!}
                        </div>
{{--                        <div class="form-group">
                            {!! Form::label('patient_id', 'ID del paciente al que pertenece') !!}
                            {!! Form::text('patient_id',$symptom->nuhsa,['class'=>'form-control', 'required']) !!}
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
