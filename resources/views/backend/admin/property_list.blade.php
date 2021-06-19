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

                        <table class="datatable  datatable-bordered " id="kt_datatable">
                            <thead class="datatable-head">

                            <tr class="datatable-row">
                                <th data-field="Id" class="datatable-cell datatable-cell-sort"><span
                                    >@lang('Id')</span>
                                </th>
                                <th data-field="Reference" class="datatable-cell datatable-cell-sort"><span
                                    >@lang('Referencia')</span>
                                </th>
                                <th data-field="Status" class="datatable-cell datatable-cell-sort"><span
                                    >@lang('Estado')</span>
                                </th>

                                <th data-field="Property type" class="datatable-cell datatable-cell-sort"><span
                                    >@lang('Tipo de propiedad')</span>
                                </th>

                                <th data-field="Price" class="datatable-cell datatable-cell-sort"><span
                                    >@lang('Precio')</span>
                                </th>
                                <th data-field="Agency Commisions"
                                    class="datatable-cell datatable-cell-sort"><span>@lang('Comisión agencia')</span>
                                </th>
                                <th data-field="PLF Commisions"
                                    class="datatable-cell datatable-cell-sort"><span
                                    >@lang('Comisión calculada')</span></th>
                                <th data-field="County" class="datatable-cell datatable-cell-sort"><span
                                        style="width: 115px;">@lang('Provincia')</span></th>
                                <th data-field="City" class="datatable-cell datatable-cell-sort"><span
                                        style="width: 115px;">@lang('Ciudad')</span></th>
                                <th data-field="Actions"
                                    class="datatable-cell datatable-cell-sort"><span
                                    >@lang('Acciones')</span></th>
                            </tr>

                            </thead>
                            @if ($properties !== null && !$properties->isEmpty())
                                <tbody class="datatable-body" style="">
                                @foreach ($properties as $property)
                                    <!--data-row="0" -->

                                    <tr class="datatable-row" style="left: 0px;">

                                        <td data-field="Id" class="datatable-cell"><span
                                            >{{$property->id}}</span></td>
                                        <td data-field="Reference" class="datatable-cell"><span
                                            >{{$property->ref??'Sin referencia'}}</span></td>
                                        <td data-field="Status" class="datatable-cell"><span>  @if(($property->historical->last()->status->name) == 'Cancelada')
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
                                                                            <span id="id_status"
                                                                                class="label font-weight-bold label-lg  label-light-info label-inline bg-muted"
                                                                                style="color: black">
                                                            @elseif(($property->historical->last()->status->name) == 'En proceso inmozon')
                                                                                    <span id="id_status"
                                                                                        class="label font-weight-bold label-lg  label-inline bg-primary"
                                                                                        style="color: black ;height: 4em">
                                                                    @elseif(($property->historical->last()->status->name) == 'En proceso propietario')
                                                                                            <span id="id_status"
                                                                                                class="label font-weight-bold label-lg   label-inline bg-primary"
                                                                                                style="color: black; height: 4em">
                                                            @endif{{$property->historical->last()->status->name}}</span>
                                        </td>


                                        <td data-field="Property type" class="datatable-cell"><span
                                            >{{ App\Properties::translateModelName( $property->propertyable_type)}}</span>
                                        </td>
                                        <!-- todo translate -->
                                        <td data-field="Price" class="datatable-cell"><span
                                            >{{ $property->price }} €</span>
                                        </td>
                                        <td data-field="Agency Commisions"
                                            class="datatable-cell"><span>{{$property->agency_commissions!=0 ? $property->agency_commissions.'%' : 'Ver detalle'}}</span>
                                        </td>
                                        <td data-field="PLF Commisions" class="datatable-cell"><span>{{$property->agency_commissions!=0 ? $property->calculated_commission.'€' : 'Ver detalle'}}</span>
                                        </td>
                                        <td data-field="County" class=""><span
                                                style="width: 115px;">{{$property->location->county->name ?? "Vacio"}}</span></td>
                                        <td data-field="City" class=""><span
                                                style="width: 115px;">{{$property->location->city->name ?? "Vacio"}}</span></td>
                                        <td data-field="Actions" class="datatable-cell">
                                            <div class="row">
                                                <a href="/admin/properties/{{$property->id}}" title="Editar propiedad"
                                            class="btn btn-sm btn-clean btn-icon mr-2"> <span
                                                    class="svg-icon svg-icon-md">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
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



                                                <button  form="form_open_ficha" type="button" class="btn btn-danger btn-sm "
                                                    data-toggle="modal" data-target="#ficha_modal" data-id="{{$property->id}}"
                                                    onclick="setUrlId({{$property->id}})">
                                                    <span class="svg-icon svg-icon-md"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="15" height="15"/>
                                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>
                                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
                                                        </g>
                                                        </svg><!--end::Svg Icon-->
                                                    </span>
                                                </button>

                                                </div>

                                        </td>

                                    </tr>
                                @endforeach


                                </tbody>
                            @endif
                        </table>

                    </div>
                    <!--end: Datatable-->


                </div>
            </div>


                <!-- Modal abrir ficha de una propiedad-->
                <div class="modal fade" id="ficha_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">@lang('Seguro que quieres eliminar la propiedad')</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i aria-hidden="true" class="ki ki-close"></i>
                            </button>
                        </div>
                        <!--begin::Form-->
                        <form method="post" id="form_open_ficha_property" action=" {{ route('ficha.store') }}">
                            @csrf
                            <input name="property_id_hidden" type="hidden" value="{{$property->id}}">
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label class="col-form-label text-left">@lang('texto-eliminar')</label>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">@lang('Cerrar')
                                </button>

                                <a id="deleteLink" href="" title="Borrar propiedad"
                                           class="btn btn-primary font-weight-bold">Borrar</a>
                            </div>
                        </form>
                    </div>
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
                                    width: 50,
                                    autoHide: false,
                                    type: 'number',
                                },
                                {
                                    field: 'Reference',
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
                                    width: 100,
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

            <script>
                $(document).ready(function () {
                    $('.usd_input').mask('00.00', {reverse: true});
                });

                function setUrlId(id){
                    //console.log(id);
                    let urlDeleteProperty = "/admin/properties/"+id+"/delete";
                    $("#deleteLink").attr("href", urlDeleteProperty)
                }
            </script>


@endsection
