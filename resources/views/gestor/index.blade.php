@extends('layouts.app')

@section('content')


<!--Funcion modicar fecha para mostrarse por dia, mes y año-->
<?php function fechalatina($fecha)
    {
    $nfecha=date('d/m/y',strtotime($fecha));
    return $nfecha;
    }
?>

    <article>

        @if(Auth::user()->tiporol == 'gestor')
            <div class="page-header">
                <h2 class="text-center text-muted">Banco De Proyectos Gestor</h2>
            </div>
        @endif

        @if(Auth::user()->tiporol == 'usuario')
            <div class="page-header">
                <h2 class="text-center text-muted">Banco De Proyectos Usuario</h2>
            </div>
        @endif

        <br><br>

        <form class="form-inline col-md-4" action="{{url('searchN')}}" method="POST">
            {{ csrf_field() }}
            <input type="text" class="form-control" placeholder="Nombre del proyecto" name="nombrep">
            <button type="submit" class="btn btn-success btn-just-icon btn-xs" data-toggle="tooltip" data-placement="top" title="Filtrar por Nombre"><i class="glyphicon glyphicon-search"></i></button>
        </form>

        <form class="form-inline col-md-5" action="{{url('searchD')}}" method="POST">
            {{ csrf_field() }}
            <input type="date" class="form-control" id="bd-desde" name="bd-desde" required="required">
            <input type="date" class="form-control" id="bd-hasta" name="bd-hasta" required="required">
            <button type="submit" class="btn btn-success btn-just-icon btn-xs" data-toggle="tooltip" data-placement="top" title="Filtrar por Fecha"><i class="glyphicon glyphicon-calendar"></i></button>
        </form>

        <?php $estados = DB::table("estadosdeproyectos")->where('id', '<>', '1')->get(); ?>
        <form class="form-inline col-md-3" >
            <select class="form-control filtroEstado" data-toggle="tooltip" data-placement="top" title="Filtrar por Estado">
                <option value="">{{ "Seleccione Estado..." }}</option>
                    @foreach($estados as $estado)
                        <option value="{{$estado->id}}">{{$estado->estado}}</option>
                    @endforeach
            </select>
        </form>
        <br><br>

        <?php $lineas = DB::table("lineas")->get(); ?>
        <form class="form-inline col-md-6" >
            @foreach($lineas as $key => $linea)
                <input id="filtroLinea{{ $linea->id }}" class="filtroLinea" type="checkbox" name="lineas[]" value="{{ $linea->id }}">
                <label for="filtroLinea{{ $linea->id }}">{{ $linea->linea }}</label><br>
            @endforeach
        </form>
        {{--<form class="form-inline" >--}}
        {{--@if(Auth::user()->tiporol == 'usuario')--}}
            {{--<div class=" btn-group" data-toggle="buttons">--}}
                {{--<h4>Mis proyectos</h4>--}}
                {{--<label class="btn btn-info">--}}
                    {{--<input type="radio" name="options" id="opcion1">Proyectos Asociados--}}
                {{--</label>--}}
                {{--<label class="btn btn-primary">--}}
                    {{--<input type="radio" name="options" id="opcion2">Todos los proyectos--}}
                {{--</label>--}}
            {{--</div>--}}
        {{--@endif--}}
        {{--</form>--}}
    </article>

    <table class="table" style="text-align: center">
        <thead>
            <tr class="">
                <th>Id</th>
                <th>Fecha</th>
                <th>Nombre Proyecto</th>
                <th>Sector enfocado</th>
                <th>Linea(s) Tecnológica(s)</th>
                <th>Estado</th>
                <th>Usuario</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
        @if(count($query)>0)
            @foreach($query as $row)
                <?php $estadoproyecto = DB::table("proyectosusers")->where("proyectos_id", $row->id)->where("users_id", Auth::user()->id)->value("estadosproyectosusers_id"); ?>
                <tr class="letra @if($estadoproyecto == 1) success @elseif($estadoproyecto == 3) danger @endif">
                    <td>{{$row->id}}</td>
                    <td>{{fechalatina($row->created_at)}}</td>
                    <td>{{$row->nombrep}}</td>
                    <td>{{$row->sectorenfocado}}</td>
                    <?php $lineasproyectos = DB::table("lineasproyectos")->where("proyectos_id", $row->id)->get(); ?>
                    <td style="text-align: justify">
                        <ul>
                       @if(count($lineasproyectos) > 0)
                           @foreach($lineasproyectos as $lineaproyecto)
                                <?php $lineas = DB::table("lineas")->where("id", $lineaproyecto->lineas_id)->get(); ?>
                                    @foreach($lineas as $linea)
                                        <li class="lineasproyectosindex"><?php echo $linea->linea; ?></li>
                                    @endforeach
                           @endforeach
                       @endif
                        </ul>
                    </td>
                    <td>
                        @if(Auth::user()->tiporol == 'gestor')
                            <?php $estados = DB::table("estadosdeproyectos")->where('id', '<>', '1')->get(); ?>
                                <form class="form-inline">
                                    <select class="form-control estadoProyecto" name="" data-proyecto="{{ $row->id }}">
                                        @foreach($estados as $estado)
                                            @if($estado->id == $row->estadosdeproyectos_id)
                                                <option value="{{$estado->id}}" selected>{{$estado->estado}}</option>
                                                @else
                                                <option value="{{$estado->id}}">{{$estado->estado}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </form>
                        @endif
                        @if(Auth::user()->tiporol == 'usuario')
                            <?php $estados = DB::table("estadosdeproyectos")->get(); ?>
                                @foreach($estados as $estado)
                                    @if($estado->id == $row->estadosdeproyectos_id)
                                        <option value="{{$estado->id}}" selected>{{$estado->estado}}</option>
                                    @endif
                                @endforeach
                        @endif
                    </td>
                    <td>
                        <?php $usuario = DB::table('users')->where('id', "=", $row->usuario_id)->get();?>
                        @foreach($usuario as $usu)
                            {{$usu->nameu}}
                        @endforeach
                    </td>
                    <td>
                        @if(Auth::user()->tiporol == 'gestor')
                        <a href="show/{{$row->id}}" type="button" class="btn btn-info btn-just-icon btn-xs" data-toggle="tooltip" data-placement="top" title="Detalles"><i class="glyphicon glyphicon-list-alt"></i></a>
                        <a href="javascript:;" data-eliminar="{{$row->id}}" class="btn btn-danger btn-delete btn-just-icon btn-xs" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="glyphicon glyphicon-trash"></i></a>
                        @endif

                        @if(Auth::user()->tiporol == 'usuario')
                            <a href="show/{{$row->id}}" type="button" class="btn btn-info btn-just-icon btn-xs" data-toggle="tooltip" data-placement="top" title="Detalles"><i class="glyphicon glyphicon-list-alt"></i></a>
                            @if(count($estadoproyecto) > 0)
                                @if($estadoproyecto == 2)
                                        <a href="javascript:;" type="button" class="btn btn-warning btn-just-icon btn-xs" data-toggle="tooltip" data-placement="top" disabled="disabled" title="Pendiente Aprobacion"><i class="material-icons">access_time</i></a>
                                    @elseif($estadoproyecto == 3)
                                        <a data-rechazado="{{$row->id}}" href="javascript:;" type="button" class="btn btn-danger btn-just-icon btn-xs btn-ocultar" data-toggle="tooltip" data-placement="top" title="No ha sido aceptado, Clic para eliminar la inscripción al proyecto"><i class="material-icons">not_interested</i></a>
                                    @elseif($estadoproyecto == 1)
                                       <button type="button" class="btn btn-success  btn-just-icon btn-xs" data-toggle="popover" data-placement="top" title="Reclutado!" data-content="Felicidades! ha sido aceptado, pronto, un gestor le contactará"><i class="material-icons">check</i></button>
                                @endif
                           @else
                                @if($row->estadosdeproyectos_id != 2)
                                <a href="inscribir/{{$row->id}}" type="button" class="btn btn-primary btn-just-icon btn-xs" data-toggle="tooltip" data-placement="top" title="Inscribirse"><i class="glyphicon glyphicon-edit"></i></a>
                                @endif
                            @endif
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!!$query->render()!!}

