@extends('template.template')
@section('css')


<link href="{{url('assets/frontend/libraries/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{url('assets/frontend/libraries/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
<!-- Core Owl Carousel CSS File  *	v1.3.3 -->
<link href="{{url('assets/frontend/libraries/owl-carousel/owl.theme.css')}}" rel="stylesheet">
<!-- Core Owl Carousel CSS Theme  File  *	v1.3.3 -->
<link href="{{url('assets/frontend/libraries/fonts/font-awesome.min.css')}}" rel="stylesheet">
<link href="{{url('assets/frontend/libraries/animate/animate.min.css')}}" rel="stylesheet">
<link href="{{url('assets/frontend/libraries/checkbox/minimal.css')}}" rel="stylesheet">
<link href="{{url('assets/frontend/libraries/drag-drop/drag-drop.css')}}" rel="stylesheet">
<link href="{{url('assets/frontend/css/components.css')}}" rel="stylesheet">
<link href="{{url('assets/frontend/style.css')}}" rel="stylesheet">
<!--link href="submit-property.css" rel="stylesheet"/-->
<link href="{{url('assets/frontend/css/media.css')}}" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="{{url('assets/frontend/js/html5/html5shiv.min.js')}}"></script>
    <script src="{{url('assets/frontend/js/html5/respond.min.js')}}"></script>
    <![endif]-->

<link href="http://fonts.googleapis.com/css?family=Karla:400,400italic,700,700italic" rel="stylesheet" type="text/css">
<link
    href="http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic"
    rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic" rel="stylesheet" type="text/css">



@endsection
@section('top_menu')

@endsection

@section('content')

