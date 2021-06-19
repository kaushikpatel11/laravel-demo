@extends('template.template')

@section('top_menu')

@endsection

@section('content')
    <!--begin::Card-->

    <div class="card">

        <div class="card-header">
            @if (Request::is('real_estate/*/show'))
                <h1>@lang('Datos de la inmobiliaria')</h1>
            @else
                <h1>@lang('Rellena tus datos')</h1>
            @endif
        </div>

        <div class="card card-custom card-stretch">

            <!--begin::Form-->
            @if(isset($item))
                <form id="create_real_estate_form" class="form" method="post"
                      action="{{route('real_estate.update',['real_estate' => $item['real_estate']['id']])}}">
                    @method('put')
                    @else
                        <form id="create_real_estate_form" class="form" method="post"
                              action="{{route('real_estate.store')}}">
                            @endif
                            @csrf
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                       aria-controls="home" aria-selected="true">@lang('General')</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="location-tab" data-toggle="tab" href="#location" role="tab"
                                       aria-controls="zone" aria-selected="false">@lang('Oficina')</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="zone-tab" data-toggle="tab" href="#zone" role="tab"
                                       aria-controls="zone" aria-selected="false">@lang('Zonas de trabajo')</a>
                                </li>
@if(isset($rating))

                                <li class="nav-item">
                                    <a class="nav-link" onclick="shortDatatable()" id="rating-tab" data-toggle="tab" href="#rating" role="tab"
                                       aria-controls="zone" aria-selected="false">@lang('Valoraciones')</a>
                                </li>
                                @endif
                            </ul>

                            {{--
                              -- TAB CONTENTS
                              --}}

                            <div class="tab-content p-10" id="myTabContent">
                                {{--
                                  -- TAB CONTENTS
                                  -- HOME TAB DIV
                                  --}}
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                     aria-labelledby="home-tab">
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        <input id="prodId" name="status" type="hidden" value="{{isset($item['real_estate']['status']) ? $item['real_estate']['status'] : '' }}">
                                        <div class="form-group row" style="justify-content: center;">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Razón social')</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input id="razon_social" class="form-control form-control-lg form-control-solid"
                                                       type="text" name="business_name"
                                                       value="{{old('business_name', isset($item) ? $item['real_estate']['business_name'] : '')}}"
                                                       placeholder="@lang('Razón social')" required
                                                       oninvalid=" Swal.fire('El campo razón social es obligatorio ', '¡Revisa el campo razón social!', 'warning');
                                                       document.getElementById('razon_social').className +='border border-danger' "
                                    onchange=" document.getElementById('razon_social').className ='form-control form-control-lg form-control-solid' " class="form-control form-control-solid">
                                            </div>
                                        </div>
                                        <div class="form-group row" style="justify-content: center;">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Nombre comercial')</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input id="commercial_name" class="form-control form-control-lg form-control-solid"
                                                       type="text" name="commercial_name"
                                                       value="{{old('commercial_name', isset($item) ? $item['real_estate']['commercial_name'] : '')}}"
                                                       placeholder="@lang('Nombre comercial')" required
                                                       oninvalid="Swal.fire('El nombre comercial es obligatorio ', '¡Revisa el campo nombre comercial!', 'warning');
                                                        document.getElementById('commercial_name').className +='border border-danger' "
                                    onchange=" document.getElementById('commercial_name').className ='form-control form-control-lg form-control-solid' " class="form-control form-control-solid">
                                            </div>
                                        </div>
                                        @if (!$edit_active)
                                        <div class="form-group row justify-content-center">
                                                    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Correo Electrónico')</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="la la-at"></i>
                                                            </span>
                                                            </div>
                                                            <input type="text"
                                                                   class="form-control form-control-lg form-control-solid"
                                                                   value="{{$item['real_estate']['user_email']}}" name="email"
                                                                   placeholder="@lang('Correo Electrónico')" required
                                                                   >
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                <div class="form-group row" style="justify-content: center;">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-left">Dirección web</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control form-control-lg form-control-solid"
                                                       type="text" name="web"
                                                       value="{{old('web', isset($item) ? $item['real_estate']['web'] : '')}}"
                                                       placeholder="Dirección web" >
                                            </div>

                                        </div>
                                        <div class="form-group row" style="justify-content: center;">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Nif')</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input  id="nif" class="form-control form-control-lg form-control-solid"
                                                       type="text" name="vat_number"
                                                       value="{{old('vat_number', isset($item) ? $item['real_estate']['vat_number'] : '')}}"
                                                       placeholder="@lang('Nif')"  
                                                       oninvalid="Swal.fire('El NIF es obligatorio ', '¡Revisa el campo NIF!', 'warning');
                                                        document.getElementById('nif').className +='border border-danger' "
                                    onchange=" document.getElementById('nif').className ='form-control form-control-lg form-control-solid' " class="form-control form-control-solid">
                                            </div>

                                        </div>
                                        <div class="form-group row" style="justify-content: center;">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Nombre')</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input id="name" class="form-control form-control-lg form-control-solid"
                                                       type="text" name="name"
                                                       value="{{old('name', isset($item) ? $item['real_estate']['name'] : '')}}"
                                                       placeholder="@lang('Nombre')" minlength="3" maxlength="24" required
                                                       oninvalid="Swal.fire('El nombre es obligatorio ', '¡Revisa el campo nombre!', 'warning');
                                                        document.getElementById('name').className +='border border-danger' "
                                    onchange=" document.getElementById('name').className ='form-control form-control-lg form-control-solid' " class="form-control form-control-solid">
                                            </div>

                                        </div>
                                        <div class="form-group row" style="justify-content: center;">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Apellidos')</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input id="surname" class="form-control form-control-lg form-control-solid"
                                                       type="text" name="surname"
                                                       value="{{old('surname', isset($item) ? $item['real_estate']['surname'] : '')}}"
                                                       placeholder="@lang('Apellidos')" minlength="3" maxlength="24" required
                                                       oninvalid="Swal.fire('El campo apellidos es obligatorio', '¡Revisa el campo apellidos!', 'warning');
                                                        document.getElementById('surname').className +='border border-danger' "
                                    onchange=" document.getElementById('surname').className ='form-control form-control-lg form-control-solid' " class="form-control form-control-solid">
                                            </div>
                                        </div>
                                        <div class="form-group row" style="justify-content: center;">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Teléfono de contacto')</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-phone"></i>
                                            </span>
                                                    </div>
                                                    <input id="phone_1" type="text"
                                                           class="form-control form-control-lg form-control-solid"
                                                           value="{{old('phone_1', isset($item) ?$item['real_estate']['phone_1'] : '')}}"
                                                           name="phone_1" placeholder="@lang('Teléfono')" minlength="9" required
                                                           oninvalid="Swal.fire('El teléfono debe tener almenos 6 dígitos ', '¡Revisa el teléfono!', 'warning');
                                                            document.getElementById('phone_1').className +='border danger-tel' "
                                                            onchange=" document.getElementById('phone_1').className ='form-control form-control-lg form-control-solid' " class="form-control form-control-solid">
                                                </div>

                                            </div>
                                        </div>
                                        @if (!Request::is('real_estate'))

                                        <div  class="form-group row" style="justify-content: center;">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Telefono de contacto adicional')</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-phone"></i>
                                            </span>
                                                    </div>
                                                    <input type="text" id="phone_2"
                                                           class="form-control form-control-lg form-control-solid"
                                                           value="{{old('phone_2', isset($item) ? $item['real_estate']['phone_2'] : '')}}"
                                                           name="phone_2" placeholder="@lang('Teléfono adicional')" minlength="9"
                                                           oninvalid="Swal.fire('El teléfono debe tener almenos 6 dígitos ', '¡Revisa el teléfono!', 'warning');
                                                            document.getElementById('phone_2').className +='border danger-tel' "
                                                            onchange=" document.getElementById('phone_2').className ='form-control form-control-lg form-control-solid' " class="form-control form-control-solid"
                                                           >
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @if (Auth::user()->type == "real_estate" || Auth::user()->type == "admin")

                                            <div class="form-group row" style="justify-content: center;">
                                                <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                                       for="exampleSelect1">@lang('Donde nos has conocido')</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <select class="form-control form-control-solid" name="origin">
                                                        <option value="" {{ !isset($item['real_estate']['origin']) ? 'selected' : '' }} disabled hidden >Select</option>
                                                        <option {{ (isset($item['real_estate']['origin']) && "Comerciales"==$item['real_estate']['origin']) ? 'selected' : '' }} >Comerciales</option>
                                                        <option {{ (isset($item['real_estate']['origin']) && "Internet o redes sociales"==$item['real_estate']['origin']) ? 'selected' : '' }} >Internet o redes sociales</option>
                                                        <option {{ (isset($item['real_estate']['origin']) && "Otros"==$item['real_estate']['origin']) ? 'selected' : '' }} >Otros</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row" style="justify-content: center;">
                                                <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                                       for="exampleSelect1">@lang('Idioma')</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <select class="form-control form-control-solid" name="language">
                                                    <option value="es" {{(isset($item['real_estate']['language']) && "es"==$item['real_estate']['language'])  ? 'selected' : ''}}>@lang('Español')</option>                                                           
                                                    <option value="fr" {{(isset($item['real_estate']['language']) && "fr"==$item['real_estate']['language'])  ? 'selected' : ''}}>@lang('Francés')</option>                                                           
                                                    <option value="en" {{(isset($item['real_estate']['language']) && "en"==$item['real_estate']['language'])  ? 'selected' : ''}}>@lang('Inglés')</option>                                                           
                                                    </select>
                                                </div>
                                            </div>
                                        @endif

                                        
                                        @if(isset($item['real_estate']['id']))
                                        <div class="form-group row" style="justify-content: center;">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-left ">@lang('Valoración media')</label>
                                            <div class="col-lg-9 col-xl-6 ">

                                            <span
                                                class="font-weight-bold d-flex align-items-center pl-5"
                                                style="width: 110px;">{{isset($rating) ? $rating : 0.0}}
                                                @for ( $i = 0 ;  $i< floor($rating ?? 0); $i++)
                                                    <span class="svg-icon svg-icon-primary svg-icon-2x "><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Star.svg--><svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                           fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                                            <path
                                                                d="M12,18 L7.91561963,20.1472858 C7.42677504,20.4042866 6.82214789,20.2163401 6.56514708,19.7274955 C6.46280801,19.5328351 6.42749334,19.309867 6.46467018,19.0931094 L7.24471742,14.545085 L3.94038429,11.3241562 C3.54490071,10.938655 3.5368084,10.3055417 3.92230962,9.91005817 C4.07581822,9.75257453 4.27696063,9.65008735 4.49459766,9.61846284 L9.06107374,8.95491503 L11.1032639,4.81698575 C11.3476862,4.32173209 11.9473121,4.11839309 12.4425657,4.36281539 C12.6397783,4.46014562 12.7994058,4.61977315 12.8967361,4.81698575 L14.9389263,8.95491503 L19.5054023,9.61846284 C20.0519472,9.69788046 20.4306287,10.2053233 20.351211,10.7518682 C20.3195865,10.9695052 20.2170993,11.1706476 20.0596157,11.3241562 L16.7552826,14.545085 L17.5353298,19.0931094 C17.6286908,19.6374458 17.263103,20.1544017 16.7187666,20.2477627 C16.5020089,20.2849396 16.2790408,20.2496249 16.0843804,20.1472858 L12,18 Z"
                                                                fill="#000000"/>
                                                        </g>
                                                    </svg><!--end::Svg Icon--></span>
                                                @endfor
                                                   </span>
                                            </div>
                                        </div>
                                        @endif
                                        {{-- STATUS --}}
                                        @if (Auth::user()->type == "admin")

                                            <div class="form-group row" style="justify-content: center;">
                                                <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Estado')</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="input-group input-group-lg input-group-solid">
                                                        <select id="select_status"
                                                                class="form-control form-control-lg form-control-solid"
                                                                name="status" required>
                                                            <option
                                                                value='0' {{isset($item) ? (\App\RealEstate::INACTIVE == $item['real_estate']['status'] || \App\RealEstate::INACTIVE == @old('status')) ? 'selected' : '' : ''}}>
                                                                @lang('Inactivo')
                                                            </option>
                                                            <option
                                                                value='1' {{isset($item) ? (\App\RealEstate::TRIAL_PERIOD == $item['real_estate']['status'] || \App\RealEstate::TRIAL_PERIOD == @old('status')) ? 'selected' : '' : ''}}>
                                                                @lang('En pruebas')
                                                            </option>
                                                            <option
                                                                value='2' {{isset($item) ? (\App\RealEstate::VALIDATED == $item['real_estate']['status'] || \App\RealEstate::VALIDATED == @old('status')) ? 'selected' : '' : ''}}>
                                                                @lang('Validado')
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        {{-- end STATUS --}}

                                    </div>

                                    <!--end::Body-->
                                </div>
                                {{--
                                  -- TAB CONTENTS
                                  -- LOCATION TAB DIV
                                  --}}

                                <div class="tab-pane fade show" id="location" role="tabpanel"
                                     aria-labelledby="location-tab">
                                    <div class="row">
                                        <label class="col-xl-3"></label>
                                        <div class="col-lg-9 col-xl-6">
                                            <h5 class="font-weight-bold mb-6 text-center">@lang('Ubicación de la inmobiliaria')</h5>
                                        </div>
                                    </div>

                                    {{--BEGIN TABLE LOCATIONS --}}
                                    <div class="row ml-10 mr-10">
                                        <div class="table-responsive">
                                            <table id="location_table" class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col">@lang('País')</th>
                                                    <th scope="col">@lang('Autonomía')</th>
                                                    <th scope="col">@lang('Provincia')</th>
                                                    <th scope="col">@lang('Calle')</th>
                                                    <th scope="col">@lang('Acción')</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(isset($item['locations']))
                                                    @foreach($item['locations'] as $location)
                                                        <tr>
                                                            <td><input type="hidden" name="locations[pkey_id][]"
                                                                       value="{{$location['id']}}">
                                                                <input type="hidden" name="locations[country_id][]"
                                                                       value="{{$location['country_id']}}">
                                                                <input type="hidden" name="locations[state_id][]"
                                                                       value="{{$location['state_id']}}">
                                                                <input type="hidden" name="locations[county_id][]"
                                                                       value="{{$location['county_id']}}">
                                                                <input type="hidden" name="locations[city_id][]"
                                                                       value="{{$location['city_id']}}">
                                                                <input type="hidden" name="locations[street][]"
                                                                       value="{{$location['street']}}">
                                                                <input type="hidden" name="locations[postcode][]"
                                                                       value="{{$location['postcode']}}">
                                                                <input type="hidden" name="locations[latitude][]"
                                                                       value="{{$location['latitude']}}">
                                                                <input type="hidden" name="locations[longitude][]"
                                                                       value="{{$location['longitude']}}">
                                                                {{$location['country_name']}}
                                                            </td>
                                                            <td>{{$location['state_name']}}</td>
                                                            <td>{{$location['county_name']}}</td>
                                                            <td>{{$location['street'] . ', ' . $location['postcode'] . ', ' .$location['city_name']}}</td>
                                                            <td>
                                                                <button type="button"
                                                                        class="btn btn-icon btn-danger btnZoneTableDelete"
                                                                        onclick="removeRow(this)"><i
                                                                        class="flaticon2-delete"></i></button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    {{--END TABLE LOCATIONS --}}


                                    {{--BEGIN LOCATION FIELDS --}}
                                    @if ($edit_active)
                                    <h2 class="d-flex justify-content-center">@lang('Añadir posición')</h2>

                                    @include('backend.includes.zoneFormFieldsVertical')

                                    @endif



                                    {{--END LOCATION FIELDS --}}
                                </div>
                                {{--
                                  -- TAB CONTENTS
                                  -- ZONE TAB DIV
                                  --}}

                                <div class="tab-pane fade show" id="zone" role="tabpanel" aria-labelledby="zone-tab">
                                    <div class="row">
                                        <label class="col-xl-3"></label>
                                        <div class="col-lg-9 col-xl-6">
                                            <h5 class="font-weight-bold mb-6 text-center">@lang('Zonas de trabajo')</h5>
                                        </div>
                                    </div>



                                    {{--BEGIN TABLE ZONES --}}
                                    <div class="row ml-10 mr-10">
                                        <div class="table-responsive">
                                            <table id="zone_table" class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col">@lang('Tipo')</th>
                                                    <th scope="col">@lang('Zona')</th>
                                                    <th scope="col">@lang('Acción')</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(isset($item['zones']))
                                                    @foreach($item['zones'] as $zone)
                                                        <tr>
                                                            <td><input type="hidden" name="zones[pkey_id][]"
                                                                       value="{{$zone['id']}}"><input type="hidden"
                                                                                                      name="zones[id][]"
                                                                                                      value="{{$zone['zoneable_id']}}">{{$zone['text_type']}}
                                                            </td>
                                                            <td><input type="hidden" name="zones[model][]"
                                                                       value="{{$zone['zoneable_type']}}">{{$zone['text_name']}}
                                                            </td>
                                                            <td >
                                                                <button type="button"
                                                                        class="btn btn-icon btnZoneTableDelete"
                                                                        onclick="removeRowZone(this)"><span
                                                                        class="svg-icon svg-icon-2x menu-icon"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-08-25-063451/theme/html/demo1/dist/../src/media/svg/icons/Code/Error-circle.svg--><svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            width="24px" height="24px"
                                                                            viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
        <path style="fill:#ff2d00"
              d="M12.0355339,10.6213203 L14.863961,7.79289322 C15.2544853,7.40236893 15.8876503,7.40236893 16.2781746,7.79289322 C16.6686989,8.18341751 16.6686989,8.81658249 16.2781746,9.20710678 L13.4497475,12.0355339 L16.2781746,14.863961 C16.6686989,15.2544853 16.6686989,15.8876503 16.2781746,16.2781746 C15.8876503,16.6686989 15.2544853,16.6686989 14.863961,16.2781746 L12.0355339,13.4497475 L9.20710678,16.2781746 C8.81658249,16.6686989 8.18341751,16.6686989 7.79289322,16.2781746 C7.40236893,15.8876503 7.40236893,15.2544853 7.79289322,14.863961 L10.6213203,12.0355339 L7.79289322,9.20710678 C7.40236893,8.81658249 7.40236893,8.18341751 7.79289322,7.79289322 C8.18341751,7.40236893 8.81658249,7.40236893 9.20710678,7.79289322 L12.0355339,10.6213203 Z"
              fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span></button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    {{--END TABLE ZONES --}}

                                    {{--BEGIN ZONE FIELDS --}}
                                    @if ($edit_active)

                                    <div class="row">
                                        <label class="col-xl-3"></label>
                                        <div class="col-lg-9 col-xl-6">
                                            <h5 class="font-weight-bold mb-6 text-center">Añadir Zona</h5>
                                        </div>
                                    </div>

                                    @include('backend.includes.zoneFormFieldsHorizontal')

                                    <div class="card-footer text-center">
                                        <div class="card-toolbar">
                                            <button type="button" class="btn btn-primary mr-2 addZone">@lang('Añadir')
                                            </button>
                                        </div>
                                    </div>
