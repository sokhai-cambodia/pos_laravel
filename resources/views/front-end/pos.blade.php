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
    tbody {
    display:block;
    height:85%;
    overflow-y:auto;
    overflow-x: hidden;
    margin-right: -15px;
    }
    thead, tbody tr {
    display:table;
    width:100%;
    table-layout:fixed;
    }
    thead {
    width: calc( 100% - 1em )
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
                <div class="m-2 ">
                    <h5 class="p-3">Invoice-No: {{ $room->room_no }}</h5>
                </div>
                <!---------------table invoice---------------->
                <table class="table" id="invoice-table">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 50px;">No</th>
                            <th >Name</th>
                            <th style="text-align: center" style="width: 50px;">Qty</th>
                            <th style="text-align: center">Price</th>
                            <th style="text-align: center">Total</th>
                            <th style="text-align: center" style="width: 50px;">Action</th>
                        </tr>
                    </thead>
                    <tbody class="type_of_invoice get_type_category">

                    </tbody>
                    <tfoot>
                        <!-- <tr>
                                <td colspan="2" class="calculate-detail"><i>Total</i></td>
                                <td colspan="2" class="calculate-payment">$<i>0777036</i></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="calculate-detail"><i>Discount</i></td>
                                <td colspan="2" class="calculate-payment">$<i>011111</i></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="calculate-detail"><i>Grand Total</i></td>
                                <td colspan="2" class="calculate-payment">$<i>0.111102222</i></td>
                            </tr> -->
                    </tfoot>
                </table>
                <!---------------#table invoice---------------->
            </div>
            <!---------------list_category---------------->
            <div class="col-md-2" id="category-list">
                <div class="mt-3 text-center ">
                    <div class="p-2">
                        <div class="md-form mt-0">
                            <input class="form-control" id="list-product" type="text" placeholder="Category" aria-label="Search">
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
                            <input class="form-control" type="text" placeholder="Product" aria-label="Search">
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
    <button id="get_button" type="button" class="btn btn-success btn-lg btn-invoice"><i class="far fa-money-bill-alt"></i>Pay</button>
    <button id="get_button" type="button" class="btn btn-warning btn-lg btn-invoice"><i class="far fa-money-bill-alt"></i>Pay Later</button>
    <button type="button" class="btn btn-secondary btn-lg btn-invoice"><i class="fas fa-print"></i>Print</button>
    <button type="button" class="btn btn-danger btn-lg btn-invoice"><i class="fas fa-window-close"></i>Close</button>
</div>
@endsection
@section('footer-src')
<script>


    function openNav() {
        document.getElementById("mySidebar").style.width = "100px";
        document.getElementById("main").style.marginRight = "100px";
    }

    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginRight = "0";
    }
// filter category
    $(function () {

        // Get Product List
        $('.get-category-list').click(function(){
            var category_id = $(this).attr('data-id');

            $.ajax({
                url: "{{ route('front-end.get-product-list') }}",
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
                    url: "{{ route('front-end.get-product') }}",
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
            return $result;
        }

        function generateInvoiceItemNo() {
            $('#invoice-table > tbody  > tr').each(function(ind, tr) {
                $(tr).find('.no').text(ind + 1);
            });
        }

    });
</script>
@endsection
