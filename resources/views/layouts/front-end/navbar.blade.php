@section('header-src')
<link rel="stylesheet" type="text/css" href="{{ asset('plugin/front-end/assets/css/order.css') }}">
@endsection
<style>

  .tables {
    border:1px solid black;
    padding: 70px 0px;
    margin:5px;
  }
  .navbar {
    /* min-height: 7rem; */
    background-color: #4271a0;
    color: #d1d1f0;
    justify-content: space-between;
}
</style>

<div class="container">
    <header class="fixed-top">
        <nav class="navbar navbar-expand-sm navbar-dark nav-bottom-shadow d-flex">
            <a><i class="fas fa-bars"><span class="pl-2">Setting</span></i></a>
            <a>Restaurant</a>
            <div class="float-right">
                <a class=" py-4 m-3"><i class="fas fa-user-circle"></i>Users</a>
                <a class="mr-3 py-4 ">Log-Out</a>
            </div>
        </nav>
    </header>
</div>
