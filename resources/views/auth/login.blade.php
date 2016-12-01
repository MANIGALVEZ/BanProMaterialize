@extends('layouts.app')

@section('content')


@if(count($errors) > 0)
    <script>
        swal({
            title: "¡Ingreso Invalido!",
            text: "Por favor verifique la información de los campos",
            type: "error",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Aceptar"});
    </script>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button class="close" data-dismiss="alert">&times;</button>

        @foreach($errors->all() as $message)
            <li>{{ $message }}</li>
        @endforeach
    </div>


@endif


<div class="panel-body">

    <form class="" role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}

        <body class="signup-page">

            <!--  Slider  -->
            <a href="http://tecnoparque.sena.edu.co/" class="made-with-mk">
                <div class="material-icons">copyright</div>
                <div class="made-with">Hecho Para <strong>Tecnoparque</strong></div>
            </a>

            <div class="wrapper">
                <div class="header header-filter" style="background-image: url('../img/40.jpg'); background-size: cover; background-position: top center;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                                <div class="card card-signup">
                                    <form class="form" method="" action="">
                                        <div class="header header-successmod text-center">
                                            <h3>Ingreso</h3>
                                        </div>
                                        <div class="content">
                                            <br><br>
                                            <div class="input-group">
													<span class="input-group-addon{{ $errors->has('email') ? ' has-error' : '' }}">
														<i class="material-icons">email</i>
													</span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Correo<small></small></label>
                                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                                                </div>
                                            </div>
                                            <div class="input-group">
													<span class="input-group-addon{{ $errors->has('password') ? ' has-error' : '' }}">
														<i class="material-icons">lock</i>
													</span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Contraseña<small></small></label>
                                                    <input id="password" name="password" type="password" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="footer text-center">
                                            <center>
                                                <button type="submit" class="btn btn-simple btn-success btn-lg">Iniciar Sesion</button>
                                                <p>o</p>
                                                <a href="{{ url('/register') }}" type="button" class="btn btn-info btn-simple btn-lg">Registrarse</a>
                                            </center>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </form>
</div>


@endsection