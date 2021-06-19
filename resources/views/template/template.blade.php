<html lang="en">

@include('template.head')

<body id="kt_body"
      class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

<div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed hidden-print">
    <!--begin::Logo-->
    <a href="#">
        <img alt="Inmozon"  src="{{URL('assets/backend/media/logos/inmozon.png')}}" style="height: 4em; "/>
    </a>


    <!--end::Logo-->
    <!--begin::Toolbar-->
    <div class="d-flex align-items-center">
        <!--begin::Aside Mobile Toggle-->
        <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
            <span></span>
        </button>
        <!--end::Aside Mobile Toggle-->
        <!--begin::Header Menu Mobile Toggle-->
    {{-- <button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
<span></span>
</button>
<!--end::Header Menu Mobile Toggle-->
<!--begin::Topbar Mobile Toggle-->
<button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
<span class="svg-icon svg-icon-xl">
  <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
       height="24px" viewBox="0 0 24 24" version="1.1">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <polygon points="0 0 24 0 24 24 0 24"/>
          <path style="fill:#FFCD00"
              d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
              fill="#000000" fill-rule="nonzero" opacity="0.3"/>
          <path style="fill:#FFCD00"
              d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
              fill="#000000" fill-rule="nonzero"/>
      </g>
  </svg>
  <!--end::Svg Icon-->
</span>
</button>--}}
    <!--end::Topbar Mobile Toggle-->
    </div>
    <!--end::Toolbar-->
