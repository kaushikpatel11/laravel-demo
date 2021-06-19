<input type="hidden" id="latitude" name="location_latitude" value="{{isset($item['location'])?$item['location']['latitude']:config('inmozon,defaultLocation.latitude')}}" placeholder="Latitude">
<input type="hidden" id="longitude" name="location_longitude" value="{{isset($item['location'])?$item['location']['longitude']:config('inmozon,defaultLocation.longitude')}}" placeholder="Longitude">

<div class="form-group row" style="justify-content: center;">

    <label class="col-xl-3 col-lg-3 col-form-label text-left" for="country">@lang('País')</label>
    <div class="col-lg-9 col-xl-6">
        <select class="form-control form-control-lg form-control-solid" name="location_country_id" id="location_country"
                data-related_select_id="#location_state" data-action="getCountryStates" data-url="{{route('state.ajax')}} "
                @if (!Request::is('real_estate'))
                 required
                @endif
                oninvalid="Swal.fire('Necesario elegir un pais','¡Revisa la pestaña zona!', 'warning');">
            <option value="-1"  disabled selected hidden >@lang('Todos')</option>
            @foreach($countries as $country)
                @if (old('location_country_id') == $country->id)
                    <option value="{{ $country->id }}" >{{ $country->name }}</option>
                @else
                    @if(isset($item['location']))
                        <option
                            value="{{ $country->id }}" {{ ($item['location']['country_id'] == $country->id) ? 'selected' : '' }}>{{ $country->name }}</option>
                    @else
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endif
                @endif
            @endforeach

        </select>
    </div>
</div>
<div class="form-group row" style="justify-content: center;">
    <label class="col-xl-3 col-lg-3 col-form-label text-left" for="state">@lang('Comunidad Autónoma')</label>
    <div class="col-lg-9 col-xl-6">
        <select @if (!Request::is('real_estate'))
                 required
                @endif
                oninvalid="Swal.fire('Necesario elegir una comunidad autónoma','¡Revisa la pestaña zona!', 'warning');"

            class="form-control form-control-lg form-control-solid {{isset($item['location']) ? 'd-inline' : 'd-none'}}"
            name="location_state_id" id="location_state" data-related_select_id="#location_county"
            data-url="{{route('county.ajax')}}" data-action="getStateCounties"
            onselect="getCoordinatesFromAddress(['location_street', 'location_city', 'location_postcode', 'location_county', 'location_state', 'location_country'])"
            >
            <option value="-1"  disabled selected hidden>@lang('Todos')</option>
            @if(isset($item['location']))
                <option
                    value="{{ $item['location']['state_id'] }}" {{(old('location_state_id', $item['location']['state_id']) == $item['location']['state_id']) ? 'selected' : ''}}>{{ $item['location']['state_name'] }}</option>
            @endif
        </select>
    </div>
</div>
<div class="form-group row" style="justify-content: center;">
    <label class="col-xl-3 col-lg-3 col-form-label text-left" for="county">@lang('Provincia')</label>
    <div class="col-lg-9 col-xl-6">
        <select @if (!Request::is('real_estate'))
                 required
                @endif
                oninvalid="Swal.fire('Necesario elegir una provincia','¡Revisa la pestaña zona!', 'warning');"

            class="form-control form-control-lg form-control-solid {{isset($item['location']) ? 'd-inline' : 'd-none'}}"
            name="location_county_id" id="location_county" data-related_select_id="#location_city"
            data-url="{{route('city.ajax')}}" data-action="getCountyCities"
            onselect="getCoordinatesFromAddress(['location_street', 'location_city', 'location_postcode', 'location_county', 'location_state', 'location_country'])">
            <option value="-1"   disabled selected hidden>@lang('Todos')</option>
            @if(isset($item['location']))
                <option
                    value="{{ $item['location']['county_id'] }}" {{(old('location_county_id', $item['location']['county_id']) == $item['location']['county_id']) ? 'selected' : ''}}>{{ $item['location']['county_name'] }}</option>
            @endif
        </select>
    </div>
