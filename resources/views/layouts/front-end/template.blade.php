<!DOCTYPE html>
<html>

<head>
    @include('layouts.front-end.header')
    @yield('header-src')
</head>

<body>
    @yield('content')
    @include('layouts.message.notification')
</body>

@yield('footer-src')

</html>
