<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin5">
            <a class="navbar-brand" href="{{ url('/admin') }}">
                <b class="logo-icon">
                    <img src="{{ asset('img/logo-icon-light.png') }}" alt="homepage" class="light-logo" />
                </b>
                <span class="logo-text">
                    {!! trans('app.app-name') !!}
                </span>
            </a>
        </div>
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <ul class="navbar-nav float-left mr-auto">
                <li class="nav-item px-3">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="fas fa-home"></i>
                        {!! trans('app.home') !!}
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav float-right">
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle"
                       href="javascript:void(0)" data-toggle="dropdown">
                        <img src="{{ asset('img/more.png') }}">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated">
                        <a class="dropdown-item" href="{{ route('admin.users.edit', Auth::user()->id) }}">
                            <span class="sub-item">
                                <i class="fas fa-user"></i>
                            </span>
                            <span class="sub-item">
                                {!! trans('app.edit-profile') !!}
                            </span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="sub-item">
                                <i class="fas fa-sign-out-alt"></i>
                            </span>
                            <span class="sub-item">
                                {!! trans('app.logout') !!}
                            </span>
                        </a>
                        {!! Form::open(['url' => route('logout'), 'id' => 'logout-form']) !!}
                        {!! Form::close() !!}
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
