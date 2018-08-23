<html>
<head>
    <title> @yield('title') </title>
    <meta name="viewport" content="width=device-width,	initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ url('/bower_components/bootstrap/dist/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/bower_components/components-font-awesome/css/fontawesome-all.min.css') }}">
    <!-- import template -->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/blue-light-2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/fonts/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPlayfair+Display:400,700%7CRoboto:100,300,400,400i,500,700">
    @toastr_css
    <script src="{{ url('/bower_components/jquery/dist/jquery.js') }}"></script>
    <script src="{{ url('/bower_components/bootstrap/dist/js/bootstrap.js') }}"></script>
    <script src="{{ url('/js/general-navbar.js') }}"></script>    
    @yield('styles')
</head>
<body>
    @include('shared.navbar')
    @include('auth.login-modal')
    @include('auth.register-modal')
    
    <div class="content-area">        
        @yield('content')
        @yield('scripts')
        @toastr_js
        @toastr_render
    </div>    
</body>
</html>
