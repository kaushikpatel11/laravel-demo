@extends('template.template')

@section('top_menu')

@endsection

@section('content')

    <div >
        <div class="card">
            <div class="card-header"><h1>@lang('Propiedades favoritas')</h1></div>
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-body">
                    <!--begin: Search Form-->
                    <!--begin::Search Form-->
                    <div class="mb-7">
                        <div class="row align-items-center col-md-12">
                            <div class="col-lg-10 col-xl-10">
                                <div class="row align-items-center">
                                    <div class="col-md-4 my-2 my-md-0">
                                        <div class="input-icon">
                                            <input type="text" class="form-control" placeholder="@lang('Buscar...')"
                                                   id="kt_datatable_search_query"/>
                                            <span>
																	<i class="flaticon2-search-1 text-muted"></i>
																</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                                        <a href="#" class="btn btn-light-primary px-6 font-weight-bold">@lang('Buscar')</a>
                                    </div>
                                </div>
                            </div>
                            <!--begin::Button-->
                            <div class="col-md-2 text-right">
                                <a href="/owner/properties/create" class="btn btn-primary font-weight-bolder ">
											<span class="svg-icon svg-icon-md">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
												<svg xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                     height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24"/>
														<circle fill="#000000" cx="9" cy="15" r="6"/>
														<path
                                                            d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                                            fill="#000000" opacity="0.3"/>
													</g>
												</svg>
                                                <!--end::Svg Icon-->
											</span>@lang('Añadir')</a>
                            </div>
                        </div>
                    </div>          <!--end::Search Form-->
                <!--end: Search Form-->
                <!--begin: Datatable-->




                <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable" @if(DevideDetect::isIOS()) style="overflow: auto" @endif>

                    <table class="datatable  datatable-bordered datatable-head-custom" id="kt_datatable">
                        <thead class="datatable-head">
                        <tr class="datatable-row">
                            <th data-field="id" class="datatable-cell datatable-cell-sort"><span style="width: 115px;">Id</span>
                            </th>
                            <th data-field="reference" class="datatable-cell datatable-cell-sort"><span style="width: 115px;">@lang('Ref')</span>
                            </th>
                            <th data-field="Activo" class="datatable-cell datatable-cell-sort"><span
                                    style="width: 115px;">@lang('Activo')</span>
                            </th>
                            <th data-field="Legal validated" class="datatable-cell datatable-cell-sort"><span
                                    style="width: 115px;">@lang('Validación legal')</span>
                            </th>
                            <th data-field="Commercial validated" class="datatable-cell datatable-cell-sort"><span
                                    style="width: 115px;">@lang('Validación comercial')</span></th>
                            <th data-field="Property type" class="datatable-cell datatable-cell-sort"><span
                                    style="width: 115px;">@lang('Tipo de propiedad')</span>
                            </th>
                            <th data-field="Price" class="datatable-cell datatable-cell-sort"><span
                                    style="width: 115px;">@lang('Precio')</span>
                            </th>
                            <th data-field="Agency Commisions" data-autohide-disabled="false"
                                class="datatable-cell datatable-cell-sort"><span
                                    style="width: 115px;">@lang('Comisión agencia')</span></th>
                            <th data-field="PLF Commisions" data-autohide-disabled="false"
                                class="datatable-cell datatable-cell-sort"><span
                                    style="width: 115px;">@lang('Comisión PLF')</span></th>
                            <th data-field="Actions" data-autohide-disabled="false"
                                class="datatable-cell datatable-cell-sort"><span
                                    style="width: 115px;">@lang('Acciones')</span></th>
                        </tr>                        </thead>
                        <tbody>
                        @foreach ($favorites as $fav)
                            <!--data-row="0" -->

                            <tr>

                                <td data-field="id" class="datatable-cell"><span
                                        style="width: 50px;">{{$fav->id}}</span></td>
                                <td data-field="reference" class="datatable-cell"><span
                                        >{{$fav->ref}}</span></td>
                                <td data-field="Activo" class="datatable-cell"><span style="width: 60px;">@if (($fav->active) === 1)
                                            Sí @else No @endif</span></td>
                                <td data-field="Legal validated" class="datatable-cell"><span style="width: 110px;">@if (($fav->legal_validated) === 1)
                                            Sí @else No @endif</span></td>
                                <td data-field="Commercial validated" aria-label="Kris-Wehner" class="datatable-cell">
                                    <span style="width: 110px;">@if (($fav->commercial_validated) === 1) Sí @else
                                            No @endif</span></td>
                                <td data-field="Property type" aria-label="6" class="datatable-cell"><span
                                        style="width: 110px;"><span style="width: 110px;">{{$fav->property_type}}</span></span>
                                </td>
                                <td data-field="Price" aria-label="6" class="datatable-cell"><span
                                        style="width: 110px;"><span
                                            class="label font-weight-bold label-lg  label-light-success label-inline">{{$fav->price}} </span></span>
                                </td>
                                <td data-field="Agency Commisions" aria-label="6" class="datatable-cell"><span
                                        style="width: 110px;"><span
                                            class="label font-weight-bold label-lg  label-light-danger label-inline">{{$fav->agency_commissions}}</span></span>
                                </td>
                                <td data-field="PLF Commisions" aria-label="6" class="datatable-cell"><span
                                        style="width: 110px;"><span
                                            class="label font-weight-bold label-lg  label-light-danger label-inline">{{$fav->plf_commissions}}</span></span>
                                </td>

                                <td data-field="Actions" aria-label="null" class="datatable-cell"><span
                                        style=" width: 150px;">
                                    <form method="POST" action="/real_estate/properties/{{$fav->id}}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-danger delete-user"
                                                   value="Remove from fav">

                                        </div>
                                    </form>
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
                var KTDatatableHtmlTable = function () {
                    // Private functions
                    // demo initializer
                    var tabla = function () {
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
                        $('#kt_datatable_search_type').on('change', function () {
                            datatable.search($(this).val().toLowerCase(), 'Type');
                        });
                    };
                    return {
                        // Public functions
                        init: function () {
                            // init dmeo
                            tabla();
                        },
                    };
                }();
                jQuery(document).ready(function () {
                    KTDatatableHtmlTable.init();
                });
            </script>
@endsection
