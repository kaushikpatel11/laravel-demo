@extends('template.template')

@section('top_menu')

@endsection

@section('content')

<div>
    <div class="card">
        <div class="card-header">
            <h1>@lang('Mis citas')</h1>
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
                    <!--end::Search Form-->
                    <!--end: Search Form-->
                    <!--begin: Datatable-->
                    <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable" @if(DevideDetect::isIOS()) style="overflow: auto" @endif>

                    <table class="datatable  datatable-bordered datatable-head-custom" id="kt_datatable">
                        <thead class="datatable-head">

                            <tr class="datatable-row">
                                <th data-field="Id" class="datatable-cell datatable-cell-sort"><span style="width: 115px;">@lang('Ref. Inmobiliaria')</span></th>
                                <th data-field="BName" class="datatable-cell datatable-cell-sort"><span style="width: 115px;">@lang('Inmobiliaria')</span></th>
                                <th data-field="AVGRating" class="datatable-cell datatable-cell-sort"><span style="width: 115px;">@lang('Valoración media')</span></th>
                                <th data-field="Client_name" class="datatable-cell datatable-cell-sort"><span style="width: 115px;">@lang('Nombre del cliente')</span></th>
                                <th data-field="Client_nif" class="datatable-cell datatable-cell-sort"><span style="width: 115px;">@lang('Nif del cliente')</span></th>
                                <th data-field="Date" class="datatable-cell datatable-cell-sort"><span style="width: 115px;">@lang('Fecha y hora')</span></th>
                                <th data-field="Status" class="datatable-cell datatable-cell-sort"><span style="width: 115px;">@lang('Estado')</span></th>
                                <th data-field="Reason" class="datatable-cell datatable-cell-sort"><span style="width: 115px;">Motivo</span></th>

                                <th data-field="Actions" data-autohide-disabled="false" class="col-2 datatable-cell datatable-cell-sort"><span style="width: 115px;">@lang('Acciones')</span>
                                </th>

                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($appointments as $appointment)

                            <tr>

                                <td data-field="Id" class=""><span style="width: 115px;">{{$appointment->real_estate_id}}</span></td>
                                <td data-field="BName" class=""><span style="width: 115px;">{{$appointment->commercial_name}}</span></td>
                                <td data-field="AVGRating" class=""><span style="width: 115px;">{{$appointment->re_avgRating}}</span></td>
                                <td data-field="Client_name" class=""><span style="width: 115px;">{{$appointment->client_name}}</span></td>
                                <td data-field="Client_nif" class=""><span style="width: 115px;">{{$appointment->client_nif}}</span></td>
                                <td data-field="Date" class=""><span style="width: 115px;">{{$appointment->date}}</span></td>
                                <td data-field="Status" class=""><span style="width: 115px;">{{$appointment->status}}</span></td>
                                <td data-field="Reason" class=""><span style="width: 115px;">{{$appointment->reason}}</span></td>

                                <td data-field="Actions"><span style="width: 115px;">

                                            @if ($appointment->status == "Pendiente")

                                            <form method="post" id="modal_form_edit_property" action="{{ route('accept.appointment',['id' => $appointment->id]) }}">
                                                @csrf
                                                <button class="btn btn-sm btn-clean btn-icon" title="Aceptar"> <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Like.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <path d="M9,10 L9,19 L10.1525987,19.3841996 C11.3761964,19.7920655 12.6575468,20 13.9473319,20 L17.5405883,20 C18.9706314,20 20.2018758,18.990621 20.4823303,17.5883484 L21.231529,13.8423552 C21.5564648,12.217676 20.5028146,10.6372006 18.8781353,10.3122648 C18.6189212,10.260422 18.353992,10.2430672 18.0902299,10.2606513 L14.5,10.5 L14.8641964,6.49383981 C14.9326895,5.74041495 14.3774427,5.07411874 13.6240179,5.00562558 C13.5827848,5.00187712 13.5414031,5 13.5,5 L13.5,5 C12.5694044,5 11.7070439,5.48826024 11.2282564,6.28623939 L9,10 Z" fill="#000000" />
                                                                <rect fill="#000000" opacity="0.3" x="2" y="9" width="5" height="11" rx="1" />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon--></span>
                                                </button>
                                            </form>
              

                                            <button 
                                            onclick="setRouteAppointmentReject('{{ $appointment->id}}')"
                                            data-toggle="modal"
                                            data-target="#reject_modal"
                                            class="btn btn-sm btn-clean btn-icon" title="Rechazar"> <span class="svg-icon svg-icon-md"> <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                                                <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                </button>

                                            @elseif($appointment->status == "Aceptada" && (Carbon\Carbon::now()>$appointment->date))
                                            <button
                                            data-toggle="modal"
                                            data-target="#rating_modal"
                                            onclick="setActionRoute({{$appointment->id}});"
                                            class="btn btn-sm btn-clean btn-icon" title="Comentar"> <span class="svg-icon svg-icon-md"> <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                            <path style="fill:#ffcd00" d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path>
                                                            <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect>
                                                        </g>
                                                    </svg> </span>
                                            </button>


                                            @else
                                            <span>@lang('Sin acciones')</span>
                                            @endif

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
    <!--begin::Modal para comentar una cita-->
    <div class="modal fade " id="rating_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('Valorar cita')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <!--begin::Form-->
                <form id="id_form_comment_appointment" method="post"  >
                    @csrf
                    <input name="property_id_hidden" type="hidden" value="">
                    <div class="modal-body">

                       {{-- <div class="form-group row" style="justify-content: center;">
                            <label class="checkbox">
                                                    <input style="pl-2" type="checkbox" name="appointment_made" value="appointment_made"
                                                           id="appointment_made">
                                                    <span></span>¿Inmobiliaria y cliente han asistido a la cita?
                            </label>
                        </div>--}}
                        <div class="form-group row text-center" style="justify-content: center;">
                            <label>¿Inmobiliaria y cliente han asistido a la cita?</label>
                            <div class="radio-inline">
                                <label class="radio ">
                                    <input type="radio" checked="checked" name="appointment_made" value="appointment_made"/>
                                    <span></span>
                                    Si
                                </label>
                                <label class="radio">
                                    <input type="radio" name="appointment_made" value="appointment_made"/>
                                    <span></span>
                                    No
                                </label>
                            </div>
                        </div>
                        <div class="form-group row text-center" style="justify-content: center;">
                            <label class="col-xl-3 col-lg-3 col-form-label text-left" for="exampleSelect1">@lang('Valoración')</label>
                            <div class="col-lg-12 col-xl-6">
                                <select class="form-control form-control-solid" name="rating" id="propertyable_type" value="">
                                    <option selected>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row" style="justify-content: center;">
                            <label class="col-form-label text-left col-lg-3 col-sm-12">@lang('Comentarios') </label>
                            <div class="col-lg-6 col-md-9">
                                <select class="form-control select2" style="width: 100%" id="kt_select2_3" name="param[]" multiple="multiple">
                                    <optgroup label="@lang('Comentarios positivos')">
                                        @foreach($comments as $comment)
                                        @if('p_' === substr($comment->key,0,2))
                                        <option value="{{ $comment->key }}">{{$comment->es}}</option>
                                        @endif
                                        @endforeach
                                    </optgroup>
                                    <optgroup label="@lang('Comentarios neutros')">
                                        @foreach($comments as $comment)
                                        @if('r_' === substr($comment->key,0,2))
                                        <option value="{{ $comment->key }}">{{$comment->es}}</option>
                                        @endif
                                        @endforeach
                                    </optgroup>
                                    <optgroup label="@lang('Comentarios negativos')">
                                        @foreach($comments as $comment)
                                        @if('n_' === substr($comment->key,0,2))
                                        <option value="{{ $comment->key }}">{{$comment->es}}</option>
                                        @endif
                                        @endforeach
                                    </optgroup>

                                </select>
                            </div>
                        </div>

                        <div class="form-group row" style="justify-content: center;">
                            <label style="justify-content: left;" class="col-xl-3 col-lg-3 col-form-label text-left" for="exampleTextarea">@lang('Otras
                                valoraciones')</label>
                            <div class="col-lg-9 col-xl-6">
                                <textarea style="justify-content: left;" class="form-control" id="exampleTextarea" name="open_comment" rows="3"></textarea>
                            </div>
                        </div>
                        
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">@lang('Cerrar')
                        </button>
                        <button type="submit" class="btn btn-primary font-weight-bold">@lang('Valorar')
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!--end::Modal para comentar un real_estate-->
    <!-- begin: Modal motivo del rechazo de cita-->
    <div class="modal fade" id="reject_modal" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Explique el motivo</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                </button>
                                            </div>
                                            <!--begin::Form-->
                                            <form method="post" id="modal_form_reject_appointment">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-xl-3 col-lg-3 col-form-label text-left">Motivo</label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <textarea required class="form-control" id="exampleTextarea"
                                                                      name="reason" rows="6"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-primary font-weight-bold"
                                                            data-dismiss="modal">Cerrar
                                                    </button>
                                                    <button type="submit" class="btn btn-primary font-weight-bold">
                                                        Rechazar
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
    <!-- end: Modal motivo del rechazo de cita-->

    @endsection

    @section('js')

    <script>
        function setActionRoute(id_appointment){
            console.log(id_appointment)
            document.getElementById('id_form_comment_appointment').action = '/owner/appointments/'+id_appointment+'/comment';
            console.log(document.getElementById('id_form_comment_appointment').action)

        }
        function setRouteAppointmentReject(id_appointment){
            document.getElementById('modal_form_reject_appointment').action = '/owner/appointments/'+id_appointment+'/reject';
        }
    </script>
    <script>
        "use strict";
        // Class definition

        var KTDatatableHtmlTableDemo = function() {
            // Private functions

            // demo initializer
            var demo = function() {

                var datatable = $('#kt_datatable').KTDatatable({
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
                            field: 'Client_name',
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


                $('#kt_datatable_search_status').on('change', function() {
                    datatable.search($(this).val().toLowerCase(), 'Status');
                });

                $('#kt_datatable_search_type').on('change', function() {
                    datatable.search($(this).val().toLowerCase(), 'Type');
                });

                $('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();

            };

            return {
                // Public functions
                init: function() {
                    // init dmeo
                    demo();
                },
            };
        }();

        jQuery(document).ready(function() {
            KTDatatableHtmlTableDemo.init();
        });
    </script>

<script>
        //script para el multiselect
        // Class definition
        var KTSelect2 = function () {
            // Private functions
            var demos = function () {
                // basic
                $('#kt_select2_1').select2({
                    placeholder: "Select a state"
                });

                // nested
                $('#kt_select2_2').select2({
                    placeholder: "Select a state"
                });

                // multi select
                $('#kt_select2_3').select2({
                    placeholder: "Select a state",
                });

                // basic
                $('#kt_select2_4').select2({
                    placeholder: "Select a state",
                    allowClear: true
                });

                // loading data from array
                var data = [{
                    id: 0,
                    text: 'Enhancement'
                }, {
                    id: 1,
                    text: 'Bug'
                }, {
                    id: 2,
                    text: 'Duplicate'
                }, {
                    id: 3,
                    text: 'Invalid'
                }, {
                    id: 4,
                    text: 'Wontfix'
                }];

                $('#kt_select2_5').select2({
                    placeholder: "Select a value",
                    data: data
                });

                // loading remote data

                function formatRepo(repo) {
                    if (repo.loading) return repo.text;
                    var markup = "<div class='select2-result-repository clearfix'>" +
                        "<div class='select2-result-repository__meta'>" +
                        "<div class='select2-result-repository__title'>" + repo.full_name + "</div>";
                    if (repo.description) {
                        markup += "<div class='select2-result-repository__description'>" + repo.description + "</div>";
                    }
                    markup += "<div class='select2-result-repository__statistics'>" +
                        "<div class='select2-result-repository__forks'><i class='fa fa-flash'></i> " + repo.forks_count + " Forks</div>" +
                        "<div class='select2-result-repository__stargazers'><i class='fa fa-star'></i> " + repo.stargazers_count + " Stars</div>" +
                        "<div class='select2-result-repository__watchers'><i class='fa fa-eye'></i> " + repo.watchers_count + " Watchers</div>" +
                        "</div>" +
                        "</div></div>";
                    return markup;
                }

                function formatRepoSelection(repo) {
                    return repo.full_name || repo.text;
                }

                $("#kt_select2_6").select2({
                    placeholder: "Search for git repositories",
                    allowClear: true,
                    ajax: {
                        url: "https://api.github.com/search/repositories",
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            return {
                                q: params.term, // search term
                                page: params.page
                            };
                        },
                        processResults: function (data, params) {
                            // parse the results into the format expected by Select2
                            // since we are using custom formatting functions we do not need to
                            // alter the remote JSON data, except to indicate that infinite
                            // scrolling can be used
                            params.page = params.page || 1;

                            return {
                                results: data.items,
                                pagination: {
                                    more: (params.page * 30) < data.total_count
                                }
                            };
                        },
                        cache: true
                    },
                    escapeMarkup: function (markup) {
                        return markup;
                    }, // let our custom formatter work
                    minimumInputLength: 1,
                    templateResult: formatRepo, // omitted for brevity, see the source of this page
                    templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
                });

                // custom styles

                // tagging support
                $('#kt_select2_12_1, #kt_select2_12_2, #kt_select2_12_3, #kt_select2_12_4').select2({
                    placeholder: "Select an option",
                });

                // disabled mode
                $('#kt_select2_7').select2({
                    placeholder: "Select an option"
                });

                // disabled results
                $('#kt_select2_8').select2({
                    placeholder: "Select an option"
                });

                // limiting the number of selections
                $('#kt_select2_9').select2({
                    placeholder: "Select an option",
                    maximumSelectionLength: 2
                });

                // hiding the search box
                $('#kt_select2_10').select2({
                    placeholder: "Select an option",
                    minimumResultsForSearch: Infinity
                });

                // tagging support
                $('#kt_select2_11').select2({
                    placeholder: "Add a tag",
                    tags: true
                });

                // disabled results
                $('.kt-select2-general').select2({
                    placeholder: "Select an option"
                });
            }

            var modalDemos = function () {
                $('#kt_select2_modal').on('shown.bs.modal', function () {
                    // basic
                    $('#kt_select2_1_modal').select2({
                        placeholder: "Select a state"
                    });

                    // nested
                    $('#kt_select2_2_modal').select2({
                        placeholder: "Select a state"
                    });

                    // multi select
                    $('#kt_select2_3_modal').select2({
                        placeholder: "Select a state",
                    });

                    // basic
                    $('#kt_select2_4_modal').select2({
                        placeholder: "Select a state",
                        allowClear: true
                    });
                });
            }

            // Public functions
            return {
                init: function () {
                    demos();
                    modalDemos();
                }
            };
        }();

        // Initialization
        jQuery(document).ready(function () {
            KTSelect2.init();
        });
    </script>



    @endsection
