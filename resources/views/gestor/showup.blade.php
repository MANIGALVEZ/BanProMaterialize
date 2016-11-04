@extends('layouts.app')
@section('content')

    <table class="table table-bordered"  >
        <thead>
        <th>Id</th>
        <th>Nombre Proyecto</th>
        <th>Sector enfocado</th>
        <th>Linea Tecnológica</th>
        <th>Estado</th>
        <th>Usuario</th>
        </thead>

        <tbody>
        <td>{{$query->id}}</td>
        <td>{{$query->nombrep}}</td>
        <td>{{$query->sectorenfocado}}</td>
        <td>
            <ul>
                <?php foreach ($lineas_proyecto as $key => $linea): ?>
                <?php $lineas = DB::table("lineas")->where("id", $linea->lineas_id)->get(); ?>
                <?php foreach ($lineas as $key => $linea): ?>
                <li>{{ $linea->linea }}</li>
                <?php endforeach ?>
                <?php endforeach ?>
            </ul>
        </td>
        <td>
            <?php $estados = DB::table("estadosdeproyectos")->get(); ?>
            <?php $actualizarestados = DB::table("proyectos")->where("estadosdeproyectos_id", $query->estadosdeproyectos_id)->get(); ?>
            @foreach($estados as $estado)
                @if($estado->id == $query->estadosdeproyectos_id)
                    <option value="{{$estado->id}}" selected>{{$estado->estado}}</option>
                @endif
            @endforeach
        </td>
        <td>{{$query->user->nameu}}</td>
        </tbody>

    </table>
    <label>Descripcion</label>
    <div style="box-shadow: 2px 2px 2px grey; width:900px; height:100px;">
        <p >{{$query->descripcion}}</p>
    </div>

    <label>Resumen</label>
    <div style="box-shadow: 2px 2px 2px grey; width:900px; height:100px;">
        <p ></p>
    </div>
    <label>Comentarios</label>
    <div id="texdescrip">

        <?php foreach ($comentariop as $key => $comentario): ?>
        <?php $comentarios = DB::table("comentarios")->where("id", $comentario->id)->get(); ?>
        <?php foreach ($comentarios as $key => $comentario): ?>
        <li style="style:none;">
            <?php echo DB::table("users")->where("id", $comentario->usuario_id)->value("nameu"); echo ":" ?>
            {{ $comentario->comentario }}
        </li>
        <?php endforeach ?>
        <?php endforeach ?>

    </div>
@endsection