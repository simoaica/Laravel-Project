@extends('layouts.manage')

@section('content')
    <div class="col-sm-9">
      <h2 class="text-center">Manager Dashboard</h2>
      <p class="text-center">Wellcome {{Auth::user()->roles()->get()->first()->name }} - <span class="lead"><strong>{{Auth::user()->name}}</strong></span></p>
      <div class="row">
        <div class="col-xs-12">
          <h4 class="m-t-20">There are {{ $users->count() }} users registered on the site:</h4>
          <table class="table table-striped table-hover table-condensed m-t-20">
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
              </tr>
              @endforeach
            </tbody>
          </table>
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
