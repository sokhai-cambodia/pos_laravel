<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.cms.header')
    @yield('header-src')
</head>

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-bar"></div>
    </div>
    <!-- [ Pre-loader ] end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <!-- [ Header ] start -->
            @include('layouts.cms.navbar-head')
            
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <!-- [ navigation menu ] start -->
                    @include('layouts.cms.navbar')
                    <!-- [ navigation menu ] end -->
                    @yield('content')
                    <!-- [ style Customizer ] start -->
                    <div id="styleSelector">
                    </div>
                    <!-- [ style Customizer ] end -->
                </div>
            </div>
        </div>
    </div>
    @include('layouts.cms.footer')
    @yield('footer-src')

   
    
</body>
</html>
