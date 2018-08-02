<html>
<head>
    <title> @yield('title') </title>
    <link rel="stylesheet" type="text/css" href="{{ url('/bower_components/bootstrap/dist/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/custom.css') }}">
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
</body>
</html>
