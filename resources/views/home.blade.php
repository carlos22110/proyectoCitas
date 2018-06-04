@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    ¡Bienvenid@, {{$user->name}} {{$user->surname}}!


                        <table class="table table-striped table-bordered">
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
                                    {!! Form::open(['route' => 'doctors.index', 'method' => 'get']) !!}
                                    {!!   Form::submit('Ir a médicos', ['class'=> 'btn btn-danger'])!!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>

                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
