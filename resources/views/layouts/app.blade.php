<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({'gtm.start': new Date().getTime(), event: 'gtm.js'});
            var f = d.getElementsByTagName(s)[0], j = d.createElement(s), dl = l != 'dataLayer' ? '&amp;l=' + l : '';
            j.async = true;
            j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5FS8GGP');</script>
    <!-- End Google Tag Manager -->
    <meta charset="utf-8"/>
    <title>{{ config('app.name') }}</title>
    <meta name="description" content="Login page example"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="canonical" href="https://keenthemes.com/metronic"/>
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <!--end::Fonts-->
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="{{url('assets/backend/css/pages/login/classic/login-4.css?v=7.0.8')}}" rel="stylesheet"
          type="text/css"/>
    <!--end::Page Custom Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{url('assets/backend/plugins/global/plugins.bundle.css?v=7.0.8')}}" rel="stylesheet" type="text/css"/>
    <link href="{{url('assets/backend/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.8')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('assets/backend/css/style.bundle.css?v=7.0.8')}}" rel="stylesheet" type="text/css"/>
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{url('assets/backend/css/themes/layout/header/base/light.css?v=7.0.8')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('assets/backend/css/themes/layout/header/menu/light.css?v=7.0.8')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{url('assets/backend/css/themes/layout/brand/dark.css?v=7.0.8')}}" rel="stylesheet" type="text/css"/>
    <link href="{{url('assets/backend/css/themes/layout/aside/dark.css?v=7.0.8')}}" rel="stylesheet" type="text/css"/>
    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="{{ url('assets/backend/media/logos/inmozon2.png') }}">
    <!-- Hotjar Tracking Code for keenthemes.com -->
    <script>(function (h, o, t, j, a, r) {
            h.hj = h.hj || function () {
                (h.hj.q = h.hj.q || []).push(arguments)
            };
            h._hjSettings = {hjid: 1070954, hjsv: 6};
            a = o.getElementsByTagName('head')[0];
            r = o.createElement('script');
            r.async = 1;
            r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
            a.appendChild(r);
        })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');</script>

</head>
<body>




                <div class="d-flex flex-column flex-root">
                    <!--begin::Login-->
                    <div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
                        <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat"
                             style="background-image: url('/assets/backend/media/bg/185f89e9f65a63321c3903fea6c287f0.jpg')">
                            <div class="login-form text-center p-7 position-relative overflow-hidden" style="background-color: #FFCD00">
                                <!--begin::Login Header-->
                                <div class="d-flex flex-center mb-15 mt-15">
                                    <a href="#">
                                        <img src="/assets/backend/media/logos/inmozon.png" class="max-h-75px" alt=""/>
                                    </a>
                                </div>
                                <!--end::Login Header-->

                                <!--begin::Login Sign in form-->
                                <div class="login-signin">
                                    <div class="mb-20">
                                        <div class="text-muted font-weight-bold"></div>
                                    </div>

                                    @if (count($errors) > 0)
                                        <div class="fv-plugins-message-container" style="color:red">
                                            @foreach ($errors->all() as $error)
                                                <p>      {!! $error !!}   </p>
                                            @endforeach
                                        </div>
                                    @endif
    <main class="py-4">
        @yield('content')
    </main>
</div>
<script src="assets/backend/plugins/global/plugins.bundle.js?v=7.0.8"></script>
<script src="assets/backend/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.8"></script>
<script src="assets/backend/js/scripts.bundle.js?v=7.0.8"></script>
</body>
</html>
