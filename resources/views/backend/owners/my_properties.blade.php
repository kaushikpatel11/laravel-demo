@extends('template.template')

@section('top_menu')

@endsection

@section('content')
    <div class="card">
        <div class="card-header"><h1>
            @if(Auth::user()->owner->type=='promotor')
                @lang('Mis promociones')
            @else
                @lang('Mis propiedades')
            @endif
            </h1>
        </div>

        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-body">

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
                                    @if(Auth::user()->owner->type == 'agente')
                                    <a href="" class="btn btn-primary font-weight-bolder uploadXML"
                                       data-toggle="modal">
                                        <i class="fas fa-file-upload" style="color: black"></i>@lang('Añadir XML')</a>
                                        @endif
                                    <a href="/owner/properties/create" class="btn btn-primary font-weight-bolder ">
                                    <span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-08-03-114926/theme/html/demo1/dist/../src/media/svg/icons/Home/Building.svg-->
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path style="fill:black"
                                                      d="M13.5,21 L13.5,18 C13.5,17.4477153 13.0522847,17 12.5,17 L11.5,17 C10.9477153,17 10.5,17.4477153 10.5,18 L10.5,21 L5,21 L5,4 C5,2.8954305 5.8954305,2 7,2 L17,2 C18.1045695,2 19,2.8954305 19,4 L19,21 L13.5,21 Z M9,4 C8.44771525,4 8,4.44771525 8,5 L8,6 C8,6.55228475 8.44771525,7 9,7 L10,7 C10.5522847,7 11,6.55228475 11,6 L11,5 C11,4.44771525 10.5522847,4 10,4 L9,4 Z M14,4 C13.4477153,4 13,4.44771525 13,5 L13,6 C13,6.55228475 13.4477153,7 14,7 L15,7 C15.5522847,7 16,6.55228475 16,6 L16,5 C16,4.44771525 15.5522847,4 15,4 L14,4 Z M9,8 C8.44771525,8 8,8.44771525 8,9 L8,10 C8,10.5522847 8.44771525,11 9,11 L10,11 C10.5522847,11 11,10.5522847 11,10 L11,9 C11,8.44771525 10.5522847,8 10,8 L9,8 Z M9,12 C8.44771525,12 8,12.4477153 8,13 L8,14 C8,14.5522847 8.44771525,15 9,15 L10,15 C10.5522847,15 11,14.5522847 11,14 L11,13 C11,12.4477153 10.5522847,12 10,12 L9,12 Z M14,12 C13.4477153,12 13,12.4477153 13,13 L13,14 C13,14.5522847 13.4477153,15 14,15 L15,15 C15.5522847,15 16,14.5522847 16,14 L16,13 C16,12.4477153 15.5522847,12 15,12 L14,12 Z"
                                                      fill="#000000"/>
                                                <rect fill="black" x="13" y="8" width="3" height="3" rx="1"/>
                                                <path style="fill:#FFCD00"
                                                      d="M4,21 L20,21 C20.5522847,21 21,21.4477153 21,22 L21,22.4 C21,22.7313708 20.7313708,23 20.4,23 L3.6,23 C3.26862915,23 3,22.7313708 3,22.4 L3,22 C3,21.4477153 3.44771525,21 4,21 Z"
                                                      fill="#000000" opacity="0.3"/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                    @if(Auth::user()->owner->type=='promotor')
                                        @lang('Añadir promoción')
                                    @else
                                        @lang('Añadir propiedad')
                                    @endif
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Search Form-->

                <!--begin: Datatable-->
                <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable" @if(DevideDetect::isIOS()) style="overflow: auto" @endif>

                    <table class="datatable  datatable-bordered datatable-head-custom" id="kt_datatable">
                        <thead class="datatable-head">

                        <tr class="datatable-row">
                            <th data-field="Ref" class="datatable-cell datatable-cell-sort"><span
                                    >@lang('Id')</span></th>
                            @if(Auth::user()->owner->type=='promotor')

                            <th data-field="promo_name" class="datatable-cell datatable-cell-sort"><span
                                    >@lang('Nombre de la promoción')</span></th>
                            @endif                                    
                            <th data-field="Status" class="datatable-cell datatable-cell-sort"><span
                                    >@lang('Estado')</span>
                            </th>

                            @if(Auth::user()->owner->type!='promotor')
                            
                            <th data-field="Property type" class="datatable-cell datatable-cell-sort"><span
                                    >@lang('Tipo de propiedad')</span>
                            </th>
                            <th data-field="Price" class="datatable-cell datatable-cell-sort"><span
                                    >@lang('Precio')</span>
                            </th>
                            <th data-field="agency_commissions"
                                class="datatable-cell datatable-cell-sort"><span
                                    >@lang('Comisión agencia')</span>
                            </th>
                            <th data-field="plf_commissions"
                                class="datatable-cell datatable-cell-sort"><span
                                    >@lang('Comisión calculada')</span></th>
                            @endif
                            <th data-field="city"
                                class="datatable-cell datatable-cell-sort"><span
                                    >@lang('Ciudad')</span></th>
                            <th data-field="county"
                                class="datatable-cell datatable-cell-sort"><span
                                    >@lang('Provincia')</span></th>
                            <th data-field="Actions"
                                class="datatable-cell datatable-cell-sort"><span
                                    >@lang('Acciones')</span></th>

                        </tr>

                        </thead>
                        <tbody>
                        @foreach ($properties as $property)

                            <tr>

                                <td data-field="Ref" class="datatable-cell"><span>{{$property->id}}</span></td>
                                @if(Auth::user()->owner->type=='promotor')
                                <td data-field="promo_name" class="datatable-cell"><span>{{$property->propertyable->promotion_name}}</span></td>
                                @endif

                                <td data-field="Status" class="datatable-cell"><span>  @if(($property->historical->last()->status->name) == 'Cancelada')
                                            <span id="id_status"
                                                  class="label font-weight-bold label-lg  label-light-info label-inline bg-danger "
                                                  style="color: black; min-height: 3em;">
                                @elseif(($property->historical->last()->status->name) == 'Activa')
                                                    <span id="id_status"
                                                          class="label font-weight-bold label-lg  label-light-info label-inline bg-success"
                                                          style="color: black; min-height: 3em;">
                                    @elseif(($property->historical->last()->status->name) == 'Sin revisar')
                                                            <span id="id_status"
                                                                  class="label font-weight-bold label-lg  label-light-info label-inline bg-warning"
                                                                  style="color: black; min-height: 3em;">
                                        @elseif(($property->historical->last()->status->name) == 'Desactivada')
                                                                    <span id="id_status"
                                                                          class="label font-weight-bold label-lg  label-light-info label-inline bg-muted"
                                                                          style="color: black; min-height: 3em;">
                                              @elseif(($property->historical->last()->status->name) == 'En proceso inmozon')
                                                                            <span id="id_status"
                                                                                  class="label font-weight-bold label-lg  label-inline bg-primary"
                                                                                  style="min-height: 3em;">
                                                      @elseif(($property->historical->last()->status->name) == 'En proceso propietario')
                                                                                    <span id="id_status"
                                                                                          class="label font-weight-bold label-lg   label-inline bg-primary"
                                                                                          style=" min-height: 3em;">
                                            @endif{{$property->historical->last()->status->name}}</span>
                                </td>

                            @if(Auth::user()->owner->type!='promotor')

                                <td data-field="Property type" class="datatable-cell"><span
                                    >{{ App\Properties::translateModelName( $property->propertyable_type)}}</span>
                                </td>
                                <td data-field="Price" class="datatable-cell"><span
                                    >{{$property->price}}€</span>
                                </td>
                                <td data-field="agency_commissions" class="datatable-cell">
                                    <span>{{ $property->agency_commissions }}</span>
                                </td>

                                <td data-field="plf_commissions" class="datatable-cell"><span
                                    >{{$property->calculated_commission}}</span>
                                </td>
                                @endif
                                <td data-field="city" class="datatable-cell"><span
                                    >{{$property->getCityName()}}</span>
                                </td>
                                <td data-field="county" class="datatable-cell"><span
                                    >{{$property->getCountyName()}}</span>
                                </td>
                                <td data-field="Actions" class="datatable-cell"><span>

                        <a href="/owner/properties/{{$property->id}}/edit"
                           class="btn btn-sm btn-clean btn-icon mr-2" title="Editar propiedad"> <span
                                class="svg-icon svg-icon-md"> <svg xmlns="http://www.w3.org/2000/svg"
                                                                   xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                   width="24px" height="24px"
                                                                   viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path style="fill:#ffcd00"
                                              d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                              fill="#000000" fill-rule="nonzero"
                                              transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path>
                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2"
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

            </div>
        </div>
        <!--end::Card-->

    </div>


    {{--
      -- Modal para subir XML de propiedades
      --}}
    <div class="modal fade" id="uploadXML" tabindex="-1" role="dialog" aria-labelledby="uploadXML" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Subir fichero XML con propiedades')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="frm_uploadXML_id" enctype="multipart/form-data">
                        @csrf
                        {{--@method('post')--}}
                        <div class="modal-body card-box">
                            {{--
                                                    <p>Est&aacute;s seguro de querer borrar esta sesi&oacute;n</p>
                                                    <div class="m-t-20"> <a href="#" class="btn btn-default" data-dismiss="modal">Cerrar</a>
                                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                                    </div>
                            --}}
                            <div class="custom-file">
                                <label class="custom-file-label" for="chooseFile">@lang('Elegir fichero')</label>
                                <input type="file" name="xmlfile" class="custom-file-input" id="chooseFile">
                            </div>

                            <div class="mt-10"><a href="#" class="btn btn-default" data-dismiss="modal">@lang('Cerrar')</a>
                                <button type="submit" class="btn btn-primary">@lang('Subir XML')</button>
                            </div>

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
                        {
                            field: 'promo_name',
                            width: 150,
                            autoHide: false,
                    
                        },
                        {
                            field: 'Status',
                            width: 150,
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
        // Upload XML
        jQuery('a.uploadXML').click(function (event) {
            jQuery('#frm_uploadXML_id').attr('action', '{{ route('owner.uploadxmlJob') }}');
            console.debug('UPLOAD XML', document.getElementById("frm_uploadXML_id").action);
            $("#uploadXML").modal('show');
        });

    </script>
@endsection
