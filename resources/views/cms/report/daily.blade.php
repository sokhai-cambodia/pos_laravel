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
                        <select class="form-control" name='branch'>
                            <option value="">All Branch</option>
                            @foreach ($branches as $branch)
                                <option value="{{ $branch->id }}" {{ UtilHelper::selected($branch->id, $f_branch) }}>{{ $branch->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <select class="form-control" name='room'>
                            <option value="">All Room</option>
                            @foreach ($rooms as $room)
                                <option value="{{ $room->id }}" {{ UtilHelper::selected($room->id, $f_room) }}>{{ $room->room_no }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="form-group">
                        <input class="form-control date" type="text" placeholder="Select your date" name="date" value="{{ $f_date }}"/>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Invoice No" name="invoice_no" value="{{ $f_invoice_no }}"/>
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
            <table class="table" id="export_area">
                <span class="my-2">Report for:<b>...</b></span>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Date</th>
                        <th>Branch</th>
                        <th>Room</th>
                        <th>Invoice No</th>
                        <th>Sub Total</th>
                        <th>Discount</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php 
                        $i = 1;
                    @endphp
                    @foreach ($invoices as $invoice)
                        <tr>
                            <th>{{ $i++ }}</th>
                            <td>{{ $invoice->date }}</td>
                            <td>{{ $invoice->branch_name }}</td>
                            <td>{{ $invoice->room_no }}</td>
                            <td>{{ $invoice->invoice_id }}</td>
                            <td>{{ $invoice->sub_total }}</td>
                            <td>{{ $invoice->discount }}</td>
                            <td>{{ $invoice->total }}</td>
                            <td>Action</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- !end report --}}
        {{-- pagenation --}}
        <nav aria-label="Page navigation example">
            {{ $invoices->appends(request()->input())->links() }}
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
        
        $('.date').datepicker({  
            format: 'yyyy-mm-dd'
        });  
        
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
