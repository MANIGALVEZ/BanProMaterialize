<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    
	<title>Banco de Proyectos</title>


    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link href='https://fonts.googleapis.com/css?family=Cambo|Poppins:400,600' rel='stylesheet' type='text/css'>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" />


    <!-- Styles -->
    <link  href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link  href="<?php echo e(asset('css/sweetalert.css')); ?>" rel="stylesheet">
    <link  href="<?php echo e(asset('css/custom.css')); ?>" rel="stylesheet">
    <link  href="<?php echo e(asset('css/fontello.css')); ?>" rel="stylesheet">

    <link  href="<?php echo e(asset('css/bootstrap-switch.css')); ?>" rel="stylesheet">
    <link  href="<?php echo e(asset('css/fileinput.css')); ?>" rel="stylesheet">
    <link  href="<?php echo e(asset('css/material-kit.css')); ?>" rel="stylesheet">
    <link  href="<?php echo e(asset('css/material-bootstrap-wizard.css')); ?>" rel="stylesheet">
    <link  href="<?php echo e(asset('css/rotating-card.css')); ?>" rel="stylesheet">



    <!-- Scripts -->
    <script src="<?php echo e(asset('js/jquery-3.1.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/sweetalert.js')); ?>"></script>
    <script src="<?php echo e(asset('js/material-kit.js')); ?>"></script>
    <script src="<?php echo e(asset('js/material-bootstrap-wizard.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.validate.min.js')); ?>"></script>


    <script src="<?php echo e(asset('js/fileinput.js')); ?>"></script>
    
    
    
    
    


</head>
<body>
    <nav class="navbar navbar-info">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <a class="navbar-brand logotecno"><img src="../img/tecnoparque1.png" alt=""></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div style="position: relative" class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <p class="titulobanco">BANCO DE PROYECTOS</p>
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo e(url('/')); ?>" data-toggle="tooltip" data-placement="bottom" title="Inicio"><i class="material-icons">home</i></a></li>
                    <?php if(Auth::guest()): ?>
                    <?php else: ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Proyectos<span class="caret"></span></a>
                        <?php if(Auth::user()->tiporol == 'usuario'): ?>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo e(url('/proyectos/create')); ?>">Registrar</a></li>
                            <li><a href="<?php echo e(url('/proyectosIndex')); ?>">Todos</a></li>
                            <li><a href="<?php echo e(url('/misproyectos')); ?>">Asociados</a></li>
                        </ul>
                        <?php endif; ?>
                        <?php if(Auth::user()->tiporol == 'gestor'): ?>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo e(url('/proyectosIndex')); ?>">Todos</a></li>
                            <li><a href="<?php echo e(url('/proyectosB')); ?>">Eliminados</a></li>
                            <li><a href="<?php echo e(url('/proyectos/create')); ?>">Registrar</a></li>
                        </ul>
                            <li><a href="<?php echo e(url('/usuarios')); ?>">Usuarios</a></li>
                        <?php endif; ?>
                    </li>
                    <?php endif; ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if(Auth::guest()): ?>
                        <li><a href="<?php echo e(url('/login')); ?>" type="button" class="btn-just-icon btn-xs" data-toggle="tooltip" data-placement="bottom" title="Ingresar"><i class="material-icons">person</i></a></li>
                        <li><a href="<?php echo e(url('/register')); ?>" type="button" class="btn-just-icon btn-xs" data-toggle="tooltip" data-placement="bottom" title="Registrarse"><i class="material-icons">assignment</i></a></li>
                        <li><a href="https://www.facebook.com/TecnoParque-Colombia-6102873246/" class="btn-just-icon btn-xs" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook-square"></i></a></li>
                        <li><a href="http://tecnoparque.sena.edu.co/" class="btn-just-icon btn-xs" data-toggle="tooltip" data-placement="bottom" title="Web"><i class="material-icons">web</i></a></li>
                    <?php else: ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo e(Auth::user()->nameu); ?><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo e(url('/logout')); ?>"onclick="event.preventDefault();document.getElementById('logout-form').submit();">Salir</a></li>
                            </ul>
                            <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                            <?php echo e(csrf_field()); ?>

                            </form>
                        </li>
                    <?php endif; ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <section class="content-fluid">
        <div class="col-md-10 col-md-offset-1">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </section>

