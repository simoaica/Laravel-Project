<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand m-t-5" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <img src="/uploads/avatars/{{ Auth::user()->avatar }}" class="avatar-menu"><span> {{ Auth::user()->name }} </span><span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            @if (Laratrust::can('read-profile'))
                            <li><a href="{{ route('profile') }}"><span><i class="fa fa-user m-r-5"></i></span> Profile</a></li>
                            @endif
                            @if (Laratrust::hasRole('superadministrator|administrator'))
                            <li><a href="{{ route('manage.dashboard') }}"><span><i class="fa fa-cog m-r-5"></i></span> Manage Site</a></li>
                            @endif
                            @if (Laratrust::hasRole('superadministrator|administrator|teacher'))
                            <li><a href="{{ route('courses.dashboard') }}"><span><i class="fa fa-book m-r-5"></i></span> Manage Courses</a></li>
                            @endif
                            <li class="divider">  </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <span><i class="fa fa-sign-out m-r-5"></i></span> Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
