@extends('layouts.app')

@section('content')

<div class="row col-md-8">
    <table class="table table-bordered tablitashow"  >
        <thead>
        <tr>
            <th>Id</th>
            <th>Nombre Proyecto</th>
            <th>Sector enfocado</th>
            <th>Linea Tecnológica</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <td><input type="text" name="id" value="{{$query->id}}" readonly></td>
            <td><input type="text" name="nombrep" value="{{$query->nombrep}}" readonly></td>
            <td><input type="text" name="sectorenfocado" value="{{$query->sectorenfocado}}" readonly></td>
            <td>
                <ul>
                    @foreach($lineas_proyecto as $key => $linea)
                        <?php $lineas = DB::table("lineas")->where("id", $linea->lineas_id)->get(); ?>
                            @foreach($lineas as $key => $linea)
                            <li>{{ $linea->linea }}</li>
                            @endforeach
                    @endforeach
                </ul>
            </td>
        </tr>
        <tr>
            <th>Estado</th>
            <th>Usuario</th>
            <th colspan="2">Imagen</th>
        </tr>
        <tr>

            <td>
                @if(Auth::user()->tiporol == 'usuario')
                    <?php $estados = DB::table("estadosdeproyectos")->get(); ?>
                    <?php $actualizarestados = DB::table("proyectos")->where("estadosdeproyectos_id", $query->estadosdeproyectos_id)->get(); ?>
                    @foreach($estados as $estado)
                        @if($estado->id == $query->estadosdeproyectos_id)
                            <option value="{{$estado->id}}" selected>{{$estado->estado}}</option>
                        @endif
                    @endforeach
                @endif
                <?php $estados = DB::table("estadosdeproyectos")->where('id', '<>', '1')->get(); ?>
                <form class="form-inline">
                    <select class="estadoProyecto" name="" data-proyecto="{{ $query->id }}">
                        @foreach($estados as $estado)
                            @if($estado->id == $query->estadosdeproyectos_id)
                                <option value="{{$estado->id}}" selected>{{$estado->estado}}</option>
                            @else
                                <option value="{{$estado->id}}">{{$estado->estado}}</option>
                            @endif
                        @endforeach
                    </select>
                </form>
            </td>
            <td>{{$query->user->nameu}}</td>
            <td colspan="2"><img src="/{{$query->imagen}}" width="100" class="img-thumbnail"></td>
        </tr>
        </tbody>
    </table>
</div>
<div class="col col-md-3 col-md-offset-1 usuis">
    @if(Auth::user()->tiporol == 'gestor')
    <strong class="titulousu">Usuarios Inscritos</strong>
        <div class="usuarioscontent">
            @foreach($usuarios as $usu)
                <div class="contenusuarios">
                    <li class="nusu">{{$usu->nameu}}</li>
                    <li class="EstadoU">
                        <?php $estadosprouser = DB::table("estadosproyectosusers")->get(); ?>
                        <select class=" estadoProyectoUsuario usuis" data-idprouser='<?php echo DB::table("proyectosusers")->where("proyectos_id", $query->id)->where("users_id", $usu->id)->value("id"); ?>'>
                            @foreach($estadosprouser as $estado)
                                <?php $tabla = DB::table("proyectosusers")->where("proyectos_id", $query->id)->where("users_id", $usu->id)->value("estadosproyectosusers_id"); ?>
                                @if($estado->id == $tabla)
                                    <option value="{{$estado->id}}" selected>{{$estado->estado}}</option>
                                @else
                                    <option value="{{$estado->id}}">{{$estado->estado}}</option>
                                @endif
                            @endforeach
                        </select>
                    </li>
                </div>
            @endforeach
        </div>
    @endif
        @if(Auth::user()->tiporol == 'usuario')
            <strong class="titulousu">Usuarios Inscritos</strong>
                <div class="usuarioscontent">

                </div>
        @endif
</div>

    <div>
        <table  class="table table-bordered tablitashow">
            <thead>
                <tr>
                    <th>Descripcion</th>
                    <th>Resumen</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="cajascontent">
                            {{$query->descripcion}}
                        </div>
                    </td>
                    <td>
                        <div class="cajascontent">
                            {{$query->resumen}}
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="bloquisito usucliente">

    @if(Auth::user()->tiporol == 'usuario')
        <div class="cajascontent usuariosInscritos">
            @foreach($usuarios2 as $usu)
                <li>{{$usu->nameu}}</li>
                <?php $estadosprouser = DB::table("estadosproyectosusers")->get(); ?>
            @endforeach
        </div>
    </div>
    @endif
<table class="table table-bordered tablitashow">
    <thead>
    <tr>
            <th style="text-align: center;">Comentarios</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td> <div class="comentarios">
                    <?php foreach ($comentariop as $key => $comentario): ?>
                    <?php $comentarios = DB::table("comentarios")->where("id", $comentario->id)->get(); ?>
                    <?php foreach ($comentarios as $key => $comentario): ?>
                    <li class="nombre">
                        <?php echo DB::table("users")->where("id", $comentario->usuario_id)->value("nameu"); echo ":" ?>
                        {{ $comentario->comentario }}
                    </li>
                    <?php endforeach ?>
                    <?php endforeach ?>
                </div>
            </td>
        </tr>
    </tbody>
</table>
    <form action="{{ url('/comentario/'.$query->id)}}" method="POST">
        {{ csrf_field() }}
        <textarea id="comentario"  type="text" class="form-control" placeholder="Escriba el comentario deseado" rows="2" name="comentario" value="{{ old('comentario') }}"  maxlength="255" required="required"></textarea>
        <button type="submit" class="btn btn-success btnEnviar" name="enviar" >
            Enviar
         </button>
    </form>


    <!-- Modal para agregar un resumen cuando el proyecto pasa a estado Reclutando o En desarrollo  en vista Detalles-->
    <form action="{{url('resumenPD')}}" method="POST">
        {{ csrf_field() }}
        <div class="modal fade modalResumenDetalle" id="modalResumenDetalle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Editar Resumen</h4>
                    </div>
                    <div class="modal-body">
                        <textarea class="form-control" rows="5" name="texto" id="texto"></textarea>
                        <input type="hidden" name="idEstado" id="idEstado">
                        <input type="hidden" name="idProyecto" id="idProyecto">
                    </div>
                    <div class="modal-footer" >
                        <button type="submit" class="btn btn-secondary" data-dismiss="modalResumenDetalle">Cancelar</button>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>



@endsection