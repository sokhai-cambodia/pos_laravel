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
                        <h5 class="p-3">Invoice-No: 1</h5>
                    </div>
                    <!---------------table invoice---------------->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Pri</th>
                                <th scope="col">Qua</th>
                                <th scope="col">Total</th>
                            </tr>​​​​​​​​​​​​​​​
                        </thead>
                        <tbody class="type_of_invoice get_type_category">
                            <!-- <tr >
                                <th scope="row">1</th>
                                <td>Markaf fasef fee</td>
                                <td>Ottsdfsdfo</td>
                                <td>@mdeefefd esfo</td>
                            </tr> -->
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
                        </tbody>
                    </table>
                    <!---------------#table invoice---------------->
                </div>

                <!---------------list_category---------------->
                <div class="col-md-2" id="category-list">
                    <div class="m-2 text-center ">
                        <h5 class="p-3">Category:</h5 class="p-3" cla>
                    </div>
                    <div class="category" id="category-list-overflow">
                        <div class="d-flex flex-column" id="list_category">
                        </div>
                    </div>
                </div>
                <!---------------#list_category---------------->

                <!---------------type_list_category---------------->
                <div class="col-md-6" id="product-list">
                    <div class="m-2 text-center ">
                        <h5 class="p-3">Type of Category:</h5 class="p-3">
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
        <button id="get_button" type="button" class="btn btn-success btn-lg btn-invoice"><i class="far fa-money-bill-alt"></i>Paid</button>
        <button id="get_button" type="button" class="btn btn-success btn-lg btn-invoice">PayLetter</button>
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
        $(function () {


            //---------type_list_category function
            function load_type_of_category(rowCount) {
                var type_of_category =
                    `
                        <div class=" col-sm-4 col-md-4">
                            <div class="card  tables">
                                <img class="card-img-top" src="{{ asset('plugin/front-end/image/food4.jpg') }}" alt="Card image" style="width:100%">
                                <div class="text-center">
                                    <span>fried rice with chicken</span>
                                </div>
                            </div>
                        </div>
                    `;
                var html_tag = '';
                for (var i = 0; i < rowCount; i++) {
                    html_tag += type_of_category;
                }
                $('#type_of_category').append(html_tag);
            }
            function load_invoice(rowCount) {
                var type_of_invoice =
                    `
                        <tr >
                            <th scope="row">1</th>
                            <td>Markaf fasef fee</td>
                            <td>Ottsdfsdfo</td>
                            <td>@mdeefefd esfo</td>
                        </tr>
                    `;
                var html_tag = '';
                for (var i = 0; i < rowCount; i++) {
                    html_tag += type_of_invoice;
                }
                $('.type_of_invoice').append(html_tag) + `<tr>
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
                                    </tr>`;
            }

            //---------#type_list_category function



            //---------list_category function
            function load_list_category(rowCount) {
                var list_category =
                    `
                        <div class="card tables get-category-list">
                            <img class="card-img-top" src="{{ asset('plugin/front-end/image/food4.jpg') }}" alt="Card image" style="width:100%">
                            <div class="text-center">
                                <span>chicken</span>
                            </div>
                        </div>`;
                var html_tag = '';
                for (var i = 0; i < rowCount; i++) {
                    html_tag += list_category;
                }
                $('#list_category').append(html_tag);
            }

            //---------#list_category function

            load_list_category(10);

            //--------call load_type_of_category function
            // load_type_of_category(2);

            // load_invoice();


            //-------function add clicked category to add list category
            $('.get-category-list').click(function () {
                document.getElementsByClassName('set_item') == load_type_of_category(20);
            });


            //------ function add clicked type_category to invoice
            $('.set_item').click(function () {
                document.getElementsByClassName('get_type_category') == load_invoice(1);
            })
        });
    </script>
@endsection
