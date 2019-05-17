@extends('layouts.front-end.template')
@section('header-src')
<style>
    .container {
        margin-top:70px;
    }
    .print-invoice {
        font-size: 12px;
        min-width: 350px;
        max-width: 350px;
        padding:20px;
        height: 500px;
        overflow-y: scroll;
    }
    th, td {
        text-align: center;
    }
    hr{
        border: 2px solid gray;
        border-radius: 3px;
    }
</style>
@endsection

@section('content')
<div class="container">
    {{-- Navbar --}}
    @include('layouts.front-end.navbar')
    {{-- #Narbar --}}
    <div style="height:100%; position:relative">
        <div id="print_area" class="m-auto print-invoice">
            {{-- logo and header --}}
            <div class="text-center">
                <div >
                    <img class=" mx-2 logo" src="http://localhost:8000/plugin/front-end/image/logo.jpg" alt="">
                    <span >Koh Andet Eco Resort</span>
                </div>
                <small>Tatai District, Koh Kong Province, Cambodia</small>
            </div>
            <hr>
            {{-- invoice info --}}
            <div class="form">
                <div class="d-flex justify-content-around">
                    <div><div class="form-group">
                            <label for="date">Date : </label>
                            <span>Date</span>
                        </div>
                        <div class="form-group">
                            <label for="cashier">Cashier : </label>
                            <span>Cashier</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="invoice_id">Invoice-ID : </label>
                        <span>Invoice-ID</span>
                    </div>
                </div>


            </div>
            <hr>
            {{-- table invoice --}}
            <table class="table table-sm mb-2">
                <thead>
                <tr>
                    <th scope="col">Des</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Pri</th>
                    <th scope="col">Total</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th>1</th>
                    <td>1</td>
                    <td>1</td>
                    <td>@1</td>
                </tr>
                <tr>
                    <th>1</th>
                    <td>1</td>
                    <td>1</td>
                    <td>@1</td>
                </tr>
                </tbody>
            </table>
            <hr>
            {{-- Calculate product price  --}}
            <div class="form text-right">
                    <div class="form-group">
                        <label for="sub-total">Sub-Total : </label>
                        <span>Sub-Total</span>
                    </div>
                    <div class="form-group">
                        <label for="discount">Discount : </label>
                        <span>Discount</span>
                    </div>
                    <div class="form-group">
                        <label for="Total">Total : </label>
                        <span>Total</span>
                    </div>
                </div>
            {{-- footer --}}
            <div class="footer mt-4 text-center">
                <div>

                    <span>THANK YOU<br/>
                        ENJOY YOUR JOURNEY
                    </span>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('footer-src')
@endsection
