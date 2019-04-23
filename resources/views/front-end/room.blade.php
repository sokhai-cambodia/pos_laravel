@extends('layouts.front-end.template')
@section('content')

<style>
    .scrollbar {
        height: 145px;
        width: 280px;
        background: grey;
        overflow-x: scroll;
        display: inline-flex;
        padding: 3px;
    }

    .scrollbar-item {
        height: 400px;
        width: 100%;
        float: left;
        background: white;
        overflow-y: scroll;
        display: inline-flex;
        margin-top: 10px;
        border-top: 2px solid darkorchid;

    }

    #style-1::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 1px rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        background-color: teal;
    }

    #style-1::-webkit-scrollbar {
        height: 5px;
    }

    #style-2::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 1px rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        background-color: black;
    }

    #style-2::-webkit-scrollbar {
        width: 5px;
    }


    /* scrollbar style */

    /* width */
    ::-webkit-scrollbar {
        width: 1px;
    }
</style>
<div class="row">
    <div class="col-sm-5">
        <div id="pos">
            <form action="https://spos.tecdiary.com/pos" id="pos-sale-form" method="post" accept-charset="utf-8">
                <input type="hidden" name="spos_token" value="4ee4b0c1e746977f85a2a1d356f96780">
                <div class="well well-sm" id="leftdiv">
                    <div id="lefttop" style="margin-bottom:5px;">
                        <div class="form-group" style="margin-bottom:5px;">
                            <div class="input-group">
                                <select name="customer_id" id="spos_customer" data-placeholder="Select Customer" required="required" class="form-control select2 select2-hidden-accessible" style="width:100%;position:absolute;" tabindex="-1" aria-hidden="true">
                                    <option value="1" selected="selected">Walk-in Client</option>
                                </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-spos_customer-container"><span class="select2-selection__rendered" id="select2-spos_customer-container" title="Walk-in Client">Walk-in Client</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                <div class="input-group-addon no-print" style="padding: 2px 5px;">
                                    <a href="#" id="add-customer" class="external" data-toggle="modal" data-target="#myModal"><i class="fa fa-2x fa-plus-circle" id="addIcon"></i></a>
                                </div>
                            </div>
                            <div style="clear:both;"></div>
                        </div>
                        <div class="form-group" style="margin-bottom:5px;">
                            <input type="text" name="hold_ref" value="" id="hold_ref" class="form-control kb-text" placeholder="Reference Note">
                        </div>
                        <div class="form-group" style="margin-bottom:5px;">
                            <input type="text" name="code" id="add_item" class="form-control ui-autocomplete-input" placeholder="Search product by code or name, you can scan barcode too" autocomplete="off">
                        </div>
                    </div>
                    <div id="printhead" class="print">
                        <p>Date: 20th April 2019</p>
                    </div>
                    <div id="print" class="fixed-table-container">
                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;">
                            <div id="list-table-div" style="overflow: hidden; width: auto; height: 0px;">
                                <div class="fixed-table-header">
                                    <table class="table table-striped table-condensed table-hover list-table" style="margin:0;">
                                        <thead>
                                            <tr class="success">
                                                <th>Product</th>
                                                <th style="width: 15%;text-align:center;">Price</th>
                                                <th style="width: 15%;text-align:center;">Qty</th>
                                                <th style="width: 20%;text-align:center;">Subtotal</th>
                                                <th style="width: 20px;" class="satu"><i class="fa fa-trash-o"></i></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <table id="posTable" class="table table-striped table-condensed table-hover list-table" style="margin:0px;" data-height="100">
                                    <thead>
                                        <tr class="success">
                                            <th>Product</th>
                                            <th style="width: 15%;text-align:center;">Price</th>
                                            <th style="width: 15%;text-align:center;">Qty</th>
                                            <th style="width: 20%;text-align:center;">Subtotal</th>
                                            <th style="width: 20px;" class="satu"><i class="fa fa-trash-o"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                            <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 267px;"></div>
                            <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
                        </div>
                        <div style="clear:both;"></div>
                        <div id="totaldiv">
                            <table id="totaltbl" class="table table-condensed totals" style="margin-bottom:10px;">
                                <tbody>
                                    <tr class="info">
                                        <td width="25%">Total Items</td>
                                        <td class="text-right" style="padding-right:10px;"><span id="count">0</span></td>
                                        <td width="25%">Total</td>
                                        <td class="text-right" colspan="2"><span id="total">0</span></td>
                                    </tr>
                                    <tr class="info">
                                        <td width="25%"><a href="#" id="add_discount">Discount</a></td>
                                        <td class="text-right" style="padding-right:10px;"><span id="ds_con">0</span></td>
                                        <td width="25%"><a href="#" id="add_tax">Order Tax</a></td>
                                        <td class="text-right"><span id="ts_con">0</span></td>
                                    </tr>
                                    <tr class="success">
                                        <td colspan="2" style="font-weight:bold;">
                                            Total Payable <a role="button" data-toggle="modal" data-target="#noteModal">
                                                <i class="fa fa-comment"></i>
                                            </a>
                                        </td>
                                        <td class="text-right" colspan="2" style="font-weight:bold;"><span id="total-payable">0</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="botbuttons" class="col-xs-12 text-center">
                        <div class="row">
                            <div class="col-xs-4" style="padding: 0;">
                                <div class="btn-group-vertical btn-block">
                                    <button type="button" class="btn btn-warning btn-block btn-flat" id="suspend">Hold</button>
                                    <button type="button" class="btn btn-danger btn-block btn-flat" id="reset">Cancel</button>
                                </div>
                            </div>
                            <div class="col-xs-4" style="padding: 0 5px;">
                                <div class="btn-group-vertical btn-block">
                                    <button type="button" class="btn bg-purple btn-block btn-flat" id="print_order">Print Order</button>
                                    <button type="button" class="btn bg-navy btn-block btn-flat" id="print_bill">Print Bill</button>
                                </div>
                            </div>
                            <div class="col-xs-4" style="padding: 0;">
                                <button type="button" class="btn btn-success btn-block btn-flat" id="payment" style="height:67px;">Payment</button>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <span id="hidesuspend"></span>
                    <input type="hidden" name="spos_note" value="" id="spos_note">
                    <div id="payment-con">
                        <input type="hidden" name="amount" id="amount_val" value="">
                        <input type="hidden" name="balance_amount" id="balance_val" value="">
                        <input type="hidden" name="paid_by" id="paid_by_val" value="cash">
                        <input type="hidden" name="cc_no" id="cc_no_val" value="">
                        <input type="hidden" name="paying_gift_card_no" id="paying_gift_card_no_val" value="">
                        <input type="hidden" name="cc_holder" id="cc_holder_val" value="">
                        <input type="hidden" name="cheque_no" id="cheque_no_val" value="">
                        <input type="hidden" name="cc_month" id="cc_month_val" value="">
                        <input type="hidden" name="cc_year" id="cc_year_val" value="">
                        <input type="hidden" name="cc_type" id="cc_type_val" value="">
                        <input type="hidden" name="cc_cvv2" id="cc_cvv2_val" value="">
                        <input type="hidden" name="balance" id="balance_val" value="">
                        <input type="hidden" name="payment_note" id="payment_note_val" value="">
                    </div>
                    <input type="hidden" name="customer" id="customer" value="1">
                    <input type="hidden" name="order_tax" id="tax_val" value="5%">
                    <input type="hidden" name="order_discount" id="discount_val" value="0">
                    <input type="hidden" name="count" id="total_item" value="">
                    <input type="hidden" name="did" id="is_delete" value="0">
                    <input type="hidden" name="eid" id="is_delete" value="0">
                    <input type="hidden" name="total_items" id="total_items" value="0">
                    <input type="hidden" name="total_quantity" id="total_quantity" value="0">
                    <input type="submit" id="submit" value="Submit Sale" style="display: none;">
                </div>
            </form>
        </div>
    </div>

    <div class="col-sm-7 ">
        <!-- category -->
        <div class="row">
            <div class="col-sm 11 scrollbar" id="style-1">
                <div class=" text-center border border-dark d-inline-block mr-1 bg-primary">
                    <img class="img " src="https://cdn.pastemagazine.com/www/articles/kfc%20canada%20double%20down%20main.jpg" height="100px" width="160px" alt="">
                    <h4 class=""><span>Cocacola</span></h4>

                </div>
                <div class="text-center border border-dark  d-inline-block mr-1 bg-primary">
                    <img class="img " src="https://cdn.pastemagazine.com/www/articles/kfc%20canada%20double%20down%20main.jpg" height="100px" width="160px" alt="">

                    <div class="bg-primary">
                        <h4><span>Cocacola</span></h4>
                    </div>
                </div>

                <div class="text-center border border-dark d-inline-block mr-1 bg-primary">
                    <img class="img " src="https://cdn.pastemagazine.com/www/articles/kfc%20canada%20double%20down%20main.jpg" height="100px" width="160px" alt="">

                    <div class="bg-primary">
                        <h4><span>Cocacola</span></h4>
                    </div>
                </div>


                <div class="text-center border border-dark  d-inline-block mr-1 bg-primary">
                    <img class="img " src="https://cdn.pastemagazine.com/www/articles/kfc%20canada%20double%20down%20main.jpg" height="100px" width="160px" alt="">

                    <div class="bg-primary">
                        <h4><span>Cocacola</span></h4>
                    </div>
                </div>

                <div class="text-center border border-dark d-inline-block mr-1 bg-primary ">
                    <img class="img " src="https://cdn.pastemagazine.com/www/articles/kfc%20canada%20double%20down%20main.jpg" height="100px" width="160px" alt="">

                    <div class="bg-primary">
                        <h4><span>Cocacola</span></h4>
                    </div>
                </div>

                <div class="text-center border border-dark  d-inline-block mr-1 bg-primary">
                    <img class="img " src="https://cdn.pastemagazine.com/www/articles/kfc%20canada%20double%20down%20main.jpg" height="100px" width="160px" alt="">

                    <div class="bg-primary">
                        <h4><span>Cocacola</span></h4>
                    </div>
                </div>


                <div class="text-center border border-dark  d-inline-block mr-1 bg-primary">
                    <img class="img " src="https://cdn.pastemagazine.com/www/articles/kfc%20canada%20double%20down%20main.jpg" height="100px" width="160px" alt="">

                    <div class="bg-primary">
                        <h4><span>Cocacola</span></h4>
                    </div>
                </div>

                <div class="text-center border border-dark d-inline-block mr-1 bg-primary">
                    <img class="img " src="https://cdn.pastemagazine.com/www/articles/kfc%20canada%20double%20down%20main.jpg" height="100px" width="160px" alt="">

                    <div class="bg-primary ">
                        <h4><span>Cocacola</span></h4>
                    </div>
                </div>

                <div class="text-center border border-dark d-inline-block mr-1 bg-primary ">
                    <img class="img " src="https://cdn.pastemagazine.com/www/articles/kfc%20canada%20double%20down%20main.jpg" height="100px" width="160px" alt="">
                    <div class="bg-primary">
                        <h4><span>Cocacola</span></h4>
                    </div>
                </div>

                <div class="text-center border border-dark d-inline-block mr-1 bg-primary">
                    <img class="img " src="https://cdn.pastemagazine.com/www/articles/kfc%20canada%20double%20down%20main.jpg" height="100px" width="160px" alt="">
                    <div class="bg-primary">
                        <h4><span>Cocacola</span></h4>
                    </div>
                </div>




                <div class="text-center border border-dark d-inline-block mr-1 bg-primary">
                    <img class="img " src="https://cdn.pastemagazine.com/www/articles/kfc%20canada%20double%20down%20main.jpg" height="100px" width="160px" alt="">
                    <div class="bg-primary">
                        <h4><span>Cocacola</span></h4>
                    </div>
                </div>

                <div class="text-center border border-dark d-inline-block mr-1 bg-primary">
                    <img class="img " src="https://cdn.pastemagazine.com/www/articles/kfc%20canada%20double%20down%20main.jpg" height="100px" width="160px" alt="">
                    <div class="bg-primary">
                        <h4><span>Cocacola</span></h4>
                    </div>
                </div>


            </div>
        </div>

        <!-- product -->
        <div class="row scrollbar-item " id="style-2">
            <div class="col-sm-12 mt-2">

                <div class="row">

                    <div class="col-sm-3 mt-2">
                        <div class=" text-center border border-dark d-inline-block mr-1 bg-primary">
                            <img class="img " src="https://cdn.pastemagazine.com/www/articles/kfc%20canada%20double%20down%20main.jpg" height="100%" width="100%" alt="">
                            <h4 class=""><span>Cocacola</span></h4>
                        </div>
                    </div>

                    <div class="col-sm-3 mt-2">
                        <div class=" text-center border border-dark d-inline-block mr-1 bg-primary">
                            <img class="img " src="https://cdn.pastemagazine.com/www/articles/kfc%20canada%20double%20down%20main.jpg" height="100%" width="100%" alt="">
                            <h4 class=""><span>Cocacola</span></h4>
                        </div>
                    </div>
                    <div class="col-sm-3 mt-2">
                        <div class=" text-center border border-dark d-inline-block mr-1 bg-primary">
                            <img class="img " src="https://cdn.pastemagazine.com/www/articles/kfc%20canada%20double%20down%20main.jpg" height="100%" width="100%" alt="">
                            <h4 class=""><span>Cocacola</span></h4>
                        </div>
                    </div>
                    <div class="col-sm-3 mt-2">
                        <div class=" text-center border border-dark d-inline-block mr-1 bg-primary">
                            <img class="img " src="https://cdn.pastemagazine.com/www/articles/kfc%20canada%20double%20down%20main.jpg" height="100%" width="100%" alt="">
                            <h4 class=""><span>Cocacola</span></h4>
                        </div>
                    </div>
                    <div class="col-sm-3 mt-2">
                        <div class=" text-center border border-dark d-inline-block mr-1 bg-primary">
                            <img class="img " src="https://cdn.pastemagazine.com/www/articles/kfc%20canada%20double%20down%20main.jpg" height="100%" width="100%" alt="">
                            <h4 class=""><span>Cocacola</span></h4>
                        </div>
                    </div>
                    <div class="col-sm-3 mt-2">
                        <div class=" text-center border border-dark d-inline-block mr-1 bg-primary">
                            <img class="img " src="https://cdn.pastemagazine.com/www/articles/kfc%20canada%20double%20down%20main.jpg" height="100%" width="100%" alt="">
                            <h4 class=""><span>Cocacola</span></h4>
                        </div>
                    </div>
                </div>

            </div>



        </div>
    </div>

</div>

@endsection
