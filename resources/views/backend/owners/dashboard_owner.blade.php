@extends('template.template')

@section('top_menu')

@endsection

@section('content')
    <div class="">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h1>@lang('Panel de control')</h1>
                    </div>

                    <div class="card-body">


                        <div class="row">

                            <div class="col-lg-6">
                                <!--begin::Card-->
                                <div class="card card-custom gutter-b">
                                    <!--begin::Header-->
                                    <div class="card-header h-auto">
                                        <!--begin::Title-->
                                        <div class="card-title py-5">
                                            <h3 class="card-label">@lang('Otros datos')</h3>
                                        </div>

                                        <!--end::Title-->
                                    </div>
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-xl-6">
                                                <!--begin: Stats Widget 19-->
                                                <a href="/owner/properties/create" class=" ">

                                                    <button
                                                        class="card card-custom boton2 card-stretch gutter-b shadow-lg height-ios"
                                                        style="width: 100%">
                                                        <!--begin::Body-->
                                                        <div class="card-body ">

                                                            <div class=" justify-content-center">
                                                            <span>
                                                                <div>
                                                            <img height="70"
                                                                 src="{{'/assets/backend/media/logos/inmozon2.png'}}"
                                                                 alt="">

                                                                    <span class="svg-icon svg-icon-5x menu-icon"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Plus.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect  x="0" y="0" width="24" height="24"/>
        <circle style="fill: #fff4de" fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
        <path style="fill: #474747" d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>

                                                                </div>
                                                            <br><br>
															<span class="font-size-h3 font-weight-bold pt-5">
                                                                <!--end::Svg Icon-->
                                                                @if(Auth::user()->owner->type =='promotor')
                                                                @lang('Añadir promoción')
                                                                @else
                                                                @lang('Añadir propiedad')
                                                                @endif
                                                            </span></span>
                                                            </div>
                                                        </div>
                                                        <!--end:: Body-->

                                                    </button>
                                                </a>

                                                <!--end: Stats:Widget 19-->
                                            </div>
                                            <div class="col-xl-6">
                                                <!--begin::Stats Widget 20-->
                                                <div class="card card-custom bg-light-warning card-stretch gutter-b height-ios">
                                                    <!--begin::Body-->
                                                    <div class="card-body my-4 ">
                                                        <a href="{{route('owner.appointments')}}"
                                                           class="card-title font-weight-bolder text-warning font-size-h6 mb-4 text-hover-state-dark d-block text-center">@lang('Nº de citas pendientes de confirmar')</a>
                                                        <div class="font-weight-bold text-muted font-size-sm">
                                                            <span
                                                                class="text-dark-75 font-weight-bolder font-size-h2 mr-2 d-flex justify-content-center">{{ $count_pending_appointments}}</span>
                                                        </div>
                                                    </div>
                                                    <!--end::Body-->
                                                </div>
                                                <!--end::Stats Widget 20-->
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <!--begin: Stats Widget 19-->
                                                <div class="card card-custom bg-light-success card-stretch gutter-b height-ios">

                                                    <!--begin::Body-->
                                                    <div class="card-body my-3 " >
                                                        <a href="#"
                                                           class="card-title font-weight-bolder text-success text-hover-state-dark font-size-h6 mb-4 d-block text-center">@lang('Nº de inmobiliarias que tienen nuestras propiedades en favoritos:')</a>
                                                        <div class="font-weight-bold text-muted font-size-sm">
                                                            <span
                                                                class="text-dark-75 font-size-h2 font-weight-bolder mr-2 d-flex justify-content-center">{{ $count_re_favs }}</span>
                                                        </div>
                                                    </div>
                                                    <!--end:: Body-->
                                                </div>
                                                <!--end: Stats:Widget 19-->
                                            </div>
                                            <div class="col-xl-6">
                                                <!--begin::Stats Widget 20-->
                                                <div class="card card-custom bg-light-warning card-stretch gutter-b height-ios">
                                                    <!--begin::Body-->
                                                    <div class="card-body my-4 ">
                                                        <a href="#"
                                                           class="card-title font-weight-bolder text-warning font-size-h6 mb-4 text-hover-state-dark d-block text-center">@lang('Nº de inmobiliarias que tienen ficha abierta con nuestras propiedades')</a>
                                                        <div class="font-weight-bold text-muted font-size-sm">
                                                            <span
                                                                class="text-dark-75 font-weight-bolder font-size-h2 mr-2 d-flex justify-content-center">{{ $count_re_total_open_cards}}</span>
                                                        </div>
                                                    </div>
                                                    <!--end::Body-->
                                                </div>
                                                <!--end::Stats Widget 20-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Card-->
                            </div>

                            <div class="col-lg-6">
                                <!--begin::Card-->
                                <!--begin::Card-->
                                <div class="card card-custom gutter-b">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h3 class="card-label">@lang('Mis citas')</h3>
                                        </div>
                                    </div>
                                    <div class="card-body ">
                                        <!--begin::Chart-->
                                        <div class="timeline timeline-5 mt-3 ">

                                        @foreach($appointments as $appointment)
                                            @if(($appointment->date < Carbon\Carbon::now())) <!--begin::Item-->
                                                <div class="timeline-item align-items-start ">
                                                    <!--begin::Label-->
                                                    <div
                                                        class="timeline-label font-weight-bolder text-dark-75 font-size-lg ">
                                                        Ant.
                                                    </div>
                                                    <!--end::Label-->
                                                    <!--begin::Badge-->
                                                    <div class="timeline-badge">
                                                        <i class="fa fa-genderless text-warning icon-xl"></i>
                                                    </div>
                                                    <!--end::Badge-->
                                                    <!--begin::Text-->
                                                    <div
                                                        class="font-weight-mormal font-size-lg timeline-content text-muted pl-3">
                                                        <b>{{ $appointment->date }}</b> {{ $appointment->commercial_name }}
                                                        @if(($appointment->status_name) == 'Aceptada')
                                                            <span id="id_status"
                                                                  class="label font-weight-bold label-lg  label-light-info label-inline bg-success"
                                                                  style="color: black">
														@elseif(($appointment->status_name) == 'Rechazada')
                                                                    <span id="id_status"
                                                                          class="label font-weight-bold label-lg  label-light-info label-inline bg-danger"
                                                                          style="color: black">
															@elseif(($appointment->status_name) == 'Pendiente')
                                                                            <span id="id_status"
                                                                                  class="label font-weight-bold label-lg  label-light-info label-inline bg-warning"
                                                                                  style="color: black">
																@elseif(($appointment->status_name) == 'Valorada')
                                                                                    <span id="id_status"
                                                                                          class="label font-weight-bold label-lg  label-light-info label-inline bg-info"
                                                                                          style="color: black">
																	@endif{{ $appointment->status_name }}</span>

                                                                                    <a href="/properties/{{$appointment->property_id}}"><i
                                                                                            class="font-size-sm">#{{$appointment->property_id}}</i></a></span>
                                                    </div>
                                                    <!--end::Text-->
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                @else
                                                    <div class="timeline-item align-items-start">
                                                        <!--begin::Label-->
                                                        <div
                                                            class="timeline-label font-weight-bolder text-dark-75 font-size-md">
                                                            Prox.
                                                        </div>
                                                        <!--end::Label-->
                                                        <!--begin::Badge-->
                                                        <div class="timeline-badge">
                                                            <i class="fa fa-genderless text-success icon-xl"></i>
                                                        </div>
                                                        <!--end::Badge-->
                                                        <!--begin::Content-->
                                                        <div class="timeline-content d-flex">
													<span
                                                        class="font-weight-bolder text-dark-75 pl-3 font-size-lg"><b>{{ $appointment->date }}</b> {{ $appointment->commercial_name }}
                                                        @if(($appointment->status_name) == 'Aceptada')
                                                            <span id="id_status"
                                                                  class="label font-weight-bold label-lg  label-light-info label-inline bg-success"
                                                                  style="color: black">
															@elseif(($appointment->status_name) == 'Rechazada')
                                                                    <span id="id_status"
                                                                          class="label font-weight-bold label-lg  label-light-info label-inline bg-danger"
                                                                          style="color: black">
																@elseif(($appointment->status_name) == 'Pendiente')
                                                                            <span id="id_status"
                                                                                  class="label font-weight-bold label-lg  label-light-info label-inline bg-warning"
                                                                                  style="color: black">
																	@elseif(($appointment->status_name) == 'Valorada')
                                                                                    <span id="id_status"
                                                                                          class="label font-weight-bold label-lg  label-light-info label-inline bg-info"
                                                                                          style="color: black">
																		@endif{{ $appointment->status_name }}</span>

                                                                                    <a href="/properties/{{$appointment->property_id}}"><i
                                                                                            class="font-size-sm">#{{$appointment->property_id}}</i></a></span>
                                                        </div>
                                                        <!--end::Content-->
                                                    </div>
                                            @endif
                                        @endforeach
                                        <!--end::Item-->
                                        </div>
                                        <!--end::Chart-->
                                    </div>
                                </div>
                                <!--end::Card-->
                                <!--end::Card-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('js')

    <script>
        "use strict";

        // Shared Colors Definition
        const primary = '#6993FF';
        const success = '#1BC5BD';
        const info = '#8950FC';
        const warning = '#FFA800';
        const danger = '#F64E60';

        // Class definition
        function generateBubbleData(baseval, count, yrange) {
            var i = 0;
            var series = [];
            while (i < count) {
                var x = Math.floor(Math.random() * (750 - 1 + 1)) + 1;
                ;
                var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;
                var z = Math.floor(Math.random() * (75 - 15 + 1)) + 15;

                series.push([x, y, z]);
                baseval += 86400000;
                i++;
            }
            return series;
        }

        function generateData(count, yrange) {
            var i = 0;
            var series = [];
            while (i < count) {
                var x = 'w' + (i + 1).toString();
                var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;

                series.push({
                    x: x,
                    y: y
                });
                i++;
            }
            return series;
        }

        var KTApexChartsDemo = function () {


            // Private functions
            var _demo1 = function () {
                const apexChart = "#chart_1";
                var options = {
                    series: [{
                        name: "Nº fichas",
                        data: {
                        {
                            json_encode($open_cards)
                        }
                }
            }],
                chart: {
                    height: 350,
                        type
                :
                    'area',
                        zoom
                :
                    {
                        enabled: false
                    }
                }
            ,
                dataLabels: {
                    enabled: false
                }
            ,
                stroke: {
                    curve: 'smooth'
                }
            ,
                grid: {
                    row: {
                        colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                            opacity
                    :
                        0.5
                    }
                ,
                }
            ,
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dic'],
                }
            ,
                colors: [primary]
            }
                ;

                var chart = new ApexCharts(document.querySelector(apexChart), options);
                chart.render();
            }

            var _demo2 = function () {
                const apexChart = "#chart_2";
                var options = {
                    series: [{
                        name: 'series1',
                        data: [31, 40, 28, 51, 42, 109, 100]
                    }, {
                        name: 'series2',
                        data: [11, 32, 45, 32, 34, 52, 41]
                    }],
                    chart: {
                        height: 350,
                        type: 'area'
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth'
                    },
                    xaxis: {
                        type: 'datetime',
                        categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                    },
                    tooltip: {
                        x: {
                            format: 'dd/MM/yy HH:mm'
                        },
                    },
                    colors: [primary, success]
                };

                var chart = new ApexCharts(document.querySelector(apexChart), options);
                chart.render();
            }

            var _demo3 = function () {
                const apexChart = "#chart_3";
                var options = {
                    series: [{
                        name: 'Nº de inmobiliarias que tienen alguna propiedad en favoritos',
                        data: [5]
                    }, {
                        name: 'Nº de inmos con ficha abierta',
                        data: [6]
                    }],
                    chart: {
                        type: 'bar',
                        height: 350
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '20%',
                            //endingShape: 'rounded'
                        },
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                    },
                    xaxis: {
                        categories: [''],
                    },
                    yaxis: {
                        title: {
                            text: 'Nº'
                        }
                    },
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                //return "$ " + val + " thousands"
                                return val
                            }
                        }
                    },
                    colors: [primary, success, warning]
                };

                var chart = new ApexCharts(document.querySelector(apexChart), options);
                chart.render();
            }


            var _demo4 = function () {
                const apexChart = "#chart_4";
                var options = {
                    series: [{
                        name: 'Marine Sprite',
                        data: [44, 55, 41, 37, 22, 43, 21]
                    }, {
                        name: 'Striking Calf',
                        data: [53, 32, 33, 52, 13, 43, 32]
                    }, {
                        name: 'Tank Picture',
                        data: [12, 17, 11, 9, 15, 11, 20]
                    }, {
                        name: 'Bucket Slope',
                        data: [9, 7, 5, 8, 6, 9, 4]
                    }, {
                        name: 'Reborn Kid',
                        data: [25, 12, 19, 32, 25, 24, 10]
                    }],
                    chart: {
                        type: 'bar',
                        height: 350,
                        stacked: true,
                    },
                    plotOptions: {
                        bar: {
                            horizontal: true,
                        },
                    },
                    stroke: {
                        width: 1,
                        colors: ['#fff']
                    },
                    title: {
                        text: 'Fiction Books Sales'
                    },
                    xaxis: {
                        categories: [2008, 2009, 2010, 2011, 2012, 2013, 2014],
                        labels: {
                            formatter: function (val) {
                                return val + "K"
                            }
                        }
                    },
                    yaxis: {
                        title: {
                            text: undefined
                        },
                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return val + "K"
                            }
                        }
                    },
                    fill: {
                        opacity: 1
                    },
                    legend: {
                        position: 'top',
                        horizontalAlign: 'left',
                        offsetX: 40
                    },
                    colors: [primary, success, warning, danger, info]
                };

                var chart = new ApexCharts(document.querySelector(apexChart), options);
                chart.render();
            }
            var _demo11 = function () {
                const apexChart = "#chart_11";
                var options = {
                    series: [44, 55, 41, 17, 15],
                    chart: {
                        width: 380,
                        type: 'donut',
                    },
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 200
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }],
                    colors: [primary, success, warning, danger, info]
                };

                var chart = new ApexCharts(document.querySelector(apexChart), options);
                chart.render();
            }

            var _demo13 = function () {
                const apexChart = "#chart_13";
                var options = {
                    series: [5, 10],
                    chart: {
                        height: 350,
                        type: 'radialBar',
                    },
                    plotOptions: {
                        radialBar: {
                            dataLabels: {
                                name: {
                                    fontSize: '22px',
                                },
                                value: {
                                    fontSize: '16px',
                                },
                                total: {
                                    show: true,
                                    label: 'Total',
                                    formatter: function (w) {
                                        // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                                        return 249
                                    }
                                }
                            }
                        }
                    },
                    labels: ['Apples', 'Oranges', 'Bananas', 'Berries'],
                    colors: [primary, success, warning, danger]
                };

                var chart = new ApexCharts(document.querySelector(apexChart), options);
                chart.render();
            }


            return {
                // public functions
                init: function () {
                    _demo1();
                    _demo2();
                    _demo3();
                    _demo4();
                    _demo11();
                    _demo13();

                }
            };
        }();

        jQuery(document).ready(function () {
            KTApexChartsDemo.init();
        });
    </script>
@endsection
@section('css')

@endsection
