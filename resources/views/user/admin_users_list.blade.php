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
    <h1>@lang('Lista usuarios administradores')</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">@lang('Nombre')</th>
                <th scope="col">@lang('Apellidos')</th>
                <th scope="col">@lang('Dni')</th>
                <th scope="col">@lang('Dirección')</th>
                <th scope="col">@lang('Email')</th>
                <th scope="col">@lang('Teléfono 1')</th>
                <th scope="col">@lang('Teléfono 2')</th>
                <th scope="col">@lang('Rol')</th>
                <th scope="col">@lang('Opciones')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <th scope="row">1</th>
                <td>$user->name</td>
                <td>$user->surname</td>
                <td>$user->dni</td>
                <td>$user->address</td>
                <td>$user->email</td>
                <td>$user->phone_1</td>
                <td>$user->phone_2</td>
                <td>$user->rol</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
