


<!--Funcion modicar fecha para mostrarse por dia, mes y año-->
<?php function fechalatina($fecha)
    {
    $nfecha=date('d/m/y',strtotime($fecha));
    return $nfecha;
    }
?>

    @foreach($query as $row)
        <tr>
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
                    <a href="show/{{$row->id}}" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Detalles"><i class="glyphicon glyphicon-list-alt"></i></a>
                    <a href="javascript:;" data-eliminar="{{$row->id}}" class="btn btn-danger btn-delete" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="glyphicon glyphicon-trash"></i></a>
                @endif

                @if(Auth::user()->tiporol == 'usuario' && Auth::user()->id)
                    <?php $ipr_status=false ?>
                    <a href="show/{{$row->id}}" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Detalles"><i class="glyphicon glyphicon-list-alt"></i></a>
                    @foreach($iprs as $ipr)
                        @if($ipr->proyectos_id == $row->id)
                            <a href="javascript:;" type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" disabled="disabled" title="Pendiente Aprobacion"><i class="glyphicon glyphicon-time"></i></a>
                            <?php $ipr_status=true ?>
                        @endif
                    @endforeach
                    @if($ipr_status==false)
                        <a href="inscribir/{{$row->id}}" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Inscribirse"><i class="glyphicon glyphicon-edit"></i></a>
                        <?php $ipr_status=false ?>
                    @endif
                @endif
            </td>
        </tr>
    @endforeach


<!-- Modal para agregar un resumen cuando el proyecto pasa a estado Reclutando o En desarrollo  -->
<form action="{{url('resumenP')}}" method="POST">
    {{ csrf_field() }}
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Añadir Resumen</h4>
                </div>
                <div class="modal-body">
                <textarea class="form-control" rows="5" name="texto" id="texto"></textarea>
                    <input type="hidden" name="idEstado" id="idEstado">
                    <input type="hidden" name="idProyecto" id="idProyecto">
                </div>
                <div class="modal-footer" >
                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
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
                    <button type="submit"  class="btn btn-primary">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
</form>



{{--funcion ajax para cambiar de estado en tiempo real y auto actualizarse--}}
<script>
    $(document).ready(function() {
        $(".estadoProyecto").change(function ()
        {
            $idEstado = $(this).val()
            $idProyecto = $(this).attr("data-proyecto")

            if ($idEstado == 3 || $idEstado == 4)
            {

                $(".modalresumen").modal("show")
                $('#idEstado').val($idEstado)
                $('#idProyecto').val($idProyecto)

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
                window.location.replace("")
            }

        })
    })
</script>

{{--funcion ajax para eliminar un proyecto, pasar a estado en banco(El gestor por medio del aplicativo podrá eliminar un proyecto y de manera automática envía una notificación al usuario informando el fin del proceso y su motivo)--}}
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
