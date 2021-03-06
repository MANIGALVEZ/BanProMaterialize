<?php $__env->startSection('content'); ?>



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
    <div class="image-container set-full-height" style="background-image: url('/img/10.jpg')">

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
                            <form action="<?php echo e(url('/proyectos')); ?>" method="POST" role="form" enctype="multipart/form-data">
                                <?php echo e(csrf_field()); ?>

                                <div class="wizard-header">
                                    <h3 class="wizard-title">
                                        Registro de Proyectos
                                    </h3>
                                    <h5>La informacion ingresada es para uso exclusivo de Tecnoparque</h5>
                                </div>
                                <div class="wizard-navigation">
                                    <ul>
                                        <li><a href="#informacion" data-toggle="tab">Información</a></li>
                                        <li><a href="#lineatecnologica" data-toggle="tab">Linea Tecnológica</a></li>
                                        <?php if(Auth::user()->tiporol == 'gestor'): ?>
                                        <li><a href="#imagen" data-toggle="tab">Imagen</a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane" id="informacion">
                                        <div class="row">
                                            <h4 class="info-text">Comencemos con la información básica <br>(Algunos campos son requeridos)</h4>
                                            <br>
                                            <div class="col-sm-8 col-sm-offset-2">
                                                <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">developer_board</i>
													</span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Nombre del Proyecto (Requerido)<small></small></label>
                                                        <input id="nombrep" type="text" class="form-control" name="nombrep" value="<?php echo e(old('nombrep')); ?>" required>
                                                    </div>
                                                </div>

                                                <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">business_center</i>
													</span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Sector<small></small></label>
                                                        <input id="sectorenfocado" type="text" class="form-control" name="sectorenfocado" value="<?php echo e(old('sectorenfocado')); ?>">
                                                    </div>
                                                </div>

                                                <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">business</i>
													</span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Empresa<small></small></label>
                                                        <input id="empresa" type="text" class="form-control" name="empresa" value="<?php echo e(old('empresa')); ?>">
                                                    </div>
                                                </div>

                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">description</i>
                                                    </span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Descripción (Requerido)<small></small></label>
                                                        <textarea id="descripcion" type="text" class="form-control" placeholder="" rows="5" name="descripcion" value="<?php echo e(old('descripcion')); ?>" autofocus maxlength="255" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="lineatecnologica">
                                        <h4 class="info-text">Por favor seleccione una o varias lineas tecnológicas<br></h4>
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                    <?php $__currentLoopData = $lineas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $linea): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                        <input id="linea<?php echo e($linea->id); ?>" type="checkbox" name="lineatecnologica[]" value="<?php echo e($linea->id); ?>">
                                                        <label for="linea<?php echo e($linea->id); ?>"><?php echo e($linea->linea); ?></label><br>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                        <br>
                                            </div>
                                            <div class="registrarproyectoslineas col-sm-8 col-sm-offset-2">
                                                <p style="line-height: 1;">La Línea de Electrónica y Telecomunicaciones presta sus servicios en las siguientes áreas:
                                                    Control de procesos,
                                                    Automatización,
                                                    Robótica aplicada,
                                                    Micro Controladores ARM,
                                                    TV Digital en el desarrollo de hardware,
                                                    análisis de señales y protocolos,
                                                    IPV6,
                                                    Redes y antenas.</p>
                                                <br>
                                                <p style="line-height: 1;">La Línea de Biotecnología tiene por objetivo acelerar proyectos de base tecnológica en las siguientes áreas:
                                                    Industrial,
                                                    Animal y vegetal,
                                                    Agroindustria (alimentaria y no alimentaria),
                                                    Nanotecnología (tecnologías limpias y nuevos  materiales) y
                                                    Energías alternativas.</p>
                                                <br>
                                                <p style="line-height: 1;">La Línea de Desarrollo de Diseño e Ingeniería presta sus servicios en las siguientes áreas:
                                                    Diseño y simulación,
                                                    Ingeniería inversa y
                                                    Prototipado.</p>
                                                <br>
                                                <p style="line-height: 1;"> La Línea de Desarrollo de Tecnologías Virtuales incorpora las Tecnologías de la Información y la Comunicación  TIC's en las siguientes áreas:
                                                    Aplicaciones Móviles,
                                                    Desarrollo de aplicaciones para Televisión Digital Terrestre,
                                                    Inteligencia Artificial y computacional,
                                                    Realidad Virtual y Simulación,
                                                    Animación Digital,
                                                    Videojuegos,
                                                    Producción de Contenidos 2D y 3D y
                                                    Desarrollo de Software.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if(Auth::user()->tiporol == 'proyectos'): ?>
                                    <div class="tab-pane" id="imagen">
                                        <div class="row">
                                            <h4 class="info-text">Por favor seleccione una imagen<br>(Una vez este aprobado el proyecto, aparecerá en la interfaz principal)</h4>
                                                <div class="col-sm-8 col-sm-offset-2">
                                                    <label class="control-label"></label>
                                                    <input type="file" class="file" name="image" multiple data-show-upload="false" data-show-caption="true" data-allowed-file-extensions='["jpg", "png"]'>
                                                    <br>
                                                    <center><h6>Seleccione una imagen</h6></center>
                                                </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="wizard-footer">
                                    <div class="pull-right">
                                        <input type='button' class='btn btn-next btn-fill btn-success btn-wd' name='next' value='Siguiente' />
                                        <input id="inscrito" type='submit' class='btn btn-finish btn-fill btn-success btn-wd' value='Registrarse' />
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