<?php $__env->startSection('content'); ?>



<body>
    <div class="image-container set-full-height" style="background-image: url('img/50.jpg')">
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
                        <div class="card wizard-card" data-color="green" id="wizardProfile">
                            <div class="wizard-header">
                                <h3 class="wizard-title">
                                    Proyectos Actuales
                                </h3>
                            </div>
                            <div class="wizard-navigation">
                                <ul>
                                    <li class="active"><a href="#proyectos" data-toggle="tab"></a></li>
                                </ul>
                            </div>
                            <?php $__currentLoopData = $proyectos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proyecto): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <div class="tab-content col-md-3 col-sm-6">
                                    <div class="card-container">
                                        <div class="card">
                                            <div class="front">
                                                <div class="cover">
                                                    <img src="<?php echo e($proyecto->imagen); ?>"/>
                                                </div>
                                                <br><br><br>
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
                                                            <?php if(Auth::guest()): ?>
                                                                <div class="text-center">
                                                                    <a href="<?php echo e(url('/login')); ?>" type="button" class="btn btn-success btn-lg btn-round">¡Participa!</a>
                                                                </div>
                                                            <?php else: ?>
                                                                <div class="text-center">
                                                                    <a href="show/<?php echo e($proyecto->id); ?>" type="button" class="btn btn-success btn-lg btn-round participa">¡Participa!</a>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
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