<!-- Scripts -->
<script>

$(document).ready(function()
{

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })


        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>



        $(".filtroEstado").change(function(){
            $lip = $(this).val()
            $.get('listarP/'+$lip, function(data)
            {
                $('tbody').empty()
                $('tbody').html(data)
            })
        })




        $(".estadoProyecto").change(function ()
        {
            $idEstado = $(this).val()
            $idProyecto = $(this).attr("data-proyecto")

            if ($idEstado == 3 || $idEstado == 4)
            {

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
            }

        })




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




        $(".estadoProyectoUsuario").change(function ()
        {
            $idCambio = $(this).val()
            $idProUser= $(this).attr("data-idprouser")

            $('#idCambio').val($idCambio)
            $('#idProUser').val($idProUser)

            $.get('/estProUser', {idcam: $idCambio, idpro: $idProUser})

        })




        $arrLineas = []
        $lineas = $(".filtroLinea")

            $(".filtroLinea").change(function() {
                $('tbody').empty()
                if($("#filtroLinea1").is(":checked")){$var1 = $("#filtroLinea1").val()}else{$var1 = 0}
                if($("#filtroLinea2").is(":checked")){$var2 = $("#filtroLinea2").val()}else{$var2 = 0}
                if($("#filtroLinea3").is(":checked")){$var3 = $("#filtroLinea3").val()}else{$var3 = 0}
                if($("#filtroLinea4").is(":checked")){$var4 = $("#filtroLinea4").val()}else{$var4 = 0}


                      if($var1 == 0 && $var2 == 0 && $var3 == 0 && $var4 == 0)
                      {
//                          Recarga la pagina, en caso de no seleccionar una linea especifica(para mostrar todas las lineas)
                          window.location.replace('proyectosIndex')
                      }
                      else
                      {
//                          Ejecuta el filtro segun la linea seleccionada
                          $.get('listarL', {var1: $var1, var2: $var2, var3: $var3, var4: $var4}, function(data)
                            {
                                $('tbody').html(data)
                            })
                      }

            })





        $(".estadoProyectoDetalle").change(function ()
        {
            $idEstado = $(this).val()
            $idProyecto = $(this).attr("data-proyecto")

            if ($idEstado == 3 || $idEstado == 4)
            {

                $(".modalResumenDetalle").modal("show")
                $('#idEstado').val($idEstado)
                $('#idProyecto').val($idProyecto)

                $.get('/consultaP/'+$idProyecto, {idp: $idProyecto}, function(data)
                {
                    $('#texto').val(data)
                })
            }
            else
            {
                $.get("/estadoProyecto", {ide: $idEstado, idp: $idProyecto})
            }

        })




//boton type:button
    $(".editInput").click(function()
    {
        $(".editInput").hide()
        $("button").removeClass("hidden")
        $("input").removeAttr("readonly").removeClass("quitarborde").addClass("form-control");
        $("textarea").removeAttr("readonly").removeClass("quitarborde").addClass("form-control");
    })
//boton type:submit
    $(".updateInput").click(function()
    {
        $("#formPro").submit();
    })



    $(".editLinea").change(function()
    {
        $id = $(this).attr("data-edit-linea")
        $idLinea = $(this).attr("value")

        if($(this).is(":checked"))
        {
            console.log("if", $id, $idLinea)
            $.get('/insertSL/'+$id, {idN: $idLinea})
//            window.location.replace('show/'.$id)
//            console.log($(this))
        }
        else
        {
            console.log("else", $id, $idLinea)
            $.get('/deleteSL/'+$id, {idN: $idLinea})
//            window.location.replace("")
//            console.log($(this))
        }

    })




})
</script>

</body>
</html>