@extends('layouts.app')

@section('content')

</div>


<body>
<div class="image-container set-full-height" style="background-image: url('img/office1.jpeg')">

    <!--  Slider  -->
    <a href="http://tecnoparque.sena.edu.co/" class="made-with-mk">
        <div class="material-icons">copyright</div>
        <div class="made-with">Hecho Para <strong>Tecnoparque</strong></div>
    </a>

    <!--   Big container   -->
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="wizard-container">
                    <div class="card wizard-card" data-color="green" id="wizardProfile">
                        <div class="wizard-header">
                            <h3 class="wizard-title">
                                Red Tecnoparque Colombia
                            </h3>
                            <h5>Regional Caldas</h5>
                        </div>
                        <div class="wizard-navigation">
                            <ul>
                                <li class="active"><a href="#proyectos" data-toggle="tab">Proyectos</a></li>
                            </ul>
                        </div>
                        <div class="tab-content col-sm-6 col-sm-offset-3">
                            @foreach($proyectos as $row)
                            <div class="card-container">
                                <div class="card">
                                    <div class="front">
                                        <div class="cover">
                                            {{--<img src="img/rotating_card_thumb3.png"/>--}}
                                            <img src="{{$row->imagen}}"/>
                                        </div>
                                        <br><br><br><br><br>
                                        <div class="content">
                                            <div class="main">
                                                <h3 class="name">{{$row->nombrep}}</h3>
                                                <p class="text-justify">{{$row->descripcion}}</p>
                                            </div>
                                        </div>
                                    </div> <!-- end front panel -->
                                    <div class="back">
                                        <div class="header">
                                            <h5 class="text-center">Sector Enfocado</h5>
                                            <p class="text-center">{{$row->sectorenfocado}}</p>
                                        </div>
                                        <div class="content">
                                            <div class="main">
                                                <h4 class="text-center">Empresa</h4>
                                                <p class="text-center">{{$row->empresa}}</p>

                                                <div class="stats-container">
                                                    <h4 class="text-center">Estado</h4>
                                                    <p class="text-center">
                                                        <?php $estados = DB::table("estadosdeproyectos")->get(); ?>
                                                        <?php $actualizarestados = DB::table("proyectos")->where("estadosdeproyectos_id", $row->estadosdeproyectos_id)->get(); ?>
                                                        @foreach($estados as $estado)
                                                            @if($estado->id == $row->estadosdeproyectos_id)
                                                                {{$estado->estado}}
                                                            @endif
                                                        @endforeach
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="footer">
                                            <div class="social-links text-center">
                                                <a href="" class="facebook"><i class="fa fa-facebook fa-fw"></i></a>
                                                <a href="" class="google"><i class="fa fa-google-plus fa-fw"></i></a>
                                                <a href="" class="twitter"><i class="fa fa-twitter fa-fw"></i></a>
                                            </div>
                                        </div>
                                    </div> <!-- end back panel -->
                                </div> <!-- end card -->
                            </div> <!-- end card-container -->
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

@endsection