</div>
<!--end::Header Mobile-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">
        <!--begin::Aside-->
        <div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
            <!--begin::Brand-->
            <div class="brand flex-column-auto" id="kt_brand">

                <!--begin::Logo-->
                {{-- <a href="#" >
          </a>--}}
                <button onclick="cambia()" class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
                    <img id="logo" src="{{URL('assets/backend/media/logos/inmozon.png')}}" alt="logos" height="45em">


                    {{--
                                    <span class="svg-icon svg-icon-2x menu-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                             width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path style="fill:#000000"
                                                      d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                                                      fill="#000000" fill-rule="nonzero"
                                                      transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)"/>
                                                <path style="fill:#000000"
                                                      d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                                                      fill="#000000" fill-rule="nonzero"
                                                      transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)"/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
            --}}
                </button>

                <!--end::Logo-->
                <!--begin::Toggle-->


                <!--end::Toolbar-->
            </div>

            <!--end::Brand-->
            <!--begin::Aside Menu-->
            <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
                <!--begin::Menu Container-->
                <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
                     data-menu-dropdown-timeout="500" >
                    <!--begin::Menu Nav-->
                    <ul class="menu-nav">
                        <li class="menu-item menu-item-active" aria-haspopup="true">
                            <div class="row ml-4 justify-content-left ">
                                <a title=@lang('Español') href="{{route('lang.set', ['locale'=>'es'])}}">
                                    <img id="logo" style="float: text-right" src="{{URL('assets/backend/media/country-flags/es.svg')}}" alt="logos" height="50em">
                                </a> 

                                <a title=@lang('Francés') href="{{route('lang.set', ['locale'=>'fr'])}}">

                                <img id="logo" style="float: text-right" src="{{URL('assets/backend/media/country-flags/fr.svg')}}" alt="logos" height="50em">
                                </a>
                                <a title=@lang('Inglés') href="{{route('lang.set', ['locale'=>'en'])}}">

                                <img id="logo" style="float: text-right" src="{{URL('assets/backend/media/country-flags/en.svg')}}" alt="logos" height="50em">
                                </a>
                            </div>

                        </li>
                        
                        @if(Auth::User()->type == 'admin')
                            @if (Request::is('admin'))
                                <li class="menu-item menu-item-active" aria-haspopup="true">
                            @else
                                <li class="menu-item " aria-haspopup="true">
                                    @endif
                                    <a href="/admin/" class="menu-link">
                                    <span class="svg-icon svg-icon-2x menu-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                             viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path style="fill:#FFCD00"
                                                      d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                                      fill="#000000" fill-rule="nonzero"/>
                                                <path style="fill:#FFCD00"
                                                      d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                                      fill="#000000" opacity="0.3"/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                        <span class="menu-text">@lang('Panel de control')</span>
                                    </a>
                                </li>
                                @if (Request::is('admin/admins'))
                                    <li class="menu-item menu-item-active" aria-haspopup="true">
                                @else
                                    <li class="menu-item " aria-haspopup="true">
                                        @endif
                                        <a href="/admin/admins" class="menu-link">
                                    <span class="svg-icon svg-icon-2x menu-icon">
                                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-08-03-114926/theme/html/demo1/dist/../src/media/svg/icons/Communication/Group.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path style="fill:#FFCD00"
                                                      d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                      fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                <path style="fill:#FFCD00"
                                                      d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                      fill="#000000" fill-rule="nonzero"/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon--></span>
                                            <span class="menu-text">@lang('Administradores')</span>
                                        </a>
                                    </li>
                                    @if (Request::is('admin/owners'))
                                        <li class="menu-item menu-item-active" aria-haspopup="true">
                                    @else
                                        <li class="menu-item " aria-haspopup="true">
                                            @endif
                                            <a href="/admin/owners" class="menu-link">


                                        <span class="svg-icon svg-icon-2x menu-icon"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\User.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path style="fill:#FFCD00"d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                <path style="fill:#FFCD00"d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                                <span class="menu-text">@lang('Propietarios')</span>
                                            </a>
                                        </li>
                                        @if (Request::is('admin/real_estates'))
                                            <li class="menu-item menu-item-active" aria-haspopup="true">
                                        @else
                                            <li class="menu-item " aria-haspopup="true">
                                                @endif
                                                <a href="/admin/real_estates" class="menu-link">
                                    <span class="svg-icon svg-icon-2x menu-icon">
                                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-08-03-114926/theme/html/demo1/dist/../src/media/svg/icons/Clothes/Briefcase.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path style="fill:#FFCD00"
                                                      d="M5.84026576,8 L18.1597342,8 C19.1999115,8 20.0664437,8.79732479 20.1528258,9.83390904 L20.8194924,17.833909 C20.9112219,18.9346631 20.0932459,19.901362 18.9924919,19.9930915 C18.9372479,19.9976952 18.8818364,20 18.8264009,20 L5.1735991,20 C4.0690296,20 3.1735991,19.1045695 3.1735991,18 C3.1735991,17.9445645 3.17590391,17.889153 3.18050758,17.833909 L3.84717425,9.83390904 C3.93355627,8.79732479 4.80008849,8 5.84026576,8 Z M10.5,10 C10.2238576,10 10,10.2238576 10,10.5 L10,11.5 C10,11.7761424 10.2238576,12 10.5,12 L13.5,12 C13.7761424,12 14,11.7761424 14,11.5 L14,10.5 C14,10.2238576 13.7761424,10 13.5,10 L10.5,10 Z"
                                                      fill="#000000"/>
                                                <path style="fill:#FFCD00"
                                                      d="M10,8 L8,8 L8,7 C8,5.34314575 9.34314575,4 11,4 L13,4 C14.6568542,4 16,5.34314575 16,7 L16,8 L14,8 L14,7 C14,6.44771525 13.5522847,6 13,6 L11,6 C10.4477153,6 10,6.44771525 10,7 L10,8 Z"
                                                      fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon--></span>


                                                    <span class="menu-text">@lang('Inmobiliarias')</span>
                                                </a>
                                            </li>



                                            @if (Request::is('admin/properties'))
                                                <li class="menu-item menu-item-active" aria-haspopup="true">
                                            @else
                                                <li class="menu-item " aria-haspopup="true">
                                                    @endif
                                                    <a href="/admin/properties" class="menu-link">
                                    <span class="svg-icon svg-icon-2x menu-icon">
                                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-08-03-114926/theme/html/demo1/dist/../src/media/svg/icons/Home/Building.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path style="fill:#FFCD00"
                                                      d="M13.5,21 L13.5,18 C13.5,17.4477153 13.0522847,17 12.5,17 L11.5,17 C10.9477153,17 10.5,17.4477153 10.5,18 L10.5,21 L5,21 L5,4 C5,2.8954305 5.8954305,2 7,2 L17,2 C18.1045695,2 19,2.8954305 19,4 L19,21 L13.5,21 Z M9,4 C8.44771525,4 8,4.44771525 8,5 L8,6 C8,6.55228475 8.44771525,7 9,7 L10,7 C10.5522847,7 11,6.55228475 11,6 L11,5 C11,4.44771525 10.5522847,4 10,4 L9,4 Z M14,4 C13.4477153,4 13,4.44771525 13,5 L13,6 C13,6.55228475 13.4477153,7 14,7 L15,7 C15.5522847,7 16,6.55228475 16,6 L16,5 C16,4.44771525 15.5522847,4 15,4 L14,4 Z M9,8 C8.44771525,8 8,8.44771525 8,9 L8,10 C8,10.5522847 8.44771525,11 9,11 L10,11 C10.5522847,11 11,10.5522847 11,10 L11,9 C11,8.44771525 10.5522847,8 10,8 L9,8 Z M9,12 C8.44771525,12 8,12.4477153 8,13 L8,14 C8,14.5522847 8.44771525,15 9,15 L10,15 C10.5522847,15 11,14.5522847 11,14 L11,13 C11,12.4477153 10.5522847,12 10,12 L9,12 Z M14,12 C13.4477153,12 13,12.4477153 13,13 L13,14 C13,14.5522847 13.4477153,15 14,15 L15,15 C15.5522847,15 16,14.5522847 16,14 L16,13 C16,12.4477153 15.5522847,12 15,12 L14,12 Z"
                                                      fill="#000000"/>
                                                <rect fill="#FFFFFF" x="13" y="8" width="3" height="3" rx="1"/>
                                                <path style="fill:#FFCD00"
                                                      d="M4,21 L20,21 C20.5522847,21 21,21.4477153 21,22 L21,22.4 C21,22.7313708 20.7313708,23 20.4,23 L3.6,23 C3.26862915,23 3,22.7313708 3,22.4 L3,22 C3,21.4477153 3.44771525,21 4,21 Z"
                                                      fill="#000000" opacity="0.3"/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon--></span>
                                                        <span class="menu-text">@lang('Propiedades')</span>
                                                    </a>
                                                </li>



                                                @if (Request::is('admin/to_validate'))
                                                    <li class="menu-item menu-item-active" aria-haspopup="true">
                                                @else
                                                    <li class="menu-item " aria-haspopup="true">
                                                        @endif
                                                        <a href="/admin/to_validate/" class="menu-link">
                                    <span class="svg-icon svg-icon-2x menu-icon"><span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Hidden.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M19.2078777,9.84836149 C20.3303823,11.0178941 21,12 21,12 C21,12 16.9090909,18 12,18 C11.6893441,18 11.3879033,17.9864845 11.0955026,17.9607365 L19.2078777,9.84836149 Z" fill="#000000" fill-rule="nonzero"/>
                                            <path d="M14.5051465,6.49485351 L12,9 C10.3431458,9 9,10.3431458 9,12 L5.52661464,15.4733854 C3.75006453,13.8334911 3,12 3,12 C3,12 5.45454545,6 12,6 C12.8665422,6 13.7075911,6.18695134 14.5051465,6.49485351 Z" fill="#000000" fill-rule="nonzero"/>
                                            <rect fill="#000000" opacity="0.3" transform="translate(12.524621, 12.424621) rotate(-45.000000) translate(-12.524621, -12.424621) " x="3.02462111" y="11.4246212" width="19" height="2"/>
                                        </g>
                                    </svg><!--end::Svg Icon--></span>
                                        <!--end::Svg Icon--></span>
                                                            <span class="menu-text">@lang('Propiedades sin validar')</span>
                                                        </a>
                                                    </li>


                                                    @if (Request::is('admin/properties/in_process'))
                                                        <li class="menu-item menu-item-active" aria-haspopup="true">
                                                    @else
                                                        <li class="menu-item " aria-haspopup="true">
                                                            @endif
                                                            <a href="/admin/properties/in_process" class="menu-link">
                                    <span class="svg-icon svg-icon-2x menu-icon"><svg xmlns="http://www.w3.org/2000/svg"
                                                                                      xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                      width="24px" height="24px"
                                                                                      viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path style="fill:#FFCD00"
                                                      d="M9.26193932,16.6476484 C8.90425297,17.0684559 8.27315905,17.1196257 7.85235158,16.7619393 C7.43154411,16.404253 7.38037434,15.773159 7.73806068,15.3523516 L16.2380607,5.35235158 C16.6013618,4.92493855 17.2451015,4.87991302 17.6643638,5.25259068 L22.1643638,9.25259068 C22.5771466,9.6195087 22.6143273,10.2515811 22.2474093,10.6643638 C21.8804913,11.0771466 21.2484189,11.1143273 20.8356362,10.7474093 L17.0997854,7.42665306 L9.26193932,16.6476484 Z"
                                                      fill="#000000" fill-rule="nonzero" opacity="0.3"
                                                      transform="translate(14.999995, 11.000002) rotate(-180.000000) translate(-14.999995, -11.000002) "/>
                                                <path style="fill:#FFCD00"
                                                      d="M4.26193932,17.6476484 C3.90425297,18.0684559 3.27315905,18.1196257 2.85235158,17.7619393 C2.43154411,17.404253 2.38037434,16.773159 2.73806068,16.3523516 L11.2380607,6.35235158 C11.6013618,5.92493855 12.2451015,5.87991302 12.6643638,6.25259068 L17.1643638,10.2525907 C17.5771466,10.6195087 17.6143273,11.2515811 17.2474093,11.6643638 C16.8804913,12.0771466 16.2484189,12.1143273 15.8356362,11.7474093 L12.0997854,8.42665306 L4.26193932,17.6476484 Z"
                                                      fill="#000000" fill-rule="nonzero"
                                                      transform="translate(9.999995, 12.000002) rotate(-180.000000) translate(-9.999995, -12.000002) "/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon--></span>
                                                                <span class="menu-text">@lang('Propiedades en proceso')</span>
                                                            </a>
                                                        </li>

                                                        @if (Request::is('/admin/search_properties'))
                                                            <li class="menu-item menu-item-active" aria-haspopup="true">
                                                        @else
                                                            <li class="menu-item " aria-haspopup="true">
                                                                @endif
                                                                <a href="/admin/search_properties" class="menu-link">
                                    <span class="svg-icon svg-icon-2x menu-icon"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Search.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path style="fill:#FFCD00"d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path style="fill:#FFCD00"d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                                                    <span
                                                                        class="menu-text">@lang('Búsqueda de propiedades')</span>
                                                                </a>
                                                            </li>
                                                        @if (Request::is('/admin/fichas'))
                                                            <li class="menu-item menu-item-active" aria-haspopup="true">
                                                        @else
                                                            <li class="menu-item " aria-haspopup="true">
                                                                @endif
                                                                <a href="/admin/fichas" class="menu-link">
                                                                <span class="svg-icon svg-icon-2x menu-icon"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Home\Book-open.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path  style="fill:#FFCD00" d="M13.6855025,18.7082217 C15.9113859,17.8189707 18.682885,17.2495635 22,17 C22,16.9325178 22,13.1012863 22,5.50630526 L21.9999762,5.50630526 C21.9999762,5.23017604 21.7761292,5.00632908 21.5,5.00632908 C21.4957817,5.00632908 21.4915635,5.00638247 21.4873465,5.00648922 C18.658231,5.07811173 15.8291155,5.74261533 13,7 C13,7.04449645 13,10.79246 13,18.2438906 L12.9999854,18.2438906 C12.9999854,18.520041 13.2238496,18.7439052 13.5,18.7439052 C13.5635398,18.7439052 13.6264972,18.7317946 13.6855025,18.7082217 Z" fill="#000000"/>
                                            <path  style="fill:#FFCD00" d="M10.3144829,18.7082217 C8.08859955,17.8189707 5.31710038,17.2495635 1.99998542,17 C1.99998542,16.9325178 1.99998542,13.1012863 1.99998542,5.50630526 L2.00000925,5.50630526 C2.00000925,5.23017604 2.22385621,5.00632908 2.49998542,5.00632908 C2.50420375,5.00632908 2.5084219,5.00638247 2.51263888,5.00648922 C5.34175439,5.07811173 8.17086991,5.74261533 10.9999854,7 C10.9999854,7.04449645 10.9999854,10.79246 10.9999854,18.2438906 L11,18.2438906 C11,18.520041 10.7761358,18.7439052 10.4999854,18.7439052 C10.4364457,18.7439052 10.3734882,18.7317946 10.3144829,18.7082217 Z" fill="#000000" opacity="0.3"/>
                                        </g>
                                    </svg><!--end::Svg Icon--></span>
                                                                    <span
                                                                        class="menu-text">Fichas abiertas</span>
                                                                </a>
                                                            </li>





                                                            @if (Request::is('/admin/owner/map'))
                                                            <li class="menu-item menu-item-active" aria-haspopup="true">
                                                                @else
                                                            <li class="menu-item " aria-haspopup="true">
                                                                @endif
                                                                <a href="/admin/owner/map" class="menu-link">
                                                                    <span class="svg-icon svg-icon-2x menu-icon">
                                                                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-08-03-114926/theme/html/demo1/dist/../src/media/svg/icons/General/Search.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">

                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                                <path style="fill:#FFCD00" d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z" fill="#000000" fill-rule="nonzero"/>
                                                                            </g>
                                                                        </svg>
                                                                        <!--end::Svg Icon--></span>
                                                                    <span class="menu-text">@lang('Mapa Inmobiliarias')</span>
                                                                </a>
                                                            </li>

                                                            @if (Request::is('/admin/real_estate/map'))
                                                            <li class="menu-item menu-item-active" aria-haspopup="true">
                                                        @else
                                                            <li class="menu-item " aria-haspopup="true">
                                                                @endif
                                                                <a href="/admin/real_estate/map" class="menu-link">
