@extends('layouts.manage')

@section('content')
    <div class="col-sm-9">
      <div class="row">
        <div class="col-sm-6">
          <h3>{{ $role->display_name }}<small class="m-l-25"><em>({{ $role->name }})</em></small></h3>
          <h5>{{ $role->description }}</h5>
        </div>
        <div class="col-sm6">
          <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary btn-sm pull-right m-t-25"><i class="fa fa-edit m-r-10"></i> Edit Role</a>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-xs-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Roles:</h3>
            </div>
            <div class="panel-body">
              <ul>
                @foreach ($role->permissions as $r)
                  <li>{{ $r->display_name }} <em class="m-l-15">({{ $r->description }})</em></li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- Inchide .row din nav - manage.blade -->
</div> <!-- Inchide .container din nav - manage.blade -->
@endsection
