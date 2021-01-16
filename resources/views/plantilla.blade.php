<!DOCTYPE html>
<html>
<head>
    <title>@yield('titulo')</title>
    <!-- Bootstrap -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Logo -->
    <link rel="shortcut icon" href="{{ asset('/imgs/favicon.png') }}">
</head>
<body>
@include('partials.nav')
@yield('contenido')

<!-- Se podría incluir un footer -->
</body>
</html>
