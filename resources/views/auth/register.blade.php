@extends('layouts.app')

@section('content')
            @if(count($errors) > 0)
                <script>
                    swal({
                        title: "Alerta!",
                        text: "Faltan campos por llenar",
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

            <div class="panel panel-default">
                <div class="panel-heading">Registro</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nombres</label>

                            <div class="col-md-6">
                                <input id="nameu" type="text" class="form-control" name="nameu" value="{{ old('nameu') }}" autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="apellidos" class="col-md-4 control-label">Apellidos</label>

                            <div class="col-md-6">
                                <input id="apellidos" type="text" class="form-control" name="apellidos" value="{{ old('apellidos') }}" autofocus>

                            </div>
                        </div>


                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Correo Electronico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="celular" class="col-md-4 control-label">Celular</label>

                            <div class="col-md-6">
                                <input id="celular" type="texto" class="form-control" name="celular" value="{{ old('celular') }}" autofocus>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="titulos" class="col-md-4 control-label">titulos</label>

                            <div class="col-md-6">
                                <input id="titulos" type="text" class="form-control" name="titulos" value="{{ old('titulos') }}" autofocus>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrarse
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

</div>
@endsection
