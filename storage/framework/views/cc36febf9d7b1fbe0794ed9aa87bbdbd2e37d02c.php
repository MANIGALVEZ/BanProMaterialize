<?php $__env->startSection('content'); ?>

<table class="table table-hover" style="text-align: center">
      <thead>
        
        <th>Proyecto</th>
        <th>Usuario</th>
        <th>Estado</th>
      </thead>
          <?php $__currentLoopData = $proyectosusers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $puti): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
              <tbody>

                    <td>
                        <?php $proyec = DB::table('proyectos')->where('id', "=", $puti->proyectos_id)->get();?>
                        <?php $__currentLoopData = $proyec; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usu): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <?php echo e($usu->nombrep); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </td>
                    <td>
                        <?php $usuario = DB::table('users')->where('id', "=", $puti->users_id)->get();?>
                        <?php $__currentLoopData = $usuario; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usu): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <?php echo e($usu->nameu); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </td>
                    <td>
                        <?php $estadosprouser = DB::table("estadosproyectosusers")->where("id", "<>", 4)->get(); ?>
                        <select class="form-control estadoProyectoUsuario" data-idprouser="<?php echo e($puti->id); ?>">
                            <?php $__currentLoopData = $estadosprouser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estado): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <?php $tabla = DB::table("proyectosusers")->get(); ?>
                                <?php if($estado->id == $puti->estadosproyectosusers_id): ?>
                                    <option value="<?php echo e($estado->id); ?>" selected><?php echo e($estado->estado); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($estado->id); ?>"><?php echo e($estado->estado); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </select>
                    </td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
              </tbody>
</table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>