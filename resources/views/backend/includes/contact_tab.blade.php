<div class="row ">
    <label class="col-xl-3"></label>
    <div class="col-lg-12 col-xl-12">
        <h5 class="font-weight-bold mb-20 mt-15 text-center">@lang('Informacion de contacto')</h5>
        <div class="form-group row justify-content-center">
            <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Persona de contacto')</label>
            <div class="col-lg-9 col-xl-6">
                <input class="form-control form-control-lg form-control-solid" type="text" name="name" value="{{$owner->name}}" placeholder="@lang('Nombre')" minlength="3" maxlength="24" required>
            </div>
        </div>
        <div class="form-group row justify-content-center">
            <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Correo Electrónico')</label>
            <div class="col-lg-9 col-xl-6">
                <div class="input-group input-group-lg input-group-solid">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="la la-at"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control form-control-lg form-control-solid" value="{{$owner->user->email}}" name="email" placeholder="@lang('Correo Electrónico')" required>
                </div>
            </div>
        </div>
        @if($owner->type=="promotor")
                                    
                                    <div class="form-group row" style="justify-content: center;margin-right: 0em">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Horario Oficina de Ventas/Piloto')</label>

                                        <label class=" col-lg-1 col-xl-1 text-center">@lang('Desde')</label>
                                        <input class="form-control form-control-lg form-control-solid col-xl-2 col-lg-2" type="text"
                                            placeholder="09:00"
                                            name="open" id="open"
                                            value="{{@old('open') ?? $owner->open }}"
                                            >

                                        <label class="col-xl-1 col-lg-1 text-center">@lang('Hasta')</label>
                                        <input class="col-xl-2 col-lg-2 form-control form-control-lg form-control-solid" type="text"
                                        placeholder="17:00" name="close" id="close"
                                        value="{{@old('close') ?? $owner->close }}"
                                        
                                        >
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
                                                name="phones"  rows="2">{{@old('phones')??$owner->phones}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row  justify-content-center">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Observaciones')</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-group input-group-lg input-group-solid">
                                                
                                                
                                                <textarea class="form-control" id="remarks" 
                                                name="remarks"  rows="2">{{@old('remarks')??$owner->remarks}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="form-group row justify-content-center">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Teléfono de contacto')</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-group input-group-lg input-group-solid">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="la la-phone"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control form-control-lg form-control-solid" value="{{$owner->phone_1}}" name="phone_1" placeholder="@lang('Teléfono')" minlength="9" maxlength="12" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row justify-content-center">
                                        <label class="col-xl-3 col-lg-3 col-form-label text-left">@lang('Teléfono adicional')</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-group input-group-lg input-group-solid">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="la la-phone"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control form-control-lg form-control-solid" value="{{$owner->phone_2}}" name="phone_2" placeholder="@lang('Teléfono adicional')" minlength="9" maxlength="12" required>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
       
    </div>
</div>
