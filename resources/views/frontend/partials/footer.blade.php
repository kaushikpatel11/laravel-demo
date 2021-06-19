<footer class="footer-wid bg-black">
    <div class="container pt-5">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-3">
                <div class="foot-logo">
                    <img style="width: 10em" src="/assets/frontend/img/foot-logo.png">
                </div>
            </div>
            <div class="col-12 col-sm-12 col-lg-3">
                <div class="foot-title">
                    <h4 class="yellow">Contacto</h4>
                </div>
                <ul>
                    <li><a href="mailto:info@inmozon.com">info@inmozon.com</a></li>
                    <li><a href="tel:609857304">609 857 304</a></li>
                    {{--
                                            <li><a href="#">Ciudad y C.P.</a></li>
                    --}}
                </ul>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="foot-title">
                    <h4 class="yellow">Legal</h4>
                </div>
                <ul>
                    <li><a href="{{ url('/politica-de-cookies') }}" target="_blank">Política de cookies</a></li>
                    <li><a href="{{ url('/aviso-legal') }}" target="_blank">Aviso Legal</a></li>
                    <li><a href="{{ url('/politica-de-privacidad') }}" target="_blank">Política de privacidad</a>
                    </li>
                    <li><a href="{{ url('/proteccion-de-datos') }}" target="_blank">Protección de datos</a></li>
                </ul>
            </div>
            <div class="col-12 col-sm-12 col-lg-3 text-right" style="margin-top: 0em">
                <img class="pr-1" style="width: 8em;" src="/assets/frontend/img/social/fb.svg">
                <img class="pr-1" style="width: 8em" src="/assets/frontend/img/social/insta2.svg">
                <p class="white mt-3">2020 &copy; Inmozon <br> Todos los derechos reservados</p>
            </div>
        </div>
    </div>

</footer>


<script type="text/javascript" src="{{ url('assets/frontend/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/frontend/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/frontend/js/custom.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/frontend/js/roullette.js') }}"></script>

<!-- Service box squire -->
<script type="text/javascript">
    $(document).ready(function () {
        function myFunction(x) {
            if (x.matches) {
                var servWidth = $(".grand-serv-box").width();
                $(".grand-serv-box .serv-box").css({
                    height: servWidth + 'px'
                });
            }
        }

        var x = window.matchMedia("(min-width: 992px)")
        myFunction(x)
        x.addListener(myFunction)
    });
</script>
<!-- Service box squire -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-5G3W5BH0FY"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-5G3W5BH0FY');
</script>
<script>
    $('body').on('click', function () {
        $('video').trigger('pause');
    });
</script>
<script>

    /*    $(window).scroll(function () {
            if ($(document).scrollTop() > 0 ) {
                window.location.hash = '#section2';
            }

        });*/

    /*  const interval = setInterval(function() {
          // method to be executed;
      }, 5000);
      clearInterval(interval);*/

    /*  function yourFunction(){
          // do whatever you like here
          setTimeout(yourFunction, 5000);
      }
      yourFunction();*/


/*    $(function () {
        if ($(window).width() > 1660) {
            var lastScrollTop = 0, delta = 5;
            $(window).scroll(function () {
                var nowScrollTop = $(this).scrollTop();
                if (Math.abs(lastScrollTop - nowScrollTop) >= delta) {
                    if (nowScrollTop > lastScrollTop) {
                        window.location.hash = '#section2';
                    } else {
                        window.location.hash = '#section1';
                    }
                    lastScrollTop = nowScrollTop;
                }
            });
        }
    });*/

</script>

<script>
    function showPassword() {
        var x = document.getElementById("password");
        var y = document.getElementById("password-confirm");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
        if (y.type === "password") {
            y.type = "text";
        } else {
            y.type = "password";
        }
    }

    function eleccion(select) {
        var elem = document.getElementById('exampleSelect1').value;
        alert(elem)
        if (elem == 'owner') {
            document.getElementById('url').setAttribute('data-target', '#modal1')
        } else if (elem == 'real_estate') {
            document.getElementById('url').setAttribute('data-target', '#modal2')
        }
    }
</script>
</body>
</html>
