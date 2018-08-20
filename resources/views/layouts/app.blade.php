<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">       
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.js') }}" defer></script>
    <link href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.css') }}" rel="stylesheet">
    <script src="{{ asset('/js/app.js') }}" defer></script>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/chat.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
</head>
<body>
    <div id="app">
        <div class="container">
            @include('shared.navbar')
            @yield('content')
        </div>
    </div>
</body>
</html>
