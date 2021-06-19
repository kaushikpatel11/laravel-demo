<!DOCTYPE html>
<html>
    <body>
    <img id="logo" width="160" height="40" src="{{asset('/assets/backend/media/logos/inmozon.png')}}"></img>
    <p></p>
    <p></p>
        <h1>@lang('cita-creada-texto1', ['owner_name'=>$owner_name])</h1>

        <p>
        @lang('cita-creada-texto2', [
        're_name'=>$re_name,
        'id'=>$id,
        'street'=>$street,
        'city'=>$city,
        'date'=>$date,
        'client_name'=>$client_name,
        'client_nif'=>$client_nif,
        ])
        </p>
        <p></p>
        <p>@lang('cita-creada-texto3')</p>
        <p>@lang('cita-creada-texto4')</p>
        <p>@lang('cita-creada-texto5') <a href="{{secure_url('/login')}}"></a></p>
        <p>@lang('Un cordial saludo')<br>@lang('El equipo de Inmozon')</p>
    </body>
</html>
