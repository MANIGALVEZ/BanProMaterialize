<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />



    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    {{--<link href="http://netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" />--}}
    {{--<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">--}}
    {{--<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>--}}
    {{--<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">--}}
    {{--<link rel="icon" type="image/png" href="../assets/img/favicon.png">--}}


    <title>Laravel</title>

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
{{--    <link  href="{{ asset('css/rotating-card.css') }}" rel="stylesheet">--}}
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
    {{--<script src="{{ asset('js/bootstrap.min.js') }}"></script>--}}
    <script src="{{ asset('js/bootstrap-table.js') }}"></script>


    <script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<nav class="navbar navbar-success navbar-static-top navbar-fixed-top">
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

                 {{--<img src="../img/tecnoparque.png" alt="" class="logotecno">--}}
                @if (Auth::guest())
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
                                  </ul>
                                  <li><a href="{{ url('/usuarios')}}">Usuarios</a></li>
                                @endif
                        </li>
                      </ul>
                    </nav>
                  </div>
                  @endif
                <!-- <a class="navbar-brand" href="{{ url('/') }}">
                    Laravel
                </a> -->
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Ingresar</a></li>
                        <li><a href="{{ url('/register') }}">Registrarse</a></li>
                        <li>
                            <a href="https://www.facebook.com/TecnoParque-Colombia-6102873246/" target="_blank" class="btn btn-simple btn-white btn-just-icon">
                                <i class="fa fa-facebook-square"></i>
                            </a>
                        </li>
                        <li>
                            <a href="http://tecnoparque.sena.edu.co/" target="_blank" class="btn btn-simple btn-white btn-just-icon">
                                <i class="material-icons">web</i>
                            </a>
                        </li>
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
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @yield('content')
        </div>
    </div>
    <!-- Scripts -->

    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

{{--Script para switch de mis proyectos--}}
{{--<script>--}}
    {{--$(document).ready(function()--}}
    {{--{--}}
        {{--$('#opcion1').change(function(){--}}
            {{--window.location.replace('/misproyectos')--}}
        {{--})--}}

        {{--$('#opcion2').change(function(){--}}
            {{--window.location.replace('/home')--}}
        {{--})--}}
    {{--})--}}
{{--</script>--}}

{{--Script para el filtro por estados (El usuario desea poder ver el banco de proyectos en estado: "reclutando") --}}
<script>
    $(document).ready(function()
    {
        $(".filtroEstado").change(function(){
            $lip = $(this).val()
            $.get('listarP/'+$lip, function(data)
            {
                $('tbody').empty()
                $('tbody').html(data)
            })
        })
    })
</script>

{{--funcion ajax para cambiar de estado en tiempo real y auto actualizarse--}}
<script>
    $(document).ready(function()
    {
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
    })
</script>

{{--funcion ajax para eliminar un proyecto, pasar a estado en banco(El gestor por medio del aplicativo podr� eliminar un proyecto y de manera autom�tica env�a una notificaci�n al usuario informando el fin del proceso y su motivo)--}}
<script>
    $(document).ready(function()
    {
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
    })
</script>

{{--Funcion ajax para actualizar estados en la vista proyectosusers--}}
<script>
    $(document).ready(function()
    {
        $(".estadoProyectoUsuario").change(function ()
        {
            $idCambio = $(this).val()
            $idProUser= $(this).attr("data-idprouser")

            $('#idCambio').val($idCambio)
            $('#idProUser').val($idProUser)

            $.get('/estProUser', {idcam: $idCambio, idpro: $idProUser})

        })
    })
</script>

{{--Script para filtrar por lineas tecnologicas (El gestor podra filtrar los proyectos seg�n las diferentes lineas tecnologicas)--}}
{{--<script>--}}
    {{--$(document).ready(function() --}}
    {{--{--}}
{{--//        $arrLineas = [];--}}
        {{--$(".filtroLinea").change(function()--}}
        {{--{--}}
            {{--if($(this).is(":checked")){--}}
{{--//                $lineas = $(".filtroLinea");--}}
{{--//                for($i = 0; $i <= ($lineas.length - 1); $i++){--}}
{{--//                    if($($lineas[$i]).is(":checked")){--}}
{{--//                        $arrLineas.push($lineas[$i]);--}}
{{--//                    }else{--}}
{{--//                        $arrLineas.pop($lineas[$i]);--}}
{{--//                    }--}}
                {{--}--}}
{{--//                console.log($arrLineas);--}}
{{--//                $lil = $(this).val()--}}
                {{--$.get('listarL/'+$lil, function(data)--}}
                {{--{--}}
                    {{--$('tbody').empty()--}}
                    {{--$('tbody').html(data)--}}
                {{--})--}}
{{--//            }--}}
{{--//        })--}}
    {{--})--}}
{{--</script>--}}


{{--Script para filtrar por lineas tecnologicas (El gestor podra filtrar los proyectos seg�n las diferentes lineas tecnologicas)--}}
<script>
    $(document).ready(function()
    {
        $arrLineas = []
        $lineas = $(".filtroLinea")

            $(".filtroLinea").change(function()
            {
                $('tbody').empty()

                for($i = 0; $i <= ($lineas.length -1); $i++)
                {
                    if($($lineas[$i]).is(":checked"))
                    {
                        $arrLineas.push($lineas[$i])
                        console.log($arrLineas)
//                        alert('1')
                    }
                    else
                    {
                        $arrLineas.splice($lineas[$i])
//                        console.log($arrLineas)
//                        alert('2')
                    }
//                $lil = $(this).val()
//                $.get('listarL/'+$lil, function(data)
//                {
//                    $('tbody').append(data)
                }

            })

    })
</script>

</body>
</html>
