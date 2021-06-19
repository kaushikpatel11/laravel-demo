@extends('template.template')

@section('top_menu')

@endsection

@section('content')

    <div>
        <div>
            <div>
                <div>
                    <!--begin::Card-->
                    <div>
                        <div class="card">
                            @if (isset($edit_active) && $edit_active)
                                <div class="card-header">
                                    <h1>@lang('Mis datos')</h1>
                                </div>
                            @else
                                <div class="card-header">
                                    <h1>@lang('Datos del propietario')</h1>
                                </div>

                            @endif
                            <div class="card card-custom card-stretch ">
                                <!--begin::Header-->

                                <!--end::Header-->
                                <!--begin::Form-->
                                <form id="form_edit_owner" class="form" method="post" action="/owner">
                                @csrf
                                @method('PUT')

                                <!--begin::Body-->
                                    <div class="card-body">

                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                                   role="tab" aria-controls="home" aria-selected="true">@lang('Datos')</a>
                                            </li>
                                            @if(Auth::user()->type == 'admin')
                                                <li class="nav-item">
                                                    <a class="nav-link" id="properties-tab" data-toggle="tab"
                                                       href="#properties" role="tab" onclick="shortDatatable()"
                                                       aria-controls="zone"
                                                       aria-selected="false">@lang('Propiedades')</a>
                                                </li>
                                            @endif
                                        </ul>

                                        <div class="tab-content" id="myTabContent">

                                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                                 aria-labelledby="home-tab">

                                                <div class="row">
                                                    <label class="col-xl-3"></label>
                                                    <div class="col-lg-12 col-xl-12">
                                                        <h3 class="font-weight-bold mb-20 mt-15 text-center">@lang('Datos')</h3>
                                                    </div>
                                                </div>
                                                <div class="form-group row justify-content-center">
                                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">
                                                        @if($owner->type=="particular") @lang('Nombre')
                                                        @elseif($owner->type=="promotor") 
                                                            @lang('Razón social')
                                                        @else
                                                            @lang('Nombre Comercial')
                                                        @endif
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input class="form-control form-control-lg form-control-solid"
                                                               type="text" name="name" value="{{$owner->name}}"
                                                               placeholder="@lang('Nombre')" minlength="3" maxlength="255"
                                                               required>
                                                    </div>

                                                </div>


                                                <div class="form-group row justify-content-center">
                                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">

                                                        @if($owner->type=="particular") @lang('Apellidos')
                                                        @else @lang('Persona de contacto')
                                                        @endif
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input class="form-control form-control-lg form-control-solid"
                                                               type="text" name="surname" value="{{$owner->surname}}"
                                                               placeholder="@lang('Apellidos')" minlength="3" maxlength="255"
                                                               required>
                                                    </div>
                                                </div>
                                                <div class="form-group row justify-content-center">
                                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">
                                 
                                                        @if($owner->type=="promotor") 
                                                            DNI/CIF
                                                        @else
                                                            @lang('DNI/NIE/PASAPORTE')
                                                        @endif
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input class="form-control form-control-lg form-control-solid"
                                                               type="text" name="vat_number"
                                                               value="{{$owner->vat_number}}" placeholder="@lang('Nif')"
                                                               minlength="9" maxlength="9" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row justify-content-center">
                                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('email')</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="la la-at"></i>
                                                            </span>
                                                            </div>
                                                            <input type="text"
                                                                   class="form-control form-control-lg form-control-solid"
                                                                   value="{{$user->email}}" name="email"
                                                                   placeholder="@lang('email')" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row justify-content-center">
                                                    <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                                           for="exampleSelect1">@lang('Tipo')</label>
                                                    <div class="col-lg-9 col-xl-6">

                                                        <select class="form-control form-control-solid "
                                                                id="exampleSelect1" name="type" value="{{$owner->type}}"
                                                                disabled>
                                                            @if($owner->type=='agencia')
                                                                <option value="agencia" selected>@lang('Agencia')</option>
                                                            @else
                                                                <option value="agencia">@lang('Agencia')</option>
                                                            @endif
                                                            @if($owner->type=='particular')
                                                                <option value="particular" selected>@lang('Particular')</option>
                                                            @else
                                                                <option value="particular">@lang('Particular')</option>
                                                            @endif
                                                            @if($owner->type=='promotor')
                                                                <option value="promotor" selected>@lang('Promotor')</option>
                                                            @else
                                                                <option value="promotor">@lang('Promotor')</option>
                                                            @endif
                                                            @if($owner->type=='agente')
                                                                <option value="agente" selected>@lang('Agente exclusivista')
                                                                </option>
                                                            @else
                                                                <option value="agente">@lang('Agente exclusivista')</option>
                                                            @endif
                                                        </select>
                                                    </div>

                                                </div>

                                                <div class="form-group row justify-content-center">
                                                    <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                                           for="exampleSelect1">@lang('Idioma')</label>
                                                    <div class="col-lg-9 col-xl-6">

                                                        <select class="form-control form-control-solid "
                                                                id="exampleSelect1" name="language" value="{{$owner->type}}" >
                                                                <option value="es" {{$owner->language=='es' ? 'selected' : ''}}>@lang('Español')</option>                                                           
                                                                <option value="en" {{$owner->language=='en' ? 'selected' : ''}}>@lang('Inglés')</option>                                                           
                                                                <option value="fr" {{$owner->language=='fr' ? 'selected' : ''}}>@lang('Francés')</option>                                                           
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="form-group row justify-content-center">
                                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Teléfono de contacto')</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="la la-phone"></i>
                                                            </span>
                                                            </div>
                                                            <input type="text"
                                                                   class="form-control form-control-lg form-control-solid"
                                                                   value="{{$owner->phone_1}}" name="phone_1"
                                                                   placeholder="@lang('Teléfono')" minlength="9" maxlength="12"
                                                                   required>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                @if($owner->type=="promotor")
                                    
                                                <div class="form-group row" style="justify-content: center;margin-right: 0em">
                                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Horario Oficina de Ventas/Piloto')</label>

                                                    <label class=" col-lg-1 col-xl-1 text-center">@lang('Desde')</label>
                                                    <input class="form-control form-control-lg form-control-solid col-xl-2 col-lg-2" type="text"
                                                        placeholder="09:00"
                                                        name="open" id="open"
                                                        value="{{@old('open') ?? $owner->open }}"
                                                        >

                                                    <label class="col-xl-1 col-lg-1 text-center">@lang('Hasta')</label>
                                                    <input class="col-xl-2 col-lg-2 form-control form-control-lg form-control-solid" type="text"
                                                    placeholder="17:00" name="close" id="close"
                                                    value="{{@old('close') ?? $owner->close }}"
                                                    
                                                    >
                                                </div>
                                                <div class="form-group row  justify-content-center">
                                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Otros teléfonos de contacto')</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="la la-phone"></i>
                                                                </span>
                                                            </div>
                                                            
                                                            <textarea class="form-control" id="promotion_web" 
                                                            name="phones"  rows="2">{{@old('phones')??$owner->phones}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row  justify-content-center">
                                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Observaciones')</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            
                                                            
                                                            <textarea class="form-control" id="remarks" 
                                                            name="remarks"  rows="2">{{@old('remarks')??$owner->remarks}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                @else
                                                <div class="form-group row justify-content-center">
                                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Teléfono
                                                        adicional')</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="la la-phone"></i>
                                                            </span>
                                                            </div>
                                                            <input type="text"
                                                                   class="form-control form-control-lg form-control-solid"
                                                                   value="{{@old('phone_2')??$owner->phone_2}}" name="phone_2"
                                                                   placeholder="@lang('Teléfono adicional')" minlength="9"
                                                                   maxlength="12" >
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif

                                                <div class="form-group row  justify-content-center">
                                                    <label
                                                        class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Dirección')</label>
                                                    <div class="col-lg-9 col-xl-6">

                                                        <textarea required
                                                                  class="form-control  form-control-lg form-control-solid"
                                                                  minlength="9" name="address" rows="3"
                                                                  placeholder="@lang('Dirección')">{{$owner->address}}</textarea>
                                                    </div>
                                                </div>


                                            </div>

                                            @if(Auth::user()->type == 'admin')

                                                <div class="tab-pane fade" id="properties" role="tabpanel"
                                                     aria-labelledby="properties-tab">
                                                    <div class="mb-7 mt-7">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-12">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-6 my-2 my-md-0 col-sm-12">
                                                                        <div class="input-icon">
                                                                            <input type="text" class="form-control"
                                                                                   placeholder="@lang('Buscar...')"
                                                                                   id="kt_datatable_search_query"/>
                                                                            <span>
                                                                                     <i class="flaticon2-search-1 text-muted"></i>
                                                                             </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-sm-6 col-6">
                                                                        <a href="#"
                                                                           class="btn btn-light-primary px-6 font-weight-bold">@lang('Buscar')</a>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <!--begin::Button-->

                                                        </div>
                                                    </div>

                                                    <div class="datatable datatable-bordered datatable-head-custom"
                                                         id="kt_datatable"
                                                         @if(DevideDetect::isIOS()) style="overflow: auto" @endif>

                                                        <table
                                                            class="datatable  datatable-bordered datatable-head-custom"
                                                            id="kt_datatable">
                                                            <thead class="datatable-head">

                                                            <tr class="datatable-row">
                                                                <th data-field="Id"
                                                                    class="datatable-cell datatable-cell-sort">
                                                                    <span>@lang('Id')</span>
                                                                </th>
                                                                <th data-field="Status"
                                                                    class="datatable-cell datatable-cell-sort"><span>@lang('Estado')</span>
                                                                </th>

                                                                <th data-field="Property type"
                                                                    class="datatable-cell datatable-cell-sort"><span>@lang('Tipo de propiedad')</span>
                                                                </th>

                                                                <th data-field="Price"
                                                                    class="datatable-cell datatable-cell-sort"><span>@lang('Precio')</span>
                                                                </th>
                                                                <th data-field="Agency Commisions"
                                                                    class="datatable-cell datatable-cell-sort"><span>@lang('Comisión agencia')</span>
                                                                </th>
                                                                <th data-field="PLF Commisions"
                                                                    class="datatable-cell datatable-cell-sort"><span>@lang('Comisión calculada')</span>
                                                                </th>
                                                                <th data-field="Actions"
                                                                    class="datatable-cell datatable-cell-sort"><span>@lang('Acciones')</span>
                                                                </th>
                                                            </tr>

                                                            </thead>
                                                            <tbody class="datatable-body" style="">
                                                            @foreach ($properties as $property)
                                                                <!--data-row="0" -->

                                                                <tr class="datatable-row" style="left: 0px;">

                                                                    <td data-field="Id" class="datatable-cell">
                                                                        <span>{{$property->id}}</span></td>
                                                                    <td data-field="Status"
                                                                        class="datatable-cell"><span> @if(($property->historical->last()->status->name) == 'Cancelada')
                                                                                <span id="id_status"
                                                                                      class="label font-weight-bold label-lg  label-light-info label-inline bg-danger"
                                                                                      style="color: black">
                                                                                    @elseif(($property->historical->last()->status->name) == 'Activa')
                                                                                        <span id="id_status"
                                                                                              class="label font-weight-bold label-lg  label-light-info label-inline bg-success"
                                                                                              style="color: black">
                                                                                        @elseif(($property->historical->last()->status->name) == 'Sin revisar')
                                                                                                <span id="id_status"
                                                                                                      class="label font-weight-bold label-lg  label-inline bg-primary"
                                                                                                      style="color: black">
                                                                                            @elseif(($property->historical->last()->status->name) == 'Desactivada')
                                                                                                        <span
                                                                                                            id="id_status"
                                                                                                            class="label font-weight-bold label-lg  label-light-info label-inline bg-muted"
                                                                                                            style="color: black">
                                                                                                @elseif(($property->historical->last()->status->name) == 'En proceso inmozon')
                                                                                                                <span
                                                                                                                    id="id_status"
                                                                                                                    class="label font-weight-bold label-lg  label-inline bg-primary"
                                                                                                                    style="color: black ;height: 4em">
                                                                                                    @elseif(($property->historical->last()->status->name) == 'En proceso propietario')
                                                                                                                        <span
                                                                                                                            id="id_status"
                                                                                                                            class="label font-weight-bold label-lg   label-inline bg-primary"
                                                                                                                            style="color: black; height: 4em">
                                                                                                        @endif{{$property->historical->last()->status->name}}</span>
                                                                                                    </span></td>


                                                                    <td data-field="Property type"
                                                                        class="datatable-cell">
                                                                        <span>{{ App\Properties::translateModelName( $property->propertyable_type)}}</span>
                                                                    </td>

                                                                    <td data-field="Price" class="datatable-cell"><span>{{$property->getPrice()}}</span>
                                                                    </td>
                                                                    <td data-field="Agency Commisions"
                                                                        class="datatable-cell"><span>{{$property->getCommission()}}</span>
                                                                    </td>
                                                                    <td data-field="PLF Commisions"
                                                                        class="datatable-cell"><span>{{$property->getCalculatedCommision()}}</span>
                                                                    </td>
                                                                    <td data-field="Actions"
                                                                        class="datatable-cell"><span>
                                                                                <a href="/admin/properties/{{$property->id}}"
                                                                                   class="btn btn-sm btn-clean btn-icon mr-2"> <span
                                                                                        class="svg-icon svg-icon-md">
                                                                                        <svg
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                            width="24px" height="24px"
                                                                                            viewBox="0 0 24 24"
                                                                                            version="1.1">
                                                                                            <g stroke="none"
                                                                                               stroke-width="1"
                                                                                               fill="none"
                                                                                               fill-rule="evenodd">
                                                                                                <rect x="0" y="0"
                                                                                                      width="24"
                                                                                                      height="24"></rect>
                                                                                                <path
                                                                                                    d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                                                                                    fill="#000000"
                                                                                                    fill-rule="nonzero"
                                                                                                    transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path>
                                                                                                <rect fill="#000000"
                                                                                                      opacity="0.3"
                                                                                                      x="5" y="20"
                                                                                                      width="15"
                                                                                                      height="2"
                                                                                                      rx="1"></rect>
                                                                                            </g>
                                                                                        </svg> </span> </a>
                                                                            </span>
                                                                    </td>

                                                                </tr>
                                                            @endforeach


                                                            </tbody>
                                                        </table>

                                                    </div>
                                                    <!--end: Datatable-->
                                                </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            @endif
            <!--end::Body-->
                <div class="card-footer text-center">
                    <div class="card-toolbar">
                        @if (Auth::user()->type == "owner" && $edit_active)

                            <button type="submit" class="btn btn-success mr-2">@lang('Guardar cambios')</button>
                            <button type="reset" class="btn btn-secondary">@lang('Cancelar')</button>
                        @endif
                    </div>
                </div>

            </div>
        </div>
        <!--end::Form-->
    </div>





@endsection

@section('js')
    <script>
        function disable_edit() {
            var elements = document.getElementById("form_edit_owner").elements;
            for (var i = 0, len = elements.length; i < len; ++i) {
                try {

                    elements[i].disabled = true;
                } catch (error) {

                }

            }


        }

        window.onload = function () {

            @if(false == $edit_active)
            disable_edit();
            @endif

        };
    </script>

    <script>
        "use strict";
        // Class definition

        var datatable;

        var KTDatatableHtmlTableDemo = function () {
            // Private functions

            // demo initializer
            var demo = function () {

                datatable = $('#kt_datatable').KTDatatable({
                    data: {
                        saveState: {
                            cookie: false
                        },
                    },


                    search: {
                        input: $('#kt_datatable_search_query'),
                        key: 'generalSearch'
                    },
                    columns: [

                        {
                            field: 'Id',
                            width: 50,
                            autoHide: false,
                            type: 'number',
                        },
                        {
                            field: 'Actions',
                            width: 80,
                            autoHide: false,
                        },
                    ],
                    translate: {
                        records: {
                            processing: '@json(__('Por favor espere...'))',
                            noRecords: '@json(__('No se han encontrado registros'))',
                        },
                        toolbar: {
                            pagination: {
                                items: {
                                    toolbar: {
                                        pagination: {
                                            items: {
                                                items: {
                                                    default: {
                                                        first: '@json(__('first'))',
                                                        prev: '@json(__('prev'))',
                                                        next: '@json(__('next'))',
                                                        last: '@json(__('last'))',
                                                        more: '@json(__('more'))',
                                                        input: '@json(__('input'))',
                                                        select: '@json(__('select'))',
                                                        all: '@json(__('all'))',
                                                    },
                                                    info: '@json(__('Mostrando'))',
                                                },
                                            },
                                        },
                                    },
                                    info: '@json(__('Mostrando'))',
                                },
                            },
                        },
                    },
                });


                $('#kt_datatable_search_status').on('change', function () {
                    datatable.search($(this).val().toLowerCase(), 'Status');
                });

                $('#kt_datatable_search_type').on('change', function () {
                    datatable.search($(this).val().toLowerCase(), 'Type');
                });

                $('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();

            };

            return {
                // Public functions
                init: function () {
                    // init dmeo
                    demo();
                },
            };
        }();


        jQuery(document).ready(function () {
            KTDatatableHtmlTableDemo.init();
        });

        function shortDatatable() {

            try {
                datatable.sort('Date', 'desc');

            } catch (error) {

            }
        }
    </script>
@endsection