{{--<script>--}}
    {{--$(document).ready(function(){--}}
        {{--$('.btn-inscribir').click(function ()--}}
        {{--{--}}
        {{--swal({--}}
            {{--title: "Inscrito",--}}
            {{--text: "Se ha inscrito correctamente, pronto un administrador aprobará su solicitud",--}}
            {{--type: "warning",--}}
            {{--confirmButtonClass: "btn-warning",--}}
            {{--confirmButtonText: "Aceptar"});--}}
        {{--})--}}
    {{--})--}}
{{--</script>--}}



<!-- Modal para agregar un resumen cuando el proyecto pasa a estado Reclutando o En desarrollo  -->
<form action="{{url('resumenP')}}" method="POST">
    {{ csrf_field() }}
    <div class="modal fade modalResume" id="modalResume" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    <button type="submit" class="btn btn-secondary" data-dismiss="modalResume">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>


<!-- Modal para eliminar proyecto  -->
<form action="{{url('eliminarP')}}" method="POST">
    {{ csrf_field() }}
    <div class="modal fade modalEliminar" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Agregue una breve descripcion para eliminar el proyecto</h4>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">La notificacion será enviada a:</label>
                            <?php $usuario = DB::table('users')->where('id', "=", $row->usuario_id)->get();?>
                            @foreach($usuario as $usu)
                                <p class="form-control-static">{{$usu->nameu}}: {{$usu->email}}</p>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Descripcion</label>
                                <textarea class="form-control" rows="5" name="textoEliminar" id="textoEliminar" ></textarea>
                            <input type="hidden" name="idEliminar" id="idEliminar">
                            <input type="hidden" name="idPro" id="idPro">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" data-dismiss="modalEliminar">Cancelar</button>
                    <button type="submit"  class="btn btn-success">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
</form>


@else
    {{--Sweet alert para mostrar que: No se encuentran proyectos relacionados a la búsqueda--}}
    <script>
        $(document).ready(function()
        {
            swal({
            title: "",
            text: "No se encuentran proyectos relacionados con su búsqueda",
            type: "error",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Aceptar"});

            $('[data-toggle="popover"]').popover();

        })
    </script>
@endif


@endsection
