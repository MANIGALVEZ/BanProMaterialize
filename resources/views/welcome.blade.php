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
                    {{--<div class="card wizard-card" data-color="green" id="wizardProfile">--}}
                        <div class="wizard-header letrablancadiv">
                            <h3 class="letrablancadiv">
                                Registro
                            </h3>
                            <h5>La informacion ingresada es para uso exclusivo de Tecnoparque</h5>
                        </div>
                    <div class="title-area">
                    <h1 class="title-modern">Red Tecnoparque Colombia</h1>
                    <h3>Regional Caldas</h3>
                    <div class="separator line-separator">?</div>
                    </div>
                    {{--<div class="container">--}}
                    {{--<div class="content">--}}
                    {{--<div class="title-area">--}}
                    {{--<h1 class="title-modern">Red Tecnoparque Colombia</h1>--}}
                    {{--<h3>Regional Caldas</h3>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
{{--</div>--}}
</div>
</div>
</div>
</div>
</div>
</body>

    {{--<div class="page-header">--}}
    {{--<h1 class="text-center text-muted">Red Tecnoparque Colombia--}}
        {{--<br>--}}
        {{--<small>Nodo Manizales</small>--}}
    {{--</h1>--}}
    {{--</div>--}}

    {{--<div class="panel panel-default">--}}
        {{--<div class="panel-heading">--}}
            {{--<h3 class="text-center text-muted">Proyectos</h3>--}}
        {{--</div>--}}
        {{--<div class="panel-body">--}}
            {{--<div class="row">--}}
                {{--<?php $query = DB::table("proyectos")->get(); ?>--}}
                {{--@foreach($query as $row)--}}
                {{--<div class="col-sm-6 col-md-4">--}}
                    {{--<div class="thumbnail">--}}
                        {{--<div class="tamanoimagen">--}}
                        {{--<img src="{{$row->imagen}}">--}}
                        {{--</div>--}}
                        {{--<div class="caption">--}}
                            {{--<h3>{{$row->nombrep}}</h3>--}}
                            {{--<p>{{$row->resumen}}</p>--}}
                            {{--<p><a href="#" class="btn btn-success btn-block" role="button" data-toggle="tooltip" data-placement="top" title="Ver">--}}
                                    {{--<i class="glyphicon glyphicon-search"></i></a></p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--...................................................... --}}
                {{--<div class="col-sm-6 col-md-4">--}}
                    {{--<div class="thumbnail">--}}
                        {{--<img src="holder.js/300x200?theme=gray">--}}
                        {{--<div class="caption">--}}
                            {{--<h3>Proyecto 2</h3>--}}
                            {{--<p>Lorem ipsum dolor sit amet.</p>--}}
                            {{--<p><a href="#" class="btn btn-success btn-block" role="button" data-toggle="tooltip" data-placement="top" title="Ver">--}}
                                    {{--<i class="glyphicon glyphicon-search"></i></a></p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--...................................................... --}}
                {{--<div class="col-sm-6 col-md-4">--}}
                    {{--<div class="thumbnail">--}}
                        {{--<img src="holder.js/300x200?theme=gray">--}}
                        {{--<div class="caption">--}}
                            {{--<h3>Proyecto 3</h3>--}}
                            {{--<p>Lorem ipsum dolor sit amet.</p>--}}
                            {{--<p><a href="#" class="btn btn-success btn-block" role="button" data-toggle="tooltip" data-placement="top" title="Ver">--}}
                                    {{--<i class="glyphicon glyphicon-search"></i></a></p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                    {{--@endforeach--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}






{{--<body>--}}
{{--<nav class="navbar navbar-success navbar-transparent navbar-fixed-top" color-on-scroll="100">--}}
{{--</nav>--}}
{{--<div class="section section-header">--}}
    {{--<div class="parallax filter">--}}
        {{--<div class="image"--}}
             {{--style="background-image: url('img/office1.jpeg')">--}}
        {{--</div>--}}
        {{--<div class="container">--}}
            {{--<div class="content">--}}
                {{--<div class="title-area">--}}
                    {{--<h1 class="title-modern">Red Tecnoparque Colombia</h1>--}}
                    {{--<h3>Regional Caldas</h3>--}}
                    {{--<div class="separator line-separator">?</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

{{--<div class="section">--}}
    {{--<div class="">--}}
    {{--<div class="container">--}}
    {{--<div class="content">--}}
        {{--<div class="row">--}}
            {{--<div class="title-area">--}}
                {{--<h2>Proyectos</h2>--}}
                {{--<div class="separator">?</div>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="team">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-10 col-md-offset-1">--}}
                    {{--<div class="row">--}}
                        {{--<?php $query = DB::table("proyectos")->get(); ?>--}}
                        {{--@foreach($query as $row)--}}
                            {{--<div class="col-md-4">--}}
                                {{--<div class="card card-member">--}}
                                    {{--<div class="content">--}}
                                        {{--<div class="tamanoimagen">--}}
                                            {{--<img alt="..." class="" src="{{$row->imagen}}"/>--}}
                                        {{--</div>--}}
                                        {{--<div class="description">--}}
                                            {{--<h3 class="title">{{$row->nombrep}}</h3>--}}
                                            {{--<p class="small-text"></p>--}}
                                            {{--<p class="description">{{$row->resumen}}</p>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--@endforeach--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

{{--<div class="section section-small section-get-started">--}}
    {{--<div class="parallax filter">--}}
        {{--<div class="image"--}}
             {{--style="background-image: url('img/caballo.jpeg')">--}}
        {{--</div>--}}
        {{--<div class="container">--}}
            {{--<div class="title-area">--}}
                {{--<h2 class="text-white">Lineas Tecnológicas</h2>--}}
                {{--<div class="separator line-separator">?</div>--}}
            {{--</div>--}}

            {{--<div class="row">--}}
                {{--<div class="col-md-4">--}}
                    {{--<div class="info-icon">--}}
                        {{--<div class="icon text-danger">--}}
                            {{--<i class=""></i>--}}
                        {{--</div>--}}
                        {{--<h3>Biotecnología y Nanotecnología</h3>--}}
                        {{--<p class="text-white">La Línea de Desarrollo de Biotecnología de TecnoParque Colombia tiene por objetivo--}}
                            {{--acelerar proyectos de base tecnológica en las siguientes áreas: Industrial, Animal y vegetal, Agroindustria (alimentaria y no alimentaria) y Nanotecnología (tecnologías limpias y nuevos  materiales).--}}
                            {{--- Energías alternativas.--}}
                        {{--</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-4">--}}
                    {{--<div class="info-icon">--}}
                        {{--<div class="icon text-danger">--}}
                            {{--<i class="pe-7s-note2"></i>--}}
                        {{--</div>--}}
                        {{--<h3>lorem</h3>--}}
                        {{--<p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad architecto aut commodi consequatur cupiditate eos error eum facilis id iste minima nemo officia, omnis porro recusandae repellat suscipit vitae voluptatem?</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-4">--}}
                    {{--<div class="info-icon">--}}
                        {{--<div class="icon text-danger">--}}
                            {{--<i class="pe-7s-music"></i>--}}
                        {{--</div>--}}
                        {{--<h3>lorem</h3>--}}
                        {{--<p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid asperiores corporis culpa cum cupiditate debitis expedita fugit illo maxime minus molestiae nemo nihil nulla placeat quod, quos reprehenderit suscipit voluptates.</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="section">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="title-area">--}}
                    {{--<h2>Lineas Tecnológicas</h2>--}}
                    {{--<div class="separator">?</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-4">--}}
                    {{--<div class="info-icon">--}}
                        {{--<div class="icon text-danger">--}}
                            {{--<i class=""></i>--}}
                        {{--</div>--}}
                        {{--<h3>Biotecnología y Nanotecnología</h3>--}}
                        {{--<p class="description">La Línea de Desarrollo de Biotecnología de TecnoParque Colombia tiene por objetivo--}}
                            {{--acelerar proyectos de base tecnológica en las siguientes áreas: Industrial, Animal y vegetal, Agroindustria (alimentaria y no alimentaria) y Nanotecnología (tecnologías limpias y nuevos  materiales).--}}
                            {{--- Energías alternativas.--}}
                        {{--</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-4">--}}
                    {{--<div class="info-icon">--}}
                        {{--<div class="icon text-danger">--}}
                            {{--<i class="pe-7s-note2"></i>--}}
                        {{--</div>--}}
                        {{--<h3>lorem</h3>--}}
                        {{--<p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad architecto aut commodi consequatur cupiditate eos error eum facilis id iste minima nemo officia, omnis porro recusandae repellat suscipit vitae voluptatem?</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-4">--}}
                    {{--<div class="info-icon">--}}
                        {{--<div class="icon text-danger">--}}
                            {{--<i class="pe-7s-music"></i>--}}
                        {{--</div>--}}
                        {{--<h3>lorem</h3>--}}
                        {{--<p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid asperiores corporis culpa cum cupiditate debitis expedita fugit illo maxime minus molestiae nemo nihil nulla placeat quod, quos reprehenderit suscipit voluptates.</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--</body>--}}


{{--<div class="team">--}}
{{--<div class="row">--}}
{{--<div class="col-md-4 col-md-offset-2">--}}
    {{--<div class="row">--}}
        {{--<?php $query = DB::table("proyectos")->get(); ?>--}}
        {{--@foreach($query as $row)--}}
            {{--<div class="card-container">--}}
                {{--<div class="card">--}}
                    {{--<div class="front">--}}
                        {{--<div class="cover">--}}
                            {{--<img src="img/rotating_card_thumb3.png"/>--}}
                        {{--</div>--}}
                        {{--<div class="user">--}}
                            {{--<img class="img-circle" src="img/rotating_card_profile.png"/>--}}
                        {{--</div>--}}
                        {{--<div class="content">--}}
                            {{--<div class="main">--}}
                                {{--<h3 class="name">Inna Corman</h3>--}}
                                {{--<p class="profession">Product Manager</p>--}}

                                {{--<p class="text-center">"I'm the new Sinatra, and since I made it here I can make it anywhere, yeah, they love me everywhere"</p>--}}
                            {{--</div>--}}
                            {{--<div class="footer">--}}
                                {{--<div class="rating">--}}
                                    {{--<i class="fa fa-mail-forward"></i> Auto Rotation--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div> <!-- end front panel -->--}}
                    {{--<div class="back">--}}
                        {{--<div class="header">--}}
                            {{--<h5 class="motto">"To be or not to be, this is my awesome motto!"</h5>--}}
                        {{--</div>--}}
                        {{--<div class="content">--}}
                            {{--<div class="main">--}}
                                {{--<h4 class="text-center">Job Description</h4>--}}
                                {{--<p class="text-center">Web design, Adobe Photoshop, HTML5, CSS3, Corel and many others...</p>--}}

                                {{--<div class="stats-container">--}}
                                    {{--<div class="stats">--}}
                                        {{--<h4>235</h4>--}}
                                        {{--<p>--}}
                                            {{--Followers--}}
                                        {{--</p>--}}
                                    {{--</div>--}}
                                    {{--<div class="stats">--}}
                                        {{--<h4>114</h4>--}}
                                        {{--<p>--}}
                                            {{--Following--}}
                                        {{--</p>--}}
                                    {{--</div>--}}
                                    {{--<div class="stats">--}}
                                        {{--<h4>35</h4>--}}
                                        {{--<p>--}}
                                            {{--Projects--}}
                                        {{--</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="footer">--}}
                            {{--<div class="social-links text-center">--}}
                                {{--<a href="http://creative-tim.com" class="facebook"><i class="fa fa-facebook fa-fw"></i></a>--}}
                                {{--<a href="http://creative-tim.com" class="google"><i class="fa fa-google-plus fa-fw"></i></a>--}}
                                {{--<a href="http://creative-tim.com" class="twitter"><i class="fa fa-twitter fa-fw"></i></a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div> <!-- end back panel -->--}}
                {{--</div> <!-- end card -->--}}
            {{--</div> <!-- end card-container -->--}}
        {{--@endforeach--}}
    {{--</div> <!-- end card-container -->--}}
{{--</div> <!-- end card-container -->--}}
{{--</div> <!-- end card-container -->--}}
{{--</div> <!-- end card-container -->--}}
@endsection



