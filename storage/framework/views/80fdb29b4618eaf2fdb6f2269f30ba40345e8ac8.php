<?php $__env->startSection('content'); ?>

</div>


<body>
<div class="image-container set-full-height" style="background-image: url('img/office1.jpeg')">

    <!--  Slider  -->
    <a href="http://tecnoparque.sena.edu.co/" class="made-with-mk">
        <div class="material-icons">copyright</div>
        <div class="made-with">Hecho Para <strong>Tecnoparque</strong></div>
    </a>

    <!--   Big container   -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="wizard-container">
                    <div class="card wizard-card" data-color="greenmod" id="wizardProfile">
                        <div class="wizard-header">
                            
                            
                            <h3 class="wizard-title">
                                RED TECNOPARQUE
                            </h3>
                            <h5>Nodo Manizales</h5>
                            
                        </div>
                        <div class="wizard-navigation">
                            <ul>
                                <li class="active"><a href="#proyectos" data-toggle="tab">PROYECTOS ACTUALES</a></li>
                            </ul>
                        </div>
                        <?php $__currentLoopData = $proyectos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proyecto): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <div class="tab-content col-md-4 col-sm-6">
                                <div class="fofo card-container">
                                    <div class="card">
                                        <div class="front">
                                            <div class="cover">
                                                
                                                <img src="<?php echo e($proyecto->imagen); ?>"/>
                                            </div>
                                            <br><br><br><br><br>
                                            <div class="content">
                                                <div class="main">
                                                    <h3 class="name"><?php echo e($proyecto->nombrep); ?></h3>
                                                    <p class="text-justify"><?php echo e($proyecto->descripcion); ?></p>
                                                </div>
                                            </div>
                                        </div> <!-- end front panel -->
                                        <div class="back">
                                            <div class="header">
                                                <h5 class="text-center">Sector Enfocado</h5>
                                                <p class="text-center"><?php echo e($proyecto->sectorenfocado); ?></p>
                                            </div>
                                            <div class="content">
                                                <div class="main">
                                                    <h4 class="text-center">Empresa</h4>
                                                    <p class="text-center"><?php echo e($proyecto->empresa); ?></p>

                                                    <div class="stats-container">
                                                        <h4 class="text-center">Estado</h4>
                                                        <p class="text-center">
                                                            <?php $__currentLoopData = $estadosproyectos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estadoproyecto): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                <?php if($estadoproyecto->id == $proyecto->estadosdeproyectos_id): ?>
                                                                    <?php echo e($estadoproyecto->estado); ?>

                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="footer">
                                                
                                                    
                                                    
                                                    
                                                
                                            </div>
                                        </div> <!-- end back panel -->
                                    </div> <!-- end card -->
                                </div> <!-- end card-container -->
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>