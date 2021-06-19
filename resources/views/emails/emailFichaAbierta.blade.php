<!DOCTYPE html>
<html>
    <body>
    <img id="logo" width="160" height="40" src="{{asset('/assets/backend/media/logos/inmozon.png')}}"></img>
    <p></p>
    <p></p>
    <h1>@lang('email-ficha-abierta-texto1', ['owner_name'=>$owner_name])</h1>
    
    <p>@lang('email-ficha-abierta-texto2', ['owner_name'=>$owner_name]):</p>
        
    <p>-Id: {{$id}}</p>
    <p>-@lang('Nombre comercial'): {{$commercialName}}</p>
    <p>-Ref: {{$ref}}</p>
    <p>-@lang('Localización'): {{$street}}, {{$city}}</p>
    <p>-@lang('Precio'): {{$price}}</p>
       
    </body>
</html>
