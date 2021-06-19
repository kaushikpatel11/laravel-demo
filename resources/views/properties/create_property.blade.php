@extends('template.template')

@section('top_menu')
@endsection

@section('css')
{{--<link href="{{url('assets/frontend/css/dropzone.min.css')}}" rel="stylesheet">--}}

<style>
   .clase required:invalid{

    }

</style>


@endsection

@section('content')
    <!--begin::Card-->

    <div class="card">
        <div class="card-header">
        <h1>
            @if(Auth::user()->owner->type=='promotor')
                @lang('Crear promoción')
            @else
                @lang('Crear propiedad')
            @endif
        </h1>
        </div>
        <div class="card card-custom card-stretch">
            <!--begin::Form-->
            {{--<form  method="post" id="form_create_property" onsubmit="return setValues()" action="{{route('properties.store')}}" enctype="multipart/form-data">--}}
            <form  method="post"   id="form_create_property" onsubmit="beforeSubmit(event); setValues()" action="{{route('properties.store')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="uploadXML" value="false">

            <!--begin::Body-->
                <div class="card-body">
{{--
  --    TAB TITLES LIST
  --}}
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                               aria-controls="home" aria-selected="true">@lang('General')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="zone-tab" data-toggle="tab" href="#zone" role="tab"
                               aria-controls="zone" aria-selected="false">@lang('Zona')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="imagenes-tab" data-toggle="tab" href="#imagenes" role="tab"
                               aria-controls="profile" aria-selected="false">@lang('Imágenes')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="type-tab"  data-toggle="tab"
                            {{--style="{{Auth::user()->owner->type == 'promotor' ?  'display: none;' : 'display: block;' }}"--}}
                            style="display: none;"
                               href="#caracteristicas" role="tab" aria-controls="contact" aria-selected="false">@lang('Piso')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="char-tab" data-toggle="tab" href="#char" role="tab"
                               aria-controls="contact" aria-selected="false">@lang('Características')</a>
                        </li>
{{--
  -- @ RM Rafa Mollá  2020-11-09 07:37 AM en el alta de propiedades hay que ocultar la pestaña de documentación
  necesitamos la pestaña para promotr, seguira oculta apara a el resto--}}

  @if(Auth::user()->owner->type=="promotor")
                        <li class="nav-item">
                            <a class="nav-link" id="doc-tab" data-toggle="tab" href="#doc" role="tab"
                               aria-controls="contact" aria-selected="false">@lang('Documentación')</a>
                        </li>
@endif
                        <li class="nav-item">
                            <a class="nav-link" id="dist-tab" data-toggle="tab" href="#distances" role="tab"
                               aria-controls="contact" aria-selected="false">@lang('Distancias')</a>
                        </li>
                    </ul>

{{--
  --    TAB CONTENTS
  --}}

                    <div class="tab-content" id="myTabContent">
{{--
  --    TAB CONTENTS
  --    HOME TAB DIV
  --}}
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <label class="col-xl-3"></label>
                                <div class="col-sm-12 col-12 col-xs-12 col col-lg-12 col-xl-12">
                                    @if( Auth::user()->owner->type == 'promotor')
                                    <h3 class="font-weight-bold mb-20 mt-15 text-center">@lang(' Datos generales de la promoción')</h3>
                                    @else
                                    <h3 class="font-weight-bold mb-20 mt-15 text-center"> @lang('Datos generales de la propiedad')</h3>
                                    @endif
                                </div>
                            </div>

                            @if(Auth::user()->owner->type == "promotor")
                            <!-- utilizamos este input para saber si debemos manejar los datos como promocion o como vivienda en el controller -->
                            <input id="promotion" type="hidden" name="promotion" value="promotion">

                            <!-- begin nombre promotor-->
                            <div class="form-group row" style="justify-content: center;">
                                <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Nombre de la promoción')</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input  autocomplete="nope" class="form-control form-control-lg form-control-solid"
                                     id="promotion_name"  type="text" required value="{{ @old('promotion_name') }}"
                                           name="promotion_name"
                                           oninvalid="Swal.fire('El nombre de promoción es obligatorio', '¡Revisa la pestaña general!', 'warning');">
                                </div>
                            </div>
                            <!-- end nombre promocion-->

                            <div class="form-group row" style="justify-content: center;">
                                <label class="col-form-label text-left col-lg-3 col-sm-12">@lang('Tipos')</label>
                                <div class="col-lg-6 col-md-9">
                                    <select class="form-control select2" style="width: 100%" id="kt_select2_3" name="promotion_property_types[]" multiple="multiple" >
                                            <option value="" disabled hidden>@lang('Seleccione')</option>
                                            <option value="Flat" >@lang('Piso')</option>
                                            <option value="Home" >@lang('Casa o chalet')</option>
                                            <option value="CountryHome">@lang('Casa de campo')</option>
                                            <option value="Office">@lang('Oficina')</option>
                                            <option value="Land">@lang('Terreno')</option>
                                            <option value="ParkingSpace">@lang('Plazas de aparcamiento')</option>
                                            <option value="StorageRoom">@lang('Garajes')</option>
                                            <option value="CommercialProperty">@lang('Locales')</option>
                                    </select>
                                </div>
                            </div>


                            <!-- begin precio promotor-->
                            <div class="form-group row" style="justify-content: center;margin-right: 0em">
                                <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Precio')</label>
                                <label class="col-lg-1 col-xl-1 text-center">@lang('Desde')</label>
                                <input id="price_hidden" type="hidden" min="1" name="price" value="{{@old('price')}}">
<!-- todo translate -->
                                <input  autocomplete="nope" id="promotion_price_min" class="form-control form-control-lg form-control-solid col-xl-2 col-lg-2" type="number"
                                    name="promotion_price_min" required  placeholder="€" value="{{ @old('promotion_price_min') }}"
                                    onchange="setHiddenPricePromotion()"

                                    oninvalid="Swal.fire('El precio mínimo es obligatorio', '¡Revisa la pestaña general!', 'warning');">
                                <label class="col-lg-1 col-xl-1 text-center">@lang('Hasta')</label>
                                <input  autocomplete="nope" id="promotion_price_max" class="col-lg-2 col-xl-2 form-control form-control-lg form-control-solid" type="number"
                                    name="promotion_price_max"
                                    oninvalid="Swal.fire('El precio máximo es obligatorio', '¡Revisa la pestaña general!', 'warning');"
                                    required  placeholder="€" value="{{ @old('promotion_price_max') }}">
                            </div>
                            <!-- end precio promotor-->
                            <!-- begin metros cuadrados promotor-->
                            <div class="form-group row" style="justify-content: center;margin-right: 0em">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Metros cuadrados')</label>

                                        <label class=" col-lg-1 col-xl-1 text-center">@lang('Desde')</label>
                                        <input class="form-control form-control-lg form-control-solid col-xl-2 col-lg-2" type="number"
                                            required placeholder="m2"
                                            name="promotion_meters_min" id="promotion_meters_min"
                                            value="{{@old('promotion_meters_min') }}"
                                            oninvalid="Swal.fire('Los metros son obligatorios', '¡Revisa la pestaña general!', 'warning');"
                                            >

                                        <label class="col-xl-1 col-lg-1 text-center">@lang('Hasta')</label>
                                        <input class="col-xl-2 col-lg-2 form-control form-control-lg form-control-solid" type="number"
                                        required placeholder="m2" name="promotion_meters_max" id="promotion_meters_max"
                                        oninvalid="Swal.fire('Los metros son obligatorios', '¡Revisa la pestaña general!', 'warning');"
                                        value="{{@old('promotion_meters_max') }}">
                            </div>
                            <!-- fin metros cuadrados promotor-->
                            <!-- begin baños promotor-->
                            <div class="form-group row" style="justify-content: center;margin-right: 0em">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Baños')</label>

                                        <label class=" col-lg-1 col-xl-1 text-center">@lang('Desde')</label>
                                        <input class="form-control form-control-lg form-control-solid col-xl-2 col-lg-2" type="number"
                                            required name="promotion_bathrooms_min" id="promotion_bathrooms_min"
                                        oninvalid="Swal.fire('El número de baños es obligatorio', '¡Revisa la pestaña general!', 'warning');"

                                            value="{{@old('promotion_bathrooms_min') }}">

                                        <label class="col-xl-1 col-lg-1 text-center">@lang('Hasta')</label>
                                        <input class="col-xl-2 col-lg-2 form-control form-control-lg form-control-solid" type="number"
                                        required name="promotion_bathrooms_max" id="promotion_bathrooms_max"
                                        oninvalid="Swal.fire('El número de baños es obligatorio', '¡Revisa la pestaña general!', 'warning');"

                                        value="{{@old('promotion_bathrooms_max') }}">
                                </div>
                            <!-- fin baños promotor-->
                            <!-- begin habitaciones promotor-->
                            <div class="form-group row" style="justify-content: center;margin-right: 0em">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Habitaciones')</label>
                                    <label class=" col-lg-1 col-xl-1 text-center">@lang('Desde')</label>
                                    <input class="form-control form-control-lg form-control-solid col-xl-2 col-lg-2" type="number"
                                        required placeholder="" name="promotion_bedrooms_min" id="promotion_bedrooms_min"
                                    oninvalid="Swal.fire('El número de habitaciones es obligatorio', '¡Revisa la pestaña general!', 'warning');"

                                        value="{{@old('promotion_bedrooms_min')}}">

                                    <label class="col-xl-1 col-lg-1 text-center">@lang('Hasta')</label>
                                    <input class="col-xl-2 col-lg-2 form-control form-control-lg form-control-solid" type="number"
                                    required name="promotion_bedrooms_max" id="promotion_bedrooms_max"
                                    oninvalid="Swal.fire('El número de habitaciones es obligatorio', '¡Revisa la pestaña general!', 'warning');"
                                    value="{{@old('promotion_bedrooms_max')}}">
                            </div>
                            <!-- fin habitaciones promotor-->

                            <!-- begin commission promotor-->
                            <div class="form-group row" style="justify-content: center;">
                                <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Comisión agencia desde')(%)</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input id="agency_commissions_hidden" type="hidden" name="agency_commissions" value="{{@old('agency_commissions')}}">
                                    <input  autocomplete="nope" id="promotion_agency_commissions"
                                    class="form-control form-control-solid"
                                     type="text" name="promotion_agency_commissions" value="{{@old('promotion_agency_commissions')}} " placeholder="%"
                                    oninvalid="Swal.fire('Error en el campo comisión', '¡Revisa la pestaña general!', 'warning');"

                                     onkeyup="setHiddenPricePromotion()"

                                     >

                                </div>
                            </div>
                            <!-- end commission promotor-->
                            <!-- begin rappel promotor-->
                            <div class="form-group row" style="justify-content: center;">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left" for="exampleSelect1">@lang('¿Rappel por volumen?')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <select class="form-control form-control-solid" name="promotion_rappel"
                                                id="promotion_rappel" value="">
                                            <option {{@old('promotion_rappel')=='true' ? 'selected' : ''}} value="true">@lang('Si')</option>
                                            <option {{@old('promotion_rappel')=='false' ? 'selected' : ''}} value="false">@lang('No')</option>
                                        </select>
                                    </div>
                            </div>
                            <!-- end rappel promotor-->
                            <!-- begin date promotor-->
                            <div class="form-group row" style="justify-content: center;">
                                <label style="padding-left: 0em;" class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Fecha prevista de entrega')</label>
                                <div class="col-lg-9 col-xl-6 form-group row" style="justify-content: center;">
