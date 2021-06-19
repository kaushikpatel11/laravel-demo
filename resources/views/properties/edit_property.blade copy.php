@extends('template.template')

@section('top_menu')

@endsection

@section('content')
    <div>
        <div>
            <div>
                <div>
                    <div>
                        <div class="card">
                            <div class="card-header">

                                @if ($edit_active)
                                    <div class="form-group row">

                                        <h1>@lang('Modificar datos propiedad')</h1>
                                        <a title="print" href="/properties/{{$property->id}}/detail"
                                        ><i class="fa fa-print"></i> Print</a>
                                    </div>
                                @else
                                    <div class="form-group row">

                                        <h1>@lang('Datos de la propiedad')</h1>
                                        <a title="print" href="/properties/{{$property->id}}/detail"
                                           onclick=""><i class="fa fa-print"></i> @lang('Imprimir')</a>
                                    </div>
                                    @if (Auth::user()->type == "owner")


                                        <h5 class="text-danger">@lang('La propiedad sólo se puede editar si está en los estados (Activa, En proceso propietario)')</h5>
                                    @endif
                                @endif

                                @if(Auth::user()->type == "real_estate" && Auth::user()->real_estate->status != "2")
                                    <h5 class="text-danger">@lang('!Vista limitada! Inmobiliaria en estado de prueba.')</h5>
                                    <h5 class="text-danger">@lang('Para abrir ficha es necesario estar con estado (Activo).')</h5>

                                @endif
                            </div>
                            <div class="card card-custom card-stretch">
                                <!-- Modal desactivar una propiedad-->
                                <div class="modal fade" id="active_modal" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"
                                                    id="exampleModalLabel">@lang('Explique el motivo')</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                </button>
                                            </div>
                                            <!--begin::Form-->
                                            <form method="post" id="modal_form_edit_property"
                                                  action="/{{Auth::user()->type}}/properties/{{$property->id}}/deactivate">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Motivo')</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <textarea required class="form-control" id="exampleTextarea"
                                                                      name="reason" rows="6"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-primary font-weight-bold"
                                                            data-dismiss="modal">@lang('Cerrar')
                                                    </button>
                                                    <button type="submit" class="btn btn-primary font-weight-bold">
                                                        @lang('Desactivar')
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal cancelar una propiedad-->
                                <div class="modal fade" id="cancel_modal" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"
                                                    id="exampleModalLabel">@lang('Explique el motivo')</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                </button>
                                            </div>
                                            <!--begin::Form-->
                                            <form method="post" id="form_cancel_property"
                                                  action="/admin/properties/{{$property->id}}/cancel">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Motivo')</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                        <textarea class="form-control" id="exampleTextarea"
                                                                  name="reason" required rows="6"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-primary font-weight-bold"
                                                            data-dismiss="modal">@lang('Cerrar')
                                                    </button>
                                                    <button type="submit" class="btn btn-primary font-weight-bold">
                                                        @lang('Guardar')
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal check una propiedad-->
                                <div class="modal fade" id="check_modal" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"
                                                    id="exampleModalLabel">@lang('Explique el motivo')</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                </button>
                                            </div>
                                            <!--begin::Form-->
                                            <form method="post" id="form_cancel_property"
                                                  action="/admin/properties/{{$property->id}}/inmozonCheckProperty">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Motivo')</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                        <textarea class="form-control" id="exampleTextarea"
                                                                  name="reason" required rows="6"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-primary font-weight-bold"
                                                            data-dismiss="modal">@lang('Cerrar')
                                                    </button>
                                                    <button type="submit" class="btn btn-primary font-weight-bold">
                                                        @lang('Guardar')
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal abrir ficha de una propiedad-->
                                <div class="modal fade" id="ficha_modal" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"
                                                    id="exampleModalLabel">@lang('Coste de apertura')</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                </button>
                                            </div>
                                            <!--begin::Form-->
                                            <form method="post" id="form_open_ficha_property"
                                                  action=" {{ route('ficha.store') }}">
                                                @csrf
                                                <input name="property_id_hidden" type="hidden"
                                                       value="{{$property->id}}">
                                                <div class="modal-body">
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-xl-4 col-lg-4 col-form-label text-left">@lang('Se cargará un coste de apertura a su cuenta')</label>
                                                        <label
                                                            class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Coste de apertura:')
                                                            {{App\Config::open_price()}}€</label>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-primary font-weight-bold"
                                                            data-dismiss="modal">@lang('Cerrar')
                                                    </button>
                                                    <button type="submit" class="btn btn-primary font-weight-bold">
                                                        @lang('Guardar')
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--begin::Form-->
                                <form method="post" id="form_edit_property" action="/owner/properties/{{$property->id}}"
                                      enctype="multipart/form-data" onsubmit="setValues();">
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="uploadXML" value="false">

                                <!-- datos comunes que se van a mandar como hidden -->
                                    <input id="id_to_check" name="toCheck" type="hidden" value="">
                                    <input id="id_built_meters" name="built_meters" type="hidden" value="">
                                    <input id="bathrooms" name="bathrooms" type="hidden" value="">
                                    <input id="bedrooms" name="bedrooms" type="hidden" value="">
                                    <!--begin::Body-->
                                    <div class="card-body">

                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                                   role="tab" aria-controls="home"
                                                   aria-selected="true">@lang('General')</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="zone-tab" data-toggle="tab" href="#zone"
                                                   role="tab"
                                                   aria-controls="zone" aria-selected="false">@lang('Zona')</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="imagenes-tab" data-toggle="tab" href="#imagenes"
                                                   role="tab" aria-controls="profile"
                                                   aria-selected="false">@lang('Imágenes')</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="type-tab" style="display: none;"
                                                   data-toggle="tab"
                                                   href="#caracteristicas" role="tab" aria-controls="contact"
                                                   aria-selected="false">@lang('Piso')</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="char-tab" data-toggle="tab" href="#char"
                                                   role="tab"
                                                   aria-controls="contact" aria-selected="false">Características</a>
                                            </li>
{{--
  -- @ RM Rafa Mollá  2020-11-09 07:37 AM en el alta de propiedades hay que ocultar la pestaña de documentación

                                            @if (Auth::user()->type != "real_estate" )

                                                <li class="nav-item">
                                                    <a class="nav-link" id="char-tab" data-toggle="tab" href="#doc"
                                                       role="tab"
                                                       aria-controls="contact"
                                                       aria-selected="false">@lang('Documentación')</a>
                                                </li>
                                            @endif
--}}
                                            <li class="nav-item">
                                                <a class="nav-link" id="dist-tab" data-toggle="tab" href="#distances"
                                                   role="tab"
                                                   aria-controls="contact" aria-selected="false">@lang('Distancias')</a>
                                            </li>
                                            @if(Auth::user()->type == "admin" || (Auth::user()->type == "real_estate" && $show_contact))
                                                <li class="nav-item">
                                                    <a class="nav-link" id="contact-tab" data-toggle="tab"
                                                       href="#contact"
                                                       role="tab" aria-controls="contact"
                                                       aria-selected="true">@lang('Contacto')</a>
                                                </li>
                                            @endif
                                            @if(Auth::user()->type == "owner")
                                                <li class="nav-item">
                                                    <a class="nav-link" id="statistics-tab" data-toggle="tab"
                                                       href="#statistics"
                                                       role="tab" aria-controls="statistics"
                                                       aria-selected="true">@lang('Estadísticas')</a>
                                                </li>
                                            @endif
                                        </ul>

                                                                                    <div class="tab-content" id="myTabContent">
                                                                                        <!--propiedades generales-->
                                                                                        <div class="tab-pane fade show active" id="home" role="tabpanel "
                                                                                             aria-labelledby="home-tab">
                                                                                            <div class="row">
                                                                                                <label class="col-xl-3"></label>
                                                                                                <div class="col-lg-9 col-xl-6">
                                                                                                    <h5 class="font-weight-bold mb-20 mt-15 text-center">@lang('Datos generales de la propiedad # '){{$property->id}}
                                                                                                        &nbsp;
                                                                                                        @if(isset($property->validated_time))
                                                                                                            <i> @lang('Validada hace') {{$property->validated_time}} @lang('días')</i>
                                                                                                        @endif
                                                                                                    </h5>

                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group row" style="justify-content: center;">
                                                                                                <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                                                                                       for="exampleSelect1">@lang('Tipo de propiedad')</label>
                                                                                                <div class="col-lg-9 col-xl-6">
                                                                                                    <select class="form-control form-control-solid"
                                                                                                            name="propertyable_type" id="propertyable_type"
                                                                                                            required>
                                                                                                        <option selected value="Flat">@lang('Piso')</option>
                                                                                                        <option value="Home">@lang('Casa o chalet')</option>
                                                                                                        <option value="CountryHome">@lang('Casa de campo')</option>
                                                                                                        <option value="Office">@lang('Oficina')</option>
                                                                                                        <option value="Land">@lang('Terreno')</option>
                                                                                                        <option
                                                                                                            value="ParkingSpace">@lang('Plazas de aparcamiento')</option>
                                                                                                        <option value="StorageRoom">@lang('Garajes')</option>
                                                                                                        <option value="CommercialProperty">@lang('Locales')</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            @if(Auth::user()->type=='owner' && Auth::user()->owner->type == "agente")

                                                                                                <div class="form-group row" style="justify-content: center;">
                                                                                                    <label
                                                                                                        class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Referencia')</label>
                                                                                                    <div class="col-lg-9 col-xl-6">
                                                                                                        <input id="ref"
                                                                                                               class="form-control form-control-lg form-control-solid"
                                                                                                               type="text" name="price" required
                                                                                                               value="{{$property->ref}}">
                                                                                                    </div>
                                                                                                </div>
                                                                                            @endif
                                                                                            <div class="form-group row" style="justify-content: center;">
                                                                                                <label
                                                                                                    class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Precio')</label>
                                                                                                <div class="col-lg-9 col-xl-6">
                                                                                                    {{--<input id="price"
                                                                                                           class="form-control form-control-lg form-control-solid"
                                                                                                           type="text" name="price" required
                                                                                                           value="{{$property->price}}">--}}
                                                               <input id="price_hidden" type="hidden" min="1" name="price" value="{{$property->price}}">
                                                                <input  autocomplete="nope" id="price" class="form-control form-control-lg form-control-solid" type="text"
                                                                    name="price_input"  onKeyUp="agencyCommision();  calculateIVA(); calculateCommision(); "
                                                                    onfocus="this.value = ''"
                                                                    onfocusout="setHiddenPrice()"
                                                                    oninvalid="showAlert(); document.getElementById('price').className +='border border-danger' "
                                                                    onchange="agencyCommision(); calculateIVA();  calculateCommision();  document.getElementById('price').className ='form-control form-control-lg form-control-solid' "
                                                                    required  placeholder="€" value="{{ number_format($property->price, 2, ',','.') ?? '' }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="justify-content: center;">
                                                    <label
                                                        class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Comisión de agencia (%)')</label>
                                                    {{--
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input id="agency_commissions"
                                                               class="form-control form-control-lg form-control-solid"
                                                               required type="text" name="agency_commissions"
                                                               value="{{$property->agency_commissions}}"
                                                               min="{{$minimum_commission}}">
                                                    </div>--}}
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input id="agency_commissions_hidden" type="hidden" name="agency_commissions" value="{{$property->agency_commissions}}">
                                                        <input  autocomplete="nope" type="text" id="agency_commissions"
                                                        onfocus="this.value = ''"
                                                        onfocusout="setHiddenComission()"
                                                        onchange="isValid(this.value); agencyCommision(); calculateIVA(); calculateCommision();  document.getElementById('agency_commissions').className ='form-control form-control-lg form-control-solid' "
                                                        oninvalid="showAlert(); document.getElementById('agency_commissions').className +='border border-danger' "

                                                        min="{{$minimum_commission}}"
                                                        max="100"
                                                        class="form-control form-control-lg form-control-solid" type="text" required
                                                        name="" value="{{ number_format($property->agency_commissions, 2, ',', '.') ?? @old(agency_commissions) ?? '' }}"
                                                        placeholder="%">

                                                    </div>
                                                </div>

                                                <div class="form-group row" style="justify-content: center;">
                                                    <label
                                                        class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Comisión agencia (€)')</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input  autocomplete="nope" disabled id="calculated_agency_commission"
                                                            class="form-control form-control-lg form-control-solid"
                                                            required type="text" name=""
                                                            value="{{$property->agency_commissions_value}}"
                                                            min="{{$minimum_commission}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="justify-content: center;">
                                                    <label
                                                        class="col-xl-3 col-lg-3 col-form-label text-left">@lang('IVA 21 (%)')</label>
                                                    <div class="col-lg-9 col-xl-6">

                                                               <input  autocomplete="nope" disabled id="iva"
                                                                class="form-control form-control-lg form-control-solid"
                                                                required type="text" name=""
                                                                value="{{$property->iva}}">
                                                    </div>
                                                </div>


                                                <div class="form-group row" style="justify-content: center;">
                                                    <label
                                                        class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Importe Neto (€)')</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input id="agency_commissions"
                                                               class="form-control form-control-lg form-control-solid"
                                                               required type="text" name=""
                                                               value="{{$property->calculated_commission}}">
                                                    </div>
                                                </div>

                                                <div id="community_fees" class="form-group row"
                                                     style="justify-content: center;">
                                                    <label
                                                        class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Gastos de comunidad')</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input class="form-control form-control-lg form-control-solid"
                                                               type="text" name="community_fees" required
                                                               value="{{$property_subtype->community_fees ?? 0}}">
                                                    </div>
                                                </div>
                                                <div id="status" class="form-group row"
                                                     style="justify-content: center;">
                                                    <label
                                                        class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Estado:')
                                                    </label>

                                                    @if($property->historical->last()->status->id == 2)

                                                        <div class="col-lg-9 col-xl-6">
                                                            <input
                                                                class="col-xl-3 col-lg-3 col-form-label text-left text-success"
                                                                disabled type="text" name="status"
                                                                value="{{$property->historical->last()->status->name}}">
                                                        </div>

                                                    @else
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input
                                                                class="col-xl-3 col-lg-3 col-form-label text-left text-danger"
                                                                disabled type="text" name="status"
                                                                value="{{$property->historical->last()->status->name}}">
                                                        </div>
                                                    @endif
                                                </div>


                                                @if($property->historical->last()->status->id == 6 || $property->historical->last()->status->id == 3)


                                                    <div id="reason" class="form-group row"
                                                         style="justify-content: center;">
                                                        <label
                                                            class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Motivo:')
                                                        </label>

                                                        <label
                                                            class="col-lg-9 col-xl-6 text-left text-danger">{{$property->historical->last()->reason}}</label>

                                                    </div>

                                                @endif

                                                <div id="description" class="form-group row"
                                                     style="justify-content: center;">
                                                    <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                                           for="exampleTextarea">@lang('Descripción')</label>

                                                    <div class="col-lg-9 col-xl-6">
                                                        <textarea class="form-control" id="exampleTextarea"
                                                                  name="description"
                                                                  rows="6">{{$property->description}}</textarea>
                                                    </div>
                                                </div>


                                            </div>
{{--
  --    TAB CONTENTS
  --    ZONE TAB DIV
  --}}
                                            <div class="tab-pane fade show" id="zone" role="tabpanel"
                                                 aria-labelledby="zone-tab">
                                                <div class="row">
                                                    <label class="col-xl-3"></label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <h5 class="font-weight-bold mb-20 mt-15 text-center">
                                                            @lang('Ubicación de la propiedad')</h5>
                                                    </div>
                                                </div>

                                                @php
                                                    $item['location'] = [];
                                                @endphp
                                                @include('backend.includes.zoneFormFiledsVertical', [$item['location'] = [
                                                'country_id' => $property->location->country_id,
                                                'state_id' => $property->location->state_id,
                                                'state_name' => $property->location->state->name,
                                                'county_id' => $property->location->county_id,
                                                'county_name' => $property->location->county->name,
                                                'city_id' => $property->location->city_id,
                                                'city_name' => $property->location->city->name,
                                                'street' => $property->location->street,
                                                'postcode' => $property->location->postcode,
                                                'latitude' => $property->location->latitude,
                                                'longitude' => $property->location->longitude,
                                                ]])

                                            </div>

