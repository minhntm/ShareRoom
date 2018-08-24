<html>
<head>
    <title> @yield('title') </title>
    <link rel="stylesheet" type="text/css" href="{{ url('/bower_components/bootstrap/dist/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/blue-light-2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/bower_components/components-font-awesome/css/fontawesome-all.min.css') }}">
    <script src="{{ url('/bower_components/pusher-js/dist/web/pusher.min.js') }}"></script>
</head>
<body>
    @include('shared.navbar')
    @include('shared.banner')
    @include('auth.login-modal')
    @include('auth.register-modal')
    @yield('content')
    <script src="{{ url('/bower_components/jquery/dist/jquery.js') }}"></script>
    <script src="{{ url('/bower_components/bootstrap/dist/js/bootstrap.js') }}"></script>
    <script src="{{ url('/js/home-navbar.js') }}"></script>
    <script type="text/javascript">
        if ("{{ !Auth::check() }}") {
            console.log('notlogin');
        } else {
            Pusher.logToConsole = true;
            var pusher_user_reviewed = new Pusher('{{env('PUSHER_APP_KEY')}}', {
                encrypted: true,
                cluster: '{{env('PUSHER_APP_CLUSTER')}}'
            });
            var channel_user_reviewed = pusher_user_reviewed.subscribe('user-reviewed');
            var default_url = '{{ route('rooms.show', 1) }}';
            var sub_url = default_url.substring(0, default_url-1);
            channel_user_reviewed.bind('App\\Events\\UserReviewed', function (data) {
                var url = sub_url + data['review_room_id'];

                html = '<div class="dropdown-item-noti-container">\n' +
                    '                                <div class="dropdown-item dropdown-item-noti">\n' +
                    '                                        <div class="dropdown-item-noti-content">\n' +
                    '                                            <div class="row">\n' +
                    '                                                <div class="col-md-3">\n' +
                    '                                                    <div class="noti-item-img">\n' +
                    '                                                        <a href="'+ url +'">\n' +
                    '                                                            <img src="{{ asset('img/users/user.png') }}" class="noti-item-img-resize">\n' +
                    '                                                        </a>\n' +
                    '                                                    </div>\n' +
                    '                                                </div>\n' +
                    '                                                <div class="col-md-9">\n' +
                    '                                                    <div class="noti-item-content">\n' +
                    '                                                        <div class="noti-item-content-type-message">\n' +
                    '                                                            <a class= "noti-item-content-type-message" href="'+ url +'">\n' +
                    data['event_type_message'] +
                    '                                                            </a>\n' +
                    '                                                        </div>\n' +
                    '                                                        <div class="noti-item-content-message">\n' +
                    '                                                            <a href="'+ url +'">\n' +
                    data['review_content'] +
                    '                                                            </a>\n' +
                    '                                                        </div>\n' +
                    '                                                        <br>\n' +
                    '                                                        <div class="noti-item-content-time">\n' +
                    '                                                            <a "href="'+ url +'">\n' +
                    data['review_time'] +
                    '                                                            </a>\n' +
                    '                                                        </div>\n' +
                    '                                                    </div>\n' +
                    '                                                </div>\n' +
                    '                                            </div>\n' +
                    '                                        </div>\n' +
                    '                                </div>\n' +
                    '                            </div>';
                if ("{{ Auth::id() }}" == data['review_to_id']) {
                    $('#noti-item').append(html);
                }
            });
        }
    </script>
    <script type="text/javascript">
        if ("{{ !Auth::check() }}") {
            console.log('notlogin');
        } else {
            Pusher.logToConsole = true;
            var pusher_review_upvoted = new Pusher('{{env('PUSHER_APP_KEY')}}', {
                encrypt: true,
                cluster: '{{env('PUSHER_APP_CLUSTER')}}'
            });
            var channel_review_upvote = pusher_review_upvoted.subscribe('review-upvoted');
            var default_url = '{{ route('rooms.show', 1) }}';
            var sub_url = default_url.substring(0, default_url-1);
            channel_review_upvote.bind('App\\Events\\ReviewUpvoted', function (data) {
                var url = sub_url + data['like_room_id'];
                html = '<div class="dropdown-item-noti-container">\n' +
                    '                                <div class="dropdown-item dropdown-item-noti">\n' +
                    '                                        <div class="dropdown-item-noti-content">\n' +
                    '                                            <div class="row">\n' +
                    '                                                <div class="col-md-3">\n' +
                    '                                                    <div class="noti-item-img">\n' +
                    '                                                        <a href="'+ url +'">\n' +
                    '                                                            <img src="{{ asset('img/users/user.png') }}" class="noti-item-img-resize">\n' +
                    '                                                        </a>\n' +
                    '                                                    </div>\n' +
                    '                                                </div>\n' +
                    '                                                <div class="col-md-9">\n' +
                    '                                                    <div class="noti-item-content">\n' +
                    '                                                        <div class="noti-item-content-type-message">\n' +
                    '                                                           <a class= "noti-item-content-type-message" href="'+ url +'">\n' +
                    data['event_type_message'] +
                    '                                                           </a>\n' +
                    '                                                        </div>\n' +
                    '                                                        <div class="noti-item-content-message">\n' +
                    '                                                        <span class="noti-item-content-message-title">Review: </span>\n' +
                    '                                                            <a href="'+ url +'">\n' +
                    data['like_review_content'] +
                    '                                                            </a>\n' +
                    '                                                        </div>\n' +
                    '                                                        <br>\n' +
                    '                                                        <div class="noti-item-content-time">\n' +
                    '                                                            <a href="'+ url +'">\n' +
                    data['like_time'] +
                    '                                                            </a>\n' +
                    '                                                        </div>\n' +
                    '                                                    </div>\n' +
                    '                                                </div>\n' +
                    '                                            </div>\n' +
                    '                                        </div>\n' +
                    '                                </div>\n' +
                    '                            </div>';
                if ("{{ Auth::id() }}" == data['like_to_id']) {
                    $('#noti-item').append(html);
                }
            });
        }
    </script>
    <script type="text/javascript">
        if ("{{ !Auth::check() }}") {
            console.log('notlogin');
        } else {
            Pusher.logToConsole = true;
            var pusher_room_booked = new Pusher('{{env('PUSHER_APP_KEY')}}', {
                encrypt: true,
                cluster: '{{env('PUSHER_APP_CLUSTER')}}'
            });
            var channel_room_booked = pusher_room_booked.subscribe('room-booked');
            var default_url = '{{ route('rooms.show', 1) }}';
            var sub_url = default_url.substring(0, default_url-1);
            channel_room_booked.bind('App\\Events\\RoomBooked', function (data) {
                var url = sub_url + data['reservation_room_id'];
                html = '<div class="dropdown-item-noti-container">\n' +
                    '                                <div class="dropdown-item dropdown-item-noti">\n' +
                    '                                        <div class="dropdown-item-noti-content">\n' +
                    '                                            <div class="row">\n' +
                    '                                                <div class="col-md-3">\n' +
                    '                                                    <div class="noti-item-img">\n' +
                    '                                                        <a href="'+ url +'">\n' +
                    '                                                            <img src="{{ asset('img/users/user.png') }}" class="noti-item-img-resize">\n' +
                    '                                                        </a>\n' +
                    '                                                    </div>\n' +
                    '                                                </div>\n' +
                    '                                                <div class="col-md-9">\n' +
                    '                                                    <div class="noti-item-content">\n' +
                    '                                                        <div class="noti-item-content-type-message">\n' +
                    '                                                           <a class= "noti-item-content-type-message" href="'+ url +'">\n' +
                    data['event_type_message'] +
                    '                                                           </a>\n' +
                    '                                                        </div>\n' +
                    '                                                        <div class="noti-item-content-message">\n' +
                    '                                                            <a href="'+ url +'">\n' +
                    '                                                               <span class="noti-item-content-message-title">Room: </span>\n' +
                    data['reservation_room_name'] +
                    '                                                            </a>\n' +
                    '                                                        </div>\n' +
                    '                                                        <br>\n' +
                    '                                                        <div class="noti-item-content-time">\n' +
                    '                                                            <a href="'+ url +'">\n' +
                    data['reservation_time'] +
                    '                                                            </a>\n' +
                    '                                                        </div>\n' +
                    '                                                    </div>\n' +
                    '                                                </div>\n' +
                    '                                            </div>\n' +
                    '                                        </div>\n' +
                    '                                </div>\n' +
                    '                            </div>';
                if ("{{ Auth::id() }}" == data['reservation_to_id']) {
                    $('#noti-item').append(html);
                }
            });
        }
    </script>
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
</body>
</html>
