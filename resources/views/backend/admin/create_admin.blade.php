@extends('template.template')

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
                            <div class="card-header"><h1>@lang('Rellena tus datos')</h1></div>
                            <div class="card card-custom card-stretch">
                                <form class="form" method="post" action="/admin">
                                @csrf

                                <!--begin::Body-->
                                    <div class="card-body">
                                        <div class="row justify-content-center">
                                            <div class="col-md-9">
                                                <h5 class="font-weight-bold mb-10">@lang('Información de inicio')</h5>
                                            </div>
                                        </div>

                                        <div class="form-group row justify-content-center">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Correo electrónico')</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-at"></i>
                                            </span>
                                                    </div>
                                                    <input type="text"
                                                           class="form-control form-control-lg form-control-solid"
                                                           name="email"
                                                           value="{{@old('email')}}"
                                                           placeholder="@lang('Correo electrónico')" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row justify-content-center">
                                            <label for="password"
                                                   class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Contraseña')</label>

                                            <div class="col-lg-9 col-xl-6">
                                                <input id="password" type="password"
                                                       class="form-control form-control-solid @error('password') is-invalid @enderror"
                                                       name="password" autocomplete="new-password" placeholder="@lang('Contraseña')" minlength="8" maxlength="24" required>

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row justify-content-center">
                                            <label for="password-confirm"
                                                   class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Confirmar contraseña')</label>

                                            <div class="col-lg-9 col-xl-6">
                                                <input id="password-confirm" type="password"
                                                       class="form-control form-control-solid"
                                                       name="password_confirmation"
                                                       autocomplete="new-password" placeholder="@lang('Confirmar contraseña')" minlength="8" maxlength="24" required>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-md-9">
                                                <h5 class="font-weight-bold mb-10">@lang('Información personal')</h5>
                                            </div>
                                        </div>


                                        <div class="form-group row justify-content-center">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Nombre')</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control form-control-lg form-control-solid"
                                                       type="text" name="name" placeholder="@lang('Nombre')" minlength="3" maxlength="24" required
                                                       value="{{@old('name')}}">
                                            </div>

                                        </div>
                                        <div class="form-group row justify-content-center">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Apellidos')</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control form-control-lg form-control-solid"
                                                       type="text" name="surname" placeholder="@lang('Apellidos')" minlength="3" maxlength="24" required
                                                       value="{{@old('surname')}}">
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
                                                    <input type="tel"
                                                           pattern="[0-9]{9}"
                                                           class="form-control form-control-lg form-control-solid"
                                                           value="{{@old('phone_1')}}"
                                                           name="phone_1" placeholder="@lang('Teléfono')" minlength="9" required>
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
                                                   <input type="tel"
                                                           pattern="[0-9]{9}"
                                                           class="form-control form-control-lg form-control-solid"
                                                           name="phone_2" placeholder="@lang('Teléfono adicional')" minlength="9"
                                                           value="{{@old('phone_2')}}">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group row justify-content-center">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Dirección')</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control form-control-lg form-control-solid"
                                                       type="text" name="address" value="{{@old('address')}}" placeholder="@lang('Dirección')" minlength="3" maxlength="30" required>
                                            </div>
                                        </div>


                                        <div class="form-group row justify-content-center">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-left"
                                                   for="exampleSelect1">@lang('Tipo')</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <select class="form-control form-control-solid" id="exampleSelect1" name="type" value="">
                                                    <option {{@old('type')=='gerencia' ? 'selected' : ''}} value="gerencia" selected>@lang('Gerencia')</option>
                                                    <option {{@old('type')=='ventas' ? 'selected' : ''}} value="ventas">@lang('Ventas')</option>
                                                    <option {{@old('type')=='administracion' ? 'selected' : ''}} value="administracion">@lang('Administración')</option>
                                                    <option {{@old('type')=='validadores' ? 'selected' : ''}} value="validadores">@lang('Validadores')</option>
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
