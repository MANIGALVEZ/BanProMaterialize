@extends('layouts.app')
@section('content')

<table class="table table-hover">
      <thead>
        <th>Id</th>
        <th>Proyecto</th>
        <th>Usuario</th>
        <th>Estado</th>
        <th>Detalles</th>
      </thead>
          @foreach($proyectosusers as $puti)
              <tbody>
                    <td>{{$puti->id}}</td>
                    <td>
                        <?php $proyec = DB::table('proyectos')->where('id', "=", $puti->proyectos_id)->get();?>
                        @foreach($proyec as $usu)
                            {{$usu->nombrep}}
                        @endforeach
                    </td>
                    <td>
                        <?php $usuario = DB::table('users')->where('id', "=", $puti->users_id)->get();?>
                        @foreach($usuario as $usu)
                            {{$usu->nameu}}
                        @endforeach
                    </td>
                    <td>

                            <?php $estadosprouser = DB::table("estadosproyectosusers")->get(); ?>
                        <select class="form-inline" data-proyecto="{{ $puti->id }}">
                            @foreach($estadosprouser as $estado)
                                <?php $tabla = DB::table("proyectosusers")->get(); ?>

                                 @if($estado->id == $puti->estadosproyectosusers_id)
                                            <option value="{{$estado->id}}" selected>{{$estado->estado}}</option>
                                        @else
                                            <option value="{{$estado->id}}">{{$estado->estado}}</option>
                                        @endif
                                    @endforeach

                                </select>

                    </td>
                    <td>
                        <a href="/proyectousuario/{{$puti->id}}">Ver</a>
                    </td>
                @endforeach
              </tbody>
</table>

@endsection
