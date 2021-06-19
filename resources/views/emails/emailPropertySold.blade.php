<!DOCTYPE html>
<html>

<body>
    <img id="logo" width="160" height="40" src="{{asset('/assets/backend/media/logos/inmozon.png')}}"></img>
    <p></p>
    <p></p>
    <h1>@lang('email-property-sold-texto1', [
        'property_promotion'=>$property_promotion,
        ])
    </h1>
    <p>
        @lang('email-property-sold-texto2', [
        'property_promotion'=>$property_promotion,
        'id'=>$id,
        'street'=>$street,
        'city'=>$city,
        ])
    </p>
    <p>@lang('email-property-sold-texto3')</p>
    <p>@lang('Atentamente')<br>@lang('El equipo de Inmozon')</p>
</body>
</html>