<?php $__env->startSection('content'); ?>


</div>



<?php if(count($errors) > 0): ?>
    <script>
        swal({
        title: "¡Registro Invalido!",
        text: "Por favor verifique la información ingresada",
        type: "error",
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Aceptar"});
    </script>

    <div class="alert alert-danger alert-dismissible" role="alert">
        <button class="close" data-dismiss="alert">&times;</button>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <li><?php echo e($message); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </div>
<?php endif; ?>


<body>
    <div class="image-container set-full-height" style="background-image: url('img/20.jpg')">

        <!--  Slider  -->
        <a href="http://tecnoparque.sena.edu.co/" class="made-with-mk">
            <div class="material-icons">copyright</div>
            <div class="made-with">Hecho Para <strong>Tecnoparque</strong></div>
        </a>

        <!--   Big container   -->
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <!--      Wizard container        -->
                    <div class="wizard-container">
                        <div class="card wizard-card" data-color="green" id="wizardProfile">
                            <form class="" role="form" method="POST" action="<?php echo e(url('/register')); ?>">
                                <?php echo e(csrf_field()); ?>

                                <div class="wizard-header">
                                    <h3 class="wizard-title">
                                        Registro
                                    </h3>
                                    <h5 style="text-align: center">La informacion ingresada es para uso exclusivo de Tecnoparque</h5>
                                </div>
                                <div class="wizard-navigation">
                                    <ul>
                                        <li><a href="#basica" data-toggle="tab">Información Básica</a></li>
                                        <li><a href="#adicional" data-toggle="tab">Información Adicional</a></li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane" id="basica">
                                        <div class="row">
                                            <h4 class="info-text">Comencemos con la información básica <br>(Todos los campos son requeridos)</h4>
                                            <br>
                                            
                                                
                                                    
                                                        
                                                        
                                                    
                                                    
                                                
                                            
                                            <div class="col-sm-8 col-sm-offset-2">
                                                <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">face</i>
													</span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Nombres (Requerido)<small></small></label>
                                                        <input id="nameu" name="nameu" type="text" class="form-control" value="<?php echo e(old('nameu')); ?>" required>
                                                    </div>
                                                </div>

                                                <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">record_voice_over</i>
													</span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Apellidos (Requerido)<small></small></label>
                                                        <input id="apellidos" name="apellidos" type="text" class="form-control" value="<?php echo e(old('apellidos')); ?>" required>
                                                    </div>
                                                </div>
                                            

                                                <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">mail</i>
													</span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Correo Electrónico (Requerido)<small></small></label>
                                                        <input id="email" name="email" type="email" class="form-control" value="<?php echo e(old('email')); ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="adicional">
                                        <h4 class="info-text">Continuemos con la información Adicional<br>(Algunos campos son requeridos)</h4>
                                        <div class="row">
                                            <div class="col-sm-8 col-sm-offset-2">
                                                
                                                <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">smartphone</i>
													</span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Celular (Requerido)<small></small></label>
                                                        <input id="celular" name="celular" type="text" class="form-control" value="<?php echo e(old('celular')); ?>" required>
                                                    </div>
                                                </div>
                                                <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">layers</i>
													</span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Cargo o Profesión<small></small></label>
                                                        <input id="titulos" name="titulos" type="text" class="form-control" value="<?php echo e(old('titulos')); ?>">
                                                    </div>
                                                </div>
                                                <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">lock</i>
													</span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Contraseña (Requerido)<small></small></label>
                                                        <input id="password" name="password" type="password" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">lock</i>
													</span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Confirmar Contraseña (Requerido)<small></small></label>
                                                        <input id="password-confirm" name="password_confirmation" type="password" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-footer">
                                    <div class="pull-right">
                                        <input type='button' class='btn btn-next btn-fill btn-success btn-wd' name='next' value='Siguiente' />
                                        <input type='submit' class='btn btn-finish btn-fill btn-success btn-wd' value='Registrarse' />
                                    </div>
                                    <div class="pull-left">
                                        <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Anterior' />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </div> <!-- fin wizard container -->
                </div>
            </div><!-- fin row -->
        </div> <!--  fin big container -->

        
            
                
            
        
    </div>
</body>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>