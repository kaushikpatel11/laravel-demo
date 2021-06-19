@extends('template.template')
@section('css')


    <link href="{{url('assets/frontend/libraries/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/frontend/libraries/owl-carousel/owl.carousel.css')}}"
          rel="stylesheet"> <!-- Core Owl Carousel CSS File  *	v1.3.3 -->
    <link href="{{url('assets/frontend/libraries/owl-carousel/owl.theme.css')}}"
          rel="stylesheet"> <!-- Core Owl Carousel CSS Theme  File  *	v1.3.3 -->
    <link href="{{url('assets/frontend/libraries/fonts/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/frontend/libraries/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/frontend/libraries/checkbox/minimal.css')}}" rel="stylesheet">
    <link href="{{url('assets/frontend/libraries/drag-drop/drag-drop.css')}}" rel="stylesheet">
    <link href="{{url('assets/frontend/css/components.css')}}" rel="stylesheet">
    <link href="{{url('assets/frontend/style.css')}}" rel="stylesheet">
    <!--link href="submit-property.css" rel="stylesheet"/-->
    <link href="{{url('assets/frontend/css/media.css')}}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{url('assets/frontend/js/html5/html5shiv.min.js')}}"></script>
    <script src="{{url('assets/frontend/js/html5/respond.min.js')}}"></script>
    <![endif]-->

    <link href="http://fonts.googleapis.com/css?family=Karla:400,400italic,700,700italic" rel="stylesheet"
          type="text/css">
    <link
        href="http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic"
        rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic" rel="stylesheet"
          type="text/css">



@endsection
@section('top_menu')

@endsection

