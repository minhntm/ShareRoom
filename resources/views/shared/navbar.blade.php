<nav class="navbar navbar-default fixed-top navbar-expand-md">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('home') }}"><b>{!! trans('app.app-name') !!}</b></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav ml-auto">
                <li>
                    {{ Form::open(['method' => 'GET', 'url' => route('search')]) }}
                        {!! Form::text('location', Request::get('location'), ['id' => 'search', 'placeholder' => 'Where do you want to go?', 'autocomplete' => 'off', 'class' => 'search-tran custom-search']) !!}
                    {{ Form::close() }}
                </li>
                <li class="nav-item"><a href="{{ route('rooms.create') }}" class="nav-link">{!! trans('app.become-a-host') !!}</a></li>
                <li class="nav-item"><a href="#" class="nav-link">{!! trans('app.about') !!}</a></li>
                <li class="nav-item"><a href="#" class="nav-link">{!! trans('app.save') !!}</a></li>
                <li class="nav-item"><a href="{{ route('message') }}" class="nav-link">{!! trans('app.message') !!}</a></li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#loginModal">{!! trans('app.signin') !!}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#registerModal">{!! trans('app.signup') !!}</a>
                    </li>
                @else
                    <li class="nav-item dropdown-notifications">
                        <a id="navMessage" href="#" class="nav-link">
                            <i data-count="0" class="fas fa-bell"></i>
                            {!! trans('app.notification') !!}
                        </a>
                        <div id="myDropdown" class="dropdown-menu-right dropdown-content">
                        <span id="noti-item">
                            <div class="dropdown-item-noti-header">
                                <div class="row noti-header-content">
                                    <div class="col-md-9">
                                        <div class="noti-header-left ">
                                            <a>Notifications</a>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                    <div class="noti-header-right">
                                    <a>Read</a>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </span>
                        </div>
                    </li>
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary dropdown-toggle fix-btn-dropdown custom-navbar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
<script>
    $(document).on('click', '#navMessage', function(e){
        e.preventDefault();
        document.getElementById("myDropdown").classList.toggle("show");
    });
    window.onclick = function(event) {
        if (!event.target.matches('.nav-link')) {

            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>
