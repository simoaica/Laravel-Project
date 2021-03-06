@extends('layouts.manage')

@section('content')
    <div class="col-sm-9">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="pull-left">View user {{ $user->name }} details</h3>
        </div>
        <div class="col-sm-6">
          <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary btn-sm pull-right m-t-25"><i class="fa fa-edit m-r-10"></i> Edit User</a>
        </div>
      </div>
      <hr>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">{{ $user->name }} details:</h3>
        </div>
        <div class="panel-body">
          <p>Name: {{ $user->name }}</p>
          <p>Email: {{ $user->email }}</p>
          <p>Avatar:
            @if ($user->avatar !="default.jpg")
            <span class="avatar-64"><a href="{{ route('delete_avatar', $user->id) }}" onclick="if (confirm('Are you sure you want to delete user {{ $user->name }} \'s avatar ?') == false) {
             return false;
            }"><img src="/uploads/avatars/{{ $user->avatar }}"></a></span>
            @else
              <span class="avatar-64"><img src="/uploads/avatars/{{ $user->avatar }}"></span>
            @endif
          </p>
          <hr>
          <p>Roles:</p>
            <ul>
              {{ $user->roles->count() == 0 ? 'This user has not been assigned any roles yet' : '' }}
              @foreach ($user->roles as $role)
                <li>{{ $role->display_name }} ({{ $role->description }})</li>
              @endforeach
            </ul>
        </div>
      </div>
    </div>
  </div> <!-- Inchide .row din nav - manage.blade -->
</div> <!-- Inchide .container din nav - manage.blade -->
@endsection

{{-- @section('scripts')
<script>
    var app = new Vue({
    el: '#app',
    data: {

    }
  })
</script>
@endsection --}}
