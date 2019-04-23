@extends('layouts.cms.template', compact('title','icon'))

@include('layouts.cms.data-table-header')

@section('content')
<!-- Default ordering table start -->
<div class="card">
    <div class="card-header">
        {{-- <h5>{{ $title }}</h5> --}}
    </div>


    <div class="card-block">
        {{-- search box --}}
        <div class="container ">
            <div class="row float-right">
                <div class="col-xs-8 col-xs-offset-2">
                    <div class="input-group">
                        <div class="input-group-btn search-panel">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span id="search_concept">Filter by</span> <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li class="pl-3"><a href="{{ route('report.daily') }}">Daily</a></li>
                                <li class="pl-3"><a href="{{ route('report.month') }}">By Monthly</a></li>
                                <li class="pl-3"><a href="{{ route('report.year') }}">By Year</a></li>
                            </ul>
                        </div>
                        <input type="hidden" name="search_param" value="all" id="search_param">
                        <input type="text" class="form-control" name="x" placeholder="Search term...">
                        <span class="input-group-btn">
                            {{-- <button class="btn btn-block btn-default" type="button"><i class="fas fa-search"></i></button> --}}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        {{-- !end search box --}}
        <div class="dt-responsive table-responsive">
            <table id="listing" class="table table-striped table-bordered nowrap" style="width: 100%">
                <thead class="bg-info">
                    <tr>
                        <th>ID</th>
                        <th>Invoice No</th>
                        <th>Product</th>
                        <th>Category</th>
                        <th>Quantiry</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Order Date</th>
                        <th>Employee</th>
                        <th>Customer</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>000</td>
                        <td>000</td>
                        <td>Sanwadawd idch</td>
                        <td>Food</td>
                        <td>2</td>
                        <td>3.00</td>
                        <td>6.00</td>
                        <td>11/02/2019</td>
                        <td>Dan</td>
                        <td>Room S2</td>
                    </tr>
                    <tr>
                        <td>000</td>
                        <td>000</td>
                        <td>Sanwadawd idch</td>
                        <td>Food</td>
                        <td>2</td>
                        <td>3.00</td>
                        <td>6.00</td>
                        <td>11/02/2019</td>
                        <td>Dan</td>
                        <td>Room S2</td>
                    </tr>
                    <tr>
                        <td>000</td>
                        <td>000</td>
                        <td>Sanwadawd idch</td>
                        <td>Food</td>
                        <td>2</td>
                        <td>3.00</td>
                        <td>6.00</td>
                        <td>11/02/2019</td>
                        <td>Dan</td>
                        <td>Room S2</td>
                    </tr>
                </tbody>
            </table>
        </div>
{{-- pagenation --}}
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
{{--! end pagenation --}}

    </div>
</div>
<!-- Default ordering table end -->
@endsection

@section('footer-src')
    @include('layouts.cms.data-table-footer')
@endsection

