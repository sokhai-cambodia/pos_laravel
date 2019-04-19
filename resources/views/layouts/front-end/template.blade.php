@php $icon = isset($icon) ? 'feather '.$icon.' bg-c-blue' : 'feather icon-clipboard bg-c-blue'; $title = isset($title) ?
$title : 'Empty Name'; 
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.front-end.header') @yield('header-src')
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

            <div class="pcoded-main-container ">



                <!-- Main-body start -->
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- Page body start -->
                        <div class="page-body">
                            <div class="row">
                                <div class="col-sm-12">
                                     @yield('content')
                                </div>
                            </div>
                        </div>
                        <!-- Page body end -->
                    </div>
                </div>
                <!-- Main-body end -->


                <!-- [ style Customizer ] start -->
                <div id="styleSelector">
                </div>
                <!-- [ style Customizer ] end -->

            </div>
        </div>
    </div>
    @include('layouts.front-end.footer') {{--
    @include('layouts.message.notification')
    @include('layouts.message.delete-popup')
    --}} @yield('footer-src')



</body>

</html>