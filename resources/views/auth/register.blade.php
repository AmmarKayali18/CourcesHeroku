<!DOCTYPE html>
@php($dir = \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocaleDirection())
<html dir="{{ $dir }}" lang="{{ app()->getLocale() }}" >
    <head>
        <meta charset="utf-8" />
        <title>@lang('trans.register')</title>
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
        <link href="css/style.css" rel="stylesheet" type="text/css" id="theme-opt" />
        <link href="css/colors/default.css" rel="stylesheet" id="color-opt">
        <style>
            *{
                font-family: 'Tajawal', sans-serif !important;
                /* font-size: 15px !important; */
            }
        </style>
    </head>

    <body style="background: url('images/background_behind.jpg') center center;" dir="{{ $dir }}" >
        <!-- Job apply form Start -->
        <section class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-7">
                        <div class="card custom-form border-0 " style="border-radius: 10px">
                            <!-- <div class="card-body"> -->
                                <form class="rounded shadow p-4" enctype="multipart/form-data" method="POST" action="{{route('register')}}">
                                    @csrf    
                                    <div class="row">
                                    <div class="col-md-12">
                                            <div class="form-group position-relative">
                                                <h1>@lang('trans.register')</h1>
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-md-6">
                                            <div class="form-group position-relative">
                                                <label>@lang('trans.full_name_ar') <span class="text-danger">*</span></label>
                                                <i data-feather="user" class="fea icon-sm icons"></i>
                                                <input name="name_ar" style="direction:rtl" id="name_ar" type="text" class="form-control pl-5" placeholder="@lang('trans.full_name_ar_hint')">
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-md-6">
                                            <div class="form-group position-relative">
                                                <label>@lang('trans.full_name_en') <span class="text-danger">*</span></label>
                                                <i data-feather="user" class="fea icon-sm icons"></i>
                                                <input name="name_en" id="name_en" type="text" class="form-control pl-5" placeholder="@lang('trans.full_name_en_hint')">
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-md-6">
                                            <div class="form-group position-relative">
                                                <label>@lang('trans.email') <span class="text-danger">*</span></label>
                                                <i data-feather="mail" class="fea icon-sm icons"></i>
                                                <input name="email" id="email" type="email" class="form-control pl-5" placeholder="@lang('trans.email_hint')">
                                            </div> 
                                        </div><!--end col-->
                                        <div class="col-md-6">
                                            <div class="form-group position-relative">
                                                <label>@lang('trans.phone') <span class="text-danger">*</span></label>
                                                <i data-feather="phone" class="fea icon-sm icons"></i>
                                                <input name="mobile" id="mobile" type="number" class="form-control pl-5" placeholder="@lang('trans.phone_hint')">
                                            </div> 
                                        </div><!--end col-->
                                        <div class="col-md-6">
                                            <div class="form-group position-relative">
                                                <label>@lang('trans.password') <span class="text-danger">*</span></label>
                                                <i data-feather="key" class="fea icon-sm icons"></i>
                                                <input type="password" name="password" class="form-control pl-5" placeholder="@lang('trans.password')" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group position-relative">
                                                <label>@lang('trans.address') <span class="text-danger">*</span></label>
                                                <i data-feather="home" class="fea icon-sm icons"></i>
                                                <input name="address" id="address" class="form-control pl-5" placeholder="@lang('trans.address_hint')">
                                            </div>                                                                               
                                        </div><!--end col-->                                 
                                        <div class="col-md-12">
                                            <div class="form-group position-relative">
                                                <label>@lang('trans.personal_image') <span class="text-danger">*</span></label>
                                                <input type="file" class="form-control-file" name="image_path" id="fileupload">
                                            </div>                                                                               
                                        </div><!--end col-->
                                        <div class="row">
                                        
                                    </div><!--end row-->
                                    <div class="col-sm-12">
                                            <input type="submit" id="submit" name="send" class="submitBnt btn btn-primary" value="@lang('trans.register')">
                                                   @lang('trans.have_account')  <a class="" href="{{ route('login')}}" > @lang('trans.login')</a>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                   
                                </form><!--end form-->
                            <!-- </div>  -->
                        </div><!--end custom-form-->
                    </div>  
                </div>
            </div><!--end container-->
        </section><!--end section-->
        <!-- Job apply form End -->

     

        <!-- Back to top -->
        <a href="#" class="btn btn-icon btn-soft-primary back-to-top"><i data-feather="arrow-up" class="icons"></i></a>
        <!-- Back to top -->

        <!-- javascript -->
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.easing.min.js"></script>
        <script src="js/scrollspy.min.js"></script>
        <!-- Icons -->
        <script src="js/feather.min.js"></script>
        <script src="https://unicons.iconscout.com/release/v2.1.9/script/monochrome/bundle.js"></script>
        <!-- Main Js -->
        <script src="js/app.js"></script>
    </body>
</html>