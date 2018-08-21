@extends('layouts.chat-master')

@section('content')
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1><span>Our</span> user</h1>
        </div>
        <div class="row">
            @foreach($users as $user)
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="staff-box-2 staff-box-1">
                    <!-- Staff img -->
                    <a href="#" class="teachers-img">
                        <img src="img/users/staff-1.jpg" alt="staff-1" class="img-responsive">
                    </a>
                    <!-- Staff content -->
                    <div class="content">
                        <!-- title -->
                        <h1 class="title">
                            <a href="staff.html">{{ $user->name }}</a>
                        </h1>
                        <!-- Subject -->
                        <h3 class="subject">{{ $user->email }}</h3>
                        <!-- Social list -->
                        <ul class="social-list clearfix">
                            <li>
                                <a href="{{ url('chat/'.$user->id) }}" class="facebook">
                                    <i class="fa fa-comments"> Send message</i>
                                </a>
                            </li>                            
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection