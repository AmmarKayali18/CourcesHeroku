<!DOCTYPE html>
@php($dir = \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocaleDirection())
<html dir="{{ $dir }}" lang="{{ app()->getLocale() }}" >

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@lang('trans.dashboard')</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Pignose Calender -->
    <link href="{{asset('dashboard/plugins/pg-calendar/css/pignose.calendar.min.css')}}" rel="stylesheet">
    <!-- DataTable -->
    <link href="{{asset('dashboard/plugins/tables/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins/chartist/css/chartist.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css')}}">
    <!-- Custom Stylesheet -->
    <link href="{{asset("dashboard/css/style_{$dir}.css")}}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">

<style>
            *{
                font-family: 'Tajawal', sans-serif !important;
                /* font-size: 15px !important; */
               
            }
        </style>
</head>

<body dir="{{ $dir }}" >

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper" >

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header"  >
            <div class="brand-logo">
                <a href="index.html">
                    <b class="logo-abbr"><img src="{{asset('dashboard/images/logo.png')}}" alt=""> </b>
                    <span class="logo-compact"><img src="{{asset('dashboard/images/logo-compact.png')}}" alt=""></span>
                    <span class="brand-title">
                        <img src="{{asset('dashboard/images/logo-text.png')}}" alt="">
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header" >    
            <div class="header-content clearfix">
                
                <!-- <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div> -->
                <div class="header-left">
                    
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                      
                        <li class="icons dropdown d-none d-md-flex">
                            <a href="javascript:void(0)" class="log-user"  data-toggle="dropdown">
                                <span>@lang("trans." . app()->getLocale())</span>  
                            </a>
                            <div class="drop-down dropdown-language animated fadeIn  dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                    @foreach(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getSupportedLocales() as $locale => $info)
                                <li>
                                    <a hreflang="{{ $locale }}"
                                       href="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL($locale, null, [], true)}}"
                                    >@lang("trans." . $locale)</a>
                                </li>
                               
                            @endforeach
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="icons d-none d-md-flex">
                            <a class="nav-link icon settingbar log-user" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><span>@lang('trans.logout')</span></a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                        </li>
                       
                    </ul>
                </div>
            </div>
        </div>

                @yield('tabs')
                @yield('content')
 
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a> 2018</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
  


    <script src="{{asset('dashboard/plugins/common/common.min.js')}}"></script>
    <script src="{{asset('dashboard/js/custom.min.js')}}"></script>
    <script src="{{asset('dashboard/js/settings.js')}}"></script>
    <script src="{{asset('dashboard/js/gleek.js')}}"></script>
    <script src="{{asset('dashboard/js/styleSwitcher.js')}}"></script>

    <!-- Chartjs -->
    <script src="{{asset('dashboard/plugins/chart.js/Chart.bundle.min.js')}}"></script>
    <!-- Circle progress -->
    <script src="{{asset('dashboard/plugins/circle-progress/circle-progress.min.js')}}"></script>
    <!-- Datamap -->
    <script src="{{asset('dashboard/plugins/d3v3/index.js')}}"></script>
    <script src="{{asset('dashboard/plugins/topojson/topojson.min.js')}}"></script>
    <!-- <script src="{{asset('dashboard/plugins/datamaps/datamaps.world.min.js')}}"></script> -->
    <!-- Morrisjs -->
    <script src="{{asset('dashboard/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/morris/morris.min.js')}}"></script>
    <!-- Pignose Calender -->
    <script src="{{asset('dashboard/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/pg-calendar/js/pignose.calendar.min.js')}}"></script>
    <!-- ChartistJS -->
    <script src="{{asset('dashboard/plugins/chartist/js/chartist.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js')}}"></script>
    <!-- DataTable -->
    <script src="{{asset('dashboard/plugins/tables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>
    <script src="{{asset('js/notiflix-aio-2.7.0.min.js')}}"></script>

    <!-- <script src="{{asset('dashboard/js/dashboard/dashboard-1.js')}}"></script> -->
    <script>
        Notiflix.Loading.Init({
            clickToClose: true,
            customSvgUrl: 'https://www.notiflix.com/content/media/icon/notiflix-loading-notiflix.svg',
        });
    </script>
</body>

</html>