@extends('layouts.manage')

@section('content')
    <div class="col-sm-9">
      <div class="row">
        <div class="col-xs-12">
          <h3>Create New Role</h3>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-xs-12">
          <form action="{{ route('roles.store') }}" method="POST">
            {{ csrf_field() }}

            <h3>Role Details:</h3>
            <div class="form-group">
              <label for="display_name">Name (Human Readable)</label>
              <input type="text" class="form-control" name="display_name" value="{{ old('display_name') }}" id="display_name">
            </div>
            <div class="form-group">
              <label for="name">Slug (Can not be changed)</label>
              <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="name">
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <input type="text" class="form-control" name="description" value="{{ old('description') }}" id="description">
            </div>
            <input type="hidden" :value="permissionsSelected" name="permissions">
            <hr>
            <h3>Permissions:</h3>
            @foreach ($permissions as $permission)
              <div class="checkbox">
                <label>
                  <input type="checkbox" v-model="permissionsSelected" value="{{ $permission->id }}"> {{ $permission->display_name }} <em>({{ $permission->description }})</em>
                </label>
              </div>
            @endforeach
            <hr>
            <button class="btn btn-primary"><span><i class="fa fa-user-plus m-r-5"></i></span> Create New Role</button>
          </form>
        </div>
      </div>
    </div> <!-- Inchide .col-sm-9 -->
  </div> <!-- Inchide .row din nav - manage.blade -->
</div> <!-- Inchide .container din nav - manage.blade -->
@endsection

@section('scripts')
  <script>

  var app = new Vue({
    el: '#app',
    data: {
      permissionsSelected: []
    }
  });

  </script>
@endsection