<!--                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Fecha y hora')</label>
                                    <div class="col-lg-9 col-xl-6">-->
                                        <div class=" input-group date" data-z-index="1100">
                                            <input type="text" class="form-control" readonly="readonly"
                                                    name="promotion_delivery_date" placeholder="@lang('Seleccione fecha y hora')"
                                                    id="kt_datetimepicker_8" required
                                                    value="{{@old('promotion_delivery_date')}}"/>
                                            <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-calendar-check-o glyphicon-th"></i>
                                            </span>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <!-- end date promotor-->
                            <!-- begin description promotor-->
                            <div class="form-group row" style="justify-content: center;">
                                <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Descripción')</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input  autocomplete="nope" class="form-control form-control-lg form-control-solid"
                                     id="promotion_description"  type="text"  value="{{ @old('promotion_description') }}"
                                           name="promotion_description"  >
                                </div>
                            </div>
                            <!-- end description promotor-->

                            @else

                                <div class="form-group row text-center" style="justify-content: center;">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left" for="exampleSelect1">@lang('Tipo de operación')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <select required
                                        oninvalid="showAlert(); document.getElementById('operation_type').className +='border border-danger' "
                                        onchange="showCommission(this.value=='sell' ? false : true); document.getElementById('operation_type').className ='form-control  form-control-solid' " class="form-control form-control-solid"
                                                id="operation_type"  name="operation" value="" >
                                            <option value="sell">@lang('Venta')</option>
                                            <option value="rent">@lang('Alquiler')</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row text-center" style="justify-content: center;">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left" for="exampleSelect1">@lang('Tipo de propiedad')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <select required
                                        oninvalid="showAlert(); document.getElementById('propertyable_type').className +='border border-danger' "
                                        onchange=" document.getElementById('propertyable_type').className ='form-control  form-control-solid' " class="form-control form-control-solid" name="propertyable_type"
                                                id="propertyable_type" value="" >
                                            <option value="" selected disabled hidden>@lang('Seleccione')</option>
                                            <option value="Flat">@lang('Piso')</option>
                                            <option value="Home">@lang('Casa o chalet')</option>
                                            <option value="CountryHome">@lang('Casa de campo')</option>
                                            <option value="Office">@lang('Oficina')</option>
                                            <option value="Land">@lang('Terreno')</option>
                                            <option value="ParkingSpace">@lang('Plazas de aparcamiento')</option>
                                            <option value="StorageRoom">@lang('Garajes')</option>
                                            <option value="CommercialProperty">@lang('Locales')</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row" style="justify-content: center;">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left" for="exampleSelect1">@lang('Estado')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <select class="form-control form-control-solid" name="property_status" value="">
                                            <option value="Obra nueva" {{@old('property_status')=='Obra nueva' ? 'selected' : ''}}>@lang('Obra nueva')</option>
                                            <option value="A reformar" {{@old('property_status')=='A reformar' ? 'selected' : ''}}>@lang('A reformar')</option>
                                            <option value="Buen estado" {{@old('property_status')=='Buen estado' ? 'selected' : ''}}>@lang('Buen estado')</option>
                                        </select>
                                    </div>
                                </div>
                                @if(Auth::user()->owner->type == "agente")
                                    <div class="form-group row" style="justify-content: center;">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Referencia de la propiedad')</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input type="number" id="id" class="form-control form-control-lg form-control-solid"
                                            name="ref"  oninvalid="Swal.fire('Error: la referencia debe contener solo números', '¡Revisa la pestaña general!', 'warning');">

                                        </div>
                                    </div>
                                @endif
                                <div class="form-group row" style="justify-content: center; ">
                                    <label id="labelPrecio" class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Precio')</label>
                                    <label id="labelPrecioMes" class="col-xl-3 col-lg-3 col-form-label text-left" style="display:none">@lang('Precio/mes')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input id="price_hidden" type="hidden" min="1" name="price" value="{{@old('price')}}">
                                        <input  autocomplete="nope" id="price" class="form-control form-control-lg form-control-solid" type="text"
                                            name="price_input"
                                            onfocus="this.value = ''"
                                            onfocusout="setHiddenPrice()"
                                            oninvalid="showAlert(); document.getElementById('price').className +='border border-danger' "
                                            onchange=" agencyCommision();
                                            calculateIVA();  calculateCommision();
                                            document.getElementById('price').className ='form-control form-control-lg form-control-solid' "
                                            required  placeholder="€" value="{{ @old('price') }}">
                                    </div>
                                </div>
                                <div id="groupCommissions">
                                <div class="form-group row" style="justify-content: center;">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Comisión de agencia')

                                        <img height="20px" width="20px" src="{{url('assets/frontend/images/info-icon.jpeg')}}"
                                            data-toggle="tooltip" title="@lang('Comision minima del 3')">



                                    </label>
                                    <span class="svg-icon svg-icon-sm"></span>

                                    <div class="col-lg-9 col-xl-6">
                                        <input id="agency_commissions_hidden" type="hidden" name="agency_commissions" value="{{@old('agency_commissions') ?? Auth::user()->owner->getMinimumCommission()}}">
                                        <input  autocomplete="nope" type="text" id="agency_commissions"
                                        onfocus="this.value = ''"
                                        onfocusout="setHiddenComission()"
                                        onchange=" isValid(this.value);
                                        agencyCommision2(); calculateIVA2();  calculateCommision2();
                                        document.getElementById('agency_commissions').className ='form-control form-control-lg form-control-solid' "
                                        oninvalid="showAlert(); document.getElementById('agency_commissions').className +='border border-danger' "

                                        min="{{$minimum_commission}}"
                                        max="100"
                                        class="form-control form-control-lg form-control-solid" type="text" required
                                        name="" value="{{@old('agency_commissions') ?? 3}} " placeholder="%">
                                    </div>

                                </div>


                                <div class="form-group row" style="justify-content: center;">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Comisión agencia')
                                    </label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input  autocomplete="nope" disabled id="calculated_agency_commission"
                                            class="form-control form-control-lg form-control-solid"
                                            required type="text" name=""
                                            value="{{ @old(agency_commissions) }}"
                                            min="{{$minimum_commission}}">
                                    </div>
                                </div>
                                <div class="form-group row" style="justify-content: center;">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('IVA 21%')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input  autocomplete="nope" disabled id="iva"
                                            class="form-control form-control-lg form-control-solid"
                                            required type="text" name=""
                                            value="{{@old('iva')}}">
                                    </div>
                                </div>
                                <div class="form-group row" style="justify-content: center;">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Importe neto')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input  autocomplete="nope" disabled id="result"
                                            class="form-control form-control-lg form-control-solid"
                                            required type="text" name="result"
                                            value="{{ @old('result') }}">
                                    </div>
                                </div>
                                </div>
                                <div class="form-group row" style="justify-content: center;">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Gastos de comunidad anuales(€)')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input  autocomplete="nope" class="form-control form-control-lg form-control-solid" id="community_fees"  type="text"  value="{{ @old('community_fees') }}"
                                            name="community_fees" placeholder="€"
                                            oninvalid="showAlert(); document.getElementById('community_fees').className +='border border-danger' "
                                            onchange="document.getElementById('community_fees').className ='form-control form-control-lg form-control-solid' ">
                                    </div>
                                </div>
                                <div class="form-group row" style="justify-content: center;">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left" for="exampleTextarea">@lang('Descripción')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <textarea class="form-control" id="exampleTextarea"

                                        name="description" value=""
                                                rows="3">{{ @old(description) }}</textarea>
                                    </div>
                                </div>
                            @endif

                        </div>

{{--
  --    TAB CONTENTS
  --    ZONE TAB DIV
  --}}
                        <div class="tab-pane fade show" id="zone" role="tabpanel" aria-labelledby="zone-tab">
                            <div class="row">
                                <label class="col-xl-3"></label>
                                <div class="col-lg-9 col-xl-6">
                                    <h3 class="font-weight-bold mb-20 mt-15 text-center">Ubicación de la propiedad</h3>
                                </div>
                            </div>

                            @include('backend.includes.zoneFormFieldsVertical')

                        </div>

