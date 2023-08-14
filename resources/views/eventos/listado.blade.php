@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Eventos</h1>
@stop

@section('content')
    <div class="row">
        <div class="col">
            <p>Listado de Eventos</p>
        </div>
    </div>
    <br><br>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Descripción</th>
        <th scope="col">Fecha</th>
        <th scope="col">Lugar</th>
        <th scope="col">Tipo</th>
        <th scope="col">Modalidad</th>
        <th scope="col">Clasificación</th>
        <th scope="col">Observaciones</th>
        <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($eventos as $e)
        <tr>
        <td>{{ $e->nombre}}</td>
        <td>{{ $e->descripcion}}</td>
        <td>{{ $e->fecha}}</td>
        <td>{{ $e->lugar}}</td>
        <td>{{ $e->tipo}}</td>
        <td>{{ $e->modalidad}}</td>
        <td>{{ $e->clasificacion}}</td>
        <td>{{ $e->observaciones}}</td>
        <td>
        <a class="btn btn-primary" href="">Editar</a>
        <a class="btn btn-danger" href="{{route('eliminaEve',$e->id)}}">Eliminar</a>
        </td>
        </tr>
        @endforeach
    </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
@stop