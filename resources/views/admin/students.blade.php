<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

@extends('admin.admin_dashboard')
@section ('content-page')

<!-- Edit Model -->
<div class="modal fade" id="editModal">

    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang('trans.update_student_title')</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <!--end form-->
                <!-- </div>  -->
                <form method="POST" id="UpdateForm" action="{{route('updateUser')}}" name="register-form"
                    enctype="multipart/form-data" class="nobottommargin">
                    @csrf
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group position-relative">
                                    <label>@lang('trans.full_name_ar') <span class="text-danger">*</span></label>
                                    <input hidden id="UpdateId" name="Id">
                                    <input hidden id="type" name="type" value="student">
                                    <input name="name_ar" style="direction:rtl" id="name_ar" type="text"
                                        class="form-control">
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="form-group position-relative">
                                    <label>@lang('trans.full_name_en') <span class="text-danger">*</span></label>

                                    <input name="name_en" id="name_en" type="text" class="form-control">
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group position-relative">
                                    <label>@lang('trans.email') <span class="text-danger">*</span></label>
                                    <input name="emailUpdate" id="email" type="email" class="form-control"
                                        placeholder="@lang('trans.email_hint')">
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="form-group position-relative">
                                    <label>@lang('trans.phone') <span class="text-danger">*</span></label>
                                    <input name="mobile" id="mobile" type="number" class="form-control"
                                        placeholder="@lang('trans.phone_hint')">
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="form-group position-relative">
                                    <label>@lang('trans.password') <span class="text-danger">*</span></label>
                                    <input type="password" name="password" class="form-control"
                                        placeholder="@lang('trans.password')" required="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group position-relative">
                                    <label>@lang('trans.address') <span class="text-danger">*</span></label>
                                    <input name="address" id="address" class="form-control"
                                        placeholder="@lang('trans.address_hint')">
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="form-group position-relative">
                                    <label>@lang('trans.picture') <span class="text-danger">*</span></label>
                                    <img name="image" id="image" style="height: 280px; width: 220px;" />
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-md-12">
                                <div class="form-group position-relative">
                                    <label>@lang('trans.new_picture') </label>
                                    <input type="file" class="form-control-file" name="file" id="fileupload">
                                </div>
                            </div>
                            <!--end col-->
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
            <h4 class="card-title">@lang('trans.add_students')</h4>
            <div class="general-button">
                <button type="button" data-toggle="modal" data-target="#addAdmin"
                    class="btn mb-1 btn-flat btn-info">@lang('trans.add_new_student')</button>
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
                    <h4 class="card-title">@lang('trans.students')</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>@lang('trans.full_name')</th>
                                    <th>@lang('trans.email')</th>
                                    <th>@lang('trans.phone')</th>
                                    <th>@lang('trans.address')</th>
                                    <th>@lang('trans.edit')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                <tr>
                                    <td><img src="{{$student->image_path}}" style="height: 50px; width: 50px;"
                                            class=" rounded-circle mr-3" alt="">{{$student->name}}</td>
                                    <td>{{$student->email}}</td>
                                    <td>{{$student->mobile}}</td>
                                    <td>{{$student->address}}</td>
                                    <td><button type="button" onclick="update({{$student->id}})"
                                            class="btn mb-1 btn-flat btn-success">@lang('trans.edit')</button></td>
                                </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>@lang('trans.full_name')</th>
                                    <th>@lang('trans.email')</th>
                                    <th>@lang('trans.phone')</th>
                                    <th>@lang('trans.address')</th>
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
                <h5 class="modal-title">@lang('trans.add_new_student')</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form enctype="multipart/form-data" method="POST" action="{{route('storeUser')}}" id="addUserForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group position-relative">
                                <label>@lang('trans.full_name_ar') <span class="text-danger">*</span></label>
                                <input hidden id="type" name="type" value="student">
                                <input name="name_ar" style="direction:rtl" id="name_ar" type="text"
                                    class="form-control" placeholder="@lang('trans.full_name_ar_hint')">
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-md-6">
                            <div class="form-group position-relative">
                                <label>@lang('trans.full_name_en') <span class="text-danger">*</span></label>
                                <input name="name_en" id="name_en" type="text" class="form-control "
                                    placeholder="@lang('trans.full_name_en_hint')">
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-md-6">
                            <div class="form-group position-relative">
                                <label>@lang('trans.email') <span class="text-danger">*</span></label>
                                <input name="email" id="email" type="email" class="form-control "
                                    placeholder="@lang('trans.email_hint')">
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-md-6">
                            <div class="form-group position-relative">
                                <label>@lang('trans.phone') <span class="text-danger">*</span></label>
                                <input name="mobile" id="mobile" type="number" class="form-control "
                                    placeholder="@lang('trans.phone_hint')">
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-md-6">
                            <div class="form-group position-relative">
                                <label>@lang('trans.password') <span class="text-danger">*</span></label>
                                <input type="password" name="password" class="form-control "
                                    placeholder="@lang('trans.password')" required="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label>@lang('trans.address') <span class="text-danger">*</span></label>
                                <input name="address" id="address" class="form-control "
                                    placeholder="@lang('trans.address_hint')">
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label>@lang('trans.personal_image') <span class="text-danger">*</span></label>
                                <input type="file" class="form-control-file" name="file" id="fileupload">
                            </div>
                        </div>
                        <!--end col-->

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">@lang('trans.close')</button>
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
        url: "/user/details/" + id,
        type: 'GET',
        dataType: 'json',
        success: function(res) {
            $("#name_ar").val(res.translations[0].name);
            $("#name_en").val(res.translations[1].name);
            $("#email").val(res.email);
            $("#mobile").val(res.mobile);
            $("#address").val(res.address);
            document.getElementById('image').src = res.image_path;


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
                window.location.href = "{{route('all-students')}}";
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

$("#addUserForm").submit(function(event) {
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
                window.location.href = "{{route('all-students')}}";
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