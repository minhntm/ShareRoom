<nav class="navbar navbar-default fixed-top navbar-expand-md">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('home') }}"><b>{!! trans('app.app-name') !!}</b></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item"><a href="{{ route('rooms.create') }}" class="nav-link">{!! trans('app.become-a-host') !!}</a></li>
                <li class="nav-item"><a href="#" class="nav-link">{!! trans('app.about') !!}</a></li>
                <li class="nav-item"><a href="#" class="nav-link">{!! trans('app.save') !!}</a></li>
                <li class="nav-item"><a href="{{ route('message') }}" class="nav-link">{!! trans('app.message') !!}</a></li>
                <li class="nav-item"><a href="#" class="nav-link">{!! trans('app.help') !!}</a></li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#loginModal">{!! trans('app.signin') !!}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#registerModal">{!! trans('app.signup') !!}</a>
                    </li>
                @else
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary dropdown-toggle fix-btn-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        <div class="dropdown-menu dropdown-menu-right fix-dropdown-menu">
                            @role('Manager')
                            <a class="dropdown-item fix-dropdown-item" href="{{ url('/admin') }}">
                                {!! trans('app.admin') !!}
                            </a>
                            @endrole
                            <a class="dropdown-item fix-dropdown-item" href="{{ route('users.edit', Auth::user()->id) }}">{!! trans('app.edit-profile') !!}</a>
                            <a class="dropdown-item fix-dropdown-item" href="#">{!! trans('app.acount-setting') !!}</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item fix-dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {!! trans('app.logout') !!}
                            </a>
                            {!! Form::open(['url' => route('logout'), 'id' => 'logout-form']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                @endguest
            </ul>
        </div>
    </div>
</nav>