<body data-offset="200" data-spy="scroll" data-target=".primary-navigation">{{--
    <!-- LOADER -->
    <div id="site-loader" class="load-complete">
        <div class="load-position">
            <div class="logo logo-block"><a href="index.html"><img src="images/logo.png" alt="logo"/></a></div>
            <h6>Please wait, loading...</h6>
            <div class="loading">
                <div class="loading-line"></div>
                <div class="loading-break loading-dot-1"></div>
                <div class="loading-break loading-dot-2"></div>
                <div class="loading-break loading-dot-3"></div>
            </div>
        </div>
    </div><!-- Loader /- -->--}}

    <a id="top"></a>
    {{--  <!-- Header Section -->
      <header id="header-section" class="header header1 container-fluid p_z">
          <!-- container -->
          <div class="container">
              <!-- Top Header -->
              <div class="top-header">
                  <p class="col-md-6 col-sm-9">
                      <span><i class="fa fa-phone"></i>  1-200-666-1234</span>
                      <span><a title="mail-to" href="mailto:info@propertyexpert.com"><i class="fa fa-envelope-o"></i> info@propertyexpert.com</a></span>
                  </p>
                  <div class="col-md-6 col-sm-3 p_r_z">
                      <ul class="property-social p_l_z m_b_z">
                          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                          <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                          <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                          <li><a href="#"><i class="fa fa-rss"></i></a></li>
                      </ul>
                  </div>
              </div><!-- Top Header -->
              <!-- Navigation Block -->
              <div class="navigation-block">
                  <!-- Logo Block -->
                  <div class="col-md-2 logo-block no-padding">
                      <a title="logo" href="index.html"><img src="images/logo.png" alt="logo"/></a>
                  </div><!-- Logo Block /- -->
                  <!-- Menu Block -->
                  <div class="col-md-10 menu-block">
                      <!-- nav -->
                      <nav class="navbar navbar-default primary-navigation">
                          <div class="navbar-header">
                              <button aria-controls="navbar" aria-expanded="false" data-target="#navbar"
                                      data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                                  <span class="sr-only">Toggle navigation</span>
                                  <span class="icon-bar"></span>
                                  <span class="icon-bar"></span>
                                  <span class="icon-bar"></span>
                              </button>
                          </div>
                          <div class="navbar-collapse collapse" id="navbar">
                              <ul class="nav navbar-nav">
                                  <li class="dropdown">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Home</a>
                                      <ul class="dropdown-menu" role="menu">
                                          <li><a href="index.html">Home 1</a></li>
                                          <li><a href="index2.html">Home 2</a></li>
                                          <li><a href="index3.html">Home 3</a></li>
                                      </ul>
                                  </li>
                                  <li class="dropdown">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Listing</a>
                                      <ul class="dropdown-menu" role="menu">
                                          <li><a href="aa-listing.html">AA Listing</a></li>
                                          <li><a href="aa-listing-list.html">AA Listing List</a></li>
                                      </ul>
                                  </li>
                                  <li class="dropdown">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Property</a>
                                      <ul class="dropdown-menu" role="menu">
                                          <li><a href="property-detail.html">Detail 1</a></li>
                                          <li><a href="property-detail-2.html">Detail 2</a></li>
                                      </ul>
                                  </li>
                                  <li class="dropdown">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog</a>
                                      <ul class="dropdown-menu" role="menu">
                                          <li><a href="blog.html">Blog</a></li>
                                          <li><a href="blog-detail.html">Blog Detail</a></li>
                                      </ul>
                                  </li>
                                  <!--li><a href="work.html">Gallery</a></li-->
                                  <li class="dropdown">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages</a>
                                      <ul class="dropdown-menu" role="menu">
                                          <li><a href="profile.html">Profile</a></li>
                                          <li><a href="agent-listing.html">Agent Listing 1</a></li>
                                          <li><a href="agent-listing-2.html">Agent Listing 2</a></li>
                                          <li><a href="agent-details.html">Agent Detail</a></li>
                                          <li><a href="shortcodes.html">Shortcodes</a></li>
                                      </ul>
                                  </li>
                                  <li><a href="contact.html">Contact Us</a></li>
                              </ul>
                          </div><!--/.nav-collapse -->
                      </nav><!-- nav /- -->
                      <a title="Add Property" href="submit-property.html" class="pull-right">Add Property</a>
                  </div><!-- Menu Block /- -->
              </div><!-- Navigation Block /- -->
              <div class="pull-right">
                  <a title="User" href="#" class="user-icon"><img src="images/icon/user-icon.png" alt="user icon"/></a>
                  <div id="sb-search" class="sb-search">
                      <form>
                          <input class="sb-search-input" placeholder="Enter your search term..." type="text" value=""
                                 name="search" id="search">
                          <button class="sb-search-submit"><i class="fa fa-search"></i></button>
                          <span class="sb-icon-search"></span>
                      </form>
                  </div>
              </div>
          </div><!-- container /- -->
      </header><!-- Header Section /- -->--}}
    <!-- Page Content -->
    <div class="page-content">
        {{--<!-- Banner Section -->
    <div id="page-banner-section" class="page-banner-section container-fluid p_z">
        <img src="images/aa-listing/banner.jpg" alt="banner">
        <!-- Banner Inner -->
        <div class="page-title">
            <div class="container ">
                <div class="banner-inner">
                    <h2>EDIT PROFILE</h2>
                </div>
            </div>
            <div class="pages-breadcrumb">
                <div class="container">
                    <!-- Page breadcrumb -->
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><a href="#">Home</a></li>
                        <li class="active">Detail page</li>
                    </ol>
                </div>
            </div>
        </div><!-- Banner Inner /- -->
    </div><!-- Banner Section /- -->--}}


        <!-- Property Detail Page -->
        <div class="property-main-details">
            <!-- container -->
            <div class="container ">
                <div class="property-details-content property-details-content2 container-fluid p_z ">
                    <!-- col-md-9 -->
                    <div class="col-md-9 col-sm-6 p_l_z justify-content-center" style="display: contents">
                        <h1><span></span></h1>
                        <!-- Slider Section -->
                        <div id="property-detail1-slider" class="carousel slide property-detail1-slider"
                            data-ride="carousel">
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                @if($property->images->isEmpty())
                                <div class="item  active  box2">
                                            <img  src="{{ asset('/assets/frontend/images/icon/logo_house.jpg')}}" alt="Slide">
                                        
                                </div>
                                </div>
                                @else
                                    @forEach($property->getImagesOrPlaceholder() as $property_img)

                                    @if($loop->first)
                                    <div class="item  active  box2">
                                        @else
                                        <div class="item box2">
                                            @endif
                                            <img src="{{isset($property_img) ? asset($property_img->url) : asset('/assets/frontend/images/icon/logo_house.jpg')}}" alt="Slide">
                                        </div>
                                        @endforeach

                                    </div>
                                @endif
                                <!-- Controls -->
                                <a class="left carousel-control" href="#property-detail1-slider" role="button"
                                    data-slide="prev">
                                    <span class="fa fa-long-arrow-left" aria-hidden="true"></span>
                                    <span class="sr-only">@lang('Anterior')</span>
                                </a>
                                <a class="right carousel-control" href="#property-detail1-slider" role="button"
                                    data-slide="next">
                                    <span class="fa fa-long-arrow-right" aria-hidden="true"></span>
                                    <span class="sr-only">@lang('Siguiente')</span>
                                </a>
                            </div><!-- Slider Section /- -->
                            <div class="property-header">
                                <h3> {{ $property->location->street }} - {{ $property->location->city->name }} <span>En
                                        venta</span></h3>
                                <ul>
                                    <li style="font-size: 24px;" >{{ $property->price }} €</li>
                                    <li><a style="font-size: 18px;" href="/properties/{{ $property->id }}">Id propiedad : {{ $property->id }}</a></li>
                                    @if(isset($property->propertyable->useful_meters))
                                    <li><i class="fa fa-expand"></i>{{ $property->propertyable->useful_meters}} m2</li>
                                    @endif
                                    @if(!$property->isPromotion())
                                    <li style="font-size: 18px;"><i><img src="/assets/frontend/images/icon/bed-icon.png" alt="bed-icon" /></i>
                                        {{  isset( $property->propertyable->bedrooms) ? $property->propertyable->bedrooms : 0 }}
                                    </li>
                                    <li style="font-size: 18px;"><i><img src="/assets/frontend/images/icon/bath-icon.png" alt="bath-icon" /></i>
                                        {{  isset( $property->propertyable->bathrooms) ? $property->propertyable->bathrooms : 0 }}
                                    </li>
                                    @endif
                                    <!--<li><i class="fa fa-car"></i>1</li>-->
                                </ul>

                               {{-- <a title="print" href=""
                                    onclick="window.print();"><i class="fa fa-print"></i>@lang('Imprimir')</a>--}}
                               <a title="print" href="{{route('properties.pdf', ['id'=>$property->id])}}" class="fa fa-print"></i>@lang('Imprimir')</a>
                                    <div class="row " style=" padding-top: 1em">
                                        @isset($property->distance_airport)
                                        <p style="font-size: 18px;"><i ><img src="https://t3.ftcdn.net/jpg/02/81/18/92/240_F_281189282_K7p0a24OH6p5aJtDFkbQfZklmyLfSPdc.jpg" style="height: 24px; margin-top: 0.5em;margin-bottom: 0.5em; margin-right: 0.2em" alt="bed-icon" /></i>   Distancia al aeropuerto: {{ $property->distance_airport }} &nbsp;Km&nbsp;&nbsp; </p>
                                        @endisset
                                        @isset($property->distance_beach)
                                        <p style="font-size: 18px;"><i><img src="/assets/frontend/images/icon_beach.svg" style="height: 24px; margin-left: 0.4em;margin-top: 0.5em;margin-bottom: 0.5em; margin-right: 0.2em" alt="bed-icon" /></i>   Distancia a la playa: {{ $property->distance_beach }}&nbsp;Km&nbsp;&nbsp;</p>
                                        @endisset

                                        @isset($property->distance_city)
                                        <p style="font-size: 18px;"><i><img src="/assets/frontend/images/icon_city.png" style="height: 24px; margin-left: 0.4em;margin-top: 0.5em;margin-bottom: 0.5em; margin-right: 0.2em" alt="bed-icon" /></i>Distancia a la ciudad: {{ $property->distance_city }}&nbsp;Km&nbsp;&nbsp;</p>
                                        @endisset
                                        @isset($property->distance_sea)
                                        <p style="font-size: 18px;"><i><img src="/assets/frontend/images/icon_ola.png" style="height: 24px; margin-left: 0.4em;margin-top: 0.5em;margin-bottom: 0.5em; margin-right: 0.2em" alt="bed-icon" /></i>Distancia al mar: {{ $property->distance_sea }}&nbsp;Km&nbsp;&nbsp;</p>
                                        @endisset
                                        @isset($property->distance_golf)

                                        <p style="font-size: 18px;"><i><img src="/assets/frontend/images/polo.svg" style="height: 24px; margin-left: 0.4em;margin-top: 0.5em;margin-bottom: 0.5em; margin-right: 0.2em" alt="bed-icon" /></i>Distancia golf: {{ $property->distance_golf }}&nbsp;Km&nbsp;&nbsp;</p>
                                        @endisset

                                    </div>
                            </div>
                            <div class="single-property-details">
                                <p style="font-size: 18px;">{{ $property->description }}</p>



                            </div>

                            <div id="checkboxes" class="general-amenities pull-left">
                                <div class="amenities-list pull-left">
                                    <div  id="id_check_boxes"  class="col-md-3 col-sm-12 col-xs-12">
                                        <h3>@lang('Características generales')</h3>
                                        <div class="amenities-checkbox">
                                            <input type="checkbox" disabled id="check_elevator" name="elevator"
                                                value="check_elevator">
                                            <label for="checkbox-1">@lang('Ascensor')</label>
                                        </div>
                                        <div class="amenities-checkbox">
                                            <input type="checkbox" disabled id="check_energetic_certification_general"
                                                name="check_energetic_certification_general"
                                                value="check_energetic_certification_general">

                                            <label for="checkbox-2">@lang('Certificación energética')</label>
                                        </div>
                                        <div class="amenities-checkbox">
                                            <input type="checkbox" disabled id="check_armarios" name="armarios"
                                                value="check_armarios">
                                            <label for="checkbox-3">@lang('Armarios empotrados')</label>
                                        </div>
                                        <div class="amenities-checkbox">
                                            <input type="checkbox" disabled id="check_aire" name="aire" value="check_aire">

                                            <label for="checkbox-4">@lang('Aire acondicionado')</label>
                                        </div>
                                        <div class="amenities-checkbox">
                                            <input type="checkbox" disabled id="check_security" name="check_security"
                                                value="check_security">

                                            <label for="checkbox-5">@lang('Seguridad')</label>
                                        </div>
                                        <div class="amenities-checkbox">
                                            <input type="checkbox" disabled id="check_terraza" name="terraza"
                                                value="check_terraza">


                                            <label for="checkbox-5">@lang('Terraza')</label>
                                        </div>
                                        <div class="amenities-checkbox">
                                            <input type="checkbox" disabled id="check_balcon" name="balcon" value="check_balcon">


                                            <label for="checkbox-5">@lang('Balcón')</label>
                                        </div>
                                        <div class="amenities-checkbox">
                                            <input type="checkbox" disabled id="check_trastero" name="trastero"
                                                value="check_trastero">


                                            <label for="checkbox-5">@lang('Trastero')</label>
                                        </div>
                                        <div class="amenities-checkbox">
                                            <input type="checkbox" disabled id="check_garaje" name="garaje" value="check_garaje">
                                            <label for="checkbox-5">@lang('Plaza de garaje')</label>
                                        </div>

                                    </div>

                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <h3>@lang('Características del edificio')</h3>
                                        <div class="amenities-checkbox">
                                            <input type="checkbox" disabled id="piscina" name="piscina" value="piscina">

                                            <label for="checkbox-9">@lang('Piscina')</label>
                                        </div>
                                        <div class="amenities-checkbox">
                                            <input type="checkbox" disabled id="zona_verde" name="zona_verde" value="zona_verde">

                                            <label for="checkbox-10">@lang('Zona verde')</label>
                                        </div>

                                    </div>

                                    <!--Características oficina-->
                                    @if($property->isOffice())
                                    <div id="car_office" class="col-md-3 col-sm-12 col-xs-12">
                                        <h3>Otras</h3>

                                        <div class="amenities-checkbox">
                                            <input type="checkbox" disabled id="agua_caliente"  name="agua_caliente" value="agua_caliente">

                                            <label for="checkbox-17">@lang('Agua caliente')</label>
                                        </div>
                                        <div class="amenities-checkbox">
                                            <input type="checkbox" disabled name="calefaccion" value="calefaccion" id="calefaccion">

                                            <label for="checkbox-18">@lang('Calefacción verde')</label>
                                        </div>
                                        <div class="amenities-checkbox">
                                            <input type="checkbox" disabled name="cocina" value="cocina" id="cocina">
                                            <label for="checkbox-19">@lang('Cocina')</label>
                                        </div>
                                        <div class="amenities-checkbox">
                                            <input type="checkbox" disabled name="almacen" value="almacen" id="almacen">

                                            <label for="checkbox-20">@lang('Almacén')</label>
                                        </div>
                                        <div class="amenities-checkbox">
                                            <input type="checkbox" disabled name="cristal_doble" value="cristal_doble" id="cristal_doble">
                                            <label for="checkbox-21">@lang('Cristal doble')</label>
                                        </div>
                                        <div class="amenities-checkbox">
                                            <input type="checkbox" disabled name="falso_techo" value="falso_techo" id="falso_techo">
                                            <label for="checkbox-22">@lang('Falso techo')</label>
                                        </div>
                                        <div class="amenities-checkbox">
                                            <input type="checkbox" disabled name="suelo_tecnico" value="suelo_tecnico" id="suelo_tecnico">
                                            <label for="checkbox-23"> @lang('Suelo técnico verde')</label>
                                        </div>
                                        <div class="amenities-checkbox">
                                            <input type="checkbox" disabled name="elevator" value="elevator" id="elevator">
                                            <label for="checkbox-24">@lang('Ascensor')</label>
                                        </div>
                                        <div class="amenities-checkbox">
                                            <input type="checkbox" disabled name="energetic_certification_office" value="energetic_certification_office" id="energetic_certification_office">
                                            <label for="checkbox-25">@lang('Certificación energética')</label>
                                        </div>
                                    </div>
                                    <!--Seguridad oficina-->

                                    <div id="security_office" class="col-md-3 col-sm-12 col-xs-12">
                                        <h3></h3>

                                        <div class="amenities-checkbox">
                                            <input type="checkbox" disabled name="puerta_seguridad" id="puerta_seguridad" value="puerta_seguridad">
                                            <label for="checkbox-25">@lang('Puerta de seguridad')</label>
                                        </div>
                                        <div class="amenities-checkbox">
                                            <input type="checkbox" disabled name="alarma" value="alarma" id="alarma">
                                            <label for="checkbox-26">@lang('Alarma')</label>
                                        </div>
                                        <div class="amenities-checkbox">
                                            <input type="checkbox" disabled name="control" value="control_accesos" id="control_accesos">
                                            <label for="checkbox-27">@lang('Control de accesos')</label>
                                        </div>
                                        <div class="amenities-checkbox">
                                            <input type="checkbox" disabled name="detector_incendios" value="detector_incendios" id="detector_incendios">
                                            <label for="checkbox-28">@lang('Detectores de incendios')</label>
                                        </div>
                                        <div class="amenities-checkbox">
                                            <input type="checkbox" disabled name="extintores" value="extintores" id="extintores">
                                            <label for="checkbox-29">@lang('Extintores')</label>
                                        </div>
                                        <div class="amenities-checkbox">
                                            <input type="checkbox" disabled name="aspersores" value="aspersores" id="aspersores">
                                            <label for="checkbox-30">@lang('Aspersores')</label>
                                        </div>
                                        <div class="amenities-checkbox">
                                            <input type="checkbox" disabled name="cortafuegos" value="cortafuegos" id="cortafuegos">
                                            <label for="checkbox-31">@lang('Puerta cotafuegos')</label>
                                        </div>
                                        <div class="amenities-checkbox">
                                            <input type="checkbox" disabled name="luces" value="luces_salida" id="luces_salida">
                                            <label for="checkbox-32">@lang('Luces de salida')</label>
                                        </div>
                                        <div class="amenities-checkbox">
                                            <input type="checkbox" disabled name="conserje" value="conserje" id="conserje">
                                            <label for="checkbox-33">@lang('Conserje/Portero')</label>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                        </div>
                      <!--  <div class="property-direction pull-left">
                            <h3>Get Direction</h3>
                            <div class="property-map">
                                <div id="gmap" class="mapping"></div>
                            </div>

                            <div class="property-map">
                                <h3>Share This Property :</h3>
                                <ul>
                                    <li><a href="#" title="twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" title="facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" title="google-plus"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#" title="linkedin-square"><i class="fa fa-linkedin-square"></i></a>
                                    </li>
                                    <li><a href="#" title="pinterest"><i class="fa fa-pinterest"></i></a></li>
                                    <li><a href="#" title="instagram"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>-->
                       <!-- <div class="other-properties row">

                            <div class="col-md-4 col-xs-12 rent-block">
                                <div class="property-main-box">
                                    <div class="property-images-box">
                                        <span>R</span>
                                        <a href="#"><img src="/assets/frontend/images/rent/rent-1.jpg" alt="rent" /></a>
                                        <h4>&dollar;380 / pm</h4>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="property-details">
                                        <a href="#">Southwest 39th Terrace</a>
                                        <ul>
                                            <li><i class="fa fa-expand"></i>3326 sq</li>
                                            <li><i><img src="/assets/frontend/images/icon/bed-icon.png"
                                                        alt="bed-icon" /></i>3
                                            </li>
                                            <li><i><img src="/assets/frontend/images/icon/bath-icon.png"
                                                        alt="bath-icon" /></i>2
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>


                        </div>     -->
                    </div><!-- col-md-9 /- -->
                    <!-- col-md-3 -->
                    {{--
                    <div class="col-md-3 col-sm-6 p_r_z property-sidebar">
                        <aside class="widget widget-search">
                            <h2 class="widget-title">search<span>property</span></h2>
                            <form>
                                <select>
                                    <option value="selected">Property ID</option>
                                    <option value="one">One</option>
                                    <option value="two">Two</option>
                                    <option value="three">Three</option>
                                    <option value="four">Four</option>
                                    <option value="five">Five</option>
                                </select>
                                <select>
                                    <option value="selected">Location</option>
                                    <option value="one">One</option>
                                    <option value="two">Two</option>
                                    <option value="three">Three</option>
                                    <option value="four">Four</option>
                                    <option value="five">Five</option>
                                </select>
                                <select>
                                    <option value="selected">Type</option>
                                    <option value="one">One</option>
                                    <option value="two">Two</option>
                                    <option value="three">Three</option>
                                    <option value="four">Four</option>
                                    <option value="five">Five</option>
                                </select>
                                <select>
                                    <option value="selected">Status</option>
                                    <option value="one">One</option>
                                    <option value="two">Two</option>
                                    <option value="three">Three</option>
                                    <option value="four">Four</option>
                                    <option value="five">Five</option>
                                </select>
                                <div class="col-md-6 col-sm-6 p_l_z">
                                    <select>
                                        <option value="selected">Beds</option>
                                        <option value="one">One</option>
                                        <option value="two">Two</option>
                                        <option value="three">Three</option>
                                        <option value="four">Four</option>
                                        <option value="five">Five</option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-6 p_r_z">
                                    <select>
                                        <option value="selected">Baths</option>
                                        <option value="one">One</option>
                                        <option value="two">Two</option>
                                        <option value="three">Three</option>
                                        <option value="four">Four</option>
                                        <option value="five">Five</option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-6 p_l_z">
                                    <select>
                                        <option value="selected">Min Price</option>
                                        <option value="one">One</option>
                                        <option value="two">Two</option>
                                        <option value="three">Three</option>
                                        <option value="four">Four</option>
                                        <option value="five">Five</option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-6 p_r_z">
                                    <select>
                                        <option value="selected">Max Price</option>
                                        <option value="one">$3000</option>
                                        <option value="two">$30000</option>
                                        <option value="three">$300000</option>
                                        <option value="four">$3000000</option>
                                        <option value="five">$3000000000000000</option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-6 p_l_z">
                                    <select>
                                        <option value="selected">Min Sqft</option>
                                        <option value="one">One</option>
                                        <option value="two">Two</option>
                                        <option value="three">Three</option>
                                        <option value="four">Four</option>
                                        <option value="five">Five</option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-6 p_r_z">
                                    <select>
                                        <option value="selected">Max Sqft</option>
                                        <option value="one">One</option>
                                        <option value="two">Two</option>
                                        <option value="three">Three</option>
                                        <option value="four">Four</option>
                                        <option value="five">Five</option>
                                    </select>
                                </div>
                                <input type="submit" value="Search Now" class="btn">
                            </form>
                        </aside>
                        <aside class="widget widget-property-featured">
                            <h2 class="widget-title">featured<span>property</span></h2>
                            <div class="property-featured-inner">
                                <div class="col-md-4 col-sm-3 col-xs-2 p_z">
                                    <a href="#" title="Fetured Property"><img
                                            src="/assets/frontend/images/aa-listing/feacture1.jpg"
                                            alt="feacture1"/></a>
                                </div>
                                <div class="col-md-8 col-sm-9 col-xs-10 featured-content">
                                    <a href="#" title="Fetured Property">Southwest 39th Terrace</a>
                                    <h3>&dollar;350000</h3>
                                </div>
                            </div>
                            <div class="property-featured-inner">
                                <div class="col-md-4 col-sm-3 col-xs-2 p_z">
                                    <a href="#" title="Fetured Property"><img
                                            src="/assets/frontend/images/aa-listing/feacture2.jpg"
                                            alt="feacture2"/></a>
                                </div>
                                <div class="col-md-8 col-sm-9 col-xs-10 featured-content">
                                    <a href="#" title="Fetured Property">>Southwest 39th Terrace</a>
                                    <h3>&dollar;350000</h3>
                                </div>
                            </div>
                            <div class="property-featured-inner">
                                <div class="col-md-4 col-sm-3 col-xs-2 p_z">
                                    <a href="#" title="Fetured Property"><img
                                            src="/assets/frontend/images/aa-listing/feacture3.jpg"
                                            alt="feacture3"/></a>
                                </div>
                                <div class="col-md-8 col-sm-9 col-xs-10 featured-content">
                                    <a href="#" title="Fetured Property">Southwest 39th Terrace</a>
                                    <h3>&dollar;350000</h3>
                                </div>
                            </div>
                        </aside>
                    </div><!-- col-md-3 /- -->
--}}
                </div>
            </div><!-- container /- -->
        </div><!-- Property Detail Page /- -->

        <!-- Partner Section -->
        {{-- <div id="partner-section" class="partner-section">
         <div class="container">
             <div id="business-partner" class="business-partner">
                 <div class="item"><a title="Gallery Image" href="#"><img src="/assets/frontend/images/aa-listing/client1.jpg"
                                                                          alt="client1"></a></div>
                 <div class="item"><a title="Gallery Image" href="#"><img src="/assets/frontend/images/aa-listing/client2.jpg"
                                                                          alt="client2"></a></div>
                 <div class="item"><a title="Gallery Image" href="#"><img src="/assets/frontend/images/aa-listing/client3.jpg"
                                                                          alt="client3"></a></div>
                 <div class="item"><a title="Gallery Image" href="#"><img src="/assets/frontend/images/aa-listing/client1.jpg"
                                                                          alt="client1"></a></div>
                 <div class="item"><a title="Gallery Image" href="#"><img src="/assets/frontend/images/aa-listing/client4.jpg"
                                                                          alt="client4"></a></div>
                 <div class="item"><a title="Gallery Image" href="#"><img src="/assets/frontend/images/aa-listing/client2.jpg"
                                                                          alt="client1"></a></div>
             </div>
         </div>
     </div>--}}
        <!-- Partner Section /- -->
    </div><!-- Page Content -->

    <!-- Footer Section -->
    {{--   <div id="footer-section" class="footer-section">
           <!-- container -->
           <div class="container">
               <!-- col-md-3 -->
               <div class="col-md-3 col-sm-6">
                   <!-- About Widget -->
                   <aside class="widget widget_about">
                       <h3 class="widget-title">About Us</h3>
                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                           labore et dolore magna aliqua</p>
                   </aside>
                   <!-- About Widget /- -->
               </div><!-- col-md-3 -->

               <!-- col-md-3 -->
               <div class="col-md-3 col-sm-6">
                   <!-- Quick Link Widget -->
                   <aside class="widget widget_quick_links">
                       <h3 class="widget-title">Quick Links</h3>
                       <ul class="p_l_z">
                           <li><a title="Quick Links" href="#">Listing</a></li>
                           <li><a title="Quick Links" href="#">Property</a></li>
                           <li><a title="Quick Links" href="#">News</a></li>
                           <li><a title="Quick Links" href="#">Gallery</a></li>
                           <li><a title="Quick Links" href="#">Pages</a></li>
                           <li><a title="Quick Links" href="#">Types</a></li>
                           <li><a title="Quick Links" href="#">Contact Us</a></li>
                       </ul>
                   </aside>
                   <!-- Quick Link Widget /- -->
               </div><!-- col-md-3 -->

               <!-- col-md-3 -->
               <div class="col-md-3 col-sm-6">
                   <!-- Address Widget -->
                   <aside class="widget widget_address">
                       <h3 class="widget-title">Address</h3>
                       <p>108 Villa Precy Subdivision Kumintang Ilaya Batangas, Philippines</p>
                       <span>1200 666 12345</span>
                       <a title="mailto" href="mailto:info@propertyexpert.com ">info@propertyexpert.com </a>
                   </aside>
                   <!-- Address Widget /- -->
               </div><!-- col-md-3 -->

               <!-- col-md-3 -->
               <div class="col-md-3 col-sm-6">
                   <!-- Address Widget -->
                   <aside class="widget widget_newsletter">
                       <h3 class="widget-title">NewsLetter</h3>
                       <div class="input-group">
                           <input type="text" class="form-control" placeholder="Enter Your ID">
                           <span class="input-group-btn">
                               <button class="btn btn-default" type="button">Go</button>
                           </span>
                       </div><!-- /input-group -->
                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do</p>
                   </aside>
                   <!-- Address Widget /- -->
               </div><!-- col-md-3 -->
           </div><!-- container /- -->
           <!-- Footer Bottom -->
           <div id="footer-bottom" class="footer-bottom">
               <!-- container -->
               <div class="container">
                   <p class="col-md-4 col-sm-6 col-xs-12">&copy; 2015 property expert ‐ All Rights Reserved</p>
                   <div class="col-md-4 col-sm-6 col-xs-12 pull-right social">
                       <ul class="footer_social m_b_z">
                           <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                           <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                           <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                           <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                           <li><a href="#"><i class="fa fa-rss"></i></a></li>
                       </ul>
                       <a href="#" title="back-to-top" id="back-to-top" class="back-to-top"><i
                               class="fa fa-long-arrow-up"></i> Top</a>
                   </div>
               </div><!-- container /- -->
           </div><!-- Footer Bottom /- -->
       </diV>--}}
    <!-- Footer Section -->

