@extends('layouts.manage')

@section('content')
    <div class="col-sm-9">
      <div class="row">
        <div class="col-xs-12">
          <h2>Edit User</h2>
          <hr>
        </div>
      </div>
      <div class="row">
        <form action="{{route('users.update', $user->id)}}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
          <div class="col-sm-6">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
            </div>
            <div class="form-group">
              <div class="radio">
                <label>
                  <input type="radio" name="password_options" id="inlineRadio1" value="keep" :checked="true" v-model="password_options"> Do Not Change Password
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="password_options" id="inlineRadio2" value="auto" v-model="password_options"> Auto-Generate New Password
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="password_options" id="inlineRadio3" value="manual" v-model="password_options"> Manually Set New Password
                </label>
              </div>
              <input type="text" class="form-control m-t-15" name="password" id="password" v-if="password_options == 'manual'" placeholder="Manually give a password to this user">
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
                <button type="submit" class="btn btn-primary m-t-15 btn-block"><span><i class="fa fa-save m-r-5"></i></span> Save User</button>
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
      password_options: 'keep',
      rolesSelected: {!! $user->roles->pluck('id') !!}
    }
  })
</script>
@endsection
