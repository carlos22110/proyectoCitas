@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Síntomas</div>

                    <div class="panel-body">
                        @include('flash::message')


                        <table class="table table-striped table-bordered">
                            <tr>

                                <th colspan="5">Ir a</th>
                            </tr>

                            <tr>

                                <td>

                                    {!! Form::open(['route' => 'symptoms.create', 'method' => 'get']) !!}
                                        {!!   Form::submit('Crear síntoma', ['class'=> 'btn btn-danger'])!!}
                                    {!! Form::close() !!}
                                </td>

                                <td>

                                    {!! Form::open(['route' => 'patients.index', 'method' => 'get']) !!}
                                    {!!   Form::submit('Ir a pacientes', ['class'=> 'btn btn-secondary'])!!}
                                    {!! Form::close() !!}
                                </td>

                                <td>
                                    {!! Form::open(['route' => 'appointments.index', 'method' => 'get']) !!}
                                    {!!   Form::submit('Ir a citas', ['class'=> 'btn btn-primary'])!!}
                                    {!! Form::close() !!}
                                </td>


                                <td>
                                    {!! Form::open(['route' => 'administrators.index', 'method' => 'get']) !!}
                                    {!!   Form::submit('Ir a administradores', ['class'=> 'btn btn-info'])!!}
                                    {!! Form::close() !!}
                                </td>

                                <td>
                                    {!! Form::open(['route' => 'doctors.index', 'method' => 'get']) !!}
                                    {!!   Form::submit('Ir a médicos', ['class'=> 'btn btn-warning'])!!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>

                        </table>

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>

                                <th>Nombre del paciente</th>
                                <th>Descripción</th>
                                <th>ID del paciente</th>


                                <th colspan="2">Acciones</th>
                            </tr>

                            @foreach ($symptoms as $symptom)



                                <tr>
                                    <td>{{ $symptom->patient->user -> name }}</td>
                                    <td>{{ $symptom->description }}</td>
                                    <td>{{ $symptom->patient_id }}</td>
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