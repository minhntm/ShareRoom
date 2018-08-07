<html>
<head>
    <title> @yield('title') </title>
    <link rel="stylesheet" type="text/css" href="{{ url('/bower_components/bootstrap/dist/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/signin-signout.css') }}">
    @yield('styles')
</head>
<body>
@include('shared.navbar')
@include('auth.login-modal')
@include('auth.register-modal')
@yield('content')
@yield('scripts')
<script src="{{ url('/bower_components/jquery/dist/jquery.js') }}"></script>
<script src="{{ url('/bower_components/bootstrap/dist/js/bootstrap.js') }}"></script>
<script src="{{ url('/js/general-navbar.js') }}"></script>
</body>
</html>
