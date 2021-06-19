@extends('template.template')

@section('top_menu')

@endsection

@section('content')

    <div>
        <div class="card">
            <div class="card-header">
                <h1>@lang('Propiedades')</h1>
            </div>
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-body">
                    <!--begin: Search Form-->
                    <!--begin::Search Form-->
                    <div class="mb-7">
                        <div class="row align-items-center ">
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
                                        style="width: 115px;">@lang('Id')</span></th>
                                <th data-field="reference" class="datatable-cell datatable-cell-sort"><span
                                        >@lang('Ref')</span></th>
                                <th data-field="propertyable_type" class="datatable-cell datatable-cell-sort"><span
                                        style="width: 115px;">@lang('Tipo de propiedad')</span></th>
                                <th data-field="price" class="datatable-cell datatable-cell-sort"><span
                                        style="width: 115px;">@lang('Precio')</span></th>
                                <th data-field="agency_commissions" class="datatable-cell datatable-cell-sort"><span
                                        style="width: 115px;">@lang('Comisión agencia')</span></th>
                                <th data-field="calculated_commission" class="datatable-cell datatable-cell-sort"><span
                                        style="width: 115px;">@lang('Comisión neta')</span></th>
                                <th data-field="County" class="datatable-cell datatable-cell-sort"><span
                                        style="width: 115px;">@lang('Provincia')</span></th>
                                <th data-field="City" class="datatable-cell datatable-cell-sort"><span
                                        style="width: 115px;">@lang('Ciudad')</span></th>

                                <th data-field="Actions" data-autohide-disabled="false"
                                    class="col-2 datatable-cell datatable-cell-sort"><span style="width: 115px;">@lang('Acciones')</span>
                                </th>

                            </tr>

                            </thead>
                            <tbody>
                            @foreach ($properties as $property)

                                <tr>

                                    <td data-field="Id" class=""><span
                                            style="width: 115px;">{{$property->id}}</span></td>
                                    <td data-field="reference" class=""><span>{{$property->ref??'Sin referencia'}}</span></td>
                                    <td data-field="propertyable_type" class=""><span
                                            style="width: 115px;">{{ App\Properties::translateModelName( $property->propertyable_type)}}</span></td>
                                            <!-- todo translate -->
                                    <td data-field="price" class=""><span
                                            style="width: 115px;">{{  $property->price }} €</span></td>
                                    <td data-field="agency_commissions" class=""><span
                                            style="width: 115px;">{{$property->agency_commissions!=0 ? $property->agency_commissions.'%' : 'Ver detalle'}}</span></td>
                                    <td data-field="calculated_commission" class=""><span
                                            style="width: 115px;">{{$property->agency_commissions!=0 ? $property->calculated_commission.'€' : 'Ver detalle'}}</span></td>
                                    <td data-field="County" class=""><span
                                            style="width: 115px;">{{$property->county_name ?? "Vacio"}}</span></td>
                                    <td data-field="City" class=""><span
                                            style="width: 115px;">{{$property->city_name ?? "Vacio"}}</span></td>

                                    <td data-field="Actions" aria-label="null" class="datatable-cell ">
                                        <div class="row">
                                            <div>
                                                    <span style=" width: 150px;">

                                                        @if($property->show_button)
                                                            <form method="POST" action="/real_estate/properties/{{$property->id}}/fav">
                                                            {{ csrf_field() }}
                                                            <div class="form-group">

                                                                <button class="btn btn-sm btn-clean btn-icon"
                                                                        title="@lang('Añadir a favoritos')">

                                                                    <i class="far fa-heart" style="color: #ffcd00; "></i>
                                                    </button>

                                                            </div>
                                                        </form>
                                                        @else
                                                            <form method="POST" action="/real_estate/properties/{{$property->id}}/fav">
                                                            {{ csrf_field() }}
                                                                {{ method_field('DELETE') }}
                                                            <div class="form-group">
                                                                <button class="btn btn-sm btn-clean btn-icon"
                                                                        title="@lang('Eliminar de favoritos')">

                                                                    <i class="fas fa-heart" style="color: #ffcd00"></i>

                                                                </button>
                                                            </div>
                                                        </form>

                                                        @endif
                                            </div>
                                            <div>
                                                        <a href=" /properties/{{$property->id}}"
                                                           class="btn btn-sm btn-clean btn-icon mr-2" title="Ver detalles"> <span
                                                                class="svg-icon svg-icon-primary svg-icon-2x">
                                                                <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Visible.svg--><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24"/>
                                                                        <path style="fill:#ffcd00 "
                                                                              d="M3,12 C3,12 5.45454545,6 12,6 C16.9090909,6 21,12 21,12 C21,12 16.9090909,18 12,18 C5.45454545,18 3,12 3,12 Z"
                                                                              fill="#000000" fill-rule="nonzero" opacity="0.4"/>
                                                                        <path style="fill:#ffcd00 "
                                                                              d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z"
                                                                              fill="#000000" opacity="0.8"/>
                                                                    </g>
                                                                </svg>
                                                                <!--end::Svg Icon--></span>
                                                        </a>
                                            </div>



                                        </div>
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
