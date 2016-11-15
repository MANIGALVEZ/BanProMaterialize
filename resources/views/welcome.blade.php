@extends('layouts.app')

@section('content')
    <div class="page-header">
    <h1 class="text-center text-muted">Red Tecnoparque Colombia
        <br>
        <small>Nodo Manizales</small>
    </h1>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="text-center text-muted">Proyectos</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="imagenes/proyectos/holi.jpg">
                        <div class="caption">
                            <h3>Proyecto 1</h3>
                            <p>Lorem ipsum dolor sit amet.</p>
                            <p><a href="#" class="btn btn-success btn-block" role="button" data-toggle="tooltip" data-placement="top" title="Ver">
                                    <i class="glyphicon glyphicon-search"></i></a></p>
                        </div>
                    </div>
                </div>
                {{--...................................................... --}}
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="holder.js/300x200?theme=gray">
                        <div class="caption">
                            <h3>Proyecto 2</h3>
                            <p>Lorem ipsum dolor sit amet.</p>
                            <p><a href="#" class="btn btn-success btn-block" role="button" data-toggle="tooltip" data-placement="top" title="Ver">
                                    <i class="glyphicon glyphicon-search"></i></a></p>
                        </div>
                    </div>
                </div>
                {{--...................................................... --}}
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="holder.js/300x200?theme=gray">
                        <div class="caption">
                            <h3>Proyecto 3</h3>
                            <p>Lorem ipsum dolor sit amet.</p>
                            <p><a href="#" class="btn btn-success btn-block" role="button" data-toggle="tooltip" data-placement="top" title="Ver">
                                    <i class="glyphicon glyphicon-search"></i></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection