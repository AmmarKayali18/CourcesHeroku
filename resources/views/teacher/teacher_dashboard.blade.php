@extends('index_dashboard')
@section ('tabs')

<div class="nk-sidebar" style="font-size:15px !important;">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">@lang('trans.dashboard')</li>
            <li class="@if (Request::is('teacherCourses')) active @endif"><a
                            href="{{route('teacherCourses')}}">@lang('trans.courses')</a></li>
            <li>
           

        </ul>
    </div>
</div>
@endsection('tabs')

@section ('content')
<div class="content-body">

    <div class="container-fluid mt-3">
        @yield('content-page')

    </div>
</div>
@endsection('content')