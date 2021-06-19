<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 9 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->
<head>
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
    <link href="{{url('assets/backend/css/pages/login/classic/login-4.css?v=7.0.8')}}" rel="stylesheet" type="text/css"/>
    <!--end::Page Custom Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{url('assets/backend/plugins/global/plugins.bundle.css?v=7.0.8')}}" rel="stylesheet" type="text/css"/>
    <link href="{{url('assets/backend/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.8')}}" rel="stylesheet" type="text/css"/>
    <link href="{{url('assets/backend/css/style.bundle.css?v=7.0.8')}}" rel="stylesheet" type="text/css"/>
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{url('assets/backend/css/themes/layout/header/base/light.css?v=7.0.8')}}" rel="stylesheet" type="text/css"/>
    <link href="{{url('assets/backend/css/themes/layout/header/menu/light.css?v=7.0.8')}}" rel="stylesheet" type="text/css"/>
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
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body"
      class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Login-->
    <div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
        <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat"
             style="background-image: url('assets/backend/media/bg/fondologin.jpg')">
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

                    <form class="form" action="{{ route('login') }}" method="POST" style="margin-top: 10em; margin-bottom: 10em">
                        @csrf
                        <div class="form-group mb-5">
                            <input id="email" name="email" class="form-control h-auto form-control-solid py-4 px-8"
                                   type="text" value="{{old('email')}}" placeholder="@lang('email')" autocomplete="off"/>
                        </div>
                        <div class="form-group mb-5">
                            <input class="form-control h-auto form-control-solid py-4 px-8" id="password"
                                   name="password" type="password" placeholder="@lang('Password')"/>
                        </div>
                        <div class="form-group mb-5 text-left fv-plugins-icon-container">
                            <div class="checkbox-inline">
                                <label class="checkbox m-0" style="color: black">
                                    <input type="checkbox" name="agree" onclick="showPassword()">
                                    <span></span>@lang('Mostrar contraseña')</label>
                            </div>
                            <div class="form-text text-muted text-center"></div>
                            <div class="fv-plugins-message-container"></div>
                        </div>
                        <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                            <div class="checkbox-inline">
                                <label class="checkbox m-0 text-muted"  style="color: black !important;">
                                    <input type="checkbox" name="remember"/>
                                    <span ></span>@lang('Recuerdame')</label>
                            </div>
                            <a href="/password/reset" class="text-muted text-hover-primary">@lang('Recuperar contraseña')</a>
                        </div>
                        <button type="submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4 " style="background-color: #FFE062">Entrar
                        </button>
                    </form>
                    <div class="mt-10">
                        <span class="opacity-95 mr-4" style="color: black">@lang('¿Todavia no tienes cuenta?')</span>
                        <a href="/register" id="kt_login_signup"
                           class="text-muted text-hover-primary font-weight-bold">@lang('¡Regístrate!')</a>
                    </div>
                </div>
                <!--end::Login Sign in form-->
                <!--begin::Login Sign up form-->
                <div class="login-signup">
                    <div class="mb-20">
                        <h3>Sign Up</h3>
                        <div class="text-muted font-weight-bold">Enter your details to create your account</div>
                    </div>
                    <form class="form" id="kt_login_signup_form">
                        <div class="form-group mb-5">
                            <input class="form-control h-auto form-control-solid py-4 px-8" type="text"
                                   placeholder="Fullname" name="fullname"/>
                        </div>
                        <div class="form-group mb-5">
                            <input class="form-control h-auto form-control-solid py-4 px-8" type="text"
                                   placeholder="@lang('email')" name="email" autocomplete="off"/>
                        </div>
                        <div class="form-group mb-5">
                            <input class="form-control h-auto form-control-solid py-4 px-8" type="password"
                                   placeholder="@lang('password')" name="password"/>
                        </div>
                        <div class="form-group mb-5">
                            <input class="form-control h-auto form-control-solid py-4 px-8" type="password"
                                   placeholder="Confirm Password" name="cpassword"/>
                        </div>
                        <div class="form-group mb-5 text-left">
                            <div class="checkbox-inline">
                                <label class="checkbox m-0">
                                    <input type="checkbox" name="agree"/>
                                    <span></span>I Agree the
                                    <a href="terms_and_conditions" class="font-weight-bold ml-1">terms and conditions</a>.</label>
                            </div>
                            <div class="form-text text-muted text-center"></div>
                        </div>
                        <div class="form-group d-flex flex-wrap flex-center mt-10">
                            <button class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Sign Up</button>
                            <button class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2">Cancel</button>
                        </div>
                    </form>
                </div>
                <!--end::Login Sign up form-->
                <!--begin::Login forgot password form-->
                <div class="login-forgot">
                    <div class="mb-20">
                        <h3>Forgotten Password ?</h3>
                        <div class="text-muted font-weight-bold">Enter your email to reset your password</div>
                    </div>
                    <form class="form" id="kt_login_forgot_form">
                        <div class="form-group mb-10">
                            <input class="form-control form-control-solid h-auto py-4 px-8" type="text"
                                   placeholder="Email" name="email" autocomplete="off"/>
                        </div>
                        <div class="form-group d-flex flex-wrap flex-center mt-10">
                            <button id="kt_login_forgot_submit"
                                    class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Request
                            </button>
                            <button id="kt_login_forgot_cancel"
                                    class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2">Cancel
                            </button>
                        </div>
                    </form>
                </div>
                <!--end::Login forgot password form-->
            </div>
        </div>
    </div>
    <!--end::Login-->
