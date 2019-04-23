@extends('layouts.cms.template', compact('title','icon'))

@include('layouts.cms.data-table-header')

@section('content')
<style>
    .report_header {
        background: grey;
    }
</style>
<!-- Default ordering table start -->
<div class="card">
    <div class="card-header">
        Filter
    </div>
    <div class="card-block">
        <form  method="GET">
            <div class="form-group row">
                <div class='col-sm-3'>
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker1'>
                            <input type='date' class="form-control" name="date"/>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <select class="browser-default custom-select" name="user">
                        <option selected>Users</option>
                        <option value="1">User1</option>
                        <option value="2">User2</option>
                        <option value="3">User3</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                    <input type="text" name="product" class="form-control" value="{{ Request::get('product') }}" placeholder="Search Product">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div>
                        <input type="submit" class="btn btn-group btn-primary btn-sm" value="Search"/>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>
<div class="card">
    <div class="card-header">
        {{-- <h5>{{ $title }}</h5> --}}
    </div>

    <div class="container">
            <div class="row">
                    <div class="col-md-4">
                        <select class="browser-default custom-select">
                            <option selected>Users</option>
                            <option value="1">User1</option>
                            <option value="2">User2</option>
                            <option value="3">User3</option>
                        </select>
                    </div>
                    <div class="col-md-8">
                        <div class="row offset-3">
                            <div class="d-flex justify-content-between">
                                <div class="ml-2">
                                    <button class="btn btn-block btn-light border border-2 rounded">PDF</button>
                                </div>
                                <div class="ml-2">
                                    <button class="btn btn-block btn-light border border-2 rounded">Exel</button>
                                </div>
                                <div class="ml-2">
                                    <button class="btn btn-block btn-light border border-2 rounded">Print</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>


    <div class="card-block">

        {{-- Report --}}
        <div class="container">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Date</th>
                      <th scope="col">Room N<sub>o</sub>:</th>
                      <th scope="col">Employee</th>
                      <th scope="col">Category</th>
                      <th scope="col">Price</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Mark</td>
                      <td>Otto</td>
                      <td>@mdo</td>
                      <td>Otto</td>
                      <td>@mdo</td>
                      <td>Otto</td>
                    </tr>
                  </tbody>
                </table>
              </div>
        {{-- !end report --}}


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




