@extends('layouts.manage')

@section('content')
    <div class="col-sm-9">
      <div class="row">
        <div class="col-xs-12">
          <h3>Create New Permission</h3>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-xs-12">
          <form action="{{ route('permissions.store') }}" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
              <label class="radio-inline">
                <input type="radio"  v-model="permissionType" name="permissionType" value="basic"> Basic Permission
              </label>
              <label class="radio-inline">
                <input type="radio"  v-model="permissionType" name="permissionType" value="crud"> CRUD Permission
              </label>
            </div>

            <div class="form-group" v-if="permissionType == 'basic'">
              <label for="display_name">Name (Display Name)</label>
              <input type="text" class="form-control" name="display_name" id="display_name" value="{{ old('display_name') }}">
            </div>

            <div class="form-group" v-if="permissionType == 'basic'">
              <label for="name">Slug</label>
              <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
            </div>

            <div class="form-group" v-if="permissionType == 'basic'">
              <label for="description">Description</label>
              <input type="text" class="form-control" name="description" id="description" placeholder="Describe what this permission does" value="{{ old('description') }}">
            </div>

            <div class="form-group" v-if="permissionType == 'crud'">
              <label for="resource">Resource</label>
              <input type="text" class="form-control" name="resource" id="resource" v-model="resource" placeholder="The name of the resource">
            </div>

            <div class="row" v-if="permissionType == 'crud'">
              <div class="col-sm-3">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" v-model="crudSelected" value="create"> Create
                  </label>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" v-model="crudSelected" value="read"> Read
                  </label>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" v-model="crudSelected" value="update"> Update
                  </label>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" v-model="crudSelected" value="delete"> Delete
                  </label>
                </div>
              </div> <!-- end of .column -->

              <input type="hidden" name="crud_selected" :value="crudSelected">

              <div class="col-sm-9">
                <table class="table table-striped table-hover table-condensed" v-if="resource.length >= 3">
                  <thead>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Description</th>
                  </thead>
                  <tbody>
                    <tr v-for="item in crudSelected">
                      <td v-text="crudName(item)"></td>
                      <td v-text="crudSlug(item)"></td>
                      <td v-text="crudDescription(item)"></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <button class="btn btn-primary m-t-10 pull-right"><span><i class="fa fa-user-plus m-r-5"></i></span> Create Permission</button>
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
        permissionType: 'basic',
        resource: '',
        crudSelected: ['create', 'read', 'update', 'delete']
      },
      methods: {
        crudName: function(item) {
          return item.substr(0,1).toUpperCase() + item.substr(1) + " " + app.resource.substr(0,1).toUpperCase() + app.resource.substr(1);
        },
        crudSlug: function(item) {
          return item.toLowerCase() + "-" + app.resource.toLowerCase();
        },
        crudDescription: function(item) {
          return "Allow a User to " + item.toUpperCase() + " a " + app.resource.substr(0,1).toUpperCase() + app.resource.substr(1);
        }
      }
    });
  </script>
@endsection
