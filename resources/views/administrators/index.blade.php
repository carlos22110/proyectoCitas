@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Administradores</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'administrators.create', 'method' => 'get']) !!}
                        {!!   Form::submit('Crear administrador', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>

                                <th colspan="1">Acción</th>
                            </tr>

                            @foreach ($administrators as $administrator)


                                <tr>
                                    <td>{{ $administrator->id }}</td>
                                    <td>{{ $administrator->user->name }}</td>

                                    <td>
                                        {!! Form::open(['route' => ['administrators.destroy',$administrator->id], 'method' => 'delete']) !!}
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