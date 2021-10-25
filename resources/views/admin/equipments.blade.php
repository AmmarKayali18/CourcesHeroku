<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
                <h5 class="modal-title">@lang('trans.update_equipment_title')</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <!--end form-->
                <!-- </div>  -->
                <form method="POST" id="UpdateForm" action="{{route('updateEquipment')}}" name="register-form"
                    enctype="multipart/form-data" class="nobottommargin">
                    @csrf
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group position-relative">
                                    <label>@lang('trans.equipment_name_ar') <span class="text-danger">*</span></label>
                                    <input hidden id="UpdateId" name="Id">
                                    <input name="name_ar" style="direction:rtl" id="name_ar" type="text"
                                        class="form-control">
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="form-group position-relative">
                                    <label>@lang('trans.equipment_name_en') <span class="text-danger">*</span></label>

                                    <input name="name_en" id="name_en" style="direction:ltr;" type="text"
                                        class="form-control">
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group position-relative">
                                    <label>@lang('trans.description_ar')</label>
                                    <textarea class="form-control h-150px" rows="6" id="description_ar"
                                        name="description_ar"
                                        style="margin-top: 0px; margin-bottom: 0px; height: 157px; direction:rtl;"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group position-relative">
                                    <label>@lang('trans.description_en')</label>
                                    <textarea class="form-control h-150px" rows="6" id="description_en"
                                        name="description_en"
                                        style="margin-top: 0px; margin-bottom: 0px; height: 157px ; direction:ltr;"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group position-relative">
                                    <label>@lang('trans.count') <span class="text-danger">*</span></label>
                                    <input name="count" id="count" type="number" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group position-relative">
                                    <label>@lang('trans.temporary_count') <span class="text-danger">*</span></label>
                                    <input name="temporary_count" id="temporary_count" type="number"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group position-relative">
                                    <label>@lang('trans.broken_count') <span class="text-danger">*</span></label>
                                    <input name="broken_count" id="broken_count" type="number" class="form-control">
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="row">
                        <!--end col-->
                        <div class="col-md-6">
                            <div class="form-group position-relative">
                                <label>@lang('trans.picture') <span class="text-danger">*</span></label>
                                <img name="image" id="image" style="height: 280px; width: 280px; " />
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
            <h4 class="card-title">@lang('trans.add_equipments')</h4>
            <div class="general-button">
                <button type="button" data-toggle="modal" data-target="#addAdmin"
                    class="btn mb-1 btn-flat btn-info">@lang('trans.add_new_equipment')</button>
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
                    <h4 class="card-title">@lang('trans.equipments')</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>

                                    <th>@lang('trans.image')</th>
                                    <th>@lang('trans.name')</th>
                                    <th>@lang('trans.description')</th>
                                    <th>@lang('trans.count')</th>
                                    <th>@lang('trans.temporary_count')</th>
                                    <th>@lang('trans.broken_count')</th>
                                    <th>@lang('trans.edit')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($equipments as $equipment)
                                <tr>
                                    <td><img src="{{$equipment->image_path}}" style="height: 50px; width: 50px;"
                                            class=" rounded-circle mr-3" alt=""></td>
                                    <td>{{$equipment->name}}</td>
                                    <td>{{$equipment->description}}</td>
                                    <td>{{$equipment->count}}</td>
                                    <td>{{$equipment->temporary_count}}</td>
                                    <td>{{$equipment->broken_count}}</td>

                                    <td><button type="button" onclick="update({{$equipment->id}})"
                                            class="btn mb-1 btn-flat btn-success">@lang('trans.edit')</button></td>
                                </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>@lang('trans.image')</th>
                                    <th>@lang('trans.name')</th>
                                    <th>@lang('trans.description')</th>
                                    <th>@lang('trans.count')</th>
                                    <th>@lang('trans.temporary_count')</th>
                                    <th>@lang('trans.broken_count')</th>
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
                <h5 class="modal-title">@lang('trans.add_new_equipment')</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form enctype="multipart/form-data" method="POST" action="{{route('storeEquipment')}}"
                    id="addEquipmentForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group position-relative">
                                <label>@lang('trans.equipment_name_ar') <span class="text-danger">*</span></label>
                                <input hidden id="UpdateId" name="Id">
                                <input name="name_ar" style="direction:rtl" id="name_ar" type="text"
                                    class="form-control">
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-md-6">
                            <div class="form-group position-relative">
                                <label>@lang('trans.equipment_name_en') <span class="text-danger">*</span></label>

                                <input name="name_en" id="name_en" style="direction:ltr;" type="text"
                                    class="form-control">
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label>@lang('trans.description_ar')</label>
                                <textarea class="form-control h-150px" rows="6" id="description_ar"
                                    name="description_ar"
                                    style="margin-top: 0px; margin-bottom: 0px; height: 157px; direction:rtl;"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label>@lang('trans.description_en')</label>
                                <textarea class="form-control h-150px" rows="6" id="description_en"
                                    name="description_en"
                                    style="margin-top: 0px; margin-bottom: 0px; height: 157px; direction:ltr;"></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group position-relative">
                                <label>@lang('trans.count') <span class="text-danger">*</span></label>
                                <input name="count" id="count" type="number" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label>@lang('trans.image') <span class="text-danger">*</span></label>
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
        url: "/equipment/details/" + id,
        type: 'GET',
        dataType: 'json',
        success: function(res) {

            $("#name_ar").val(res.translations[0].name);
            $("#description_ar").val(res.translations[0].description);
            $("#name_en").val(res.translations[1].name);
            $("#description_en").val(res.translations[1].description);
            $("#count").val(res.count);
            $("#temporary_count").val(res.temporary_count);
            $("#broken_count").val(res.broken_count);

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
                window.location.href = "{{route('equipments')}}";
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

$("#addEquipmentForm").submit(function(event) {
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
                window.location.href = "{{route('equipments')}}";
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