<html>
<head>
    <title> @yield('title') </title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/dashboard-icon.png') }}">
    <link href="{{ url('/bower_components/Font-Awesome/web-fonts-with-css/css/fontawesome-all.css') }}" rel="stylesheet">
    <link href="{{ url('/css/admin/style.css') }}" rel="stylesheet">
</head>
<body>
<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
     data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    @include('shared.admin-navbar')
    @include('shared.left-slidebar')
    @yield('content')
</div>
<script src="{{ url('/bower_components/jquery/dist/jquery.js') }}"></script>
<script src="{{ url('/bower_components/bootstrap/dist/js/bootstrap.js') }}"></script>
</body>
</html>
