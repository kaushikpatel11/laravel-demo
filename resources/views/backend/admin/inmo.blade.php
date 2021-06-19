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
<!-- Select2 -->
<link href="{{url('assets/backend/css/select2.min.css')}}" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="{{url('assets/frontend/js/html5/html5shiv.min.js')}}"></script>
    <script src="{{url('assets/frontend/js/html5/respond.min.js')}}"></script>
    <![endif]-->

<link href="http://fonts.googleapis.com/css?family=Karla:400,400italic,700,700italic" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic" rel="stylesheet" type="text/css">
@endsection

@section('top_menu')

@endsection

@section('content')

<body>
    <a id="top"></a>

    <div class="page-content">
        <div class="pull-right">
            <div id="sb-search" class="sb-search">
                <form id="search_form_submit" method="post" action="{{ route('search_properties') }}">
                    @csrf
                    <input class="sb-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search">
                    <button class="sb-search-submit"><i class="fa fa-search"></i></button>
                    {{--
                                    <span class="sb-icon-search"></span>
                --}}

            </div>
        </div>
        <h1>@lang('Buscador de propiedades')</h1>
        <!-- Search Section -->
        <div id="search-section" class="search-section container-fluid p_z">
            <!-- Container -->
            <div class="container">

            <div class="row">
                    <div class="col-1 mr-2">
                        <label  for="">@lang('Tipo de operación')</label>
                    </div>
                    <div  class="col-md-10 col-sm-9 p_l_z contact-feedback-form">
                        <select name="operation" id="" >
                            <option value="sell" {{@old('operation')=='sell' ? 'selected' : ''}}>@lang('Venta')</option>
                            <option value="rent" {{@old('operation')=='rent' ? 'selected' : ''}}>@lang('Alquiler')</option>
                        </select>

                    </div>
                </div>

                <div class="row">
                    <div class="col-1 mr-2">
                        <label  for="">Zona</label>
                    </div>
                    <div  class="col-md-10 col-sm-9 p_l_z contact-feedback-form">

                        <select name="location_country_id" id="location_country" data-related_select_id="#location_state" data-url="{{url('state_ajax')}}" data-action="getCountryStates">
                            <option value="" selected disabled hidden>@lang('Pais')</option>
                            <option value="-1">@lang('Todos')</option>
                            <option value="1" {{((isset($filter['location_country_id']) && (1 == $filter['location_country_id'])) ? 'selected' : '' )}}>@lang('España')</option>
                        </select>
                        <select name="location_state_id" id="location_state" data-related_select_id="#location_county" data-url="{{url('county_ajax')}}" data-action="getStateCounties">
                            <option selected disabled hidden>@lang('Comunidad')</option>
                            <option value="-1">@lang('Todos')</option>
                        </select>
                        <select name="location_county_id" id="location_county" data-related_select_id="#location_city" data-url="{{url('city_ajax')}}" data-action="getCountyCities">
                            <option selected disabled hidden>@lang('Provincia')</option>
                            <option value="-1">@lang('Todos')</option>
                        </select>

                        <select  name="location_city_id[]" id="location_city" multiple>
                            <option selected disabled hidden>@lang('Poblaciones')</option>
                            <option value="-1">@lang('Todos')</option>
                        </select>

                    </div>
                </div>
                <div class="row">
                    <div class="col-1 mr-2" >
                        <label  for="">Caracteristicas</label>
                    </div>
                    <div  class="col-md-10 col-sm-9 p_l_z contact-feedback-form">

                        <select class="col-md-2" name="type" id="type">
                            <option value="" {{@old('type')=='' ? 'selected' : ''}} >@lang('Todos los tipos')</option>
                            <option value="Flat;" {{@old('type')=='Flat;' ? 'selected' : ''}}>@lang('Piso/Apartamento')</option>
                            <option value="Flat;Ático" {{@old('type')=='Flat;Ático' ? 'selected' : ''}}>@lang('Ático')</option>
                            <!-- todo translate -->
                            {{--<option value="Flat;Dúplex" {{@old('type')=='Flat;Dúplex' ? 'selected' : ''}}>Dúplex</option>--}}
                            <option value="Flat;Estudio/loft" {{@old('type')=='Flat;Estudio/loft' ? 'selected' : ''}}>@lang('Estudio')</option>
                            <option value="Flat;Bungalow planta alta" {{@old('type')=='Flat;Bungalow planta alta' ? 'selected' : ''}}>@lang('Bungalow planta alta')</option>
                            <option value="Flat;Bungalow planta baja" {{@old('type')=='Flat;Bungalow planta baja' ? 'selected' : ''}}>@lang('Bungalow planta baja')</option>
                            <option value="Home;Casa o chalet independiente" {{@old('type')=='Home;Casa o chalet independiente' ? 'selected' : ''}}>Casa o chalet independiente</option>
                            {{--<option value="Home;Chalet pareado" {{@old('type')=='Home;Chalet pareado' ? 'selected' : ''}}>@lang('Chalet pareado')</option>--}}
                            <option value="Home;Chalet adosado" {{@old('type')=='Home;Chalet adosado' ? 'selected' : ''}}>@lang('Chalet adosado')</option>
                            <option value="CountryHome;" {{@old('type')=='CountryHome;' ? 'selected' : ''}}>@lang('Casa de campo')</option>
                            <option value="Office;" {{@old('type')=='Office;' ? 'selected' : ''}}>@lang('Oficina')</option>
                            <option value="Land;Urbano" {{@old('type')=='Land;Urbano' ? 'selected' : ''}}>Terrenos urbano</option>
                            <option value="Land;Urbanizable" {{@old('type')=='Land;Urbanizable' ? 'selected' : ''}}>Terrreno urbanizable</option>
                            <option value="Land;No Urbanizable" {{@old('type')=='Land;No Urbanizable' ? 'selected' : ''}}>Terreno no urbanizable</option>
                            <option value="CommercialProperty;" {{@old('type')=='CommercialProperty;' ? 'selected' : ''}}>@lang('Local o nave')</option>
                            <option value="ParkingSpace;" {{@old('type')=='ParkingSpace;' ? 'selected' : ''}}>@lang('Plaza garaje')</option>
                            <option value="StorageRoom;" {{@old('type')=='StorageRoom;' ? 'selected' : ''}}>@lang('Trastero')</option>
                            <!-- todo translate -->
                            <option value="Promotion;" {{@old('type')=='Promotion;' ? 'selected' : ''}}>Promoción</option>
                            <option value="Promotion;Flat" {{@old('type')=='Promotion;Flat' ? 'selected' : ''}}>Promoción de pisos</option>
                            <option value="Promotion;Home" {{@old('type')=='Promotion;Home' ? 'selected' : ''}}>Promoción de casas</option>
                            <option value="Promotion;CountryHome" {{@old('type')=='Promotion;CountryHome' ? 'selected' : ''}}>Promoción de casas de campo</option>
                        </select>
                        <div class="col-md-2 ">
                            <input class="search-section" value="{{@old('min_price')}}" type="text" name="min_price" placeholder="@lang('Precio mínimo')">
                        </div>
                        <div class="col-md-2  ">
                            <input class="search-section" value="{{@old('max_price')}}" type="text" name="max_price" placeholder="@lang('Precio máximo')">
                        </div>
                        <select name="bedrooms" id="bedrooms">
                        <option {{@old('bedrooms')=='' ? 'selected' : ''}} value="" >@lang('Habitaciones')</option>
                        <option {{@old('bedrooms')=='0' ? 'selected' : ''}}>0</option>
                        <option {{@old('bedrooms')==1 ? 'selected' : ''}}>1</option>
                        <option {{@old('bedrooms')==2 ? 'selected' : ''}}>2</option>
                        <option {{@old('bedrooms')==3 ? 'selected' : ''}}>3</option>
                        <option {{@old('bedrooms')==4 ? 'selected' : ''}}>4</option>
                        <option {{@old('bedrooms')==5 ? 'selected' : ''}} value="5" >5+</option>
                    </select>
                    <select name="bathrooms">
                        <option {{@old('bedrooms')=='' ? 'selected' : ''}} value="" >@lang('Baños')</option>
                        <option {{@old('bathrooms')=='0' ? 'selected' : ''}}>0</option>
                        <option {{@old('bathrooms')==1 ? 'selected' : ''}}>1</option>
                        <option {{@old('bathrooms')==2 ? 'selected' : ''}}>2</option>
                        <option {{@old('bathrooms')==3 ? 'selected' : ''}}>3</option>
                        <option {{@old('bathrooms')==4 ? 'selected' : ''}}>4</option>
                        <option {{@old('bathrooms')==5 ? 'selected' : ''}}  value="5">5+</option>
                    </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1 mr-2" >

                        <label for="">Estado</label>
                    </div>
                    <div  class="col-md-10 col-sm-9 p_l_z contact-feedback-form">

                        <select class="col-md-2" name="property_status" id="property_status">
                            <option value="" {{@old('property_status')=='' ? 'selected' : ''}}>@lang('Todos los estados')</option>
                            <option value="Obra nueva" {{@old('property_status')=='Obra nueva' ? 'selected' : ''}}>@lang('Obra nueva')</option>
                            <option value="A reformar" {{@old('property_status')=='A reformar' ? 'selected' : ''}}>@lang('A reformar')</option>
                            <option value="Buen estado" {{@old('property_status')=='Buen estado' ? 'selected' : ''}}>@lang('Buen estado')</option>
                        </select>



                        <div class="col-md-2">
                            <input class="search-section" type="number" min="1" step="1" name="property_id" placeholder="@lang('Id propiedad')">
                        </div>
                        <div class="col-md-2">
                            <input class="search-section" type="text" name="ref" placeholder="@lang('Referencia')">
                        </div>
                        <!-- col-md-2 -->
                        <div class="col-md-2">
                            <div class="section-header" style="">
                                <button form="search_form_submit" type="submit" class="btn btn-light-primary " style=" font-family: 'Roboto', sans-serif !important; font-size: large; background-color: #ffcd00; font">
                                    <p style="color: black;">
                                        @lang('Buscar')
                                    </p>
                                </button>
                            </div>
                        </div>
                        <!-- col-md-2 /- -->
                    </div>


                </div>
                {{--
                    <!-- col-md-10 -->
                    <div  class="col-md-10 col-sm-9 p_l_z contact-feedback-form">
                        <select name="min_size">
                            <option value=""   {{@old('min_size')=='' ? 'selected' : ''}}>@lang('Tamaño min')</option>
                            @foreach(Constants::square_meters as $square)
                            <option value="{{$square}}" {{@old('min_size')==$square ? 'selected' : ''}} >{{$square}} m2</option>
                            @endforeach
                        </select>
                        <select name="max_size">
                            <option value=""   {{@old('max_size')=='' ? 'selected' : ''}} >@lang('Tamaño max')</option>
                            @foreach(Constants::square_meters as $square)
                            <option value="{{$square}}" {{@old('max_size')==$square ? 'selected' : ''}}>{{$square}} m2</option>
                            @endforeach
                        </select>

                        <div class="row justify-content-center">
                            <div class="col-md-2">
                                <input class="search-section" type="text" name="owner_name" placeholder="@lang('Nombre propietario')">
                            </div>
                        </div>
                    </div><!-- col-md-10 /- -->
                        --}}

                </form>


            </div><!-- Container /- -->

        </div><!-- Search Section /- -->


        <!-- Featured Section -->
        <div id="featured-section" class="featured-section featured-section2 container-fluid p_z">
            <!-- container -->
            <div class="container">
                <div class="section-header">
                    {{-- <div class="col-md-8 col-sm-7">
                          <p>Trending</p>
                          <h3>Featured Property</h3>
                      </div>--}}
                    {{-- <div class="col-md-4 col-sm-5">
                            <h4 class="property-type-rent"><span>R</span>For Rent</h4>
                            <h4 class="property-type-sale"><Span>S</span>For Sale</h4>
                        </div>--}}
                </div>
                <!-- Col-md-4 -->
                @if(isset($properties))
                @if( count($properties)>0)

                @foreach($properties as $property)
                <div class="col-md-4 col-sm-6 col-xs-6 sale-block pb-10">
                    <!-- Property Main Box -->
                    <div class="property-main-box">
                        <div class="property-images-box box">
                            <a title="Property Image" href="{{ route('property.detail',['id' => $property->id])}}">
                                @if($property->images->first() != null)
                                    <img src="{{ asset($property->images->first()->url) }}" onerror="this.onerror=null;this.src='{{ asset('/assets/frontend/images/icon/logo_house.jpg') }}';" alt="property_image" />
                                @else
                                    <img src="{{ asset('/assets/frontend/images/icon/logo_house.jpg') }}" alt="property_image" />
                                @endif
                            </a>
                        </div>
                        <div class="clearfix"></div>
                        <div class="property-details">
                            <a title="Property Title" href="{{ route('property.detail',['id' => $property->id])}}">
                                {{$property->translateModelName($property->propertyable_type)}}
                                {{$property->propertyable_type=='App\\Promotion' ? 'de obra nueva' : ''}} en
                                {{ $property->getCityName()}}</a>
                            <p><b>Id. <a href="{{route('property.show', $property->id)}}"> {{ $property->id }}</a> &nbsp; &nbsp;
                                    Ref. {{ isset($property->ref) ? $property->ref : '' }}</b></p>
                            <!-- si es una promocion tiene la comision de agencia ==0  -->
                            <h4>{{$property->propertyable_type=='App\\Promotion' ? 'Desde '.$property->price : $property->price }}€</h4>
                            @if($property->getType() == 'Promotion' && isset($property->propertyable))

                            <p>{{ strlen($property->propertyable->promotion_description)>100 ? (Str::substr($property->propertyable->promotion_description, 0, 100).'...') : $property->propertyable->promotion_description  }}<a class="" title="more" href="{{ route('property.detail',['id' => $property->id])}}"> más</a></p>
                            @else
                            <p style="min-height: 60px; max-height: 60px;">{{ strlen($property->description)>100 ? (Str::substr($property->description, 0, 100).'...') : $property->description  }}<a class="" title="more" href="{{ route('property.detail',['id' => $property->id])}}"> más</a></p>
                            @endif
                            <!-- si es una promocion tiene comision de agencia ==0  -->
                            @if($property->propertyable_type!='App\\Promotion'  )
                            <ul>
                                <li>
                                    <i class="fa fa-expand"></i>{{ $property->propertyable->built_meters ?? $property->propertyable->meters ?? "0" }}
                                    m2
                                </li>
                                <li><i><img src="/assets/frontend/images/icon/bed-icon.png" alt="bed-icon" /></i>{{ (isset($property->propertyable->bedrooms)) ? $property->propertyable->bedrooms : "0" }}
                                </li>
                                <li><i><img src="/assets/frontend/images/icon/bath-icon.png" alt="bath-icon" /></i>{{ (isset($property->propertyable->bathrooms)) ? $property->propertyable->bathrooms : "0" }}
                                </li>
                            </ul>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach

                @else
                <div class="text-center danger">
                    <h1><span>@lang('No se han encontrado resultados con el filtro aplicado')</span></h1>
                </div>
                @endif

                @else
                <div class="text-center danger">
                    <h1><span>@lang('No se han encontrado resultados con el filtro aplicado')</span></h1>
                </div>
                @endif
                <!-- Col-md-12 -->
                {{-- @if(isset($properties))
                    @if( count($properties)>0)
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <a title="Cargar más" href="#" class="btn btn-light-primary" style="color: black">Cargar
                                más</a>
                        </div><!-- Col-md-12 -->
                    @endif
                @endif--}}
            </div><!-- container -->
        </div><!-- Featured Section /- -->


    </div>

    <style>
        h4 {
            color: #ffcd00 !important;
        }
    </style>

