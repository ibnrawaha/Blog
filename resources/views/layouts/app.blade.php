<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>KIK Blog</title>
    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> --}}

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Rancho|Yellowtail" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    {{-- <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'> --}}
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    {{-- <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'> --}}
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/agency.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Slick Slider -->
    <link href="{{ asset('slick/slick.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('slick/slick-theme.css') }}" rel="stylesheet" type="text/css">
    
    <!-- App style adjustments -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">


</head>
<body>

    @include('inc.nav')

    
    <header class="masthead">
        @yield('header')
    </header>

    @if (Route::currentRouteName() == "")
        @include('inc.message')
        @yield('content')
    
    @else
    
    <div id="app">
        <div class="container">
            @include('inc.message')
            @yield('content')
        </div>
    </div>
    
    @endif

   



@include ('inc.footer')
