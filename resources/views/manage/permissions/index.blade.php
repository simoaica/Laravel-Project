@extends('layouts.manage')

@section('content')
    <div class="col-sm-9">
      <div class="row">
        <div class="col-sm-6">
          <h2 class="pull-left">Manage Permissions</h2>
        </div>
        <div class="col-sm-6">
          <a href="{{route('permissions.create')}}" class="btn btn-primary btn-sm pull-right m-t-25"><i class="fa fa-user-plus m-r-10"></i> Create New Permission</a>
        </div>
      </div>
      <hr>
      <table class="table table-striped table-hover table-condensed m-t-40">
        <thead>
          <tr>
            <th>Name</th>
            <th>Slug</th>
            <th>Description</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($permissions as $permission)
            <tr>
              <th>{{$permission->display_name}}</th>
              <td>{{$permission->name}}</td>
              <td>{{$permission->description}}</td>
              <td class="text-right"><a class="btn btn-default btn-sm m-r-5" href="{{route('permissions.show', $permission->id)}}"><span><i class="fa fa-user m-r-5"></i></span> View</a><a class="btn btn-primary btn-sm" href="{{route('permissions.edit', $permission->id)}}"><span><i class="fa fa-edit m-r-5"></i></span> Edit</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{-- <div class="row">
        <div class="col-xs-12 text-center">{{ $users->links() }}</div>
      </div> --}}
    </div>
  </div> <!-- Inchide .row din nav - manage.blade -->
</div> <!-- Inchide .container din nav - manage.blade -->
@endsection
