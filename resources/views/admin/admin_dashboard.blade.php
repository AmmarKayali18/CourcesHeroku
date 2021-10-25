@extends('index_dashboard')
@section ('tabs')

<div class="nk-sidebar" style="font-size:15px !important;">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">@lang('trans.dashboard')</li>
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <span class="nav-text">@lang('trans.accounts')</span>
                </a>
                <ul aria-expanded="false">
                    <li class="@if (Request::is('all-admins')) active @endif"><a
                            href="{{route('all-admins')}}">@lang('trans.admins')</a></li>
                    <li class="@if (Request::is('all-teachers')) active @endif"><a
                            href="{{route('all-teachers')}}">@lang('trans.teachers')</a></li>
                    <li class="@if (Request::is('all-students')) active @endif"><a
                            href="{{route('all-students')}}">@lang('trans.students')</a></li>
                </ul>
            </li>
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <span class="nav-text">@lang('trans.courses')</span>
                </a>
                <ul aria-expanded="false">

                    <li class="@if (Request::is('categories')) active @endif"><a
                            href="{{route('categories')}}">@lang('trans.courses_categories')</a></li>
                    <li class="@if (Request::is('courses')) active @endif"><a
                            href="{{route('courses')}}">@lang('trans.courses')</a></li>
                </ul>
            </li>

            <li class="@if (Request::is('sessions')) active @endif"><a
                            href="{{route('sessions')}}">@lang('trans.sessions')</a></li>
          
            <li class="@if (Request::is('equipments')) active @endif"><a
                            href="{{route('equipments')}}">@lang('trans.equipments')</a></li>
            <li>
       
            <li class="@if (Request::is('halls')) active @endif"><a
                            href="{{route('halls')}}">@lang('trans.classes')</a></li>
          

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