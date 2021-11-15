<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<style>
td,
th {
    font-size: 13px;
}
</style>
@extends('teacher.teacher_dashboard')
@section ('content-page')

<!-- Edit Model -->
<div class="modal fade" id="editModal">

    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang('trans.update_course_title')</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="POST" id="UpdateForm" action="{{route('setSession')}}" name="register-form"
                    enctype="multipart/form-data" class="nobottommargin">
                    @csrf
                    <div class="container-fluid" id="tag_id">

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

<!-- DataTable -->

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">@lang('trans.courses')</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>

                                    <th id="img">@lang('trans.image')</th>
                                    <th>@lang('trans.title')</th>
                                    <th>@lang('trans.category')</th>
                                    <th>@lang('trans.class')</th>
                                    <th>@lang('trans.current_students_count')</th>
                                    <th>@lang('trans.sessions_count_all')</th>
                                    <th>@lang('trans.sessions_count_left')</th>
                                    <th>@lang('trans.start')</th>
                                    <th>@lang('trans.end')</th>
                                    <th>@lang('trans.done')</th>
                                    <th>@lang('trans.equipments_exist')</th>
                                    <th>@lang('trans.set_session')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($courses as $course)
                                <tr>
                                    <td><img src="{{$course->image_path}}" style="height: 50px; width: 50px;"
                                            class=" rounded-circle mr-3" alt=""></td>
                                    <td>{{$course->title}}</td>
                                    <td>{{$course->courseCategory->name}}</td>
                                    <td>{{$course->class->name}}</td>
                                    <td>{{count($course->userCourse)}}</td>
                                    <td>{{$course->sessions_count}}</td>
                                    <td>{{$course->sessions_count - count($course->session)}}</td>
                                    <td>{{$course->start}}</td>
                                    <td>{{$course->end}}</td>
                                    <td>
                                        @if($course->done == 0)
                                        <span class="badge badge-danger px-2">@lang('trans.no')</span>
                                        @else
                                        <span class="badge badge-success px-2">@lang('trans.yes')</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($course->equipments == 0)
                                        <span class="badge badge-danger px-2">@lang('trans.no')</span>
                                        @else
                                        <span class="badge badge-success px-2">@lang('trans.yes')</span>
                                        @endif
                                    </td>
                                    <td><button type="button" onclick="update({{$course->id}})"
                                            class="btn mb-1 btn-flat btn-success">@lang('trans.set_session')</button>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>@lang('trans.image')</th>
                                    <th>@lang('trans.title')</th>
                                    <th>@lang('trans.category')</th>
                                    <th>@lang('trans.class')</th>
                                    <th>@lang('trans.current_students_count')</th>
                                    <th>@lang('trans.sessions_count_all')</th>
                                    <th>@lang('trans.sessions_count_left')</th>
                                    <th>@lang('trans.start')</th>
                                    <th>@lang('trans.end')</th>
                                    <th>@lang('trans.done')</th>
                                    <th>@lang('trans.equipments_exist')</th>
                                    <th>@lang('trans.set_session')</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-3 col-sm-12 ">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">@lang('trans.add_markers')</h4>
            <div class="general-button">
                <button type="button" data-toggle="modal" data-target="#addMarker"
                    class="btn mb-1 btn-flat btn-info">@lang('trans.add_new_marker')</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="addMarker">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang('trans.add_new_marker')</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form enctype="multipart/form-data" method="POST" action="{{route('add-marker')}}" id="addCourseForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group position-relative">
                                <label>@lang('trans.select_course') <span class="text-danger">*</span></label>
                                <select class="form-control" id="inputCourse" name="course_id">
                                <option value="">Choose one</option>
                                    @foreach($coursesDone as $course)
                                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group position-relative">
                                <label>@lang('trans.student') <span class="text-danger">*</span></label>
                                <select class="form-control" id="inputStudent" name="student_id">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group position-relative">
                                <label>@lang('trans.marker') <span class="text-danger">*</span></label>
                                <input name="mark" id="mark" max="100" min="0" type="number" class="form-control">
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
$("#inputCourse").on('change', function() {
    var e = document.getElementById("inputCourse");
    var courseId = e.options[e.selectedIndex].value;
    $.ajax({
        url: "/student-course/" + courseId,
        type: 'GET',
        dataType: 'json',
        success: function(res) {
            console.log(res);
            $('#inputStudent')
                .find('option')
                .remove()
                .end();

            for (let i = 0; i < res.length; i++) {
                $('#inputStudent').append(`<option value="${res[i].user.id}"> ${res[i].user.name}</option>`);
            }
        
        }
    });

});

async function update(id) {
    $.ajax({
        url: "/details-course-teacher/" + id,
        type: 'GET',
        dataType: 'json',
        success: function(res) {
            if ((res.course == null)) {
                var translate = (res.language == "ar") ? "تم الإنتهاء من هذا الكورس" :
                    "This course has been completed";
                Notiflix.Notify.Failure(translate, {
                    cssAnimationStyle: 'zoom',
                    cssAnimationDuration: 500,
                });
            } else {

                var node = document.getElementById("tag_id");
                node.querySelectorAll('*').forEach(n => n.remove());
                for (let index = 0; index < res.course.user_course.length; index++) {
                    document.getElementById('tag_id').insertAdjacentHTML("beforeend",
                        " <div class='row'> " +
                        "    <div class='col-md-6'> " +
                        "   <div class='form-group position-relative'> " +
                        "   <label>" + res.course.user_course[index].user.name + "</label> " +
                        " <input hidden id='UpdateId' name='Id' value='" + res.course.id + "'> " +
                        " </div> " +
                        " </div>  " +
                        " <div class='col-md-6'>  " +
                        "     <div class='form-check mb-3'>  " +
                        "         <label class='form-check-label'> <span class='text-danger'>*</span>  " +
                        "            <input type='checkbox' name='present[]' id='present_" + res
                        .course
                        .user_course[index].user.id + "' class='form-check-input' value='" + res
                        .course
                        .user_course[index].user.id + "' " +
                        "                >   @lang('trans.present')  </label>  " +
                        "      </div> " +
                        "   </div> " +
                        "    </div>");
                }

                $("#UpdateId").val(id);

                $('#editModal').modal('show');
            }

        },
        error: function(e) {
            console.log(e);
        }
    });



}


$("#addCourseForm").submit(function(event) {
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
                window.location.href = "{{route('teacherCourses')}}";
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