@endif
                                    {{--END ZONE FIELDS --}}

                                </div>


                                {{--
                                  -- TAB CONTENTS
                                  -- RATINGS
                                  --}}
@if(isset($rating))

                                <div class="tab-pane fade show"         id="rating" role="tabpanel"
                                     aria-labelledby="rating-tab">

                                    <div class="row justify-content-center">
                                        <div class="col-md-12 p-10">
                                            <h5 class="font-weight-bold mb-6 text-center">@lang('Valoraciones')</h5>
                                            <!--begin: Datatable-->

                                            <div class="datatable datatable-bordered datatable-head-custom"
                                                 id="kt_datatable">

                                                <table class="datatable  datatable-bordered datatable-head-custom"
                                                       id="kt_datatable">
                                                    <thead class="datatable-head">

                                                    <tr class="datatable-row">

                                                        <th data-field="rating" class="datatable-cell ">
                                                            <span>@lang('Puntuación')</span></th>
                                                        <th data-field="comment"
                                                            class="datatable-cell "><span
                                                            >@lang('Comentarios')</span></th>

                                                    </tr>

                                                    </thead>
                                                    <tbody>

                                                            @if(isset($item['ratings']))
                                                                @foreach ($item['ratings'] as $rating)
                                                            <tr class="datatable-row">

                                                                <td data-field="rating" class="datatable-cell"><span
                                                                        > @for ( $i=0, $j=0; $j<5; $j++, $i++ )
                                                                            @if ($i<$rating['rating'])

                                                                                <span class="fa fa-star checked"></span>
                                                                            @else
                                                                                <span class="fa fa-star"></span>
                                                                            @endif
                                                                        @endfor
                                                                        {{$rating['rating'].".0" }}</span></td>

                                                                <td data-field="comment" class="datatable-cell"><p style="text-align: justify"
                                                                        >{{$rating['comment_key_translated']}}</p></td>

                                                            </tr>

                                                                @endforeach
                                                            @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
