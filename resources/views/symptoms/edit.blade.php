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
                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
</div>
    </div>
    </div>
@endsection
