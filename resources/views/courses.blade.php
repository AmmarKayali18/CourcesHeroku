@extends('index')

@section('cards')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <div class="section-title mb-4 pb-2">
                <h1 class=" mb-4">{{$category->name }}</h1>
                <p class="text-muted para-desc mx-auto mb-0">{{$category->description }}</p>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="row">
        @foreach($courses as $course)
        <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
            <div class="card courses-desc overflow-hidden rounded shadow border-0">
                <div class="position-relative d-block overflow-hidden">
                    <img src="{{$course->image_path}}" style="height: 262.5px !important;width: 350px !important;"
                        class="img-fluid rounded-top mx-auto" alt="">
                    <div class="overlay-work bg-dark"></div>
                    @if(!$course->sub)
                    <a href="{{route('subscription-course',['id' => $course->id])}}" class="text-white h6 preview">

                        <button class="btn btn-warning">@lang('trans.subscription')</button> </a>
                    @else
                    <a href="{{route('my-courses')}}" class="text-white h6 preview">

                        <button class="btn btn-primary">@lang('trans.view_my_courses')</button> </a>
                    @endif
                </div>

                <div class="card-body">
                    <h4><a class="title text-dark">{{$course->title}}</a></h4>
                    <h6>{{$course->description}}</h6>

                    <h6>@lang('trans.start_at') : {{$course->start}}</h6>
                    <h6> @lang('trans.sessions_count') : {{$course->sessions_count}}</h6>
                    <h6> @lang('trans.price') : {{$course->price}}$</h6>

                </div>
            </div>
        </div>
        <!--end col-->
        @endforeach
    </div>
    <!--end row-->
</div>
<!--end container-->
<div class="container mt-100 mt-60" id="instructors">
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <div class="section-title mb-4 pb-2">
                <h1 class=" mb-4">@lang('trans.instructors')</h1>
                <p class="text-muted para-desc mx-auto mb-0">@lang('trans.instructors_sentance')</p>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="row">
        @foreach($teachers as $teacher)
        <div class="col-lg-3 col-md-6 mt-4 pt-2">
            <div class="card team text-center rounded border-0">
                <div class="card-body">
                    <div class="position-relative">
                        <img src="{{$teacher->image_path}}"
                            class="img-fluid avatar avatar-ex-large rounded-circle shadow"
                            style="height: 180px !important; width: 180px !important;" alt="" }>

                        <!--end icon-->
                    </div>
                    <div class="content pt-3">
                        <h4 class="mb-0"><a href="javascript:void(0)" class="name text-dark">{{$teacher->name}}</a>
                        </h4>
                        <!-- <small class="designation text-muted">UI Designers</small> -->
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
        @endforeach


    </div>
    <!--end row-->
</div>
@endsection