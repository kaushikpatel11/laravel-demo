<!DOCTYPE html>
<html>
<head>
    <title>Inmozon</title>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/assets/frontend/img/foot-logo.png">
    <meta name="viewport" content="width=320, initial-scale=1">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ url('assets/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/frontend/css/owl.theme.default.min.css') }}">
    <script type="text/javascript" src="{{ url('assets/frontend/js/jquery-3.5.1.min.js') }}"></script>

    @yield('css')
</head>