{{--
  --    TAB CONTENTS
  --    IMAGENES TAB DIV
  --}}
                        <div class="tab-pane fade " id="imagenes" role="tabpanel" aria-labelledby="imagenes-tab">
                            <div class="row">
                                <label class="col-xl-3"></label>
                                <div class="col-lg-12 col-xl-12">
                                    <h3 class="font-weight-bold mb-20 mt-15 text-center">@lang('Imágenes de la propiedad')</h3>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label text-right" for="images">@lang('Seleccionar imágenes (min 3*)')</label>
                                <div class="col-lg-9 col-xl-6">
                                    <input type="hidden" name="uploadXML" value="false">
                                    {{-- <input  id="images"  class="form-control form-control-lg form-control-solid" type="file" name="images[]" multiple="multiple" value="{{@old('images')}}"> --}}
                                    {{--<div  id="box-img-dropzone">
                                        <p>click aqui</p>
                                        <!-- <input  id="file" type="hidden" name="images-dropzone[]" multiple>  -->

                                    </div>--}}
                                    <!-- <input class="multifile" type="file" name="files[]"> -->

                                    <input  id="images" multiple  class="form-control form-control-lg form-control-solid multifile" type="file" name="images[]"  value=""  title=" " >
                                    <ul id="sortable"></ul>
                                </div>
                            </div>

                        </div>


                        <!--datos especificos de la propiedad, conditional render con el campo tipo de propiedad de la primera pestaña-->
                        <div
                             class="tab-pane fade " id="caracteristicas" role="tabpanel" aria-labelledby="type-tab">
                            <!-- datos comunes que se van a mandar como hidden -->
                            <input id="id_built_meters" name="built_meters" type="hidden" value="">
                            <input id="bathrooms" name="bathrooms" type="hidden" value="">
                            <input id="bedrooms" name="bedrooms" type="hidden" value="">

                            <div id="caracteristicas_flat" style="display: none;">

                                <div class="row">
                                    <label class="col-xl-3"></label>
                                    <div class="col-lg-12 col-xl-12">
                                        <h5 class="font-weight-bold mb-6">@lang('Datos del piso')</h5>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                           for="exampleSelect1">@lang('Tipo')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <select class="form-control form-control-solid" name="type_flat"
                                                id="exampleSelect1" value="">
                                            <option value="Piso" {{@old('type_flat')=='Piso' ? 'selected' : ''}}>@lang('Piso')</option>
                                            <option value="Ático" {{@old('type_flat')=='Ático' ? 'selected' : ''}}>@lang('Ático')</option>
                                            <option value="Estudio/loft" {{@old('type_flat')=='Estudio' ? 'selected' : ''}}>@lang('Estudio')</option>
                                            <!-- todo translate  -->
                                            <option value="Bungalow planta alta" {{@old('type_flat')=='Bungalow planta alta' ? 'selected' : ''}}>Bungalow planta alta</option>
                                            <option value="Bungalow planta baja" {{@old('type_flat')=='Bungalow planta baja' ? 'selected' : ''}}>Bungalow planta baja</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Metros construidos')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control form-control-lg form-control-solid" type="text"
                                       required value="{{@old('built_meters_flat') ?? 0}}" oninvalid="showAlert()"
                                               name="built_meters_flat" id="built_meters_flat">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Habitaciones')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control form-control-lg form-control-solid" type="text"required
                                        value="{{@old('bedrooms_flat') ?? 0}}"
                                        oninvalid="showAlert()" name="bedrooms_flat" id="bedrooms_flat">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Baños')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control form-control-lg form-control-solid" type="text"required oninvalid="showAlert()"
                                        value="{{@old('bathrooms_flat') ?? 0}}"
                                               name="bathrooms_flat" id="bathrooms_flat">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left" for="exampleSelect1">@lang('Fachada')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <select class="form-control form-control-solid" name="facade_flat"oninvalid="showAlert()"required
                                                id="exampleSelect1" value="">
                                            <option  {{@old('facade_flat')=='Exterior' ? 'selected' : ''}}>Exterior</option>
                                            <option {{@old('facade_flat')=='Interior' ? 'selected' : ''}}>Interior</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                           for="exampleSelect1">@lang('Piso')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <select class="form-control form-control-solid"oninvalid="showAlert()" name="floor" id="exampleSelect1"
                                                value="">
                                            <option value="Bajo" {{@old('floor')=='Bajo' ? 'selected' : ''}}>@lang('Bajo')</option>
                                            <option value="Intermedio" {{@old('floor')=='Intermedio' ? 'selected' : ''}}>@lang('Intermedio')</option>
                                            <option value="Ático" {{@old('floor')=='Ático' ? 'selected' : ''}}>@lang('Ático')</option>
                                        </select>
                                    </div>
                                </div>

                                {{--
                                <div class="form-group row" style="display: none">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left" for="exampleSelect1">@lang('Validación')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <select class="form-control form-control-solid" name="state_flat"
                                                id="exampleSelect1" value="">
                                            <option value="A reformar" {{@old('state_flat')=='A reformar' ? 'selected' : ''}}>@lang('A reformar')</option>
                                            <option value="Buen estado" {{@old('state_flat')=='Buen estado' ? 'selected' : ''}}>@lang('Buen estado')</option>
                                        </select>
                                    </div>
                                </div>
                                    --}}
                            </div>
                            <div id="caracteristicas_home" style="display: none;">

                                <div class="row">
                                    <label class="col-xl-3"></label>
                                    <div class="col-lg-9 col-xl-6">
                                        <h5 class="font-weight-bold mb-6">@lang('Datos Home/Chalet')</h5>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                           for="exampleSelect1">Tipo</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <select class="form-control form-control-solid" name="type_home"
                                                id="exampleSelect1" value="">
                                            <option value="Independiente" {{@old('type_home')=='Independiente' ? 'selected' : ''}}>@lang('Independiente')</option>
                                            <option value="Adosado" {{@old('type_home')=='Adosado' ? 'selected' : ''}}>@lang('Adosado')</option>
                                        </select>
                                    </div>
                                </div>
                                {{--

                                <div class="form-group row" style="display: none">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left" for="exampleSelect1">@lang('Estado')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <select class="form-control form-control-solid" name="state_home"
                                                id="exampleSelect1" value="">
                                            <option  value="A reformar" {{@old('state_home')=='A reformar' ? 'selected' : ''}}>@lang('A reformar')</option>
                                            <option  value="Buen estado" {{@old('state_home')=='Buen estado' ? 'selected' : ''}}>@lang('Buen estado')</option>
                                        </select>
                                    </div>
                                </div>
                                --}}
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Habitaciones')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control form-control-lg form-control-solid" type="text"
                                               name="bedrooms_home"oninvalid="showAlert()" id="bedrooms_home" required
                                               value="{{@old('bedrooms_home') ?? 0}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Baños')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control form-control-lg form-control-solid" type="text"
                                               name="bathrooms_home"oninvalid="showAlert()" id="bathrooms_home" required
                                               value="{{@old('bathrooms_home') ?? 0}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Metros construidos')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control form-control-lg form-control-solid" type="text"
                                               name="built_meters_home"oninvalid="showAlert()" id="built_meters_home" required
                                               value="{{@old('built_meters_home') ?? 0}}">
                                    </div>
                                </div>
                            </div>
                            <div id="caracteristicas_country" style="display: none;">

                                <div class="row">
                                    <label class="col-xl-3"></label>
                                    <div class="col-lg-9 col-xl-6">
                                        <h5 class="font-weight-bold mb-6">@lang('Datos casa de campo')</h5>
                                    </div>
                                </div>
                                <!-- <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                           for="exampleSelect1">@lang('Tipo')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <select class="form-control form-control-solid" name="type" id="exampleSelect1"
                                                value="" >
                                            <option>@lang('Casa o chalet independiente')</option>
                                            <option>@lang('Chalet pareado')</option>
                                            <option>@lang('Chalet adosado')</option>
                                        </select>
                                    </div>
                                </div> -->
                                {{--

                                <div class="form-group row" style="display: none">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left" for="exampleSelect1">@lang('Estado')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <select class="form-control form-control-solid" name="estate"
                                                id="exampleSelect1" value="">
                                            <option value="A reformar" {{@old('estate')=='A reformar' ? 'selected' : ''}}>@lang('A reformar')</option>
                                            <option value="Buen estado" {{@old('estate')=='Buen estado' ? 'selected' : ''}}>@lang('Buen estado')</option>
                                        </select>
                                    </div>
                                </div>
                                    --}}
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Habitaciones')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control form-control-lg form-control-solid" type="text"
                                               name="bedrooms_countryhome" id="bedrooms_countryhome" required oninvalid="showAlert()"
                                               value="{{@old('bedrooms_countryhome') ?? 0}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Baños')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control form-control-lg form-control-solid" type="text"
                                               name="bathrooms_countryhome" id="bathrooms_countryhome" required oninvalid="showAlert()"
                                               value="{{@old('bathrooms_countryhome') ?? 0}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Metros construidos')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control form-control-lg form-control-solid" type="text"
                                               name="built_meters_country" id="built_meters_country"required oninvalid="showAlert()"
                                               value="{{@old('built_meters_country') ?? 0}}">
                                    </div>
                                </div>
                            </div>
                            <div id="caracteristicas_office" style="display: none;">

                                <div class="row">
                                    <label class="col-xl-3"></label>
                                    <div class="col-lg-9 col-xl-6">
                                        <h5 class="font-weight-bold mb-6">@lang('Datos oficina')</h5>
                                    </div>
                                </div>
                                {{--

                                <div class="form-group row" style="display: none" >
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left" for="exampleSelect1">@lang('Estado')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <select class="form-control form-control-solid" name="state" id="exampleSelect1"
                                                Value="0">
                                            <option value="A reformar" {{@old('state')=='A reformar' ? 'selected' : ''}}>@lang('A reformar')</option>
                                            <option value="Buen estado" {{@old('state')=='Buen estado' ? 'selected' : ''}}>@lang('Buen estado')</option>
                                        </select>
                                    </div>
                                </div>
                                --}}
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Metros construidos')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control form-control-lg form-control-solid" type="text"required oninvalid="showAlert()"
                                        value="{{@old('built_meters_office') ?? 0}}"
                                               name="built_meters_office" id="built_meters_office">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left" for="exampleSelect1">@lang('Nº de plazas de garaje')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <select class="form-control form-control-solid" name="garage"
                                                id="exampleSelect1" value="">
                                            <option {{@old('garage')==0 ? 'selected' : ''}}>0</option>
                                            <option {{@old('garage')==1 ? 'selected' : ''}}>1</option>
                                            <option {{@old('garage')==2 ? 'selected' : ''}}>2</option>
                                            <option {{@old('garage')==3 ? 'selected' : ''}}>3</option>
                                            <option {{@old('garage')==4 ? 'selected' : ''}}>4</option>
                                            <option value="5" {{@old('garage')==5 ? 'selected' : ''}}>5+</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left" for="exampleSelect1">@lang('Fachada')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <select class="form-control form-control-solid" name="facade"
                                                id="exampleSelect1" value="">
                                            <option value="Exterior" {{@old('facade')=='Exterior' ? 'selected' : ''}}>@lang('Exterior')</option>
                                            <option value="Interior" {{@old('facade')=='Interior' ? 'selected' : ''}}>@lang('Interior')</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left" for="exampleSelect1">@lang('Distribución')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <select class="form-control form-control-solid" name="distribution"
                                                id="exampleSelect1" value="">
                                            <option  value="Diáfana" {{@old('distribution')=='Diáfana' ? 'selected' : ''}}>@lang('Diáfana')</option>
                                            <option  value="Dividida mamparas" {{@old('distribution')=='Dividida mamparas' ? 'selected' : ''}}>@lang('Dividida mamparas')</option>
                                            <option value="Dividida tabiques" {{@old('distribution')=='Dividida tabiques' ? 'selected' : ''}}>@lang('Dividida tabiques')</option>
                                            <option  value="Por plantas" {{@old('distribution')=='Por plantas' ? 'selected' : ''}}>@lang('Por plantas')</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left" for="exampleSelect1">@lang('Aire acondicionado')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <select class="form-control form-control-solid" name="airconditioning"
                                                id="exampleSelect1" value="">
                                            <option value="No" {{@old('airconditioning')=='No' ? 'selected' : ''}}>@lang('No')</option>
                                            <option value="Frío" {{@old('airconditioning')=='Frío' ? 'selected' : ''}}>@lang('Frío')</option>
                                            <option value="Frío y calor" {{@old('airconditioning')=='Frío y calor' ? 'selected' : ''}}>@lang('Frío y calor')</option>
                                            <option value="Preinstalado" {{@old('airconditioning')=='Preinstalado' ? 'selected' : ''}}>@lang('Preinstalado')</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Plantas')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control form-control-lg form-control-solid" type="text"required oninvalid="showAlert()"
                                        value="{{@old('floors') ?? 0}}"
                                               name="floors" id="floors_office">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left" for="exampleSelect1">@lang('Uso exclusivo')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <select class="form-control form-control-solid" name="office_exclusive_use"
                                                id="exampleSelect1" value="">
                                            <option value=true {{@old('office_exclusive_use')==true ? 'selected' : ''}}>@lang('Si')</option>
                                            <option value=false {{@old('office_exclusive_use')==false ? 'selected' : ''}}>@lang('No')</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div id="caracteristicas_land" style="display: none;">

                                <div class="row">
                                    <label class="col-xl-3"></label>
                                    <div class="col-lg-9 col-xl-6">
                                        <h5 class="font-weight-bold mb-6">@lang('Datos Terreno')</h5>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                           for="exampleSelect1">@lang('Tipo')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <select class="form-control form-control-solid" name="type" id="exampleSelect1"
                                                value="">
                                            <option value="Urbano" {{@old('type')=='Urbano' ? 'selected' : ''}}>@lang('Urbano')</option>
                                            <option value="Urbanizable" {{@old('type')=='Urbanizable' ? 'selected' : ''}}>@lang('Urbanizable')</option>
                                            <option value="No Urbanizable" {{@old('type')=='No Urbanizable' ? 'selected' : ''}}>@lang('No Urbanizable')</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Superficie total')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control form-control-lg form-control-solid" type="text"required oninvalid="showAlert()"
                                        value="{{@old('meters') ?? 0}}"
                                               name="meters" id="meters_land">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Metros edificables')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control form-control-lg form-control-solid" type="text"required oninvalid="showAlert()"
                                        value="{{@old('buildable_meters') ?? 0}}"
                                               name="buildable_meters" id="buildable_meters_land">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Superficie minima que vende')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control form-control-lg form-control-solid" type="text"required oninvalid="showAlert()"
                                        value="{{@old('minimum_meters') ?? 0}}"
                                               name="minimum_meters" id="minimum_meters">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left" for="exampleSelect1">@lang('Alturas máximas edificables')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <select class="form-control form-control-solid" name="maximum_buildable_floors"
                                                id="exampleSelect1" value="">
                                            <option {{@old('maximum_buildable_floors')==1 ? 'selected' : ''}}>1</option>
                                            <option {{@old('maximum_buildable_floors')==2 ? 'selected' : ''}}>2</option>
                                            <option {{@old('maximum_buildable_floors')==3 ? 'selected' : ''}}>3</option>
                                            <option {{@old('maximum_buildable_floors')==4 ? 'selected' : ''}}>4</option>
                                            <option value="5" {{@old('maximum_buildable_floors')==5 ? 'selected' : ''}}>5+</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left" for="exampleSelect1">@lang('Acceso rodado')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <select class="form-control form-control-solid" name="acceso_rodado"
                                                id="exampleSelect1" value="">
                                            <option value="true" {{@old('acceso_rodado')==true ? 'selected' : ''}}>@lang('Si')</option>
                                            <option value="false" {{@old('acceso_rodado')==false ? 'selected' : ''}}>@lang('No')</option>
                                        </select>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <!-- caracteristicas checkbox de las propiedades -->
                        <div class="tab-pane fade" id="char" role="tabpanel" aria-labelledby="char-tab">
                            <form class="form card">
                                <div class="row pt-10" style="justify-content: center !important;">
                                    <!--checkbox caractereisticas de una propiedad general-->
                                    <div id="car_property" class="form-group ">
                                        <label><b>@lang('Características de la propiedad')</b></label>
                                        <div class="row ">
                                            <div class="checkbox-list">
                                                <label class="checkbox">
                                                    <input type="checkbox" name="elevator_property" value="elevator"
                                                           id="elevator_property"
                                                           {{@old('elevator_property')!=null ? 'checked' : ''}}>
                                                    <span></span>@lang('Ascensor')</label>
                                                <label class="checkbox">
                                                    <input type="checkbox"
                                                           id="check_energetic_certification_general"
                                                           name="check_energetic_certification_general"
                                                           value="check_energetic_certification_general"
                                                           {{@old('check_energetic_certification_general')!=null ? 'checked' : ''}}>
                                                    <span></span>@lang('Certificado energético')</label>
                                                <label class="checkbox">
                                                    <input type="checkbox" id="check_armarios"
                                                           name="armarios" value="check_armarios"
                                                           {{@old('armarios')!=null ? 'checked' : ''}}>
                                                    <span></span>@lang('Armarios empotrados')</label>
                                                <label class="checkbox">
                                                    <input type="checkbox" id="check_aire" name="aire"
                                                           value="check_aire"
                                                           {{@old('aire')!=null ? 'checked' : ''}}>
                                                    <span></span>@lang('Aire acondicionado')</label>
                                                <label class="checkbox">
                                                    <input type="checkbox" id="check_security"

                                                           name="check_security" value="check_security"
                                                           {{@old('check_security')!=null ? 'checked' : ''}}>
                                                    <span></span>@lang('Seguridad')</label>

                                                <label class="checkbox">
                                                    <input type="checkbox" id="check_terraza"
                                                           name="terraza" value="check_terraza"
                                                           {{@old('terraza')!=null ? 'checked' : ''}}>
                                                    <span></span>@lang('Terraza')</label>
                                                <label class="checkbox">
                                                    <input type="checkbox" id="check_balcon"
                                                           name="balcon" value="check_balcon"
                                                           {{@old('balcon')!=null ? 'checked' : ''}}>
                                                    <span></span>@lang('Balcón')</label>
                                                <label class="checkbox">
                                                    <input type="checkbox" id="check_trastero"
                                                           name="trastero" value="check_trastero"
                                                           {{@old('trastero')!=null ? 'checked' : ''}}>
                                                    <span></span>@lang('Trastero')</label>
                                                <label class="checkbox">
                                                    <input type="checkbox" id="check_garaje"
                                                           name="garaje" value="check_garaje"
                                                           {{@old('garaje')!=null ? 'checked' : ''}}>
                                                    <span></span>@lang('Plaza de garaje')</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!--checkbox caractereisticas edificio-->
                                    <div id="car_building" class="form-group pl-10">
                                        <label><b>Características del edificio</b></label>
                                        @if(Auth::user()->owner->type == 'promotor')
                                        <div class="checkbox-list">
                                            <label class="checkbox">
                                                <input type="checkbox" id="piscina_comunitaria" name="piscina_comunitaria" value="piscina_comunitaria"
                                                {{@old('piscina_comunitaria')!=null ? 'checked' : ''}}>
                                                <!-- todo translate traducciones -->
                                                <span></span>Piscina comunitaria</label>
                                            <label class="checkbox">
                                                <input type="checkbox" id="zona_deportiva" name="zona_deportiva" value="zona_deportiva"
                                                {{@old('zona_deportiva')!=null ? 'checked' : ''}}>
                                                <span></span>Zona deportiva
                                            </label>
                                            <label class="checkbox">
                                                <input type="checkbox" id="zona_verde" name="zona_verde" value="zona_verde"
                                                {{@old('zona_verde')!=null ? 'checked' : ''}}>
                                                <span></span>Zona verde
                                            </label>
                                            <label class="checkbox">
                                                <input type="checkbox" id="juegos" name="juegos" value="juegos"
                                                {{@old('juegos')!=null ? 'checked' : ''}}>
                                                <span></span>Juegos infantiles
                                            </label>
                                            <label class="checkbox">
                                                <input type="checkbox" id="promotion_seguridad" name="promotion_seguridad" value="promotion_seguridad"
                                                {{@old('promotion_seguridad')!=null ? 'checked' : ''}}>
                                                <span></span>Seguridad
                                            </label>
                                            <label class="checkbox">
                                                <input type="checkbox" id="urb_cerrada" name="urb_cerrada" value="urb_cerrada"
                                                {{@old('urb_cerrada')!=null ? 'checked' : ''}}>
                                                <span></span>Urbanización cerrada
                                            </label>
                                        </div>
                                        @else

                                        <div class="checkbox-inline">
                                            <label class="checkbox">
                                                <input type="checkbox" id="piscina" name="piscina" value="piscina"
                                                {{@old('piscina')!=null ? 'checked' : ''}}>
                                                <span></span>@lang('Piscina')</label>
                                            <label class="checkbox">
                                                <input type="checkbox" id="zona_verde" name="zona_verde"
                                                       value="zona_verde"
                                                       {{@old('zona_verde')!=null ? 'checked' : ''}}>
                                                <span></span>@lang('Zona verde')
                                            </label>
                                        </div>
                                        @endif
                                    </div>
                                    <!--checkbox caractereisticas oficina-->
                                    <div id="car_ofi" style="display: none;" class="form-group pl-10">
                                        <label><b>Características de la oficina</b></label>
                                        <div class="checkbox-list">
                                            <label class="checkbox">
                                                <input type="checkbox" id="agua_caliente"
                                                       name="agua_caliente" value="agua_caliente"
                                                       {{@old('agua_caliente')!=null ? 'checked' : ''}}>
                                                <span></span>@lang('Agua caliente')</label>
                                            <label class="checkbox">
                                                <input type="checkbox" name="calefaccion" value="calefaccion"
                                                       id="calefaccion"
                                                       {{@old('calefaccion')!=null ? 'checked' : ''}}>
                                                <span></span>@lang('Calefacción verde')</label>
                                            <label class="checkbox">
                                                <input type="checkbox" name="cocina" value="cocina" id="cocina"
                                                {{@old('cocina')!=null ? 'checked' : ''}}>
                                                <span></span>@lang('Cocina')</label>
                                            <label class="checkbox">
                                                <input type="checkbox" name="almacen" value="almacen" id="almacen"
                                                {{@old('almacen')!=null ? 'checked' : ''}}>
                                                <span></span>@lang('Almacén')</label>
                                            <label class="checkbox">
                                                <input type="checkbox" name="cristal_doble" value="cristal_doble"
                                                       id="cristal_doble"
                                                       {{@old('cristal_doble')!=null ? 'checked' : ''}}>
                                                <span></span>@lang('Cristal doble')</label>
                                            <label class="checkbox">
                                                <input type="checkbox" name="falso_techo" value="falso_techo"
                                                       id="falso_techo"
                                                       {{@old('falso_techo')!=null ? 'checked' : ''}}>
                                                <span></span>@lang('Falso techo')</label>
                                            <label class="checkbox">
                                                <input type="checkbox" name="suelo_tecnico" value="suelo_tecnico"
                                                       id="suelo_tecnico"
                                                       {{@old('suelo_tecnico')!=null ? 'checked' : ''}}>
                                                <span></span>@lang('Suelo técnico verde')</label>
                                            <label class="checkbox">
                                                <input type="checkbox" name="elevator_office" value="elevator_office"
                                                       id="elevator_office"
                                                       {{@old('elevator_office')!=null ? 'checked' : ''}}>
                                                <span></span>@lang('Ascensor')</label>
                                            <label class="checkbox">
                                                <input type="checkbox" name="energetic_certification_office"
                                                       value="energetic_certification_office"
                                                       id="energetic_certification_office"
                                                       {{@old('energetic_certification_office')!=null ? 'checked' : ''}}>
                                                <span></span>@lang('Certificación energética')</label>
                                        </div>
                                    </div>
                                    <!--checkbox seguridad oficina oficina-->
                                    <div id="seguridad_ofi" style="display: none;" class="form-group pl-10">
                                        <label><b>@lang('Seguridad oficina')</b></label>
                                        <div class="checkbox-list">
                                            <label class="checkbox">
                                                <input type="checkbox" name="puerta_seguridad" id="puerta_seguridad"
                                                {{@old('puerta_seguridad')!=null ? 'checked' : ''}}
                                                       value="puerta_seguridad">
                                                <span></span>@lang('Puerta de seguridad')</label>
                                            <label class="checkbox">
                                                <input type="checkbox" name="alarma" value="alarma" id="alarma"
                                                {{@old('alarma')!=null ? 'checked' : ''}}>
                                                <span></span>@lang('Alarma')</label>
                                            <label class="checkbox">
                                                <input type="checkbox" name="control" value="control_accesos"
                                                       id="control_accesos"
                                                       {{@old('control')!=null ? 'checked' : ''}}>
                                                <span></span>@lang('Control de accesos')</label>
                                            <label class="checkbox">
                                                <input type="checkbox" name="detector_incendios"
                                                       value="detector_incendios" id="detector_incendios"
                                                       {{@old('detector_incendios')!=null ? 'checked' : ''}}>
                                                <span></span>@lang('Detectores de incendios')</label>
                                            <label class="checkbox">
                                                <input type="checkbox" name="extintores" value="extintores"
                                                       id="extintores"
                                                       {{@old('extintores')!=null ? 'checked' : ''}}>
                                                <span></span>@lang('Extintores')</label>
                                            <label class="checkbox">
                                                <input type="checkbox" name="aspersores" value="aspersores"
                                                       id="aspersores"
                                                       {{@old('aspersores')!=null ? 'checked' : ''}}>
                                                <span></span>@lang('Aspersores')</label>
                                            <label class="checkbox">
                                                <input type="checkbox" name="cortafuegos" value="cortafuegos"
                                                       id="cortafuegos"
                                                       {{@old('cortafuegos')!=null ? 'checked' : ''}}>
                                                <span></span>@lang('Puerta cortafuegos')</label>
                                            <label class="checkbox">
                                                <input type="checkbox" name="luces" value="luces_salida"
                                                       id="luces_salida"
                                                       {{@old('luces')!=null ? 'checked' : ''}}>
                                                <span></span>@lang('Luces de salida')</label>
                                            <label class="checkbox">
                                                <input type="checkbox" name="conserje" vvertalue="conserje" id="conserje"
                                                {{@old('conserje')!=null ? 'checked' : ''}}>
                                                <span></span>@lang('Conserje/Portero')</label>
                                        </div>
                                    </div>
                                    <!--checkbox Caracteristicas terreno-->
                                    <div id="car_land" style="display: none;" class="form-group pl-10">
                                        <label><b>@lang('Características Terreno')</b></label>
                                        <div class="checkbox-list">
                                            <label class="checkbox">
                                                <input type="checkbox" name="agua" value="agua" id="agua"
                                                {{@old('agua')!=null ? 'checked' : ''}}>
                                                <span></span>@lang('Agua')</label>
                                            <label class="checkbox">
                                                <input type="checkbox" name="luz" value="luz" id="luz"
                                                {{@old('luz')!=null ? 'checked' : ''}}>
                                                <span></span>@lang('Luz')</label>
                                            <label class="checkbox">
                                                <input type="checkbox" name="alcantarillado" value="alcantarillado"
                                                       id="alcantarillado"
                                                       {{@old('alcantarillado')!=null ? 'checked' : ''}}>
                                                <span></span>@lang('Alcantarillado')</label>
                                            <label class="checkbox">
                                                <input type="checkbox" name="gas" value="gas" id="gas"
                                                {{@old('gas')!=null ? 'checked' : ''}}>
                                                <span></span>@lang('Gas natural')</label>
                                            <label class="checkbox">
                                                <input type="checkbox" name="alumbrado" value="alumbrado"
                                                       id="alumbrado"
                                                       {{@old('alumbrado')!=null ? 'checked' : ''}}>
                                                <span></span>@lang('Alumbrado público')</label>
                                            <label class="checkbox">
                                                <input type="checkbox" name="aceras" value="aceras" id="aceras"
                                                {{@old('aceras')!=null ? 'checked' : ''}}>
                                                <span></span>@lang('Aceras')</label>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>

