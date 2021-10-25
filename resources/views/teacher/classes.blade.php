<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<style>
    td,
    th {
        font-size: 13px;
    }
</style>
@extends('admin.admin_dashboard')
@section ('content-page')

<!-- Edit Model -->
<div class="modal fade" id="editModal">

    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang('trans.update_class_title')</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <!--end form-->
                <!-- </div>  -->
                <form method="POST" id="UpdateForm" action="{{route('updateHall')}}" name="register-form" enctype="multipart/form-data" class="nobottommargin">
                    @csrf
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group position-relative">
                                    <label>@lang('trans.class_name_ar') <span class="text-danger">*</span></label>
                                    <input hidden id="UpdateId" name="Id">
                                    <input name="name_ar" style="direction:rtl" id="name_ar" type="text" class="form-control">
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="form-group position-relative">
                                    <label>@lang('trans.class_name_en') <span class="text-danger">*</span></label>

                                    <input name="name_en" id="name_en" style="direction:ltr;" type="text" class="form-control">
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group position-relative">
                                    <label>@lang('trans.count_chairs') <span class="text-danger">*</span></label>
                                    <input name="count_chairs" id="count_chairs" type="number" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>


            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">@lang('trans.close')</button>
                <button type="submit" class="btn btn-primary">@lang('trans.save_changes')</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>

<div class="col-lg-3 col-sm-12 ">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">@lang('trans.add_classes')</h4>
            <div class="general-button">
                <button type="button" data-toggle="modal" data-target="#addAdmin" class="btn mb-1 btn-flat btn-info">@lang('trans.add_new_class')</button>
            </div>
        </div>
    </div>
</div>

<!-- DataTable -->

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">@lang('trans.classes')</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>

                                    <th>@lang('trans.name')</th>
                                    <th>@lang('trans.count_chairs')</th>
                                    <th>@lang('trans.edit')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($classes as $class)
                                <tr>
                                    <td>{{$class->name}}</td>
                                    <td>{{$class->count_chairs}}</td>
                                    <td><button type="button" onclick="update({{$class->id}})" class="btn mb-1 btn-flat btn-success">@lang('trans.edit')</button></td>
                                </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>@lang('trans.name')</th>
                                    <th>@lang('trans.count_chairs')</th>
                                    <th>@lang('trans.edit')</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="addAdmin">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang('trans.add_new_class')</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form enctype="multipart/form-data" method="POST" action="{{route('storeHall')}}" id="addClassForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group position-relative">
                                <label>@lang('trans.class_name_ar') <span class="text-danger">*</span></label>
                                <input hidden id="UpdateId" name="Id">
                                <input name="name_ar" style="direction:rtl" id="name_ar" type="text" class="form-control">
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-md-6">
                            <div class="form-group position-relative">
                                <label>@lang('trans.class_name_en') <span class="text-danger">*</span></label>

                                <input name="name_en" id="name_en" style="direction:ltr;" type="text" class="form-control">
                            </div>
                        </div>
                        <!--end col-->


                        <div class="col-md-6">
                            <div class="form-group position-relative">
                                <label>@lang('trans.count_chairs') <span class="text-danger">*</span></label>
                                <input name="count_chairs" id="count_chairs" type="number" class="form-control">
                            </div>
                        </div>



                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('trans.close')</button>
                            <input id="submit" type="submit" class="btn btn-primary" value="@lang('trans.add')">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    async function update(id) {
        $.ajax({
            url: "/halls/details/" + id,
            type: 'GET',
            dataType: 'json',
            success: function(res) {
                $("#name_ar").val(res.translations[0].name);
                $("#name_en").val(res.translations[1].name);
                $("#count_chairs").val(res.count_chairs);
            },
            error: function(e) {
                console.log(e);
            }
        });


        $("#UpdateId").val(id);

        $('#editModal').modal('show');
    }


    $("#UpdateForm").submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            enctype: 'multipart/form-data',
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(res) {
                $('#UpdateModal').modal('toggle');
                Notiflix.Notify.Success(res.message, {
                    cssAnimationStyle: 'zoom',
                    cssAnimationDuration: 500,
                });
                setTimeout(() => {
                    window.location.href = "{{route('halls')}}";
                }, 2000);
            },
            error: function(res) {
                var ob = res.responseJSON.errors;
                var keys = Object.keys(ob);
                for (let index = 0; index < keys.length; index++) {
                    Notiflix.Notify.Failure(ob[keys[index]][0], {
                        cssAnimationStyle: 'zoom',
                        cssAnimationDuration: 500,
                    });
                }
            }
        });
    });

    $("#addClassForm").submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            enctype: 'multipart/form-data',
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(res) {
                Notiflix.Notify.Success(res.message, {
                    cssAnimationStyle: 'zoom',
                    cssAnimationDuration: 500,
                });
                setTimeout(() => {
                    window.location.href = "{{route('halls')}}";
                }, 2000);
            },
            error: function(res) {
                var ob = res.responseJSON.errors;
                var keys = Object.keys(ob);
                for (let index = 0; index < keys.length; index++) {
                    Notiflix.Notify.Failure(ob[keys[index]][0], {
                        cssAnimationStyle: 'zoom',
                        cssAnimationDuration: 500,
                    });
                }
            }
        });
    });
</script>
@endsection ('content-page')