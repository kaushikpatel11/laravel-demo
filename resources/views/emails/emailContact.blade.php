<!DOCTYPE html>
<html>
    <body>
    <img id="logo" width="160" height="40" src="{{asset('/assets/backend/media/logos/inmozon.png')}}"></img>
    <p></p>
    <p></p>
        <h1>@lang('Hay una petición de contacto')</h1>
        <p>
        @lang('email-comment-texto1', [
        'id_user'=>$id_user,
        'email'=>$email,
        'subject'=>$subject,
        'info_text'=>$info_text,
        ])
        </p>

    </body>
</html>
