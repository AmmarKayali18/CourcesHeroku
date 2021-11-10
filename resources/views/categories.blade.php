@extends('index')

@section('categories')
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
                    <a href="javascript:void(0)" class="text-white h6 preview">Preview Now <i
                            class="mdi mdi-chevron-right"></i></a>
                </div>

                <div class="card-body">
                    <h4><a href="javascript:void(0)" class="title text-dark">{{$category->name}}</a></h5>
                    <h6>{{$category->description}}</h4>

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

@endsection