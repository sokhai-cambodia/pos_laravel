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
                        <h5>Add Category</h5>
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

                        <div class="col-12 col-sm-8 col-md-6 col-lg-6 border border-1 pt-4">
                            <form id="main" method="post" action="https://colorlib.com/" novalidate="">
                                <div class="form-group row has-success">
                                    <label class="col-sm-2 col-form-label">Category</label>
                                    <div class="col-sm-8">
                                        <input class="form-control fill" name="name" id="name"
                                            placeholder="product category" type="text">
                                        <span class="messages"></span>
                                    </div>
                                </div>


                                <div class="form-group row">
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