</div>
<div class="form-group row" style="justify-content: center;">
    <label class="col-xl-3 col-lg-3 col-form-label text-left" for="city">@lang('Ciudad')</label>
    <div class="col-lg-9 col-xl-6">
        <select @if (!Request::is('real_estate'))
                 required
                @endif
                oninvalid="Swal.fire('Necesario elegir una ciudad','¡Revisa la pestaña zona!', 'warning');"

            class="form-control form-control-lg form-control-solid {{isset($item['location']) ? 'd-inline' : 'd-none'}}"
            name="location_city_id" id="location_city"
            onselect="getCoordinatesFromAddress(['location_street', 'location_city', 'location_postcode', 'location_county', 'location_state', 'location_country'])">
            <option value="-1" disabled selected hidden>@lang('Todos')</option>
            @if(isset($item['location']))
                <option
                    value="{{ $item['location']['city_id'] }}" {{(old('location_city_id', $item['location']['city_id']) == $item['location']['city_id']) ? 'selected' : ''}}>{{ $item['location']['city_name'] }}</option>
            @endif
        </select>
    </div>
</div>
<div class="form-group row" style="justify-content: center;">
    <label class="col-xl-3 col-lg-3 col-form-label text-left" for="location_street">@lang('Calle, número')</label>
    <div class="col-lg-9 col-xl-6">
        <input autocomplete="nope" class="form-control form-control-lg form-control-solid" type="text" name="location_street"
               id="location_street"
               value="{{old('location_street', isset($item['location']['street']) ? $item['location']['street'] : '')}}"
               oninvalid="showAlert(); document.getElementById('location_street').className +='border border-danger' "
               onchange="document.getElementById('location_street').className ='form-control form-control-lg form-control-solid' "
               onfocusout="getCoordinatesFromAddress(['location_street', 'location_city', 'location_postcode', 'location_county', 'location_state', 'location_country'])"
               >
    </div>
</div>
<div class="form-group row" style="justify-content: center;">
    <label class="col-xl-3 col-lg-3 col-form-label text-left" for="location_postcode">@lang('Código Postal')</label>
    <div class="col-lg-9 col-xl-6">
        <input autocomplete="nope" class="form-control form-control-lg form-control-solid" type="text" name="location_postcode"
               id="location_postcode" pattern="[0-9]{5}"
               value="{{old('location_postcode', isset($item['location']['postcode']) ? $item['location']['postcode'] : '')}}"
               onfocusout="getCoordinatesFromAddress(['location_street', 'location_city', 'location_postcode', 'location_county', 'location_state', 'location_country'])"
               oninvalid="showAlert(); document.getElementById('location_postcode').className +='border border-danger' "
               onchange="document.getElementById('location_postcode').className ='form-control form-control-lg form-control-solid' " >
    </div>
</div>
@if (isset($edit_active))
@if( $edit_active)

<div class="form-group row" style="justify-content: center;">

        <button type="button" class="btn btn-primary mr-2 addLocation"
            onclick="getCoordinatesFromAddress(['location_street', 'location_city', 'location_postcode', 'location_county', 'location_state', 'location_country'])">
            @lang('Añadir')
        </button>
</div>
@endif
@else

<div class="form-group row" style="justify-content: center;">

    <button type="button" class="btn btn-primary mr-2 addLocation">
        @lang('Fijar posición')
    </button>
</div>
@endif





<div class="form-group row" style="justify-content: center;">
{{--
    <div class="col-xl-3 col-lg-3 col-form-label text-left"></div>
--}}
    <div class="col-lg-12 col-xl-9" >
        <div class="card card-custom gutter-b">
            <div id="kt_gmap_4" style="height: 300px; position: relative; overflow: hidden;">
                <div
                    style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);">
                    <div class="gm-err-container">
                        <div class="gm-err-content">
                            <div class="gm-err-icon">
                                <img src="https://maps.gstatic.com/mapfiles/api-3/images/icon_error.png"
                                     draggable="false" style="user-select: none;">
                            </div>
                            <div class="gm-err-title">@lang('Sorry! Something went wrong.')</div>
                            <div class="gm-err-message">
                                @lang('This page didn')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

