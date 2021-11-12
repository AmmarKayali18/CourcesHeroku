<!DOCTYPE html>
@php($dir = \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocaleDirection())
<html dir="{{ $dir }}" lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8" />
    <title>@lang('trans.home')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="test" />
    <meta name="keywords" content="test" />
    <meta name="author" content="test" />
    <meta name="email" content="test@gmail.com" />
    <meta name="website" content="http://www.shreethemes.in test" />
    <meta name="Version" content="v1.0.0" />
    <!-- favicon -->
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons -->
    <link href="{{asset('css/materialdesignicons.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
    <!-- Magnific -->
    <link href="{{asset('css/magnific-popup.css')}}" rel="stylesheet" type="text/css" />
    <!-- Slider -->
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}" />
    <!-- FLEXSLIDER -->
    <link href="{{asset('css/flexslider.css')}}" rel="stylesheet" type="text/css" />
    <!-- Main Css -->

    <link href="{{asset("css/style-{$dir}.css")}}" rel="stylesheet" type="text/css" id="theme-opt">
    <link href="{{asset('css/colors/default.css')}}" rel="stylesheet" id="color-opt">
    <style>
    * {
        font-family: 'Tajawal', sans-serif !important;
        /* font-size: 15px !important; */
        direction: <?php echo $dir;
        ?> !important;
    }
    </style>

</head>

