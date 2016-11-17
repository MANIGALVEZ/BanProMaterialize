
@extends('layouts.app')
@section('content')

{{--</div>--}}

    {{--<article>--}}
        {{--<div class="page-header">--}}
            {{--<h1 class="text-center text-muted">Registro de Proyectos</h1>--}}
        {{--</div>--}}
    {{--</article>--}}

    {{--<form action="{{ url('/proyectos') }}" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">--}}
    {{--{{ csrf_field() }}--}}


    {{--<div class="form-group">--}}
        {{--<label for="nombrep" class="col-md-2 control-label">Nombre del proyecto</label>--}}

            {{--<div class="col-md-4">--}}
                {{--<input id="nombrep" type="text" class="form-control" name="nombrep" value="{{ old('nombrep') }}" autofocus required="required">--}}
            {{--</div>--}}


        {{--<label for="lineatecnologica" class="col-md-2 control-label">Linea Tecnológica</label>--}}
            {{--<div class="col-md-4">--}}
                {{--@foreach($lineas as $key => $linea)--}}
                    {{--<input id="linea{{ $linea->id }}" type="checkbox" name="lineatecnologica[]" value="{{ $linea->id }}">--}}
                    {{--<label for="linea{{ $linea->id }}">{{ $linea->linea }}</label><br>--}}
                {{--@endforeach--}}
            {{--</div>--}}


        {{--<div class="checkbox">--}}

                    {{--@foreach($lineas as $key => $linea)--}}
                        {{--<input id="linea{{ $linea->id }}" type="checkbox" name="lineatecnologica[]" value="{{ $linea->id }}">--}}
                        {{--<label for="linea{{ $linea->id }}">{{ $linea->linea }}</label><br>--}}
                    {{--@endforeach--}}

        {{--</div>--}}
    {{--</div>--}}


    {{--<div class="form-group">--}}
        {{--<label for="sectorenfocado" class="col-md-2 control-label">Sector enfocado</label>--}}

            {{--<div class="col-md-4">--}}
                {{--<input id="sectorenfocado" type="text" class="form-control" name="sectorenfocado" value="{{ old('sectorenfocado') }}" autofocus required="required">--}}
            {{--</div>--}}

            {{--<label for="empresa" class="col-md-2 control-label">Empresa</label>--}}

            {{--<div class="col-md-4">--}}
                {{--<input id="empresa" type="text" class="form-control" name="empresa" value="{{ old('empresa') }}" autofocus>--}}
            {{--</div>--}}
    {{--</div>--}}

    {{--<br><br>--}}
    {{--<div class="form-group">--}}
        {{--<label for="descripcion" class="col-md-2 control-label">Descripción</label>--}}
            {{--<div class="col-md-10">--}}
                {{--<textarea id="descripcion" type="text" class="form-control" placeholder="Por favor escriba una breve descripción" rows="5" name="descripcion" value="{{ old('descripcion') }}" autofocus maxlength="255" ></textarea>--}}
            {{--</div>--}}
    {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--<label class="control-label"></label>--}}
            {{--<input  type="file" class="file" name="image" accept="image/jpg">--}}
        {{--</div>--}}
        {{--<br><br><br>--}}

    {{--<center>--}}
        {{--<div class="col-md-4 col-md-offset-4">--}}
         {{--<button type="submit" class="btn btn-success" name="enviar" value="enviar">--}}
            {{--Registrar--}}
         {{--</button>--}}
        {{--</div>--}}
    {{--</center>--}}


    {{--</form>--}}



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
                            <form action="{{ url('/proyectos') }}" method="POST" role="form" enctype="multipart/form-data">
                                {{ csrf_field() }}
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
                                        <li><a href="#imagen" data-toggle="tab">Imagen</a></li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane" id="informacion">
                                        <div class="row">
                                            <h4 class="info-text">Comencemos con la información básica <br>(Todos los campos son requeridos)</h4>
                                            <br>
                                            <div class="col-sm-8 col-sm-offset-2">
                                                <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">developer_board</i>
													</span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Nombre del Proyecto<small></small></label>
                                                        <input id="nombrep" type="text" class="form-control" name="nombrep" value="{{ old('nombrep') }}" required>
                                                    </div>
                                                </div>

                                                <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">business_center</i>
													</span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Sector<small></small></label>
                                                        <input id="sectorenfocado" type="text" class="form-control" name="sectorenfocado" value="{{ old('sectorenfocado') }}" required>
                                                    </div>
                                                </div>

                                                <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">business</i>
													</span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Empresa<small></small></label>
                                                        <input id="empresa" type="text" class="form-control" name="empresa" value="{{ old('empresa') }}" required>
                                                    </div>
                                                </div>

                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">description</i>
                                                    </span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Descripción<small></small></label>
                                                        <textarea id="descripcion" type="text" class="form-control" placeholder="" rows="5" name="descripcion" value="{{ old('descripcion') }}" autofocus maxlength="255" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="lineatecnologica">
                                        <h4 class="info-text">Por favor seleccione uno o varios item<br>(Al menos un campo es requerido)</h4>
                                        <div class="row">
                                            <div class="col-sm-10 col-sm-offset-1">

                                                <label for="lineatecnologica" class="col-md-2 control-label">Linea Tecnológica</label>
                                                <div class="col-md-4">
                                                    @foreach($lineas as $key => $linea)
                                                        <input id="linea{{ $linea->id }}" type="checkbox" name="lineatecnologica[]" value="{{ $linea->id }}">
                                                        <label for="linea{{ $linea->id }}">{{ $linea->linea }}</label><br>
                                                    @endforeach
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="choice" data-toggle="wizard-checkbox">
                                                        <input type="checkbox" name="jobb" value="Design">
                                                        <div class="icon">
                                                            <i class="fa fa-pencil"></i>
                                                        </div>
                                                        <h6>Design</h6>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="choice" data-toggle="wizard-checkbox">
                                                        <input type="checkbox" name="jobb" value="Code">
                                                        <div class="icon">
                                                            <i class="fa fa-terminal"></i>
                                                        </div>
                                                        <h6>Code</h6>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="choice" data-toggle="wizard-checkbox">
                                                        <input type="checkbox" name="jobb" value="Develop">
                                                        <div class="icon">
                                                            <i class="fa fa-laptop"></i>
                                                        </div>
                                                        <h6>Develop</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="imagen">
                                        <div class="row">
                                            <h4 class="info-text">Por favor seleccione una imagen<br>(Una vez este aprobado el proyecto, aparecerá en la interfaz principal)</h4>
                                                <div class="col-sm-8 col-sm-offset-2">
                                                    <div class="picture-container">
                                                        <div class="picture">
                                                            <img src="img/picture.png" class="picture-src" id="wizardPicturePreview" title=""/>
                                                            <input type="file" id="wizard-picture">
                                                        </div>
                                                        <h6>Seleccione una imagen</h6>
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
