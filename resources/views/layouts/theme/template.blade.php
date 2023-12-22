<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="john jairo aguilar">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Inicio') | Fenix</title>

    <link rel="icon" type="image/ico" href="{{ asset('favicon.ico')}}"/>
    
    <!-- <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/bootstrap_v5.min.css')}}"> -->

    <script src="{{asset('assets/js/jQuery.v3.2.1.js')}}"></script>
    
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/bootstrap.min.css')}}">
    @yield('Css_')
    <!-- <link rel="stylesheet" href="{{asset(env('URL_PUBLIC_FILES','assets')) }}<?php echo '/website/icofont/icofont.min.css' ?>"> -->
    
    <link rel="stylesheet" href="{{asset('assets/master.css')}}">
    <!--<link rel="stylesheet" href="{{asset(env('URL_PUBLIC_FILES','assets'))}}<?php echo '/components/theme/probienestar.min.css'?>?v=<?php echo date('Y').date('m').date('d'); ?>"></script>
    <link rel="stylesheet" href="{{asset(env('URL_PUBLIC_FILES','assets')) }}<?php echo '/components/theme/dashboard.css' ?>?v=202305020244"> -->

    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
 
    <!-- <script src="{{asset(env('URL_PUBLIC_FILES','assets'))}}<?php echo '/website/jsCookie.js' ?>"></script> -->
    
    
    @yield('Js_')
    <script src="https://example.com/fontawesome/v6.5.1/js/all.js" ></script>
    <script src="{{asset('assets/js/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
	<script src="{{asset('assets/js/bootstrap-notify/jnotifys.min.js')}}"></script>
    
</head>
<body><div class=" xtheme_ ">
    <!-- <div id="loading" class="sload">
    <div class="content-loader"> <div class="overlay_loading"></div> </div>
    <div class="title"> Cargando </div>
    <div class="info"> Espere un momento mientras se carga la información </div>
    </div> -->

    <div id="content_dashboard" class="p-default-theme x-content-dash row g-0 "> 
        @include('layouts.theme.menu')
    
        <div id="menu-left-block" class="menu-items-block">
            <div class="menu-items-body">
                @include('layouts.theme.sidebar')
            </div>
        </div>

        <div class="_plcontent pbchm_" >
            <div class="content" >
                @yield('jContent')
                @include("layouts.theme.footer") 
            </div>
        </div>

    </div>
    <script> 
        $('.menu-items-body #mainnav-menu .item-list-menu a ').hover(function() {
            $('#menu-left-block').removeClass("menu-items-block"); 
            $('#menu-left-block').addClass("menu-items-block-opend");  
            $('.menu-items-body #mainnav-menu .item-list-menu a b').removeClass('lbl_item_menu');
        },
         function () {
            $('#menu-left-block').removeClass("menu-items-block-opend"); 
            $('#menu-left-block').addClass("menu-items-block");  
            $('.menu-items-body #mainnav-menu .item-list-menu a b').addClass('lbl_item_menu');
        }); 
    </script>
</div></body>
</html>