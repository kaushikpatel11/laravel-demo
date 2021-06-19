<!DOCTYPE html>
<html>

<body>
    <img id="logo" width="160" height="40" src="{{asset('/assets/backend/media/logos/inmozon.png')}}"></img>
    <p></p>
    <p></p>
    <h1>
        @lang('¡Enhorabuena ')
        {{$owner_name}}, @lang('tu')

        @if($property_promotion)
        @lang('promoción')
        @else
        @lang('propiedad')
        @endif

        @lang(' ha sido creada!')</h1>

    <p>
        @lang('email-property-created-texto1')

        @if($property_promotion)
        @lang('promoción')
        @else
        @lang('propiedad')
        @endif

        @lang('email-property-created-texto2')
    </p>
    <p>@lang('Id de la ')
        @if($property_promotion)
        @lang('promoción')
        @else
        @lang('propiedad')
        @endif
        : {{$id}}</p>
    <p>@lang('Dirección'): {{ $street }}.&nbsp;{{ $city }}. &nbsp; {{ $county }}</p>
    <p>@lang('Precio'): {{ $price }}€</p>
    <p>@lang('Comisión'): {{ $commissions }}%</p>

    <p>@lang('Un cordial saludo')<br>@lang('El equipo de Inmozon')</p>
</body>

</html>