{{--
  --    TAB CONTENTS
  --    IMAGENES TAB DIV
  --}}

                                            <div class="tab-pane fade" id="imagenes" role="tabpanel"
                                                 aria-labelledby="imagenes-tab">
                                                <div class="row">

                                                    <div class="col-8">
                                                        <h5 class="font-weight-bold mb-20 mt-15 text-center">@lang('Imágenes de la propiedad')</h5>

                                                        <div class="form-group row justify-content-center">
                                                            <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                                                   for="images">@lang('Seleccionar imágenes')</label>
                                                            <div class="col-lg-9 col-xl-6">

                                                                <input id="images"
                                                                       class="form-control form-control-lg form-control-solid"
                                                                       type="file" name="images[]" multiple="multiple"
                                                                       value="">
                                                            </div>
                                                        </div>
                                                        {{--BEGIN TABLE IMAGES --}}
                                                        <div class="row form-group">
                                                            <div class="table-responsive">
                                                                <table id="image_table" class="table">
                                                                    <thead>
                                                                    <tr>
                                                                        <th scope="col">@lang('Imágenes')</th>
                                                                        @if ($edit_active)

                                                                            <th scope="col">@lang('Acción')</th>
                                                                        @endif
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @if(isset($property->images) &&
                                                                    !empty($property->images))
                                                                        @foreach($property->images as $image)
                                                                            <tr>
                                                                                <td style="margin-left: auto; margin-right: auto">
                                                                                    <div class="sale_block">
                                                                                        <div class="property-image-box">
                                                                                            <div
                                                                                                class="property-images-box">
                                                                                                <a title="Property Image"
                                                                                                   href="#"><img
                                                                                                        style="width: 100% !important; "
                                                                                                        src="{{asset($image->url)}}"
                                                                                                        alt="featured"/></a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                @if ($edit_active)

                                                                                    <td>
                                                                                        <button type="button"
                                                                                                class="btn btn-icon btn-danger btnImageTableDelete"
                                                                                                data-id="{{$image->id}}"
                                                                                                data-url="{{route('property.ajax')}}"
                                                                                                data-action="deleteImage"
                                                                                                data-confirm="¿Estas seguro de borrar la imagen?"
                                                                                                onclick="removeRow(this)">
                                                                                            <i
                                                                                                class="flaticon2-delete"></i>
                                                                                        </button>
                                                                                    </td>
                                                                                @endif
                                                                            </tr>
                                                                        @endforeach
                                                                    @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        {{--END TABLE IMAGES --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <!--datos especificos de la propiedad, conditional render con el campo tipo de propiedad de la primera pestaña-->
                                            <div class="tab-pane fade" id="caracteristicas" role="tabpanel"
                                                 aria-labelledby="type-tab">

                                                <div id="caracteristicas_flat" style="display: none;">

                                                    <div class="row">
                                                        <label class="col-xl-3"></label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <h5 class="font-weight-bold mb-20 mt-15 text-center">@lang('Datos del piso')</h5>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row" style="justify-content: center;">
                                                        <label
                                                            class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Metros construidos')</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input
                                                                class="form-control form-control-lg form-control-solid"
                                                                required
                                                                type="text" name="built_meters_flat"
                                                                id="built_meters_flat"
                                                                value=" {{isset($property_subtype->built_meters) ? $property_subtype->built_meters : 0}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row" style="justify-content: center;">
                                                        <label
                                                            class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Baños')</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input
                                                                class="form-control form-control-lg form-control-solid"
                                                                required
                                                                type="text" id="bathrooms_flat" name="bathrooms_flat"
                                                                value=" {{isset($property_subtype->bathrooms) ? $property_subtype->bathrooms : 0}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row" style="justify-content: center;">
                                                        <label
                                                            class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Habitaciones')</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input
                                                                class="form-control form-control-lg form-control-solid"
                                                                required
                                                                type="text" id="bedrooms_flat" name="bedrooms_flat"
                                                                value=" {{isset($property_subtype->bedrooms) ? $property_subtype->bedrooms : 0}}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row" style="justify-content: center;">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                                               for="exampleSelect1">@lang('Fachada')</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select class="form-control form-control-solid" required
                                                                    name="facade_flat" id="exampleSelect1"
                                                                    value="{{$property_subtype->facade}}">
                                                                @if($property_subtype->facade == 'Exterior')
                                                                    <option selected>@lang('Exterior')</option>
                                                                    <option>@lang('Interior')</option>
                                                                @else
                                                                    <option>@lang('Exterior')</option>
                                                                    <option selected>@lang('Interior')</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row" style="justify-content: center;">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                                               for="exampleSelect1">@lang('Planta')</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select class="form-control form-control-solid" name="floor"
                                                                    required
                                                                    id="exampleSelect1" value="">
                                                                @if($property_subtype->floor == 'Bajo')
                                                                    <option selected>@lang('Bajo')</option>
                                                                @else
                                                                    <option>@lang('Bajo')</option>
                                                                @endif
                                                                @if($property_subtype->floor == 'Ático')
                                                                    <option selected>@lang('Ático')</option>
                                                                @else
                                                                    <option>@lang('Ático')</option>
                                                                @endif
                                                                @if($property_subtype->floor == 'Intermedio')
                                                                    <option selected>@lang('Intermedio')</option>
                                                                @else
                                                                    <option>@lang('Intermedio')</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row" style="justify-content: center;">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                                               for="exampleSelect1">@lang('Tipo')</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select class="form-control form-control-solid"
                                                                    name="type_flat" required
                                                                    id="exampleSelect1" value="">
                                                                @if($property_subtype->type == "Piso")
                                                                    <option selected>@lang('Piso')</option>
                                                                @else
                                                                    <option>@lang('Piso')</option>
                                                                @endif
                                                                @if($property_subtype->type == "Ático")
                                                                    <option selected>@lang('Ático')</option>
                                                                @else
                                                                    <option>@lang('Ático')</option>
                                                                @endif
                                                                @if($property_subtype->type == "Dúplex")
                                                                    <option selected>@lang('Dúplex')</option>
                                                                @else
                                                                    <option>@lang('Dúplex')</option>
                                                                @endif
                                                                @if($property_subtype->type == "Estudio/Loft")
                                                                    <option selected>@lang('Estudio/Loft')</option>
                                                                @else
                                                                    <option>@lang('Estudio/Loft')</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row" style="justify-content: center;">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                                               for="exampleSelect1">Estado</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select class="form-control form-control-solid" required
                                                                    name="state_flat" id="exampleSelect1" value="">
                                                                @if($property_subtype->state == 'A reformar')
                                                                    <option selected>A reformar</option>
                                                                    <option>Buen estado</option>
                                                                @else
                                                                    <option>A reformar</option>
                                                                    <option selected>Buen estado</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div id="caracteristicas_home"
                                                     style="display: none; margin-left: auto;margin-right: auto">

                                                    <div class="row form-group justify-content-center">
                                                        <label class="col-xl-3"></label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <h5 class="font-weight-bold mb-20 mt-15">@lang('Datos Home/Chalet')</h5>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row justify-content-center">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                                               for="exampleSelect1">@lang('Tipo')</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select class="form-control form-control-solid"
                                                                    name="type_home" required
                                                                    id="exampleSelect1"
                                                                    value="{{$property_subtype->type}}">
                                                                    <!-- todo traducciones -->
                                                                <option {{$property_subtype->type == 'Casa o chalet independiente' ? 'selected' : '' }}>Casa o chalet independiente</option>
                                                                <option {{$property_subtype->type == 'Chalet pareado' ? 'selected' : ''}}>Chalet pareado</option>
                                                                <option {{$property_subtype->type == 'Chalet adosado' ? 'selected' : ''}}>Chalet adosado</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row justify-content-center">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                                               for="exampleSelect1">@lang('Estado')</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select class="form-control form-control-solid" required
                                                                    name="state_home" id="exampleSelect1"
                                                                    value="{{$property_subtype->state}}">
                                                                    <!-- todo traducciones -->

                                                                <option {{$property_subtype->state == 'A reformar' ? 'selected' : '' }}>A reformar</option>
                                                                <option {{$property_subtype->state == 'Buen estado' ? 'selected' : '' }}>Buen estado</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row justify-content-center">
                                                        <label
                                                            class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Baños')</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input
                                                                class="form-control form-control-lg form-control-solid"
                                                                required
                                                                type="text" id="bathrooms_home" name="bathrooms_home"
                                                                value=" {{isset($property_subtype->bathrooms) ? $property_subtype->bathrooms : 0}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row justify-content-center">
                                                        <label
                                                            class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Habitaciones')</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input
                                                                class="form-control form-control-lg form-control-solid"
                                                                required
                                                                type="text" id="bedrooms_home" name="bedrooms_home"
                                                                value=" {{isset($property_subtype->bedrooms) ? $property_subtype->bedrooms : 0}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row justify-content-center">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Metros construidos')</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input
                                                                class="form-control form-control-lg form-control-solid"
                                                                required
                                                                type="text" name="built_meters_home"
                                                                id="built_meters_home"
                                                                value=" {{isset($property_subtype->built_meters) ? $property_subtype->built_meters : 0}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="caracteristicas_country" style="display: none;">

                                                    <div class="row form-group justify-content-center">
                                                        <label class="col-xl-3"></label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <h5 class="font-weight-bold mb-6">@lang('Datos casa de campo')</h5>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="form-group row justify-content-center">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                                               for="exampleSelect1">@lang('Tipo')</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select class="form-control form-control-solid" name="type"
                                                                    required
                                                                    id="exampleSelect1" value="">
                                                                <option>@lang('Casa o chalet independiente')</option>
                                                                <option>@lang('Chalet pareado')</option>
                                                                <option>@lang('Chalet adosado')</option>
                                                            </select>
                                                        </div>
                                                    </div> -->
                                                    <div class="form-group row justify-content-center">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                                               for="exampleSelect1">@lang('Estado')</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select class="form-control form-control-solid"
                                                                    name="estate"
                                                                    id="exampleSelect1" value="" required>
                                                                    <!-- todo traducciones -->

                                                                <option {{$property_subtype->state == 'A reformar' ? 'selected' : '' }}>A reformar</option>
                                                                <option {{$property_subtype->state == 'Buen estado' ? 'selected' : '' }}>Buen estado</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row justify-content-center">
                                                        <label
                                                            class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Baños')</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input
                                                                class="form-control form-control-lg form-control-solid"
                                                                type="text" name="bathrooms_countryhome" required
                                                                id="bathrooms_countryhome"
                                                                value=" {{isset($property_subtype->bathrooms) ? $property_subtype->bathrooms : 0}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row justify-content-center">
                                                        <label
                                                            class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Habitaciones')</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input
                                                                class="form-control form-control-lg form-control-solid"
                                                                required
                                                                type="text" id="bedrooms_countryhome"
                                                                name="bedrooms_countryhome"
                                                                value=" {{isset($property_subtype->bedrooms) ? $property_subtype->bedrooms : 0}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row justify-content-center">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Metros construidos')</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input
                                                                class="form-control form-control-lg form-control-solid"
                                                                required
                                                                type="text" id="built_meters_countryhome"
                                                                name="built_meters_countryhome"
                                                                value=" {{isset($property_subtype->built_meters) ? $property_subtype->built_meters : 0}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="caracteristicas_office" style="display: none;">

                                                    <div class="row form-control justify-content-center">
                                                        <label class="col-xl-3"></label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <h5 class="font-weight-bold mb-6">@lang('Datos oficina')</h5>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row justify-content-center">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                                               for="exampleSelect1">@lang('Estado')</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select class="form-control form-control-solid" name="state"
                                                                    required
                                                                    id="exampleSelect1" value="">
                                                                    <!-- todo traducciones -->

                                                                <option {{$property_subtype->state == 'A reformar' ? 'selected' : '' }}>A reformar</option>
                                                                <option {{$property_subtype->state == 'Buen estado' ? 'selected' : '' }}>Buen estado</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row justify-content-center">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Metros construidos')</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input
                                                                class="form-control form-control-lg form-control-solid"
                                                                required
                                                                type="text" id="built_meters_office"
                                                                name="built_meters_office"
                                                                value="{{$property_subtype->built_meters ?? 0}}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row justify-content-center">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                                               for="exampleSelect1">@lang('Nº de plazas de garaje')</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select class="form-control form-control-solid"
                                                                    name="garage" required
                                                                    id="exampleSelect1" value="">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option value="5">5+</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row justify-content-center">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                                               for="exampleSelect1">@lang('Fachada')</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select class="form-control form-control-solid"
                                                                    name="facade" required
                                                                    id="exampleSelect1" value="">
                                                                    <!-- todo traducciones -->

                                                                <option {{$property_subtype->facade == 'Exterior' ? 'selected' : '' }}>Exterior</option>
                                                                <option {{$property_subtype->facade == 'Interior' ? 'selected' : '' }}>Interior</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row justify-content-center">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                                               for="exampleSelect1">@lang('Distribución')</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select class="form-control form-control-solid"
                                                                    name="distribution" id="exampleSelect1" value=""
                                                                    required>
                                                                    <!-- todo traducciones -->

                                                                <option {{$property_subtype->distribution == 'Diáfana' ? 'selected' : '' }}>Diáfana</option>
                                                                <option {{$property_subtype->distribution == 'Dividida mampáras' ? 'selected' : '' }}>Dividida mamparas</option>
                                                                <option {{$property_subtype->distribution == 'Dividida tabiques' ? 'selected' : '' }}>Dividida tabiques</option>
                                                                <option {{$property_subtype->distribution == 'Por plantas' ? 'selected' : '' }}>Por plantas</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row justify-content-center">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                                               for="exampleSelect1">@lang('Aire acondicionado')</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select class="form-control form-control-solid"
                                                                    name="airconditioning" id="exampleSelect1" value=""
                                                                    required>
                                                                    <!-- todo traducciones -->

                                                                <option {{$property_subtype->airconditioning == 'No' ? 'selected' : '' }}>No</option>
                                                                <option {{$property_subtype->airconditioning == 'Frio' ? 'selected' : '' }}>Frio</option>
                                                                <option {{$property_subtype->airconditioning == 'Frio y calor' ? 'selected' : '' }}>Frio y calor</option>
                                                                <option {{$property_subtype->airconditioning == 'Preinstalado' ? 'selected' : '' }}>Preinstalado</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row justify-content-center">
                                                        <label
                                                            class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Plantas')</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input
                                                                class="form-control form-control-lg form-control-solid"
                                                                type="text" name="floors"

                                                                value=" {{isset($property_subtype->floors) ? $property_subtype->floors : 0}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row justify-content-center">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                                               for="exampleSelect1">@lang('Uso exclusivo')</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select class="form-control form-control-solid"
                                                                    name="office_exclusive_use" id="exampleSelect1"
                                                                    value="" required>
                                                                    <!-- todo traducciones -->
                                                                    
                                                                <option {{$property_subtype->office_exclusive_use == '1' ? 'selected' : '' }} value="1">Si</option>
                                                                <option {{$property_subtype->office_exclusive_use == '0' ? 'selected' : '' }} value="0">No</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div id="caracteristicas_land" style="display: none;">

                                                    <div class="row form-group justify-content-center">
                                                        <label class="col-xl-3"></label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <h5 class="font-weight-bold mb-6">@lang('Datos terreno')</h5>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row justify-content-center">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                                               for="exampleSelect1">@lang('Tipo')</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select class="form-control form-control-solid" name="type"
                                                                    id="exampleSelect1" value="" required>
                                                                    <!-- todo traducciones -->

                                                                <option {{$property_subtype->type == 'Urbano' ? 'selected' : '' }}>Urbano</option>
                                                                <option {{$property_subtype->type == 'Urbanizable' ? 'selected' : '' }}>Urbanizable</option>
                                                                <option {{$property_subtype->type == 'No urbanizable' ? 'selected' : '' }}>No Urbanizable</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row justify-content-center">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Superficie total')</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input
                                                                class="form-control form-control-lg form-control-solid"
                                                                type="text" name="meters"
                                                                value=" {{isset($property_subtype->meters) ? $property_subtype->meters : 0}}"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row justify-content-center">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Metros edificables')</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input
                                                                class="form-control form-control-lg form-control-solid"
                                                                type="text" name="buildable_meters"
                                                                value=" {{isset($property_subtype->buildable_meters) ? $property_subtype->buildable_meters : 0}}"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row justify-content-center">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Superficie mínima que vende')</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input
                                                                class="form-control form-control-lg form-control-solid"
                                                                type="text" name="minimum_meters"
                                                                value=" {{isset($property_subtype->minimum_meters) ? $property_subtype->minimum_meters : 0}}"
                                                                required>

                                                        </div>
                                                    </div>

                                                    <div class="form-group row justify-content-center">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                                               for="exampleSelect1">@lang('Alturas máximas construibles')</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select class="form-control form-control-solid"
                                                                    name="maximum_buildable_floors" id="exampleSelect1"
                                                                    required
                                                                    value="{{$property_subtype->maximum_buildable_floors}}">
                                                                <option {{$property_subtype->maximum_buildable_floors == '1' ? 'selected' : '' }}>1</option>
                                                                <option {{$property_subtype->maximum_buildable_floors == '2' ? 'selected' : '' }}>2</option>
                                                                <option {{$property_subtype->maximum_buildable_floors == '3' ? 'selected' : '' }}>3</option>
                                                                <option {{$property_subtype->maximum_buildable_floors == '4' ? 'selected' : '' }}>4</option>
                                                                <option {{$property_subtype->maximum_buildable_floors == '5' ? 'selected' : '' }} value="5">5+</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row justify-content-center">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                                               for="exampleSelect1">@lang('Acceso rodado')</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select class="form-control form-control-solid" required
                                                                    name="acceso_rodado" id="exampleSelect1" value="">
                                                                    <!-- todo traducciones -->

                                                                @if($property_subtype->acceso_rodado)
                                                                    <option selected value="true">Si</option>
                                                                    <option value="false">No</option>
                                                                @else
                                                                    <option value="true">Si</option>
                                                                    <option selected value="false">No</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- caracteristicas checkbox de las propiedades -->
                                            <div class="tab-pane fade" id="char" role="tabpanel"
                                                 aria-labelledby="char-tab">

                                                <div class="row pt-10" style="justify-content: center !important;">
                                                    <!--checkbox caractereisticas de una propiedad general-->
                                                    <div id="car_property" class="form-group m-5">
                                                        <label><b>@lang('Características de la propiedad')</b></label>
                                                        <div class="row">
                                                            <div class="checkbox-list">
                                                                @if($property->property_type=="Office" ||
                                                                $property->property_type=="Flat")
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" id="check_elevator"
                                                                               name="elevator" value="check_elevator">
                                                                        <span></span>@lang('Elevator')</label>
                                                                @endif
                                                                <label class="checkbox">
                                                                    <input type="checkbox"
                                                                           id="check_energetic_certification_general"
                                                                           name="check_energetic_certification_general"
                                                                           value="check_energetic_certification_general">
                                                                    <span></span>@lang('Certificación energética')</label>
                                                                <label class="checkbox">
                                                                    <input type="checkbox" id="check_armarios"
                                                                           name="armarios" value="check_armarios">
                                                                    <span></span>@lang('Armarios empotrados')</label>
                                                                <label class="checkbox">
                                                                    <input type="checkbox" id="check_aire" name="aire"
                                                                           value="check_aire">
                                                                    <span></span>@lang('Aire acondicionado')</label>
                                                                <label class="checkbox">
                                                                    <input type="checkbox" id="check_security"
                                                                           name="check_security" value="check_security">
                                                                    <span></span>@lang('Security')</label>

                                                                <label class="checkbox">
                                                                    <input type="checkbox" id="check_terraza"
                                                                           name="terraza" value="check_terraza">
                                                                    <span></span>@lang('Terraza')</label>
                                                                <label class="checkbox">
                                                                    <input type="checkbox" id="check_balcon"
                                                                           name="balcon" value="check_balcon">
                                                                    <span></span>@lang('Balcón')</label>
                                                                <label class="checkbox">
                                                                    <input type="checkbox" id="check_trastero"
                                                                           name="trastero" value="check_trastero">
                                                                    <span></span>@lang('Trastero')</label>
                                                                <label class="checkbox">
                                                                    <input type="checkbox" id="check_garaje"
                                                                           name="garaje" value="check_garaje">
                                                                    <span></span>@lang('Plaza de garaje')</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--checkbox caractereisticas edificio-->
                                                    <div id="car_building" class="form-group m-5">
                                                        <label><b>@lang('Caracteristicas del edificio')</b></label>
                                                        <div class="checkbox-inline">
                                                            <label class="checkbox">
                                                                <input type="checkbox" id="piscina" name="piscina"
                                                                       value="piscina">
                                                                <span></span>@lang('Piscina')</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" id="zona_verde" name="zona_verde"
                                                                       value="zona_verde">
                                                                <span></span>@lang('Zona verde')</label>
                                                        </div>
                                                    </div>
                                                    <!--checkbox caractereisticas oficina-->
                                                    <div id="car_ofi" style="display: none;" class="form-group m-5">
                                                        <label><b>@lang('Caracteristicas de la oficina')</b></label>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox">
                                                                <input type="checkbox" id="agua_caliente"

                                                                       name="agua_caliente" value="agua_caliente">
                                                                <span></span>@lang('Agua caliente')</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="calefaccion"
                                                                       value="calefaccion" id="calefaccion">
                                                                <span></span>@lang('Calefacción verde')</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="cocina" value="cocina"
                                                                       id="cocina">
                                                                <span></span>@lang('Cocina')</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="almacen" value="almacen"
                                                                       id="almacen">
                                                                <span></span>@lang('Almacén')</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="cristal_doble"
                                                                       value="cristal_doble" id="cristal_doble">
                                                                <span></span>@lang('Cristal doble')</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="falso_techo"
                                                                       value="falso_techo" id="falso_techo">
                                                                <span></span>@lang('Falso techo')</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="suelo_tecnico"
                                                                       value="suelo_tecnico" id="suelo_tecnico">
                                                                <span></span>@lang('Suelo técnico verde')</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="elevator" value="elevator"
                                                                       id="elevator">
                                                                <span></span>@lang('Elevator')</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox"
                                                                       name="energetic_certification_office"
                                                                       value="energetic_certification_office"
                                                                       id="energetic_certification_office">
                                                                <span></span>Energetic certification</label> 
                                                        </div>
                                                    </div>
                                                    <!--checkbox seguridad oficina oficina-->
                                                    <div id="seguridad_ofi" style="display: none;"
                                                         class="form-group m-5">
                                                        <label><b>@lang('Seguridad oficina')</b></label>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="puerta_seguridad"
                                                                       id="puerta_seguridad" value="puerta_seguridad">
                                                                <span></span>@lang('Puerta de seguridad')</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="alarma" value="alarma"
                                                                       id="alarma">
                                                                <span></span>@lang('Alarma')</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="control"
                                                                       value="control_accesos" id="control_accesos">
                                                                <span></span>@lang('Control de accesos')</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="detector_incendios"
                                                                       value="detector_incendios"
                                                                       id="detector_incendios">
                                                                <span></span>@lang('Detectores de incendios')</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="extintores"
                                                                       value="extintores"
                                                                       id="extintores">
                                                                <span></span>@lang('Extintores')</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="aspersores"
                                                                       value="aspersores"
                                                                       id="aspersores">
                                                                <span></span>@lang('Aspersores')</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="cortafuegos"
                                                                       value="cortafuegos" id="cortafuegos">
                                                                <span></span>@lang('Puerta cortafuegos')</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="luces" value="luces_salida"
                                                                       id="luces_salida">
                                                                <span></span>@lang('Luces de salida')</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="conserje" value="conserje"
                                                                       id="conserje">
                                                                <span></span>@lang('Conserje/Portero')</label>
                                                        </div>
                                                    </div>
                                                    <!--checkbox caracteristicas terreno-->
                                                    <div id="car_land" style="display: none;" class="form-group m-5">
                                                        <label><b>@lang('Caracteristicas Terreno')</b></label>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="agua" value="agua"
                                                                       id="agua">
                                                                <span></span>@lang('Agua')</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="luz" value="luz" id="luz">
                                                                <span></span>@lang('Luz')</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="alcantarillado"
                                                                       value="alcantarillado" id="alcantarillado">
                                                                <span></span>@lang('Alcantarillado')</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="gas" value="gas" id="gas">
                                                                <span></span>@lang('Gas natural')</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="alumbrado"
                                                                       value="alumbrado"
                                                                       id="alumbrado">
                                                                <span></span>@lang('Alumbrado público')</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="aceras" value="aceras"
                                                                       id="aceras">
                                                                <span></span>@lang('Aceras')</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row pt-10" style="justify-content: center !important;">
                                                    {{$property_subtype->xml_characteristics}}
                                                </div>
                                            </div>
    {{--
      --    TAB CONTENTS
      --    DOCUMENTACION TAB DIV
      --}}
{{--
  -- @ RM Rafa Mollá  2020-11-09 07:37 AM en el alta de propiedades hay que ocultar la pestaña de documentación

                                            <div class="tab-pane fade" id="doc" role="tabpanel"
                                                 aria-labelledby="doc-tab">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h5 class="font-weight-bold mb-20 mt-15 text-center">
                                                            @lang('Documentación de la propiedad')</h5>

                                                        <div class="form-group row justify-content-center">
                                                            <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                                                   for="documents">@lang('Seleccionar documentos')</label>
                                                            <div class="col-lg-9 col-xl-6">

                                                                <input id="documents"
                                                                       class="form-control form-control-lg form-control-solid"
                                                                       type="file" name="documents[]"
                                                                       multiple="multiple"
                                                                       value="{{ $property->documents }}">

                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="table-responsive">
                                                                <table id="document_table" class="table">
                                                                    <thead>
                                                                    <tr>
                                                                        <th scope="col">@lang('Documento')</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @if(isset($property->documents) &&
                                                                    !empty($property->documents))
                                                                        @foreach($property->documents as $document)
                                                                            <tr>
                                                                                <td style="margin-left: auto; margin-right: auto">
                                                                                    <a title="Property document"
                                                                                       href="{{url($document->url)}}">{{ substr($document->url, strrpos( $document->url, '/', 0)+1) }}</a>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
--}}

                                            <div class="tab-pane fade" id="distances" role="tabpanel"
                                                 aria-labelledby="dist-tab">
                                                <div class="row">
                                                    <label class="col-xl-3"></label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <h3 class="font-weight-bold mb-20 mt-15 text-center">Distancias de la propiedad</h3>
                                                    </div>


                                                </div>

                                                @include('backend.includes.distances_tab')

                                            </div>
                                            <!--contacto-->
                                            @if(Auth::user()->type == "admin" || (Auth::user()->type == "real_estate" && $show_contact))
                                                <div class="tab-pane fade" id="contact" role="tabpanel"
                                                     aria-labelledby="contact-tab">
                                                    @include('backend.includes.contact_tab')
                                                </div>
                                            @endif

                                        <!-- //////////////////  Pestaña de estadisticas ///////////////-->
                                            @if(Auth::user()->type == "owner")

                                            <div class="tab-pane fade" id="statistics" role="tabpanel"
                                                 aria-labelledby="statistics-tab">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h5 class="font-weight-bold mb-20 mt-15 text-center">
                                                        Estadísticas de la propiedad</h5>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="statistics" role="tabpanel"
                                                     aria-labelledby="statistics-tab">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <h5 class="font-weight-bold mb-20 mt-15 text-center">
                                                                @lang('Estadísticas de la propiedad')</h5>
                                                        </div>
                                                    </div>

                                                    <div class="card-body">


                                                        <div class="row">

                                                                <!--end::Title-->
                                                            </div>
                                                            <div class="card-body">


                                                                <div class="row">
                                                                    <div class="col-xl-6">
                                                                        <!--begin: Stats Widget 19-->
                                                                        <div class="card card-custom bg-light-success card-stretch gutter-b">

                                                                            <!--begin::Body-->
                                                                            <div class="card-body my-3 ">
                                                                                <a href="#" class="card-title font-weight-bolder text-success text-hover-state-dark font-size-h6 mb-4 d-block">Nº de inmobiliarias que tienen esta propiedad en favoritos: </a>
                                                                                <div class="font-weight-bold text-muted font-size-sm">
                                                                                    <span class="text-dark-75 font-size-h2 font-weight-bolder mr-2 d-flex justify-content-center"> {{$count_re_favs ?? 0}}</span></div>
                                                                            </div>
                                                                            <!--end:: Body-->
                                                                        </div>

                                                                        <!--end::Title-->
                                                                    </div>
                                                                    <div class="card-body">


                                                                        <div class="row">
                                                                            <div class="col-xl-6">
                                                                                <!--begin: Stats Widget 19-->
                                                                                <div
                                                                                    class="card card-custom bg-light-success card-stretch gutter-b">

                                                                                    <!--begin::Body-->
                                                                                    <div class="card-body my-3 ">
                                                                                        <a href="#"
                                                                                           class="card-title font-weight-bolder text-success text-hover-state-dark font-size-h6 mb-4 d-block">
                                                                                            @lang('Nº de inmobiliarias que tienen esta propiedad en favoritos:') </a>
                                                                                        <div
                                                                                            class="font-weight-bold text-muted font-size-sm">
                                                                                            <span
                                                                                                class="text-dark-75 font-size-h2 font-weight-bolder mr-2 d-flex justify-content-center"> {{$count_re_favs ?? 0}}</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!--end:: Body-->
                                                                                </div>
                                                                                <!--end: Stats:Widget 19-->
                                                                            </div>
                                                                            <div class="col-xl-6">
                                                                                <!--begin::Stats Widget 20-->
                                                                                <div
                                                                                    class="card card-custom bg-light-warning card-stretch gutter-b">
                                                                                    <!--begin::Body-->
                                                                                    <div class="card-body my-4">
                                                                                        <a href="#"
                                                                                           class="card-title font-weight-bolder text-warning font-size-h6 mb-4 text-hover-state-dark d-block">
                                                                                            @lang('Nº de inmobiliarias que tienen ficha abierta con esta propiedad:')</a>
                                                                                        <div
                                                                                            class="font-weight-bold text-muted font-size-sm">
                                                                                            <span
                                                                                                class="text-dark-75 font-weight-bolder font-size-h2 mr-2 d-flex justify-content-center">{{$countOpenCards ?? 0}}</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!--end::Body-->
                                                                                </div>
                                                                                <!--end::Stats Widget 20-->
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--end::Card-->
                                                            </div>
                                                        </div>
                                                        <!--end::Card-->
                                                    </div>





                                                        </div>


                                                    </div>
                                                </div>
                                        @endif
                                        <!-- ////////////////// Fin Pestaña de estadisticas ///////////////-->

                                        </div>


                                        <!--end::Body-->
                                        <div class="card-footer text-center justify-content-center">
                                            @if(($property->historical->last()->status_id == "2"
                                                || $property->historical->last()->status_id == "4")
                                                )
                                                @if(Auth::user()->type == "owner")
                                                    <button type="submit" form="form_sold_property"
                                                            class="btn btn-primary mr-2">@lang('¡La he vendido!')
                                                    </button>
                                                @endif
                                                @if ((Auth::user()->type == "admin"))
                                                    <button type="submit" form="form_sold_property_admin"
                                                            class="btn btn-primary mr-2">@lang('Propiedad vendida')
                                                    </button>
                                                @endif
                                            @endif
                                            @if(Auth::user()->type == "owner" && $edit_active )
                                            <!-- si  esta activa, puedo guardar cambios -->
                                                @if($property->historical->last()->status->id == "2" )
                                                    <button type="submit" onclick="setValues()"
                                                            class="btn btn-success mr-2">@lang('Guardar')
                                                    </button>
                                                    <button type="button" class="btn btn-secondary" data-toggle="modal"
                                                            data-target="#active_modal">@lang('Desactivar propiedad')
                                                    </button>
                                                @endif
                                            <!--si esta en proceso, puedo mandarla a revisar -->
                                                @if($property->historical->last()->status->id == "6" )
                                                    <button type="submit" onclick="setValues()"
                                                            class="btn btn-success mr-2">@lang('Guardar')
                                                    </button>
                                                    <button  onclick="setValues(); setToCheck()" type="submit"
                                                            class="btn btn-secondary">@lang('Enviar a revisión')
                                                    </button>
                                                @endif
                                            @endif

                                        <!-- en caso de ser admin -->
                                            @if(Auth::user()->type == "admin" )
                                            <!-- si no esta cancelada, (si esta cancelada no puedo hacer nada) -->
                                                @if($property->historical->last()->status->id != "3" &&
                                                $property->historical->last()->status->id != "6" )
                                                <!-- si no esta activa puedo cancelar, mandar a revisar o validar -->
                                                    @if($property->historical->last()->status->id != "2"
                                                        && $property->historical->last()->status->id != "7")
                                                        <button style="color: white" form="form_validate_property"
                                                                type="submit"
                                                                class="btn btn-secondary bg-success">@lang('Validar propiedad')
                                                        </button>
                                                        <button type="button" id="process_button"
                                                                class="btn btn-warning"
                                                                data-toggle="modal" data-target="#check_modal">@lang('Mandar a revisión')
                                                        </button>
                                                        <button type="button" id="cancel_button" class="btn btn-danger"
                                                                data-toggle="modal" data-target="#cancel_modal">@lang('Cancelar propiedad')
                                                        </button>
                                                    @endif
                                                @endif
                                            <!-- si esta activa/validada, puedo desactivar -->
                                                @if($property->historical->last()->status->id == "2")
                                                    <button form="form_deactivate_property" type="button"
                                                            class="btn btn-secondary bg-success" data-toggle="modal"
                                                            data-target="#active_modal">@lang('Desactivar')
                                                    </button>
                                                @endif
                                            @endif

                                        <!-- en caso de ser inmobiliaria -->
                                            @if(Auth::user()->type == "real_estate"
                                            && !$show_contact
                                            && Auth::user()->real_estate->status == '2' )
                                                <button form="form_open_ficha" type="button"
                                                        class="btn btn-success mr-2"
                                                        data-toggle="modal" data-target="#ficha_modal">@lang('Abrir ficha')
                                                </button>
                                            @endif

                                        </div>
                                    </div>

                                </form>
                                <!--end::Form-->
                                <!--Form para enviar un post a la ruta, tiene que estar fuera del form general-->
                                <form method="post" id="form_sold_property_admin"
                                      action="/admin/properties/{{$property->id}}/sold">
                                    @csrf
                                </form>
                                <!--Form para enviar un post a la ruta, tiene que estar fuera del form general-->
                                <form method="post" id="form_sold_property"
                                      action="/owner/properties/{{$property->id}}/sold">
                                    @csrf
                                </form>
                                <!--Form para enviar un post a la ruta, tiene que estar fuera del form general-->
                                <form method="post" id="form_activate_property"
                                      action="/owner/properties/{{$property->id}}/activate">
                                    @csrf
                                </form>
                                <!--Form para enviar un post y validar una propiedad, tiene que estar fuera del form general-->
                                <form method="post" id="form_validate_property"
                                      action="/admin/properties/{{$property->id}}/validate">
                                    @csrf
                                </form>
                                <!-- Owner envia a inmozon una propiedad para revisar, tiene que estar fuera del form general-->
                                <form method="post" id="form_check_owner_property"
                                      action="/owner/properties/{{$property->id}}/ownerCheckProperty">
                                    @csrf
                                </form>

                                <!--Form para enviar un post y cancelar una propiedad, tiene que estar fuera del form general-->
                                <form method="post" id="form_cancel_property"
                                      action="/admin/properties/{{$property->id}}/cancel">
                                    @csrf
                                </form>
                                <!--end form-->
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            @endsection

            @section('js')
                <script
                    src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAPS_API_KEY')}}&callback=initMap&libraries=&v=weekly"
                    defer></script>
                <script src="{{asset('/assets/backend/js/components/inmozon.maps.js')}}"></script>
                <script src="{{asset('/assets/backend/js/inmozon.functions.js')}}"></script>
                <script>

                    //tenemos una variable hidden donde almacenamos los valores como numeros
                    //y otra variable (el input) donde tenemos el formato visual como string
                    //solo enviamos el hidden con el valor numerico
                    var iva_number = 0;
                    var comision_agencia_number = 0;

                    function isValid(value){
                        var min_commision = "{{$minimum_commission}}";
                        console.log(min_commision);
                        if(parseInt(value)<parseInt(min_commision)){
                            document.getElementById("agency_commissions").value = min_commision;
                            document.getElementById("agency_commissions_hidden").value = min_commision;
                            Swal.fire('La comisión debe ser mayor o igual a '+min_commision+'%', '¡Revisa la comisión!', 'warning');

                        }
                    }

                    function setHiddenPrice(){
                        nf = new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'EUR' });
                        document.getElementById("price_hidden").value = document.getElementById("price").value
                        document.getElementById("price").value = nf.format(document.getElementById("price").value)

                    }

                    function setHiddenComission(){
                        nf = new Intl.NumberFormat('de-DE', { style: 'percent' });
                        document.getElementById("agency_commissions_hidden").value = document.getElementById("agency_commissions").value
                        document.getElementById("agency_commissions").value = parseFloat(document.getElementById("agency_commissions").value).toFixed(2)+"%"
                        console.log( document.getElementById("agency_commissions_hidden").value);
                    }

                    function calculateIVA(){
                        nf = new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'EUR' });

                        var calculated = 0.21*document.getElementById("agency_commissions").value * document.getElementById("price_hidden").value*0.01 ;
                        calculated = parseFloat(calculated).toFixed(2);
                        this.iva_number = calculated
                        document.getElementById("iva").value =  nf.format(calculated);
                    }

                    function agencyCommision() {
                        nf = new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'EUR' });

                        const noTruncarDecimales = {maximumFractionDigits: 20};
                        var calculated =
                            (document.getElementById("agency_commissions").value
                            * document.getElementById("price_hidden").value*0.01);
                        @if(Auth::user()->type == "owner" && Auth::user()->owner->type == "agente")
                            calculated<2000 ? calculated=2000 : calculated;
                        @else
                            calculated<3000 ? calculated=3000 : calculated;
                        @endif
                    //   calculated = parseFloat(calculated).toFixed(2);
                        document.getElementById("calculated_agency_commission").value = nf.format(calculated);
                    }

                    function calculateCommision() {
                        nf = new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'EUR' });
                        var calculated = document.getElementById("price_hidden").value -
                            ((document.getElementById("agency_commissions").value
                            * document.getElementById("price_hidden").value*0.01)
                            + parseFloat(this.iva_number));

                        document.getElementById("result").value = nf.format(calculated);
                    }
                </script>
                {{--
                  -- Add/remove rows to images table
                  -- Remove some form fields (location/zone combos) before submit
                  --}}
                <script>
                    /**
                     * Remove the same table row where the DELETE button was clicked
                     * @param row   DOM element (this)
                     * @return null
                     */
                    function removeRow(row) {
                        let item_id = jQuery(row).attr('data-id');
                        let url = jQuery(row).data('url');
                        let action = jQuery(row).data('action');
                        let confirm_question = jQuery(row).data('confirm');
                        if (confirm(confirm_question)) {
                            jQuery.ajax({
                                type: 'post',
                                url: url,
                                data: {
                                    action: action,
                                    property_id: {{ $property->id}},
                                    item_id: item_id,
                                },
                                dataType: 'json',
                                headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')},
                                success: function (response) {
                                    if (false == response.success) {
                                        console.error('AJAX REMOVE TABLE response.error', response.error);
                                    } else {
                                        if (true == response.success) {
                                            // var loading = new KTDialog({
                                            //     'type': 'text',
                                            //     'placement': 'center',
                                            //     'message': 'Loading ...'
                                            // });
                                            // loading.show();
                                            jQuery(row).closest('tr').remove();
                                        }
                                    }
                                }
                            });
                        }
                    }


                    /**
                     * Remove some input fields that are not necessary to submit.
                     * @return false
                     */
                    function beforeSubmit() {
                        let formEl = document.getElementById('form_edit_property');
                        removeFields(['latitude', 'longitude', 'location_country', 'location_state', 'location_county', 'location_city', 'location_street', 'location_postcode']);
                        formEl.submit();
                        return false;
                    }
                </script>

                {{--
                  -- Set the Google Maps with the property coordinates
                  --}}
                @if(isset($property))
                    <script>
                        function initMap() {
                            let center = {
                                lat: {{$property-> location -> latitude}},
                                lng: {{$property -> location -> longitude}}};
                            // The map, centered at Valencia
                            map = new google.maps.Map(document.getElementById('kt_gmap_4'), {zoom: 15, center: center});
                            // The marker, positioned at Valencia
                            // marker = new google.maps.Marker({position: center, map: map, draggable:true});
                            marker = setMarker(map, new google.maps.Marker(), center);
                            getCoordinates({'lat': 'latitude', 'lng': 'longitude'}, map);
                        }
                    </script>
                @endif

                <script>
                    function show_modal() {

                    }

                    function setToCheck(){

                        document.getElementById("id_to_check").value = "toCheck";
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

                            /*
                                                if( document.getElementById("form_edit_property").value == "" ){

                                                }
                            */

                            //submit desde JS
                            document.getElementById("form_edit_property").submit();
                        } catch (error) {
                            console.log(error)
                        }
                    }

                    //apartir del string del morfismo, sacamos el nombre del modelo para cargar la vista dinamica
                    var type = "{{$property->propertyable_type}}".substring(3);
                    //objeto auxiliar para cumplir con la estructura de un evento
                    var aux_object = {
                        target: {
                            value: type
                        }
                    };

                    var selector_vista = function (event) {
                        //////adicional para oficina
                        document.getElementById("seguridad_ofi").style.display = "none";
                        document.getElementById("car_ofi").style.display = "none";
                        document.getElementById("car_building").style.display = "block";
                        document.getElementById("car_property").style.display = "block";
                        document.getElementById("car_land").style.display = "none";
                        //////////////

                        document.getElementById("caracteristicas_flat").style.display = "none";
                        document.getElementById("caracteristicas_home").style.display = "none";
                        document.getElementById("caracteristicas_country").style.display = "none";
                        document.getElementById("caracteristicas_office").style.display = "none";
                        document.getElementById("caracteristicas_land").style.display = "none";

                        switch (event.target.value) {
                            case "Flat":
                        document.getElementById("type-tab").style.display = "block";

                                document.getElementById("type-tab").innerText = "Piso";
                                document.getElementById("caracteristicas_flat").style.display = "block";
                                break;
                            case "Home":
                        document.getElementById("type-tab").style.display = "block";

                                document.getElementById("type-tab").innerText = "Casa/Home";
                                document.getElementById("caracteristicas_home").style.display = "block";
                                break;
                            case "CountryHome":
                        document.getElementById("type-tab").style.display = "block";

                                document.getElementById("type-tab").innerText = "Country";
                                document.getElementById("caracteristicas_country").style.display = "block";
                                break;
                            case "Office":
                        document.getElementById("type-tab").style.display = "block";

                                document.getElementById("type-tab").innerText = "Office";
                                document.getElementById("caracteristicas_office").style.display = "block";
                                document.getElementById("seguridad_ofi").style.display = "block";
                                document.getElementById("car_property").style.display = "none";
                                document.getElementById("car_ofi").style.display = "block";
                                break;
                            case "Land":
                        document.getElementById("type-tab").style.display = "block";

                                document.getElementById("type-tab").innerText = "Land";
                                document.getElementById("car_land").style.display = "block";
                                document.getElementById("car_building").style.display = "none";
                                document.getElementById("car_property").style.display = "none";
                                document.getElementById("caracteristicas_land").style.display = "block";
                                document.getElementById("community_fees").style.display = "none";
                                break;
                            case "Storage room":
                                //document.getElementById("type-tab").innerText = "Storage room";
                                document.getElementById("caracteristicas_home").style.display = "block";
                                document.getElementById("type-tab").href = "#caracteristicas_storage";
                                break;
                            case "Comercial Property":
                              // document.getElementById("type-tab").innerText = "Comercial";
                                document.getElementById("caracteristicas_home").style.display = "block";
                                document.getElementById("type-tab").href = "#caracteristicas_comercial";

                                break;
                            case "Garage":
                                //document.getElementById("type-tab").innerText = "Garage";
                                document.getElementById("caracteristicas_home").style.display = "block";
                                document.getElementById("type-tab").href = "#caracteristicas_garage";

                                break;
                            default:
                            /*    document.getElementById("type-tab").innerText = "Flat";
                                document.getElementById("caracteristicas_flat").style.display = "block";
                                document.getElementById("type-tab").href = "#caracteristicas_flat";
*/
                                break;
                        }
                    }

                    function activar_checkbox(check_list) {
                        try {
                            if (check_list != "" && check_list != null) {
                                check_list.forEach(check_id => {
                                    //descartamos cadena vacia
                                    if (check_id != "")
                                        document.getElementById(check_id).checked = "checked";

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
                            if ("{{$property_subtype->energetic_certification}}" == true)
                                document.getElementById("check_energetic_certification_general").checked = "checked";
                            console.log("{{$property_subtype}} valor")
                            if ("{{$property_subtype->energetic_certification}}" == true)
                                document.getElementById("energetic_certification_office").checked = "checked";

                            if ("{{$property_subtype->elevator}}")
                                document.getElementById("check_elevator").checked = "checked";


                        } catch (error) {

                        }

                    }

                    function disable_edit() {
                        var elements = document.getElementById("form_edit_property").elements;
                        for (var i = 0, len = elements.length; i < len; ++i) {
                            try {

                                elements[i].disabled = true;
                            } catch (error) {

                            }

                        }

                        try {
                            document.getElementById("cancel_button").disabled = false;
                            document.getElementById("process_button").disabled = false;
                        } catch (error) {

                        }

                    }


                    function enable_edit() {
                        var elements = document.getElementById("form_edit_property").elements;
                        for (var i = 0, len = elements.length; i < len; ++i) {
                            elements[i].disabled = false;

                        }
                    }

                    document.getElementById("propertyable_type").addEventListener('change', selector_vista);


                    window.onload = function () {
                        document.getElementById("propertyable_type").value = type;
                        //simulamos el evento cuando leemos el tipo de propiedad
                        selector_vista(aux_object);
                        console.log(type)
                        activar_checkboxes()

                        @if(false == $edit_active)
                        disable_edit();
                        @endif


                    };
                </script>

    @include('backend.includes.zoneFieldsGoogleMaps')
@endsection
