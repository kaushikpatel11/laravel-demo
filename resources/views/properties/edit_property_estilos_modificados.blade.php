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
                            <div class="card-header"><h1>@lang('Modificar datos propiedad')</h1></div>
                            <div class="card card-custom card-stretch">
                                <!-- Modal desactivar una propiedad-->
                                <div class="modal fade" id="active_modal" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">@lang('Explique el motivo')</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                </button>
                                            </div>
                                            <!--begin::Form-->
                                            <form method="post" id="modal_form_edit_property"
                                                  action="/owner/properties/{{$property->id}}/deactivate">
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
                                                <h5 class="modal-title" id="exampleModalLabel">@lang('Explique el motivo')</h5>
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
                                <!--begin::Form-->
                                <form method="post" id="form_edit_property"
                                      action="/owner/properties/{{$property->id}}">
                                @method('PUT')
                                @csrf
                                <!--begin::Body-->
                                    <div class="card-body">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                                   role="tab" aria-controls="home" aria-selected="true">@lang('General')</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="imagenes-tab" data-toggle="tab" href="#imagenes"
                                                   role="tab" aria-controls="profile" aria-selected="false">@lang('Imágenes')</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="type-tab" style="display: none;"
                                                   data-toggle="tab" href="#caracteristicas" role="tab"
                                                   aria-controls="contact" aria-selected="false">@lang('Piso')</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="char-tab" data-toggle="tab" href="#char"
                                                   role="tab" aria-controls="contact" aria-selected="false">@lang('Características')</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="char-tab" data-toggle="tab" href="#doc"
                                                   role="tab" aria-controls="contact" aria-selected="false">@lang('Documentación')</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <!--propiedades generales-->
                                            <div class="tab-pane fade show active" id="home" role="tabpanel "
                                                 aria-labelledby="home-tab">
                                                <div class="row">
                                                    <label class="col-xl-3"></label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <h5 class="font-weight-bold mb-20 mt-15 text-center">@lang('Datos generales de la propiedad # '){{$property->id}}</h5>
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="justify-content: center;">
                                                    <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                                           for="exampleSelect1">@lang('Tipo de propiedad')</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <select class="form-control form-control-solid"
                                                                name="property_type" id="property_type"
                                                                value="{{$property->type}}">
                                                            <option value="" selected disabled hidden>@lang('Seleccione')</option>
                                                            <option value="Flat">@lang('Piso')</option>
                                                            <option value="Home/Chalet">@lang('Casa o chalet')</option>
                                                            <option value="Country home">@lang('Casa de campo')</option>
                                                            <option value="Office">@lang('Oficina')</option>
                                                            <option value="Land">@lang('Terreno')</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="justify-content: center;">
                                                    <label
                                                        class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Precio')</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input class="form-control form-control-lg form-control-solid"
                                                               type="text" name="price" value="{{$property->price}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="justify-content: center;">
                                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Comisión de agencia')</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input class="form-control form-control-lg form-control-solid"
                                                               type="text" name="agency_commissions"
                                                               value="{{$property->agency_commissions}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="justify-content: center;">
                                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Comisión PLF')</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input class="form-control form-control-lg form-control-solid"
                                                               type="text" name="plf_commissions"
                                                               value="{{$property->plf_commissions}}">
                                                    </div>
                                                </div>
                                                <div id="community_fees" class="form-group row"
                                                     style="justify-content: center;">
                                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Gastos de comunidad')</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input class="form-control form-control-lg form-control-solid"
                                                               type="text" name="community_fees"
                                                               value="{{$property_subtype->community_fees}}">
                                                    </div>
                                                </div>
                                                <div id="status" class="form-group row">
                                                    <label
                                                        class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Estado:')</label>
                                                    @if($property->historical->last()->status->id == 2)
                                                        <label
                                                            class="col-xl-3 col-lg-3 col-form-label text-left text-success">{{$property->historical->last()->status->name}}</label>
                                                    @else
                                                        <label
                                                            class="col-xl-3 col-lg-3 col-form-label text-left text-danger">{{$property->historical->last()->status->name}}</label>
                                                    @endif
                                                </div>


                                                <div class="form-group mb-1">
                                                    <label for="exampleTextarea">@lang('Descripción')</label>
                                                    <textarea class="form-control" id="exampleTextarea"
                                                              name="description"
                                                              rows="6">{{$property->description}}</textarea>
                                                </div>


                                            </div>
                                            <!--imagenes-->
                                            <div class="tab-pane fade" id="imagenes" role="tabpanel"
                                                 aria-labelledby="imagenes-tab">
                                                <div class="row">
                                                    <label class="col-xl-3"></label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <h5 class="font-weight-bold mb-20 mt-15 text-center">@lang('Imágenes de la propiedad')</h5>
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
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Metros construidos')</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input
                                                                class="form-control form-control-lg form-control-solid"
                                                                type="text" name="built_meters_flat"
                                                                value="{{$property_subtype->built_meters}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row" style="justify-content: center;">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Baños')</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input
                                                                class="form-control form-control-lg form-control-solid"
                                                                type="text" name="bathrooms_flat"
                                                                value="{{$property_subtype->bathrooms}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row" style="justify-content: center;">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Dormitorios')</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input
                                                                class="form-control form-control-lg form-control-solid"
                                                                type="text" name="bedrooms_flat"
                                                                value="{{$property_subtype->bedrooms}}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row" style="justify-content: center;">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                                               for="exampleSelect1">Facade</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select class="form-control form-control-solid"
                                                                    name="facade_flat" id="exampleSelect1"
                                                                    value="{{$property_subtype->facade}}">
                                                                @if($property_subtype->facade == 'Exterior')
                                                                    <option selected>Exterior</option>
                                                                    <option>Interior</option>
                                                                @else
                                                                    <option>Exterior</option>
                                                                    <option selected>Interior</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row" style="justify-content: center;">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                                               for="exampleSelect1">@lang('Piso')</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select class="form-control form-control-solid"
                                                                    name="floor_flat" id="exampleSelect1" value="">
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
                                                               for="exampleSelect1">Type</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select class="form-control form-control-solid"
                                                                    name="type_flat" id="exampleSelect1" value="">
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
                                                               for="exampleSelect1">@lang('Estado')</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select class="form-control form-control-solid"
                                                                    name="state_flat" id="exampleSelect1" value="">
                                                                @if($property_subtype->state == 'A reformar')
                                                                    <option selected>@lang('A reformar')</option>
                                                                    <option>@lang('Buen estado')</option>
                                                                @else
                                                                    <option>@lang('A reformar')</option>
                                                                    <option selected>@lang('Buen estado')</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>

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
                                                               for="exampleSelect1">@lang('Tipo')</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select class="form-control form-control-solid"
                                                                    name="type_home" id="exampleSelect1"
                                                                    value="{{$property_subtype->type}}">
                                                                <option>@lang('Casa o chalet independiente')</option>
                                                                <option>@lang('Chalet pareado')</option>
                                                                <option>@lang('Chalet adosado')</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                                               for="exampleSelect1">@lang('Estado')</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select class="form-control form-control-solid"
                                                                    name="state_home" id="exampleSelect1"
                                                                    value="{{$property_subtype->state}}">
                                                                <option>@lang('A reformar')</option>
                                                                <option>@lang('Buen estado')</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Baños')</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input
                                                                class="form-control form-control-lg form-control-solid"
                                                                type="text" name="bathrooms_home"
                                                                value="{{$property_subtype->bathrooms}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Dormitorios')</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input
                                                                class="form-control form-control-lg form-control-solid"
                                                                type="text" name="bedrooms_home"
                                                                value="{{$property_subtype->bedrooms}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left">Built
                                                            metersss</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input
                                                                class="form-control form-control-lg form-control-solid"
                                                                type="text" name="built_meters_home"
                                                                value="{{$property_subtype->built_meters}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="caracteristicas_country" style="display: none;">

                                                    <div class="row">
                                                        <label class="col-xl-3"></label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <h5 class="font-weight-bold mb-6">Datos Country Home</h5>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                                               for="exampleSelect1">Type</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select class="form-control form-control-solid" name="type"
                                                                    id="exampleSelect1" value="">
                                                                <option>Casa o chalet independiente</option>
                                                                <option>Chalet pareado</option>
                                                                <option>Chalet adosado</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                                               for="exampleSelect1">Estado</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select class="form-control form-control-solid"
                                                                    name="estate" id="exampleSelect1" value="">
                                                                <option>A reformar</option>
                                                                <option>Buen estado</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left">Bathrooms</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input
                                                                class="form-control form-control-lg form-control-solid"
                                                                type="text" name="bathrooms">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left">Bedrooms</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input
                                                                class="form-control form-control-lg form-control-solid"
                                                                type="text" name="bedrooms">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left">Built
                                                            metersss</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input
                                                                class="form-control form-control-lg form-control-solid"
                                                                type="text" name="built_meters">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="caracteristicas_office" style="display: none;">

                                                    <div class="row">
                                                        <label class="col-xl-3"></label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <h5 class="font-weight-bold mb-6">Datos Office</h5>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                                               for="exampleSelect1">Estado</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select class="form-control form-control-solid" name="state"
                                                                    id="exampleSelect1" value="">
                                                                <option>A reformar</option>
                                                                <option>Buen estado</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left">Built
                                                            meters</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input
                                                                class="form-control form-control-lg form-control-solid"
                                                                type="text" name="built_meters_office"
                                                                value="{{$property_subtype->built_meters}}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                                               for="exampleSelect1">Nº de plazas de garaje</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select class="form-control form-control-solid"
                                                                    name="garage" id="exampleSelect1" value="">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option value="5">5+</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                                               for="exampleSelect1">Facade</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select class="form-control form-control-solid"
                                                                    name="facade" id="exampleSelect1" value="">
                                                                <option>Exterior</option>
                                                                <option>Interior</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                                               for="exampleSelect1">Distribution</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select class="form-control form-control-solid"
                                                                    name="distribution" id="exampleSelect1" value="">
                                                                <option>Diafana</option>
                                                                <option>Dividida mamparas</option>
                                                                <option>Dividida tabiques</option>
                                                                <option>Por plantas</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                                               for="exampleSelect1">Distribution</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select class="form-control form-control-solid"
                                                                    name="airconditioning" id="exampleSelect1" value="">
                                                                <option>No</option>
                                                                <option>Frio</option>
                                                                <option>Frio y calor</option>
                                                                <option>Preinstalado</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label
                                                            class="col-xl-3 col-lg-3 col-form-label text-left">Floors</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input
                                                                class="form-control form-control-lg form-control-solid"
                                                                type="text" name="floors"
                                                                value="{{$property_subtype->floors}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                                               for="exampleSelect1">Uso exclusivo</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select class="form-control form-control-solid"
                                                                    name="office_exclusive_use" id="exampleSelect1"
                                                                    value="">
                                                                <option>Si</option>
                                                                <option>No</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div id="caracteristicas_land" style="display: none;">

                                                    <div class="row">
                                                        <label class="col-xl-3"></label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <h5 class="font-weight-bold mb-6">Datos Land</h5>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                                               for="exampleSelect1">Type</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select class="form-control form-control-solid" name="type"
                                                                    id="exampleSelect1" value="">
                                                                <option>Urbano</option>
                                                                <option>Urbanizable</option>
                                                                <option>No Urbanizable</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left">Superficie
                                                            total</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input
                                                                class="form-control form-control-lg form-control-solid"
                                                                type="text" name="meters"
                                                                value="{{$property_subtype->meters}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left">Buildable
                                                            meters</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input
                                                                class="form-control form-control-lg form-control-solid"
                                                                type="text" name="buildable_meters"
                                                                value="{{$property_subtype->buildable_meters}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left">Superficie
                                                            minima que vende</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input
                                                                class="form-control form-control-lg form-control-solid"
                                                                type="text" name="minimum_meters"
                                                                value="{{$property_subtype->minimum_meters}}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                                               for="exampleSelect1">Maximum buildable floors</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select class="form-control form-control-solid"
                                                                    name="maximum_buildable_floors" id="exampleSelect1"
                                                                    value="{{$property_subtype->maximum_buildable_floors}}">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option value="5">5+</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                                               for="exampleSelect1">Acceso rodado</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <select class="form-control form-control-solid"
                                                                    name="acceso_rodado" id="exampleSelect1" value="">
                                                                @if($property_subtype->acceso_rodado)
                                                                    <option selected>Si</option>
                                                                    <option>No</option>
                                                                @else
                                                                    <option>Si</option>
                                                                    <option selected>No</option>
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
                                                    <div id="car_property" class="form-group">
                                                        <label>Caracteristicas de la propiedad</label>
                                                        <div class="row">
                                                            <div class="checkbox-list">
                                                                @if($property->property_type=="Office" || $property->property_type=="Flat")
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" id="check_elevator"
                                                                               name="elevator" value="check_elevator">
                                                                        <span></span>Elevator</label>
                                                                @endif
                                                                <label class="checkbox">
                                                                    <input type="checkbox"
                                                                           id="check_energetic_certification_general"
                                                                           name="check_energetic_certification_general"
                                                                           value="check_energetic_certification_general">
                                                                    <span></span>Energetic certification</label>
                                                                <label class="checkbox">
                                                                    <input type="checkbox" id="check_armarios"
                                                                           name="armarios" value="check_armarios">
                                                                    <span></span>Armarios empotrados</label>
                                                                <label class="checkbox">
                                                                    <input type="checkbox" id="check_aire" name="aire"
                                                                           value="check_aire">
                                                                    <span></span>Aire acondicionado</label>
                                                                <label class="checkbox">
                                                                    <input type="checkbox" id="check_security"
                                                                           name="security" value="check_security">
                                                                    <span></span>Security</label>
                                                            </div>
                                                            <div class="checkbox-list">
                                                                <label class="checkbox">
                                                                    <input type="checkbox" id="check_terraza"
                                                                           name="terraza" value="check_terraza">
                                                                    <span></span>Terraza</label>
                                                                <label class="checkbox">
                                                                    <input type="checkbox" id="check_balcon"
                                                                           name="balcon" value="check_balcon">
                                                                    <span></span>Balcon</label>
                                                                <label class="checkbox">
                                                                    <input type="checkbox" id="check_trastero"
                                                                           name="trastero" value="check_trastero">
                                                                    <span></span>Trastero</label>
                                                                <label class="checkbox">
                                                                    <input type="checkbox" id="check_garaje"
                                                                           name="garaje" value="check_garaje">
                                                                    <span></span>Plaza de garaje</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--checkbox caractereisticas edificio-->
                                                    <div id="car_building" class="form-group">
                                                        <label>Caracteristicas del edificio</label>
                                                        <div class="checkbox-inline">
                                                            <label class="checkbox">
                                                                <input type="checkbox" id="piscina" name="piscina"
                                                                       value="piscina">
                                                                <span></span>Piscina</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" id="zona_verde" name="zona_verde"
                                                                       value="zona_verde">
                                                                <span></span>Zona verde</label>
                                                        </div>
                                                    </div>
                                                    <!--checkbox caractereisticas oficina-->
                                                    <div id="car_ofi" style="display: none;" class="form-group ">
                                                        <label>Caracteristicas de la oficina</label>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox">
                                                                <input type="checkbox" id="agua_caliente"
                                                                       checked="checked" name="agua_caliente"
                                                                       value="agua_caliente">
                                                                <span></span>Agua caliente</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="calefaccion"
                                                                       value="calefaccion" id="calefaccion">
                                                                <span></span>Calefacción verde</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="cocina" value="cocina"
                                                                       id="cocina">
                                                                <span></span>Cocina</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="almacen" value="almacen"
                                                                       id="almacen">
                                                                <span></span>Almacen</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="cristal_doble"
                                                                       value="cristal_doble" id="cristal_doble">
                                                                <span></span>Cristal doble</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="falso_techo"
                                                                       value="falso_techo" id="falso_techo">
                                                                <span></span>Falso techo</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="suelo_tecnico"
                                                                       value="suelo_tecnico" id="suelo_tecnico">
                                                                <span></span>Suelo técnico verde</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="elevator" value="elevator"
                                                                       id="elevator">
                                                                <span></span>Elevator</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox"
                                                                       name="energetic_certification_office"
                                                                       value="energetic_certification_office"
                                                                       id="energetic_certification_office">
                                                                <span></span>Energetic certification</label>
                                                        </div>
                                                    </div>
                                                    <!--checkbox seguridad oficina oficina-->
                                                    <div id="seguridad_ofi" style="display: none;" class="form-group">
                                                        <label>Seguridad oficina</label>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="puerta_seguridad"
                                                                       id="puerta_seguridad" value="puerta_seguridad">
                                                                <span></span>Puerta de seguridad</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="alarma" value="alarma"
                                                                       id="alarma">
                                                                <span></span>Alarma</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="control"
                                                                       value="control_accesos" id="control_accesos">
                                                                <span></span>Control de accesos</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="detector_incendios"
                                                                       value="detector_incendios"
                                                                       id="detector_incendios">
                                                                <span></span>Detectores de incendios</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="extintores"
                                                                       value="extintores" id="extintores">
                                                                <span></span>Extintores</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="aspersores"
                                                                       value="aspersores" id="aspersores">
                                                                <span></span>Aspersores</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="cortafuegos"
                                                                       value="cortafuegos" id="cortafuegos">
                                                                <span></span>Puerta cortafuegos</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="luces" value="luces_salida"
                                                                       id="luces_salida">
                                                                <span></span>Luces de salida</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="conserje" value="conserje"
                                                                       id="conserje">
                                                                <span></span>Conserje/Portero</label>
                                                        </div>
                                                    </div>
                                                    <!--checkbox caracteristicas terreno-->
                                                    <div id="car_land" style="display: none;" class="form-group">
                                                        <label>Caracteristicas Terreno</label>
                                                        <div class="checkbox-list">
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="agua" value="agua"
                                                                       id="agua">
                                                                <span></span>Agua</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="luz" value="luz" id="luz">
                                                                <span></span>Luz</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="alcantarillado"
                                                                       value="alcantarillado" id="alcantarillado">
                                                                <span></span>Alcantarillado</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="gas" value="gas" id="gas">
                                                                <span></span>Gas natural</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="alumbrado"
                                                                       value="alumbrado" id="alumbrado">
                                                                <span></span>Alumbrado público</label>
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="aceras" value="aceras"
                                                                       id="aceras">
                                                                <span></span>Aceras</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--documentacion-->
                                            <div class="tab-pane fade" id="doc" role="tabpanel"
                                                 aria-labelledby="doc-tab">
                                                <div class="row">
                                                    <label class="col-xl-3"></label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <h5 class="font-weight-bold mb-20 mt-15 text-center">
                                                            Documentación de la
                                                            propiedad</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Body-->
                                            <div class="card-footer text-center pt-20">
                                                @if($edit_active )
                                                    <button type="submit" class="btn btn-success mr-2">Guardar
                                                    </button>
                                                    <!--id2 = activa -->
                                                    @if($property->historical->last()->status->id == "4" )
                                                        <button form="form_activate_property" type="submit"
                                                                class="btn btn-secondary">Activar propiedad
                                                        </button>
                                                    @elseif($property->historical->last()->status->id == "2" )
                                                        <button type="button" class="btn btn-secondary"
                                                                data-toggle="modal" data-target="#active_modal">
                                                            Desactivar propiedad
                                                        </button>
                                                    @endif
                                                @endif

                                            <!-- en caso de ser admin podemos validar o cancelar-->
                                                @if(Auth::user()->type == "admin" )
                                                    @if($property->historical->last()->status->id != "2")
                                                        <button form="form_validate_property" type="submit"
                                                                class="btn btn-secondary">Validar propiedad
                                                        </button>
                                                    @endif
                                                    @if($property->historical->last()->status->id != "3")
                                                        <button type="button" id="cancel_button" class="btn btn-danger"
                                                                data-toggle="modal" data-target="#cancel_modal">Cancelar
                                                            propiedad
                                                        </button>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>

                                </form>
                                <!--end::Form-->
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
        </div>
        @endsection
        @section('js')
            <script>
                function show_modal() {

                }

                //objeto auxiliar para cumplir con la estructura de un evento
                var aux_object = {
                    target: {
                        value: "{{$property->property_type}}"
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

                    document.getElementById("type-tab").style.display = "block";
                    document.getElementById("caracteristicas_flat").style.display = "none";
                    document.getElementById("caracteristicas_home").style.display = "none";
                    document.getElementById("caracteristicas_country").style.display = "none";
                    document.getElementById("caracteristicas_office").style.display = "none";
                    document.getElementById("caracteristicas_land").style.display = "none";

                    switch (event.target.value) {
                        case "Flat":
                            document.getElementById("type-tab").innerText = "Piso";
                            document.getElementById("caracteristicas_flat").style.display = "block";
                            break;
                        case "Home/Chalet":
                            document.getElementById("type-tab").innerText = "Casa/Home";
                            document.getElementById("caracteristicas_home").style.display = "block";
                            break;
                        case "Country home":
                            document.getElementById("type-tab").innerText = "Country";
                            document.getElementById("caracteristicas_country").style.display = "block";
                            break;
                        case "Office":
                            document.getElementById("type-tab").innerText = "Office";
                            document.getElementById("caracteristicas_office").style.display = "block";
                            document.getElementById("seguridad_ofi").style.display = "block";
                            document.getElementById("car_property").style.display = "none";
                            document.getElementById("car_ofi").style.display = "block";
                            break;
                        case "Land":
                            document.getElementById("type-tab").innerText = "Land";
                            document.getElementById("car_land").style.display = "block";
                            document.getElementById("car_building").style.display = "none";
                            document.getElementById("car_property").style.display = "none";
                            document.getElementById("caracteristicas_land").style.display = "block";
                            document.getElementById("community_fees").style.display = "none";
                            break;
                        case "Storage room":
                            document.getElementById("type-tab").innerText = "Storage room";
                            document.getElementById("caracteristicas_home").style.display = "block";
                            document.getElementById("type-tab").href = "#caracteristicas_storage";
                            break;
                        case "Comercial Property":
                            document.getElementById("type-tab").innerText = "Comercial";
                            document.getElementById("caracteristicas_home").style.display = "block";
                            document.getElementById("type-tab").href = "#caracteristicas_comercial";

                            break;
                        case "Garage":
                            document.getElementById("type-tab").innerText = "Garage";
                            document.getElementById("caracteristicas_home").style.display = "block";
                            document.getElementById("type-tab").href = "#caracteristicas_garage";

                            break;
                        default:
                            document.getElementById("type-tab").innerText = "Flat";
                            document.getElementById("caracteristicas_flat").style.display = "block";
                            document.getElementById("type-tab").href = "#caracteristicas_flat";

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

                    activar_checkbox("{{$property_subtype->characteristics}}".split(";"))
                    activar_checkbox("{{$property_subtype->building_characteristics}}".split(";"))
                    activar_checkbox("{{$property_subtype->security}}".split(";"))
                    activar_checkbox("{{$property_subtype->office_characteristics}}".split(";"))

                    //elevator, energetic, active
                    if ("{{$property_subtype->energetic_certification}}" == true)
                        document.getElementById("check_energetic_certification_general").checked = "checked";
                    if ("{{$property_subtype->energetic_certification}}" == true)
                        document.getElementById("energetic_certification_office").checked = "checked";

                    if ("{{$property_subtype->elevator}}")
                        document.getElementById("check_elevator").checked = "checked";


                }

                function disable_edit() {
                    var elements = document.getElementById("form_edit_property").elements;
                    for (var i = 0, len = elements.length; i < len; ++i) {
                        elements[i].disabled = true;
                    }
                    document.getElementById("cancel_button").disabled = false;
                }

                function enable_edit() {
                    var elements = document.getElementById("form_edit_property").elements;
                    for (var i = 0, len = elements.length; i < len; ++i) {
                        elements[i].disabled = false;

                    }
                }

                document.getElementById("property_type").addEventListener('change', selector_vista);

                window.onload = function () {
                    document.getElementById("property_type").value = "{{$property->property_type}}";
                    //simulamos el evento cuando leemos el tipo de propiedad
                    selector_vista(aux_object);
                    activar_checkboxes()

                    if ("{{$edit_active}}" == false)
                        disable_edit();
                };
            </script>
@endsection
