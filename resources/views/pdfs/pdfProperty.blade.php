<!DOCTYPE html>
<html>


<body>
  <div style="max-width: 650px;">
    
    <!-- header -->
    <table  >
      <tr>
        <td style="width: 300px; max-width: min-content; min-width: max-content; text-align: left; ">
          <h1 style="width: 500px; " >
            {{$type}} {{$city}} <br>
            ID {{$propertyId}} - Precio {{$price}}</h1>
        </td>
        <td style="width: 120px; text-align: center; "> 
          <img class="" style="margin-right: 30px;  margin-left: 30px;" id="logo" width="100" height="100" src="assets/frontend/images/logo_color.jpg"></img></td>
        <td style="width: 100px; text-align: center; "> </td>
      </tr>
    </table>
    <!-- end header -->
    <!--property images -->
    <table style="width: 650px; ">
      <tr>
        <td style="width: 350px; text-align: center; background-color: grey;"> <img id="logo" width="450" height="310" src="{{$img1}}"></img></td>
        <td style="width: 250px; text-align: left;">
          <table>
            <tr>
              <td style="width: 250px; text-align: left;  "> <img id="logo" width="160" height="150" src="{{$img2 ?? '/assets/frontend/images/icon/logo_house.jpg'}}"></img></td>
            </tr>
            <tr>
              <td style="width: 250px; text-align: left; "> <img id="logo" width="160" height="150" src="{{$img3 ?? '/assets/frontend/images/icon/logo_house.jpg'}}"></img></td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
    <!-- end property images -->

    <!--property data 1 -->
    <table style="width: 650px; margin-top: 10px; background-color: aliceblue; font-size: small; height: 10em; ">
      <tr style="text-align: center;">
        <td style="width: 40%; text-align: left; font-size: small;">
          <p><b>@lang('Tipo vivienda'):</b> {{$type}}</p>
          <p><b>@lang('Localidad'):</b> {{$city}}</p>
          <p><b>@lang('Provincia'):</b> {{$county}}</p>
          <p><b>@lang('Estado'):</b> {{$property_status}}</p>
          <p><b>@lang('Precio'):</b> {{$price}}</p>
        </td>
        <td style="width: 30%; text-align: left; font-size: small;">
          <p><b>@lang('Dormitorios'):</b> {{$bedrooms}}</p>
          <p><b>@lang('Baños'):</b> {{$bathrooms}}</p>
          <p><b>@lang('Piscina'):</b> {{$piscina}}</p>
          <p><b>@lang('Metros²'):</b> {{$m2}}</p>
          <p><b>@lang('Metros²'):</b> {{$m2}}</p>
        </td>
        <td style="width: 30%; text-align: left; font-size: small;">
          <p><b>@lang('Aeropuerto'):</b> {{$distance_airport ?? ''}}</p>
          <p><b>@lang('Mar'):</b> {{$distance_sea ?? ''}}</p>
          <p><b>@lang('Playa'):</b> {{$distance_beach ?? ''}}</p>
          <p><b>@lang('Ciudad'):</b> {{$distance_city ?? ''}}</p>
          <p><b>@lang('Golf'):</b> {{$distance_golf ?? ''}}</p>
        </td>
      </tr>
    </table>
    <!--end property data 1 -->
{{--
    <!--property data 2 -->
    <table style="width: 650px; margin-top: 15px; border-style: solid;  border-color: aliceblue;">
      <tr style="width: 200px; text-align: left">
        <td style="font-size: small;">
          @foreach($characteristics1 as $char)

          <p><img width="20" height="20" style=" vertical-align: bottom;" src="https://images.vexels.com/media/users/3/157931/isolated/preview/604a0cadf94914c7ee6c6e552e9b4487-curved-check-mark-circle-icon-by-vexels.png" />@lang($char)</p>
          @endforeach
        </td>
        <td style="font-size: small;">
          @foreach($characteristics2 as $char)

          <p><img width="20" height="20" style=" vertical-align: bottom;" src="https://images.vexels.com/media/users/3/157931/isolated/preview/604a0cadf94914c7ee6c6e552e9b4487-curved-check-mark-circle-icon-by-vexels.png" />@lang($char)</p>
          @endforeach
        </td>
        <td style="font-size: small;">
          @foreach($characteristics3 as $char)

          <p><img width="20" height="20" style=" vertical-align: bottom;" src="https://images.vexels.com/media/users/3/157931/isolated/preview/604a0cadf94914c7ee6c6e552e9b4487-curved-check-mark-circle-icon-by-vexels.png" />@lang($char)</p>
          @endforeach
        </td>
      </tr>
    </table>
    <!--end property data 2 -->
    <!--property description -->
    <table style="width: 650px; margin-top: 15px; border-style: solid; border-width: 2px; border-color: aliceblue;">
      <tr>
        <td style="text-align: left; font-size: small; ">
          <p>
            @foreach(explode(' ', $description) as $word)
            @if($loop->index > 80)
            @break
            @endif
            {{$word}}
            @endforeach
          </p>
        </td>
      </tr>
    </table>
    <!--end property description -->
    --}}

    <!--footer -->
    <table style="width: 650px; position: absolute; margin-top: 15px; bottom: 10px; border-style: solid; border-width: 2px; border-color: aliceblue;">
      <tr>
        <td style="width: 50%; text-align: center; ">www.inmozon.com</td>
        <td style="width: 50%; text-align: center; "> info@inmozon.com</td>
      </tr>
    </table>
    <!--end footer -->

  </div>


</body>

</html>