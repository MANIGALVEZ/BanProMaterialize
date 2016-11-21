

<!--Funcion modicar fecha para mostrarse por dia, mes y a�o-->
<?php function fechalatina($fecha)
    {
    $nfecha=date('d/m/y',strtotime($fecha));
    return $nfecha;
    }
?>


@if(count($query)>0)
    @foreach($query as $row)
        <?php $estadoproyecto = DB::table("proyectosusers")->where("proyectos_id", $row->id)->where("users_id", Auth::user()->id)->value("estadosproyectosusers_id"); ?>
        @if($row->estadosdeproyectos_id != 1)
            <tr class="letra @if($estadoproyecto == 1) success @elseif($estadoproyecto == 3) danger @endif">
                <td>{{$row->id}}</td>
                <td>{{fechalatina($row->created_at)}}</td>
                <td>{{$row->nombrep}}</td>
                <td>{{$row->sectorenfocado}}</td>
                <?php $lineasproyectos = DB::table("lineasproyectos")->where("proyectos_id", $row->id)->get(); ?>
                <td>
                    <ul>
                        <?php if (count($lineasproyectos) > 0): ?>
                        @foreach($lineasproyectos as $lineaproyecto)
                            <?php $lineas = DB::table("lineas")->where("id", $lineaproyecto->lineas_id)->get(); ?>
                            @foreach($lineas as $linea)
                                <li><?php echo $linea->linea; ?></li>
                            @endforeach
                        @endforeach
                        <?php endif ?>
                    </ul>
                </td>
                <td>
                    @if(Auth::user()->tiporol == 'gestor')
                        <?php $estados = DB::table("estadosdeproyectos")->where('id', '<>', '1')->get(); ?>
                        <select class="form-control estadoProyecto" name="" data-proyecto="{{ $row->id }}">
                            @foreach($estados as $estado)
                                @if($estado->id == $row->estadosdeproyectos_id)
                                    <option value="{{$estado->id}}" selected>{{$estado->estado}}</option>
                                @else
                                    <option value="{{$estado->id}}">{{$estado->estado}}</option>
                                @endif
                            @endforeach
                        </select>
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
                                <a href="javascript:;" type="button" class="btn btn-danger btn-just-icon btn-xs" data-toggle="tooltip" data-placement="top" title="Rechazado"><i class="material-icons">not_interested</i></a>

                            @elseif($estadoproyecto == 1)
                                <a href="javascript:;" type="button" class="btn btn-success btn-just-icon btn-xs" data-toggle="tooltip" data-placement="top" title="Reclutado"><i class="material-icons">done</i></a>
                            @endif

                        @else
                            <a href="inscribir/{{$row->id}}" type="button" class="btn btn-primary btn-just-icon btn-xs" data-toggle="tooltip" data-placement="top" title="Inscribirse"><i class="glyphicon glyphicon-edit"></i></a>
                        @endif
                    @endif
                </td>
            </tr>
        @endif
    @endforeach


<!-- Modal para agregar un resumen cuando el proyecto pasa a estado Reclutando o En desarrollo  -->
    <form action="{{url('resumenP')}}" method="POST">
        {{ csrf_field() }}
        <div class="modal fade modalResume" id="modalResume" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">A�adir Resumen</h4>
                    </div>
                    <div class="modal-body">
                    <textarea class="form-control" rows="5" name="texto" id="texto"></textarea>
                        <input type="hidden" name="idEstado" id="idEstado">
                        <input type="hidden" name="idProyecto" id="idProyecto">
                    </div>
                    <div class="modal-footer" >
                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
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
                            <label for="recipient-name" class="control-label">La notificacion ser� enviada a:</label>
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
    <script>
        $(document).ready(function()
        {
            swal({
            title: "Filtrar Por Estado",
            text: "No se encuentran proyectos en el estado seleccionado",
            type: "error",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Aceptar"});
        })
    </script>
@endif

{{--funcion ajax para cambiar de estado en tiempo real y auto actualizarse--}}
<script>
    $(document).ready(function() {
        $(".estadoProyecto").change(function ()
        {
            $idEstado = $(this).val()
            $idProyecto = $(this).attr("data-proyecto")

            if ($idEstado == 3 || $idEstado == 4)
            {

                $(".modalResume").modal("show")
                $('#idEstado').val($idEstado)
                $('#idProyecto').val($idProyecto)

                $.get('consultaP/'+$idProyecto, {idp: $idProyecto}, function(data)
                {
                    $('#texto').val(data)
                })
            }
            else
            {
                $.get("estadoProyecto", {ide: $idEstado, idp: $idProyecto})
            }

        })
    })
</script>

{{--funcion ajax para eliminar un proyecto, pasar a estado en banco(El gestor por medio del aplicativo podr� eliminar un proyecto y de manera autom�tica env�a una notificaci�n al usuario informando el fin del proceso y su motivo)--}}
<script>
    $(document).ready(function() {
        $('.btn-delete').click(function ()
        {
            $idEliminar = "1"
            $idPro = $(this).attr("data-eliminar")

            $(".modalEliminar").modal("show")
            $('#idEliminar').val($idEliminar)
            $('#idPro').val($idPro)

            $.get('consultaP/'+$idPro, {idp: $idPro}, function(data)
            {

                $('#textoEliminar').val(data)

            })
        })
    })
</script>
