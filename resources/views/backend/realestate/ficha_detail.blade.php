@extends('template.template')

@section('top_menu')

@endsection

@section('content')

    <div>
        <!--begin::Card-->
        <div>
            <div class="card">
                <div class="card-header">
                    <h1>@lang('Detalles de la ficha')</h1>
                
                </div>
                <div class="card card-custom card-stretch ">
                    <!--begin::Header-->

                    <!--end::Header-->
                    <!--begin::Modal-->
                    <div class="modal fade" id="kt_datetimepicker_modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">@lang('Seleccione datos de la cita')</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i aria-hidden="true" class="ki ki-close"></i>
                                    </button>
                                </div>
                                <form class="form" method="post" action="{{ route('appointment.store') }}">
                                    @csrf
                                    <input name="card_id" type="hidden" value="{{$property->card_id}}">
                                    <div class="modal-body">
                                        {{--
                                                                                <div class="form-group row">
                                                                                    <label class="col-form-label text-right col-lg-3 col-sm-12">Enable Helper Buttons</label>
                                                                                    <div class="col-lg-4 col-md-9 col-sm-12">
                                                                                        <div class="input-group date" >
                                                                                            <input type="text" class="form-control" readonly  value="05/20/2017" id="kt_datepicker_3"/>
                                                                                            <div class="input-group-append">
                                               <span class="input-group-text">
                                                <i class="la la-calendar"></i>
                                               </span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <span class="form-text text-muted">Enable clear and today helper buttons</span>
                                                                                    </div>
                                                                                </div>--}}


                                        <div class="form-group row" style="justify-content: center;">
                                                <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Fecha y hora')</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="input-group date" data-z-index="1100">
                                                        <input type="text" class="form-control" readonly="readonly"
                                                               name="date" placeholder="@lang('Seleccione fecha y hora')"
                                                               id="kt_datetimepicker_8"/>
                                                        <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="la la-calendar-check-o glyphicon-th"></i>
                                                        </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                              {{--          <div class="form-group row">
                                            <label class="col-form-label text-right col-lg-3 col-sm-12">Fecha y
                                                hora</label>
                                            <div class="col-lg-4 col-md-9 col-sm-12">
                                                <div id="kt_datetimepicker_8" class="w-300px mb-2"></div>
                                                <span
                                                    class="form-text text-muted">Enable clear and today helper buttons</span>
                                            </div>
                                        </div>--}}


                                        <div class="form-group row" style="justify-content: center;">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Nombre y apellidos del cliente')</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control form-control-lg form-control-solid"
                                                       type="text" name="client_name" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row" style="justify-content: center;">

                                            <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Nif del cliente')</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control form-control-lg form-control-solid"
                                                       type="text" name="client_nif" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="card-toolbar">
                                            <button type="submit" class="btn btn-success mr-2">@lang('Enviar')</button>
                                            <button type="reset" class="btn btn-secondary">@lang('Cancelar')</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--end::Modal-->
                    <!--begin::Body-->
                    <div class="card-body">

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="ficha-tab" data-toggle="tab" href="#ficha" role="tab"
                                   aria-controls="ficha" aria-selected="true">@lang('Ficha')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="appointments-tab" data-toggle="tab" href="#appointments"
                                   role="tab" onclick="shortDatatable()" aria-controls="appointments" aria-selected="false">@lang('Citas')</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="">

                            <div class="tab-pane fade show active" id="ficha" role="tabpanel"
                                 aria-labelledby="ficha-tab">
                                <div class="row">
                                    <label class="col-xl-3"></label>
                                    <div class="col-lg-9 col-xl-6">
                                        <h3 class="font-weight-bold mb-20 mt-15 text-center">@lang('Datos propietario')</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-xl-3"></label>
                                </div>


                                <div class="form-group row justify-content-center">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Nombre')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control form-control-lg form-control-solid" type="text"
                                               name="surname" value="{{$property->owner->name}}" disabled minlength="3"
                                               maxlength="24" required>
                                    </div>
                                </div>

                                <div class="form-group row justify-content-center">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Correo Electrónico')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-at"></i>
                                            </span>
                                            </div>
                                            <input type="text" class="form-control form-control-lg form-control-solid"
                                                   value="{{$property->owner->user->email}}" name="email"
                                                   placeholder="@lang('Correo Electrónico')" disabled>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row justify-content-center">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Fecha de apertura')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control form-control-lg form-control-solid" type="text"
                                               name="surname" value="{{ $property->created_at}}" disabled
                                               minlength="3" maxlength="24" required>
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
                                            <input type="text" class="form-control form-control-lg form-control-solid"
                                                   value="{{$property->owner->phone_1}}" name="phone_1"
                                                   placeholder="@lang('Teléfono')" minlength="9" maxlength="12" disabled>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-xl-3"></label>
                                    <div class="col-lg-9 col-xl-6">
                                        <h3 class="font-weight-bold mb-20 mt-15 text-center">@lang('Datos propiedad')</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-xl-3"></label>
                                </div>


                                <div class="form-group row justify-content-center">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Id propiedad')</label>
                                    <div class="col-lg-9 col-xl-6">

                                        <a class="form-control form-control-lg form-control-solid"
                                        href="/properties/{{$property->id}}" style="color: blue;">{{$property->id}}</a>
                                    </div>
                                </div>
                                
                                <div class="form-group row justify-content-center">
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
                                
                                <div class="form-group row justify-content-center">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Precio')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control form-control-lg form-control-solid" type="text"
                                               name="surname" value="{{number_format($property->price, 2, ',', '.')}}€" disabled minlength="3"
                                               maxlength="24" required>
                                    </div>
                                </div>


                                <div class="form-group row justify-content-center">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Dirección')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control form-control-lg form-control-solid" type="text"
                                               name="surname" value="{{ $property->location->street}}" disabled
                                               minlength="3" maxlength="24" required>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Ciudad')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control form-control-lg form-control-solid" type="text"
                                               name="surname" value="{{ $property->location->city->name}}" disabled
                                               minlength="3" maxlength="24" required>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Provincia')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control form-control-lg form-control-solid" type="text"
                                               name="surname" value="{{ $property->location->county->name}}" disabled
                                               minlength="3" maxlength="24" required>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade " id="appointments" role="tabpanel"
                                 aria-labelledby="appointments-tab">
                                <!--begin::Search Form-->
                                <div class="mb-7 mt-7">
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

                                    <table class="datatable  datatable-bordered datatable-head-custom"
                                           id="kt_datatable">
                                        <thead class="datatable-head">

                                        <tr class="datatable-row">
                                            <th data-field="Ref" class="datatable-cell datatable-cell-sort">
                                                <span>@lang('Ref')</span></th>
                                            <th data-field="Client_name" class="datatable-cell datatable-cell-sort">
                                                <span>@lang('Nombre del cliente')</span></th>
                                            <th data-field="Client_nif" class="datatable-cell datatable-cell-sort">
                                                <span>@lang('Nif del cliente')</span></th>
                                            <th data-field="Date" class="datatable-cell datatable-cell-sort"><span>@lang('Fecha y hora')</span>
                                            </th>
                                            <th data-field="Status" class="datatable-cell datatable-cell-sort"><span>@lang('Estado')</span>
                                            </th>
                                            <th data-field="Reason" class="datatable-cell datatable-cell-sort"><span>Motivo</span>
                                            </th>
                                            <th data-field="Actions" class="datatable-cell datatable-cell-sort"><span>@lang('Acciones')</span>
                                            </th>

                                        </tr>

                                        </thead>
                                        <tbody>
                                        @foreach ($appointments as $appointment)

                                            <tr>

                                                <td data-field="Ref" class="datatable-cell">
                                                    <span>{{$appointment->id}}</span></td>
                                                <td data-field="Client_name" class="datatable-cell">
                                                    <span>{{$appointment->client_name}}</span></td>
                                                <td data-field="Client_nif" class="datatable-cell">
                                                    <span>{{$appointment->client_nif}}</span></td>
                                                <td data-field="Date" class="datatable-cell">
                                                    <span>{{$appointment->date}}</span></td>
                                                <td data-field="Status" class="datatable-cell">
                                                    <span>{{$appointment->status}}</span></td>
                                                <td data-field="Reason" class="datatable-cell">
                                                    <span>{{$appointment->reason}}</span></td>
                                                <td data-field="Actions" class="datatable-cell"><span>

                                                    <a href="" class="btn btn-sm btn-clean btn-icon mr-2"
                                                       title="Edit details"> <span class="svg-icon svg-icon-md"> <svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                   fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                    <path
                                                                        d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                                                        fill="#000000" fill-rule="nonzero"
                                                                        transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path>
                                                                    <rect fill="#000000" opacity="0.3" x="5" y="20"
                                                                          width="15" height="2" rx="1"></rect>
                                                                </g>
                                                            </svg> </span> </a>
                                                </span>
                                                </td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Body-->
                    <div class="card-footer text-center">
                        <div class="card-toolbar">
                        @if($property->historical->last()->status->id == 2 && $property->propertyable_type!="App\\Promotion")

                            <button type="button" class="btn btn-success mr-2" data-toggle="modal"
                                    data-target="#kt_datetimepicker_modal">@lang('Reservar cita')
                            </button>
                        @else
                            <button disabled type="button" class="btn btn-warning mr-2" data-toggle="modal"
                                    data-target="#kt_datetimepicker_modal">@lang('No se puede reservar cita')
                            </button>
                        @endif
                        </div>
                    </div>

                    <!--end::Form-->
                </div>
            </div>
        </div>
    </div>

@endsection


@section('js')

    <script src={{ url('/assets/backend/js/bootstrap-datepicker.js') }}></script>
    <script>// Demo 8
        $('#kt_datetimepicker_8').datetimepicker({
            inline: true,
            autoclose: true,
            todayBtn: true,
            //startDate: "2020-10-12 10:00",
            startDate: "{{Carbon\Carbon::today()}}"
        });</script>

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
                        saveState: {cookie: false},
                    },


                    search: {
                        input: $('#kt_datatable_search_query'),
                        key: 'generalSearch'
                    },
                    columns: [

                        {
                            field: 'Ref',
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

        function shortDatatable () {

            try {
                datatable.sort('Date', 'desc');

            } catch (error) {

            }
        }

    </script>

@endsection
