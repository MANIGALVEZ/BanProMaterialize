@extends('layouts.app')

@section('content')
    <div class="page-header">
    <h1 class="text-center text-muted">Pagina de inicio <small>Laravel 5.3</small></h1>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Proyectos</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="holder.js/300x200?theme=lava">
                        <div class="caption">
                            <h3>Proyecto 1</h3>
                            <p>Lorem ipsum dolor sit amet.</p>
                            <p><a href="#" class="btn btn-primary btn-block" role="button">
                                    <i class="glyphicon glyphicon-search"></i>Ver</a></p>
                        </div>
                    </div>
                </div>
                {{--...................................................... --}}
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="holder.js/300x200?theme=lava">
                        <div class="caption">
                            <h3>Proyecto 1</h3>
                            <p>Lorem ipsum dolor sit amet.</p>
                            <p><a href="#" class="btn btn-primary btn-block" role="button">
                                    <i class="glyphicon glyphicon-search"></i>Ver</a></p>
                        </div>
                    </div>
                </div>
                {{--...................................................... --}}
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="holder.js/300x200?theme=lava">
                        <div class="caption">
                            <h3>Proyecto 1</h3>
                            <p>Lorem ipsum dolor sit amet.</p>
                            <p><a href="#" class="btn btn-primary btn-block" role="button">
                                    <i class="glyphicon glyphicon-search"></i>Ver</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection