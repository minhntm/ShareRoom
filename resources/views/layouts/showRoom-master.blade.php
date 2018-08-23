<html>
<head>
    <title> @yield('title') </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta	name="viewport"	content="width=device-width,	initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ url('/bower_components/bootstrap/dist/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/bower_components/components-font-awesome/css/fontawesome-all.min.css') }}">
    <!-- import template -->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/blue-light-2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/jquery-ui-1.10.0.custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/bower_components/jquery-raty/lib/jquery.raty.css') }}">
    @toastr_css

    <script src="{{ url('/bower_components/jquery/dist/jquery.js') }}"></script>
    <script src="{{ url('/bower_components/bootstrap/dist/js/bootstrap.js') }}"></script>
    <script src="{{ url('/js/general-navbar.js') }}"></script>
    <script src="{{ url('/bower_components/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <script src="{{ url('/bower_components/jquery-raty/lib/jquery.raty.js') }}"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCU5Eypr-mIt9pW1nieA8g0yX8lBSpKAvc&libraries=places"></script>
    @yield('styles')
</head>
<body>
    @include('shared.navbar')
    @include('auth.login-modal')
    @include('auth.register-modal')
    <div class="show-room-content">
        @yield('content')
        @yield('scripts')
        @toastr_js
        @toastr_render
    </div>
</body>
</html>
