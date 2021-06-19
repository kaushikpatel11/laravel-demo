@extends('template.template')

@section('top_menu')

@endsection


@section('content')

    <div>
        <div class="card">
            <div class="card-header">
                <h1>@lang('Inmobiliarias')</h1>
            </div>
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-body">
                    <!--begin: Search Form-->
                    <!--begin::Search Form-->
                    <div class="mb-7">
                        <div class="row align-items-center">
                            <div class=" col-md-12">
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
                                        style="width: 110px;">@lang('Id')</span></th>
                                <th data-field="Rating" class="datatable-cell datatable-cell-sort"><span
                                        style="width: 110px;">@lang('Puntuación')</span></th>
                                <th data-field="Active" class="datatable-cell datatable-cell-sort"><span
                                        style="width: 110px;">@lang('Estado')</span></th>
                                <th data-field="Name" class="datatable-cell datatable-cell-sort"><span
                                        style="width: 110px;">@lang('Nombre Comercial')</span></th>
                                <th data-field="Email" class="datatable-cell datatable-cell-sort"><span
                                        style="width: 110px;">@lang('Email')</span></th>
                                <th data-field="Street" class="datatable-cell datatable-cell-sort"><span
                                        style="width: 110px;">@lang('Calle')</span></th>
                                <th data-field="City" class="datatable-cell datatable-cell-sort"><span
                                        style="width: 110px;">@lang('Ciudad')</span></th>
                                <th data-field="County" class="datatable-cell datatable-cell-sort"><span
                                        style="width: 110px;">@lang('Provincia')</span></th>
                                <th data-field="Actions" data-autohide-disabled="true"
                                    class="datatable-cell datatable-cell-sort"><span
                                        style="width: 125px;">@lang('Acciones')</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="datatable-body" style="">
                            @foreach ($real_estates as $real_estate)
                                <!--data-row="0" -->
                                <tr class="datatable-row" style="left: 0px;">

                                    <td data-field="Id" class="datatable-cell"><span
                                            style="width: 110px;">{{$real_estate->re_id}}</span></td>
                                    <td data-field="Rating" class="datatable-cell "><span
                                            style="width: 110px;">{{isset($real_estate->avg_rating) ? $real_estate->avg_rating : 0.0}}
                                            @for ( $i = 0 ;  $i< floor($real_estate->avg_rating); $i++)
                                            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Star.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                    <path d="M12,18 L7.91561963,20.1472858 C7.42677504,20.4042866 6.82214789,20.2163401 6.56514708,19.7274955 C6.46280801,19.5328351 6.42749334,19.309867 6.46467018,19.0931094 L7.24471742,14.545085 L3.94038429,11.3241562 C3.54490071,10.938655 3.5368084,10.3055417 3.92230962,9.91005817 C4.07581822,9.75257453 4.27696063,9.65008735 4.49459766,9.61846284 L9.06107374,8.95491503 L11.1032639,4.81698575 C11.3476862,4.32173209 11.9473121,4.11839309 12.4425657,4.36281539 C12.6397783,4.46014562 12.7994058,4.61977315 12.8967361,4.81698575 L14.9389263,8.95491503 L19.5054023,9.61846284 C20.0519472,9.69788046 20.4306287,10.2053233 20.351211,10.7518682 C20.3195865,10.9695052 20.2170993,11.1706476 20.0596157,11.3241562 L16.7552826,14.545085 L17.5353298,19.0931094 C17.6286908,19.6374458 17.263103,20.1544017 16.7187666,20.2477627 C16.5020089,20.2849396 16.2790408,20.2496249 16.0843804,20.1472858 L12,18 Z" fill="#000000"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                            @endfor
                                            <br>
                                            <i class="">({{ $real_estate->rating_count}} @lang('votos'))</i>

                                           </span></td>
                                    <td data-field="Active" class="datatable-cell"><span style="width: 110px;">
                                        @if ($real_estate->status == 0)
                                            @lang('Inactiva')
                                        @elseif($real_estate->status == 1)
                                            @lang('En pruebas')
                                        @else
                                            @lang('Activa')
                                        @endif</span></td>
                                    <td data-field="Name" aria-label="6" class="datatable-cell"><span
                                            style="width: 110px;"><span
                                                style="width: 110px;">{{ $real_estate->commercial_name}}</span></span></td>
                                    <td data-field="Email" aria-label="6" class="datatable-cell"><span
                                            style="width: 110px;"><span
                                                style="width: 110px;">{{ $real_estate->email}}</span></span></td>

                                    <td data-field="Street" aria-label="6" class="datatable-cell"><span
                                            style="width: 110px;"><span
                                                style="width: 110px;">{{$real_estate->street}}</span></span></td>
                                    <td data-field="City" aria-label="6" class="datatable-cell"><span
                                            style="width: 110px;"><span
                                                style="width: 110px;">{{$real_estate->city}}</span></span></td>
                                    <td data-field="County" aria-label="6" class="datatable-cell"><span
                                            style="width: 110px;"><span
                                                style="width: 110px;">{{$real_estate->county}}</span></span></td>

                                    <td data-field="Actions" data-autohide-disabled="false" aria-label="null"
                                        class="datatable-cell">
                                <span
                                    style=" width: 150px;">


                                              <a href="/real_estate/{{$real_estate->re_id}}/show"
                                                 class="btn btn-sm btn-clean btn-icon mr-2"
                                                 title="Ver/Cambiar estado"> <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Visible.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M3,12 C3,12 5.45454545,6 12,6 C16.9090909,6 21,12 21,12 C21,12 16.9090909,18 12,18 C5.45454545,18 3,12 3,12 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                        <path d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z" fill="#000000" opacity="0.3"/>
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
                                    field: 'Rating',

                                    autoHide: false,
                                    type: 'number',
                                },
                                {
                                    field: 'Id',
                                    width: 20,
                                    autoHide: false,
                                    type: 'number',

                                },
                                {
                                    field: 'Email',
                                    width: 180,
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

<script>
    $(document).ready(function () {
        $('.usd_input').mask('00.00', { reverse: true });
    });
</script>
@endsection
