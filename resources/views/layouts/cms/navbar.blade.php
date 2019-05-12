<nav class="pcoded-navbar">
    <div class="nav-list">
        <div class="pcoded-inner-navbar main-menu">
            <div class="pcoded-navigation-label">Dashboard</div>
            <ul class="pcoded-item pcoded-left-item">

                <li class="">
                    <a href="{{ route('cms') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="feather feather icon-home"></i>
                        </span>
                        <span class="pcoded-mtext">Dashboard</span>
                    </a>

                </li>


            </ul>
            <div class="pcoded-navigation-label">Menu Item</div>
            <ul class="pcoded-item pcoded-left-item">
                {{-- Branch --}}
                <li class="pcoded-hasmenu">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                        <span class="pcoded-mtext">Branch</span>
                        {{-- <span class="pcoded-badge label label-warning">NEW</span> --}}
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="">
                            <a href="{{ route('branch.create') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Add Branch</span>
                            </a>
                        </li>
                        <li class=" ">
                            <a href="{{ route('branch') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">List Branch</span>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Unit --}}
                <li class="pcoded-hasmenu">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                        <span class="pcoded-mtext">Unit</span>
                        {{-- <span class="pcoded-badge label label-warning">NEW</span> --}}
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="">
                            <a href="{{ route('unit.create') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Add Unit</span>
                            </a>
                        </li>
                        <li class=" ">
                            <a href="{{ route('unit') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">List Unit</span>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- User --}}
                <li class="pcoded-hasmenu">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                        <span class="pcoded-mtext">User</span>
                        {{-- <span class="pcoded-badge label label-warning">NEW</span> --}}
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="">
                            <a href="{{ route('user.create') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Add User</span>
                            </a>
                        </li>
                        <li class=" ">
                            <a href="{{ route('user') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">List User</span>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Role --}}
                <li class="pcoded-hasmenu">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                        <span class="pcoded-mtext">Role</span>
                        {{-- <span class="pcoded-badge label label-warning">NEW</span> --}}
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="">
                            <a href="{{ route('role.create') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Add Role</span>
                            </a>
                        </li>
                        <li class=" ">
                            <a href="{{ route('role') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">List Role</span>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Category --}}
                <li class="pcoded-hasmenu">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                        <span class="pcoded-mtext">Category</span>
                        {{-- <span class="pcoded-badge label label-warning">NEW</span> --}}
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="">
                            <a href="{{ route('category.create') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Add Category</span>
                            </a>
                        </li>
                        <li class=" ">
                            <a href="{{ route('category') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">List Category</span>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Product --}}
                <li class="pcoded-hasmenu">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                        <span class="pcoded-mtext">Product</span>
                        {{-- <span class="pcoded-badge label label-warning">NEW</span> --}}
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="">
                            <a href="{{ route('product.create') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Add Product</span>
                            </a>
                        </li>
                        <li class=" ">
                            <a href="{{ route('product') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">List Product</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="pcoded-hasmenu">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                        <span class="pcoded-mtext">Rooms</span>
                        {{-- <span class="pcoded-badge label label-warning">NEW</span> --}}
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="">
                            <a href="{{ route('room.create') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Add Room</span>
                            </a>
                        </li>
                        <li class=" ">
                            <a href="{{ route('room') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">List Room</span>
                            </a>
                        </li>
                    </ul>
                </li>
               


            </ul>
            {{-- Stock Main Menu --}}
            <div class="pcoded-navigation-label">Stock</div>
            <ul class="pcoded-item pcoded-left-item">
                {{-- report --}}
                <li class="pcoded-hasmenu">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                        <span class="pcoded-mtext">Stock</span>
                        {{-- <span class="pcoded-badge label label-warning">NEW</span> --}}
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="">
                            <a href="{{ route('stock.stock-in') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Stock In</span>
                            </a>
                        </li>
                        <li class=" ">
                            <a href="{{ route('stock.transfer-stock') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Transfer Stock</span>
                            </a>
                        </li>
                        <li class=" ">
                            <a href="{{ route('stock.wasted') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Wasted Stock</span>
                            </a>
                        </li>
                        <li class=" ">
                            <a href="{{ route('stock.adjust') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Adjust Stock</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            {{-- Report Main Menu --}}
            <div class="pcoded-navigation-label">Report</div>
            <ul class="pcoded-item pcoded-left-item">
                {{-- report --}}
                <li class="pcoded-hasmenu">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                        <span class="pcoded-mtext">Report</span>
                        {{-- <span class="pcoded-badge label label-warning">NEW</span> --}}
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="">
                            <a href="{{ route('report.stock') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Stock Report</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{ route('report.daily') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Daily Report</span>
                            </a>
                        </li>
                        <li class=" ">
                            <a href="{{ route('report.month') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Report by Month</span>
                            </a>
                        </li>
                        <li class=" ">
                            <a href="{{ route('report.year') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Report by Year</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            {{-- Permission Main Menu --}}
            <div class="pcoded-navigation-label">Permission</div>
            <ul class="pcoded-item pcoded-left-item">
                {{-- Permission --}}
                <li class="pcoded-hasmenu">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                        <span class="pcoded-mtext">Permission</span>
                        {{-- <span class="pcoded-badge label label-warning">NEW</span> --}}
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="">
                            <a href="{{ route('permission.create') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Add Permission</span>
                            </a>
                        </li>
                        <li class=" ">
                            <a href="{{ route('permission') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">List Permission</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
