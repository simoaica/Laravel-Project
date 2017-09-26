@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
      @include('_includes.messages')
        <h3 class="text-center m-t-20 m-b-20">
          <span><a href="{{ route('courses.dashboard') }}" class="btn btn-primary btn-sm pull-left"><i class="fa fa-arrow-left m-r-10"></i> Back to Courses Dashboard</a></span>
          {{ $course->title }}
          <span><a href="{{route('manage.edit', $course->id)}}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-book m-r-10"></i> Edit Course</a></span>
        </h3>
        <hr>
        <h4 class="m-t-20"><strong>Description:</strong></h4>
        <p>{{ $course->description }}</p>
        <hr>
        <p>Author: {{ $course->user->name }}</p>
        <hr>
        <p>Published: {{ ($course->published)? 'Yes' : 'No' }}</p>
        <hr>
        <h4 class="m-t-20"><strong>Lessons:</strong></h4>
        <ul class="list-group m-t-20">
          <li class="list-group-item" style="margin-bottom:10px;">
            <div class="row">
                @foreach ($course->lessons as $lesson)
                  <div class="col-lg-3 col-md-4 col-sm-6">
                    <h4>{{ $lesson->title }}</h4>
                    <p><strong>{{ $lesson->description }}</strong></p>
                    <div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $lesson->video_id }}" frameborder="0" allowfullscreen></iframe>
                    </div>
                  </div>
                @endforeach
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
@endsection
