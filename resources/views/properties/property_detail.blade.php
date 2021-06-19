@extends('template.template')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="flex-row-fluid ml-lg-12">
                <!--begin::Card-->
                <div class="card card-custom card-stretch">

                    <!--begin::Form-->
                    <form class="form" method="post" action="/owner/properties/{{$property->id}}">
                        @csrf
                        @method('PUT')

                        @php
                        $activar_edit = true;
                        @endphp
                        <!--begin::Body-->
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">@lang('General')</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">@lang('Perfil')</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">@lang('Contacto')</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row">
                                        <label class="col-xl-3"></label>
                                        <div class="col-lg-12 col-xl-12">
                                            <h5 class="font-weight-bold mb-6">@lang('Datos generales de la propiedad # '){{$property->id}}</h5>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-right">@lang('Precio')</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input required class="form-control form-control-lg form-control-solid" type="text" name="price" placeholder="{{$property->price}}" value="{{$property->price}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-right">@lang('Comisión agencia')</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input required class="form-control form-control-lg form-control-solid" type="text" name="agency_commissions" value="{{$property->agency_commissions}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-right">@lang('Comisión PLF')</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input required class="form-control form-control-lg form-control-solid" type="text" name="plf_commissions" value="{{$property->plf_commissions}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-right" for="exampleSelect1">@lang('Estado')</label>
                                        <div class="col-lg-9 col-xl-6">

                                            <select class="form-control form-control-solid" name="status" id="exampleSelect1" value="{{$property->status}}">
                                                <option>@lang('Pendiente de activacion')</option>
                                                <option>@lang('Activa')</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-right" for="exampleSelect1">@lang('Tipo de propiedad')</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <select class="form-control form-control-solid" name="status" id="exampleSelect1" value="{{$property->type}}">
                                                <option>@lang('Piso')</option>
                                                <option>@lang('Casa o chalet')</option>
                                                <option>@lang('Casa de campo')</option>
                                                <option>@lang('Oficina')</option>
                                                <option>@lang('Terreno')</option>
                                                <option>@lang('Trastero')</option>
                                                <option>@lang('Local comercial')</option>
                                                <option>@lang('Garaje')</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="checkbox-inline">
                                                <label class="checkbox">
                                                    <input type="checkbox" name="active" value="{{$property->active}}" />
                                                    <span></span>
                                                    @lang('Activa')
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                            </div>

                            <!--end::Body-->

                            <div class="card-footer">
                                @if( !$activar_edit)
                                <button onclick="activar_edit()" type="button" class="btn btn-success mr-2">@lang('Modificar')</button>
                                @else
                                <button type="submit" class="btn btn-success mr-2">@lang('Guardar cambios')</button>
                                @endif
                                <button type="reset" class="btn btn-secondary">@lang('Cancelar')</button>

                            </div>

                    </form>
                    <!--end::Form-->
                </div>
            </div>


        </div>
    </div>
</div>
</div>
@endsection
@section('js')
<script>
    var activar_edit2 = false;
    function activar_edit() {
        $activar_edit2 = true;
    }
</script>
@endsection