@endif
                                {{--
                                  --    END RATINGS TAB
                                  --}}
                                <div class="card-footer text-center">
                                    <div class="card-toolbar">
                                        @if(isset($show_create_rating_button) && $show_create_rating_button)
                                            <!-- <button id="comment_button" type="button" class="btn btn-primary"
                                                    data-toggle="modal"
                                                    data-target="#rating_modal">Comentar
                                            </button> -->
                                        @endif
                                        @if ($edit_active)
                                            <button type="button"  id="next_button" onclick="next()" class="btn btn-success mr-2" >Siguiente</button>

                                            <button type="submit" class="btn btn-success mr-2" style="display: none;" id="end_button"
                                                   >@lang('Guardar')
                                            </button>
                                            <button type="reset" class="btn btn-secondary">@lang('Cancelar')</button>
                                        @endif
                                        @if (Auth::user()->type == "admin")
                                            @if ($item['real_estate']['status']== '0')
                                                <button type="submit" form="form_validate_re"
                                                        class="btn btn-success mr-2">@lang('Validar')
                                                </button>
                                                <button type="submit" form="form_to_trial" class="btn btn-success mr-2">
                                                    @lang('Volver a estado de prueba')
                                                </button>

                                            @elseif($item['real_estate']['status']== '1')
                                                <button type="submit" form="form_validate_re"
                                                        class="btn btn-success mr-2">@lang('Validar')
                                                </button>
                                                <button type="submit" form="form_deactivate_re"
                                                        class="btn btn-success mr-2">@lang('Desactivar')
                                                </button>

                                            @else
                                                <button type="submit" form="form_deactivate_re"
                                                        class="btn btn-success mr-2">@lang('Desactivar')
                                                </button>
                                                <button type="submit" form="form_to_trial" class="btn btn-success mr-2">
                                                    @lang('Volver a estado de prueba')
                                                </button>

                                            @endif


                                        @endif
                                    </div>
                                </div>

                            </div>
                        </form>
                        <!--end::Form-->
        </div>

    </div>
    <!--end::Card-->
    @if(isset($item['real_estate']['id']))
    <!--Form para enviar un post a la ruta, tiene que estar fuera del form general-->
    <form method="post" id="form_validate_re"
          action="/admin/real_estates/{{ $item['real_estate']['id']}}/validate">
        @csrf
    </form>
    <!--Form para enviar un post a la ruta, tiene que estar fuera del form general-->
    <form method="post" id="form_to_trial"
          action="/admin/real_estates/{{ $item['real_estate']['id']}}/to_trial">
        @csrf
    </form>
    <!--Form para enviar un post a la ruta, tiene que estar fuera del form general-->
    <form method="post" id="form_deactivate_re"
          action="/admin/real_estates/{{ $item['real_estate']['id']}}/deactivate">
        @csrf
    </form>
    @endif
    {{--
      -- MODAL PARA COMENTAR UNA INMOBILIARIA
      --}}
    @if(isset($item))
        <!--begin::Modal para comentar un real_estate-->
        <div class="modal fade " id="rating_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">@lang('Valorar inmobiliaria')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <!--begin::Form-->
                    <form method="post" id="form_rating"
                          action=" {{ route('real_estate.comment', ['id'=>$item['real_estate']['id'] ]) }}">
                        @csrf
                        <input name="property_id_hidden" type="hidden" value="">
                        <div class="modal-body">

                            <div class="form-group row text-center" style="justify-content: center;">
                                <label
                                    class="col-xl-3 col-lg-3 col-form-label text-left"
                                    for="exampleSelect1">@lang('Valoración')</label>
                                <div class="col-lg-12 col-xl-6">
                                    <select class="form-control form-control-solid" name="rating"
                                            id="propertyable_type" value="">
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
                                    <select class="form-control select2" style="width: 100%" id="kt_select2_3"
                                            name="param[]" multiple="multiple">
                                        <optgroup label="@lang('Comentarios positivos')">
                                            @foreach($comments as $comment)
                                                @if('p_' === substr($comment->key,0,2))
                                                    <option value="{{ $comment->key }}">{{$comment->es}}</option>
                                                @endif
                                            @endforeach
                                        </optgroup>
                                        <optgroup label="@lang('Comentarios regulares')">
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
                                <label style="justify-content: left;"
                                       class="col-xl-3 col-lg-3 col-form-label text-left" for="exampleTextarea">@lang('Otras valoraciones')</label>
                                <div class="col-lg-9 col-xl-6">
                                            <textarea style="justify-content: left;" class="form-control"
                                                      id="exampleTextarea" name="open_comment" rows="3"></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-light-primary font-weight-bold"
                                    data-dismiss="modal">@lang('Cerrar')
                            </button>
                            <button type="submit" class="btn btn-primary font-weight-bold">@lang('Valorar')
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!--end::Modal para comentar un real_estate-->
    @endif