</div>
<style>
    a.text-hover-primary:hover, .text-hover-primary:hover {
        color: gray !important;
    }
    a.text-hover-primary, .text-hover-primary {
        color: black !important;

    }


</style>
<!--end::Main-->
<script>
 function showPassword() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
</script>
<script>var HOST_URL = "/metronic/theme/html/tools/preview";</script>
<!--begin::Global Config(global config for global JS scripts)-->
<script>var KTAppSettings = {
        "breakpoints": {"sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400},
        "colors": {
            "theme": {
                "base": {
                    "white": "#ffffff",
                    "primary": "#3699FF",
                    "secondary": "#E5EAEE",
                    "success": "#1BC5BD",
                    "info": "#8950FC",
                    "warning": "#FFA800",
                    "danger": "#F64E60",
                    "light": "#E4E6EF",
                    "dark": "#181C32"
                },
                "light": {
                    "white": "#ffffff",
                    "primary": "#E1F0FF",
                    "secondary": "#EBEDF3",
                    "success": "#C9F7F5",
                    "info": "#EEE5FF",
                    "warning": "#FFF4DE",
                    "danger": "#FFE2E5",
                    "light": "#F3F6F9",
                    "dark": "#D6D6E0"
                },
                "inverse": {
                    "white": "#ffffff",
                    "primary": "#ffffff",
                    "secondary": "#3F4254",
                    "success": "#ffffff",
                    "info": "#ffffff",
                    "warning": "#ffffff",
                    "danger": "#ffffff",
                    "light": "#464E5F",
                    "dark": "#ffffff"
                }
            },
            "gray": {
                "gray-100": "#F3F6F9",
                "gray-200": "#EBEDF3",
                "gray-300": "#E4E6EF",
                "gray-400": "#D1D3E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#7E8299",
                "gray-700": "#5E6278",
                "gray-800": "#3F4254",
                "gray-900": "#181C32"
            }
        },
        "font-family": "Poppins"
    };</script>
<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="assets/backend/plugins/global/plugins.bundle.js?v=7.0.8"></script>
<script src="assets/backend/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.8"></script>
<script src="assets/backend/js/scripts.bundle.js?v=7.0.8"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Scripts(used by this page)-->
<!--end::Page Scripts-->
</body>
<!--end::Body-->
</html>
