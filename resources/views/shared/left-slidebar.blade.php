<aside class="left-sidebar" data-sidebarbg="skin6">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li>
                    <div class="user-profile d-flex no-block dropdown m-t-20">
                        <div class="user-pic sub-item"><img src="{{ asset('img/users/user.png') }}" alt="users" class="rounded-circle" width="40" /></div>
                        <div class="user-content hide-menu m-l-10">
                            <a href="javascript:void(0)" class="" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <h5 class="m-b-0 user-name font-medium">
                                    {{ Auth::user()->name }}
                                </h5>
                                <span class="op-5 user-email">
                                    {{ Auth::user()->email }}
                                </span>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/admin') }}" aria-expanded="false">
                        <span class="sub-item">
                            <i class="fas fa-columns"></i>
                        </span>
                        <span class="hide-menu sub-item">
                            {!! trans('app.dashboard') !!}
                        </span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.users.index') }}" aria-expanded="false">
                        <span class="sub-item">
                            <i class="fas fa-users-cog"></i>
                        </span>
                        <span class="hide-menu sub-item">
                            {!! trans('app.users') !!}
                        </span>
                    </a>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.roles.index') }}" aria-expanded="false">
                        <span class="sub-item">
                            <i class="fas fa-cube"></i>
                        </span>
                        <span class="hide-menu sub-item">
                            {!! trans('app.roles') !!}
                        </span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