@endsection


@section('js')
<script>
     function showAlert (campo) {

//Swal.fire('Falta rellenar algun campo', '¡Revisa las pestañas!', 'warning');
}



        $('.nav-link').click(function(){
            if($(this).attr("id") == "home-tab" || $(this).attr("id") == "location-tab"){
                    document.getElementById("next_button").style.display = "inline";
                    document.getElementById("end_button").style.display = "none";
            }else{
                document.getElementById("next_button").style.display = "none";
                document.getElementById("end_button").style.display = "inline";
            }
        });




        function next(){
            document.getElementById("next_button").style.display = "inline";
            document.getElementById("end_button").style.display = "none";
            if($('.nav-link.active').attr("id") == "home-tab"){
                //tab
                $('#home-tab').removeClass("active");
                $("#location-tab").addClass("active");

                //tab content
                $("#home").removeClass("active").removeClass("show");
                $("#location").addClass("active").addClass("show");
            }else if($('.nav-link.active').attr("id") == "location-tab"){
                 //tab
                 $('#location-tab').removeClass("active");
                $("#zone-tab").addClass("active");

                //tab content
                $("#location").removeClass("active").removeClass("show");
                $("#zone").addClass("active").addClass("show");
                document.getElementById("next_button").style.display = "none";
                document.getElementById("end_button").style.display = "inline";
            }
        }

    </script>
    <script>

