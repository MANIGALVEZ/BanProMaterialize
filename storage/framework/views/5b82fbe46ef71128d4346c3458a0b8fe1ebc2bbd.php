<?php $__env->startSection('content'); ?>


<!--Funcion modicar fecha para mostrarse por dia, mes y año-->
<?php function fechalatina($fecha)
{
    $nfecha=date('d/m/y',strtotime($fecha));
    return $nfecha;
}
?>

<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<body>
    <div class="image-container set-full-height" style="background-image: url('img/madera.jpg')">
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 margencien" >
                        <div class="fresh-table">
                            <!--    Available colors for the full background: full-color-blue, full-color-azure, full-color-green, full-color-red, full-color-orange
                                    Available colors only for the toolbar: toolbar-color-blue, toolbar-color-azure, toolbar-color-green, toolbar-color-red, toolbar-color-orange
                            -->

                            <div class="toolbar">
                                <a type="button" class="btn btn-success btn-actualizar" data-toggle="tooltip" data-placement="top" title="Actualizar"><i class="material-icons">autorenew</i></a>
                                <h3 class="wizard-title centrar">Proyectos</h3>

                                
                                
                                    
                                    
                                

                                <?php $lineas = DB::table("lineas")->get(); ?>
                                <form class="form-inline col-md-4" >
                                    <?php $__currentLoopData = $lineas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $linea): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <input id="filtroLinea<?php echo e($linea->id); ?>" class="filtroLinea" type="checkbox" name="lineas[]" value="<?php echo e($linea->id); ?>">
                                        <label for="filtroLinea<?php echo e($linea->id); ?>" data-toggle="tooltip" data-placement="top" title="Filtrar por Linea"><?php echo e($linea->linea); ?></label><br>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </form>

                                <form class="form-inline col-md-7" action="<?php echo e(url('searchD')); ?>" method="POST">
                                <?php echo e(csrf_field()); ?>

                                    <input type="date" class="form-control" id="bd-desde" name="bd-desde" required="required">
                                    <input type="date" class="form-control" id="bd-hasta" name="bd-hasta" required="required">
                                    <button type="submit" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Filtrar por Fecha"><i class="glyphicon glyphicon-calendar"></i></button>
                                </form>

                                <?php $estados = DB::table("estadosdeproyectos")->where('id', '<>', '1')->get(); ?>
                                <form class="form-inline col-md-1">
                                    <select class="form-control filtroEstado" data-toggle="tooltip" data-placement="top" title="Filtrar por Estado">
                                        <option value=""><?php echo e("Seleccione Estado..."); ?></option>
                                            <?php $__currentLoopData = $estados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estado): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <option value="<?php echo e($estado->id); ?>"><?php echo e($estado->estado); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                                </form>
                            </div>

                            <table id="fresh-table" class="table" >
                                <thead>
                                
                                <th data-field="created_at" data-sortable="true">Fecha</th>
                                <th data-field="nombrep" data-sortable="true">Proyecto</th>
                                <th data-field="sectorenfocado" data-sortable="true">Sector</th>
                                <th data-field="linea" data-sortable="true">Linea(s) Tecnológica(s)</th>
                                <th data-field="estadosdeproyectos_id" data-sortable="true">Estado</th>
                                <th data-field="usuario_id" data-sortable="true">Usuario</th>
                                <th data-field="">Opciones</th>
                                </thead>
                                <tbody>
                                <?php if(count($query)>0): ?>
                                    <?php $__currentLoopData = $query; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <?php $estadoproyecto = DB::table("proyectosusers")->where("proyectos_id", $row->id)->where("users_id", Auth::user()->id)->value("estadosproyectosusers_id"); ?>
                                        <?php $proyeusu = DB::table("proyectosusers")->where("proyectos_id", $row->id)->where("users_id", Auth::user()->id)->value("id"); ?>
                                        <tr class="letra <?php if($estadoproyecto == 1): ?> success <?php elseif($estadoproyecto == 3): ?> danger <?php endif; ?>">
                                            
                                            <td class="centrar"><?php echo e(fechalatina($row->created_at)); ?></td>
                                            <td class="centrar"><?php echo e($row->nombrep); ?></td>
                                            <td class="centrar"><?php echo e($row->sectorenfocado); ?></td>
                                            <?php $lineasproyectos = DB::table("lineasproyectos")->where("proyectos_id", $row->id)->get(); ?>
                                            <td style="text-align: justify">
                                                <ul>
                                                    <?php if(count($lineasproyectos) > 0): ?>
                                                        <?php $__currentLoopData = $lineasproyectos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lineaproyecto): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                            <?php $lineas = DB::table("lineas")->where("id", $lineaproyecto->lineas_id)->get(); ?>
                                                            <?php $__currentLoopData = $lineas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $linea): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                <li class="lineasproyectosindex"><?php echo $linea->linea; ?></li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                    <?php endif; ?>
                                                </ul>
                                            </td>
                                            <td class="centrar">
                                                <?php if(Auth::user()->tiporol == 'gestor'): ?>
                                                    <?php $estados = DB::table("estadosdeproyectos")->where('id', '<>', '1')->get(); ?>
                                                    <form class="form-inline">
                                                        <select class="form-control estadoProyecto" name="" data-proyecto="<?php echo e($row->id); ?>">
                                                            <?php $__currentLoopData = $estados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estado): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                <?php if($estado->id == $row->estadosdeproyectos_id): ?>
                                                                    <option value="<?php echo e($estado->id); ?>" selected><?php echo e($estado->estado); ?></option>
                                                                <?php else: ?>
                                                                    <option value="<?php echo e($estado->id); ?>"><?php echo e($estado->estado); ?></option>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                        </select>
                                                    </form>
                                                <?php endif; ?>
                                                <?php if(Auth::user()->tiporol == 'usuario'): ?>
                                                    <?php $estados = DB::table("estadosdeproyectos")->get(); ?>
                                                    <?php $__currentLoopData = $estados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estado): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                        <?php if($estado->id == $row->estadosdeproyectos_id): ?>
                                                            <option value="<?php echo e($estado->id); ?>" selected><?php echo e($estado->estado); ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                <?php endif; ?>
                                            </td>
                                            <td class="centrar">
                                                <?php $usuario = DB::table('users')->where('id', "=", $row->usuario_id)->get();?>
                                                <?php $__currentLoopData = $usuario; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usu): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <?php echo e($usu->nameu); ?>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </td>
                                            <td class="centrar">
                                                <?php if(Auth::user()->tiporol == 'gestor'): ?>
                                                    <a href="show/<?php echo e($row->id); ?>" type="button" class="btn btn-info btn-simple btn-just-icon btn-xs" data-toggle="tooltip" data-placement="top" title="Detalles"><i class="material-icons">event_note</i></a>
                                                    <a href="javascript:;" data-eliminar="<?php echo e($row->id); ?>" class="btn-eliminar btn btn-danger btn-simple btn-just-icon btn-xs" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="material-icons">delete</i></a>
                                                <?php endif; ?>

                                                <?php if(Auth::user()->tiporol == 'usuario'): ?>
                                                    <a href="show/<?php echo e($row->id); ?>" type="button" class="btn btn-info btn-simple btn-just-icon btn-xs" data-toggle="tooltip" data-placement="top" title="Detalles"><i class="material-icons">event_note</i></a>
                                                    <?php if(count($estadoproyecto) > 0): ?>
                                                        <?php if($estadoproyecto == 2): ?>
                                                            <a href="javascript:;" type="button" class="btn btn-warning btn-simple btn-just-icon btn-xs" data-toggle="tooltip" data-placement="top" disabled="disabled" title="Pendiente Aprobacion"><i class="material-icons">access_time</i></a>
                                                        <?php elseif($estadoproyecto == 3): ?>
                                                            <a href="javascript:;" type="button" class="btn btn-danger btn-simple btn-just-icon btn-xs" data-toggle="tooltip" data-placement="top" disabled="disabled" title="No ha sido aceptado, Clic para eliminar la inscripción al proyecto"><i class="material-icons">not_interested</i></a>
                                                        <?php elseif($estadoproyecto == 1): ?>
                                                            <a type="button" class="btn btn-success btn-simple btn-just-icon btn-xs" data-toggle="popover" data-placement="top" title="Reclutado!" title="Felicidades! ha sido aceptado, pronto, un gestor le contactará"><i class="material-icons">check</i></a>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <?php if($row->estadosdeproyectos_id != 2): ?>
                                                            <a href="inscribir/<?php echo e($row->id); ?>" type="button" class="btn btn-primary btn-simple btn-just-icon btn-xs" data-toggle="tooltip" data-placement="top" title="Inscribirse"><i class="glyphicon glyphicon-edit"></i></a>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


















