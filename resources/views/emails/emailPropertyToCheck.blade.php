<!DOCTYPE html>
<html>

<body>
    <img id="logo" width="160" height="40" src="{{asset('/assets/backend/media/logos/inmozon.png')}}"></img>
    <p></p>
    <p></p>
    <h1>@lang('email-property-check-texto1', [
        'owner_name'=>$owner_name,
        'property_promotion'=>$property_promotion,
        ])
        </h1>

    <p>
    @lang('email-property-check-texto2', [
        'property_promotion'=>$property_promotion,
        'id'=>$id,
        'street'=>$street,
        'city'=>$city,
        'county'=>$county,
        'property_promotion'=>$property_promotion,
        ])
    </p>
    <p>@lang('email-property-check-texto3')</p>
    <p>@lang('Un cordial saludo')<br>@lang('El equipo de Inmozon')</p>

</body>

</html>