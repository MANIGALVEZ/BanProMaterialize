@extends('layouts.app')

@section('content')


</div>



@if(count($errors) > 0)
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
            @foreach($errors->all() as $message)
                <li>{{ $message }}</li>
            @endforeach
    </div>
@endif


<body>
    <div class="image-container set-full-height" style="background-image: url('img/wizard-profile.jpg')">
        <a href="http://tecnoparque.sena.edu.co/">
            <div class="logo-container">
                <div class="logotecnoregister">
                    {{--<img src="img/tecnoparque.png">--}}
                </div>
            </div>
        </a>

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
                            <form class="" role="form" method="POST" action="{{ url('/register') }}">
                                {{ csrf_field() }}
                                <div class="wizard-header">
                                    <h3 class="wizard-title">
                                        Registro
                                    </h3>
                                    <h5>La informacion ingresada es para uso exclusivo de Tecnoparque</h5>
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
                                            <div class="col-sm-4 col-sm-offset-1">
                                                <div class="picture-container">
                                                    <div class="picture">
                                                        <img src="img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
                                                        <input type="file" accept="image/jpg" name="avatar" id="wizard-picture" value="{{old('avatar')}}">
                                                    </div>
                                                    <h6>Elegir una Foto</h6>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">face</i>
													</span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Nombres<small></small></label>
                                                        <input id="nameu" name="nameu" type="text" class="form-control" value="{{ old('nameu') }}" required>
                                                    </div>
                                                </div>

                                                <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">record_voice_over</i>
													</span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Apellidos<small></small></label>
                                                        <input id="apellidos" name="apellidos" type="text" class="form-control" value="{{ old('apellidos') }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">mail</i>
													</span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Correo Electrónico<small></small></label>
                                                        <input id="email" name="email" type="email" class="form-control" value="{{ old('email') }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="adicional">
                                        <h4 class="info-text">Continuemos con la información Adicional<br>(Todos los campos son requeridos)</h4>
                                        <div class="row">
                                            <div class="col-sm-8 col-sm-offset-2">
                                                {{--<div class="col-sm-10 col-sm-offset-1">--}}
                                                <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">smartphone</i>
													</span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Celular<small></small></label>
                                                        <input id="celular" name="celular" type="text" class="form-control" value="{{ old('celular') }}" required>
                                                    </div>
                                                </div>
                                                <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">layers</i>
													</span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Titulos<small></small></label>
                                                        <input id="titulos" name="titulos" type="text" class="form-control" value="{{ old('titulos') }}" required>
                                                    </div>
                                                </div>
                                                <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">lock</i>
													</span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Contraseña<small></small></label>
                                                        <input id="password" name="password" type="password" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">lock</i>
													</span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Confirmar Contraseña<small></small></label>
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

        <div class="footer">
            <div class="container text-center">
                Hecho con <i class="fa fa-heart heart"></i> por <a href="">Henry Parra & Yonathan Gálvez</a> para Tecnoparque <a href="http://tecnoparque.sena.edu.co/"></a>
            </div>
        </div>
    </div>
</body>

@endsection
