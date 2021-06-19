<!DOCTYPE html>
<html>

<body>
    <img id="logo" width="160" height="40" src="{{asset('/assets/backend/media/logos/inmozon.png')}}"></img>
    <p></p>
    <p></p>
    <h1>@lang('cita-aceptada-owner-titulo', ['owner_name'=>$owner_name]) </h1>

    <p> @lang('cita-aceptada-owner-texto1', [
        'owner_name'=>$owner_name,
        're_commercial_name'=>$re_commercial_name,
        'appointment_date'=>$appointment_date,
        'client_name'=>$client_name,
        'client_nif'=>$client_nif,
        'ref'=>$ref,
        'street'=>$street,
        'price'=>$price,
        'agency_commissions'=>$agency_commissions,
        'minimum_commission'=>$minimum_commission,
        ])
    </p>
    <p>@lang('cita-aceptada-owner-texto2')</p>
    <p>@lang('¡SUERTE CON LA VISITA!')</p>
    <p>@lang('Un cordial saludo')<br>@lang('El equipo de Inmozon')</p>


</body>

</html>