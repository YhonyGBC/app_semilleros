@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Listado Semilleristas</h1>
@stop

@section('content')
    <p>Módulo de listado de semilleristas.</p>

    <a class="btn btn-success" href="/semillerista/registrar_info">Adicionar</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Identificación</th>
                <th scope="col">Código Estudiante</th>
                <th scope="col">Dirección</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Correo</th>
                <th scope="col">Género</th>
                <th scope="col">Fecha de Nacimiento</th>
                <th scope="col">Semestre</th>
                <th scope="col">Programa Académico</th>
                <th scope="col">Semillero</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($semilleristas as $semillerista)
            <tr>
                <th scope="row">{{ $i }}</th>
                <td>{{ $semillerista->nombre }}</td>
                <td>{{ $semillerista->identificacion }}</td>
                <td>{{ $semillerista->cod_estudiante }}</td>
                <td>{{ $semillerista->direccion }}</td>
                <td>{{ $semillerista->telefono }}</td>
                <td>{{ $semillerista->correo }}</td>
                <td>{{ $semillerista->genero }}</td>
                <td>{{ $semillerista->fecha_nacimiento }}</td>
                <td>{{ $semillerista->semestre }}</td>
                <td>{{ $semillerista->prog_academico }}</td>
                <td>{{ $semillerista->nombre_semillero }}</td>
                <td>
                    <a class="btn btn-primary" href="/semillerista/editar/{{$semillerista->identificacion}}">Editar</a>
                    <a class="btn btn-danger" href="{{route('elim_semillerista', $semillerista->id)}}">Eliminar</a>
                </td>
            </tr>
            @php
                $i++;
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
