<?php $__env->startSection('content'); ?>

<form id="formPro" action="<?php echo e(url('editS/'.$query->id)); ?>" method="POST">
<?php echo e(csrf_field()); ?>


<div class="row col-md-12">
    <div class="infoinicial">
        <article>
            <label>Nombre Proyecto:</label>
                <input class="quitarborde" type="text" name="nombrep" value="<?php echo e($query->nombrep); ?>" readonly>
        </article>

        <article>
            <label>Sector Enfocado: </label>
                <input class="quitarborde" type="text" name="sectorenfocado" value="<?php echo e($query->sectorenfocado); ?>" readonly>
        </article>

        <article>
            <label>Creado por: </label>
                <p><?php echo e($query->user->nameu); ?></p>
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
                <?php if(Auth::user()->tiporol == 'usuario'): ?>
                    <th>Opciones</th>
                <?php endif; ?>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <div class="cajascontent">

                        
                        <textarea  class="infotablainicial" id="" cols="77" rows="10" readonly><?php echo e($query->descripcion); ?></textarea>
                    </div>
                </td>
                <td>
                    <div class="cajascontent">
                       <!-- <input class="quitarborde" type="text" name="resumen" value="" readonly>-->
                        
                        <textarea class="infotablainicial" id="" cols="77" rows="10" readonly><?php echo e($query->resumen); ?></textarea>

                    </div>
                <?php if(Auth::user()->tiporol == 'usuario'): ?>
                <td>
                        <?php $estadoproyecto = DB::table("proyectosusers")->where("proyectos_id", $query->id)->where("users_id", Auth::user()->id)->value("estadosproyectosusers_id"); ?>
                        <?php if(count($estadoproyecto) > 0): ?>
                            <?php if($estadoproyecto == 2): ?>
                                <a href="javascript:;" type="button" class="btn btn-warning btn-just-icon btn-xs" data-toggle="tooltip" data-placement="top" disabled="disabled" title="Pendiente Aprobacion"><i class="material-icons">access_time</i></a>
                            <?php elseif($estadoproyecto == 3): ?>
                                <a href="javascript:;" type="button" class="btn btn-danger btn-just-icon btn-xs" data-toggle="tooltip" data-placement="top" title="Rechazado"><i class="material-icons">not_interested</i></a>
                            <?php elseif($estadoproyecto == 1): ?>
                                <button type="button" class="btn btn-success  btn-just-icon btn-xs" data-toggle="popover" data-placement="top" title="Reclutado!" data-content="Felicidades! ha sido aceptado, pronto, un gestor le contactará"><i class="material-icons">check</i></button>
                            <?php endif; ?>
                        <?php else: ?>
                            <a href="../vincularce/<?php echo e($query->id); ?>" type="button" class="btn btn-primary btn-just-icon btn-xs" data-toggle="tooltip" data-placement="top" title="Inscribirse"><i class="glyphicon glyphicon-edit"></i></a>
                        <?php endif; ?>
                </td>
                <?php endif; ?>

            </tr>
            </tbody>
        </table>
    </div>
    <table class="table table-bordered tablitashow"  >
        <thead>
        <tr>
            
            <th>Linea Tecnológica</th>
            <th>Usuarios Inscritos</th>
            <th>Estado de Proyecto</th>
        </tr>
        </thead>
        <tbody>
        <tr>

            <td>
                <ul>
                    <?php $__currentLoopData = $lineas_proyecto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $linea): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <?php $lineas = DB::table("lineas")->where("id", $linea->lineas_id)->get(); ?>
                            <?php $__currentLoopData = $lineas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $linea): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <li><?php echo e($linea->linea); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </ul>
            </td>
            <td>
                <div>
                    <?php if(Auth::user()->tiporol == 'gestor'): ?>
                        <strong class="titulousu">Usuarios Inscritos</strong>
                        <div class="usuarioscontent">
                            <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usu): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <div class="contenusuarios">
                                    <li class="nusu"><?php echo e($usu->nameu); ?></li>
                                    <li class="EstadoU">
                                        <?php $estadosprouser = DB::table("estadosproyectosusers")->get(); ?>
                                        <select class=" estadoProyectoUsuario usuis" data-idprouser='<?php echo DB::table("proyectosusers")->where("proyectos_id", $query->id)->where("users_id", $usu->id)->value("id"); ?>'>
                                            <?php $__currentLoopData = $estadosprouser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estado): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <?php $tabla = DB::table("proyectosusers")->where("proyectos_id", $query->id)->where("users_id", $usu->id)->value("estadosproyectosusers_id"); ?>
                                                <?php if($estado->id == $tabla): ?>
                                                    <option value="<?php echo e($estado->id); ?>" selected><?php echo e($estado->estado); ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo e($estado->id); ?>"><?php echo e($estado->estado); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        </select>
                                    </li>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </div>
                    <?php endif; ?>
                    <?php if(Auth::user()->tiporol == 'usuario'): ?>
                        <strong class="titulousu">Usuarios Inscritos</strong>
                        <div class="usuarioscontent">
                            <?php $__currentLoopData = $usuarios2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usu): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <li><?php echo e($usu->nameu); ?></li>
                                <?php $estadosprouser = DB::table("estadosproyectosusers")->get(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </td>
            <td>
                <?php if(Auth::user()->tiporol == 'usuario'): ?>
                    <?php $estados = DB::table("estadosdeproyectos")->get(); ?>
                    <?php $actualizarestados = DB::table("proyectos")->where("estadosdeproyectos_id", $query->estadosdeproyectos_id)->get(); ?>
                    <?php $__currentLoopData = $estados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estado): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <?php if($estado->id == $query->estadosdeproyectos_id): ?>
                            <option value="<?php echo e($estado->id); ?>" selected><?php echo e($estado->estado); ?></option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <?php endif; ?>
                <?php $estados = DB::table("estadosdeproyectos")->where('id', '<>', '1')->get(); ?>
                <form class="form-inline">
                    <select class="estadoProyectoDetalle" name="" data-proyecto="<?php echo e($query->id); ?>">
                        <?php $__currentLoopData = $estados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estado): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <?php if($estado->id == $query->estadosdeproyectos_id): ?>
                                <option value="<?php echo e($estado->id); ?>" selected><?php echo e($estado->estado); ?></option>
                            <?php else: ?>
                                <option value="<?php echo e($estado->id); ?>"><?php echo e($estado->estado); ?></option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </select>
                </form>
            </td>
        </tbody>
    </table>
        <div style="padding:0; height: 268px;" class=" row col-md-4 col-sm-offset-1">
            <img src="/<?php echo e($query->imagen); ?>" class="img-thumbnail imgS" style=" height: 250px;">
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
                    <?php $__currentLoopData = $comentariop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $comentario): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <?php $comentarios = DB::table("comentarios")->where("id", $comentario->id)->get(); ?>
                            <?php $__currentLoopData = $comentarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $comentario): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <li class="nombre">
                                <?php echo DB::table("users")->where("id", $comentario->usuario_id)->value("nameu"); echo ":" ?>
                                <?php echo e($comentario->comentario); ?>

                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </div>
            </td>
        </tr>
    </tbody>
</table>
    </div>
<div class="row col-md-12">

    <form action="<?php echo e(url('/comentario/'.$query->id)); ?>" method="POST">
        <?php echo e(csrf_field()); ?>

        <textarea id="comentario"  type="text" class="form-control" placeholder="Escriba el comentario deseado" rows="2" name="comentario" value="<?php echo e(old('comentario')); ?>"  maxlength="255" required="required"></textarea>
        <button type="submit" class="btn btn-success btnEnviar" name="enviar" >
            Enviar
         </button>
    </form>
</div>

    <!-- Modal para agregar un resumen cuando el proyecto pasa a estado Reclutando o En desarrollo  en vista Detalles-->
    <form action="<?php echo e(url('resumenPD')); ?>" method="POST">
        <?php echo e(csrf_field()); ?>

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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>