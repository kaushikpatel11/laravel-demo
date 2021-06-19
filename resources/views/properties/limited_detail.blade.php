@extends('template.template')

@section('top_menu')
<div class="d-flex align-items-center flex-wrap mr-2">
    <!--begin::Page Title-->
    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">@lang('Modificar propiedad')</h5>
    <!--end::Page Title-->

</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="flex-row-fluid ml-lg-12">
                <!--begin::Card-->
                <div class="card card-custom card-stretch">
                    <!-- Modal desactivar una propiedad-->
                    <div class="modal fade" id="active_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">@lang('Explique el motivo')</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i aria-hidden="true" class="ki ki-close"></i>
                                    </button>
                                </div>
                                <!--begin::Form-->
                                <form method="post" id="modal_form_edit_property" action="/owner/properties/{{$property->id}}/deactivate">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">@lang('Motivo')</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <textarea class="form-control" id="exampleTextarea" name="reason" rows="6"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">@lang('Cerrar')</button>
                                        <button type="submit" class="btn btn-primary font-weight-bold">@lang('Guardar cambios')</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal cancelar una propiedad-->
                    <div class="modal fade" id="cancel_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">@lang('Explique el motivo')</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i aria-hidden="true" class="ki ki-close"></i>
                                    </button>
                                </div>
                                <!--begin::Form-->
                                <form method="post" id="form_cancel_property" action="/admin/properties/{{$property->id}}/cancel">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-right">@lang('Motivo')</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <textarea class="form-control" id="exampleTextarea" name="reason" rows="6"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">@lang('Cerrar')</button>
                                        <button type="submit" class="btn btn-primary font-weight-bold">>@lang('Guardar cambios')</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form method="post" id="form_edit_property" action="/owner/properties/{{$property->id}}">
                        @method('PUT')
                        @csrf
                        <!--begin::Body-->
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">@lang('General')</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="imagenes-tab" data-toggle="tab" href="#imagenes" role="tab" aria-controls="profile" aria-selected="false">@lang('Imágenes')</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="type-tab" style="display: none;" data-toggle="tab" href="#caracteristicas" role="tab" aria-controls="contact" aria-selected="false">@lang('Piso')</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="char-tab" data-toggle="tab" href="#char" role="tab" aria-controls="contact" aria-selected="false">@lang('Características')</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="char-tab" data-toggle="tab" href="#doc" role="tab" aria-controls="contact" aria-selected="false">@lang('Documentación')</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <!--propiedades generales-->
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row">
                                        <label class="col-xl-3"></label>
                                        <div class="col-lg-12 col-xl-12">
                                            <h5 class="font-weight-bold mb-6">@lang('Datos generales de la propiedad # '){{$property->id}}</h5>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-right" for="exampleSelect1">@lang('Tipo de propiedad')</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <select class="form-control form-control-solid" name="property_type" id="property_type" value="{{$property->type}}">
                                                <option value="" selected disabled hidden>@lang('Seleccione')</option>
                                                <option value="Flat">@lang('Piso')</option>
                                                <option value="Home/Chalet">@lang('Casa o chalet')</option>
                                                <option value="Country home">@lang('Casa de campo')</option>
                                                <option value="Office">@lang('Oficina')</option>
                                                <option value="Land">@lang('Terreno')</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-right">@lang('Precio')</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input autocomplete="nope" class="form-control form-control-lg form-control-solid" type="text" name="price" value="{{$property->price}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-right">@lang('Comisión de agencia')</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input autocomplete="nope" class="form-control form-control-lg form-control-solid" type="text" name="agency_commissions" value="{{$property->agency_commissions}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-right">@lang('Comisión PLF')</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input autocomplete="nope" class="form-control form-control-lg form-control-solid" type="text" name="plf_commissions" value="{{$property->plf_commissions}}">
                                        </div>
                                    </div>
                                    <div id="community_fees" class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-right">@lang('Gastos de comunidad')</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input autocomplete="nope" class="form-control form-control-lg form-control-solid" type="text" name="community_fees" value="{{$property_subtype->community_fees}}">
                                        </div>
                                    </div>
                                    <div id="status" class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-right">@lang('Estado:')</label>
                                        @if($property->historical->last()->status->id == 2)
                                        <label class="col-xl-3 col-lg-3 col-form-label text-right text-success">{{$property->historical->last()->status->name}}</label>
                                        @else
                                        <label class="col-xl-3 col-lg-3 col-form-label text-right text-danger">{{$property->historical->last()->status->name}}</label>
                                        @endif
                                    </div>



                                    <div class="form-group mb-1">
                                        <label for="exampleTextarea">@lang('Descripción')</label>
                                        <textarea class="form-control" id="exampleTextarea" name="description" rows="6">{{$property->description}}</textarea>
                                    </div>





                                </div>
                                <!--imagenes-->
                                <div class="tab-pane fade" id="imagenes" role="tabpanel" aria-labelledby="imagenes-tab">
                                    <div class="row">
                                        <label class="col-xl-3"></label>
                                        <div class="col-lg-12 col-xl-12">
                                            <h5 class="font-weight-bold mb-6">@lang('Imágenes de la propiedad')</h5>
                                        </div>
                                    </div>
                                </div>

                                <!--end::Body-->
                                <div class="card-footer">
                                    @if($edit_active )
                                    <button type="submit" class="btn btn-success mr-2">@lang('Guardar cambios')</button>
                                    <!--id2 = activa -->
                                    @if($property->historical->last()->status->id == "4" )
                                    <button form="form_activate_property" type="submit" class="btn btn-secondary">@lang('Activar propiedad')</button>
                                    @elseif($property->historical->last()->status->id == "2" )
                                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#active_modal">@lang('Desactivar propiedad')</button>
                                    @endif
                                    @endif

                                    <!-- en caso de ser admin podemos validar o cancelar-->
                                    @if(Auth::user()->type == "admin")
                                    @if($property->historical->last()->status->id != "2")
                                    <button form="form_validate_property" type="submit" class="btn btn-secondary">@lang('Validar propiedad')</button>
                                    @endif
                                    @if($property->historical->last()->status->id != "3")
                                    <button type="button" id="cancel_button" class="btn btn-danger" data-toggle="modal" data-target="#cancel_modal">@lang('Cancelar propiedad')</button>
                                    @endif
                                    @endif
                                </div>
                            </div>

                    </form>
                    <!--end::Form-->
                    <!--Form para enviar un post a la ruta, tiene que estar fuera del form general-->
                    <form method="post" id="form_activate_property" action="/owner/properties/{{$property->id}}/activate">
                        @csrf
                    </form>
                    <!--Form para enviar un post y validar una propiedad, tiene que estar fuera del form general-->
                    <form method="post" id="form_validate_property" action="/admin/properties/{{$property->id}}/validate">
                        @csrf
                    </form>
                    <!--Form para enviar un post y cancelar una propiedad, tiene que estar fuera del form general-->
                    <form method="post" id="form_cancel_property" action="/admin/properties/{{$property->id}}/cancel">
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

    var selector_vista = function(event) {
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

        try {
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
        } catch (error) {
            console.log(error)
        }


    }

    function disable_edit() {
        var elements = document.getElementById("form_edit_property").elements;
        for (var i = 0, len = elements.length; i < len; ++i) {
            try {
                elements[i].disabled = true;
                console.log(elements[id].id+ "desactivado")
            } catch (error) {

            }
        }
        var cancel_button = document.getElementById("cancel_button")
        //si no es null
        if(cancel_button)
            cancel_button.disabled = false;

    }

    function enable_edit() {
        var elements = document.getElementById("form_edit_property").elements;
        for (var i = 0, len = elements.length; i < len; ++i) {
            elements[i].disabled = false;

        }
    }

    document.getElementById("property_type").addEventListener('change', selector_vista);

    window.onload = function() {
        document.getElementById("property_type").value = "{{$property->property_type}}";
        //simulamos el evento cuando leemos el tipo de propiedad
        selector_vista(aux_object);
        if ("{{$edit_active}}" == false){
            disable_edit();
        }
       activar_checkboxes()


    };
</script>
@endsection