{{--
  --    TAB CONTENTS
  --    DOCUMENTACION TAB DIV
  --}}
{{--
  -- @ RM Rafa Mollá  2020-11-09 07:37 AM en el alta de propiedades hay que ocultar la pestaña de documentación
  -- para un promotor necesitamos esta pestaña, aunque seguira oculta para los demas--}}
            @if(Auth::user()->owner->type=="promotor")

                        <div class="tab-pane fade" id="doc" role="tabpanel" aria-labelledby="doc-tab">
                            <div class="row">
                                <label class="col-xl-3"></label>
                                <div class="col-lg-9 col-xl-6">
                                    <h3 class="font-weight-bold mb-20 mt-15 text-center">Documentación</h3>
                                </div>
                            </div>
                            <div class="form-group row" style="justify-content: center">
                                <label class="col-xl-3 col-lg-3 col-form-label text-left" for="documents">Planos</label>
                                <div class="col-lg-9 col-xl-6">
                                    {{--<input id="documents" class="form-control form-control-lg form-control-solid" type="file" name="documentsPlanos[]" multiple="multiple"  value="{{@old('documents')}}">--}}
                                    <input class="multifilePlanos" type="file" multiple="multiple" name="documentsPlanos[]">
                                    <div id="docsContainer"></div>
                                    <!-- <input  id="documentsPlanos" multiple  class="form-control form-control-lg form-control-solid multifile" type="file" name="documentsPlanos[]"  value="" title=" " > -->
                                    <!-- <div class="multifile_container">

                                    </div> -->
                                    <!-- <ul id="listaPlanos"></ul> -->
                                </div>
                            </div>
                            <div class="form-group row" style="justify-content: center">
                                <label class="col-xl-3 col-lg-3 col-form-label text-left" for="documents">Disponibilidades</label>
                                <div class="col-lg-9 col-xl-6">
                                    {{--<input id="documents" class="form-control form-control-lg form-control-solid" type="file" name="documentsDispo[]" multiple="multiple"  value="{{@old('documents[]')}}">--}}
                                    <input class="multifileDispo" type="file" name="documentsDispo[]">
                                    <div id="dispoContainer"></div>
                                </div>
                            </div>
                            <div class="form-group row" style="justify-content: center">
                                <label class="col-xl-3 col-lg-3 col-form-label text-left" for="documents">Memoria de calidades</label>
                                <div class="col-lg-9 col-xl-6">
                                    {{--<input id="documents2" class="form-control form-control-lg form-control-solid" type="file" name="documentsMemoria[]" multiple="multiple" value="{{@old('documents')}}">--}}
                                    <input class="multifileMemoria" type="file" name="documentsMemoria[]">
                                    <div id="memoriaContainer"></div>
                                </div>
                            </div>

                           <!-- begin dropbox promotor-->
                           <div class="form-group row" style="justify-content: center;">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left" for="exampleTextarea">@lang('Enlaces externos DROPBOX')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <textarea class="form-control" id="exampleTextarea"

                                        name="promotion_dropbox" value="" rows="2">{{@old('promotion_dropbox')}}</textarea>
                                    </div>
                            </div>
                            <!-- end dropbox promocion-->
                            <!-- begin web promotor-->
                            <div class="form-group row" style="justify-content: center;">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left" >@lang('Enlaces externos WEB')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <textarea class="form-control" id="promotion_web"

                                        name="promotion_web"  rows="2">{{@old('promotion_web')}}</textarea>
                                    </div>
                            </div>
                            <!-- end web promocion-->
                            <!-- begin otros promotor-->
                            <div class="form-group row" style="justify-content: center;">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left" >@lang('Otros enlaces')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <textarea class="form-control" id="promotion_other"

                                        name="promotion_other"  rows="2">{{@old('promotion_other')}}</textarea>
                                    </div>
                            </div>
                            <!-- end otros promocion-->

                        </div>

            @endif
                        {{--
                          --    TAB DISTANCES
                          --    DISTANCES TAB DIV
                          --}}
                        <div class="tab-pane fade" id="distances" role="tabpanel" aria-labelledby="dist-tab">
                            <div class="row">
                                <label class="col-xl-3"></label>
                                <div class="col-lg-9 col-xl-6">
                                    <h3 class="font-weight-bold mb-20 mt-15 text-center">@lang('Distancias de la propiedad')</h3>
                                </div>


                            </div>
                            @include('backend.includes.distances_tab')
                        </div>
                        <!--end::Body-->

                        <div class="card-footer text-center pt-20">
                            <div class="card-toolbar">
                                <button type="button"  id="next_button" onclick="next()" class="btn btn-success mr-2" >@lang('Siguiente')</button>
                                <button type="submit"   style="display: none;" id="end_button" class="btn btn-success mr-2" >@lang('Terminar')</button>
                                <a class="" href="{{route('properties.index')}}">
                                <button type="button"  class="btn btn-secondary">@lang('Cancelar')</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
    </div>
