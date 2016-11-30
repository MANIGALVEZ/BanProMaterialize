<?php $__env->startSection('content'); ?>


<!--Funcion modicar fecha para mostrarse por dia, mes y a�o-->
<?php function fechalatina($fecha)
{
    $nfecha=date('d/m/y',strtotime($fecha));
    return $nfecha;
}
?>

<article>
    <div class="page-header">
        <h2 class="text-center text-muted">Proyectos En Banco</h2>
    </div>
</article>

<br><br>

<table class="table table-hover" style="text-align: center">
    <thead>
    <tr class="">
        
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
        <?php $__currentLoopData = $query; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <tr class="letra">
                
                <td><?php echo e(fechalatina($row->created_at)); ?></td>
                <td><?php echo e($row->nombrep); ?></td>
                <td><?php echo e($row->sectorenfocado); ?></td>
                <?php $lineasproyectos = DB::table("lineasproyectos")->where("proyectos_id", $row->id)->get(); ?>
                <td style="text-align: justify">
                    <ul>
                        <?php if (count($lineasproyectos) > 0): ?>
                        <?php $__currentLoopData = $lineasproyectos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lineaproyecto): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <?php $lineas = DB::table("lineas")->where("id", $lineaproyecto->lineas_id)->get(); ?>
                            <?php $__currentLoopData = $lineas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $linea): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <li class="lineasproyectosindex"> <?php echo $linea->linea; ?> </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        <?php endif ?>
                    </ul>
                </td>
                <?php $estados = DB::table("estadosdeproyectos")->get(); ?>
                <td>
                    <?php if(Auth::user()->tiporol == 'gestor'): ?>
                        <select class="form-control estadoProyecto" name="" data-proyecto="<?php echo e($row->id); ?>">
                            <?php $__currentLoopData = $estados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estado): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <?php if($estado->id == $row->estadosdeproyectos_id): ?>
                                    <option value="<?php echo e($estado->id); ?>" selected><?php echo e($estado->estado); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($estado->id); ?>"><?php echo e($estado->estado); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </select>
                    <?php endif; ?>
                </td>
                <td>
                    <?php $usuario = DB::table('users')->where('id', "=", $row->usuario_id)->get();?>
                    <?php $__currentLoopData = $usuario; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usu): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <?php echo e($usu->nameu); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </td>
                <td>
                    <?php if(Auth::user()->tiporol == 'gestor'): ?>
                        <a href="show/<?php echo e($row->id); ?>" type="button" class="btn btn-info btn-simple btn-just-icon btn-xs" data-toggle="tooltip" data-placement="top" title="Detalles"><i class="material-icons">event_note</i></a>
                    <?php endif; ?>

                </td>

            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </tbody>
</table>
<?php echo $query->render(); ?>



        <!-- Modal para agregar un resumen cuando el proyecto pasa a estado Reclutando o En desarrollo  -->
<form action="<?php echo e(url('resumenP')); ?>" method="POST">
    <?php echo e(csrf_field()); ?>

    <div class="modal fade modalResume" id="modalResume" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">A�adir Resumen</h4>
                </div>
                <div class="modal-body">
                        <textarea class="form-control" rows="5" name="texto" id="texto">
                        </textarea>
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


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>