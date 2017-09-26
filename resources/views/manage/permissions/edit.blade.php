@extends('layouts.manage')

@section('content')
    <div class="col-sm-9">
      <div class="row">
        <div class="col-xs-12">
          <h3 class="title">Edit {{ $permission->display_name }} Permission</h3>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-xs-12">
          <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
            {{csrf_field()}}
            {{method_field('PUT')}}

            <div class="form-group">
              <label for="display_name">Name (Display Name)</label>
              <p class="control">
                <input type="text" class="form-control" name="display_name" id="display_name" value="{{ $permission->display_name }}">
              </p>
            </div>

            <div class="form-group">
              <label for="name">Slug <small>(Cannot be changed)</small></label>
              <p class="control">
                <input type="text" class="form-control" name="name" id="name" value="{{ $permission->name }}" disabled>
              </p>
            </div>

            <div class="form-group">
              <label for="description">Description</label>
              <p class="control">
                <input type="text" class="form-control" name="description" id="description" placeholder="Describe what this permission does" value="{{ $permission->description }}">
              </p>
            </div>

            <button class="btn btn-primary"><span><i class="fa fa-save m-r-5"></i></span> Save Changes</button>
          </form>
        </div>
      </div>
    </div> <!-- Inchide .col-sm-9 -->
  </div> <!-- Inchide .row din nav - manage.blade -->
</div> <!-- Inchide .container din nav - manage.blade -->
@endsection
