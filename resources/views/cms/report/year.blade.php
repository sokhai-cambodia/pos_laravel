@extends('layouts.cms.template', compact('title','icon'))
@include('cms.report.header')
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
        {{--
        <h5>{{ $title }}</h5>
        --}}
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <select class="browser-default custom-select">
                    <option selected>Short By</option>
                    <option value="3">Daily</option>
                    <option value="1">Month</option>
                    <option value="2">Year</option>
                </select>
            </div>
            <div class="col-md-10 offset-4">
                <div class="row offset-4">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">
                                <button id="export_pdf" class="btn waves-effect waves-light hor-grd btn-grd-light ">PDF<i class="fas fa-file-pdf" style="margin-left:10px;"></i></button>
                            </div>
                            <div class="col-md-4">
                                <button id="export_excel" class="btn waves-effect waves-light hor-grd btn-grd-light ">Excel<i class="fas fa-file-exel" style="margin-left:10px;"></i></button>
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
        <div id="print_area">
            <table class="table" id="export_area">
                    <span class="my-2">Report for:<b>...</b></span>
                <thead>
                    <tr>
                        <th>Year</th>
                        <th>ID</th>
                        <th>Product</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @for($i = 1; $i <= 20; $i++)
                        <tr>
                            <td>Year</td>
                            <th>1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                    @endfor
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
@include('cms.report.footer')
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

        // https://www.jqueryscript.net/table/export-table-json-csv-txt-pdf.html?fbclid=IwAR3ZQ6gnktILOahyibt3Hm3YnEmDAalN8f2mz2CGg9QdzduniqqNSF1UyOk

        $("#export_excel").click(function(){
            $("#export_area").tableHTMLExport({
                // csv, txt, json, pdf
                type:'csv',

                // default file name
                filename: 'tableHTMLExport.csv',

                // for csv
                separator: ',',
                newline: '\r\n',
                trimContent: true,
                quoteFields: true,

                // CSS selector(s)
                ignoreColumns: '',
                ignoreRows: '',

                // your html table has html content?
                htmlContent: false,

                // debug
                consoleLog: false,

            });
        });

        $("#export_pdf").click(function(){
            $("#export_area").tableHTMLExport({

                // csv, txt, json, pdf
                type:'pdf',

                // file name
                filename:'sample.pdf'

            });
        });
    });
</script>
@endsection
