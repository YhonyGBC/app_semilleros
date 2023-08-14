@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Listado de Semilleros</h1>
@stop

@section('content')
    <p>Módulo de listado de semilleros.</p>

    <a class="btn btn-success" href="/semillero/registrar_info">Adicionar</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Logo</th>
                <th scope="col">Fecha</th>
                <th scope="col">Número de Resolución</th>
                <th scope="col">Descripción</th>
                <th scope="col">Misión</th>
                <th scope="col">Visión</th>
                <th scope="col">Valores</th>
                <th scope="col">Objetivos</th>
                <th scope="col">Líneas de Investigación</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($semilleros as $semillero)
            <tr>
                <th scope="row">{{ $i }}</th>
                <td>{{ $semillero->nombre }}</td>
                <td>{{ $semillero->correo }}</td>
                <td>
                    @if ($semillero->logo)
                        <img src="{{ asset($semillero->logo) }}" alt="Logo" width="50">
                    @else
                        Sin imagen
                    @endif
                </td>
                <td>{{ $semillero->fecha }}</td>
                <td>{{ $semillero->num_resolucion }}</td>
                <td>{{ $semillero->descripcion }}</td>
                <td>{{ $semillero->mision }}</td>
                <td>{{ $semillero->vision }}</td>
                <td>{{ $semillero->valores }}</td>
                <td>{{ $semillero->objetivos }}</td>
                <td>{{ $semillero->lineas_investigacion }}</td>
                <td>
                    <a class="btn btn-primary" href="">Editar</a>
                    <a class="btn btn-danger" href="">Eliminar</a>
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