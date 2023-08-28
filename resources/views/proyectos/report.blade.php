<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Reporte de Proyectos</title>
  </head>
  <body>
    <h2 class="text-center">Listado de Proyectos</h2>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">Código</th>
        <th scope="col">Título</th>
        <th scope="col">Integrantes</th>
        <th scope="col">Tipo</th>
        <th scope="col">Estado</th>
        <th scope="col">Fecha Inicio</th>
        <th scope="col">Fecha Final</th>
        <th scope="col">Documento</th>
        <th scope="col">Semillero</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($proyectos as $num => $p)
        <tr>
        <!-- <th scope="row">{{ $num + 1}}</th> -->
        <td>{{ $p->id}}</td>
        <td>{{ $p->titulo}}</td>
        <td>{{ $p->participante}}</td>
        <td>{{ $p->tipo_proyecto}}</td>
        <td>{{ $p->estado}}</td>
        <td>{{ $p->fecha_inicio}}</td>
        <td>{{ $p->fecha_finalizacion}}</td>
        <td>{{ $p->archivo_adjunto}}</td>
        <td>{{ $p->semillero->nombre}}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
  </body>
</html>