<span class="svg-icon svg-icon-2x menu-icon">
<!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-08-03-114926/theme/html/demo1/dist/../src/media/svg/icons/General/Search.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
<rect x="0" y="0" width="24" height="24"/>
<path style="fill:#FFCD00" d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z" fill="#000000" fill-rule="nonzero"/>
</g>
</svg>
<!--end::Svg Icon--></span>
                                                                    <span class="menu-text">@lang('Mapa Propiedades')</span>
                                                                </a>
                                                            </li>






                                                            @if (Request::is('admin/config'))
                                                                <li class="menu-item menu-item-active"
                                                                    aria-haspopup="true">
                                                            @else
                                                                <li class="menu-item " aria-haspopup="true">
                                                                    @endif
                                                                    <a href="/admin/config" class="menu-link menu-lateral-config">

                                    <span class="svg-icon svg-icon-2x menu-icon">
                                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-08-03-114926/theme/html/demo1/dist/../src/media/svg/icons/Communication/Adress-book2.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path style="fill:#FFCD00"
                                                      d="M18,2 L20,2 C21.6568542,2 23,3.34314575 23,5 L23,19 C23,20.6568542 21.6568542,22 20,22 L18,22 L18,2 Z"
                                                      fill="#000000" opacity="0.3"/>
                                                <path style="fill:#FFCD00"
                                                      d="M5,2 L17,2 C18.6568542,2 20,3.34314575 20,5 L20,19 C20,20.6568542 18.6568542,22 17,22 L5,22 C4.44771525,22 4,21.5522847 4,21 L4,3 C4,2.44771525 4.44771525,2 5,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z"
                                                      fill="#000000"/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon--></span>
                                                                        <span class="menu-text">@lang('Configuración')</span>
                                                                    </a>
                                                                </li>


                                                                @elseif (Auth::User()->type == 'owner')
                                                                    @if (Request::is('owner/dashboard'))
                                                                        <li class="menu-item menu-item-active"
                                                                            aria-haspopup="true">
                                                                    @else
                                                                        <li class="menu-item " aria-haspopup="true">
                                                                            @endif
                                                                            <a href="/owner/dashboard"
                                                                               class="menu-link">
                                    <span class="svg-icon svg-icon-2x menu-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                             viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path style="fill:#FFCD00"
                                                      d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                                      fill="#000000" fill-rule="nonzero"/>
                                                <path style="fill:#FFCD00"
                                                      d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                                      fill="#000000" opacity="0.3"/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                                                                <span class="menu-text">@lang('Panel de control')</span>
                                                                            </a>
                                                                        </li>
                                                                        @if (Request::is('owner/properties'))
                                                                            <li class="menu-item menu-item-active"
                                                                                aria-haspopup="true">
                                                                        @else
                                                                            <li class="menu-item " aria-haspopup="true">
                                                                                @endif
                                                                                <a href="/owner/properties"
                                                                                   class="menu-link">
                                    <span class="svg-icon svg-icon-2x menu-icon">
                                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-08-03-114926/theme/html/demo1/dist/../src/media/svg/icons/Home/Building.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path style="fill:#FFCD00"
                                                      d="M13.5,21 L13.5,18 C13.5,17.4477153 13.0522847,17 12.5,17 L11.5,17 C10.9477153,17 10.5,17.4477153 10.5,18 L10.5,21 L5,21 L5,4 C5,2.8954305 5.8954305,2 7,2 L17,2 C18.1045695,2 19,2.8954305 19,4 L19,21 L13.5,21 Z M9,4 C8.44771525,4 8,4.44771525 8,5 L8,6 C8,6.55228475 8.44771525,7 9,7 L10,7 C10.5522847,7 11,6.55228475 11,6 L11,5 C11,4.44771525 10.5522847,4 10,4 L9,4 Z M14,4 C13.4477153,4 13,4.44771525 13,5 L13,6 C13,6.55228475 13.4477153,7 14,7 L15,7 C15.5522847,7 16,6.55228475 16,6 L16,5 C16,4.44771525 15.5522847,4 15,4 L14,4 Z M9,8 C8.44771525,8 8,8.44771525 8,9 L8,10 C8,10.5522847 8.44771525,11 9,11 L10,11 C10.5522847,11 11,10.5522847 11,10 L11,9 C11,8.44771525 10.5522847,8 10,8 L9,8 Z M9,12 C8.44771525,12 8,12.4477153 8,13 L8,14 C8,14.5522847 8.44771525,15 9,15 L10,15 C10.5522847,15 11,14.5522847 11,14 L11,13 C11,12.4477153 10.5522847,12 10,12 L9,12 Z M14,12 C13.4477153,12 13,12.4477153 13,13 L13,14 C13,14.5522847 13.4477153,15 14,15 L15,15 C15.5522847,15 16,14.5522847 16,14 L16,13 C16,12.4477153 15.5522847,12 15,12 L14,12 Z"
                                                      fill="#000000"/>
                                                <rect fill="#FFFFFF" x="13" y="8" width="3" height="3" rx="1"/>
                                                <path style="fill:#FFCD00"
                                                      d="M4,21 L20,21 C20.5522847,21 21,21.4477153 21,22 L21,22.4 C21,22.7313708 20.7313708,23 20.4,23 L3.6,23 C3.26862915,23 3,22.7313708 3,22.4 L3,22 C3,21.4477153 3.44771525,21 4,21 Z"
                                                      fill="#000000" opacity="0.3"/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon--></span>
                                                                                    <span class="menu-text">
                                                                                        @if(Auth::user()->type == 'owner' && isset(Auth::user()->owner) && Auth::user()->owner->type == 'promotor')
                                                                                            @lang('Mis promociones')
                                                                                        @else
                                                                                            @lang('Mis propiedades')
                                                                                        @endif
                                                                                    </span>
                                                                                </a>
                                                                            </li>

                                                                                @if (Request::is('owner/real_estates'))
                                                                                    <li class="menu-item menu-item-active"
                                                                                        aria-haspopup="true">
                                                                                @else
                                                                                    <li class="menu-item "
                                                                                        aria-haspopup="true">
                                                                                        @endif
                                                                                        <a href="/owner/real_estates"
                                                                                           class="menu-link">
                                    <span class="svg-icon svg-icon-2x menu-icon">
                                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-08-03-114926/theme/html/demo1/dist/../src/media/svg/icons/General/Search.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path style="fill:#FFCD00"
                                                      d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                      fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                <path style="fill:#FFCD00"
                                                      d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                      fill="#000000" fill-rule="nonzero"/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon--></span>
                                    <span class="menu-text">@lang('Busqueda de inmobiliarias')</span>
                                </a>
                            </li>
                            @if (Request::is('owner/appointments'))
                            <li class="menu-item menu-item-active" aria-haspopup="true">
                                @else
                            <li class="menu-item " aria-haspopup="true">
                                @endif
                                <a href="{{ route('owner.appointments') }}" class="menu-link">

                                    <span class="svg-icon svg-icon-2x menu-icon"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Home\Clock.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path style="fill:#FFCD00" d="M12,22 C7.02943725,22 3,17.9705627 3,13 C3,8.02943725 7.02943725,4 12,4 C16.9705627,4 21,8.02943725 21,13 C21,17.9705627 16.9705627,22 12,22 Z" fill="#000000" opacity="0.3"/>
                                            <path style="fill:#FFCD00" d="M11.9630156,7.5 L12.0475062,7.5 C12.3043819,7.5 12.5194647,7.69464724 12.5450248,7.95024814 L13,12.5 L16.2480695,14.3560397 C16.403857,14.4450611 16.5,14.6107328 16.5,14.7901613 L16.5,15 C16.5,15.2109164 16.3290185,15.3818979 16.1181021,15.3818979 C16.0841582,15.3818979 16.0503659,15.3773725 16.0176181,15.3684413 L11.3986612,14.1087258 C11.1672824,14.0456225 11.0132986,13.8271186 11.0316926,13.5879956 L11.4644883,7.96165175 C11.4845267,7.70115317 11.7017474,7.5 11.9630156,7.5 Z" fill="#000000"/>
                                        </g>
                                    </svg><!--end::Svg Icon--></span>
                                    <span class="menu-text">@lang('Mis citas')</span>
                                </a>
                            </li>

                            @if (Request::is('owner/fichas'))
                            <li class="menu-item menu-item-active" aria-haspopup="true">
                                @else
                            <li class="menu-item " aria-haspopup="true">
                                @endif
                                <a href="{{ route('owner.fichas') }}" class="menu-link">
                                    <span class="svg-icon svg-icon-2x menu-icon"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Home\Book-open.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path  style="fill:#FFCD00" d="M13.6855025,18.7082217 C15.9113859,17.8189707 18.682885,17.2495635 22,17 C22,16.9325178 22,13.1012863 22,5.50630526 L21.9999762,5.50630526 C21.9999762,5.23017604 21.7761292,5.00632908 21.5,5.00632908 C21.4957817,5.00632908 21.4915635,5.00638247 21.4873465,5.00648922 C18.658231,5.07811173 15.8291155,5.74261533 13,7 C13,7.04449645 13,10.79246 13,18.2438906 L12.9999854,18.2438906 C12.9999854,18.520041 13.2238496,18.7439052 13.5,18.7439052 C13.5635398,18.7439052 13.6264972,18.7317946 13.6855025,18.7082217 Z" fill="#000000"/>
                                            <path  style="fill:#FFCD00" d="M10.3144829,18.7082217 C8.08859955,17.8189707 5.31710038,17.2495635 1.99998542,17 C1.99998542,16.9325178 1.99998542,13.1012863 1.99998542,5.50630526 L2.00000925,5.50630526 C2.00000925,5.23017604 2.22385621,5.00632908 2.49998542,5.00632908 C2.50420375,5.00632908 2.5084219,5.00638247 2.51263888,5.00648922 C5.34175439,5.07811173 8.17086991,5.74261533 10.9999854,7 C10.9999854,7.04449645 10.9999854,10.79246 10.9999854,18.2438906 L11,18.2438906 C11,18.520041 10.7761358,18.7439052 10.4999854,18.7439052 C10.4364457,18.7439052 10.3734882,18.7317946 10.3144829,18.7082217 Z" fill="#000000" opacity="0.3"/>
                                        </g>
                                    </svg><!--end::Svg Icon--></span>

                                    <span class="menu-text">@lang('Mis fichas')</span>
                                </a>
                            </li>

                            @if (Request::is('/owner/map'))
                            <li class="menu-item menu-item-active" aria-haspopup="true">
                                @else
                            <li class="menu-item " aria-haspopup="true">
                                @endif
                                <a href="/owner/map" class="menu-link">
                                    <span class="svg-icon svg-icon-2x menu-icon">
                                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-08-03-114926/theme/html/demo1/dist/../src/media/svg/icons/General/Search.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">

                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path style="fill:#FFCD00" d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z" fill="#000000" fill-rule="nonzero"/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon--></span>
                                    <span class="menu-text">@lang('Mapa Inmobiliarias')</span>
                                </a>
                            </li>
                            @if (Request::is('/info'))
                            <li class="menu-item menu-item-active" aria-haspopup="true">
                                @else
                            <li class="menu-item " aria-haspopup="true">
                                @endif
                                <a href="/info" class="menu-link">
                                    <span class="svg-icon svg-icon-2x menu-icon">
                                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-08-03-114926/theme/html/demo1/dist/../src/media/svg/icons/General/Search.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">

                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path style="fill:#FFCD00" d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z" fill="#000000" fill-rule="nonzero"/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon--></span>
                                    <span class="menu-text">Contacto-Ayuda</span>
                                </a>
                            </li>

                                                                                                            @if (Request::is('owner'))
                                                                                                                <li class="menu-item menu-item-active"
                                                                                                                    aria-haspopup="true">
                                                                                                            @else
                                                                                                                <li class="menu-item "
                                                                                                                    aria-haspopup="true">
                                                                                                                    @endif
                                                                                                                    <a href="/owner/" class="menu-link"
                                                                                                                    >
                                    <span class="svg-icon svg-icon-2x menu-icon">
                                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-08-03-114926/theme/html/demo1/dist/../src/media/svg/icons/Communication/Adress-book2.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path style="fill:#FFCD00"
                                                      d="M18,2 L20,2 C21.6568542,2 23,3.34314575 23,5 L23,19 C23,20.6568542 21.6568542,22 20,22 L18,22 L18,2 Z"
                                                      fill="#000000" opacity="0.3"/>
                                                <path style="fill:#FFCD00"
                                                      d="M5,2 L17,2 C18.6568542,2 20,3.34314575 20,5 L20,19 C20,20.6568542 18.6568542,22 17,22 L5,22 C4.44771525,22 4,21.5522847 4,21 L4,3 C4,2.44771525 4.44771525,2 5,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z"
                                                      fill="#000000"/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon--></span>
                                                                                                                        <span class="menu-text">@lang('Mis datos')</span>
                                                                                                                    </a>
                                                                                                                </li>


                                                                                        @else (Auth::User()->type == 'real_estate')

                                                                                            @if (Request::is('real_estate/dashboard'))
                                                                                                <li class="menu-item menu-item-active"
                                                                                                    aria-haspopup="true">
                                                                                            @else
                                                                                                <li class="menu-item "
                                                                                                    aria-haspopup="true">
                                                                                                    @endif
                                                                                                    <a href="/real_estate/dashboard"
                                                                                                       class="menu-link">
                                    <span class="svg-icon svg-icon-2x menu-icon">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                             viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path style="fill:#FFCD00"
                                                      d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                                      fill="#000000" fill-rule="nonzero"/>
                                                <path style="fill:#FFCD00"
                                                      d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                                      fill="#000000" opacity="0.3"/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                                                                                        <span
                                                                                                            class="menu-text">@lang('Panel de control')</span>
                                                                                                    </a>
                                                                                                </li>


                                                                                                    @if (Request::is('real_estate/properties'))
                                                                                                        <li class="menu-item menu-item-active"
                                                                                                            aria-haspopup="true">
                                                                                                    @else
                                                                                                        <li class="menu-item "
                                                                                                            aria-haspopup="true">
                                                                                                            @endif
                                                                                                            <a href="/real_estate/properties"
                                                                                                               class="menu-link">
                                    <span class="svg-icon svg-icon-2x menu-icon">
                                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-08-03-114926/theme/html/demo1/dist/../src/media/svg/icons/General/Search.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path style="fill:#FFCD00" d="M3.95709826,8.41510662 L11.47855,3.81866389 C11.7986624,3.62303967 12.2013376,3.62303967 12.52145,3.81866389 L20.0429,8.41510557 C20.6374094,8.77841684 21,9.42493654 21,10.1216692 L21,19.0000642 C21,20.1046337 20.1045695,21.0000642 19,21.0000642 L4.99998155,21.0000673 C3.89541205,21.0000673 2.99998155,20.1046368 2.99998155,19.0000673 L2.99999828,10.1216672 C2.99999935,9.42493561 3.36258984,8.77841732 3.95709826,8.41510662 Z M10,13 C9.44771525,13 9,13.4477153 9,14 L9,17 C9,17.5522847 9.44771525,18 10,18 L14,18 C14.5522847,18 15,17.5522847 15,17 L15,14 C15,13.4477153 14.5522847,13 14,13 L10,13 Z" fill="#000000"/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon--></span>
                                                                                                                <span
                                                                                                                    class="menu-text">Propiedades en mis zonas</span>
                                                                                                            </a>
                                                                                                        </li>
                                                                                                        @if (Request::is('real_estate/favorites'))
                                                                                                            <li class="menu-item menu-item-active"
                                                                                                                aria-haspopup="true">
                                                                                                        @else
                                                                                                            <li class="menu-item "
                                                                                                                aria-haspopup="true">
                                                                                                                @endif
                                                                                                                <a href="/real_estate/favorites"
                                                                                                                   class="menu-link">
                                    <span class="svg-icon svg-icon-2x menu-icon ">
                                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-08-03-114926/theme/html/demo1/dist/../src/media/svg/icons/General/Heart.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path style="fill:#FFCD00"
                                                      d="M16.5,4.5 C14.8905,4.5 13.00825,6.32463215 12,7.5 C10.99175,6.32463215 9.1095,4.5 7.5,4.5 C4.651,4.5 3,6.72217984 3,9.55040872 C3,12.6834696 6,16 12,19.5 C18,16 21,12.75 21,9.75 C21,6.92177112 19.349,4.5 16.5,4.5 Z"
                                                      fill="#000000" fill-rule="nonzero"/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon--></span>
                                                                                                                    <span
                                                                                                                        class="menu-text">Propiedades favoritas</span>
                                                                                                                </a>
                                                                                                            </li>




                                                                                                                @if (Request::is('real_estate/fichas'))
                                                                                                                    <li class="menu-item menu-item-active"
                                                                                                                        aria-haspopup="true">
                                                                                                                @else
                                                                                                                    <li class="menu-item "
                                                                                                                        aria-haspopup="true">
                                                                                                                        @endif
                                                                                                                        <a href="{{route('ficha.index')}}"
                                                                                                                           class="menu-link">
                                                                                                                           <span class="svg-icon svg-icon-2x menu-icon"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Home\Book-open.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                                                                                <path  style="fill:#FFCD00" d="M13.6855025,18.7082217 C15.9113859,17.8189707 18.682885,17.2495635 22,17 C22,16.9325178 22,13.1012863 22,5.50630526 L21.9999762,5.50630526 C21.9999762,5.23017604 21.7761292,5.00632908 21.5,5.00632908 C21.4957817,5.00632908 21.4915635,5.00638247 21.4873465,5.00648922 C18.658231,5.07811173 15.8291155,5.74261533 13,7 C13,7.04449645 13,10.79246 13,18.2438906 L12.9999854,18.2438906 C12.9999854,18.520041 13.2238496,18.7439052 13.5,18.7439052 C13.5635398,18.7439052 13.6264972,18.7317946 13.6855025,18.7082217 Z" fill="#000000"/>
                                                                                                                                <path  style="fill:#FFCD00" d="M10.3144829,18.7082217 C8.08859955,17.8189707 5.31710038,17.2495635 1.99998542,17 C1.99998542,16.9325178 1.99998542,13.1012863 1.99998542,5.50630526 L2.00000925,5.50630526 C2.00000925,5.23017604 2.22385621,5.00632908 2.49998542,5.00632908 C2.50420375,5.00632908 2.5084219,5.00638247 2.51263888,5.00648922 C5.34175439,5.07811173 8.17086991,5.74261533 10.9999854,7 C10.9999854,7.04449645 10.9999854,10.79246 10.9999854,18.2438906 L11,18.2438906 C11,18.520041 10.7761358,18.7439052 10.4999854,18.7439052 C10.4364457,18.7439052 10.3734882,18.7317946 10.3144829,18.7082217 Z" fill="#000000" opacity="0.3"/>
                                                                                                                            </g>
                                                                                                                        </svg><!--end::Svg Icon--></span>
                                                                                                                            <span
                                                                                                                                class="menu-text">Fichas abiertas y citas</span>
                                                                                                                        </a>
                                                                                                                    </li>

                                                                                                                    @if (Request::is('/real_estate/search_properties'))
                                                                                                                    <li class="menu-item menu-item-active"
                                                                                                                        aria-haspopup="true">
                                                                                                                @else
                                                                                                                    <li class="menu-item "
                                                                                                                        aria-haspopup="true">
                                                                                                                        @endif
                                                                                                                        <a href="/real_estate/search_properties"
                                                                                                                           class="menu-link">
                                                <span class="svg-icon svg-icon-2x menu-icon">
                                                    <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-08-03-114926/theme/html/demo1/dist/../src/media/svg/icons/General/Search.svg--><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                        viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <path style="fill:#FFCD00"
                                                                  d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                                  fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                            <path style="fill:#FFCD00"
                                                                  d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                                  fill="#000000" fill-rule="nonzero"/>
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon--></span>
                                                                                                                            <span
                                                                                                                                class="menu-text">@lang('Buscador de propiedades')</span>
                                                                                                                        </a>
                                                                                                                    </li>
                                                                                                                            @if (Request::is('real?esate/map'))
                                                                                                                                <li class="menu-item menu-item-active" aria-haspopup="true">
                                                                                                                            @else
                                                                                                                                <li class="menu-item " aria-haspopup="true">
                                                                                                                                    @endif
                                                                                                                                    <a href="{{ route('real_estate.map') }}" class="menu-link">
                                    <span class="svg-icon svg-icon-2x menu-icon">
                                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-08-03-114926/theme/html/demo1/dist/../src/media/svg/icons/General/Search.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path style="fill:#FFCD00" d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z" fill="#000000" fill-rule="nonzero"/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon--></span>
                                                                                                                                        <span class="menu-text">@lang('Mapa Propiedades')</span>
                                                                                                                                    </a>
                                                                                                                                </li>

                                                                                                                            @if (Request::is('/info'))
                                                                                                                                <li class="menu-item menu-item-active" aria-haspopup="true">
                                                                                                                            @else
                                                                                                                                <li class="menu-item " aria-haspopup="true">
                                                                                                                                    @endif
                                                                                                                                    <a href="/info" class="menu-link">
                                    <span class="svg-icon svg-icon-2x menu-icon">
                                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-08-03-114926/theme/html/demo1/dist/../src/media/svg/icons/General/Search.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path style="fill:#FFCD00" d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z" fill="#000000" fill-rule="nonzero"/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon--></span>
                                                                                                                                        <span class="menu-text">Contacto-Ayuda</span>
                                                                                                                                    </a>
                                                                                                                                </li>
                                                                                                                                                @if (Request::is('real_estate'))
                                                                                                                                                    <li class="menu-item menu-item-active"
                                                                                                                                                        aria-haspopup="true">
                                                                                                                                                @else
                                                                                                                                                    <li class="menu-item "
                                                                                                                                                        aria-haspopup="true">
                                                                                                                                                        @endif
                                                                                                                                                        <a href="/real_estate"
                                                                                                                                                           class="menu-link"
                                                                                                                                                        >
                                    <span class="svg-icon svg-icon-2x menu-icon">
                                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-08-03-114926/theme/html/demo1/dist/../src/media/svg/icons/Communication/Adress-book2.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path style="fill:#FFCD00"
                                                      d="M18,2 L20,2 C21.6568542,2 23,3.34314575 23,5 L23,19 C23,20.6568542 21.6568542,22 20,22 L18,22 L18,2 Z"
                                                      fill="#000000" opacity="0.3"/>
                                                <path style="fill:#FFCD00"
                                                      d="M5,2 L17,2 C18.6568542,2 20,3.34314575 20,5 L20,19 C20,20.6568542 18.6568542,22 17,22 L5,22 C4.44771525,22 4,21.5522847 4,21 L4,3 C4,2.44771525 4.44771525,2 5,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z"
                                                      fill="#000000"/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon--></span>
                                                                                                                                                            <span
                                                                                                                                                                class="menu-text">Mis datos</span>
                                                                                                                                                        </a>
                                                                                                                                                    </li>
                                                                                                                @endif









                                                                                                                @if (Request::is('/logout'))
                                                                                                                    <li class="menu-item menu-item-active"
                                                                                                                        aria-haspopup="true">
                                                                                                                @else
                                                                                                                    <li class="menu-item "
                                                                                                                        aria-haspopup="true">
                                                                                                                        @endif
                                                                                                                        <a
                                                                                                                           href="/logout"
                                                                                                                           class="menu-link menu-lateral-logout">
                                    <span class="svg-icon svg-icon-2x menu-icon">
                                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-08-03-114926/theme/html/demo1/dist/../src/media/svg/icons/Home/Door-open.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect opacity="0.300000012" x="0" y="0" width="24" height="24"/>
                                                <polygon fill="#000000" fill-rule="nonzero" opacity="0.3"
                                                         points="7 4.89473684 7 21 5 21 5 3 11 3 11 4.89473684"/>
                                                <path style="fill:#FFCD00"
                                                      d="M10.1782982,2.24743315 L18.1782982,3.6970464 C18.6540619,3.78325557 19,4.19751166 19,4.68102291 L19,19.3190064 C19,19.8025177 18.6540619,20.2167738 18.1782982,20.3029829 L10.1782982,21.7525962 C9.63486295,21.8510675 9.11449486,21.4903531 9.0160235,20.9469179 C9.00536265,20.8880837 9,20.8284119 9,20.7686197 L9,3.23140966 C9,2.67912491 9.44771525,2.23140966 10,2.23140966 C10.0597922,2.23140966 10.119464,2.2367723 10.1782982,2.24743315 Z M11.9166667,12.9060229 C12.6070226,12.9060229 13.1666667,12.2975724 13.1666667,11.5470105 C13.1666667,10.7964487 12.6070226,10.1879981 11.9166667,10.1879981 C11.2263107,10.1879981 10.6666667,10.7964487 10.6666667,11.5470105 C10.6666667,12.2975724 11.2263107,12.9060229 11.9166667,12.9060229 Z"
                                                      fill="#000000"/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon--></span>
                                                                                                                            <span
                                                                                                                                class="menu-text">@lang('Desconectar')</span>
                                                                                                                        </a>
                                                                                                                    </li>

                    </ul>
                    <!--end::Menu Nav-->

                </div>
                <!--end::Menu Container-->

            </div>
            <!--end::Aside Menu-->
        </div>
        <!--end::Aside-->
        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
            <!--begin::Header-->
            <div id="kt_header" class="header header-fixed">
                <div class="container-fluid d-flex align-items-stretch justify-content-between">
                    <!--begin::Header Menu Wrapper-->
                    <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                        <!--begin::Header Menu-->
                        <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                            <!--begin::Header Nav-->
                            <ul class="menu-nav mt-2 ">
                                
                                @yield('top_menu')


                            </ul>

                        </div>
                    </div>

                </div>
            </div>


            <!--end::Header-->
            <!--begin::Content-->
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                <!--begin::Subheader-->


                <!--end::Subheader-->
                <!--begin::Entry-->
                <div class="d-flex flex-column-fluid">
                    <!--begin::Container-->
                    <div class="container">
                        @include ('partials/errors')
                        @include ('partials/success')
                        @yield('content')
                    </div>

                    <!--end::Container-->
                </div>
                <!--end::Entry-->
            </div>
            <!--end::Content-->
            {{-- <!--begin::Footer-->

     <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
         <!--begin::Container-->
         <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
             <!--begin::Copyright-->
             <div class="text-dark order-2 order-md-1">
                 <span class="text-muted font-weight-bold mr-2">2020©</span>
                 <a href="#" target="_blank" class="text-dark-75 text-hover-primary">Inmozon</a>
             </div>
             <!--end::Copyright-->
             <!--begin::Nav-->
             <div class="nav nav-dark">
                 <a href="#" target="_blank" class="nav-link pl-0 pr-5">Sobre nosotros</a>
                 <a href="#" target="_blank" class="nav-link pl-0 pr-5">Equipo</a>
                 <a href="#" target="_blank" class="nav-link pl-0 pr-0">Contacto</a>
             </div>
             <!--end::Nav-->
         </div>
         <!--end::Container-->
     </div>
     <!--end::Footer-->--}}
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Main-->

