@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
      @include('_includes.messages')
        <h4 class="text-center m-t-20 m-b-20">Wellcome {{ Auth::user()->name }}</h4>
        @if ($courses->count())
          @if (Auth::user()->hasRole(['superadministrator', 'administrator'], false))
            <h5 class="text-center m-t-10 m-b-30">There are {{ $courses->count() }} courses in total.</h5>
          @else
            <h5 class="text-center m-t-10 m-b-30">You have {{ $courses->count() }} courses.</h5>
          @endif
        @else
          <h5 class="text-center m-t-10 m-b-30">You have no courses yet.</h5>
        @endif
        <a href="{{route('manage.create')}}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-book m-r-10"></i> Create New Course</a>
        @if ($courses->count())
        <ul class="list-group m-t-100">
          <table class="table table-striped table-hover table-condensed m-t-20">
            <thead>
              <tr>
                <th>id</th>
                <th>Title</th>
                <th>Description</th>
                <th>Author</th>
                <th>Published</th>
                <th>Date Created</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($courses as $course)
                <tr>
                <th>{{ $course->id }}</th>
                <th>{{ $course->title }}</th>
                <td>{{ $course->description }}</td>
                <td>{{ $course->user->name }}</td>
                <td>{{ ($course->published)? 'Yes': 'No' }}</td>
                <td>{{ $course->created_at->toFormattedDateString() }}</td>
                <td>
                  <a href="{{route('manage.show', $course->id)}}" class="btn btn-default btn-sm m-r-5"><span><i class="fa fa-eye m-r-5"></i></span> View</a>
                  <a href="{{route('manage.edit', $course->id)}}" class="btn btn-primary btn-sm m-r-5"><span><i class="fa fa-edit m-r-5"></i></span> Edit</a>
                  <a href="{{ route('manage.destroy', $course->id) }}"
                    onclick="event.preventDefault();
                    if (confirm('Are you sure you want to delete course {{ $course->title }} ?') == true) {
                       document.getElementById('delete-course-form-{{ $course->id }}').submit();
                      }"
                    class="btn btn-danger btn-sm">
                    <span><i class="fa fa-trash m-r-5"></i></span> Delete</a>
                    <form id="delete-course-form-{{ $course->id }}" action="{{route('manage.destroy', $course->id)}}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
            {{-- <li class="list-group-item" style="margin-bottom:10px;">
              <h4>{{ $course->title }}</h4>
              <p><strong>{{ $course->description }}</strong></p>
              <p>Autor: {{ $course->user->name }}</p>
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
            </li> --}}
        </ul>
        @endif
      </div>
    </div>
  </div>
@endsection