@endsection
@section('js')
    <script>
        function beforeSubmit(evt) {
            //let formEl = document.getElementById('form_create_property');
            //removeFields(['zone_country', 'zone_state', 'zone_county', 'zone_city', 'latitude', 'longitude', 'location_country', 'location_state', 'location_county', 'location_city', 'location_street', 'location_postcode']);
            let city = document.getElementById('location_city').value;
            let promo_date = document.getElementById('kt_datetimepicker_8');

            console.log($('ul#sortable  li').length)
            if($('ul#sortable  li').length < 3 ){
                evt.preventDefault();
                Swal.fire('Es necesario seleccionar al menos 3 imágenes', '¡Revisa la pestaña imágenes!', 'warning');
                return;
            }

            if(city == -1){
                evt.preventDefault();

                console.log('Requerido')
                Swal.fire('Es necesario elegir una ciudad', '¡Revisa la pestaña zona!', 'warning');
                return;
            }

            if(promo_date != null && promo_date.value == ""){
                evt.preventDefault();
                //todo translate
                Swal.fire('Es necesario elegir una fecha para la promoción', '¡Revisa la pestaña general!', 'warning');
                return;
            }

            if(isNaN(document.getElementById("agency_commissions_hidden").value)){
                document.getElementById("agency_commissions_hidden").value = "{{$minimum_commission}}"
            }

            /*bloquear boton submit cuando se va a subir la propiedad
            para evitar  mandar maas de una vez el post sobre todo en moviles*/
            document.getElementById('end_button').disabled = true;

            return false;
        }

        function showCommission(show){
            if(show){
                $("#groupCommissions").hide();
                $("#labelPrecio").hide();
                $("#labelPrecioMes").show();
            }else{
                $("#groupCommissions").show();
                $("#labelPrecio").show();
                $("#labelPrecioMes").hide();

            }
        }
    </script>
    <!-- scripts para datepicker-->
    <script src={{ url('/assets/backend/js/bootstrap-datepicker.js') }}></script>
    <script>// Demo 8
        $('#kt_datetimepicker_8').datetimepicker({
            format: "dd-mm-yyyy",
            todayHighlight: true,
            autoclose: true,
            startView: 2,
            minView: 2,
            forceParse: 0,
            pickerPosition: 'top-right',
            startDate: "{{Carbon\Carbon::today()}}"
        });
        $('#kt_datetimepicker_6').datetimepicker({
            format: "dd/mm/yyy",
            todayHighlight: true,
            autoclose: true,

            pickerPosition: 'bottom-left'
        });
    </script>
    <!-- end datepicker-->

    <script
        src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAPS_API_KEY')}}&callback=initMap&libraries=&v=weekly"
        defer></script>
    <script src="{{asset('/assets/backend/js/components/inmozon.maps.js')}}"></script>


    <script >

      /*  $('#location_country').on('change', function(){
            var value = $("#location_country").val()
            if(value!=-1)
                $("#required_country").val(value)
        })
        $('#location_state').on('change', function(){
            var value = $("#location_state").val()
            if(value!=-1)
                $("#required_state").val(value)
        })
        $('#location_county').on('change', function(){
            var value = $("#location_county").val()
            if(value!=-1)
                $("#required_county").val()
        })
        $("#location_city").on("change", function(){
            //var value = $("#location_city option:selected").text();
            var value = document.getElementById("location_city").value
            if(value !=-1)
                //$("#required_city").attr("value", value )
                document.getElementById("required_city").value = value
            //console.log($("#required_city").attr("value"), value)
            console.log(document.getElementById("required_city").value )
        })
*/


        $('.nav-link').click(function(){
            if($(this).attr("id") != "dist-tab"){
                    document.getElementById("next_button").style.display = "inline";
                    document.getElementById("end_button").style.display = "none";
            }else{
                document.getElementById("next_button").style.display = "none";
                document.getElementById("end_button").style.display = "inline";
            }
        });



        function next(){
            document.getElementById("next_button").style.display = "inline";
            document.getElementById("end_button").style.display = "none";
            if($('.nav-link.active').attr("id") == "home-tab"){
                //tab
                $('#home-tab').removeClass("active");
                $("#zone-tab").addClass("active");

                //tab content
                $("#home").removeClass("active").removeClass("show");
                $("#zone").addClass("active").addClass("show");
            }else if($('.nav-link.active').attr("id") == "zone-tab"){
                 //tab
                 $('#zone-tab').removeClass("active");
                $("#imagenes-tab").addClass("active");

                //tab content
                $("#zone").removeClass("active").removeClass("show");
                $("#imagenes").addClass("active").addClass("show");
            }else if($('[class="nav-link active"]').attr("id") == "imagenes-tab"){
                 //tab
                $('#imagenes-tab').removeClass("active");
                $("#imagenes").removeClass("active").removeClass("show");


                 //necesitamos este if porque las pestañas de promotor son distintas
                 if( $('#type-tab').css('display') == 'block'){
                    $("#type-tab").addClass("active");
                    $("#caracteristicas").addClass("active").addClass("show");

                }else{
                    $("#char-tab").addClass("active");
                    $("#char").addClass("active").addClass("show");
                }

                //tab content
                //$("#caracteristicas").addClass("active").addClass("show");
            }else if($('[class="nav-link active"]').attr("id") == "type-tab"){
                 //tab
                 $('#type-tab').removeClass("active");
                $("#char-tab").addClass("active");

                //tab content
                $("#caracteristicas").removeClass("active").removeClass("show");
                $("#char").addClass("active").addClass("show");
            }else if($('[class="nav-link active"]').attr("id") == "char-tab"){
                 //tab
                $('#char-tab').removeClass("active");
                $("#char").removeClass("active").removeClass("show");
// @ RM Rafa Mollá  2020-11-09 07:37 AM en el alta de propiedades hay que ocultar la pestaña de documentación

                //tab content

                if( $('#doc-tab').length){
                    //check if tab exists
                    $("#doc").addClass("active").addClass("show");
                    $("#doc-tab").addClass("active");

                }else{
                     $("#dist-tab").addClass("active");
                     $("#distances").addClass("active").addClass("show");
                     document.getElementById("next_button").style.display = "none";
                    document.getElementById("end_button").style.display = "inline";
                }
                //$("#dist-tab").addClass("active");
                //$("#distances").addClass("active").addClass("show");
                ///document.getElementById("next_button").style.display = "none";
                //document.getElementById("end_button").style.display = "inline";

// @ RM Rafa Mollá  2020-11-09 07:37 AM en el alta de propiedades hay que ocultar la pestaña de documentación
            //   $("#doc").addClass("active").addClass("show");
//
            }else{
//                  tab
// @ RM Rafa Mollá  2020-11-09 07:37 AM en el alta de propiedades hay que ocultar la pestaña de documentación
                 $('#doc-tab').removeClass("active");
                 $("#dist-tab").addClass("active");

                //tab content
// @ RM Rafa Mollá  2020-11-09 07:37 AM en el alta de propiedades hay que ocultar la pestaña de documentación
                $("#doc").removeClass("active").removeClass("show");
                 $("#distances").addClass("active").addClass("show");
                 document.getElementById("next_button").style.display = "none";
                 document.getElementById("end_button").style.display = "inline";

            }

/*
            if($('[class="nav-link active"]').attr("id") == "doc-tab"){
                var elem = $('[class="nav-link active"]').removeClass("active");
                $("#dist-tab").addClass("active");

                var elem2 = $("#doc").removeClass("active").removeClass("show");
                $("#distances").addClass("active").addClass("show");


            }else{

            }*/

        }


        function check_required() {
                var elements = document.getElementById("form_create_property").elements;
                for (var i = 0, len = elements.length; i < len; ++i) {
                    if(elements[i].value)
                     elements[i].disabled = false;
                }
            }
    </script>

    <script>

            //tenemos una variable hidden donde almacenamos los valores como numeros
            //y otra variable (el input) donde tenemos el formato visual como string
            //solo enviamos el hidden con el valor numerico
            var iva_number = 0;
            var comision_agencia_number = 0;

            function isValid(value){
                console.log(value)

                if(isNaN(document.getElementById("agency_commissions").value) || document.getElementById("agency_commissions").value=="")
                    document.getElementById("agency_commissions").value = "{{$minimum_commission}}";
                var min_commision = "{{$minimum_commission}}";
                console.log(min_commision);
                if(parseInt(value)<parseInt(min_commision)){
                    document.getElementById("agency_commissions").value = min_commision;
                    //document.getElementById("agency_commissions_hidden").value = min_commision;
                    //this.calculateIVA2()
                    //this.calculateCommision2();
                    Swal.fire('La comisión debe ser mayor o igual a '+min_commision+'%', '¡Revisa la comisión!', 'warning');

                }
            }

            function setHiddenPricePromotion(){
                nf = new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'EUR' });
                document.getElementById("price_hidden").value = document.getElementById("promotion_price_min").value
                document.getElementById("agency_commissions_hidden").value = document.getElementById("promotion_agency_commissions").value

            // document.getElementById("price").value = nf.format(document.getElementById("price").value)

            }

            function setHiddenPrice(){
                nf = new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'EUR' });
                document.getElementById("price_hidden").value = document.getElementById("price").value
                //document.getElementById("price").value = nf.format(document.getElementById("price").value)
                //si es navegador safari desactivamos formato
                console.log(window.navigator)
                var IOS = ['iPad', 'iPhone', 'iPod', 'MacIntel'].indexOf(navigator.platform) >= 0;
                //if(navigator.userAgent.indexOf("Safari") > -1){
                if(!IOS){
                    document.getElementById("price").value = nf.format(document.getElementById("price").value)
                }

            }

            function setHiddenComission(){
                nf = new Intl.NumberFormat('de-DE', { style: 'percent' });
                if(isNaN(document.getElementById("agency_commissions").value) || document.getElementById("agency_commissions").value==""){
                   // document.getElementById("agency_commissions").value = "{{$minimum_commission}}";

                }

                document.getElementById("agency_commissions_hidden").value = document.getElementById("agency_commissions").value

                var IOS = ['iPad', 'iPhone', 'iPod', 'MacIntel'].indexOf(navigator.platform) >= 0;
                if(!IOS){
                     document.getElementById("agency_commissions").value = document.getElementById("agency_commissions").value.toFixed(2)

                }else{
                    document.getElementById("agency_commissions").value = parseFloat(document.getElementById("agency_commissions").value).toFixed(2)+"%"

                }
                //si es navegador safari desactivamos formato
              /*  if(navigator.userAgent.indexOf("Safari") > -1)
                document.getElementById("agency_commissions").value = document.getElementById("agency_commissions").value.toFixed(2)
                else
                document.getElementById("agency_commissions").value = parseFloat(document.getElementById("agency_commissions").value).toFixed(2)+"%"
*/
            }

            function calculateIVA(){
                nf = new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'EUR' });


                var calculated_commission = document.getElementById("agency_commissions_hidden").value * document.getElementById("price").value*0.01 ;
                @if(Auth::user()->type == "owner" && Auth::user()->owner->type == "agente")
                    calculated_commission<2000 ? calculated_commission=2000 : calculated_commission;
                @else
                    calculated_commission<3000 ? calculated_commission=3000 : calculated_commission;
                @endif

                var calculated = 0.21*calculated_commission
                calculated = parseFloat(calculated).toFixed(2);
                this.iva_number = calculated
                document.getElementById("iva").value =  nf.format(calculated);
            }
            function calculateIVA2(){
                nf = new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'EUR' });

                var calculated_commission = document.getElementById("agency_commissions_hidden").value * document.getElementById("price_hidden").value*0.01 ;
                @if(Auth::user()->type == "owner" && Auth::user()->owner->type == "agente")
                    calculated_commission<2000 ? calculated_commission=2000 : calculated_commission;
                @else
                    calculated_commission<3000 ? calculated_commission=3000 : calculated_commission;
                @endif

                var calculated = 0.21*calculated_commission
                calculated = parseFloat(calculated).toFixed(2);

                this.iva_number = calculated
                document.getElementById("iva").value =  nf.format(calculated);
            }

            function agencyCommision() {
                nf = new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'EUR' });

                const noTruncarDecimales = {maximumFractionDigits: 20};
                var calculated =
                    (document.getElementById("agency_commissions_hidden").value
                    * document.getElementById("price").value*0.01);
                @if(Auth::user()->type == "owner" && Auth::user()->owner->type == "agente")
                    calculated<2000 ? calculated=2000 : calculated;
                @else
                    calculated<3000 ? calculated=3000 : calculated;
                @endif
                this.comision_agencia_number = calculated
            //   calculated = parseFloat(calculated).toFixed(2);
                var IOS = ['iPad', 'iPhone', 'iPod', 'MacIntel'].indexOf(navigator.platform) >= 0;
                if(!IOS){
                document.getElementById("calculated_agency_commission").value = nf.format(calculated);
                }else{
                document.getElementById("calculated_agency_commission").value = calculated;

                }
            }

            function agencyCommision2() {
                nf = new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'EUR' });

                document.getElementById("agency_commissions_hidden").value = document.getElementById("agency_commissions").value
                const noTruncarDecimales = {maximumFractionDigits: 20};
                var calculated =
                    (document.getElementById("agency_commissions_hidden").value
                    * document.getElementById("price_hidden").value*0.01);
                @if(Auth::user()->type == "owner" && Auth::user()->owner->type == "agente")
                    calculated<2000 ? calculated=2000 : calculated;
                @else
                    calculated<3000 ? calculated=3000 : calculated;
                @endif
                this.comision_agencia_number = calculated

            //   calculated = parseFloat(calculated).toFixed(2);
                //NO FORMATEAR EN IOS
                var IOS = ['iPad', 'iPhone', 'iPod', 'MacIntel'].indexOf(navigator.platform) >= 0;
                if(!IOS){
                document.getElementById("calculated_agency_commission").value = nf.format(calculated);
                }else{
                document.getElementById("calculated_agency_commission").value = calculated;

                }
            }

            function calculateCommision() {
                nf = new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'EUR' });
                var calculated = document.getElementById("price").value
                    - this.comision_agencia_number
                    - parseFloat(this.iva_number);

                document.getElementById("result").value = nf.format(calculated);
            }

            function calculateCommision2() {
                nf = new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'EUR' });
                var calculated = document.getElementById("price_hidden").value -
                    this.comision_agencia_number - parseFloat(this.iva_number);

                document.getElementById("result").value = nf.format(calculated);
            }

            function checkIVA(){
                document.getElementById("price_hidden").value = document.getElementById("price").value
            }

            function setHiddenNoFormatCommission(){
                document.getElementById("agency_commissions_hidden").value = document.getElementById("agency_commissions").value
            }

 function showAlert (campo) {

            Swal.fire('Falta rellenar algun campo', '¡Revisa las pestañas!', 'warning');
            }
        function disable_children(id) {
                var elements = document.getElementById(id).elements;
                for (var i = 0, len = elements.length; i < len; ++i) {
                    elements[i].disabled = true;
                }
            }

            function enable_children(id) {
                var elements = document.getElementById(id).elements;
                for (var i = 0, len = elements.length; i < len; ++i) {
                    elements[i].disabled = false;
                }
            }

        function setMultipleTypes(){

        }

        function setValues() {
            try {

                //tipo de propiedad
                var type = document.getElementById("propertyable_type").value
                try {
                    //seleccionamos la casilla built meters correspondiente y copiamos el valor a un unico campo que lelgara al controller
                    var selectItem = document.getElementById("built_meters_" + type.toLowerCase())
                    document.getElementById("id_built_meters").value = selectItem.value

                } catch (error) {

                }

                try {

                    var bathrooms = document.getElementById("bathrooms_" + type.toLowerCase())
                    document.getElementById("bathrooms").value = bathrooms.value;
                } catch (error) {

                }

                try {
                    var bedrooms = document.getElementById("bedrooms_" + type.toLowerCase())
                    document.getElementById("bedrooms").value = bedrooms.value;

                } catch (error) {

                }

                //cojemos el checkbox elevator correspondiente al tipo de propiedad y copiamos el valor a un unico campo que llegara al controlador
                //var elevatorCheckBoxes = document.getElementById("elevator_" + type.toLowerCase())
                //document.getElementById("elevator").value = elevatorCheckBoxes.value

                //submit desde JS
               // document.getElementById('form_create_property').action = "{{route('properties.store')}}";
                //document.getElementById("form_create_property").submit();
            } catch (error) {
                console.log(error)
            }
        }



        document.getElementById("propertyable_type").addEventListener('change', (event) => {

            //if($("#caracteristicas").length)
              //  document.getElementById("caracteristicas").style.display = "block";
            //////adicional para oficina
            document.getElementById("seguridad_ofi").style.display = "none";
            document.getElementById("car_ofi").style.display = "none";
            document.getElementById("car_building").style.display = "block";
            document.getElementById("car_property").style.display = "block";
            document.getElementById("car_land").style.display = "none";
            //////////////

            document.getElementById("type-tab").style.display = "block";
            document.getElementById("caracteristicas_flat").style.display = "none";
            document.getElementById("caracteristicas_home").style.display = "none";
            document.getElementById("caracteristicas_country").style.display = "none";
            document.getElementById("caracteristicas_office").style.display = "none";
            document.getElementById("caracteristicas_land").style.display = "none";

//desabilitar required de las pestañas que no se ven
//para poder enviar formulario
            document.getElementById("built_meters_flat").disabled = true;
            document.getElementById("bedrooms_flat").disabled = true;
            document.getElementById("bathrooms_flat").disabled = true;

            document.getElementById("bedrooms_home").disabled = true;
            document.getElementById("bathrooms_home").disabled = true;
            document.getElementById("built_meters_home").disabled = true;

            document.getElementById("bedrooms_countryhome").disabled = true;
            document.getElementById("bathrooms_countryhome").disabled = true;
            document.getElementById("built_meters_country").disabled = true;

            document.getElementById("built_meters_office").disabled = true;
            document.getElementById("floors_office").disabled = true;

            document.getElementById("meters_land").disabled = true;
            document.getElementById("buildable_meters_land").disabled = true;
            document.getElementById("minimum_meters").disabled = true;

            switch (event.target.value) {
                case "Flat":
                    document.getElementById("type-tab").innerText = "Piso";
                    document.getElementById("caracteristicas_flat").style.display = "block";
                    document.getElementById("built_meters_flat").disabled = false;
            document.getElementById("bedrooms_flat").disabled = false;
            document.getElementById("bathrooms_flat").disabled = false;

            //$("#caracteristicas_flat").children().prop('disabled',false);
//enable_children("caracteristicas_flat");
                   // document.getElementById("caracteristicas_flat").disabled = false;
                    break;
                case "Home":
                    document.getElementById("type-tab").innerText = "Casa/Home";
                    document.getElementById("caracteristicas_home").style.display = "block";
                    document.getElementById("bedrooms_home").disabled = false;
            document.getElementById("bathrooms_home").disabled = false;
            document.getElementById("built_meters_home").disabled = false;

                    break;
                case "CountryHome":
                    document.getElementById("type-tab").innerText = "Casa de campo";
                    document.getElementById("caracteristicas_country").style.display = "block";
                    document.getElementById("bedrooms_countryhome").disabled = false;
            document.getElementById("bathrooms_countryhome").disabled = false;
            document.getElementById("built_meters_country").disabled = false;
                    break;
                case "Office":
                    document.getElementById("type-tab").innerText = "Oficina";
                    document.getElementById("caracteristicas_office").style.display = "block";
                    document.getElementById("seguridad_ofi").style.display = "block";
                    document.getElementById("car_property").style.display = "none";
                    document.getElementById("car_ofi").style.display = "block";
                    document.getElementById("built_meters_office").disabled = false;
            document.getElementById("floors_office").disabled = false;
                    break;
                case "Land":
                    document.getElementById("type-tab").innerText = "Terreno";
                    document.getElementById("car_land").style.display = "block";
                    document.getElementById("car_building").style.display = "none";
                    document.getElementById("car_property").style.display = "none";
                    document.getElementById("caracteristicas_land").style.display = "block";
                    document.getElementById("meters_land").disabled = false;
            document.getElementById("buildable_meters_land").disabled = false;
            document.getElementById("minimum_meters").disabled = false;
                    break;
                case "StorageRoom":
            document.getElementById("type-tab").style.display = "none";

                    document.getElementById("type-tab").innerText = "Garaje";
                    document.getElementById("caracteristicas_home").style.display = "block";
                   // document.getElementById("type-tab").href = "#caracteristicas_storage";
                    break;
                case "CommercialProperty":
            document.getElementById("type-tab").style.display = "none";

                    document.getElementById("type-tab").innerText = "Local comercial";
                    document.getElementById("caracteristicas_home").style.display = "block";
                   // document.getElementById("type-tab").href = "#caracteristicas_comercial";

                    break;
                case "ParkingSpace":
            document.getElementById("type-tab").style.display = "none";

                    document.getElementById("type-tab").innerText = "Plaza de aparcamiento";
                    document.getElementById("caracteristicas_home").style.display = "block";
                    //document.getElementById("type-tab").href = "#caracteristicas_garage";

                    break;
                default:
                    document.getElementById("type-tab").innerText = "Piso";
                    document.getElementById("caracteristicas_flat").style.display = "block";
                    document.getElementById("type-tab").href = "#caracteristicas_flat";

                    break;
            }
        });
    </script>


    <script>
        //script para el multiselect
        // Class definition
        var KTSelect2 = function () {
            // Private functions
            var demos = function () {
                // basic
                $('#kt_select2_1').select2({
                    placeholder: "Select a state"
                });

                // nested
                $('#kt_select2_2').select2({
                    placeholder: "Select a state"
                });

                // multi select
                $('#kt_select2_3').select2({
                    placeholder: "Select a state",
                });

                // basic
                $('#kt_select2_4').select2({
                    placeholder: "Select a state",
                    allowClear: true
                });

                // loading data from array
                var data = [{
                    id: 0,
                    text: 'Enhancement'
                }, {
                    id: 1,
                    text: 'Bug'
                }, {
                    id: 2,
                    text: 'Duplicate'
                }, {
                    id: 3,
                    text: 'Invalid'
                }, {
                    id: 4,
                    text: 'Wontfix'
                }];

                $('#kt_select2_5').select2({
                    placeholder: "Select a value",
                    data: data
                });

                // loading remote data

                function formatRepo(repo) {
                    if (repo.loading) return repo.text;
                    var markup = "<div class='select2-result-repository clearfix'>" +
                        "<div class='select2-result-repository__meta'>" +
                        "<div class='select2-result-repository__title'>" + repo.full_name + "</div>";
                    if (repo.description) {
                        markup += "<div class='select2-result-repository__description'>" + repo.description + "</div>";
                    }
                    markup += "<div class='select2-result-repository__statistics'>" +
                        "<div class='select2-result-repository__forks'><i class='fa fa-flash'></i> " + repo.forks_count + " Forks</div>" +
                        "<div class='select2-result-repository__stargazers'><i class='fa fa-star'></i> " + repo.stargazers_count + " Stars</div>" +
                        "<div class='select2-result-repository__watchers'><i class='fa fa-eye'></i> " + repo.watchers_count + " Watchers</div>" +
                        "</div>" +
                        "</div></div>";
                    return markup;
                }

                function formatRepoSelection(repo) {
                    return repo.full_name || repo.text;
                }

                $("#kt_select2_6").select2({
                    placeholder: "Search for git repositories",
                    allowClear: true,
                    ajax: {
                        url: "https://api.github.com/search/repositories",
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            return {
                                q: params.term, // search term
                                page: params.page
                            };
                        },
                        processResults: function (data, params) {
                            // parse the results into the format expected by Select2
                            // since we are using custom formatting functions we do not need to
                            // alter the remote JSON data, except to indicate that infinite
                            // scrolling can be used
                            params.page = params.page || 1;

                            return {
                                results: data.items,
                                pagination: {
                                    more: (params.page * 30) < data.total_count
                                }
                            };
                        },
                        cache: true
                    },
                    escapeMarkup: function (markup) {
                        return markup;
                    }, // let our custom formatter work
                    minimumInputLength: 1,
                    templateResult: formatRepo, // omitted for brevity, see the source of this page
                    templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
                });

                // custom styles

                // tagging support
                $('#kt_select2_12_1, #kt_select2_12_2, #kt_select2_12_3, #kt_select2_12_4').select2({
                    placeholder: "Select an option",
                });

                // disabled mode
                $('#kt_select2_7').select2({
                    placeholder: "Select an option"
                });

                // disabled results
                $('#kt_select2_8').select2({
                    placeholder: "Select an option"
                });

                // limiting the number of selections
                $('#kt_select2_9').select2({
                    placeholder: "Select an option",
                    maximumSelectionLength: 2
                });

                // hiding the search box
                $('#kt_select2_10').select2({
                    placeholder: "Select an option",
                    minimumResultsForSearch: Infinity
                });

                // tagging support
                $('#kt_select2_11').select2({
                    placeholder: "Add a tag",
                    tags: true
                });

                // disabled results
                $('.kt-select2-general').select2({
                    placeholder: "Select an option"
                });
            }

            var modalDemos = function () {
                $('#kt_select2_modal').on('shown.bs.modal', function () {
                    // basic
                    $('#kt_select2_1_modal').select2({
                        placeholder: "Select a state"
                    });

                    // nested
                    $('#kt_select2_2_modal').select2({
                        placeholder: "Select a state"
                    });

                    // multi select
                    $('#kt_select2_3_modal').select2({
                        placeholder: "Select a state",
                    });

                    // basic
                    $('#kt_select2_4_modal').select2({
                        placeholder: "Select a state",
                        allowClear: true
                    });
                });
            }

            // Public functions
            return {
                init: function () {
                    demos();
                    modalDemos();
                }
            };
        }();

        // Initialization
        jQuery(document).ready(function () {
            KTSelect2.init();
        });
    </script>

