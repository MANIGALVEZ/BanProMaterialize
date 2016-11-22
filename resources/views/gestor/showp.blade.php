@extends('layouts.app')

@section('content')

<form id="formPro" action="{{url('editS/'.$query->id)}}" method="POST">
{{ csrf_field() }}

<div class="row col-md-12">
    <div class="infoinicial">
        <article>
            <label>Nombre Proyecto:</label>
                <input class="quitarborde" type="text" name="nombrep" value="{{$query->nombrep}}" readonly>
        </article>

        <article>
            <label>Sector Enfocado: </label>
                <input class="quitarborde" type="text" name="sectorenfocado" value="{{$query->sectorenfocado}}" readonly>
        </article>

        <article>
            <label>Creado por: </label>
                <p>{{$query->user->nameu}}</p>
        </article>

        <article>
            <button type="button" class="btn btn-primary btn-just-icon btn-xs editinput" data-toggle="tooltip" data-placement="top" title="Editar"><i class="material-icons">edit</i></button>
            <button type="submit" class="btn btn-success btn-just-icon btn-xs updateinput" data-toggle="tooltip" data-placement="top" title="Guardar"><i class="material-icons">save</i></button>
        </article>
    </div>
    <div>
        <table  class="table table-bordered tablitashow">
            <thead>
            <tr>
                <th>Descripcion</th>
                <th>Resumen</th>
                @if(Auth::user()->tiporol == 'usuario')
                    <th>Opciones</th>
                @endif
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <div class="cajascontent">

                        {{--</textarea>--}}
                        <textarea  class="infotablainicial" id="" cols="77" rows="10" readonly>{{$query->descripcion}}</textarea>
                    </div>
                </td>
                <td>
                    <div class="cajascontent">
                       <!-- <input class="quitarborde" type="text" name="resumen" value="" readonly>-->
                        {{--</textarea>--}}
                        <textarea class="infotablainicial" id="" cols="77" rows="10" readonly>{{$query->resumen}}</textarea>

                    </div>
                @if(Auth::user()->tiporol == 'usuario')
                <td>
                        <?php $estadoproyecto = DB::table("proyectosusers")->where("proyectos_id", $query->id)->where("users_id", Auth::user()->id)->value("estadosproyectosusers_id"); ?>
                        @if(count($estadoproyecto) > 0)
                            @if($estadoproyecto == 2)
                                <a href="javascript:;" type="button" class="btn btn-warning btn-just-icon btn-xs" data-toggle="tooltip" data-placement="top" disabled="disabled" title="Pendiente Aprobacion"><i class="material-icons">access_time</i></a>
                            @elseif($estadoproyecto == 3)
                                <a href="javascript:;" type="button" class="btn btn-danger btn-just-icon btn-xs" data-toggle="tooltip" data-placement="top" title="Rechazado"><i class="material-icons">not_interested</i></a>
                            @elseif($estadoproyecto == 1)
                                <button type="button" class="btn btn-success  btn-just-icon btn-xs" data-toggle="popover" data-placement="top" title="Reclutado!" data-content="Felicidades! ha sido aceptado, pronto, un gestor le contactará"><i class="material-icons">check</i></button>
                            @endif
                        @else
                            <a href="../vincularce/{{$query->id}}" type="button" class="btn btn-primary btn-just-icon btn-xs" data-toggle="tooltip" data-placement="top" title="Inscribirse"><i class="glyphicon glyphicon-edit"></i></a>
                        @endif
                </td>
                @endif

            </tr>
            </tbody>
        </table>
    </div>
    <table class="table table-bordered tablitashow"  >
        <thead>
        <tr>
            {{--<th>Id</th>--}}
            <th>Linea Tecnológica</th>
            <th>Usuarios Inscritos</th>
            <th>Estado de Proyecto</th>
        </tr>
        </thead>
        <tbody>
        <tr>

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
            <td>
                <div>
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
                            @foreach($usuarios2 as $usu)
                                <li>{{$usu->nameu}}</li>
                                <?php $estadosprouser = DB::table("estadosproyectosusers")->get(); ?>
                            @endforeach
                        </div>
                    @endif
                </div>
            </td>
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
                    <select class="estadoProyectoDetalle" name="" data-proyecto="{{ $query->id }}">
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
        </tbody>
    </table>
        <div style="padding:0; height: 268px;" class=" row col-md-4 col-sm-offset-1">
            <img src="/{{$query->imagen}}" class="img-thumbnail imgS" style=" height: 250px;">
        </div>

        <div class="row col-md-4 col-md-offset-1">
            <center><h6>Seleccione una imagen</h6></center>
            <input  type="file" class="file" name="image" multiple data-show-upload="false" data-show-caption="true" data-allowed-file-extensions='["jpg", "png"]'>
        </div>
    <div class="row col-md-12">
<table class="table table-bordered tablitashow">
    <thead>
    <tr>
            <th style="text-align: center;">Comentarios</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td> <div class="comentarios">
                    @foreach ($comentariop as $key => $comentario)
                        <?php $comentarios = DB::table("comentarios")->where("id", $comentario->id)->get(); ?>
                            @foreach ($comentarios as $key => $comentario)
                            <li class="nombre">
                                <?php echo DB::table("users")->where("id", $comentario->usuario_id)->value("nameu"); echo ":" ?>
                                {{ $comentario->comentario }}
                            </li>
                            @endforeach
                    @endforeach
                </div>
            </td>
        </tr>
    </tbody>
</table>
    </div>
<div class="row col-md-12">

    <form action="{{ url('/comentario/'.$query->id)}}" method="POST">
        {{ csrf_field() }}
        <textarea id="comentario"  type="text" class="form-control" placeholder="Escriba el comentario deseado" rows="2" name="comentario" value="{{ old('comentario') }}"  maxlength="255" required="required"></textarea>
        <button type="submit" class="btn btn-success btnEnviar" name="enviar" >
            Enviar
         </button>
    </form>
</div>

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

</div>
</form>

@endsection