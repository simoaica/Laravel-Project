@extends('layouts.manage')

@section('content')
    <div class="col-sm-9">
      <div class="row">
        <div class="col-sm-6">
          <h2 class="pull-left">Manage Users</h2>
        </div>
        <div class="col-sm-6">
          <a href="{{route('users.create')}}" class="btn btn-primary btn-sm pull-right m-t-25"><i class="fa fa-user-plus m-r-10"></i> Create New User</a>
        </div>
      </div>
      <hr>
      <table class="table table-striped table-hover table-condensed m-t-40">
        <thead>
          <tr>
            <th>id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Date Created</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
            <tr>
            <th>{{$user->id}}</th>
            <th>{{$user->name}}</th>
            <td>{{$user->email}}</td>
            <td>{{$user->created_at->toFormattedDateString()}}</td>
            <td>
              <a href="{{route('users.show', $user->id)}}" class="btn btn-default btn-sm m-r-5"><span><i class="fa fa-eye m-r-5"></i></span> View</a>
              <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary btn-sm m-r-5"><span><i class="fa fa-edit m-r-5"></i></span> Edit</a>
              @if ($user->id != Auth::user()->id)
              <a href="{{ route('users.destroy', $user->id) }}"
                onclick="event.preventDefault();
                if (confirm('Are you sure you want to delete user {{ $user->name }} ?') == true) {
                   document.getElementById('delete-user-form-{{ $user->id }}').submit();
                  }"
                class="btn btn-danger btn-sm">
                <span><i class="fa fa-trash m-r-5"></i></span> Delete</a>
                <form id="delete-user-form-{{ $user->id }}" action="{{route('users.destroy', $user->id)}}" method="POST" style="display: none;">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
              </form>
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-xs-12 text-center">{{ $users->links() }}</div>
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
