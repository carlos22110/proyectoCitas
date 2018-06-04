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
                                    {!!   Form::submit('Crear relación', ['class'=> 'btn btn-danger'])!!}
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

                                <th>Id del paciente</th>
                                <th>nombre del paciente</th>
                                <th>Id del médico</th>
                                <th>nombre del paciente</th>

                                <th colspan="1">Acción</th>
                            </tr>

                            @foreach ($doctor_patients as $doctor_patient)


                                <tr>

                                    <td>{{ $doctor_patient->patient_id }}</td>
                                    <td>{{ $doctor_patient->patient->user-> name }}</td>
                                    <td>{{ $doctor_patient->doctor_id }}</td>
                                    <td>{{ $doctor_patient->doctor->user-> name }}</td>

                                    <td>
                                        {!! Form::open(['route' => ['doctor_patient.destroy',$doctor_patient->id], 'method' => 'delete']) !!}
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