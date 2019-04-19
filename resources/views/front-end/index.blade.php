@extends('layouts.front-end.template')
@section('content')


<style>
    .scrollbar {
        width: 2px;
        float: left;
        height: 720px;
        background: #F5F5F5;
        overflow-y: scroll;
        margin-bottom: 10px;
    }

    #style-1::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 2px rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        background-color: #F5F5F5;
    }

    #style-1::-webkit-scrollbar {
        width: 5px;
        background-color: #F5F5F5;
    }

    #style-1::-webkit-scrollbar-thumb {
        border-radius: 10px;
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
        background-color: #555;
    }

    /* scrollbar style */

    /* width */
    ::-webkit-scrollbar {
        width: 7px;
    }

    /* track */
    ::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey;
    }

    /* customize  overflow  */

    /* handle */
    ::-webkit-scrollbar-thumb {
        background: #807e7e;
        border-radius: 10px;
    }

    /* handle on hover  */
    ::-webkit-scrollbar-thumb:hover {
        background: red;
    }

</style>
<div class="row bg-info text-center">

    <div class="col-sm-4 bg-dark  ">
        <div class="m-2 text-center ">
            <h5 class="p-2">Invoice:</h5>
        </div>
        <div class="row">
            <div class="col-sm-12">

                <div>
                    <table class="table table-bordered table-white">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Cocacola</th>
                                <td>2</td>
                                <td>4000</td>
                                <td>8000</td>
                            </tr>
                            <tr>
                                <th scope="row">Pepse</th>
                                <td>5</td>
                                <td>2500</td>
                                <td>12500</td>
                            </tr>
                            <tr>
                                <th scope="row">ចេកអាំង</th>
                                <td>2</td>
                                <td>1000</td>
                                <td>2000</td>

                            </tr>
                        </tbody>
                    </table>
                    <div class="mr-auto">
                        <label for=""><b>Amount :</b> 30000 </label>
                    </div>
                </div>


                <div class=" fixed-bottom p-2 m-2 float-left bg-secondary d-flex justify-contents-start">
                    <button class="btn btn-primary mr-2  text-dark  border border-dark">Paid</button>
                    <button class="btn btn-success mr-2  text-dark border border-dark">Print</button>
                    <button class="btn btn-danger mr-2  text-dark border border-dark">Close</button>

                </div>
            </div>
        </div>
    </div>

    {{-- category --}}
    <div class="col-sm-2 bg-dark">
        <div class="m-2 text-center ">
            <h5 class="p-2">Category:</h5>
        </div>
        <div class="row">
            <div class="col-sm-12 scrollbar" id="style-1 ">


                <div class="category d-flex flex-column force-overflow">

                    <div class="card mb-4 rounded-0 " style="width: 100%; height:70%;">
                        <div class="card-body ">
                            <img src="https://cdn0.woolworths.media/content/wowproductimages/large/032731.jpg" width="100%" height="20%;" alt="">
                        </div>
                        <div class="card-footer text-white text-center bg-dark rounded-0">
                                <p><span>Cocacola</span></p>
                        </div>
                    </div>
                    <div class="card mb-4 rounded-0 " style="width: 100%; height:70%;" >
                        <div class="card-body ">
                            <img src="https://cdn0.woolworths.media/content/wowproductimages/large/032731.jpg" width="100%" height="20%;" alt="">
                        </div>
                        <div class="card-footer text-white text-center bg-dark rounded-0">
                                <p><span>Cocacola</span></p>
                        </div>
                    </div>
                    <div class="card mb-4 rounded-0 " style="width: 100%; height:70%;">
                            <div class="card-body ">
                                <img src="https://cdn0.woolworths.media/content/wowproductimages/large/032731.jpg" width="100%" height="20%;" alt="">
                            </div>
                            <div class="card-footer text-white text-center bg-dark rounded-0">
                            <p><span>Cocacola</span></p>
                            </div>
                        </div>

                </div>



            </div>
        </div>
    </div>

    {{-- end category --}} {{-- start product --}}
    <div class="col-sm-6 bg-dark ">

        <div class="m-2 text-center">
            <h5 class="p-2">Products:</h5>
        </div>
        <div class="row">
            <div class="col-sm-12 scrollbar" id="style-1 ">

                <div class="row mt-3 ">
                    <div class="col-sm-3 border-success">
                        <div class="card m-2  rounded-0 " style="width: 100%">
                            <div class="card-body ">
                                <img src="https://cdn0.woolworths.media/content/wowproductimages/large/032731.jpg" alt="" width="100%" height="100%">

                            </div>
                            <div class="card-footer text-white text-center bg-primary rounded-0">
                                 <p><span>Cocacola</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 border-success">
                        <div class="card m-2 rounded-0 " style="width: 100%">
                            <div class="card-body ">
                                <img src="https://4.imimg.com/data4/QB/WX/MY-1850306/coca-cola-diet-coke-500x500.jpg" alt="" width="100%" height="100%">

                            </div>
                            <div class="card-footer text-white text-center bg-primary rounded-0">
                                 <p><span>Cocacola</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 border-success">
                        <div class="card m-2 rounded-0 " style="width: 100%">
                            <div class="card-body ">
                                <img src="https://4.imimg.com/data4/QB/WX/MY-1850306/coca-cola-diet-coke-500x500.jpg" alt="" width="100%" height="100%">

                            </div>
                            <div class="card-footer text-white text-center bg-primary rounded-0">
                                 <p><span>Cocacola</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 border-success">
                        <div class="card m-2 rounded-0 " style="width: 100%">
                            <div class="card-body ">
                                <img src="https://4.imimg.com/data4/QB/WX/MY-1850306/coca-cola-diet-coke-500x500.jpg" alt="" width="100%" height="100%">

                            </div>
                            <div class="card-footer text-white text-center bg-primary rounded-0">
                                 <p><span>Cocacola</span></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                        <div class="col-sm-3 border-success">
                            <div class="card m-2  rounded-0 " style="width: 100%">
                                <div class="card-body ">
                                    <img src="https://cdn0.woolworths.media/content/wowproductimages/large/032731.jpg" alt="" width="100%" height="100%">

                                </div>
                                <div class="card-footer text-white text-center bg-primary rounded-0">
                                     <p><span>Cocacola</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 border-success">
                            <div class="card m-2 rounded-0 " style="width: 100%">
                                <div class="card-body ">
                                    <img src="https://4.imimg.com/data4/QB/WX/MY-1850306/coca-cola-diet-coke-500x500.jpg" alt="" width="100%" height="100%">

                                </div>
                                <div class="card-footer text-white text-center bg-primary rounded-0">
                                     <p><span>Cocacola</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 border-success">
                            <div class="card m-2 rounded-0 " style="width: 100%">
                                <div class="card-body ">
                                    <img src="https://4.imimg.com/data4/QB/WX/MY-1850306/coca-cola-diet-coke-500x500.jpg" alt="" width="100%" height="100%">

                                </div>
                                <div class="card-footer text-white text-center bg-primary rounded-0">
                                     <p><span>Cocacola</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 border-success">
                            <div class="card m-2 rounded-0 " style="width: 100%">
                                <div class="card-body ">
                                    <img src="https://4.imimg.com/data4/QB/WX/MY-1850306/coca-cola-diet-coke-500x500.jpg" alt="" width="100%" height="100%">
                                </div>
                                <div class="card-footer text-white text-center bg-primary rounded-0">
                                     <p><span>Cocacola</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

</div>


{{-- end product --}}
</div>
@endsection
