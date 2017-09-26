@extends('layouts.manage')

@section('content')
    <div class="col-sm-9">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="pull-left">View permission {{ $permission->display_name }} details</h3>
        </div>
        <div class="col-sm6">
          <a href="{{route('permissions.edit', $permission->id)}}" class="btn btn-primary btn-sm pull-right m-t-25"><i class="fa fa-edit m-r-10"></i> Edit Permission</a>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-xs-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Permission {{ $permission->display_name }}:</h3>
            </div>
            <div class="panel-body">
              <p>
                <strong>Name: {{ $permission->display_name }}</strong>
                </br>
                <small>Slug: {{ $permission->name }}</small>
                <br>
                Description: {{ $permission->description }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- Inchide .row din nav - manage.blade -->
</div> <!-- Inchide .container din nav - manage.blade -->
@endsection
