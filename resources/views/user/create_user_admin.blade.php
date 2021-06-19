@extends('template.template')


@section('content')
<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">
            @lang('Base Controls')
        </h3>
        <div class="card-toolbar">
            <div class="example-tools justify-content-center">
                <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
            </div>
        </div>
    </div>
    <h1>Crear usuario administrador</h1>
    <!--begin::Form-->
    <form method="post" action="/properties">
        @csrf
        <div class="card-body">
            <div class="form-group mb-8">
                <label class="col-10 col-form-label">@lang('Nombre')</label>
                <div class="col-10">
                    <input class="form-control" type="text" value="" id="nombre-input" />
                </div>
                <label class="col-10 col-form-label">@lang('Apellidos')</label>
                <div class="col-10">
                    <input class="form-control" type="text" value="" id="apellidos-input" />
                </div>
                <div class="form-group ">
                    <label class="col-form-label text-left col-lg-3 col-sm-12">@lang('Email')</label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <input type="text" class="form-control" name="email" placeholder="@lang('Email')" />
                    </div>
                </div>
                <label class="col-10 col-form-label">@lang('Teléfono')</label>
                <div class="col-10">
                    <input class="form-control" type="text" value="" id="telefono-input" />
                </div>
                <label class="col-10 col-form-label">@lang('Dirección')</label>
                <div class="col-10">
                    <input class="form-control" type="text" value="" id="direccion-input" />
                </div>
                <div class="form-group">
                    <label class="col-10 col-form-label" for="exampleInputPassword1">@lang('Contraseña')</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="@lang('Contraseña')">
                </div>
                <div class="form-group">
                    <label for="bathrooms">Rol</label>
                    <select class="form-control" id="bathrooms">
                        <option>@lang('Gerencia')</option>
                        <option>@lang('Ventas')</option>
                        <option>@lang('Administración')</option>
                        <option>@lang('Validadores')</option>
                    </select>
                </div>
                <label class="col-10 col-form-label">@lang('Telefono 2')</label>
                <div class="col-10">
                    <input class="form-control" type="text" value="" id="telefono2-input" />
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary mr-2">@lang('Enviar')</button>
            <button type="reset" class="btn btn-secondary">@lang('Cancelar')</button>
        </div>
    </form>
    <!--end::Form-->
</div>

@endsection
