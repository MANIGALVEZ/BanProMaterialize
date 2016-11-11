@extends('layouts.app')
@section('content')

<article>
    <div class="page-header">
        <h2 class="text-center text-muted">Administración De Usuarios</h2>
    </div>
</article>
<br>
<table class="table">
      <thead>
        <th>Id</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Email</th>
        <th>Celular</th>
        <th>Titulos</th>
        <th>Rol</th>
        <th>Proyectos Asociados</th>
      </thead>
        <tbody>
              @foreach($query as $row)
                  <tr class="letra">
                      <td>{{$row->id}}</td>
                      <td>{{$row->nameu}}</td>
                      <td>{{$row->apellidos}}</td>
                      <td>{{$row->email}}</td>
                      <td>{{$row->celular}}</td>
                      <td>{{$row->titulos}}</td>
                      <td>{{$row->tiporol}}</td>
                      <td><a href="usuariosshow/{{$row->id}}">Ver</a><td>
                  </tr>
             @endforeach
        </tbody>
    </table>
    {!!$query->render()!!}
@endsection
