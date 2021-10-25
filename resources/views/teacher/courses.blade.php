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


<div class="modal fade" id="addAdmin">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang('trans.add_new_course')</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form enctype="multipart/form-data" method="POST" action="{{route('storeCourse')}}" id="addCourseForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group position-relative">
                                <label>@lang('trans.course_name_ar') <span class="text-danger">*</span></label>
                                <input hidden id="UpdateId" name="Id">
                                <input name="name_ar" style="direction:rtl" id="name_ar" type="text"
                                    class="form-control">
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-md-6">
                            <div class="form-group position-relative">
                                <label>@lang('trans.course_name_en') <span class="text-danger">*</span></label>

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
                                <label>@lang('trans.duration') <span class="text-danger">*</span></label>
                                <input name="duration" id="duration" type="number" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group position-relative">
                                <label>@lang('trans.sessions_count') <span class="text-danger">*</span></label>
                                <input name="sessions_count" id="sessions_count" type="number" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group position-relative">
                                <label>@lang('trans.start_at') <span class="text-danger">*</span></label>
                                <input name="start" id="start" type="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group position-relative">
                                <label>@lang('trans.end_at') <span class="text-danger">*</span></label>
                                <input name="end" id="end" type="date" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group position-relative">
                                <label>@lang('trans.price') <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend"><span class="input-group-text">$</span>
                                    </div>
                                    <input type="double" name="price" id="price" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-check mb-3">
                                <label class="form-check-label"> <span class="text-danger">*</span>
                                    <input type="checkbox" name="equipments" id="equipments" class="form-check-input"
                                        value="0">@lang('trans.equipments_exist')</label>
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
        url: "/details-course-teacher/" + id,
        type: 'GET',
        dataType: 'json',
        success: function(res) {

            // const element = document.getElementById('tag-id');
            console.log(res);
            var node= document.getElementById("tag_id");
            node.querySelectorAll('*').forEach(n => n.remove());
            for (let index = 0; index < res.user_course.length; index++) {
                document.getElementById('tag_id').insertAdjacentHTML("beforeend",
                    " <div class='row'> " 
                    +"    <div class='col-md-6'> " 
                    +"   <div class='form-group position-relative'> " 
                    + "   <label>" +res.user_course[index].user.name +"</label> " 
                    + " <input hidden id='UpdateId' name='Id' value='"+res.id+"'> "
                    +
                    " </div> " 
                    +  " </div>  " +
                    " <div class='col-md-6'>  " +
                    "     <div class='form-check mb-3'>  " +
                    "         <label class='form-check-label'> <span class='text-danger'>*</span>  " +
                    "            <input type='checkbox' name='present_"+index+"' id='present_"+index+"' class='form-check-input'  " +
                    "                >   @lang('trans.present')  </label>  " +
                    "      </div> "

                    +
                    "   </div> "

               
                    +"    </div>");
            }
         
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