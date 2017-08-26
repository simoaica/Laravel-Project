@extends('layouts.manage')

@section('content')
    <div class="col-sm-9">
      <div class="row">
        <div class="col-xs-12">
          <h2>Create New User</h2>
        </div>
      </div>
      <hr>
      <div class="row">
        <form action="{{route('users.store')}}" method="POST">
          <div class="col-xs-6">
            {{ csrf_field() }}
            {{ method_field('POST') }}
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" v-if="!auto_password" placeholder="Manually give a password to this user">
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" name="auto_generate" :checked="true" v-model="auto_password"> Auto Generate Password
              </label>
            </div>
          </div>
          <div class="col-sm-6">
            <input type="hidden" name="roles" :value="rolesSelected" />
            <h2 class="m-l-20 m-t-5">Roles:</h2>
            @foreach ($roles as $role)
              <div class="checkbox m-l-20">
                <label>
                  <input type="checkbox" v-model="rolesSelected" value="{{$role->id}}"> {{$role->display_name}}
                </label>
              </div>
            @endforeach
          </div>
          <div class="row">
            <div class="col-xs-2 col-xs-offset-5">
              <button type="submit" class="btn btn-primary m-t-15 btn-block"><span><i class="fa fa-user-plus m-r-5"></i></span> Create User</button>
            </div>
          </div>
        </form>
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
      auto_password: false,
      rolesSelected: {!! old('roles') ? old('roles') : '[]' !!}
    }
  })
</script>
@endsection
