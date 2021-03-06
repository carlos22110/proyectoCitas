@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar paciente</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($patient, [ 'route' => ['patients.update',$patient->id], 'method'=>'PUT']) !!}

                        <div class="form-group">
                            {!! Form::label('nuhsa', 'NUHSA del paciente') !!}
                            {!! Form::text('nuhsa',$patient->nuhsa,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('medicalHistory', 'Historial medico del paciente') !!}
                            {!! Form::text('medicalHistory',$patient->medicalHistory,['class'=>'form-control', 'required']) !!}
                        </div>



                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
