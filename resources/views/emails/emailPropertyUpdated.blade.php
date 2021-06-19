<!DOCTYPE html>
<html>

<body>
    <img id="logo" width="160" height="40" src="{{asset('/assets/backend/media/logos/inmozon.png')}}"></img>
    <p></p>
    <p></p>
    <h1>
        @lang('email-property-updated-texto1', [
        'property_promotion'=>$property_promotion,
        ])
    </h1>

    <p>
        @lang('email-property-updated-texto2', [
        'property_promotion'=>$property_promotion,
        'id'=>$id,
        ])
    </p>
    <p>
        @lang('email-property-updated-texto3', [
        'property_promotion'=>$property_promotion,
        'street'=>$street,
        'city'=>$city,
        ])
    </p>
    <p>@lang('email-property-updated-texto4', [
        'property_promotion'=>$property_promotion,
        'price_old'=>$price_old,
        'price_new'=>$price_new,
        ])
    </p>
    <p>@lang('email-property-updated-texto5', [
        'agency_commissions_old'=>$agency_commissions_old,
        'agency_commissions_new'=>$agency_commissions_new,
        ])
    </p>

</body>

</html>