</body>


@endsection
@section('js')

<!-- jQuery Include -->
<script src="{{url('assets/frontend/libraries/jquery.min.js')}}"></script>
<script src="{{url('assets/frontend/libraries/jquery.easing.min.js')}}"></script><!-- Easing Animation Effect -->
<script src="{{url('assets/frontend/libraries/bootstrap/bootstrap.min.js')}}"></script> <!-- Core Bootstrap v3.2.0 -->
<script src="{{url('assets/frontend/libraries/modernizr/modernizr.custom.37829.js')}}"></script> <!-- Modernizer -->
<script src="{{url('assets/frontend/libraries/jquery.appear.js')}}"></script>
<!-- It Loads jQuery when element is appears -->
<script src="{{url('assets/frontend/libraries/owl-carousel/owl.carousel.min.js')}}"></script>
<!-- Core Owl Carousel CSS File  *	v1.3.3 -->
<script src="{{url('assets/frontend/libraries/checkbox/icheck.min.js')}}"></script> <!-- Check box -->
<script src="{{url('assets/frontend/libraries/drag-drop/jquery.tmpl.min.js')}}"></script> <!-- Drag Drop file -->
<script src="{{url('assets/frontend/libraries/drag-drop/drag-drop.js')}}"></script> <!-- Drag Drop File -->
<script src="{{url('assets/frontend/libraries/drag-drop/modernizr.custom.js')}}"></script> <!-- Drag Drop File -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="{{url('assets/frontend/libraries/gmap/jquery.gmap.min.js')}}"></script> <!-- map -->
<script src="{{url('assets/frontend/libraries/expanding-search/classie.js')}}"></script>
<script src="{{url('assets/frontend/libraries/expanding-search/uisearch.js')}}"></script>
<!-- Customized Scripts -->
<script src="{{url('assets/frontend/js/functions.js')}}"></script>
<script id="imageTemplate" type="text/x-jquery-tmpl">
		<div class="col-md-3 col-sm-3 col-xs-6">
			<div class="imageholder">
				<figure>
					<img src="${filePath}" alt="${fileName}"/>
				</figure>
			</div>
		</div>