@section('content')

    <body  data-offset="200" data-spy="scroll" data-target=".primary-navigation">{{--
    <!-- LOADER -->
    <div id="site-loader" class="load-complete">
        <div class="load-position">
            <div class="logo logo-block"><a href="index.html"><img src="images/logo.png" alt="logo"/></a></div>
            <h6>Please wait, loading...</h6>
            <div class="loading">
                <div class="loading-line"></div>
                <div class="loading-break loading-dot-1"></div>
                <div class="loading-break loading-dot-2"></div>
                <div class="loading-break loading-dot-3"></div>
            </div>
        </div>
    </div><!-- Loader /- -->--}}

    <a id="top"></a>
    {{--  <!-- Header Section -->
      <header id="header-section" class="header header1 container-fluid p_z">
          <!-- container -->
          <div class="container">
              <!-- Top Header -->
              <div class="top-header">
                  <p class="col-md-6 col-sm-9">
                      <span><i class="fa fa-phone"></i>  1-200-666-1234</span>
                      <span><a title="mail-to" href="mailto:info@propertyexpert.com"><i class="fa fa-envelope-o"></i> info@propertyexpert.com</a></span>
                  </p>
                  <div class="col-md-6 col-sm-3 p_r_z">
                      <ul class="property-social p_l_z m_b_z">
                          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                          <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                          <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                          <li><a href="#"><i class="fa fa-rss"></i></a></li>
                      </ul>
                  </div>
              </div><!-- Top Header -->
              <!-- Navigation Block -->
              <div class="navigation-block">
                  <!-- Logo Block -->
                  <div class="col-md-2 logo-block no-padding">
                      <a title="logo" href="index.html"><img src="images/logo.png" alt="logo"/></a>
                  </div><!-- Logo Block /- -->
                  <!-- Menu Block -->
                  <div class="col-md-10 menu-block">
                      <!-- nav -->
                      <nav class="navbar navbar-default primary-navigation">
                          <div class="navbar-header">
                              <button aria-controls="navbar" aria-expanded="false" data-target="#navbar"
                                      data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                                  <span class="sr-only">Toggle navigation</span>
                                  <span class="icon-bar"></span>
                                  <span class="icon-bar"></span>
                                  <span class="icon-bar"></span>
                              </button>
                          </div>
                          <div class="navbar-collapse collapse" id="navbar">
                              <ul class="nav navbar-nav">
                                  <li class="dropdown">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Home</a>
                                      <ul class="dropdown-menu" role="menu">
                                          <li><a href="index.html">Home 1</a></li>
                                          <li><a href="index2.html">Home 2</a></li>
                                          <li><a href="index3.html">Home 3</a></li>
                                      </ul>
                                  </li>
                                  <li class="dropdown">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Listing</a>
                                      <ul class="dropdown-menu" role="menu">
                                          <li><a href="aa-listing.html">AA Listing</a></li>
                                          <li><a href="aa-listing-list.html">AA Listing List</a></li>
                                      </ul>
                                  </li>
                                  <li class="dropdown">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Property</a>
                                      <ul class="dropdown-menu" role="menu">
                                          <li><a href="property-detail.html">Detail 1</a></li>
                                          <li><a href="property-detail-2.html">Detail 2</a></li>
                                      </ul>
                                  </li>
                                  <li class="dropdown">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog</a>
                                      <ul class="dropdown-menu" role="menu">
                                          <li><a href="blog.html">Blog</a></li>
                                          <li><a href="blog-detail.html">Blog Detail</a></li>
                                      </ul>
                                  </li>
                                  <!--li><a href="work.html">Gallery</a></li-->
                                  <li class="dropdown">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages</a>
                                      <ul class="dropdown-menu" role="menu">
                                          <li><a href="profile.html">Profile</a></li>
                                          <li><a href="agent-listing.html">Agent Listing 1</a></li>
                                          <li><a href="agent-listing-2.html">Agent Listing 2</a></li>
                                          <li><a href="agent-details.html">Agent Detail</a></li>
                                          <li><a href="shortcodes.html">Shortcodes</a></li>
                                      </ul>
                                  </li>
                                  <li><a href="contact.html">Contact Us</a></li>
                              </ul>
                          </div><!--/.nav-collapse -->
                      </nav><!-- nav /- -->
                      <a title="Add Property" href="submit-property.html" class="pull-right">Add Property</a>
                  </div><!-- Menu Block /- -->
              </div><!-- Navigation Block /- -->
              <div class="pull-right">
                  <a title="User" href="#" class="user-icon"><img src="images/icon/user-icon.png" alt="user icon"/></a>
                  <div id="sb-search" class="sb-search">
                      <form>
                          <input class="sb-search-input" placeholder="Enter your search term..." type="text" value=""
                                 name="search" id="search">
                          <button class="sb-search-submit"><i class="fa fa-search"></i></button>
                          <span class="sb-icon-search"></span>
                      </form>
                  </div>
              </div>
          </div><!-- container /- -->
      </header><!-- Header Section /- -->--}}
    <!-- Page Content -->
    <div class="page-content" >
    {{--<!-- Banner Section -->
    <div id="page-banner-section" class="page-banner-section container-fluid p_z">
        <img src="images/aa-listing/banner.jpg" alt="banner">
        <!-- Banner Inner -->
        <div class="page-title">
            <div class="container ">
                <div class="banner-inner">
                    <h2>EDIT PROFILE</h2>
                </div>
            </div>
            <div class="pages-breadcrumb">
                <div class="container">
                    <!-- Page breadcrumb -->
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><a href="#">Home</a></li>
                        <li class="active">Detail page</li>
                    </ol>
                </div>
            </div>
        </div><!-- Banner Inner /- -->
    </div><!-- Banner Section /- -->--}}

    <!-- Property Detail Page -->
        <div class="property-main-details">
            <!-- container -->
            <div class="container " >
                <div class="property-details-content property-details-content2 container-fluid p_z " >
                    <!-- col-md-9 -->
                    <div class="col-md-9 col-sm-6 p_l_z justify-content-center" style="display: contents">
                        <!-- Slider Section -->
                        <div id="property-detail1-slider" class="carousel slide property-detail1-slider"
                             data-ride="carousel">
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <img src="{{'/assets/frontend/images/details/detail-slide-1.jpg'}}" alt="Slide">
                                </div>
                                <div class="item">
                                    <img src="{{'/assets/frontend/images/details/detail-slide-1.jpg'}}" alt="Slide">
                                </div>
                                <div class="item">
                                    <img src="{{'/assets/frontend/images/details/detail-slide-1.jpg'}}" alt="Slide">
                                </div>
                                <div class="item">
                                    <img src="{{'/assets/frontend/images/details/detail-slide-1.jpg'}}" alt="Slide">
                                </div>
                            </div>
                            <!-- Controls -->
                            <a class="left carousel-control" href="#property-detail1-slider" role="button"
                               data-slide="prev">
                                <span class="fa fa-long-arrow-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#property-detail1-slider" role="button"
                               data-slide="next">
                                <span class="fa fa-long-arrow-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div><!-- Slider Section /- -->
                        <div class="property-header">
                            <h3>15421 Southwest 39th Terrace - Miami <span>For Rent</span></h3>
                            <ul>
                                <li>$320/mo</li>
                                <li>Product ID : 201354</li>
                                <li><i class="fa fa-expand"></i>3326 sq</li>
                                <li><i><img src="/assets/frontend/images/icon/bed-icon.png" alt="bed-icon"/></i>3</li>
                                <li><i><img src="/assets/frontend/images/icon/bath-icon.png" alt="bath-icon"/></i>2</li>
                                <li><i class="fa fa-car"></i>1</li>
                            </ul>
                            <a title="print" href="#"><i class="fa fa-print"></i> Print</a>
                        </div>
                        <div class="single-property-details">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ullamcorper libero sed
                                ante auctor vel gravida nunc placerat. Suspendisse molestie posuere sem, in viverra
                                dolor venenatis sit amet. Aliquam gravida nibh quis justo pulvinar luctus. Phasellus a
                                malesuada massa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies vitae.
                                Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. Class aptent taciti
                                sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In hac habitasse
                                platea dictumst. Cum sociis natoque penatibus et magnis.dis parturient montes, nascetur
                                ridiculus mus.</p>
                        </div>
                        <div class="general-amenities pull-left">
                            <h3>General amenities</h3>
                            <div class="amenities-list pull-left">
                                <div class="col-md-3 col-sm-12 col-xs-12">
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="check_elevator" name="elevator"
                                               value="check_elevator">
                                        <span></span>Elevator</label>
                                    </div>
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-2" checked>
                                        <label for="checkbox-2">Balcony</label>
                                    </div>
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-3" checked>
                                        <label for="checkbox-3">Bedding</label>
                                    </div>
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-4" checked>
                                        <label for="checkbox-4">Cable TV</label>
                                    </div>
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-5" checked>
                                        <label for="checkbox-5">Cleaning after exit</label>
                                    </div>
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-6">
                                        <label for="checkbox-6">Cofee pot</label>
                                    </div>
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-7" checked>
                                        <label for="checkbox-7">Computer</label>
                                    </div>
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-8">
                                        <label for="checkbox-8">Cot</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12 col-xs-12">
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-9">
                                        <label for="checkbox-9">Dishwasher</label>
                                    </div>
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-10" checked>
                                        <label for="checkbox-10">DVD</label>
                                    </div>
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-11" checked>
                                        <label for="checkbox-11">Fan</label>
                                    </div>
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-12" checked>
                                        <label for="checkbox-12">Fridge</label>
                                    </div>
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-13" checked>
                                        <label for="checkbox-13">Grill</label>
                                    </div>
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-14">
                                        <label for="checkbox-14">Hairdryer</label>
                                    </div>
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-15" checked>
                                        <label for="checkbox-15">Heating</label>
                                    </div>
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-16">
                                        <label for="checkbox-16">Hi-fi</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12 col-xs-12">
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-17">
                                        <label for="checkbox-17">Internet</label>
                                    </div>
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-18" checked>
                                        <label for="checkbox-18">Iron</label>
                                    </div>
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-19" checked>
                                        <label for="checkbox-19">Juicer</label>
                                    </div>
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-20" checked>
                                        <label for="checkbox-20">Lift</label>
                                    </div>
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-21" checked>
                                        <label for="checkbox-21">Microwave</label>
                                    </div>
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-22">
                                        <label for="checkbox-22">Oven</label>
                                    </div>
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-23" checked>
                                        <label for="checkbox-23">Parking</label>
                                    </div>
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-24">
                                        <label for="checkbox-24">Parquet</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12 col-xs-12">
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-25">
                                        <label for="checkbox-25">Radio</label>
                                    </div>
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-26" checked>
                                        <label for="checkbox-26">Roof terrace</label>
                                    </div>
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-27" checked>
                                        <label for="checkbox-27">Smoking allowed</label>
                                    </div>
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-28" checked>
                                        <label for="checkbox-28">Terrace</label>
                                    </div>
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-29" checked>
                                        <label for="checkbox-29">Toaster</label>
                                    </div>
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-30">
                                        <label for="checkbox-30">Towelwes</label>
                                    </div>
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-31" checked>
                                        <label for="checkbox-31">Use of pool</label>
                                    </div>
                                    <div class="amenities-checkbox">
                                        <input type="checkbox" id="checkbox-32">
                                        <label for="checkbox-32">Video</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="property-direction pull-left">
                            <h3>Get Direction</h3>
                            <div class="property-map">
                                <div id="gmap" class="mapping"></div>
                            </div>
                            <div class="property-map contact-agent">
                                <h3>Contact Agent</h3>
                                <div class="col-md-4 agent-details">
                                    <div class="agent-header">
                                        <div class="agent-img"><img
                                                src="/assets/frontend/images/single-property/agent.jpg" alt="agent"/>
                                        </div>
                                        <div class="agent-name">
                                            <h5>agent John Doe</h5>
                                            <ul>
                                                <li><a href="#" title="twitter"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#" title="facebook"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#" title="google-plus"><i
                                                            class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                        </div>
                                        <p>Our Latest listed properties and check out the facilities on them test listed
                                            properties.</p>
                                        <p>Our Latest listed properties and check out the facilities on them test listed
                                            properties.</p>
                                    </div>
                                </div>
                                <div class="col-md-8 agent-information p_z">
                                    <div class="agent-info">
                                        <p><i class="fa fa-phone"></i>0123 456 7890</p>
                                        <p>
                                            <i class="fa fa-envelope-o"></i>
                                            <a href="mailto:info@johndoe.com" title="mail">info@johndoe.com</a>
                                        </p>
                                        <p><i class="fa fa-fax"></i>041-789-4561</p>
                                    </div>
                                    <div class="agent-form">
                                        <h3>Send Instant Message</h3>
                                        <form>
                                            <div class="col-md-6 p_l_z">
                                                <input type="text" placeholder="Your Name"/>
                                            </div>
                                            <div class="col-md-6 p_r_z">
                                                <input type="text" placeholder="Your Email ID"/>
                                            </div>
                                            <input type="text" placeholder="Message"/>
                                            <input type="submit" value="Submit" class="btn">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="property-map">
                                <h3>Share This Property :</h3>
                                <ul>
                                    <li><a href="#" title="twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" title="facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" title="google-plus"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#" title="linkedin-square"><i class="fa fa-linkedin-square"></i></a>
                                    </li>
                                    <li><a href="#" title="pinterest"><i class="fa fa-pinterest"></i></a></li>
                                    <li><a href="#" title="instagram"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="other-properties row">
                            <!-- Col-md-4 -->
                            <div class="col-md-4 col-xs-12 rent-block">
                                <!-- Property Main Box -->
                                <div class="property-main-box">
                                    <div class="property-images-box">
                                        <span>R</span>
                                        <a href="#"><img src="/assets/frontend/images/rent/rent-1.jpg" alt="rent"/></a>
                                        <h4>&dollar;380 / pm</h4>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="property-details">
                                        <a href="#">Southwest 39th Terrace</a>
                                        <ul>
                                            <li><i class="fa fa-expand"></i>3326 sq</li>
                                            <li><i><img src="/assets/frontend/images/icon/bed-icon.png" alt="bed-icon"/></i>3
                                            </li>
                                            <li><i><img src="/assets/frontend/images/icon/bath-icon.png"
                                                        alt="bath-icon"/></i>2
                                            </li>
                                        </ul>
                                    </div>
                                </div><!-- Property Main Box -->
                            </div><!-- Col-md-4 /- -->
                            <!-- Col-md-4 -->
                            <div class="col-md-4 sale-block">
                                <!-- Property Main Box -->
                                <div class="property-main-box">
                                    <div class="property-images-box">
                                        <span>S</span>
                                        <a href="#"><img src="/assets/frontend/images/rent/rent-4.jpg" alt="rent"/></a>
                                        <h4>&dollar;330000</h4>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="property-details">
                                        <a href="#">20 Apartments of Type A</a>
                                        <ul>
                                            <li><i class="fa fa-expand"></i>3326 sq</li>
                                            <li><i><img src="/assets/frontend/images/icon/bed-icon.png" alt="bed-icon"/></i>3
                                            </li>
                                            <li><i><img src="/assets/frontend/images/icon/bath-icon.png"
                                                        alt="bath-icon"/></i>2
                                            </li>
                                        </ul>
                                    </div>
                                </div><!-- Property Main Box /- -->
                            </div><!-- col-md-4 /- -->
                            <!-- Col-md-4 -->
                            <div class="col-md-4 rent-block">
                                <!-- Property Main Box -->
                                <div class="property-main-box">
                                    <div class="property-images-box">
                                        <span>R</span>
                                        <a href="#"><img src="/assets/frontend/images/rent/rent-3.jpg" alt="rent"/></a>
                                        <h4>&dollar;380 / pm</h4>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="property-details">
                                        <a href="#">15 Apartments of Type B</a>
                                        <ul>
                                            <li><i class="fa fa-expand"></i>3326 sq</li>
                                            <li><i><img src="/assets/frontend/images/icon/bed-icon.png" alt="bed-icon"/></i>3
                                            </li>
                                            <li><i><img src="/assets/frontend/images/icon/bath-icon.png"
                                                        alt="bath-icon"/></i>2
                                            </li>
                                        </ul>
                                    </div>
                                </div><!-- Property Main Box -->
                            </div><!-- Col-md-4 /- -->
                        </div>
                    </div><!-- col-md-9 /- -->
                    <!-- col-md-3 -->
{{--
                    <div class="col-md-3 col-sm-6 p_r_z property-sidebar">
                        <aside class="widget widget-search">
                            <h2 class="widget-title">search<span>property</span></h2>
                            <form>
                                <select>
                                    <option value="selected">Property ID</option>
                                    <option value="one">One</option>
                                    <option value="two">Two</option>
                                    <option value="three">Three</option>
                                    <option value="four">Four</option>
                                    <option value="five">Five</option>
                                </select>
                                <select>
                                    <option value="selected">Location</option>
                                    <option value="one">One</option>
                                    <option value="two">Two</option>
                                    <option value="three">Three</option>
                                    <option value="four">Four</option>
                                    <option value="five">Five</option>
                                </select>
                                <select>
                                    <option value="selected">Type</option>
                                    <option value="one">One</option>
                                    <option value="two">Two</option>
                                    <option value="three">Three</option>
                                    <option value="four">Four</option>
                                    <option value="five">Five</option>
                                </select>
                                <select>
                                    <option value="selected">Status</option>
                                    <option value="one">One</option>
                                    <option value="two">Two</option>
                                    <option value="three">Three</option>
                                    <option value="four">Four</option>
                                    <option value="five">Five</option>
                                </select>
                                <div class="col-md-6 col-sm-6 p_l_z">
                                    <select>
                                        <option value="selected">Beds</option>
                                        <option value="one">One</option>
                                        <option value="two">Two</option>
                                        <option value="three">Three</option>
                                        <option value="four">Four</option>
                                        <option value="five">Five</option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-6 p_r_z">
                                    <select>
                                        <option value="selected">Baths</option>
                                        <option value="one">One</option>
                                        <option value="two">Two</option>
                                        <option value="three">Three</option>
                                        <option value="four">Four</option>
                                        <option value="five">Five</option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-6 p_l_z">
                                    <select>
                                        <option value="selected">Min Price</option>
                                        <option value="one">One</option>
                                        <option value="two">Two</option>
                                        <option value="three">Three</option>
                                        <option value="four">Four</option>
                                        <option value="five">Five</option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-6 p_r_z">
                                    <select>
                                        <option value="selected">Max Price</option>
                                        <option value="one">$3000</option>
                                        <option value="two">$30000</option>
                                        <option value="three">$300000</option>
                                        <option value="four">$3000000</option>
                                        <option value="five">$3000000000000000</option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-6 p_l_z">
                                    <select>
                                        <option value="selected">Min Sqft</option>
                                        <option value="one">One</option>
                                        <option value="two">Two</option>
                                        <option value="three">Three</option>
                                        <option value="four">Four</option>
                                        <option value="five">Five</option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-6 p_r_z">
                                    <select>
                                        <option value="selected">Max Sqft</option>
                                        <option value="one">One</option>
                                        <option value="two">Two</option>
                                        <option value="three">Three</option>
                                        <option value="four">Four</option>
                                        <option value="five">Five</option>
                                    </select>
                                </div>
                                <input type="submit" value="Search Now" class="btn">
                            </form>
                        </aside>
                        <aside class="widget widget-property-featured">
                            <h2 class="widget-title">featured<span>property</span></h2>
                            <div class="property-featured-inner">
                                <div class="col-md-4 col-sm-3 col-xs-2 p_z">
                                    <a href="#" title="Fetured Property"><img
                                            src="/assets/frontend/images/aa-listing/feacture1.jpg"
                                            alt="feacture1"/></a>
                                </div>
                                <div class="col-md-8 col-sm-9 col-xs-10 featured-content">
                                    <a href="#" title="Fetured Property">Southwest 39th Terrace</a>
                                    <h3>&dollar;350000</h3>
                                </div>
                            </div>
                            <div class="property-featured-inner">
                                <div class="col-md-4 col-sm-3 col-xs-2 p_z">
                                    <a href="#" title="Fetured Property"><img
                                            src="/assets/frontend/images/aa-listing/feacture2.jpg"
                                            alt="feacture2"/></a>
                                </div>
                                <div class="col-md-8 col-sm-9 col-xs-10 featured-content">
                                    <a href="#" title="Fetured Property">>Southwest 39th Terrace</a>
                                    <h3>&dollar;350000</h3>
                                </div>
                            </div>
                            <div class="property-featured-inner">
                                <div class="col-md-4 col-sm-3 col-xs-2 p_z">
                                    <a href="#" title="Fetured Property"><img
                                            src="/assets/frontend/images/aa-listing/feacture3.jpg"
                                            alt="feacture3"/></a>
                                </div>
                                <div class="col-md-8 col-sm-9 col-xs-10 featured-content">
                                    <a href="#" title="Fetured Property">Southwest 39th Terrace</a>
                                    <h3>&dollar;350000</h3>
                                </div>
                            </div>
                        </aside>
                    </div><!-- col-md-3 /- -->
--}}
                </div>
            </div><!-- container /- -->
        </div><!-- Property Detail Page /- -->

        <!-- Partner Section -->
    {{-- <div id="partner-section" class="partner-section">
         <div class="container">
             <div id="business-partner" class="business-partner">
                 <div class="item"><a title="Gallery Image" href="#"><img src="/assets/frontend/images/aa-listing/client1.jpg"
                                                                          alt="client1"></a></div>
                 <div class="item"><a title="Gallery Image" href="#"><img src="/assets/frontend/images/aa-listing/client2.jpg"
                                                                          alt="client2"></a></div>
                 <div class="item"><a title="Gallery Image" href="#"><img src="/assets/frontend/images/aa-listing/client3.jpg"
                                                                          alt="client3"></a></div>
                 <div class="item"><a title="Gallery Image" href="#"><img src="/assets/frontend/images/aa-listing/client1.jpg"
                                                                          alt="client1"></a></div>
                 <div class="item"><a title="Gallery Image" href="#"><img src="/assets/frontend/images/aa-listing/client4.jpg"
                                                                          alt="client4"></a></div>
                 <div class="item"><a title="Gallery Image" href="#"><img src="/assets/frontend/images/aa-listing/client2.jpg"
                                                                          alt="client1"></a></div>
             </div>
         </div>
     </div>--}}<!-- Partner Section /- -->
    </div><!-- Page Content -->

    <!-- Footer Section -->
    {{--   <div id="footer-section" class="footer-section">
           <!-- container -->
           <div class="container">
               <!-- col-md-3 -->
               <div class="col-md-3 col-sm-6">
                   <!-- About Widget -->
                   <aside class="widget widget_about">
                       <h3 class="widget-title">About Us</h3>
                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                           labore et dolore magna aliqua</p>
                   </aside>
                   <!-- About Widget /- -->
               </div><!-- col-md-3 -->

               <!-- col-md-3 -->
               <div class="col-md-3 col-sm-6">
                   <!-- Quick Link Widget -->
                   <aside class="widget widget_quick_links">
                       <h3 class="widget-title">Quick Links</h3>
                       <ul class="p_l_z">
                           <li><a title="Quick Links" href="#">Listing</a></li>
                           <li><a title="Quick Links" href="#">Property</a></li>
                           <li><a title="Quick Links" href="#">News</a></li>
                           <li><a title="Quick Links" href="#">Gallery</a></li>
                           <li><a title="Quick Links" href="#">Pages</a></li>
                           <li><a title="Quick Links" href="#">Types</a></li>
                           <li><a title="Quick Links" href="#">Contact Us</a></li>
                       </ul>
                   </aside>
                   <!-- Quick Link Widget /- -->
               </div><!-- col-md-3 -->

               <!-- col-md-3 -->
               <div class="col-md-3 col-sm-6">
                   <!-- Address Widget -->
                   <aside class="widget widget_address">
                       <h3 class="widget-title">Address</h3>
                       <p>108 Villa Precy Subdivision Kumintang Ilaya Batangas, Philippines</p>
                       <span>1200 666 12345</span>
                       <a title="mailto" href="mailto:info@propertyexpert.com ">info@propertyexpert.com </a>
                   </aside>
                   <!-- Address Widget /- -->
               </div><!-- col-md-3 -->

               <!-- col-md-3 -->
               <div class="col-md-3 col-sm-6">
                   <!-- Address Widget -->
                   <aside class="widget widget_newsletter">
                       <h3 class="widget-title">NewsLetter</h3>
                       <div class="input-group">
                           <input type="text" class="form-control" placeholder="Enter Your ID">
                           <span class="input-group-btn">
                               <button class="btn btn-default" type="button">Go</button>
                           </span>
                       </div><!-- /input-group -->
                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do</p>
                   </aside>
                   <!-- Address Widget /- -->
               </div><!-- col-md-3 -->
           </div><!-- container /- -->
           <!-- Footer Bottom -->
           <div id="footer-bottom" class="footer-bottom">
               <!-- container -->
               <div class="container">
                   <p class="col-md-4 col-sm-6 col-xs-12">&copy; 2015 property expert ‐ All Rights Reserved</p>
                   <div class="col-md-4 col-sm-6 col-xs-12 pull-right social">
                       <ul class="footer_social m_b_z">
                           <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                           <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                           <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                           <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                           <li><a href="#"><i class="fa fa-rss"></i></a></li>
                       </ul>
                       <a href="#" title="back-to-top" id="back-to-top" class="back-to-top"><i
                               class="fa fa-long-arrow-up"></i> Top</a>
                   </div>
               </div><!-- container /- -->
           </div><!-- Footer Bottom /- -->
       </diV>--}}<!-- Footer Section -->

    </body>


