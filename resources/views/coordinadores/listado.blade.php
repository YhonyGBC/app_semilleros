@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Listado Coordinadores</h1>
@stop

@section('content')
    <p>Módulo de listado de coordinadores.</p>

    <a class="btn btn-success" href="/coordinador/registrar_info">Adicionar</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Identificación</th>
                <th scope="col">Dirección</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Correo</th>
                <th scope="col">Género</th>
                <th scope="col">Fecha de Nacimiento</th>
                <th scope="col">Programa Académico</th>
                <th scope="col">Áreas de Conocimiento</th>
                <th scope="col">Semillero</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($coordinadores as $coordinador)
            <tr>
                <th scope="row">{{ $i }}</th>
                <td>{{ $coordinador->nombre }}</td>
                <td>{{ $coordinador->identificacion }}</td>
                <td>{{ $coordinador->direccion }}</td>
                <td>{{ $coordinador->telefono }}</td>
                <td>{{ $coordinador->correo }}</td>
                <td>{{ $coordinador->genero }}</td>
                <td>{{ $coordinador->fecha_nacimiento }}</td>
                <td>{{ $coordinador->prog_academico }}</td>
                <td>{{ $coordinador->areas_conocimiento }}</td>
                <td>{{ $coordinador->nombre_semillero}}</td>
                <td> 
                    <a class="btn btn-primary" href="/coordinador/editar/{{$coordinador->identificacion}}">Editar</a>
                    <a class="btn btn-danger" href="{{route('elim_coordinador', $coordinador->id)}}">Eliminar</a>
                </td>
            </tr>
            @php
                $i = $i + 1;
            @endphp
            @endforeach
        </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop