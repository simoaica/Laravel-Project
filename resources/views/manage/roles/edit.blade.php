@extends('layouts.manage')

@section('content')
    <div class="col-sm-9">
      <div class="row">
        <div class="col-xs-12">
          <h3>Edit {{$role->display_name}}</h3>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-xs-12">
          <form action="{{route('roles.update', $role->id)}}" method="POST">
            {{csrf_field()}}
            {{method_field('PUT')}}

            <div class="form-group">
              <label for="display_name">Name (Human Readable)</label>
              <input type="text" class="form-control" name="display_name" value="{{$role->display_name}}" id="display_name">
            </div>
            <div class="form-group">
              <label for="name">Slug (Can not be changed)</label>
              <input type="text" class="form-control" name="name" value="{{$role->name}}" disabled id="name">
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <input type="text" class="form-control" value="{{$role->description}}" id="description" name="description">
            </div>
            <input type="hidden" :value="permissionsSelected" name="permissions">
            <hr>
            <h2>Permissions:</h2>
            @foreach ($permissions as $permission)
              <div class="checkbox">
                <label>
                  <input type="checkbox" v-model="permissionsSelected" value="{{$permission->id}}"> {{$permission->display_name}} <em>({{$permission->description}})</em>
                </label>
              </div>
            @endforeach
            <hr>
            <button class="btn btn-primary"><span><i class="fa fa-save m-r-5"></i></span> Save Changes to Role</button>
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
      permissionsSelected: {!!$role->permissions->pluck('id')!!}
    }
  });

  </script>
@endsection
