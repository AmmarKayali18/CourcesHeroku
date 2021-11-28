@extends('index')

@section('cards')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <div class="section-title mb-4 pb-2">
                <h1 class=" mb-4">{{$course->title }}</h1>
                <p class="text-muted para-desc mx-auto mb-0">{{$course->description }}</p>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="rounded shadow-lg p-4">
                        <h5 class="mb-0">@lang('trans.subscription') :</h5>

                        <form class="mt-4" method="POST" action="{{ route('pay-course') }}">
                          @csrf    
                        <div class="row">
                                <div class="col-12">
                                    <div class="form-group position-relative">
                                        <label>@lang('trans.name') <span class="text-danger">*</span></label>
                                        <input name="first_name" id="first_name" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group position-relative">
                                        <label>@lang('trans.email') <span class="text-danger">*</span></label>
                                        <input name="email" id="email" type="email" class="form-control">
                                    </div>
                                </div>

                                <input hidden name="course_id" id="course_id" type="text" value="{{$course->id}}">


                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label>@lang('trans.country_code') <span class="text-danger">*</span></label>
                                        <select class="form-control custom-select" id="country_code" name="country_code">
                                            <option selected="963">Syria +963</option>
                                            <option value="966">KSA +966</option>
                                        </select>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-6">
                                    <div class="form-group position-relative">
                                        <label>@lang('trans.phone') <span class="text-danger">*</span></label>
                                        <input type="text" name="number" id="number" class="form-control">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-md-12">
                                    <div class="form-group position-relative">
                                        <label>@lang('trans.card') <span class="text-danger">*</span></label>
                                        <input type="text" name="source_id" id="source_id" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mt-4 pt-2">
                                        <button class="btn btn-block btn-primary" type="submit">@lang('trans.subscription')</button>
                                    </div>
                                </div>

                                <!--end col-->
                            </div>
                            <!--end row-->
                        </form>
                        <!--end form-->
                    </div>



                </div>
                <!--end col-->

            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <! <!--end row-->
</div>
<!--end container-->

@endsection