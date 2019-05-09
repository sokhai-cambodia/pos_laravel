
<style>
    .logo {
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }

    .logo-text {
        padding-top: 10px;
        font-size: 16px;
        color: white;
    }
</style>

<div class="container-fluid" style=" z-index: 999;" id="main-menu">
    <header class="fixed-top">
        <nav class="navbar navbar-expand-sm navbar-dark nav-bottom-shadow d-flex justify-content-between">
            <div id="collapse">
                <div class="d-flex justify-content-lg-start">
                    <img class=" mx-2 logo" src="{{ asset('plugin/front-end/image/logo.jpg') }}" alt="">
                    <span class="logo-text">Koh Andet Eco Resort</span>
                </div>
            </div>

            {{-- <a class="text-white">Restaurant</a> --}}
            <div class="float-right">
                <a class="py-4 m-3 text-white">
                    <i class="fas fa-user-circle"></i>
                    {{ Auth::user()->getFullName() }}
                </a>
                <a href="{{ route('pos.logout') }}" class="mr-3 py-4 text-white"><i class="fas fa-sign-out-alt"></i>Log-Out</a>
            </div>
        </nav>
    </header>
</div>
