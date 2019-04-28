@extends('layouts.cms.template', compact('title','icon'))

@section('header-src')
    {{-- select2 css --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/cms/bower_components/select2/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/cms/bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/cms/bower_components/multiselect/css/multi-select.css') }}">
    {{-- !End select2 css --}}

    {{-- datepicker css --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/cms/assets/pages/advance-elements/css/bootstrap-datetimepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/cms/bower_components/bootstrap-daterangepicker/css/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/cms/bower_components/datedropper/css/datedropper.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/cms/bower_components/spectrum/css/spectrum.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/cms/bower_components/jquery-minicolors/css/jquery.minicolors.css') }}">
    {{-- !end datepicker css --}}

@endsection

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
                <div class="col-sm-3">
                   <div class="form-group">
                        <input id="dropper-default" class="form-control" type="text" placeholder="Select your date" name="date" value="{{ Request::get('date') }}"/>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <select  class="js-example-basic-multiple" multiple="single" style="width:100%;">
                            <option value="AL">Alabama</option>
                            <option value="WY">Doe</option>
                            <option value="WY">Coming</option>
                            <option value="WY">Hanry</option>
                            <option value="WY">John </option>
                        </select>

                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                    <input type="text" name="product" class="form-control" value="{{ Request::get('product') }}" placeholder="Search Product">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <button class="btn waves-effect waves-light hor-grd btn-grd-primary ">Search<i class="fas fa-search" style="margin-left:10px;"></i></button>
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
                    <div class="col-md-2">
                        <select class="browser-default custom-select">
                            <option selected>Users</option>
                            <option value="1">User1</option>
                            <option value="2">User2</option>
                            <option value="3">User3</option>
                        </select>
                    </div>
                    <div class="col-md-10 offset-4">
                        <div class="row offset-4">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        <button class="btn waves-effect waves-light hor-grd btn-grd-light ">PDF<i class="fas fa-file-pdf" style="margin-left:10px;"></i></button>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn waves-effect waves-light hor-grd btn-grd-light ">Excel<i class="fas fa-file-exel" style="margin-left:10px;"></i></button>
                                    </div>
                                    <div class="col-md-4">
                                        <button id="print_report" class="btn waves-effect waves-light hor-grd btn-grd-light ">Print<i class="fas fa-print" style="margin-left:10px;"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>


    <div class="card-block">

        {{-- Report --}}
        <div class="container" id="print_area">
                <table class="table"  style="width: 100%">
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

@section('footer-src')
{{-- select2 script --}}
<script src="{{ asset('plugin/cms/bower_components/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('plugin/cms/bower_components/bootstrap-multiselect/js/bootstrap-multiselect.js') }}"></script>
<script src="{{ asset('plugin/cms/bower_components/multiselect/js/jquery.multi-select.js') }}"></script>
<script src="{{ asset('plugin/cms/assets/js/jquery.quicksearch.js') }}"></script>
<script src="{{ asset('plugin/cms/assets/pages/advance-elements/select2-custom.js') }}"></script>

{{-- datepicker script --}}
<script src="{{ asset('plugin/cms/assets/pages/advance-elements/moment-with-locales.min.js') }}"></script>
<script src="{{ asset('plugin/cms/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('plugin/cms/assets/pages/advance-elements/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('plugin/cms/bower_components/bootstrap-daterangepicker/js/daterangepicker.js') }}"></script>
<script src="{{ asset('plugin/cms/bower_components/datedropper/js/datedropper.min.js') }}"></script>
<script src="{{ asset('plugin/cms/bower_components/spectrum/js/spectrum.js') }}"></script>
<script src="{{ asset('plugin/cms/bower_components/jscolor/js/jscolor.js') }}"></script>
<script src="{{ asset('plugin/cms/bower_components/jquery-minicolors/js/jquery.minicolors.min.js') }}"></script>
<script src="{{ asset('plugin/cms/assets/pages/advance-elements/custom-picker.js') }}"></script>
<script src="{{ asset('plugin/cms/assets/js/moment-with-locales.min.js') }}"></script>


<script>
$( document ).ready(function() {
    $("#print_report").click(function(){
        // https://www.jqueryscript.net/other/Print-Specified-Area-Of-A-Page-PrintArea.html
        $("#print_area").printArea({
            mode:"iframe",
            popTitle: 'Sample Print',
            popClose: true,
        });
    });
});
</script>
@endsection



