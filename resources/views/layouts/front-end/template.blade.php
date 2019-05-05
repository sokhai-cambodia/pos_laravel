@php $icon = isset($icon) ? 'feather '.$icon.' bg-c-blue' : 'feather icon-clipboard bg-c-blue'; $title = isset($title) ?
$title : 'Empty Name';
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.front-end.header')
    @yield('header-src')
</head>
<style>
body{
    background-size: cover;
    background-repeat: no-repeat;
    height: 100%;
    font-family: 'Numans', sans-serif;
    background-color: black;
    }
</style>

<body>
    <!-- [ Header ] start -->
    @include('layouts.front-end.navbar')
    @yield('content')
    @include('layouts.front-end.footer')
    @yield('footer-src')
</body>

</html>
