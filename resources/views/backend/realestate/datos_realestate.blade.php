{--@extends('template.template')

@section('top_menu')

@endsection

@section('content')

    <div>
        <div>
            <div>
                <div>
                    <!--begin::Card-->
                    <div>
                        <div class="card">
                            <div class="card-header"><h1>@lang('Mis datos')</h1></div>
                            <div class="card card-custom card-stretch">
                                <!--begin::Header-->

                                <!--end::Header-->
                                <!--begin::Form-->
                                <form class="form" method="post" action="/real_estate">
                                @csrf
                                @method('PUT')

                                <!--begin::Body-->
                                    <div class="card-body">
                                        <div class="row">
                                            <label class="col-xl-3"></label>
                                        </div>
                                        <div class="form-group row justify-content-center">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Razón social')</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control form-control-lg form-control-solid"
                                                       type="text"
                                                       name="business_name" value="{{$real_estate->name}}"
                                                       placeholder="@lang('Razón social')" required>
                                            </div>
                                        </div>
                                        <div class="form-group row justify-content-center">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Nif')</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control form-control-lg form-control-solid"
                                                       type="text"
                                                       name="vat_number" value="{{$real_estate->name}}" placeholder="@lang('Nif')"
                                                       required minlength="9" maxlength="9">
                                            </div>
                                        </div>
                                        <div class="form-group row justify-content-center">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Nombre')</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control form-control-lg form-control-solid"
                                                       type="text"
                                                       name="name" value="{{$real_estate->name}}"
                                                       placeholder="@lang('Nombre')" required minlength="3" maxlength="24">
                                            </div>
                                        </div>
                                        <div class="form-group row justify-content-center">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Apellidos')</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control form-control-lg form-control-solid"
                                                       type="text"
                                                       name="surname" value="{{$real_estate->surname}}"
                                                       placeholder="@lang('Apellidos')" required minlength="3"
                                                       maxlength="24">
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
                                                    <input type="text"
                                                           class="form-control form-control-lg form-control-solid"
                                                           value="{{$real_estate->phone_1}}" name="phone_1"
                                                           placeholder="@lang('Teléfono')" minlength="9" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row justify-content-center">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Código postal')</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control form-control-lg form-control-solid"
                                                       type="text"
                                                       name="postcode" value="{{$real_estate->postcode}}"
                                                       placeholder="@lang('Código postal')" minlength="1" maxlength="8"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="form-group row justify-content-center">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Provincia')</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control form-control-lg form-control-solid"
                                                       type="text"
                                                       name="county" value="{{$real_estate->locality}}"
                                                       placeholder="@lang('Provincia')" minlength="3" maxlength="24""
                                                required>
                                            </div>
                                        </div>
                                        <div class="form-group row justify-content-center">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Localidad')</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control form-control-lg form-control-solid"
                                                       type="text"
                                                       name="locality" value="{{$real_estate->county}}"
                                                       placeholder="@lang('Localidad')"
                                                       minlength="3" maxlength="24" required>
                                            </div>
                                        </div>

                                        <!--end::Body-->
                                        <div class="card-footer text-center">

                                            <div class="card-toolbar">
                                                <button type="submit" class="btn btn-success mr-2">@lang('Guardar cambios')
                                                </button>
                                                <button type="reset" class="btn btn-secondary">@lang('Cancelar')</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!--end::Form-->
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            @endsection

            @section('js')

            @endsection
            @section('css')

@endsection

