<!DOCTYPE html>
<html>
    <body>
    <img id="logo" width="160" height="40" src="{{asset('/assets/backend/media/logos/inmozon.png')}}"></img>
    <p></p>
    <p></p>
        <h1>
        @lang('email-property-fav-texto1', [
        'owner_name'=>$owner_name,
        ])
        </h1>

        <p>
        @lang('email-property-fav-texto2', [
        'owner_name'=>$owner_name,
        'property_promotion'=>$property_promotion,
        'property_promotion'=>$property_promotion,
        'street'=>$street,
        'city'=>$city,
        'business_name'=>$business_name,
        ])
        </p>
        <p>
            Inmozon.
        </p>

    </body>
</html>