</script>

<script>
    function disable_edit() {
        var elements = document.getElementById("checkboxes").elements;
        for (var i = 0, len = elements.length; i < len; ++i) {
            elements[i].disabled = true;
        }
    }

    function activar_checkbox(check_list) {
        try {
            if (check_list != "" && check_list != null) {
                check_list.forEach(check_id => {
                    //descartamos cadena vacia
                    if (check_id != ""){


                        document.getElementById(check_id).checked = "checked";
                        document.getElementById(check_id).disabled = true;
                    }

                })
            }
        } catch (error) {
            console.log(error)
        }
    }

    //activar checkboxes segun caracteristicas
    function activar_checkboxes() {
        try {

            activar_checkbox("{{$property_subtype->characteristics}}".split(";"))
            activar_checkbox("{{$property_subtype->building_characteristics}}".split(";"))
            activar_checkbox("{{$property_subtype->security}}".split(";"))
            activar_checkbox("{{$property_subtype->office_characteristics}}".split(";"))

            //elevator, energetic, active
            if ("{{$property_subtype->energetic_certification}}" == true) {
                document.getElementById("check_energetic_certification_general").checked = "checked";
            }

            if ("{{$property_subtype->energetic_certification}}" == true)
                document.getElementById("energetic_certification_office").checked = "checked";


            if ("{{$property_subtype->elevator}}")
                document.getElementById("check_elevator").checked = "checked";






        } catch (error) {

        }

    }

    window.onload = function () {
        activar_checkboxes()
        disable_edit()
    }
</script>
@endsection
