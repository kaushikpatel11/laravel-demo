@extends('template.template')

@section('top_menu')

@endsection


@section('content')
    <div>
        <div class="card">
            <div class="card-header"><h1>@lang('Administradores')</h1></div>

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
                                    <div class="col-md-3 col-sm-6 text-right col-6">
                                        <a href="/admin/create" class="btn btn-primary font-weight-bolder ">
											<span class="svg-icon svg-icon-md">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-08-03-114926/theme/html/demo1/dist/../src/media/svg/icons/Communication/Group.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path style="fill:black"
              d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
              fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path style="fill:black"
              d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
              fill="#000000" fill-rule="nonzero"/>
    </g>
</svg>
                                                <!--end::Svg Icon-->
											</span>@lang('Añadir')</a>
                                    </div>
                                </div>
                            </div>
                            <!--begin::Button-->

                        </div>
                    </div>            <!--end::Search Form-->
                    <!--end: Search Form-->
                    <!--begin: Datatable-->
                    <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable" @if(DevideDetect::isIOS()) style="overflow: auto" @endif>

                        <table class="datatable  datatable-bordered datatable-head-custom" id="kt_datatable">
                            <thead class="datatable-head">

                            <tr class="datatable-row">

                                <th data-field="Id" class="datatable-cell datatable-cell-sort"><span
                                        style="width: 10px !important;">@lang('Id')</span></th>
                                <th data-field="Active" class="datatable-cell datatable-cell-sort"><span
                                        style="width: 110px;">@lang('Activo')</span></th>
                                <th data-field="Name" class="datatable-cell datatable-cell-sort"><span
                                        style="width: 110px;">@lang('Nombre')</span></th>
                                <th data-field="Surname" class="datatable-cell datatable-cell-sort"><span
                                        style="width: 110px;">@lang('Apellidos')</span></th>
                                <th data-field="Address" class="datatable-cell datatable-cell-sort"><span
                                        style="width: 110px;">@lang('Dirección')</span></th>
                                <th data-field="Phone" class="datatable-cell datatable-cell-sort"><span
                                        style="width: 110px;">@lang('Teléfono')</span></th>
                                <th data-field="Type" class="datatable-cell datatable-cell-sort"><span
                                        style="width: 110px;">@lang('Tipo')</span></th>
                                <th data-field="Email" class="datatable-cell datatable-cell-sort"><span
                                        style="width: 110px;">@lang('Correo electrónico')</span></th>
                                <th data-field="Actions" data-autohide-disabled="false"
                                    class="datatable-cell datatable-cell-sort"><span
                                        style="width: 125px;">@lang('Acciones')</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="datatable-body" style="">
                            @foreach ($admins as $admin)
                                <!--data-row="0" -->
                                <tr class="datatable-row" style="left: 0px;">


                                    <td data-field="Id" class="datatable-cell"><span
                                            style="width: 10px !important;">{{$admin->id}}</span></td>
                                    <td data-field="Active" class="datatable-cell"><span style="width: 110px;"> @if ($admin->user->active)
                                                Sí @else No @endif</span></td>
                                    <td data-field="Name" aria-label="6" class="datatable-cell"><span
                                            style="width: 110px;"><span
                                                style="width: 110px;">{{$admin->name}}</span></span></td>
                                    <td data-field="Surname" aria-label="6" class="datatable-cell"><span
                                            style="width: 110px;"><span
                                                style="width: 110px;">{{$admin->surname}}</span></span></td>
                                    <td data-field="Address" aria-label="6" class="datatable-cell"><span
                                            style="width: 110px;"><span
                                                style="width: 110px;">{{$admin->address}}</span></span></td>
                                    <td data-field="Phone" aria-label="6" class="datatable-cell"><span
                                            style="width: 110px;"><span
                                                style="width: 110px;">{{$admin->phone_1}}</span></span></td>
                                    <td data-field="Type" aria-label="6" class="datatable-cell"><span
                                            style="width: 110px;"><span
                                                style="width: 110px;">{{$admin->type}}</span></span></td>
                                    <td data-field="Email" aria-label="6" class="datatable-cell"><span
                                            style="width: 110px;"><span
                                                style="width: 110px;">{{$admin->user->email}}</span></span>
                                    </td>
                                    <td data-field="Actions" data-autohide-disabled="false" aria-label="null"
                                        class="datatable-cell"><span
                                            style="overflow: visible; position: relative; width: 125px;">

                                    <a href="/admin/{{$admin->id}}" class="btn btn-sm btn-clean btn-icon mr-2"
                                       title="Editar detalles"> <span class="svg-icon svg-icon-md">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path
                                                        d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                                        fill="#000000" fill-rule="nonzero"
                                                        transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path>
                                                    <rect fill="#000000" opacity="0.3" x="5" y="20" width="15"
                                                          height="2" rx="1"></rect>
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
            </div>

        </div>
    </div>
@endsection

@section('js')

    <script src="{{ url('assets/backend/js/components/datatable/core.datatable.js') }}"></script>
    <script src="{{ url('assets/backend/js/components/datatable/datatable.checkbox.js') }}"></script>
    <script src="{{ url('assets/backend/js/components/datatable/datatable.rtl.js') }}"></script>

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
                            width: 20,
                            autoHide: false,
                            type: 'number',
                        },
                        {
                            field: 'Active',
                            width: 60,
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
