@extends('layouts.app')
@section('content')

<table class="table table-hover">
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
          @foreach($query as $row)
              <tbody>
                  <td>{{$row->id}}</td>
                  <td>{{$row->nameu}}</td>
                  <td>{{$row->apellidos}}</td>
                  <td>{{$row->email}}</td>
                  <td>{{$row->celular}}</td>
                  <td>{{$row->titulos}}</td>
                  <td>{{$row->tiporol}}</td>
                  <td>
                     <a href="usuariosshow/{{$row->id}}">Ver</a>
                 </td>
         @endforeach
             </tbody>
    </table>
    {!!$query->render()!!}
@endsection
