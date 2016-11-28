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
            <div class="col-sm-12">
                <div class="wizard-container">
                    <div class="card wizard-card" data-color="greenmod" id="wizardProfile">
                        <div class="wizard-header">
                            {{--<div class="cover">--}}
                            {{--<img src="/img/tecnoparque.png"/>--}}
                            <h3 class="wizard-title">
                                RED TECNOPARQUE
                            </h3>
                            <h5>Nodo Manizales</h5>
                            {{--</div>--}}
                        </div>
                        <div class="wizard-navigation">
                            <ul>
                                <li class="active"><a href="#proyectos" data-toggle="tab">PROYECTOS ACTUALES</a></li>
                            </ul>
                        </div>
                        @foreach($proyectos as $proyecto)
                        <div class="tab-content col-md-4 col-sm-6">
                                <div class="fofo card-container">
                                    <div class="card">
                                        <div class="front">
                                            <div class="cover">
                                                {{--<img src="img/rotating_card_thumb3.png"/>--}}
                                                <img src="{{$proyecto->imagen}}"/>
                                            </div>
                                            <br><br><br><br><br>
                                            <div class="content">
                                                <div class="main">
                                                    <h3 class="name">{{$proyecto->nombrep}}</h3>
                                                    <p class="text-justify">{{$proyecto->descripcion}}</p>
                                                </div>
                                            </div>
                                        </div> <!-- end front panel -->
                                        <div class="back">
                                            <div class="header">
                                                <h5 class="text-center">Sector Enfocado</h5>
                                                <p class="text-center">{{$proyecto->sectorenfocado}}</p>
                                            </div>
                                            <div class="content">
                                                <div class="main">
                                                    <h4 class="text-center">Empresa</h4>
                                                    <p class="text-center">{{$proyecto->empresa}}</p>

                                                    <div class="stats-container">
                                                        <h4 class="text-center">Estado</h4>
                                                        <p class="text-center">
                                                            @foreach($estadosproyectos as $estadoproyecto)
                                                                @if($estadoproyecto->id == $proyecto->estadosdeproyectos_id)
                                                                    {{$estadoproyecto->estado}}
                                                                @endif
                                                            @endforeach
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="footer">
                                                {{--<div class="social-links text-center">--}}
                                                    {{--<a href="" class="facebook"><i class="fa fa-facebook fa-fw"></i></a>--}}
                                                    {{--<a href="" class="google"><i class="fa fa-google-plus fa-fw"></i></a>--}}
                                                    {{--<a href="" class="twitter"><i class="fa fa-twitter fa-fw"></i></a>--}}
                                                {{--</div>--}}
                                            </div>
                                        </div> <!-- end back panel -->
                                    </div> <!-- end card -->
                                </div> <!-- end card-container -->
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

@endsection



