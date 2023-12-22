<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="Prueba tecnica Fenix">
    <meta name="author" content="john jairo">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/ico" href="{{ asset('favicon.ico')}}"/>
    <title>Fenix | Prueba Técnica </title>  
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/bootstrap_v5.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/auth.css')}}?v=<?php echo time(); ?>">
    
</head>
<body >

<div id="container" class="effect aside-float aside-bright mainnav-lg pad-no">
    <div id="loader_content" class="content_loading hidden " style="display:none"><div class="overlay_loading"></div></div>
    @yield('content')
</div>
  
</body>
</html>