<!DOCTYPE html>
@php($dir = \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocaleDirection())
<html dir="{{ $dir }}" lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8" />
    <title>@lang('trans.login')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Premium Bootstrap 4 Landing Page Template" />
    <meta name="keywords" content="Saas, Software, multi-uses, HTML, Clean, Modern" />
    <meta name="author" content="Shreethemes" />
    <meta name="email" content="shreethemes@gmail.com" />
    <meta name="website" content="http://www.shreethemes.in" />
    <meta name="Version" content="v2.5.1" />
    <!-- favicon -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons -->
    <link href="css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
    <!-- Main Css -->
    <link href="{{asset("css/style-{$dir}.css")}}" rel="stylesheet" type="text/css" id="theme-opt">
    <link href="css/colors/default.css" rel="stylesheet" id="color-opt">
    <style>
    * {
        font-family: 'Tajawal', sans-serif !important;
        /* font-size: 15px !important; */


    }
    </style>
</head>

<body style="background: url('images/background_behind.jpg') center center;" dir="{{ $dir }}">
    <!-- Job apply form Start -->
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-7">
                    <div class="form-validation card custom-form border-0 " style="border-radius: 10px">
                        <!-- <div class="card-body"> -->
                        <form class="form-valide rounded shadow p-4" method="post" action="{{route('login')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group position-relative">
                                        <h1>@lang('trans.login')</h1>
                                    </div>
                                </div>

                                <!--end col-->
                                <div class="col-md-12">
                                    <div class="form-group position-relative">
                                        <label>@lang('trans.email') <span class="text-danger">*</span></label>
                                        <i data-feather="mail" class="fea icon-sm icons"></i>
                                        <input name="email" id="email" type="email" class="form-control pl-5"
                                            placeholder="@lang('trans.email_hint')">
                                    </div>
                                </div>
                                <!--end col-->
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="col-md-12">
                                    <div class="form-group position-relative">
                                        <label>@lang('trans.password') <span class="text-danger">*</span></label>
                                        <i data-feather="key" class="fea icon-sm icons"></i>
                                        <input type="password" name="password" class="form-control pl-5"
                                            placeholder="@lang('trans.password')" required="">
                                    </div>
                                </div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <!--end row-->
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="submit" id="submit" name="send" class="submitBnt btn btn-primary"
                                        value="@lang('trans.login')">
                                    @lang('trans.need_account') <a class="" href="{{ route('register')}}">
                                        @lang('trans.register')</a>

                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </form>
                        <!--end form-->


                        <!-- </div>  -->
                    </div>
                    <!--end custom-form-->
                </div>
            </div>
        </div>
        <!--end container-->
    </section>
    <!--end section-->
    <!-- Job apply form End -->



    <!-- Back to top -->
    <a href="#" class="btn btn-icon btn-soft-primary back-to-top"><i data-feather="arrow-up" class="icons"></i></a>
    <!-- Back to top -->

    <!-- javascript -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/scrollspy.min.js"></script>
    <script src="{{asset('dashboard/plugins/validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/validation/jquery.validate-init.js')}}"></script>
    <!-- Icons -->
    <script src="js/feather.min.js"></script>
    <script src="https://unicons.iconscout.com/release/v2.1.9/script/monochrome/bundle.js"></script>
    <!-- Main Js -->
    <script src="js/app.js"></script>
</body>

</html>