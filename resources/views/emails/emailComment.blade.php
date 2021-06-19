<!DOCTYPE html>
<html>
<body>
<div style="padding-right: 50px; padding-left: 50px">
    <img id="logo" width="160" height="40" src="{{asset('/assets/backend/media/logos/inmozon.png')}}"
         style="padding-top: 3em"></img>
    <h1 style="text-align: center; margin-top: 4em; margin-bottom: 2em">@lang('Documento de registro de cliente')</h1>
    <p><b>
        @lang('comment-texto2', [
        'owner_name'=>$owner_name,
        'owner_surname'=>$owner_surname,
        'nif'=>$nif,
        'date'=>$date,
        'commercial_name'=>$commercial_name,
        'client_name'=>$client_name,
        'client_dni'=>$client_dni,
        ])
        </p>
    <ul>
        <li style="list-style: none">@lang('En'):</li>
        <li style="list-style: none">{{$street}}</li>
        <li style="list-style: none">{{$city}}</li>
        <li style="list-style: none">{{$postal_code}} - {{$county}}</li>
    </ul>
    <ul>
        <li>@lang('Precio') : {{$price}}€</li>
        <li>@lang('Comisión de agencia'): {{$agency_commissions}}% @lang('sobre PVP con un mínimo de') {{$minimum_commission}}€ @lang('más IVA')
        </li>
        <li>@lang('Comisión calculada'): {{$commission}}€</li>
    </ul>
    <p>@lang('comment-texto3', ['commercial_name'=>$commercial_name,])</p>
</div>
</body>
</html>