<script>
function checkImageSize(event, target ) {

    if(target.files[target.files.length-1].type.indexOf("image") == -1) {
        Swal.fire('Tipo de archivo incrorrecto', '¡Solo se aceptan imágenes!', 'warning');
        //event.preventDefault();
        return false;
    }

}
/*
var totalSize=0;

function checkImageSize(event, target ) {
        console.log(target, target.files.length)

    if(target.files[target.files.length-1].type.indexOf("image") == -1) {
        Swal.fire('Alcanzado el máximo de imágenes', '¡No añadir más imágenes!', 'warning');
        //event.preventDefault();
        return false;
    }

    for(var i=0; i<target.files.length; i++){
        console.log(totalSize, target.files[i].size)
        totalSize += target.files[i].size
            if(totalSize>102400){

                console.log("Alcanzado el máximo de imágenes, no subir más")
                Swal.fire('Alcanzado el máximo de imágenes', '¡No añadir más imágenes!', 'warning');
                return true;
            }
    }

    return true;
}
*/
</script>

<!-- https://jqueryui.com/sortable/#display-grid -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
  #sortable { list-style-type: none; margin: 0; padding: 0; width: 80vh; }
  #sortable li { margin: 3px 3px 3px 0; padding: 1px; float: left; width: 150px; height: 150px; font-size: 4em; text-align: center; }
