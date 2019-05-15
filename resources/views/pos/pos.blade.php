@extends('layouts.front-end.template')
@section('header-src')
<style>
    body,
    html {
    height: 100%;
    cursor: pointer;
    }
    #main {
    height: 90%;
    z-index: -999;
    }
    #main-menu {
    height: 10%;
    }
    #pos-content {
    height: 89%;
    overflow-y: hidden;
    overflow-x: hidden;
    }
    #invoice-menu {
    height: 10%;
    overflow-y: scroll;
    overflow-x: hidden;
    }
    #product-list {
    height: 100%;
    margin-left: -15px;
    }
    #product-list-overflow {
    height: 95%;
    overflow-y: scroll;
    overflow-x: hidden;
    }
    #pos-row {
    height: 93%;
    }
    .full-height {
    height: 100% !important;
    }
    /* overflow table invoice  */
    .table {
    width: 100%;
    overflow-y: scroll;
    overflow-x: hidden;
    }
    thead, tbody {
    display:block;
    }
    thead, tfoot, tbody tr {
    display:table;
    /* width:100%; */
    /* table-layout:fixed; */
    }
    thead, tfoot {
    width: calc( 100% - 1em )
    }
    tbody {
    display: block;
    min-height:100%;
    overflow-y:auto;
    overflow-x: hidden;
    /* margin-right: -15px; */
    }
    /* total invoice */
    .totalInvoice {
    text-align: right;
    }
    .tableBodyScroll tbody {
    display: block;
    max-height: 320px;
    min-height: 320px;
    margin-bottom: 10px;
    overflow-y: scroll;
    }
    .tableBodyScroll thead,
    tbody tr {
    display: table;
    width: 100%;
    table-layout: fixed;
    }
    .bottomFooter {
    position: absolute;
    width: 100%;
    bottom: -8%;
    left: 0;
    padding: 1em
    }
