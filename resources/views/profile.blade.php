@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-10 col-sm-offset-1">
      @include('_includes.messages')
        <div class="panel panel-default m-t-30">
          <div class="panel-heading">
            <h3 class="text-center">{{ $user->name }} 's profile</h3>
          </div>
          <div class="panel-body">
            <div class="row">
            <div class="col-sm-{{ (Laratrust::can('update-profile')) ? 4 :12 }}">
              <div class="avatar">
                <h4 class="text-center">Avatar</h4>
                <img src="/uploads/avatars/{{ $user->avatar }}" class="avatar">
              </div>
            </div>
            @if (Laratrust::can('update-profile'))
            <div class="col-sm-8">
              <form action="{{ route('profile') }}" method="POST" enctype="multipart/form-data" class="form-inline">
                {{ csrf_field() }}
                {{ method_field('POST') }}
                <div class="form-group m-t-100">
                  <label>Update profile image</label>
                  <input type="file" class="form-control" name="avatar">
                </div>
                <button type="submit" class="btn btn-sm btn-primary m-t-100"><span><i class="fa fa-user m-r-5"></i></span> Update profile avatar</button>
              </form>
              <span><a href="{{ route('delete_avatar', $user->id) }}" onclick="if (confirm('Are you sure you want to delete user {{ $user->name }} \'s avatar ?') == false) {
                 return false;
                }" class="btn btn-success btn-sm pull-right m-r-10 m-t-10">Delete Avatar</a></span>
            </div>
            @endif
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-{{ (Laratrust::can('update-profile')) ? 4 :12 }} m-t-20">
                <h5 class="text-center"><strong>Email adress:</strong> <a href="mailto:{{ $user->email }}">{{ $user->email }}</a></h5>
              </div>
              @if (Laratrust::can('update-profile'))
              <div class="col-sm-8 m-t-20">
                <form class="form-inline" action="{{route('update_email')}}" method="POST">
                  {{ csrf_field() }}
                  {{ method_field('POST')}}
                  <div class="form-group">
                    <label for="newEmail">Change email:</label>
                    <input type="email" class="form-control" id="newEmail" name="email" placeholder="New email ...">
                  </div>
                  <button type="submit" class="btn btn-primary btn-sm"><span><i class="fa fa-envelope m-r-5"></i></span> Change email</button>
                </form>
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
