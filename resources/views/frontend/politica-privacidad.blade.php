@extends('frontend.layouts.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ url('assets/frontend/css/custom.css') }}">
@endsection

@section('content')
    <body>

    <section style="padding: 5em">
        <h2 class="text-center mb-lg-5">Política de privacidad</h2>

        <p>En Europa y en España existen normas de protección de datos pensadas para proteger su información personal de obligado cumplimiento para nuestra entidad.</p>

        <p>Por ello, es muy importante para nosotros que entienda perfectamente qué vamos a hacer con los datos personales que le pedimos.</p>

        <p>Así, seremos transparentes y le daremos el control de sus datos, con un lenguaje sencillo y opciones claras que le permitirán decidir qué haremos con su información personal.</p>

        <p>Por favor, si una vez leída la presente información le queda alguna duda, no dude en preguntarnos.</p>

        <h5>¿Quiénes somos?</h5>

        <p>
            – INMOAREA PARTNERS S.L<br>
            {{-- – B53892501<br> --}}
            {{-- – Marketing y Publicidad<br> --}}
            {{-- – Calle José de Cabo Palomares, 37<br> --}}
            {{-- – 965704596<br> --}}
            – info@inmozon.com<br>
            – www.inmozon.com<br>
            – Para su confianza y seguridad, le informamos que somos una entidad inscrita en el siguiente Registro Mercantil /Registro Público: Alicante, Tomo 2.799, Folio 114, Hoja A-84623, inscripción 2.
        </p>

        {{-- <h5>Contacte con nuestro delegado de protección de datos</h5>
        <p>¿Sabe que en nuestra entidad contamos con un delegado de protección de datos al cual puede enviar todas sus reclamaciones, dudas y sugerencias sobre el uso de su información personal</p>

        <p>
            Los datos de contacto de nuestro delegado de protección de datos son los siguientes:<br><br>
            – 965704596<br>
            – david@dicopgroup.com<br>
        </p> --}}


        <h5>¿Para qué vamos a usar sus datos?</h5>
        <p>Con carácter general, sus datos personales serán usados para poder relacionarnos con usted y poder prestarle nuestros servicios.</p>

        <p>Asimismo, también pueden ser usados para otras actividades, como enviarle publicidad o promocionar nuestras actividades.</p>

        <h5>¿Quién va a conocer la información que le pedimos?</h5>
        <p>Con carácter general, sólo el personal de nuestra entidad que esté debidamente autorizado podrá tener conocimiento de la información que le pedimos.</p>

        <p>De igual modo, podrán tener conocimiento de su información personal aquellas entidades que necesiten tener acceso a la misma para que podamos prestarle nuestros servicios. Así por ejemplo, nuestro banco conocerá sus datos si el pago de nuestros servicios se realiza mediante tarjeta o transferencia bancaria.</p>

        <p>Asimismo, tendrán conocimiento de su información aquellas entidades públicas o privadas a las cuales estemos obligados a facilitar sus datos personales con motivo del cumplimiento de alguna ley. Poniéndole un ejemplo, la Ley Tributaria obliga a facilitar a la Agencia Tributaria determinada información sobre operaciones económicas que superen una determinada cantidad.</p>

        <p>En el caso de que, al margen de los supuestos comentados, necesitemos dar a conocer su información personal a otras entidades, le solicitaremos previamente su permiso a través de opciones claras que le permitirán decidir a este respecto.</p>

        <h5>¿Cómo vamos a proteger sus datos?</h5>
        <p>Protegeremos sus datos con medidas de seguridad eficaces en función de los riesgos que conlleve el uso de su información.</p>

        <p>Para ello, nuestra entidad ha aprobado una Política de Protección de Datos y se realizan controles y auditorías anuales para verificar que sus datos personales están seguros en todo momento.</p>

        <h5>¿Enviaremos sus datos a otros países?</h5>
        <p>En el mundo hay países que son seguros para sus datos y otros que no lo son tanto. Así por ejemplo, la Unión Europea es un entorno seguro para sus datos. Nuestra política es no enviar su información personal a ningún país que no sea seguro desde el punto de vista de la protección de sus datos.</p>

        <p>En el caso de que, con motivo de prestarle el servicio, sea imprescindible enviar sus datos a un país que no sea tan seguro como España, siempre le solicitaremos previamente su permiso y aplicaremos medidas de seguridad eficaces que reduzcan los riesgos del envío de su información personal a otro país.</p>

        <h5>¿Durante cuánto tiempo vamos a conservar sus datos?</h5>
        <p>Conservaremos sus datos durante nuestra relación y mientras nos obliguen las leyes. Una vez finalizados los plazos legales aplicables, procederemos a eliminarlos de forma segura y respetuosa con el medio ambiente.</p>

        <h5>¿Cuáles son sus derechos de protección de datos?</h5>
        <p>En cualquier momento puede dirigirse a nosotros para saber qué información tenemos sobre usted, rectificarla si fuese incorrecta y eliminarla una vez finalizada nuestra relación, en el caso de que ello sea legalmente posible.</p>

        <p>También tiene derecho a solicitar el traspaso de su información a otra entidad. Este derecho se llama “portabilidad” y puede ser útil en determinadas situaciones.</p>

        <p>Para solicitar alguno de estos derechos, deberá realizar una solicitud escrita a nuestra dirección, junto con una fotocopia de su DNI, para poder identificarle.</p>

        <p>Para saber más sobre sus derechos de protección de datos, puede consultar la página web de la Agencia Española de Protección de Datos (www.agpd.es).</p>

        <h5>¿Puede retirar su consentimiento si cambia de opinión en un momento posterior?</h5>
        <p>Usted puede retirar su consentimiento si cambia de opinión sobre el uso de sus datos en cualquier momento.</p>

        <p>Así por ejemplo, si usted en su día estuvo interesado/a en recibir publicidad de nuestros productos o servicios, pero ya no desea recibir más publicidad, puede hacérnoslo constar a través del formulario de oposición al tratamiento disponible en las oficinas de nuestra entidad.</p>

        <p>En caso de que entienda que sus derechos han sido desatendidos, ¿dónde puede formular una reclamación?</p>
        <p>En caso de que entienda que sus derechos han sido desatendidos por nuestra entidad, puede formular una reclamación en la Agencia Española de Protección de Datos, a través de alguno de los medios siguientes:</p>


        <p>
            – Sede electrónica: www.agpd.es<br>
            – Dirección postal:Agencia Española de Protección de Datos C/ Jorge Juan, 6, 28001-Madrid<br>
            – Vía telefónica: Telf. 901 100 099 Telf. 91 266 35 17<br>
        </p>



        <p>Formular una reclamación en la Agencia Española de Protección de Datos no conlleva ningún coste y no es necesaria la asistencia de abogado ni procurador.</p>

        <h5>¿Elaboraremos perfiles sobre usted?</h5>
        <p>Nuestra política es no elaborar perfiles sobre los usuarios de nuestros servicios.</p>

        <p>No obstante, pueden existir situaciones en las que, con fines de prestación del servicio, comerciales o de otro tipo, necesitemos elaborar perfiles de información sobre usted. Un ejemplo pudiera ser la utilización de su historial de compras o servicios para poder ofrecerle productos o servicios adaptados a sus gustos o necesidades.</p>

        <p>En tal caso, aplicaremos medidas de seguridad eficaces que protejan su información en todo momento de personas no autorizadas que pretendan utilizarla en su propio beneficio.</p>

        <h5>¿Usaremos sus datos para otros fines?</h5>
        <p>Nuestra política es no usar sus datos para otras finalidades distintas a las que le hemos explicado. Si, no obstante, necesitásemos usar sus datos para actividades distintas, siempre le solicitaremos previamente su permiso a través de opciones claras que le permitirán decidir al respecto.</p>


    </section>



@endsection
