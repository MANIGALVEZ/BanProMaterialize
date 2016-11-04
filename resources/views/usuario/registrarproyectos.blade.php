<!--
Vista registro proyectos: El usuario por medio del aplicativo espera tener una interfaz que permita registrar su proyecto
-->

@extends('layouts.app')

@section('content')


    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">

    <article>
            <H3><center><label>Registro de Proyectos</label></center></H3>
            <br><br>
    </article>
    <form action="{{ url('/proyectos') }}" method="POST" class="form-horizontal" role="form">
    {{ csrf_field() }}


    <div class="form-group">
        <label for="nombrep" class="col-md-2 control-label">Nombre del proyecto</label>

            <div class="col-md-4">
                <input id="nombrep" type="text" class="form-control" name="nombrep" value="{{ old('nombrep') }}" autofocus required="required">
            </div>


        <label for="lineatecnologica" class="col-md-2 control-label">Linea Tecnológica</label>
            <div class="col-md-4">
                @foreach($lineas as $key => $linea)
                    <input type="checkbox" name="lineatecnologica[]" value="{{ $linea->id }}" autofocus >{{ $linea->linea }}<br>
                @endforeach
            </div>
    </div>


    <div class="form-group">
        <label for="sectorenfocado" class="col-md-2 control-label">Sector enfocado</label>

            <div class="col-md-4">
                <input id="sectorenfocado" type="text" class="form-control" name="sectorenfocado" value="{{ old('sectorenfocado') }}" autofocus required="required">
            </div>

            <label for="empresa" class="col-md-2 control-label">Empresa</label>

            <div class="col-md-4">
                <input id="empresa" type="text" class="form-control" name="empresa" value="{{ old('empresa') }}" autofocus>
            </div>
    </div>

    <br><br>
    <div class="form-group">
        <label for="descripcion" class="col-md-2 control-label">Descripción</label>
            <div class="col-md-10">
                <textarea id="descripcion" type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}" autofocus maxlength="255" ></textarea>
            </div>
    </div>
        <div class="form-group">
            <label class="control-label"></label>
            <input id="input-1" type="file" class="file" name="file">
        </div>
        <br><br><br>

    <center>
        <div class="col-md-4 col-md-offset-4">
         <button type="submit" class="btn btn-primary" name="enviar" value="enviar">
            Registrar
         </button>
        </div>
    </center>


    </form>

@endsection
