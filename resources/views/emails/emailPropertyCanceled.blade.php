<!DOCTYPE html>
<html>

<body>
    <img id="logo" width="160" height="40" src="{{asset('/assets/backend/media/logos/inmozon.png')}}"></img>
    <p></p>
    <p></p>
    <h1>
        @lang('Tu ')

        @if($property_promotion)
        @lang('promoción')
        @else
        @lang('propiedad')
        @endif

        @lang('ha sido cancelada')
    </h1>
    <p>
        @lang('Hola ') {{$owner_name}}, @lang('tu')

        @if($property_promotion)
        @lang('promoción')
        @else
        @lang('propiedad')
        @endif

        @lang('email-property-canceled-texto1', [
        'id'=>$id,
        'street'=>$street
        ])
       

        <p>@lang('email-property-canceled-texto2')</p>
        <p>@lang('email-property-canceled-texto3')</p>
        <p>@lang('Un cordial saludo')<br>@lang('El equipo de Inmozon')</p>

</body>

</html>