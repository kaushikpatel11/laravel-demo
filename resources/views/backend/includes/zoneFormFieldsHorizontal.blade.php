<div class="form-group row ml-10 mr-10 justify-content-center">
    <div class="col-lg-3 justify-content-center text-center">
        <label for="country">@lang('País')</label>
        <div class="row p-2">
            <select class="form-control form-control-solid" name="zone_country_id" id="zone_country" data-related_select_id="#zone_state" data-url="{{secure_url('state_ajax')}}" data-action="getCountryStates">
                <option value="-1">@lang('Todos')</option>
                @foreach($countries as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg-3 text-center">
        <label for="state">@lang('Comunidad Autónoma')</label>
        <div class="row p-2">
            <select class="form-control form-control-solid d-none" name="zone_state_id" id="zone_state" data-related_select_id="#zone_county" data-url="{{secure_url('county_ajax')}}" data-action="getStateCounties">
                <option value="-1">@lang('Todos')</option>
            </select>
        </div>
    </div>
    <div class="col-lg-3 text-center">
        <label for="county">@lang('Provincia')</label>
        <div class="row p-2">
            <select class="form-control form-control-solid d-none" name="zone_county_id" id="zone_county" data-related_select_id="#zone_city" data-url="{{secure_url('city_ajax')}}" data-action="getCountyCities">
                <option value="-1">@lang('Todos')</option>
            </select>
        </div>
    </div>
    <div class="col-lg-3 text-center">
        <label for="city">@lang('Ciudad')</label>
        <div class="row p-2">
            <select class="form-control form-control-solid d-none" name="zone_city_id" id="zone_city">
                <option value="-1">@lang('Todos')</option>
            </select>
        </div>
    </div>
</div>

