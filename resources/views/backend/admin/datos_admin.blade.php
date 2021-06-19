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
                        <div class="card-header"><h1>@lang('Modificar datos administrador')</h1></div>
                        <div class="card card-custom card-stretch">
                            <!--begin::Form-->
                            <form method="post" id="form_create_property" action="{{ route('admin.update',['admin' => $admin->id]) }}">
                                @method('PUT')

                            @csrf
                            <!--begin::Body-->
                                <div class="card-body" >

                                    <div class="form-group row justify-content-center">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Nombre')</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control form-control-lg form-control-solid" type="text"
                                                   name="name" value="{{$admin->name}}" placeholder="@lang('Nombre')"
                                                   minlength="3" maxlength="24" required>
                                        </div>

                                    </div>
                                    <div class="form-group row justify-content-center">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Apellidos')</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control form-control-lg form-control-solid" type="text"
                                                   name="surname" value="{{$admin->surname}}" placeholder="@lang('Apellidos')"
                                                   minlength="3" maxlength="24" required>
                                        </div>
                                    </div>
                                    <div class="form-group row justify-content-center">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Correo
                                            electrónico')</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-group input-group-lg input-group-solid">
                                                <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-at"></i>
                                            </span>
                                                </div>
                                                <input type="text"
                                                       class="form-control form-control-lg form-control-solid"
                                                       value="{{$admin->user->email}}" name="email"
                                                       placeholder="@lang('Correo electrónico')" required>
                                            </div>
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
                                                       value="{{$admin->phone_1}}" name="phone_1" placeholder="@lang('Teléfono')"
                                                       minlength="9" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row justify-content-center">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Teléfono de contacto adicional')</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-group input-group-lg input-group-solid">
                                                <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-phone"></i>
                                            </span>
                                                </div>
                                                <input type="text"
                                                       class="form-control form-control-lg form-control-solid"
                                                       value="{{$admin->phone_2}}" name="phone_2"
                                                       placeholder="@lang('Teléfono adicional')" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row justify-content-center">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Dirección')</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control form-control-lg form-control-solid" type="text"
                                                   name="address" value="{{$admin->address}}" placeholder="@lang('Dirección')"
                                                   minlength="3" maxlength="30" required>
                                        </div>
                                    </div>
                                    <div class="form-group row justify-content-center">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                               for="exampleSelect1">@lang('Tipo')</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <select class="form-control form-control-lg form-control-solid" id="exampleSelect1"
                                                    name="type"
                                                    value="{{$admin->type}}">
                                                <option value="gerencia" selected>@lang('Gerencia')</option>
                                                <option value="ventas">@lang('Ventas')</option>
                                                <option value="administracion">@lang('Administración')</option>
                                                <option value="validadores">@lang('Validadores')</option>
                                            </select>
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
