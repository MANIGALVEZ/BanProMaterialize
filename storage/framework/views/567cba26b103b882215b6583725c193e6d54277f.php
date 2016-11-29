<?php $__env->startSection('content'); ?>

<article>
    <div class="page-header">
        <h2 class="text-center text-muted">Administración De Usuarios</h2>
    </div>
</article>
<br>
<table class="table" style="text-align: center">
      <thead>
        
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Email</th>
        <th>Celular</th>
        <th>Titulos</th>
        <th>Rol</th>
        <th>Proyectos Asociados</th>
      </thead>
        <tbody>
              <?php $__currentLoopData = $query; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                  <tr class="letra">
                      
                      <td><?php echo e($row->nameu); ?></td>
                      <td><?php echo e($row->apellidos); ?></td>
                      <td><?php echo e($row->email); ?></td>
                      <td><?php echo e($row->celular); ?></td>
                      <td><?php echo e($row->titulos); ?></td>
                      <td><?php echo e($row->tiporol); ?></td>
                      <td><a href="usuariosshow/<?php echo e($row->id); ?>">Ver</a><td>
                  </tr>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </tbody>
    </table>
    <?php echo $query->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>