</style>
<script>
    jQuery(document).ready(function () {
        $( "#sortable" ).sortable({
            stop: function(event, ui) {
                //alert("New position: " + ui.item.index());
            }
        });
        $( "#sortable" ).disableSelection();
    });

</script>
<!--END https://jqueryui.com/sortable/#display-grid -->




<!-- https://www.jqueryscript.net/demo/jQuery-Plugin-For-Selecting-Multiple-Files-multifile/ -->
<script type="text/javascript"  src="{{URL::asset('assets/frontend/js/jquery.multifile.js')}}"></script>
<script type="text/javascript"  src="{{URL::asset('assets/frontend/js/jquery.multifile.preview.js')}}"></script>
<script>

var fileCounter=0;
var planoCounter=0;

$(document).ready(function() {
    $('.multifile').multifile({
        template: function (file) {
            var fileName = file.name;
            var fileExtension = file.name.split('.').pop();
            var result = '';
            var numberOfImages=1;
            if(file._multiple!=undefined){
                numberOfImages = file.name.split(", ").length
            }
            for(let i=0; i<numberOfImages; i++){
                $("#sortable").append(
                "<li id='li-sortable-"+fileCounter+"' class='ui-state-default'><img class=' cover' style='height:150px;width:150px' id='sortable-"+fileCounter+"' src='/assets/frontend/images/icon/logo_house.jpg'  >"+
                //"<div style='position: absolute;top: 8px;left: 16px;'>"+(fileCounter++)+"</div>"+
                "<button style='margin-top: -20vh; margin-right: 8vw;  '   type='button' class='btn' onclick='removeKey(this)' ><span style='height: 4em;background-color: white;'>"+
                "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x-square' viewBox='0 0 16 16'><path d='M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z'/>"+
                "<path d='M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z'/></svg>"+
                "</span></button></img>"+
                "<input id='sortable-order"+fileCounter+"' type='hidden' name='imagesOrder[]' value='"+fileCounter+"' ></li>"
                );


                var output = document.getElementById("sortable-"+fileCounter);

                output.src = URL.createObjectURL(event.target.files[i]);
                output.onload = function() {
                    URL.revokeObjectURL(output.src) // free memory
                }

                fileCounter++;



            }

                return $(result);
        }
    });
/*
    $('#documentsPlanos').multifile({
        //container: "#multifile_container",
        template: function (file) {
            var fileName = file.name;
            var fileExtension = file.name.split('.').pop();
            var result = '';
            var numberOfImages=1;
            if(file._multiple!=undefined){
                numberOfImages = file.name.split(", ").length
            }
            for(let i=0; i<numberOfImages; i++){
                $("#listaPlanos").append(
                "<li id='li-plano-"+fileCounter+"' class='ui-state-default'>"+
                "<p><a href='' class='multifile_remove_input'>x</a></p>"+
                "</li>"
                );


                var output = document.getElementById("sortable-"+fileCounter);

                output.src = URL.createObjectURL(event.target.files[i]);
                output.onload = function() {
                    URL.revokeObjectURL(output.src) // free memory
                }

                fileCounter++;


            }

                return $(result);
        }
    });
*/
////////////////////    PESTAÑA DOCUMENTACION   //////////////////////////
function customTemplateDocs (file) {
        var fileName = file.name;
        var fileExtension = file.name.split('.').pop();

        var result =
            '<p class="uploaded_image mt-2">' +
            '<a href="#" class="multifile_remove_input"><i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">'+
            '<path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>'+
            '<path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg></i></a>' +
            '<span class="filename">$fileName </span>'+
            '</p>';

        result = result.replace('$fileExtension', fileExtension).replace('$fileName', fileName)

        return $(result);
    }

$('.multifilePlanos').multifile({
    container: "#docsContainer",
    template: customTemplateDocs,
})
$('.multifileDispo').multifile({
    container: "#dispoContainer",
    template: customTemplateDocs,
})
$('.multifileMemoria').multifile({
    container: "#memoriaContainer",
    template: customTemplateDocs,
})

////////////////////////////////////////////////

});

function removeKey(elem){
    $(elem).parent().remove();
    console.log("boton pulsado "+id)
}

</script>
<!--END  https://www.jqueryscript.net/demo/jQuery-Plugin-For-Selecting-Multiple-Files-multifile/ -->

    @include('backend.includes.zoneFieldsGoogleMaps')

@endsection
