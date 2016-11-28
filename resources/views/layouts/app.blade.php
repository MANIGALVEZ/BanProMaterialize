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
    <link  href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link  href="{{ asset('css/sweetalert.css') }}" rel="stylesheet">
    <link  href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link  href="{{ asset('css/fontello.css') }}" rel="stylesheet">
    <link  href="{{ asset('css/menu.css') }}" rel="stylesheet">
    <link  href="{{ asset('css/bootstrap-switch.css') }}" rel="stylesheet">
    <link  href="{{ asset('css/fileinput.css') }}" rel="stylesheet">
    <link  href="{{ asset('css/material-kit.css') }}" rel="stylesheet">
    <link  href="{{ asset('css/material-bootstrap-wizard.css') }}" rel="stylesheet">
{{--    <link  href="{{ asset('css/yon.css') }}" rel="stylesheet">--}}
    <link  href="{{ asset('css/rotating-card.css') }}" rel="stylesheet">
{{--    <link  href="{{ asset('css/fresh-bootstrap-table.css') }}" rel="stylesheet">--}}


    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.1.0.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.js') }}"></script>
    <script src="{{ asset('js/bootstrap-switch.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/fileinput.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/material-kit.js') }}"></script>
    <script src="{{ asset('js/nouislider.min.js') }}"></script>
    <script src="{{ asset('js/material-bootstrap-wizard.js') }}"></script>
    <script src="{{ asset('js/formsmaterialize.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/holder.js') }}"></script>
    <script src="{{ asset('js/jquery.bootstrap.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>


</head>
<body>
	<nav class="navbar navbar-azulmod navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                {{--<li><a href="{{ url('/') }}" type="button" class="btn-just-icon btn-xs" data-toggle="tooltip" data-placement="bottom" title="Inicio"><i class="material-icons">home</i></a></li>--}}
                <li><a href="{{ url('/') }}" class="logotecno"><img src="../img/tecnoparque1.png" alt=""></a></li>
                <p class="titulobanco">BANCO DE PROYECTOS</p>
            @if (Auth::guest())
                    <ul class="nav navbar-nav">
                    {{--<li class="li_inicio">INICIO</li>--}}
                </ul>

                    {{--<li><a href="{{ url('/register') }}" type="button" class="btn btn-white btn-just-icon btn-xs" data-toggle="tooltip" data-placement="bottom" title="Registrarse"><i class="material-icons">assignment</i></a></li>--}}

                @else
                    <div class="menuu">
                        <nav class="menu">
                        <ul>
                          <li><a href="{{ url('/') }}">Inicio</a></li>
                        <li class="submenus">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Proyectos<b class="icon-down-open"></b></a>
                                @if(Auth::user()->tiporol == 'usuario')
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/proyectos/create')}}">Registrar</a></li>
                                    <li><a href="{{ url('/proyectosIndex')}}">Todos</a></li>
                                    <li><a href="{{ url('/misproyectos')}}">Asociados</a></li>
                                </ul>
                                @endif
                                @if(Auth::user()->tiporol == 'gestor')
                                  <ul class="dropdown-menu">
                                      <li><a href="{{ url('/proyectosIndex')}}">Todos</a></li>
                                      <li><a href="{{ url('/proyectosB')}}">Eliminados</a></li>
                                      <li><a href="{{ url('/proyectos/create')}}">Registrar</a></li>
                                  </ul>
                                  <li><a href="{{ url('/usuarios')}}">Usuarios</a></li>
                                @endif

                        </li>
                      </ul>
                        </nav>
                        {{--<nav class="menu">--}}

                        {{--</nav>--}}
                    </div>
                @endif
                {{--<a class="navbar-brand" href="{{ url('/') }}">--}}
                {{--Tecnoparque--}}
                {{--</a>--}}
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>
                {{--<ul class="nav navbar-nav">--}}

                {{--</ul>--}}

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}" type="button" class="btn-just-icon btn-xs" data-toggle="tooltip" data-placement="bottom" title="Ingresar"><i class="material-icons">person</i></a></li>
                        <li><a href="{{ url('/register') }}" type="button" class="btn-just-icon btn-xs" data-toggle="tooltip" data-placement="bottom" title="Registrarse"><i class="material-icons">assignment</i></a></li>
                        <li><a href="https://www.facebook.com/TecnoParque-Colombia-6102873246/" class="btn-just-icon btn-xs" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook-square"></i></a></li>
                        <li><a href="http://tecnoparque.sena.edu.co/" class="btn-just-icon btn-xs" data-toggle="tooltip" data-placement="bottom" title="Web"><i class="material-icons">web</i></a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->nameu }}
                                <b class="icon-down-open"></b>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        Salir
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>

    </nav>
    <section class="content-fluid">
        <div class="col-md-10 col-md-offset-1">
            @yield('content')
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



{{--funcion ajax para cambiar de estado en tiempo real y auto actualizarse--}}
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



{{--funcion ajax para eliminar un proyecto, pasar a estado en banco(El gestor por medio del aplicativo podr� eliminar un proyecto y de manera autom�tica env�a una notificaci�n al usuario informando el fin del proceso y su motivo)--}}
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



{{--Funcion ajax para actualizar estados en la vista proyectosusers--}}
        $(".estadoProyectoUsuario").change(function ()
        {
            $idCambio = $(this).val()
            $idProUser= $(this).attr("data-idprouser")

            $('#idCambio').val($idCambio)
            $('#idProUser').val($idProUser)

            $.get('/estProUser', {idcam: $idCambio, idpro: $idProUser})

        })



{{--Script para filtrar por lineas tecnologicas (El gestor podra filtrar los proyectos seg�n las diferentes lineas tecnologicas)--}}
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




{{--funcion ajax para cambiar de estado en tiempo real y auto actualizarse en la vista detalles--}}
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



//Script para

//        $('.linea').click(function ()
//        {
//            console.log(document.getElementById("linea"));
//            document.getElementById("linea").value = true;
////            $(".chequeo").getElementById("che").setAttribute("checked", true)
//            console.log('hola')
//        })



{{--Script para editar campos nombre, sector, descripcion, resumen en vista showp--}}
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


{{--Script para editar lineas en vista showp--}}
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