var datatable;

        "use strict";
        // Class definition

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
                            field: 'rating',
                            autoHide: false,
                            width: 100,

                        },
                        {
                            field: 'comment',
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
                    // init dme
                    demo();
                },
            };
        }();

        jQuery(document).ready(function () {
            KTDatatableHtmlTableDemo.init();
        });

        function shortDatatable () {

            try {
                datatable.sort('rating', 'asc');

            } catch (error) {

            }
        }


    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAPS_API_KEY')}}&callback=initMap&libraries=&v=weekly"
        async defer></script>
    <script src="{{asset('/assets/backend/js/components/inmozon.maps.js')}}"></script>
    <script src="{{asset('/assets/backend/js/inmozon.functions.js')}}"></script>
    @include('backend.includes.zoneFieldsGoogleMaps')

    {{--
      -- Add/remove rows to location_table and zone_table
      -- Remove some form fields (location/zone combos) before submit
      --}}
    <script>
        /*
         * Add rows to the location_table
         */
        jQuery('.addLocation').click(function () {
            let country_text = '';
            let country = -1;
            let state_text = '';
            let state = -1;
            let county_text = '';
            let county = -1;
            let city_text = '';
            let city = -1;
            let insert = false; // Do not insert a row by default

            country = jQuery('#location_country').val();
            if (('undefined' !== typeof country) && (0 < country)) { // The user has selected a Country, check if it has selected a State
                country_text = jQuery('#location_country option:selected').text(); // Texts to   in the row: Pais | España
                state = jQuery('#location_state').val();
                if (('undefined' !== typeof state) && (0 < state)) { // The user has selected a State, check if it has selected a County
                    state_text = jQuery('#location_state option:selected').text(); // Texts to show in the row: Comunid. Autonoma | Galicia
                    county = jQuery('#location_county').val();
                    if (('undefined' !== typeof county) && (0 < county)) { // The user has selected a County, check if it has selected a City
                        county_text = jQuery('#location_county option:selected').text(); // Texts to show in the row: Provincia | Toledo
                        city = jQuery('#location_city').val();

                        if (('undefined' !== typeof city) && (0 < city)) { // The user has selected a City
                            insert = true;
                            city_text = jQuery('#location_street').val() + ', ' + jQuery('#location_postcode').val() + ', ' + jQuery('#location_city option:selected').text(); // Texts to show in the row: Ciudad | Alcoy
                        }
                    }
                }
            }

            if (insert) {
                // Insert the selected data after the las row of the table
                // Save values (polymorphic ID + MODEL) in input hidden array  ITEm_xx
                // Show the text of the selected zone   TEXT_xx
                // Set a DELETE row button
                jQuery('#location_table tr:last').after(
                    '<tr>' +
                    '<td><input type="hidden" name="locations[pkey_id][]" value=""><input type="hidden" name="locations[country_id][]" value="' + country + '"><input type="hidden" name="locations[state_id][]" value="' + state + '"><input type="hidden" name="locations[county_id][]" value="' + county + '"> <input type="hidden" name="locations[city_id][]" value="' + city + '"><input type="hidden" name="locations[street][]" value="' + jQuery('#location_street').val() + '"><input type="hidden" name="locations[postcode][]" value="' + jQuery('#location_postcode').val() + '"><input type="hidden" name="locations[latitude][]" value="' + jQuery('#latitude').val() + '"><input type="hidden" name="locations[longitude][]" value="' + jQuery('#longitude').val() + '">' + country_text + '</td>' +
                    '<td>' + state_text + '</td>' +
                    '<td>' + county_text + '</td>' +
                    '<td>' + city_text + '</td>' +
                    '<td><button type="button" class="btn btn-icon btn-danger btnZoneTableDelete" onclick="removeRow(this)">' +
                    '<i class="flaticon2-delete"></i></button></td>' +
                    '</tr>'
                );
            }
        });
        /*
         * Add rows to the zone_table
         */
        jQuery('.addZone').click(function () {
            let insert = false; // Do not insert a row by default
            let item_id = -1; // Selected value of every combo for the polymoirphic relation, default none -1
            let item_model = null; // Name of the model selected (Country, State, County, City) for the polymoirphic relation
            let text_type = null; // Text of the type of select (Pais, Aunonomia, Provincia, Ciudad)
            let text_zone = null; // Text of the ID value selected. (España, Almeria, Cataluña, Alcoy)

            let country = jQuery('#zone_country').val();
            if (('undefined' !== typeof country) && (0 < country)) { // The user has selected a Country, check if it has selected a State
                let state = jQuery('#zone_state').val();
                if (('undefined' !== typeof state) && (0 < state)) { // The user has selected a State, check if it has selected a County
                    let county = jQuery('#zone_county').val();
                    if (('undefined' !== typeof county) && (0 < county)) { // The user has selected a County, check if it has selected a City
                        let city = jQuery('#zone_city').val();
                        if (('undefined' !== typeof city) && (0 < city)) { // The user has selected a City
                            // ONLY CITY
                            insert = true;
                            item_id = city;
                            item_model = 'City'; // Data for the polymorphic relation ID + Model
                            text_type = 'Ciudad';
                            text_zone = jQuery('#zone_city option:selected').text(); // Texts to show in the row: Ciudad | Alcoy
                        } else { // If the user has not selected a City, the last selection is the County
                            // ONLY COUNTY
                            insert = true;
                            item_id = county;
                            item_model = 'County'; // Data for the polymorphic relation ID + Model
                            text_type = 'Provincia';
                            text_zone = jQuery('#zone_county option:selected').text(); // Texts to show in the row: Provincia | Toledo
                        }
                    } else { // If the user has not selected a County, the last selection is the State
                        // ONLY STATE
                        insert = true;
                        item_id = state;
                        item_model = 'State'; // Data for the polymorphic relation ID + Model
                        text_type = 'Comun. Aut&oacute;noma';
                        text_zone = jQuery('#zone_state option:selected').text(); // Texts to show in the row: Comunid. Autonoma | Galicia
                    }
                } else { // If the user has not selected a State, the last selection is the Country
                    // ONLY COUNTRY
                    insert = true;
                    item_id = country;
                    item_model = 'Country'; // Data for the polymorphic relation ID + Model
                    text_type = 'Pa&iacute;s';
                    text_zone = jQuery('#zone_country option:selected').text(); // Texts to show in the row: Pais | España
                }
            }

            if (insert) {
                // Insert the selected data after the las row of the table
                // Save values (polymorphic ID + MODEL) in input hidden array  ITEm_xx
                // Show the text of the selected zone   TEXT_xx
                // Set a DELETE row button
                jQuery('#zone_table tr:last').after(
                    '<tr>' +
                    '<td><input type="hidden" name="zones[pkey_id][]" value=""><input type="hidden" name="zones[id][]" value="' + item_id + '">' + text_type + '</td>' +
                    '<td><input type="hidden" name="zones[model][]" value="' + item_model + '">' + text_zone + '</td>' +
                    '<td><button type="button" class="btn btn-icon btnZoneTableDelete" onclick="removeRowZone(this)">' +
                    '<span\n' +
                    '                                                                        class="svg-icon svg-icon-2x menu-icon"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-08-25-063451/theme/html/demo1/dist/../src/media/svg/icons/Code/Error-circle.svg--><svg\n' +
                    '                                                                            xmlns="http://www.w3.org/2000/svg"\n' +
                    '                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"\n' +
                    '                                                                            width="24px" height="24px"\n' +
                    '                                                                            viewBox="0 0 24 24" version="1.1">\n' +
                    '    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\n' +
                    '        <rect x="0" y="0" width="24" height="24"/>\n' +
                    '        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>\n' +
                    '        <path style="fill:#ff2d00"\n' +
                    '              d="M12.0355339,10.6213203 L14.863961,7.79289322 C15.2544853,7.40236893 15.8876503,7.40236893 16.2781746,7.79289322 C16.6686989,8.18341751 16.6686989,8.81658249 16.2781746,9.20710678 L13.4497475,12.0355339 L16.2781746,14.863961 C16.6686989,15.2544853 16.6686989,15.8876503 16.2781746,16.2781746 C15.8876503,16.6686989 15.2544853,16.6686989 14.863961,16.2781746 L12.0355339,13.4497475 L9.20710678,16.2781746 C8.81658249,16.6686989 8.18341751,16.6686989 7.79289322,16.2781746 C7.40236893,15.8876503 7.40236893,15.2544853 7.79289322,14.863961 L10.6213203,12.0355339 L7.79289322,9.20710678 C7.40236893,8.81658249 7.40236893,8.18341751 7.79289322,7.79289322 C8.18341751,7.40236893 8.81658249,7.40236893 9.20710678,7.79289322 L12.0355339,10.6213203 Z"\n' +
                    '              fill="#000000"/>\n' +
                    '    </g>\n' +
                    '</svg><!--end::Svg Icon--></span></button></td>' +
                    '</tr>'
                );
            }
        });


        /**
         * Remove the same table row where the DELETE button was clicked
         * @param row   DOM element (this)
         * @return null
         */
        function removeRow(row) {

            @if(Request::is('real_estate/create'))
            if($('#location_table thead tr').length > (1+1))
                jQuery(row).closest('tr').remove();
            @else
            if($('#location_table tbody tr').length > 1)
                jQuery(row).closest('tr').remove();
            @endif
            else
                Swal.fire('Error: no se puede eliminar la fila ', '¡Es necesario tener al menos una posición!', 'warning');
        };

        function removeRowZone(row) {

            @if(Request::is('real_estate/create'))
            if($('#zone_table thead tr').length > (1+1))
                jQuery(row).closest('tr').remove();
            @else
            if($('#zone_table tbody tr').length > 1)
                jQuery(row).closest('tr').remove();
            @endif
            else
                Swal.fire('Error: no se puede eliminar la fila ', '¡Es necesario tener al menos una zona!', 'warning');
        };

        $('#end_button').click(function(event){
            //cuando estamos en la vista crear, se añaden las filas al thead
            //cuando estamos en edit, se añaden a body
            @if(Request::is('real_estate/create'))
            if($('#location_table thead tr').length < 2){
                event.preventDefault();
                Swal.fire('Error: Es necesario tener al menos una posición',
                    'Selecciona la localización en la pestaña oficina y pulsa en el botón añadir!', 'warning');
            }
            @else
            if($('#location_table tbody tr').length < 1){
                event.preventDefault();
                Swal.fire('Error: Es necesario tener al menos una posición',
                    'Selecciona la localización en la pestaña oficina y pulsa en el botón añadir!', 'warning');
            }
            @endif
        })

        /**
         * Remove some input fields that are not necessary to submit.
         * @return false
         */
        function beforeSubmit() {
            let formEl = document.getElementById('create_real_estate_form');
            removeFields(['zone_country', 'zone_state', 'zone_county', 'zone_city', 'latitude', 'longitude', 'location_country', 'location_state', 'location_county', 'location_city', 'location_street', 'location_postcode']);
            formEl.submit();
            return false;
        }
    </script>

    {{--
      -- Set the Google Maps with the Real Estate coordinates
      --}}
    @if(isset($item['location']))
        <script>
            function initMap() {
                let center = {lat: {{$item['location']['latitude']}}, lng: {{$item['location']['longitude']}}};
                // The map, centered at Valencia
                map = new google.maps.Map(document.getElementById('kt_gmap_4'), {
                    zoom: 18,
                    center: center
                });
                // The marker, positioned at Valencia
                // marker = new google.maps.Marker({position: center, map: map, draggable:true});
                marker = setMarker(map, new google.maps.Marker(), center);
                getCoordinates({
                    'lat': 'latitude',
                    'lng': 'longitude'
                }, map);
            }
        </script>
    @endif




    <script>

        function getCloseComments(comments_key) {
            try {
                if (comments_key != "" && comments_key != null) {
                    comments_key.forEach(comments_key => {
                        //descartamos cadena vacia
                        if (check_id != "")
                            document.getElementById(check_id).checked = "checked";

                    })
                }
            } catch (error) {
                console.log(error)
            }
        }
    </script>

    <script>
        function disable_edit() {
            var elements = document.getElementById("create_real_estate_form").elements;
            for (var i = 0, len = elements.length; i < len; ++i) {
                elements[i].disabled = true;
            }


            //el boton de comentar tiene que estar activo
            document.getElementById("comment_button").disabled = false;

        }

        window.onload = function () {

            try {

                if ("{{$edit_active}}" == false)
                    disable_edit();
                    var datatable =  document.getElementById("create_real_estate_form").elements;
            } catch (error) {

            }
        }
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

@section('css')
    <style>
        .checked {
            color: rgb(255, 230, 0);
        }
    </style>
@endsection