<!-- Modal para agregar un resumen cuando el proyecto pasa a estado Reclutando o En desarrollo  -->
<form action="<?php echo e(url('resumenP')); ?>" method="POST">
    <?php echo e(csrf_field()); ?>

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
                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>


<!-- Modal para eliminar proyecto  -->
<form action="<?php echo e(url('eliminarP')); ?>" method="POST">
    <?php echo e(csrf_field()); ?>

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
                        <?php $__currentLoopData = $usuario; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usu): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <p class="form-control-static"><?php echo e($usu->nameu); ?>: <?php echo e($usu->email); ?></p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Descripcion</label>
                        <textarea class="form-control" rows="5" name="textoEliminar" id="textoEliminar" ></textarea>
                        <input type="hidden" name="idEliminar" id="idEliminar">
                        <input type="hidden" name="idPro" id="idPro">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit"  class="btn btn-success">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
</form>


<?php else: ?>
    
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
<?php endif; ?>




<script>
    //Script Tabla Dinamica
    var $table = $('#fresh-table'),
//            $alertBtn = $('#alertBtn'),
//            full_screen = false,
            window_height;

    $().ready(function(){

        window_height = $(window).height();
        table_height = window_height - 20;

        $table.bootstrapTable({
            toolbar: ".toolbar",
            showRefresh: false,
            search: true,
            showToggle: false,
            showColumns: true,
            pagination: true,
            striped: false,
            sortable: true,
//            height: table_height,
            pageSize: 3,
            pageList: [3,6,9],

            formatShowingRows: function(pageFrom, pageTo, totalRows){
                //do nothing here, we don't want to show the text "showing x of y from..."
            },
            formatRecordsPerPage: function(pageNumber){
                return pageNumber + " rows visible";
            },
            icons: {
                refresh: 'fa fa-refresh',
                toggle: 'fa fa-th-list',
                columns: 'fa fa-columns',
                detailOpen: 'fa fa-plus-circle',
                detailClose: 'fa fa-minus-circle'
            }
        });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>