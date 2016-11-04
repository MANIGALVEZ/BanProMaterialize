<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Materialize-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>Laravel</title>

    <!-- Styles -->
    <link  href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link  href="{{ asset('css/sweetalert.css') }}" rel="stylesheet">
    <link  href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link  href="{{ asset('css/fontello.css') }}" rel="stylesheet">
    <link  href="{{ asset('css/menu.css') }}" rel="stylesheet">
    <link  href="{{ asset('css/bootstrap-switch.css') }}" rel="stylesheet">
    <link  href="{{ asset('css/fileinput.css') }}" rel="stylesheet">


    <!-- Scripts -->
    <script src="/js/jquery-3.1.0.min.js"></script>
    <script src="{{ asset('js/sweetalert.js') }}"></script>
    <script src="{{ asset('js/bootstrap-switch.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/fileinput.js') }}"></script>


    <script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<nav class="navbar navbar-default navbar-static-top navbar-fixed-top">
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

                 <img src="../img/tecnoparque.png" alt="" class="logotecno">
                @if (Auth::guest())
                @else
                <div class="menuu">
                   <input type="checkbox" id="btn-menu">
                    <label for="btn-menu" class="icon-menu"></label>
                    <nav class="menu">
                      <ul>
                        <li><a href="{{ url('/') }}">Inicio</a></li>
                        <li class="submenus"><a href="#">Proyectos<span class="icon-down-open"></span></a>
                            @if(Auth::user()->tiporol == 'usuario')
                            <ul>
                                <li><a href="{{ url('/proyectos/create')}}">Crear</a></li>
                                <li><a href="{{ url('/home')}}">Todos</a></li>
                                <li><a href="{{ url('/misproyectos')}}">Asociados</a></li>
                            </ul>
                            @endif
                            @if(Auth::user()->tiporol == 'gestor')
                              <ul>
                                  <li><a href="{{ url('/home')}}">Todos</a></li>
                                  <li><a href="{{ url('/proyectosB')}}">En Banco</a></li>
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
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->nameu }} <span class="caret"></span>
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
    <script src="{{ asset('js/formsmaterialize.js') }}"></script>
    <script src="/js/app.js"></script>
    <script src="{{ asset('js/holder.js') }}"></script>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

{{--Script para switch de mis proyectos--}}
<script>
    $(document).ready(function(){
        $('#opcion1').change(function(){
            window.location.replace('/misproyectos')
        })

        $('#opcion2').change(function(){
            window.location.replace('/home')
        })
    })
</script>

{{--Script para el filtro por estados (El usuario desea poder ver el banco de proyectos en estado: "reclutando") --}}
<script>
    $(document).ready(function() {
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
    $(document).ready(function() {
        $(".estadoProyecto").change(function ()
        {
            $idEstado = $(this).val()
            $idProyecto = $(this).attr("data-proyecto")

            if ($idEstado == 3 || $idEstado == 4)
            {

                $(".modalresumen").modal("show")
                $('#idEstado').val($idEstado)
                $('#idProyecto').val($idProyecto)

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
                window.location.replace("")
            }

        })
    })
</script>

{{--funcion ajax para eliminar un proyecto, pasar a estado en banco(El gestor por medio del aplicativo podrá eliminar un proyecto y de manera automática envía una notificación al usuario informando el fin del proceso y su motivo)--}}
<script>
    $(document).ready(function() {
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


</body>
</html>
