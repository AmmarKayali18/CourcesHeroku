@extends('index')

@section('cards')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <div class="section-title mb-4 pb-2">
                <h4 class="title mb-4">@lang('trans.my_courses')</h4>
                <p class="text-muted para-desc mx-auto mb-0">@lang('trans.categories_sentance')</p>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="row">
        @foreach($courses as $userCourse)
        <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
            <div class="card courses-desc overflow-hidden rounded shadow border-0">
                <div class="position-relative d-block overflow-hidden">
                    <img src="{{$userCourse->course->image_path}}" style="height: 262.5px !important;width: 350px !important;"
                        class="img-fluid rounded-top mx-auto" alt="">
                    <div class="overlay-work bg-dark"></div>
                   
                </div>

                <div class="card-body">
                    <h4><a class="title text-dark">{{$userCourse->course->title}}</a></h4>
                    <h6>{{$userCourse->course->description}}</h6>

                    <h6>@lang('trans.start_at') : {{$userCourse->course->start}}</h6>
                    <h6> @lang('trans.sessions_count') : {{$userCourse->course->sessions_count}}</h6>
                    <h6> @lang('trans.price') : {{$userCourse->course->price}}$</h6>

                </div>
            </div>
        </div>
        <!--end col-->
        @endforeach

    </div>
    <!--end row-->
</div>
<!--end container-->

@endsection