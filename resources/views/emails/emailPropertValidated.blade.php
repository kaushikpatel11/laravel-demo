<!DOCTYPE html>
<html>

<body>
    <img id="logo" width="160" height="40" src="{{asset('/assets/backend/media/logos/inmozon.png')}}"></img>
    <p></p>
    <p></p>
    <h1>
        @lang('¡ENHORABUENA!, tu')
        @if($property_promotion)
        @lang('promoción')
        @else
        @lang('propiedad')
        @endif
        @lang('ha sido validada')
    </h1>
    <p>
        @lang('email-property-validated-texto1', [
        'owner_name'=>$owner_name,
        ])

        @if($property_promotion)
        @lang('promoción')
        @else
        @lang('propiedad')
        @endif

        @lang('email-property-validated-texto2', [
        'id'=>$id,
        'street'=>$street
        ])

        @if($property_promotion)
        @lang('promoción')
        @else
        @lang('propiedad')
        @endif

        @lang('email-property-validated-texto3')
        @if($property_promotion)
        @lang('promoción')
        @else
        @lang('propiedad')
        @endif

        @lang('email-property-validated-texto4')

    </p>
    <p>
        @lang('email-property-validated-texto5')
        @if($property_promotion)
        @lang('promoción')
        @else
        @lang('propiedad')
        @endif
        .
    </p>
    <p>@lang('¡Suerte con la venta!')</p>
    <p>@lang('Estamos a tu disposición para cualquier consulta.')</p>
    <p>@lang('Un cordial saludo')<br>@lang('El equipo de Inmozon')</p>

</body>

</html>