</body>


@endsection
@section('js')
@include('backend.includes.zoneFieldsGoogleMaps')
<script>
    function submit_search() {
        document.getElementById('search_form').submit()
    }

    jQuery(document).ready(function() {
        jQuery('#location_city').select2();
    });
</script>
<script>
    /*
     * LOCATION, COUNTRY COUNTY, CITY
     *
     * Preload selects
     * Force AJAX calls when previous select id exists ($filters) simulating the Laravel @OLD in selects with ajax.
     */
    jQuery(document).ready(function() {
        let country_id = jQuery('#location_country').val() || -1;
        let state_id   = jQuery('#location_state').val()   || -1;
        let county_id  = jQuery('#location_county').val()  || -1;

        // Fill STATE select
        if (0 < country_id && 0 > state_id) {
            jQuery('#location_country').trigger('change');
            @if(isset($filter['location_state_id']) && (0 < $filter['location_state_id']))
                jQuery('#location_state').val({{$filter['location_state_id']}});
                state_id = jQuery('#location_state').val() || -1;
            @endif
        }

        // Fill CITY select
        if (0 < country_id && 0 < state_id && 0 > county_id) {
            jQuery('#location_state').trigger('change');
            @if(isset($filter['location_county_id']) && (0 < $filter['location_county_id']))
                jQuery('#location_county').val({{$filter['location_county_id']}});
            @endif

        }
    });
</script>
@endsection
