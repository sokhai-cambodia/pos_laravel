@extends('layouts.cms.template', compact('title','icon'))

@section('header-src')
<style>
    .report_header {
    background: grey;
    }
   
</style>
@endsection

@section('content')
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
                        <select class="form-control" name=branch>
                            <option value="">All Branch</option>
                            @foreach ($branches as $branch)
                                <option value="{{ $branch->id }}" {{ UtilHelper::selected($branch->id, $f_branch) }}>{{ $branch->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                    
                <div class="col-sm-3">
                    <div class="form-group">
                        <select class="browser-default custom-select" name="stock_type">
                                <option value="">All Stock Type</option>
                                @foreach ($stockTypes as $sKey => $sVal)
                                    <option value="{{ $sKey }}" {{ UtilHelper::selected($sKey, $f_stock_type) }}>{{ $sVal }}</option>
                                @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <input class="form-control date" type="text" placeholder="Select your date" name="start_date" value="{{ $f_start_date }}"/>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <input class="form-control date" type="text" placeholder="Select your date" name="end_date" value="{{ $f_end_date }}"/>
                    </div>
                </div>
                <div class="col-sm-2">
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
            <div class="col-sm-4 col-sm-offset-8">
                <button id="export_pdf" class="btn waves-effect waves-light hor-grd btn-grd-light ">PDF<i class="fas fa-file-pdf" style="margin-left:10px;"></i></button>
                <button id="export_excel" class="btn waves-effect waves-light hor-grd btn-grd-light ">Excel<i class="fas fa-file-exel" style="margin-left:10px;"></i></button>
                <button id="print_report" class="btn waves-effect waves-light hor-grd btn-grd-light ">Print<i class="fas fa-print" style="margin-left:10px;"></i></button>
            </div>
        </div>
    </div>
    <div class="card-block">
        {{-- Report --}}
        <div id="print_area">
            <div class="text-center">
                <h3>Stock Report</h3>
                <h4>From {{ $f_start_date }} to {{ $f_end_date }}</h4>
                <h4>Type: {{ $f_stock_type == '' ? 'All Type' : $stockTypes[$f_stock_type] }}</h4>
                <h4>Branch: {{ $f_branch == '' ? 'All Branch' : $branch->name }}</h4>
                
            </div>
            <table class="table" id="export_area">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Date:</th>
                        <th>Type</th>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>By User</th>
                    </tr>
                </thead>
                <tbody>
                    @php 
                        $i = 1;
                    @endphp
                    @foreach ($stocks as $stock)
                        <tr>
                            <th>{{ $i++ }}</th>
                            <td>{{ $stock->date }}</td>
                            <td>{{ $stock->type }}</td>
                            <td>{{ $stock->name }}</td>
                            <td>{{ $stock->quantity }}</td>
                            <td>{{ $stock->fullName }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- !end report --}}
        {{-- pagenation --}}
        <nav aria-label="Page navigation example">
            {{ $stocks->appends(request()->input())->links() }}
        </nav>
        {{--! end pagenation --}}
    </div>
</div>
<!-- Default ordering table end -->
@endsection
@section('footer-src')
<script>
    $( document ).ready(function() {

        $('.date').datepicker({  

            format: 'yyyy-mm-dd'

        });  

        $("#print_report").click(function(){
            // https://www.jqueryscript.net/other/Print-Specified-Area-Of-A-Page-PrintArea.html
            $("#print_area").printArea({
                mode: "popup", //"iframe", "popup"
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
