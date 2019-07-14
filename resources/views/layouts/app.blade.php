<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ShareBoard</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{asset('/')}}/sty/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}/sty/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}/sty/css/main.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}/sty/css/util.css">
</head>
<body>
    <div id="app">

        @yield('content')
    </div>

    <!--===============================================================================================-->
    <script src="{{asset('/')}}/sty/js/main.js"></script>
    <!-- Scripts -->
</body>
</html>
