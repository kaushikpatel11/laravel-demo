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
                        <div class="card-header">
                            <h1>@lang('Rellena tus datos')</h1>
                        </div>
                        <div class="card card-custom card-stretch">
                            <form class="form" method="post" action="/owner">
                                @csrf

                                <!--begin::Body-->
                                <div class="card-body">
                                    <!-- <input id="prodId" name="type" type="hidden" value="{{$subtype}}"> -->
                                    <div class="form-group row justify-content-center">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-left" for="exampleSelect1">@lang('Tipo')</label>
                                        <div class="col-lg-9 col-xl-6">

                                            <select class="form-control form-control-solid " id="exampleSelect1" name="type" value="particular" disabled>

                                                @if($subtype=='particular')
                                                <option value="particular" selected>@lang('Particular')</option>
                                                @else
                                                <option value="particular">@lang('Particular')</option>
                                                @endif
                                                @if($subtype=='promotor')
                                                <option value="promotor" selected>@lang('Promotor')</option>
                                                @else
                                                <option value="promotor">@lang('Promotor')</option>
                                                @endif
                                                @if($subtype=='agente')
                                                <option value="agente" selected>@lang('Agente exclusivista')
                                                </option>
                                                @else
                                                <option value="agente">@lang('Agente exclusivista')</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row justify-content-center">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-left" for="exampleSelect1">@lang('Idioma')</label>
                                        <div class="col-lg-9 col-xl-6">

                                            <select class="form-control form-control-solid " id="exampleSelect1" name="language">

                                                <option value="es" {{@old('language')=='es' ? 'selected' : ''}}>@lang('Español')</option>
                                                <option value="en" {{@old('language')=='en' ? 'selected' : ''}}>@lang('Inglés')</option>
                                                <option value="fr" {{@old('language')=='fr' ? 'selected' : ''}}>@lang('Francés')</option>
                                               
                                            </select>
                                        </div>

                                    </div>


                                    <div class="form-group row justify-content-center">
                                        @if($subtype == 'promotor')

                                        <label id="nombre" style="display: block" class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Razón social')</label>
                                        @else
                                        <label id="nombre" style="display: block" class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Nombre')</label>
                                        <label id="nombre_comercial" style="display: none" class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Nombre comercial')</label>
                                        @endif
                                        <div class="col-lg-9 col-xl-6">
                                            @if($subtype == 'promotor')
                                            <input class="form-control form-control-lg form-control-solid" type="text" name="name" placeholder="@lang('Razón social')"
                                            value="{{@old('name')}}" minlength="3" maxlength="255" required>
                                            @else
                                            <input class="form-control form-control-lg form-control-solid" type="text"
                                            value="{{@old('name')}}" name="name" placeholder="@lang('Nombre')" minlength="3" maxlength="255" required>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="form-group row  justify-content-center">
                                        @if($subtype == 'promotor')
                                        <label id="apellidos" style="display: block" class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Persona de contacto')</label>
                                        @else
                                        <label id="apellidos" style="display: block" class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Apellidos')</label>
                                        <label id="persona_contacto" style="display: none" class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Persona de contacto')</label>

                                        @endif
                                        <div class="col-lg-9 col-xl-6">
                                            @if($subtype == 'promotor')
                                            <input class="form-control form-control-lg form-control-solid" type="text" 
                                                value="{{@old('surname')}}" name="surname" placeholder="@lang('Persona de contacto')" minlength="3" maxlength="255" required>
                                            @else
                                            <input class="form-control form-control-lg form-control-solid" type="text" name="surname" placeholder="@lang('Apellidos')" 
                                            value="{{@old('surname')}}"
                                            minlength="3" maxlength="255" required>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row  justify-content-center">
                                        @if($subtype == 'promotor')

                                        <label class="col-xl-3 col-lg-3 col-form-label text-left">DNI/CIF</label>
                                        @else
                                        <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('DNI/NIE/PASAPORTE')</label>
                                        @endif
                                        <div class="col-lg-9 col-xl-6">
                                            @if($subtype == 'promotor')
                                            <input required class="form-control form-control-lg form-control-solid"
                                             value="{{@old('vat_number')}}" type="text" name="vat_number" placeholder=" Cif" minlength="9" maxlength="9">
                                            @else
                                            <input required class="form-control form-control-lg form-control-solid" type="text" name="vat_number" 
                                            value="{{@old('vat_number')}}" placeholder=" @lang('Nif')" minlength="9" maxlength="9">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row  justify-content-center">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Teléfono de contacto')</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-group input-group-lg input-group-solid">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="la la-phone"></i>
                                                    </span>
                                                </div>
                                                <input required type="tel" class="form-control form-control-lg form-control-solid" name="phone_1"
                                                value="{{@old('phone_1')}}" 
                                                 placeholder="@lang('Teléfono')" minlength="9" maxlength="12">
                                            </div>

                                        </div>
                                    </div>
                                    @if($subtype == 'promotor')
                                    
                                    <div class="form-group row" style="justify-content: center;margin-right: 0em">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Horario Oficina de Ventas/Piloto')</label>

                                        <label class=" col-lg-1 col-xl-1 text-center">@lang('Desde')</label>
                                        <input class="form-control form-control-lg form-control-solid col-xl-2 col-lg-2" type="text"
                                             placeholder="09:00"
                                            name="open" id="open"
                                            value="{{@old('open') }}"
                                            >

                                        <label class="col-xl-1 col-lg-1 text-center">@lang('Hasta')</label>
                                        <input class="col-xl-2 col-lg-2 form-control form-control-lg form-control-solid" type="text"
                                         placeholder="17:00" name="close" id="close"
                                        value="{{@old('close') }}">
                                    </div>
                                    <div class="form-group row  justify-content-center">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Otros teléfonos de contacto')</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-group input-group-lg input-group-solid">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="la la-phone"></i>
                                                    </span>
                                                </div>
                                                
                                                 <textarea class="form-control" id="promotion_web" 
                                                 name="phones"  rows="2">{{@old('phones')}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row  justify-content-center">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Observaciones')</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-group input-group-lg input-group-solid">
                                                
                                                
                                                 <textarea class="form-control" id="remarks" 
                                                 name="remarks"  rows="2">{{@old('remarks')}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="form-group row  justify-content-center">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Teléfono de contacto adicional')</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-group input-group-lg input-group-solid">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="la la-phone"></i>
                                                    </span>
                                                </div>
                                                <input type="tel" class="form-control form-control-lg form-control-solid"
                                                value="{{@old('phone_2')}}"
                                                 name="phone_2" placeholder="@lang('Teléfono adicional')" minlength="9" maxlength="12">
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="form-group row  justify-content-center">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Dirección')</label>
                                        <div class="col-lg-9 col-xl-6">

                                            <textarea required class="form-control  form-control-lg form-control-solid" minlength="9" name="address" rows="2" placeholder="@lang('Dirección')">{{@old('address')}}</textarea>
                                            
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


                        </div>
                    </div>
                </div>
            </div>

            @endsection

            @section('js')
            <script>
                function changeFields() {
                    if (document.getElementById("type").value == "particular") {
                        document.getElementById("nombre").style.display = "block";
                        document.getElementById("apellidos").style.display = "block";
                        document.getElementById("nombre_comercial").style.display = "none";
                        document.getElementById("persona_contacto").style.display = "none";
                    } else {
                        document.getElementById("nombre").style.display = "none";
                        document.getElementById("apellidos").style.display = "none";
                        document.getElementById("nombre_comercial").style.display = "block";
                        document.getElementById("persona_contacto").style.display = "block";

                    }
                }

                window.onload = function() {
                    document.getElementById("type").addEventListener('change', changeFields);
                }
            </script>

            @endsection