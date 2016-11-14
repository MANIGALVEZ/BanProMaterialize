@extends('layouts.app')

@section('content')

</div>
    @if(count($errors) > 0)
        <script>
            swal({
                title: "�Ingreso Invalido!",
                text: "Por favor verifique la informaci�n de los campos ",
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
            {{--<nav class="navbar navbar-transparent navbar-absolute">--}}
                {{--<div class="container">--}}
                    {{--<div class="collapse navbar-collapse" id="navigation-example">--}}
                        {{--<ul class="nav navbar-nav navbar-right">--}}
                            {{--<li>--}}
                                {{--<a href="https://www.facebook.com/TecnoParque-Colombia-6102873246/" target="_blank" class="btn btn-simple btn-white btn-just-icon">--}}
                                    {{--<i class="fa fa-facebook-square"></i>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</nav>--}}
            <div class="wrapper">
                <div class="header header-filter" style="background-image: url('../img/bg3.jpeg'); background-size: cover; background-position: top center;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                                <div class="card card-signup">
                                    <form class="form" method="" action="">
                                        <div class="header header-success text-center">
                                            <h4>Ingreso</h4>
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
                                                    <label class="control-label">Contrase�a<small></small></label>
                                                    <input id="password" name="password" type="password" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="footer text-center">
                                            <center>
                                                <button type="submit" class="btn btn-simple btn-success btn-lg">Iniciar Sesion</button>
                                                <a class="btn btn-simple btn-default btn-lg" href="{{ url('/password/reset') }}">�Olvido su contrase�a?</a>
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