<!DOCTYPE html>
<html>

<body>
    <h1>@lang('titulo-cita-aceptada', ['re_name'=>$re_name]) </h1>

    <p> @lang('cita-aceptada-texto1', [
        'owner_name'=>$owner_name,
        'owner_surname'=>$owner_surname,
        'appointment_date'=>$appointment_date,
        'client_name'=>$client_name,
        'client_nif'=>$client_nif,
        'property_promotion'=>$property_promotion,
        'street'=>$street,
        'price'=>$price
        ])
    </p>
    <p>
        @lang('cita-aceptada-texto2', [
        'agency_commissions'=>$agency_commissions,
        'minimum_commission'=>$minimum_commission,
        ])
    </p>
    <p>
        @lang('cita-aceptada-texto3', [
        'property_promotion'=>$property_promotion,
        'minimum_commission'=>$minimum_commission,
        ])
    </p>

    <p>@lang('¡SUERTE CON LA VISITA!')</p>
    <p>@lang('Un cordial saludo')<br>@lang('El equipo de Inmozon')</p>

</body>

</html>