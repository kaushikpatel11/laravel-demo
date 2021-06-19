<div class="form-group row" style="justify-content: center;">
    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Distancia al aeropuerto')</label>
        <div class="col-lg-3 col-xl-3">

        <input class="form-control form-control-lg form-control-solid" type="text"
               name="distance_airport" value="{{ $property->distance_airport ?? @old('distance_airport') }}">
    </div>
</div>
<div class="form-group row" style="justify-content: center;">
    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Distancia al mar')</label>
        <div class="col-lg-3 col-xl-3">

        <input class="form-control form-control-lg form-control-solid" type="text"
               name="distance_sea" value="{{ $property->distance_sea ?? @old('distance_sea') }}">
    </div>
</div>
<div class="form-group row" style="justify-content: center;">
    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Distancia a la playa')</label>
        <div class="col-lg-3 col-xl-3">

        <input class="form-control form-control-lg form-control-solid" type="text"
               name="distance_beach" value="{{ $property->distance_beach ?? @old('distance_beach') }}">
    </div>
</div>
<div class="form-group row" style="justify-content: center;">
    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Distancia a la ciudad')</label>
        <div class="col-lg-3 col-xl-3">

        <input class="form-control form-control-lg form-control-solid" type="text"
               name="distance_city" value="{{ $property->distance_city ?? @old('distance_city') }}">
    </div>
</div>
<div class="form-group row" style="justify-content: center;">
    <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Distancia golf')</label>
    <div class="col-lg-3 col-xl-3">
        <input class="form-control form-control-lg form-control-solid" type="text"
               name="distance_golf" value="{{ $property->distance_golf ?? @old('distance_golf') }}">
    </div>
</div>
