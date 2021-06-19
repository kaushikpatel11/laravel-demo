<!DOCTYPE html>
<html>
    <body>
    <img id="logo" width="160" height="40" src="{{asset('/assets/backend/media/logos/inmozon.png')}}"></img>
    <p></p>
    <p></p> 
        <h1>@lang('cita-rechazada-texto1', ['re_name'=>$re_name])</h1>

        <p>  @lang('cita-rechazada-texto2', [
        'owner_name'=>$owner_name,
        'owner_surname'=>$owner_surname,
        'appointment_date'=>$appointment_date,
        'client_name'=>$client_name,
        'client_nif'=>$client_nif,
        'id'=>$id,
        'street'=>$street
        ])
       
        </p>
        <p>@lang('cita-rechazada-texto3')</p>
        <p>@lang('Atentamente,')<br>@lang('El equipo de Inmozon')</p>

    </body>
</html>
