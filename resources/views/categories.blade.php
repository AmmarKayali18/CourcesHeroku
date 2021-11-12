@extends('index')

@section('cards')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <div class="section-title mb-4 pb-2">
                <h1 class=" mb-4">@lang('trans.courses_categories')</h1>
                <p class="text-muted para-desc mx-auto mb-0">@lang('trans.categories_sentance')</p>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="row">

        @foreach($categories as $category)
        <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
            <div class="card courses-desc overflow-hidden rounded shadow border-0">
                <div class="position-relative d-block overflow-hidden">
                    <img src="{{$category->image_path}}" style="height: 262.5px !important;width: 350px !important;"
                        class="img-fluid rounded-top mx-auto" alt="">
                    <div class="overlay-work bg-dark"></div>
                    <a href="{{route('all-courses',['id' => $category->id])}}" class="text-white h6 preview"> @lang('trans.show_courses') </a>
                </div>

                <div class="card-body">
                    <h4><a href="{{route('all-courses',['id' => $category->id])}}" class="title text-dark">{{$category->name}}</a></h4>
                    <h6>{{$category->description}}</h6>

                    <div class="fees d-flex justify-content-between">
                        <ul class="list-unstyled mb-0 numbers">
                            <li> <i class="mdi mdi-book-open-variant text-muted"></i> {{count($category->courses)}} @lang('trans.course')</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
        @endforeach

        <!--end col-->
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
                                <h4 class="mb-0"><a href="javascript:void(0)"
                                        class="name text-dark">{{$teacher->name}}</a>
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