@endsection
@section('js')

    <!-- jQuery Include -->
    <script src="{{url('assets/frontend/libraries/jquery.min.js')}}"></script>
    <script src="{{url('assets/frontend/libraries/jquery.easing.min.js')}}"></script><!-- Easing Animation Effect -->
    <script
        src="{{url('assets/frontend/libraries/bootstrap/bootstrap.min.js')}}"></script> <!-- Core Bootstrap v3.2.0 -->
    <script src="{{url('assets/frontend/libraries/modernizr/modernizr.custom.37829.js')}}"></script> <!-- Modernizer -->
    <script
        src="{{url('assets/frontend/libraries/jquery.appear.js')}}"></script> <!-- It Loads jQuery when element is appears -->
    <script
        src="{{url('assets/frontend/libraries/owl-carousel/owl.carousel.min.js')}}"></script> <!-- Core Owl Carousel CSS File  *	v1.3.3 -->
    <script src="{{url('assets/frontend/libraries/checkbox/icheck.min.js')}}"></script> <!-- Check box -->
    <script src="{{url('assets/frontend/libraries/drag-drop/jquery.tmpl.min.js')}}"></script> <!-- Drag Drop file -->
    <script src="{{url('assets/frontend/libraries/drag-drop/drag-drop.js')}}"></script> <!-- Drag Drop File -->
    <script src="{{url('assets/frontend/libraries/drag-drop/modernizr.custom.js')}}"></script> <!-- Drag Drop File -->
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="{{url('assets/frontend/libraries/gmap/jquery.gmap.min.js')}}"></script> <!-- map -->
    <script src="{{url('assets/frontend/libraries/expanding-search/classie.js')}}"></script>
    <script src="{{url('assets/frontend/libraries/expanding-search/uisearch.js')}}"></script>
    <!-- Customized Scripts -->
    <script src="{{url('assets/frontend/js/functions.js')}}"></script>
    <script id="imageTemplate" type="text/x-jquery-tmpl">
		<div class="col-md-3 col-sm-3 col-xs-6">
			<div class="imageholder">
				<figure>
					<img src="${filePath}" alt="${fileName}"/>
				</figure>
			</div>
		</div>





    </script>
    {{--   <script>  function activar_checkbox(check_list) {
               try {
                   if (check_list != "" && check_list != null) {
                       check_list.forEach(check_id => {
                           //descartamos cadena vacia
                           if (check_id != "")
                               document.getElementById(check_id).checked = "checked";

                       })
                   }
               } catch (error) {
                   console.log(error)
               }
           }

           //activar checkboxes segun caracteristicas
           function activar_checkboxes() {
               try {
                   activar_checkbox("{{$property_subtype->characteristics}}".split(";"))
                   activar_checkbox("{{$property_subtype->building_characteristics}}".split(";"))
                   activar_checkbox("{{$property_subtype->security}}".split(";"))
                   activar_checkbox("{{$property_subtype->office_characteristics}}".split(";"))

                   //elevator, energetic, active
                   if ("{{$property_subtype->energetic_certification}}" == true)
                       document.getElementById("check_energetic_certification_general").checked = "checked";
                   console.log("{{$property_subtype}} valor")
                   if ("{{$property_subtype->energetic_certification}}" == true)
                       document.getElementById("energetic_certification_office").checked = "checked";

                   if ("{{$property_subtype->elevator}}")
                       document.getElementById("check_elevator").checked = "checked";


               } catch (error) {

               }

           }

           function disable_edit() {
               var elements = document.getElementById("form_edit_property").elements;
               for (var i = 0, len = elements.length; i < len; ++i) {
                   elements[i].disabled = true;
               }
               document.getElementById("cancel_button").disabled = false;
               document.getElementById("process_button").disabled = false;
           }

           function enable_edit() {
               var elements = document.getElementById("form_edit_property").elements;
               for (var i = 0, len = elements.length; i < len; ++i) {
                   elements[i].disabled = false;

               }
           }

           document.getElementById("propertyable_type").addEventListener('change', selector_vista);

           window.onload = function () {
               document.getElementById("propertyable_type").value = type;
               //simulamos el evento cuando leemos el tipo de propiedad
               selector_vista(aux_object);
               console.log(type)
               activar_checkboxes()

               if ("{{$edit_active}}" == false)
                   disable_edit();
           };</script>--}}
@endsection


