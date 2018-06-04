@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Médicos</div>

                    <div class="panel-body">
                        @include('flash::message')

                        <table class="table table-striped table-bordered">
                            <tr>

                                <th colspan="7">Ir a</th>
                            </tr>

                            <tr>
                                <td>
                        {!! Form::open(['route' => 'doctors.create', 'method' => 'get']) !!}
                        {!!   Form::submit('Crear médico', ['class'=> 'btn btn-danger'])!!}
                                </td>

                                <td>
                                    {!! Form::close() !!}
                                    {!! Form::open(['route' => 'doctors.patients', 'method' => 'get']) !!}
                                    {!!   Form::submit('Ver mis pacientes', ['class'=> 'btn btn-warning'])!!}
                                    {!! Form::close() !!}
                                </td>


                                <td>
                        {!! Form::close() !!}
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
                        {!! Form::open(['route' => 'symptoms.index', 'method' => 'get']) !!}
                        {!!   Form::submit('Ir a síntomas', ['class'=> 'btn btn-success'])!!}
                        {!! Form::close() !!}
                                </td>

                                <td>
                        {!! Form::open(['route' => 'administrators.index', 'method' => 'get']) !!}
                        {!!   Form::submit('Ir a administradores', ['class'=> 'btn btn-info'])!!}
                        {!! Form::close() !!}
                                </td>

                                <td>
                                    {!! Form::open(['route' => 'doctor_patient.index', 'method' => 'get']) !!}
                                    {!!   Form::submit('Ir a Relaciones', ['class'=> 'btn btn-warning'])!!}
                                    {!! Form::close() !!}
                                </td>
                        </tr>

                        </table>

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>

                                <th>Nombre</th>
                                <th>Especialidad</th>

                                <th colspan="2">Acciones</th>
                            </tr>

                            @foreach ($doctors as $doctor)


                                <tr>
                                    <td>{{ $doctor-> user -> name }}</td>
                                    <td>{{ $doctor->speciality }}</td>
                                    <td>
                                        {!! Form::open(['route' => ['doctors.edit',$doctor->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['doctors.destroy',$doctor->id], 'method' => 'delete']) !!}
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