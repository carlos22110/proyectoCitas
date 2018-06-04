@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Mis Citas</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'appointments.create', 'method' => 'get']) !!}
                        {!!   Form::submit('Pedir cita', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>

                                <th>Fecha y Hora</th>
                                <th>Motivo</th>
                                <th>Nombre del médico</th>
                                <th>Especialidad del médico</th>
                                <th>Nombre del paciente</th>


                                <th colspan="2">Acciones</th>
                            </tr>

                            @foreach ($appointments as $appointment)



                                <tr>
                                    <td>{{ $appointment->date }}</td>
                                    <td>{{ $appointment->reason }}</td>
                                    <td>{{ $appointment->doctor->user->name }}</td>
                                    <td>{{ $appointment->doctor->speciality }}</td>
                                    <td>{{ $appointment->patient->user->name }}</td>

                                    <td>
                                        {!! Form::open(['route' => ['appointments.edit',$appointment->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['appointments.destroy',$appointment->id], 'method' => 'delete']) !!}
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