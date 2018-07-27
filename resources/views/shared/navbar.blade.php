<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('home') }}">{!! trans('app.app-name') !!}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('home') }}">{!! trans('app.home') !!}<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">{!! trans('app.become-host') !!}</a>
        </li>
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{!! trans('app.login') !!}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{!! trans('app.signup') !!}</a>
            </li>
        @else
        
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">{!! trans('app.edit-profile') !!}</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {!! trans('app.logout') !!}
                    </a>
                    {!! Form::open(['url' => route('logout'), 'id' => 'logout-form']) !!}
                    {!! Form::close() !!}
                </div>
            </li>
        @endguest
        </ul>
    </div>
</nav>
