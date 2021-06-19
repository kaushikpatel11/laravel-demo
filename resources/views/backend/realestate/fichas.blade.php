@extends('template.template')

@section('top_menu')

@endsection

@section('content')

<div>
    <div class="card">
        <div class="card-header">
            <h1>@lang('Fichas abiertas')</h1>
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
                                        <input type="text" class="form-control" placeholder="@lang('Buscar...')" id="kt_datatable_search_query" />
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
                                <th data-field="Ref_Ficha" class="datatable-cell datatable-cell-sort"><span style="width: 115px;">@lang('Ref Ficha')</span></th>
                                <th data-field="id" class="datatable-cell datatable-cell-sort"><span>@lang('Id propiedad')</span></th>
                                <th data-field="reference" class="datatable-cell datatable-cell-sort"><span>@lang('Ref')</span></th>
                                <th data-field="Direccion" class="datatable-cell datatable-cell-sort"><span style="width: 115px;">@lang('Dirección')</span></th>
                                <th data-field="Localidad" class="datatable-cell datatable-cell-sort"><span style="width: 115px;">@lang('Localidad')</span></th>
                                <th data-field="Provincia" class="datatable-cell datatable-cell-sort"><span style="width: 115px;">@lang('Provincia')</span></th>
                                <th data-field="PVP" class="datatable-cell datatable-cell-sort"><span style="width: 115px;">@lang('PVP')</span></th>
                                <th data-field="owner" class="datatable-cell datatable-cell-sort"><span style="width: 115px;">@lang('Nombre propietario')</span></th>
                                <th data-field="phone" class="datatable-cell datatable-cell-sort"><span style="width: 115px;">@lang('Teléfono')</span></th>
                                <th data-field="email" class="datatable-cell datatable-cell-sort"><span style="width: 115px;">@lang('Email')</span></th>
                                <th data-field="open_date" class="datatable-cell datatable-cell-sort"><span style="width: 115px;">
                                        de apertura de ficha</span></th>
                                <th data-field="Actions" data-autohide-disabled="false" class="datatable-cell datatable-cell-sort"><span style="width: 115px;">@lang('Acciones')</span></th>


                            </tr>

                        </thead>
                        <tbody class="datatable-body" style="">
                            @foreach ($properties as $property)
                            <!--data-row="0" -->

                            <tr class="datatable-row" style="left: 0px;">


                                <td data-field="Ref_Ficha" class="datatable-cell"><span style="width: 50px;">{{$property->pivot->id}}</span></td>
                                <td data-field="id" class="datatable-cell"><span>{{$property->id}}</span></td>
                                <td data-field="reference" class="datatable-cell"><span>{{$property->ref}}</span></td>
                                <td data-field="Direccion" class="datatable-cell"><span style="width: 50px;">{{$property->location->street}}</span></td>
                                <td data-field="Localidad" class="datatable-cell"><span style="width: 50px;">{{$property->location->city->name}}</span></td>
                                <td data-field="Provincia" class="datatable-cell"><span style="width: 50px;">{{$property->location->county->name}}</span></td>
                                <td data-field="PVP" class="datatable-cell"><span style="width: 50px;">{{number_format($property->price, 2, ',', '.')}}</span></td>
                                <td data-field="owner" class="datatable-cell"><span style="width: 50px;">{{$property->owner->name}}</span></td>
                                <td data-field="phone" class="datatable-cell"><span style="width: 50px;">{{$property->owner->phone_1}}</span></td>
                                <td data-field="email" class="datatable-cell"><span style="width: 50px;">{{$property->owner->user->email}}</span></td>
                                <td data-field="open_date" class="datatable-cell"><span style="width: 50px;">{{$property->pivot->created_at}}</span></td>
                                <td data-field="Actions" aria-label="Range Rover" class="datatable-cell"><span style="width: 115px;">




                                        <a href=" {{ route('ficha.show',['id' => $property->id]) }}"
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
                                field: 'Ref_Ficha',
                                width: 70,
                                autoHide: false,
                                type: 'number',
                            },
                            {
                                field: 'Ref',
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