<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{ url('assets/backend/plugins/global/plugins.bundle.js?v=7.0.5') }}"></script>
<script src="{{ url('assets/backend/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.5') }}"></script>
<script src="{{ url('assets/backend/js/scripts.bundle.js?v=7.0.5') }}"></script>
{{--
    <script src="{{ url('assets/backend/js/components/datatable/ktdatatable/advanced/column-rendering.js') }}"></script>
--}}
<script>var KTAppSettings = {"breakpoints": {"sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400},
        "colors": {
            "theme": {
                "base": {
                    "white": "#ffffff",
                    "primary": "#3E97FF",
                    "secondary": "#E5EAEE",
                    "success": "#08D1AD",
                    "info": "#844AFF",
                    "warning": "#F5CE01",
                    "danger": "#FF3D60",
                    "light": "#E4E6EF",
                    "dark": "#181C32"
                },
                "light": {
                    "white": "#ffffff",
                    "primary": "#DEEDFF",
                    "secondary": "#EBEDF3",
                    "success": "#D6FBF4",
                    "info": "#6125E1",
                    "warning": "#FFF4DE",
                    "danger": "#FFE2E5",
                    "light": "#F3F6F9",
                    "dark": "#D6D6E0"
                },
                "inverse": {
                    "white": "#ffffff",
                    "primary": "#ffffff",
                    "secondary": "#3F4254",
                    "success": "#ffffff",
                    "info": "#ffffff",
                    "warning": "#ffffff",
                    "danger": "#ffffff",
                    "light": "#464E5F",
                    "dark": "#ffffff"
                }
            },
            "gray": {
                "gray-100": "#F3F6F9",
                "gray-200": "#EBEDF3",
                "gray-300": "#E4E6EF",
                "gray-400": "#D1D3E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#7E8299",
                "gray-700": "#5E6278",
                "gray-800": "#3F4254",
                "gray-900": "#181C32"
            }
        },
        "font-family": "Poppins"
    };</script>
<script language="JavaScript">
    function cambia() {

        var logo = document.getElementById('logo')
        if (logo.src == "{{URL('assets/backend/media/logos/inmozon.png')}}") {
            logo.setAttribute('src', "{{URL('assets/backend/media/logos/inmozon2.png')}}")

        } else {
            logo.setAttribute('src', "{{URL('assets/backend/media/logos/inmozon.png')}}")

        }
    }
</script>
<style>
    .active:active {
    }
</style>
<!--end::Global Theme Bundle-->
<!--begin::Page Vendors(used by this page)-->
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<!--end::Page Scripts-->

@yield('js')
</body>


</html>
