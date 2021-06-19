@extends('frontend.layouts.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('assets/frontend/css/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/assets/frontend/css/fontawesome.css') }}">
@endsection

@section('content')

    <body>

    <div id="myModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <video id="video" width="100%" height="100%" controls>
                    <source src="/assets/frontend/video/Inmozon.mp4" type="video/mp4">
                </video>
            </div>
        </div>
    </div>
    <div id="section1">
        <div class="head-bg">
            <div class="container px-0 px-sm-2 pt-sm-4">
                <nav class="navbar navbar-expand-xl bg-blue py-xl-0 navbar-dark" id="custome-nav"
                     style="height: 4em;">
                    {{--  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav"
                              aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
                          <img src="/assets/frontend/img/icons/nav-toggle.svg" class="navbar-toggler-icon">
                      </button>--}}
                    <a class="navbar-brand" href="/">
                        <img src="/assets/frontend/img/icons/logo.svg" class="logo">
                    </a>
                    <div class="m-auto quit-movil" id="main-nav">
                        <h1 class="m-auto font-weight-bold">
                            ¿Tienes tu casa a la venta?</h1>
                    </div>
                    <div class="nav-call">
                        <a href="tel:609857304" class="nav-link">
                            <div class="call">
                                <img src="/assets/frontend/img/icons/call.svg">
                                LLAMANOS
                            </div>
                            609 857 304
                        </a>
                    </div>
                </nav>
                <div class="col-lg-12 mt-2 d-flex flex-column">
                    <div class="p-3 head-main-texts mt-md-4 mt-lg-5 ">
                        <h1 class="text-center black font-weight-bold quit-pc">
                            ¿Tienes tu casa a la venta?</h1>
                        <h2 class="text-center black font-weight-bold"
                        >
                            Véndela más rápido con INMOZON</h2>
                        {{--<div class="playicon text-center">
                            <button type="button" class="btn" data-toggle="modal" data-target=".bd-example-modal-lg"
                                    style="margin-top: 0em; box-shadow: none;">
                                <figure>
                                    <img src="/assets/frontend/img/play.png">
                                    <p class="white">ver vídeo</p>
                                </figure>
                            </button>
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <section class="about-us">
            {{--<h3 class="text-center my-3 my-lg-5 font-weight-bold pt-5">
                <span class="black">¡Vender con nosotros es</span>
                <span class="orange">sinónimo de éxito!</span>
            </h3>
            <p class="text-center">En INMOZON somos un grupo de profesionales del sector inmobilario con una larga
                trayectoria y muchos años de <br>
                experiencia a nuestras espaldas. Confiamos de pleno en la profesionalidad de este sector y estamos
                firmemente<br>
                convencidos de que la mejor opción a la hora de vender tu vivienda es la de contratar a los mejores
                dentro
                de su campo.</p>--}}

            <div class="row row-eq-height my-3 my-lg-5 text-center">
                <!-- FOR LAPTOP ANY LARGE SCREEN ONLY -->
                <div class="col-lg-4 p-3 d-none d-md-block">
                    <div class="serv-box p-3 back-img">
                        <h4 class="orange font-weight-bold" style="margin-bottom: 2em">
                            Sin exclusivas
                        </h4>
                        <hr style="border: 1px solid black ">
                        <img src="/assets/frontend/images/valoraciones.png">
                        <p class="font-weight-bold mt-4 mt-4">
                            Cuánta más visibilidad, más opciones de venta
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 p-3 d-none d-md-block">
                    <div class="serv-box p-3">
                        <h4 class="blue2 font-weight-bold">
                            Anúnciala gratis y sin compromiso
                        </h4>
                        <hr style="border: 1px solid black ">
                        <img src="/assets/frontend/images/registrate-ya.png">
                        <p class="font-weight-bold mt-4">
                            Paga sólo si la vendes. Además tú decides cuánto pagar
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 p-3 d-none d-md-block">
                    <div class="serv-box p-3">
                        <h4 class="orange font-weight-bold">
                            Guíate en opiniones y valoraciones
                        </h4>
                        <hr style="border: 1px solid black ">
                        <img src="/assets/frontend/images/visibilidad.png">
                        <p class="font-weight-bold mt-4">
                            Trabaja con los profesionales de tu zona, basándote en valoraciones de otros propietarios
                        </p>
                    </div>
                </div>
                <!-- FOR LAPTOP ANY LARGE SCREEN ONLY -->
                <!-- FOR MOBILE AND TABLATES ONLY -->
                <div class="col-lg-3 text-center text-sm-left p-3 d-md-none">
                    <div class="row serv-box m-auto">
                        <div class="col-sm-4 d-flex flex-column justify-content-center align-items-md-start"
                             style="padding-top: 1em;">
                            <img src="/assets/frontend/images/valoraciones.png">
                        </div>
                        <div class="col-sm-8 ">
                            <h4 class="orange font-weight-bold mt-5">
                                Sin exclusivas
                            </h4>
                            <p class="font-weight-bold mt-4">
                                Cuanta más inmobiliarias, más visibilidad para tu vivienda

                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-center text-sm-left p-3 d-md-none">
                    <div class="row serv-box m-auto">
                        <div class="col-sm-4 d-flex flex-column justify-content-center align-items-md-start"
                             style="padding-top: 1em;">
                            <img src="/assets/frontend/images/registrate-ya.png">
                        </div>
                        <div class="col-sm-8">
                            <h4 class="orange font-weight-bold mt-5">
                                Anúnciala gratis y sin compromiso
                            </h4>
                            <p class="font-weight-bold mt-4">
                                Paga solo si la vendes. Además tú decides cuanto pagar
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-center text-sm-left p-3 d-md-none">
                    <div class="row serv-box m-auto m-auto">
                        <div class="col-sm-4 d-flex flex-column justify-content-center align-items-md-start"
                             style="padding-top: 1em;">
                            <img src="/assets/frontend/images/visibilidad.png">
                        </div>
                        <div class="col-sm-8">
                            <h4 class="orange font-weight-bold mt-5">
                                Guíate en opiniones y valoraciones
                            </h4>
                            <p class="font-weight-bold mt-4">
                                Trabaja con los profesionales de tu zona, basándote en valoraciones de otros
                                propietarios
                            </p>
                        </div>
                    </div>
                </div>
                <!-- FOR MOBILE AND TABLATES ONLY -->
            </div>
        </section>
    </div>
    <div class="col-12 mb-5 pb-5 text-center">
        <a data-toggle="modal" data-target=".bd-example-modal-lg"
           class="btn btn-red btn-bg-light text-uppercase p-3 font-weight-bold"><img
                style="height:3em; margin-right: 1em"
                src="/assets/frontend/images/icon/reproductor-de-video.svg"
                alt="">
            video explicativo</a>
    </div>

    {{--    <div class="container text-center">
            <video width="100%" height="auto" controls poster="{{asset('assets/frontend/img/screen.jpg')}}">
                <source src="/assets/frontend/video/Inmozon.mp4" type="video/mp4">
            </video>
        </div>--}}
    <div id="section2" class="col-12 col-md-6 mt-5 text-center m-auto">
        <h4 class="p-3 font-weight-bold">INMOZON, la nueva plataforma online donde propietarios y profesionales se
            juntan con un solo objetivo:
            <br>
            <h1 class="orange p-movil" style="font-size: 50px; margin-bottom: -0.5em; font-weight: bold ">¡VENDER TU
                CASA!</h1>
        </h4>
    </div>
    <section>
        <div class="offset-lg-1 col-lg-4 mt-3 mt-sm-5 mb-xl-5 head-form p-3 m-auto">
            <form method="post" action="{{ route('register') }}">
                @csrf

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <div class="form-title">
                    <h3>¡Regístrate ya!</h3>
                    <hr>
                </div>
                <div class="form-group">
                    <label>@lang('email') *</label>
                    <input type="email" name="email" class="form-control" placeholder="@lang('email')"
                           value="{{ old('email') }}" required>
                </div>
                <div class="form-group">
                    <label>@lang('password') * (8 carácteres mínimo)</label>
                    <input type="password" name="password" id="password"
                           class="form-control"
                           placeholder="@lang('password')" value="{{ old('password') }}" required
                           autocomplete="new-password"/>
                </div>
                <div class="form-group">
                    <label>@lang('cpassword') * (8 carácteres mínimo)</label>
                    <input type="password" name="password_confirmation" id="password-confirm"
                           class="form-control"
                           placeholder="@lang('cpassword')" value="{{ old('password_confirmation') }}" required
                           autocomplete="new-password"/>
                </div>
                <div class="form-group">
                    <div class="checkbox-inline">
                        <label class="checkbox m-0">
                            <input type="checkbox" name="agree" onclick="showPassword()">
                            <span></span>@lang('Mostrar contraseña')</label>
                    </div>
                    <div class="form-text text-muted text-center"></div>
                    <div class="fv-plugins-message-container"></div>
                </div>
                <div class="form-group text-left fv-plugins-icon-container">
                    <div class="checkbox-inline">
                        <label class="checkbox m-0">
                            <input type="checkbox" name="agree" required>
                            <span></span>@lang('Acepto los')
                            <a id="url" href="terms_and_conditions" target="_blank"
                               class="font-weight-bold ml-1"
                            >@lang('términos y condiciones')</a>.</label>
                    </div>
                    <div class="form-text text-muted text-center"></div>
                    <div class="fv-plugins-message-container"></div>
                </div>
                <div class="form-group" style="visibility: hidden; height: 0em">
                    <select class="form-control" id="exampleSelect1"
                            name="type">
                        <option onclick="eleccion()" selected="selected"
                                value="particular">@lang('Particular')</option>
                    </select>
                </div>
                <div class="form-group mt-2 mb-0" style="margin-top: -1em !important;">
                    <button type="submit"
                            class="btn btn-orange text-uppercase w-100 font-weight-bold p-2">@lang('Registrarse')
                    </button>
                </div>
            </form>
        </div>
    </section>

    <script>

        /*    $(window).scroll(function () {
                if ($(document).scrollTop() > 0 ) {
                    window.location.hash = '#section2';
                }

            });*/

        /*  const interval = setInterval(function() {
              // method to be executed;
          }, 5000);
          clearInterval(interval);*/

        /*  function yourFunction(){
              // do whatever you like here
              setTimeout(yourFunction, 5000);
          }
          yourFunction();*/


/*        $(function () {
            if ($(window).width() > 1660) {
                var lastScrollTop = 0, delta = 5;
                $(window).scroll(function () {
                    var nowScrollTop = $(this).scrollTop();
                    if (Math.abs(lastScrollTop - nowScrollTop) >= delta) {
                        if (nowScrollTop > lastScrollTop) {
                            window.location.hash = '#section2';
                        } else {
                            window.location.hash = '#section1';
                        }
                        lastScrollTop = nowScrollTop;
                    }
                });
            }
        });*/

    </script>

    <script>
        function showPassword() {
            var x = document.getElementById("password");
            var y = document.getElementById("password-confirm");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
            if (y.type === "password") {
                y.type = "text";
            } else {
                y.type = "password";
            }
        }

        function eleccion(select) {
            var elem = document.getElementById('exampleSelect1').value;
            alert(elem)
            if (elem == 'owner') {
                document.getElementById('url').setAttribute('data-target', '#modal1')
            } else if (elem == 'real_estate') {
                document.getElementById('url').setAttribute('data-target', '#modal2')
            }
        }
    </script>
@endsection