<body dir="{{ $dir }}">
    <!-- Loader -->
    <!-- <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div> -->
    <!-- Loader -->

    <!-- Navbar STart -->
    <header id="topnav" class="defaultscroll sticky">
        <div class="container">
            <!-- Logo container-->
            <!-- <div>
                <a class="logo" href="index.html">
                    <img src="images/logo-dark.png" class="l-dark" height="24" alt="">
                    <img src="images/logo-light.png" class="l-light" height="24" alt="">
                </a>
            </div> -->
            <!-- <div class="buy-button">
                    <a href="https://1.envato.market/4n73n" target="_blank">
                        <div class="btn btn-primary login-btn-primary">Buy Now</div>
                        <div class="btn btn-light login-btn-light">Buy Now</div>
                    </a>
                </div>end login button -->
            <!-- End Logo container-->
            <div class="menu-extras">
                <div class="menu-item">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </div>
            </div>

            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu nav-light">
                    <li><a href="{{route('all-categories')}}" class="mouse-down">@lang('trans.home')</a></li>
                    <li><a href="{{route('my-courses')}}">@lang('trans.my_courses')</a></li>

                    @guest
                    <li><a href="{{route('login')}}">@lang('trans.login')</a></li>
                    <li><a href="{{route('register')}}">@lang('trans.register')</a></li>

                    @else
                    <li><a class="dropdown-item nav-link icon settingbar" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                class="fe fe-power"></i><span>@lang('trans.logout')</span></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    @endguest
                    <li class="has-submenu"><a href="#">@lang("trans." . app()->getLocale())</a><span
                            class="menu-arrow"></span>
                        <ul class="submenu megamenu">
                            <li>
                                <ul>
                                    @foreach(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getSupportedLocales()
                                    as $locale => $info)
                                    <li>
                                        <a hreflang="{{ $locale }}"
                                            href="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL($locale, null, [], true)}}">@lang("trans."
                                            . $locale)</a>
                                    </li>

                                    @endforeach
                                </ul>
                            </li>

                        </ul>
                    </li>



                </ul>
                <!--end navigation menu-->
                <!-- <div class="buy-menu-btn d-none">
                    
                        <a href="https://1.envato.market/4n73n" target="_blank" class="btn btn-primary">Buy Now</a>
                    </div>end login button -->
            </div>
            <!--end navigation-->
        </div>
        <!--end container-->
    </header>
    <!--end header-->
    <!-- Navbar End -->

    <!-- Hero Start -->
    <section class="main-slider">
        <ul class="slides">
            <li class="bg-slider d-flex align-items-center"
                style="background-image:url(' {{asset('images/background_main.jpg')}} ')">
                <div class="bg-overlay"></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 text-center">
                            <div class="title-heading text-white mt-4">
                                <h1 class="display-4 title-dark font-weight-bold mb-3">@lang('trans.guide1')
                                </h1>
                                <!-- <p class="para-desc para-dark mx-auto text-light">Launch your campaign and benefit from
                                    our expertise on designing and managing conversion centered bootstrap4 html page.
                                </p> -->

                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
            </li>
            <li class="bg-slider d-flex align-items-center"
                style="background-image:url(' {{asset('images/background_main2.jpg')}}')">
                <div class="bg-overlay"></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 text-center">
                            <div class="title-heading text-white mt-4">
                                <h1 class="display-4 title-dark font-weight-bold mb-3">@lang('trans.guide2')</h1>
                                <!-- <p class="para-desc para-dark mx-auto text-light">Launch your campaign and benefit from
                                    our expertise on designing and managing conversion centered bootstrap4 html page.
                                </p> -->

                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
            </li>
        </ul>
    </section>
    <!--end section-->
    <!-- Hero End -->

    <!-- FEATURES START -->
    <section class="section">
        <div class="container">
            <div class="row">


                <div class="col-md-6">
                    <div class="card course-feature text-center overflow-hidden rounded shadow border-0">
                        <div class="card-body py-5">
                            <div class="icon">
                                <img src="{{asset('images/icon/graduation-hat.svg')}}" class="avatar avatar-small"
                                    alt="">
                            </div>

                            <h4 class="mt-3"><a href="#courses" class="title text-dark mouse-down">
                                    @lang('trans.course_guide')</a></h4>
                            <p class="text-muted">@lang('trans.course_guide_words') </p>
                            <img src="images/icon/graduation-hat.svg" class="full-img" height="300" alt="">
                        </div>
                    </div>
                </div>
                <!--end col-->

                <div class="col-md-6">
                    <div class="card course-feature text-center overflow-hidden rounded shadow border-0">
                        <div class="card-body py-5">
                            <div class="icon">
                                <img src="{{asset('images/icon/ai.svg')}}" class="avatar avatar-small" alt="">
                            </div>

                            <h4 class="mt-3"><a href="#instructors" class="title text-dark mouse-down">
                                    @lang('trans.teacher_guide')</a></h4>
                            <p class="text-muted">@lang('trans.teacher_guide_words') </p>
                            <img src="images/icon/ai.svg" class="full-img" height="300" alt="">
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->
    <!-- FEATURES END -->


    <!-- Cta Start -->
    <!-- <section class="section bg-cta" style="background: url('images/background_behind.jpg') center center;" id="cta">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <div class="section-title">
                            <h4 class="title title-dark text-white mb-4">We Bring New Online Courses</h4>
                            <p class="text-light para-desc para-dark mx-auto">Start working with Landrick that can provide everything you need to generate awareness, drive traffic, connect.</p>
                            <a href="http://vimeo.com/12022651" class="play-btn border border-light mt-4 video-play-icon">
                                <i data-feather="play" class="fea icon-ex-md text-white title-dark"></i>
                            </a>
                        </div>
                    </div> -->
    <!--end col-->
    <!-- </div> -->
    <!--end row-->
    <!-- </div> -->
    <!--end container-->
    <!-- </section> -->
    <!--end section-->
    <!-- Cta End -->

    <!-- Courses Start -->
    <section class="section" id="courses">

        @yield('cards')

        
        <!--end container-->
    </section>
    <!--end section-->
    <!-- Courses End -->

    <!-- Cta Start -->
    <section class="section bg-cta" style="background: url(' {{asset('images/background_behind.jpg')}}') center center;"
        id="admission">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-7 col-12">
                    <div class="section-title">
                        <h4 class="title title-dark text-white mb-4">@lang('trans.start_your_study')</h4>
                        <p class="para-desc para-dark mb-0 text-light">@lang('trans.start_your_study_sentance')</p>
                    </div>
                    <div class="row" id="counter">
                        <div class="col-md-3 col-6 mt-4 pt-2">
                            <div class="counter-box">
                                <i class="mdi mdi-school-outline title-dark text-light h1"></i>
                                <h2 class="mb-0 text-white title-dark mt-2"><span class="counter-value"
                                        data-count="{{$studentsCount}}"></span></h2>
                                <h6 class="counter-head title-dark text-light">@lang('trans.students')</h6>
                            </div>
                            <!--end counter box-->
                        </div>
                        <!--end col-->

                        <div class="col-md-3 col-6 mt-4 pt-2">
                            <div class="counter-box">
                                <i class="mdi mdi-book-open-variant title-dark text-light h1"></i>
                                <h2 class="mb-0 text-white title-dark mt-2"><span class="counter-value"
                                        data-count="{{$coursesCount}}"></span>+</h2>
                                <h6 class="counter-head title-dark text-light">@lang('trans.courses')</h6>
                            </div>
                            <!--end counter box-->
                        </div>
                        <!--end col-->

                        <div class="col-md-3 col-6 mt-4 pt-2">
                            <div class="counter-box">
                                <i class="mdi mdi-account title-dark text-light h1"></i>
                                <h2 class="mb-0 text-white title-dark mt-2"><span class="counter-value"
                                        data-count="{{$teachersCount}}"></span></h2>
                                <h6 class="counter-head title-dark text-light">@lang('trans.teachers')</h6>
                            </div>
                            <!--end counter box-->
                        </div>
                        <!--end col-->

                        <div class="col-md-3 col-6 mt-4 pt-2">
                            <div class="counter-box">
                                <i class="mdi mdi-language-swift title-dark text-light h1"></i>
                                <h2 class="mb-0 text-white title-dark mt-2"><span class="counter-value"
                                        data-count="{{$categoriesCount}}"></span>+</h2>
                                <h6 class="counter-head title-dark text-light">@lang('trans.categories')</h6>
                            </div>
                            <!--end counter box-->
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end col-->

                <div class="col-lg-4 col-md-5 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="card border-0 rounded">
                        <div class="card-body" >
                        <div class="position-relative d-block overflow-hidden">
                                <img src="{{asset('images/start_study.jpg')}}"
                                    style="height: 262.5px !important;width: 350px !important;"
                                    class="img-fluid rounded-top mx-auto" alt="">
                                <div class="overlay-work bg-dark"></div>
                                <a href="javascript:void(0)" class="text-white h6 preview">Preview Now <i
                                        class="mdi mdi-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->
    <!-- Cta End -->


    <!-- Footer Start -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 mb-0 mb-md-6 pb-0 pb-md-2">
                    <!-- <a href="#" class="logo-footer">
                        <img src="images/logo-light.png" height="24" alt="">
                    </a> -->
                    <p class="mt-4">@lang('trans.footer_sentance')</p>
                    <ul class="list-unstyled social-icon social mb-0 mt-4">
                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i
                                    data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i
                                    data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i
                                    data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                        <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i
                                    data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li>
                    </ul>
                    <!--end icon-->
                </div>
                <!--end col-->

                <div class="col-lg-6 col-md-6 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <h4 class="text-light footer-head">@lang('trans.usefull_links')</h4>
                    <ul class="list-unstyled footer-list mt-4">
                        <li><a class="text-foot" href="{{route('all-categories')}}" class="mouse-down"><i
                                    class="mdi mdi-chevron-right mr-1"></i>@lang('trans.home')</a></li>
                        <li><a class="text-foot" href="{{route('my-courses')}}"><i
                                    class="mdi mdi-chevron-right mr-1"></i>@lang('trans.my_courses')</a></li>

                        @guest
                        <li><a class="text-foot" href="{{route('login')}}"><i
                                    class="mdi mdi-chevron-right mr-1"></i>@lang('trans.login')</a></li>
                        <li><a class="text-foot" href="{{route('register')}}"><i
                                    class="mdi mdi-chevron-right mr-1"></i>@lang('trans.register')</a></li>

                        @else
                        <li><a class="text-foot" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                    class="fe fe-power"></i><span><i
                                        class="mdi mdi-chevron-right mr-1"></i>@lang('trans.logout')</span></a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        @endguest

                    </ul>
                </div>
                <!--end col-->


                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </footer>
    <!--end footer-->
    <footer class="footer footer-bar">
        <div class="container text-center">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="text-sm-left">
                        <p class="mb-0">© {{date('Y')}} @lang('trans.courses').
                        </p>
                    </div>
                </div>
                <!--end col-->


            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </footer>
    <!--end footer-->
    <!-- Footer End -->

    <!-- Back to top -->
    <a href="#" class="btn btn-icon btn-soft-primary back-to-top"><i data-feather="arrow-up" class="icons"></i></a>
    <!-- Back to top -->

    <!-- javascript -->
    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/jquery.easing.min.js')}}"></script>
    <script src="{{asset('js/scrollspy.min.js')}}"></script>
    <!-- Magnific Popup -->
    <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('js/magnific.init.js')}}"></script>
    <!-- SLIDER -->
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/owl.init.js')}}"></script>
    <!--FLEX SLIDER-->
    <script src="{{asset('js/jquery.flexslider-min.js')}}"></script>
    <script src="{{asset('js/flexslider.init.js')}}"></script>
    <!-- Counter -->
    <script src="{{asset('js/counter.init.js')}}"></script>
    <!-- Icons -->
    <script src="{{asset('js/feather.min.js')}}"></script>
    <script src="https://unicons.iconscout.com/release/v2.1.9/script/monochrome/bundle.js"></script>
    <!-- Main Js -->
    <script src="{{asset('js/app.js')}}"></script>
</body>

</html>