</style>
@endsection
@section('content')
<div id="main">
    {{-- Navbar --}}
    @include('layouts.front-end.navbar')
    {{-- #Narbar --}}
    <div class="container-fluid" id="pos-content">
        <div class="row" id="pos-row">
            <div class="col-12 col-sm-4 col-md-4" id="">
                <form action="{{ route('pos.store') }}" method="POST" id="POSfrm">
                    @csrf
                    <!-- button Modal -->
                    <div class="modal fade" id="invoice_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Invoice Infomation</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="pay_type" name="pay_type" value="unpaid" readonly>
                                        <label for="total" class="col-form-label">Sub Total:</label>
                                        <input type="number" class="form-control" id="sub_total" name="sub_total" value="0" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="discount" class="col-form-label">Discount:</label>
                                        <input type="number" class="form-control" id="discount" name="discount" value="0" min="0" step="0.01">
                                    </div>
                                    <div class="form-group">
                                        <label for="sub_total" class="col-form-label">Total:</label>
                                        <input type="number" class="form-control" id="total" name="total" value="0" min="0" step="0.01" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="cash_recieve" class="col-form-label">Case Recieve :</label>
                                        <input type="number" class="form-control" id="cash_recieve" name="cash_recieve" value="0" min="0" step="0.01">
                                    </div>
                                    <div class="form-group">
                                        <label for="cash_return" class="col-form-label">Case Return :</label>
                                        <input type="number" class="form-control" id="cash_return" name="cash_return" value="0" min="0" step="0.01" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="note" class="col-form-label">note</label>
                                        <textarea class="form-control" id="note" name="note"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" id="pay_btn" class="btn btn-primary">Pay</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-2 ">
                        <h5 class="p-3">Invoice-No: {{ $room->room_no }}</h5>
                        <input type="hidden" name="room_id" value="{{ $room->id }}">
                    </div>
                    <!---------------table invoice---------------->
                    <table class="table tableBodyScroll" id="invoice-table" style="overflow-y:scroll;height:100%;position:relative;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="type_of_invoice get_type_category">
                        </tbody>
                        <tfoot class="bottomFooter">
                            <tr>
                                <td colspan="2" class="totalInvoice"><b>Sub-Total : </b></th>
                                <td><i id="totalPrice">$00.00</i></th>
                            </tr>
                        </tfoot>
                    </table>
                </form>
                <!---------------#table invoice---------------->
            </div>
            <!---------------list_category---------------->
            <div class="col-md-2" id="category-list">
                <div class="mt-3 text-center ">
                    <div class="p-2">
                        <div class="md-form mt-0">
                            <input class="form-control" name="search_category" id="search_category" type="text" placeholder="Category" aria-label="Search">
                        </div>
                    </div>
                </div>
                <div class="category" id="category-list-overflow">
                    <div class="d-flex flex-column" id="list_category">
                        @foreach ($categories as $category)
                        <div class="card tables get-category-list" data-id="{{ $category->id }}">
                            <img class="card-img-top" src="{{ $category->getPhoto() }}" alt="Card image" style="width:100%; height:150px">
                            <div class="text-center">
                                <span>{{ $category->name }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!---------------#list_category---------------->
            <!---------------type_list_category---------------->
            <div class="col-md-6" id="product-list">
                <div class="mt-3 text-center ">
                    <div class="p-2">
                        <div class="md-form mt-0">
                            <input class="form-control" type="text"  name="product" placeholder="Product" aria-label="Search">
                        </div>
                    </div>
                </div>
                <div class="category" id="product-list-overflow">
                    <div class="row set_item " id='type_of_category'>
                    </div>
                </div>
            </div>
            <!---------------#type_list_category---------------->
        </div>
    </div>
</div>
<div class="button">
    <!-- pay button popup trigger modal-->
    <button type="button" class="btn btn-success btn-lg btn-invoice" id="btn-pay-invoice">
        <i class="far fa-money-bill-alt"></i>Pay
    </button>
    {{-- !pay button popup --}}
    <button type="button" class="btn btn-warning btn-lg btn-invoice" id="btn-unpay-invoice">
        <i class="far fa-money-bill-alt"></i>Pay Later
    </button>
    <button type="button" class="btn btn-secondary btn-lg btn-invoice">
        <i class="fas fa-print"></i>Print
    </button>
    <button type="button" class="btn btn-danger btn-lg btn-invoice">
        <i class="fas fa-window-close"></i>Close
    </button>
</div>
@endsection
@section('footer-src')
<script>
    // filter searchX category
        $(function () {
            // // submit form
    
            $("#pay_btn").click(function(){
                $("#POSfrm").submit();
            });
    
    
            // Get Product List
            $('.get-category-list').click(function(){
                var category_id = $(this).attr('data-id');
    
                $.ajax({
                    url: "{{ route('pos.get-product-list') }}",
                    type: 'get',
                    dataType: "json",
                    data: {
                        category_id: category_id
                    },
                    success: function( data ) {
                        if(data.status == 1) {
                            $('#type_of_category').html(data.data);
                        }
                    }
                });
            });
    
            $('body').on('click', '.btn-delete', function() {
                var tr = $(this).closest('tr')
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3f51b5',
                    cancelButtonColor: '#ff4081',
                    confirmButtonText: 'Great ',
                    buttons: {
                        cancel: {
                            text: "Cancel",
                            value: null,
                            visible: true,
                            className: "btn btn-danger",
                            closeModal: true,
                        },
                        confirm: {
                            text: "OK",
                            value: true,
                            visible: true,
                            className: "btn btn-primary",
                            closeModal: true
                        }
                    }
                }).then((result) => {
                    if (result) {
                        tr.remove();
                        generateInvoiceItemNo();
                    }
                })
            });
    
            $('body').on('click', '.product-list', function() {
                var product_id = $(this).attr('data-id');
                if(!existProduct(product_id)) {
                    $.ajax({
                        url: "{{ route('pos.get-product') }}",
                        type: 'get',
                        dataType: "json",
                        data: {
                            product_id: product_id
                        },
                        success: function( data ) {
                            if(data.status == 1) {
                                $('.type_of_invoice').append(data.data);
                                generateInvoiceItemNo();
                            }
                        }
                    });
                }
    
            });
    
            function existProduct(id) {
                $result = false;
                $('#invoice-table > tbody  > tr').each(function(ind, tr) {
                    var bookid = $(tr).find('.product_id').val();
                    if(bookid == id) {
                        var oldQty = $(tr).find('.qty').val() * 1 + 1;
                        var oldTotal = $(tr).find('.price').val() * oldQty;
                        $(tr).find('.qty').val(oldQty);
                        $(tr).find('.span_total').text(oldTotal);
                        $result = true;
                        return false;
                    }
                });
                calculateTotalPrices();
                return $result;
            }
    
            function generateInvoiceItemNo() {
                $('#invoice-table > tbody  > tr').each(function(ind, tr) {
                    $(tr).find('.no').text(ind + 1);
                    $(tr).find('.product_id').attr('name', 'invoice['+ ind +'][product_id]');
                    $(tr).find('.unit_id').attr('name', 'invoice['+ ind +'][unit_id]');
                    $(tr).find('.qty').attr('name', 'invoice['+ ind +'][qty]');
                    $(tr).find('.price').attr('name', 'invoice['+ ind +'][price]');
    
                });
                calculateTotalPrices();
            }
    
            // total prices
            function calculateTotalPrices() {
                var sub_total = 0;
                $('#invoice-table > tbody  > tr').each(function(ind, tr) {
                    var qty = $(tr).find('.qty').val();
                    var price = $(tr).find('.price').val();
                    qty = isNaN(qty) ? 0 : qty;
                    price = isNaN(price) ? 0 : price;
                    sub_total += (qty * price);
                });
    
                $("#totalPrice").text('$' + parseFloat(sub_total).toFixed(2));
                $("#sub_total").val(parseFloat(sub_total).toFixed(2));
                calculateInvoicePrice();
            }
    
            function calculateInvoicePrice() {
                var sub_total = $("#sub_total").val();
                var discount = $("#discount").val();
                var cash_recieve = $("#cash_recieve").val();
                
                var total = (100 - discount) / 100 * sub_total;
                var cash_return = cash_recieve - total;
    
                $("#total").val(total.toFixed(2));
                $("#cash_return").val(cash_return.toFixed(2));
            }
    
            $("#discount").keyup(function(){
                calculateInvoicePrice();
            });
    
            $("#cash_recieve").keyup(function(){
                calculateInvoicePrice();
            });

            $("#btn-pay-invoice").click(function(){
                $("#pay_type").val('paid');
                $('#invoice_modal').modal('show'); 
            });

            $("#btn-unpay-invoice").click(function(){
                $("#pay_type").val('unpaid');
                $('#invoice_modal').modal('show'); 
            });


            $('body').on('change', '.qty', function() {
                calculateTotalPrices();
            });
    
        });
</script>
@endsection