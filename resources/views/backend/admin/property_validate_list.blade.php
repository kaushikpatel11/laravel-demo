@extends('template.template')

@section('top_menu')

@endsection

@section('content')
    <div>
        <div class="card">
            <div class="card-header">
                @if (Request::is('admin/to_validate'))

                <h1>@lang('Propiedades sin validar')</h1>
                @else
                <h1>@lang('Propiedades pendientes de revision')</h1>
                @endif

            </div>

            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-body">
                    <!--begin: Search Form-->
                    <!--begin::Search Form-->
                    <div class="mb-7">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="row align-items-center">
                                    <div class="col-md-6 my-2 my-md-0 col-sm-12">
                                        <div class="input-icon">
                                            <input type="text" class="form-control" placeholder="@lang('Buscar...')"
                                                   id="kt_datatable_search_query"/>
                                            <span>
                                            <i class="flaticon2-search-1 text-muted"></i>
                                        </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-6">
                                        <a href="#" class="btn btn-light-primary px-6 font-weight-bold">@lang('Buscar')</a>
                                    </div>

                                </div>
                            </div>
                            <!--begin::Button-->

                        </div>
                    </div>
                    <!--end::Search Form-->
                    <!--end: Search Form-->
                    <!--begin: Datatable-->
                    <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable" @if(DevideDetect::isIOS()) style="overflow: auto" @endif>

                        <table class="datatable  datatable-bordered datatable-head-custom" id="kt_datatable">
                            <thead class="datatable-head">

                            <tr class="datatable-row">

                                <th data-field="Id" class="datatable-cell datatable-cell-sort"><span
                                        style="width: 115px;">Id</span>
                                </th>
                                <th data-field="Ref" class="datatable-cell datatable-cell-sort"><span
                                        style="width: 115px;">@lang('Referencia')</span>
                                </th>
                                <th data-field="Activo" class="datatable-cell datatable-cell-sort"><span
                                        style="width: 115px;">@lang('Estado')</span>
                                </th>

                                <th data-field="Property type" class="datatable-cell datatable-cell-sort"><span
                                        style="width: 115px;">@lang('Tipo de propiedad')</span>
                                </th>
                                <th data-field="Price" class="datatable-cell datatable-cell-sort"><span
                                        style="width: 115px;">@lang('Precio')</span>
                                </th>
                                <th data-field="Agency Commisions" data-autohide-disabled="false"
                                    class="datatable-cell datatable-cell-sort"><span style="width: 115px;">@lang('Comisión agencia')</span>
                                </th>
                                <th data-field="Direccion" class="datatable-cell datatable-cell-sort"><span style="width: 115px;">@lang('Dirección')</span></th>
                                <th data-field="Localidad" class="datatable-cell datatable-cell-sort"><span style="width: 115px;">@lang('Localidad')</span></th>
                                <th data-field="Provincia" class="datatable-cell datatable-cell-sort"><span style="width: 115px;">@lang('Provincia')</span></th>
                                <th data-field="Actions" data-autohide-disabled="false"
                                    class="datatable-cell datatable-cell-sort"><span
                                        style="width: 115px;">@lang('Acciones')</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="datatable-body" style="">
                            @foreach ($properties as $property)
                                <!--data-row="0" -->

                                <tr class="datatable-row" style="left: 0px;">

                                    <td data-field="Id" class="datatable-cell"><span
                                            style="width: 50px;">{{$property->property_id}}</span></td>
                                    <td data-field="Ref" class="datatable-cell"><span
                                            style="width: 50px;">{{$property->ref??'Sin referencia'}}</span></td>
                                    <td data-field="Activo" class="datatable-cell"><span class="text-danger "
                                                                                         style="width: 60px;">{{$property->status}}</span>
                                    </td>
                                    <td data-field="Property type" aria-label="6" class="datatable-cell"><span
                                            style="width: 110px;"><span
                                                style="width: 110px;">{{ App\Properties::translateModelName( $property->propertyable_type)}}</span></span>
                                    </td>
                                    <td data-field="Price" aria-label="6" class="datatable-cell"><span
                                            style="width: 110px;"><span
                                            >{{number_format($property->price, 2, ',', '.')}} €</span></span>
                                    </td>
                                    <td data-field="Agency Commisions" aria-label="6" class="datatable-cell"><span
                                            style="width: 110px;"><span
                                            >{{($property->agency_commissions!=0 && $property->operation=='sell') ? $property->agency_commissions.'%' : 'Ver detalle'}}</span></span>
                                    </td>
                                    <td data-field="Direccion" class="datatable-cell"><span style="width: 50px;">{{$property->street}}</span></td>
                                <td data-field="Localidad" class="datatable-cell"><span style="width: 50px;">{{$property->city_name}}</span></td>
                                <td data-field="Provincia" class="datatable-cell"><span style="width: 50px;">{{$property->county_name}}</span></td>
                                    <td data-field="Actions" aria-label="null" class="datatable-cell"><span
                                            style=" width: 150px;">
                                              <a href="/admin/properties/{{$property->property_id}}"
                                                 class="btn btn-sm btn-clean btn-icon mr-2"
                                                 title="Validar"> <span
                                                      class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-08-03-114926/theme/html/demo1/dist/../src/media/svg/icons/Navigation/Double-check.svg--><svg
                                                          xmlns="http://www.w3.org/2000/svg"
                                                          xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                          height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path
            d="M9.26193932,16.6476484 C8.90425297,17.0684559 8.27315905,17.1196257 7.85235158,16.7619393 C7.43154411,16.404253 7.38037434,15.773159 7.73806068,15.3523516 L16.2380607,5.35235158 C16.6013618,4.92493855 17.2451015,4.87991302 17.6643638,5.25259068 L22.1643638,9.25259068 C22.5771466,9.6195087 22.6143273,10.2515811 22.2474093,10.6643638 C21.8804913,11.0771466 21.2484189,11.1143273 20.8356362,10.7474093 L17.0997854,7.42665306 L9.26193932,16.6476484 Z"
            fill="#000000" fill-rule="nonzero" opacity="0.3"
            transform="translate(14.999995, 11.000002) rotate(-180.000000) translate(-14.999995, -11.000002) "/>
        <path
            d="M4.26193932,17.6476484 C3.90425297,18.0684559 3.27315905,18.1196257 2.85235158,17.7619393 C2.43154411,17.404253 2.38037434,16.773159 2.73806068,16.3523516 L11.2380607,6.35235158 C11.6013618,5.92493855 12.2451015,5.87991302 12.6643638,6.25259068 L17.1643638,10.2525907 C17.5771466,10.6195087 17.6143273,11.2515811 17.2474093,11.6643638 C16.8804913,12.0771466 16.2484189,12.1143273 15.8356362,11.7474093 L12.0997854,8.42665306 L4.26193932,17.6476484 Z"
            fill="#000000" fill-rule="nonzero"
            transform="translate(9.999995, 12.000002) rotate(-180.000000) translate(-9.999995, -12.000002) "/>
    </g>
</svg><!--end::Svg Icon--></span> </a>

                                </span>
                                    </td>

                                </tr>
                            @endforeach


                            </tbody>
                        </table>

                    </div>
                    <!--end: Datatable-->
                </div>
            </div>

        </div>
        @endsection

        @section('js')

            <script>

                "use strict";
                // Class definition

                var KTDatatableHtmlTableDemo = function () {
                    // Private functions

                    // demo initializer
                    var demo = function () {

                        var datatable = $('#kt_datatable').KTDatatable({
                            data: {
                                saveState: {cookie: false},
                            },


                            search: {
                                input: $('#kt_datatable_search_query'),
                                key: 'generalSearch'
                            },
                            columns: [

                                {
                                    field: 'Id',
                                    width: 100,
                                    autoHide: false,
                                    type: 'number',
                                },
                                {
                                    field: 'Status',
                                    autoHide: false,
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

            </script>

@endsection
