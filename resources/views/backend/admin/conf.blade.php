@extends('template.template')


@section('top_menu')

@endsection

@section('content')

    <div>
        <div>
            <div>
                <div>
                    <!--begin::Card-->
                    <div class="card">
                        <div class="card-header"><h1>@lang('Modificar datos de la aplicacion')</h1></div>
                        <div class="card card-custom card-stretch">
                            <!--begin::Form-->
                            <form method="post" id="form_create_property" action="/admin/config">
                            @csrf
                            <!--begin::Body-->
                                <div class="card-body" >

                                    <div class="form-group row justify-content-center">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Precio de apertura de
                                            ficha')</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control form-control-lg form-control-solid" type="text"
                                                   name="open_price" value="{{$open_price}}" placeholder="@lang('Nombre')"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="form-group row justify-content-center">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Comisión
                                            mínima')</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control form-control-lg form-control-solid" type="text"
                                                   name="minimum_commission" value="{{$minimum_commission}}"
                                                   placeholder="@lang('Nombre')"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="form-group row justify-content-center">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Precio de
                                            subscripción')</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control form-control-lg form-control-solid" type="text"
                                                   name="subscription_price" value="{{$subscription_price}}"
                                                   placeholder="@lang('Nombre')"
                                                   required>
                                        </div>
                                    </div>


                                </div>
                                <!--end::Body-->
                                <div class="card-footer text-center">
                                    <div class="card-toolbar">
                                        <button type="submit" class="btn btn-success mr-2">@lang('Enviar')</button>
                                        <button type="reset" class="btn btn-secondary">@lang('Cancelar')</button>
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
