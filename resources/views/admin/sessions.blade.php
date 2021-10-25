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
                <h5 class="modal-title">@lang('trans.update_session_title')</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <!--end form-->
                <!-- </div>  -->
                <form method="POST" id="UpdateForm" action="{{route('updateSession')}}" name="register-form"
                    enctype="multipart/form-data" class="nobottommargin">
                    @csrf
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group position-relative">
                                    <label>@lang('trans.select_course') <span class="text-danger">*</span></label>
                                    <select class="form-control" id="course_id" name="course_id">
                                        @foreach($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            

                            <div class="col-md-6">
                                <div class="form-group position-relative">
                                    <label>@lang('trans.start_time') <span class="text-danger">*</span></label>
                                    <input hidden id="UpdateId" name="Id">
                                    <input name="start" id="start" type="time" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group position-relative">
                                    <label>@lang('trans.end_time') <span class="text-danger">*</span></label>
                                    <input name="end" id="end" type="time" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group position-relative">
                                    <label>@lang('trans.date') <span class="text-danger">*</span></label>
                                    <input name="date" id="date" type="date" class="form-control">
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
            <h4 class="card-title">@lang('trans.add_sessions')</h4>
            <div class="general-button">
                <button type="button" data-toggle="modal" data-target="#addAdmin"
                    class="btn mb-1 btn-flat btn-info">@lang('trans.add_new_session')</button>
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
                    <h4 class="card-title">@lang('trans.sessions')</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>

                                    <th>@lang('trans.course_title')</th>
                                    <th>@lang('trans.count')</th>
                                    <th>@lang('trans.start_time')</th>
                                    <th>@lang('trans.end_time')</th>
                                    <th>@lang('trans.date')</th>
                                    <th>@lang('trans.done')</th>
                                    <th>@lang('trans.edit')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sessions as $session)
                                <tr>

                                    <td>{{$session->course->title}}</td>
                                    <td>{{$session->count}}</td>
                                    <td>{{$session->start}}</td>
                                    <td>{{$session->end}}</td>
                                    <td>{{$session->date}}</td>
                                    <td>
                                        @if($session->done == 0)
                                        <span class="badge badge-danger px-2">@lang('trans.no')</span>
                                        @else
                                        <span class="badge badge-success px-2">@lang('trans.yes')</span>
                                        @endif
                                    </td>

                                    <td><button type="button" onclick="update({{$session->id}})"
                                            class="btn mb-1 btn-flat btn-success">@lang('trans.edit')</button></td>
                                </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>

                                    <th>@lang('trans.course_title')</th>
                                    <th>@lang('trans.count')</th>
                                    <th>@lang('trans.start_time')</th>
                                    <th>@lang('trans.end_time')</th>
                                    <th>@lang('trans.date')</th>
                                    <th>@lang('trans.done')</th>
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
                <h5 class="modal-title">@lang('trans.add_new_session')</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form enctype="multipart/form-data" method="POST" action="{{route('storeSession')}}" id="addSessionForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group position-relative">
                                <label>@lang('trans.select_course') <span class="text-danger">*</span></label>
                                <select class="form-control" id="course_id" name="course_id">
                                    @foreach($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        

                        <div class="col-md-6">
                            <div class="form-group position-relative">
                                <label>@lang('trans.start_time') <span class="text-danger">*</span></label>
                                <input name="start" id="start" type="time" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group position-relative">
                                <label>@lang('trans.end_time') <span class="text-danger">*</span></label>
                                <input name="end" id="end" type="time" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group position-relative">
                                <label>@lang('trans.date') <span class="text-danger">*</span></label>
                                <input name="date" id="date" type="date" class="form-control">
                            </div>
                        </div>


                       


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
        url: "/sessions/details/" + id,
        type: 'GET',
        dataType: 'json',
        success: function(res) {
            $("#course_id").val('');
            $("#course_id").val(res.course_id);
            $("#start").val(res.start);
            $("#end").val(res.end);
            $("#date").val(res.date);
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
                window.location.href = "{{route('sessions')}}";
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

$("#addSessionForm").submit(function(event) {
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
                window.location.href = "{{route('sessions')}}";
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