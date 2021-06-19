<!DOCTYPE html>

<head>
    <base href="">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=320, initial-scale=1">
    <title>{{config('app.name')}}</title>
    <meta name="description" content="Updates and statistics" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{ asset('assets/backend/plugins/custom/fullcalendar/fullcalendar.bundle.css?v=7.0.5') }}" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{ url('assets/backend/plugins/global/plugins.bundle.css?v=7.0.5') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/backend/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.5') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/backend/css/style.bundle.css?v=7.0.5') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->

    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{ url('assets/backend/css/themes/layout/header/base/light.css?v=7.0.5') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/backend/css/themes/layout/header/menu/light.css?v=7.0.5') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/backend/css/themes/layout/brand/dark.css?v=7.0.5') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/backend/css/themes/layout/aside/dark.css?v=7.0.5') }}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="{{ url('assets/backend/media/logos/inmozon2.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">

    <!--end::Layout Themes-->

        @yield('css')
</head>
