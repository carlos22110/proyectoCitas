@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Síntomas</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'symptoms.create', 'method' => 'get']) !!}
                        {!!   Form::submit('Crear síntoma', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>

                                <th>Descripción</th>

                                <th colspan="2">Acciones</th>
                            </tr>

                            @foreach ($symptoms as $symptom)



                                <tr>
                                    <td>{{ $symptom->description }}</td>
                                    <td>
                                        {!! Form::open(['route' => ['symptoms.edit',$symptom->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['symptoms.destroy',$symptom->id], 'method' => 'delete']) !!}
                                        {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                                        {!! Form::close() !!}

                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection