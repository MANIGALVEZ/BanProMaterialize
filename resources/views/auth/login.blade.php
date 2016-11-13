@extends('layouts.app')

@section('content')


    @if(count($errors) > 0)
        <script>
            swal({
                title: "Alerta!",
                text: "Faltan campos obligatorios",
                type: "warning",
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
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container">
                    <div class="collapse navbar-collapse" id="navigation-example">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="https://www.facebook.com/TecnoParque-Colombia-6102873246/" target="_blank" class="btn btn-simple btn-white btn-just-icon">
                                    <i class="fa fa-facebook-square"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="wrapper">
                <div class="header header-filter" style="background-image: url('../img/bg3.jpeg'); background-size: cover; background-position: top center;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                                <div class="card card-signup">
                                    <form class="form" method="" action="">
                                        <div class="header header-success text-center">
                                            <h4>Ingresar</h4>
                                            <div class="social-line">
                                                <a href="#" class="btn btn-simple btn-just-icon">
                                                    <i class="fa fa-facebook-square"></i>
                                                </a>
                                                <a href="#" class="btn btn-simple btn-just-icon">
                                                    <i class="fa fa-twitter"></i>
                                                </a>
                                                <a href="#" class="btn btn-simple btn-just-icon">
                                                    <i class="fa fa-google-plus"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <br><br>
                                            <div class="input-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">email</i>
                                                    </span>
                                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email...">
                                            </div>
                                            <br>
                                            <div class="input-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">lock_outline</i>
                                                    </span>
                                                <input id="password" type="password" class="form-control" name="password" placeholder="Password...">
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="footer text-center">
                                            <button type="submit" class="btn btn-simple btn-success btn-lg">Iniciar Sesion</button>
                                            <a class="btn btn-simple btn-default btn-lg" href="{{ url('/password/reset') }}">¿Olvido su contraseña?</a>
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