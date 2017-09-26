<div class="container">
  @include('_includes.messages')
  <div class="row">
    <div class="col-sm-3">
      <div class="side-menu m-t-30 m-l-10">
        <div class="manage-menu-section">
          General
        </div>
        <ul class="manage-menu-item">
          <li><a href="{{ route('manage.dashboard') }}">Dashboard</a></li>
        </ul>

        @if(Laratrust::hasRole('superadministrator'))
          <div class="manage-menu-section">
            Administration
          </div>
          <ul class="manage-menu-item">
            <li ><a href="{{ route('users.index') }}">Manage Users</a></li>
            <li class="p-t-5"><a href="{{ route('permissions.index') }}">Manage Permissions</a></li>
            <li class="p-t-5"><a href="{{ route('roles.index') }}">Manage Roles</a></li>
          </ul>
        @endif
      </div>
    </div>
