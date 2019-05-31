<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <title>POS Receipt Template Html Css</title>
        <style>
            #invoice-POS {
            /* box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); */
            padding: 2mm;
            margin: 0 auto;
            /* width: 44mm; */
            width: 70mm;
            background: #FFF;
            }
            #invoice-POS ::selection {
            background: #f31544;
            color: black;
            }
            #invoice-POS ::moz-selection {
            background: #f31544;
            color: black;
            }
            #invoice-POS h1 {
            font-size: 1.5em;
            color: black;
            }
            #invoice-POS h2 {
            font-size: .9em;
            }
            #invoice-POS h3 {
            font-size: 1.2em;
            font-weight: 300;
            line-height: 2em;
            }
            #invoice-POS p {
            font-size: .7em;
            color: black;
            line-height: 1.2em;
            }
            #invoice-POS #top, #invoice-POS #mid, #invoice-POS #bot {
            /* Targets all id with 'col-' */
            border-bottom: 1px solid #EEE;
            }
            #invoice-POS #top {
            min-height: 100px;
            }
            #invoice-POS #mid {
            min-height: 80px;
            }
            #invoice-POS #bot {
            min-height: 50px;
            }
            
            #invoice-POS .info {
            display: block;
            margin-left: 0;
            }
            #invoice-POS .title {
            float: right;
            }
            #invoice-POS .title p {
            text-align: right;
            }
            #invoice-POS table {
            width: 100%;
            border-collapse: collapse;
            }
            #invoice-POS .tabletitle {
            font-size: .6em;
            color: black;
            background: #EEE;
            }
            #invoice-POS .service {
            border-bottom: 1px solid #EEE;
            }
            #invoice-POS .item {
            width: 35mm;
            }
            #invoice-POS .itemtext {
            font-size: .6em;
            color: black;
            }
            #invoice-POS #legalcopy {
            margin-top: 5mm;
            }
        </style>
    </head>
    <body>
        <div id="invoice-POS">
            <center id="top">
                <div class="logo">
                    <img  src="{{ asset(FileHelper::getInvoiceLogo()) }}"  style="width: 60px; height: 60px;">
                </div>
                <div class="info">
                    <h2>Koh Andet Eco Resort</h2>
                    <p>Tatai District, Koh Kong Province, Cambodia</p>
                </div>
                <!--End Info-->
            </center>
            <!--End InvoiceTop-->
            <div id="mid">
                <div class="info">
                    <!-- <h2>Contact Info</h2> -->
                    <p> 
                        Date: {{ $invoice->created_at }}</br>
                        Cashier: {{ $invoice->userCreatedBy->getFullName() }}</br>
                        Invoice-No: {{ $invoice->invoice_no }}</br>
                    </p>
                </div>
            </div>
            <hr>
            <!--End Invoice Mid-->
            <div id="bot">
                <div id="table">
                    <table>
                        <tr class="tabletitle">
                            <td class="item">
                                <h2>Item</h2>
                            </td>
                            <td class="Hours">
                                <h2>Qty</h2>
                            </td>
                            <td class="Rate">
                                <h2>Price</h2>
                            </td>
                            <td class="Rate">
                                <h2>Total</h2>
                            </td>
                            
                        </tr>
                        @foreach ($invoice_details as $invoice_detail)
                        <tr class="service">
                            <td class="tableitem">
                                <p class="itemtext">{{ $invoice_detail->product_name }}</p>
                            </td>
                            <td class="tableitem">
                                <p class="itemtext">{{ $invoice_detail->quantity }}</p>
                            </td>
                            <td class="tableitem">
                                <p class="itemtext">{{ $invoice_detail->price }}</p>
                            </td>
                            <td class="tableitem">
                                <p class="itemtext">{{ $invoice_detail->total }}</p>
                            </td>
                        </tr>
                        @endforeach
                        
                        <tr class="service">
                                <td class="tableitem">
                                    <b class="itemtext"></b>
                                </td>
                                <td class="tableitem">
                                    <b class="itemtext"></b>
                                </td>
                            <td class="tableitem">
                                <b class="itemtext">Sub Total</b>
                            </td>
                            <td class="tableitem">
                                <b class="itemtext">{{ $invoice->sub_total }}</b>
                            </td>
                        </tr>
                        <tr class="service">
                                <td class="tableitem">
                                    <b class="itemtext"></b>
                                </td>
                                <td class="tableitem">
                                    <b class="itemtext"></b>
                                </td>
                            <td class="tableitem">
                                <b class="itemtext">Discount</b>
                            </td>
                            <td class="tableitem">
                                <b class="itemtext">{{ $invoice->discount }}</b>
                            </td>
                        </tr>
                        <tr class="service">
                                <td class="tableitem">
                                    <b class="itemtext"></b>
                                </td>
                                <td class="tableitem">
                                    <b class="itemtext"></b>
                                </td>
                            <td class="tableitem">
                                <b class="itemtext">Total</b>
                            </td>
                            <td class="tableitem">
                                <b class="itemtext">{{ $invoice->total }}</b>
                            </td>
                        </tr>
                    </table>
                    
                </div>
                
                <!--End Table-->
                <div id="legalcopy">
                    <p class="legal">
                        <strong>THANK YOU AND ENJOY YOUR JOURNEY!</strong>
                        
                    </p>
                </div>
            </div>
            <!--End InvoiceBot-->
        </div>
        <!--End Invoice-->
    </body>
</html>