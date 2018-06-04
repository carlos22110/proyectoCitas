@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Relación</div>

                    <div class="panel-body">
                        @include('flash::message')

                        <table class="table table-striped table-bordered">
                            <tr>

                                <th colspan="6">Ir a</th>
                            </tr>

                            <tr>
                                <td>
                                    {!! Form::open(['route' => 'doctor_patient.create', 'method' => 'get']) !!}
                                    {!!   Form::submit('Añadir nuevo paciente', ['class'=> 'btn btn-danger'])!!}
                                </td>

                                <td>
                                    {!! Form::close() !!}
                                    {!! Form::open(['route' => 'patients.index', 'method' => 'get']) !!}
                                    {!!   Form::submit('Ir a pacientes', ['class'=> 'btn btn-secondary'])!!}
                                    {!! Form::close() !!}
                                </td>


                                <td>
                                    {!! Form::close() !!}
                                    {!! Form::open(['route' => 'administrators.index', 'method' => 'get']) !!}
                                    {!!   Form::submit('Ir a administradores', ['class'=> 'btn btn-warning'])!!}
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
                                    {!! Form::open(['route' => 'doctors.index', 'method' => 'get']) !!}
                                    {!!   Form::submit('Ir a médicos', ['class'=> 'btn btn-info'])!!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>

                        </table>

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>

                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Nuhsa</th>
                                <th>Fecha de nacimiento</th>
                                <th>Historial Médico</th>

                                <th colspan="1">Borrar</th>
                            </tr>

                            @foreach ($patients as $patient)

                                <tr>
                                    <td>{{ $patient->id }}</td>
                                    <td>{{ $patient->user -> name }}</td>
                                    <td>{{ $patient->nuhsa }}</td>
                                    <td>{{ $patient->user -> birthdate }}</td>
                                    <td>{{ $patient->medicalHistory }}</td>

                                    <td>
                                        {!! Form::open(['route' => ['doctors.destroyRel',$patient->id], 'method' => 'delete']) !!}
                                        {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                                        {!! Form::close() !!}

                                    </td>
                                </tr>

                                @foreach($patient->symptom as $symptom)
                                    <tr>
                                        <td> </td>
                                          <td> <b>Síntoma:</b></td>
                                        <td colspan="6">{{$symptom->description }}</td>
                                    </tr>
                                @endforeach

                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection