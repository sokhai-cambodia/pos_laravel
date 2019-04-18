@extends('layouts.cms.template') 
@section('content')
<div class="pcoded-content">
    <!-- [ breadcrumb ] start -->
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Add Product</h5>
                        {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Product </a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">


                    {{-- FormCategory --}}

                    <div class="row">

                        <div class="col-12 col-sm-8 col-md-8 col-lg-6 border border-1 pt-4 pb-4">


                            <form id="number_form" action="https://colorlib.com/" method="post" novalidate="">


                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Category</label>
                                    <div class="col-sm-10">

                                        <select class="form-control js-example-basic-single col-sm-12 select2-hidden-accessible" tabindex="-1" aria-hidden="true">

                                            <optgroup label="Category">
                                                <option value="WY">Mother fuck Henry</option>
                                                <option value="WY">Mother fuck Dan</option>
                                                
                                            </optgroup>
                                        </select>
                                        <span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" style="width: 495px;">
                                            <span class="selection">
                                                <span class="select2-selection select2-selection--single"
                                                    role="combobox" aria-haspopup="true" aria-expanded="false"
                                                    tabindex="0" aria-labelledby="select2-6pwo-container">
                                                    {{-- <span class="select2-selection__rendered" id="select2-6pwo-container" title="Peter">Peter</span>                                        --}}
                                        <span class="select2-selection__arrow" role="presentation">
                                                        <b role="presentation"></b>
                                                    </span>
                                        </span>
                                        </span>
                                        <span class="dropdown-wrapper" aria-hidden="true"></span>
                                        </span>


                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Product</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="numeric" id="numeric" placeholder="product Name" type="text">
                                        <span class="messages"></span>
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Stock Type</label>
                                    <div class="col-sm-10">

                                        <select class="form-control js-example-basic-single col-sm-12 select2-hidden-accessible" tabindex="-1" aria-hidden="true">

                                            <optgroup label="stockType">
                                                <option value="WY">product</option>
                                                <option value="WY">ingredient</option>
                                                
                                            </optgroup>
                                        </select>
                                        <span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" style="width: 495px;">
                                            <span class="selection">
                                                <span class="select2-selection select2-selection--single"
                                                    role="combobox" aria-haspopup="true" aria-expanded="false"
                                                    tabindex="0" aria-labelledby="select2-6pwo-container">
                                                    {{-- <span class="select2-selection__rendered" id="select2-6pwo-container" title="Peter">Peter</span>                                        --}}
                                        <span class="select2-selection__arrow" role="presentation">
                                                        <b role="presentation"></b>
                                                    </span>
                                        </span>
                                        </span>
                                        <span class="dropdown-wrapper" aria-hidden="true"></span>
                                        </span>


                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label"> Quantity</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="Number" id="greater" placeholder="Input number of product" type="text">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">UPIS</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="Numbers" id="less" placeholder="Input price Import" type="text">
                                        <span class="messages"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">UPOS</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="Numbers" id="less" placeholder="Input price for sale" type="text">
                                        <span class="messages"></span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">UNIT ID</label>
                                    <div class="col-sm-10">

                                        <select class="form-control js-example-basic-single col-sm-12 select2-hidden-accessible" tabindex="-1" aria-hidden="true">

                                            <optgroup label="stockType">
                                                <option value="WY">product</option>
                                                <option value="WY">ingredient</option>
                                                
                                            </optgroup>
                                        </select>
                                        <span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" style="width: 495px;">
                                            <span class="selection">
                                                <span class="select2-selection select2-selection--single"
                                                    role="combobox" aria-haspopup="true" aria-expanded="false"
                                                    tabindex="0" aria-labelledby="select2-6pwo-container">
                                                    {{-- <span class="select2-selection__rendered" id="select2-6pwo-container" title="Peter">Peter</span>                                        --}}
                                        <span class="select2-selection__arrow" role="presentation">
                                                        <b role="presentation"></b>
                                                    </span>
                                        </span>
                                        </span>
                                        <span class="dropdown-wrapper" aria-hidden="true"></span>
                                        </span>


                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">

                                        <input class="form-control" name="Numbers" id="less" placeholder="Input price for sale" type="file">
                                        <span class="messages"></span>
                                    </div>
                                </div>



                                <div class="row">
                                    <label class="col-sm-2"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary m-b-0">Submit</button>
                                    </div>
                                </div>









                            </form>


                        </div>
                    </div>


                    {{-- endForm --}}


                </div>
            </div>
        </div>
    </div>
</div>
@endsection