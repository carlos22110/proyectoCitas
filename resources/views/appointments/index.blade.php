@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Citas</div>

{{--                    <table class="table table-striped table-bordered">
                        <tr>

                            <th colspan="5">Ir a</th>
                        </tr>

                        <tr>

                            <td>
                                {!! Form::close() !!}
                                {!! Form::open(['route' => 'patients.index', 'method' => 'get']) !!}
                                {!!   Form::submit('Ir a pacientes', ['class'=> 'btn btn-secondary'])!!}
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
                                {!! Form::open(['route' => 'doctors.index', 'method' => 'get']) !!}
                                {!!   Form::submit('Ir a médicos', ['class'=> 'btn btn-danger'])!!}
                                {!! Form::close() !!}
                            </td>
                        </tr>

                    </table>--}}

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>

                                <th>Fecha y Hora</th>
                                <th>Motivo</th>
                                <th>Nombre del médico</th>
                                <th>Especialidad del médico</th>
                                <th>Nombre del paciente</th>


                                {{--<th colspan="2">Acciones</th>--}}
                            </tr>

                            @foreach ($appointments as $appointment)



                                <tr>
                                    <td>{{ $appointment->date }}</td>
                                    <td>{{ $appointment->reason }}</td>
                                    <td>{{ $appointment->doctor->user->name }}</td>
                                    <td>{{ $appointment->doctor->speciality }}</td>
                                    <td>{{ $appointment->patient->user->name }}</td>

{{--                                    <td>
                                        {!! Form::open(['route' => ['appointments.edit',$appointment->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['appointments.destroy',$appointment->id], 'method' => 'delete']) !!}
                                        {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                                        {!! Form::close() !!}

                                    </td>--}}
                                </tr>


                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection