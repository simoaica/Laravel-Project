@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
@endsection

@section('content')
<div class="container">
  @include('_includes.messages')
  <div class="row">
    <div class="col-xs-12">
      <h3>Create New Course
      <span><a href="{{ route('courses.dashboard') }}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-arrow-left m-r-10"></i> Back to Courses Dashboard</a></span></h3>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-sm-6">
      <form id="course" action="{{ route('manage.store') }}" method="post">
        {{ csrf_field() }}
        {{ method_field('POST') }}
        <h4 class="m-b-20">Course details:</h4>
        <div class="form-group">
          <label for="course_title">Course Title</label>
          <input type="text" class="form-control" id="course_title" name="course_title" placeholder="Course title">
        </div>
        <div class="form-group">
          <label for="course_description">Course Description</label>
          <textarea name="course_description" class="form-control" id="course_description"></textarea>
        </div>
        <div class="checkbox pull-right">
          <label>
            <input type="checkbox" name="course_published">
            Published?
          </label>
        </div>
        <hr style="clear:both;">
        <h4 class="m-b-20">Lesson details:</h4>
        <div class="form-group">
          <label for="lesson_title">Lesson Title</label>
          <input type="text" class="form-control" id="lesson_title" name="lesson_title" placeholder="Lesson title">
        </div>
        <div class="form-group">
          <label for="lesson_description">Lesson Description</label>
          <textarea name="lesson_description" class="form-control" id="lesson_description"></textarea>
        </div>
        <div class="form-group">
          <label for="movieId">Lesson's YouTube ID:</label>
          <input type="text" class="form-control" id="movieId" name="movieId" placeholder="Lesson's YouTube ID">
        </div>
        <button type="button" id="addMovieId" class="btn btn-primary btn-sm pull-right m-t-10"><i class="fa fa-book m-r-10"></i> Add Lesson</button>
        <input type="hidden" id="lessons" name="lessons">
      </form>
    </div>
    <div class="col-sm-6">
      <ul id="sortable" class="list-group">
      </ul>
    </div>
  </div>
  <hr>
  <button class="btn btn-primary pull-right" id="save_course"><i class="fa fa-book m-r-10"></i> Create Course</button>
</div>

@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
$( function() {
  $( "#sortable" ).sortable();
  $( "#sortable" ).disableSelection();
  $("#addMovieId").click(function(e){
    if ($( "#movieId" ).val()) {
        // var title = $( "#title" ).val().trim();
        var lesson_title = $('<div />').text($( "#lesson_title" ).val().trim()).html();
        var lesson_description = $('<div />').text($( "#lesson_description" ).val().trim()).html();
        var movieId = $('<div />').text($( "#movieId" ).val().trim()).html();
        // var movieId = $( "#movieId" ).val().trim();
        var img_url = "https://img.youtube.com/vi/" + movieId + "/0.jpg";
        e.preventDefault();
        $( "#sortable" ).append(`
        <li class="list-group-item alert" data-lesson_title="${lesson_title}" data-lesson_description="${lesson_description}" data-movieid="${movieId}" style="margin-bottom:10px;">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <div aria-hidden="true">&times;</div></button>
          <div class="row">
          <div class="col-sm-6">
          <div class="m-t-25"><strong>Titlu:</strong> ${lesson_title}</div>
          <div class="m-t-5"><strong>Description: </strong>${lesson_description}</div>
          </div>
          <div class="col-sm-6">
          <div><img src="${img_url}" style="width:150px; margin-left:40px;"></div>
          </div>
          </div>
        </li>`);
        $( "#lesson_title" ).val('').focus();
        $( "#lesson_description" ).val('');
        $( "#movieId" ).val('');
      }
  });
  $("#save_course").click(function(e){
    e.preventDefault();
    var course_title = $('<div />').text($( "#course_title" ).val().trim()).html();
    var lessons = [];
    var position = 1;
    $('#sortable li').each(function(){
      lessons.push([$(this).data('lesson_title'), $(this).data('lesson_description'), $(this).data('movieid'), position]);
      position ++;
    });
    $('#lessons').val(JSON.stringify(lessons));
    $('#course').submit();
  });
} );
</script>

@endsection
