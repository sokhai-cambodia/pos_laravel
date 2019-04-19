@extends('layouts.front-end.template') 
@section('content')


<style>
    .scrollbar {
        width: 2px;
        float: left;
        height: 800px;
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

    /*
 *  STYLE 2
 */

    #style-2::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        background-color: #F5F5F5;
    }

    #style-2::-webkit-scrollbar {
        width: 5px;
        background-color: #F5F5F5;
    }

    #style-2::-webkit-scrollbar-thumb {
        border-radius: 10px;
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
        background-color: #D62929;
    }
</style>
<div class="row bg-info text-center d-flex justify-contents">
    <div class="col-sm-4 bg-dark  ">

        <label class="text-center" for=""> Invoice</label>

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


        <div class=" p-5">
            <button class="btn btn-primary">Paid</button>
            <button class="btn btn-success">Print</button>
            <button class="btn btn-danger">Close</button>

        </div>

    </div>
    <div class="col-sm-8 ">
        <div class="row">

            <div class="col-sm-2 bg-info scrollbar" id="style-1">
                <div class="m-2 text-center ">
                    <h5 class="p-2">Category:</h5 class="p-3" cla>
                </div>
                <div class="category d-flex flex-column force-overflow">
                    <div class="card mb-4 rounded-0 " style="width: 100%">
                        <div class="card-body ">
                            <img src="https://cdn0.woolworths.media/content/wowproductimages/large/032731.jpg" width="100%" height="20%;" alt="">
                        </div>
                        <div class="card-footer text-white text-center bg-dark rounded-0">
                            <h5>ចេកអាំង</h5>
                        </div>
                    </div>

                    <div class="card mb-4 rounded-0 " style="width: 100%">
                        <div class="card-body ">
                            <img src="https://cdn0.woolworths.media/content/wowproductimages/large/032731.jpg" width="100%" height="20%;" alt="">
                        </div>
                        <div class="card-footer text-white text-center bg-dark rounded-0">
                            <h5>ចេកអាំង</h5>
                        </div>
                    </div>
                    <div class="card mb-4 rounded-0 " style="width: 100%">
                        <div class="card-body ">
                            <img src="https://cdn0.woolworths.media/content/wowproductimages/large/032731.jpg" width="100%" height="20%;" alt="">
                        </div>
                        <div class="card-footer text-white text-center bg-dark rounded-0">
                            <h5>ចេកអាំង</h5>
                        </div>
                    </div>
                    <div class="card mb-4 rounded-0 " style="width: 100%">
                        <div class="card-body ">
                            <img src="https://cdn0.woolworths.media/content/wowproductimages/large/032731.jpg" width="100%" height="20%;" alt="">
                        </div>
                        <div class="card-footer text-white text-center bg-dark rounded-0">
                            <h5>ចេកអាំង</h5>
                        </div>
                    </div>
                    <div class="card mb-4 rounded-0 " style="width: 100%">
                        <div class="card-body ">
                            <img src="https://cdn0.woolworths.media/content/wowproductimages/large/032731.jpg" width="100%" height="20%;" alt="">
                        </div>
                        <div class="card-footer text-white text-center bg-dark rounded-0">
                            <h5>ចេកអាំង</h5>
                        </div>
                    </div>
                    <div class="card mb-4 rounded-0 " style="width: 100%">
                        <div class="card-body ">
                            <img src="https://cdn0.woolworths.media/content/wowproductimages/large/032731.jpg" width="100%" height="20%;" alt="">
                        </div>
                        <div class="card-footer text-white text-center bg-dark rounded-0">
                            <h5>ចេកអាំង</h5>
                        </div>
                    </div>
                    <div class="card mb-4 rounded-0 " style="width: 100%">
                        <div class="card-body ">
                            <img src="https://cdn0.woolworths.media/content/wowproductimages/large/032731.jpg" width="100%" height="20%;" alt="">
                        </div>
                        <div class="card-footer text-white text-center bg-dark rounded-0">
                            <h5>ចេកអាំង</h5>
                        </div>
                    </div>
                    <div class="card mb-4 rounded-0 " style="width: 100%">
                        <div class="card-body ">
                            <img src="https://cdn0.woolworths.media/content/wowproductimages/large/032731.jpg" width="100%" height="20%;" alt="">
                        </div>
                        <div class="card-footer text-white text-center bg-dark rounded-0">
                            <h5>ចេកអាំង</h5>
                        </div>
                    </div>
                    <div class="card mb-4 rounded-0 " style="width: 100%">
                        <div class="card-body ">
                            <img src="https://cdn0.woolworths.media/content/wowproductimages/large/032731.jpg" width="100%" height="20%;" alt="">
                        </div>
                        <div class="card-footer text-white text-center bg-dark rounded-0">
                            <h5>ចេកអាំង</h5>
                        </div>
                    </div>
                    <div class="card mb-4 rounded-0 " style="width: 100%">
                        <div class="card-body ">
                            <img src="https://cdn0.woolworths.media/content/wowproductimages/large/032731.jpg" width="100%" height="20%;" alt="">
                        </div>
                        <div class="card-footer text-white text-center bg-dark rounded-0">
                            <h5>ចេកអាំង</h5>
                        </div>
                    </div>
                    <div class="card mb-4 rounded-0 " style="width: 100%">
                        <div class="card-body ">
                            <img src="https://cdn0.woolworths.media/content/wowproductimages/large/032731.jpg" width="100%" height="20%;" alt="">
                        </div>
                        <div class="card-footer text-white text-center bg-dark rounded-0">
                            <h5>ចេកអាំង</h5>
                        </div>
                    </div>
                    <div class="card mb-4 rounded-0 " style="width: 100%">
                        <div class="card-body ">
                            <img src="https://cdn0.woolworths.media/content/wowproductimages/large/032731.jpg" width="100%" height="20%;" alt="">
                        </div>
                        <div class="card-footer text-white text-center bg-dark rounded-0">
                            <h5>ចេកអាំង</h5>
                        </div>
                    </div>
                    <div class="card mb-4 rounded-0 " style="width: 100%">
                        <div class="card-body ">
                            <img src="https://cdn0.woolworths.media/content/wowproductimages/large/032731.jpg" width="100%" height="20%;" alt="">
                        </div>
                        <div class="card-footer text-white text-center bg-dark rounded-0">
                            <h5>ចេកអាំង</h5>
                        </div>
                    </div>
                    <div class="card mb-4 rounded-0 " style="width: 100%">
                        <div class="card-body ">
                            <img src="https://cdn0.woolworths.media/content/wowproductimages/large/032731.jpg" width="100%" height="20%;" alt="">
                        </div>
                        <div class="card-footer text-white text-center bg-dark rounded-0">
                            <h5>ចេកអាំង</h5>
                        </div>
                    </div>
                    <div class="card mb-4 rounded-0 " style="width: 100%">
                        <div class="card-body ">
                            <img src="https://cdn0.woolworths.media/content/wowproductimages/large/032731.jpg" width="100%" height="20%;" alt="">
                        </div>
                        <div class="card-footer text-white text-center bg-dark rounded-0">
                            <h5>ចេកអាំង</h5>
                        </div>
                    </div>
                    <div class="card mb-4 rounded-0 " style="width: 100%">
                        <div class="card-body ">
                            <img src="https://cdn0.woolworths.media/content/wowproductimages/large/032731.jpg" width="100%" height="20%;" alt="">
                        </div>
                        <div class="card-footer text-white text-center bg-dark rounded-0">
                            <h5>ចេកអាំង</h5>
                        </div>
                    </div>
                    <div class="card mb-4 rounded-0 " style="width: 100%">
                        <div class="card-body ">
                            <img src="https://cdn0.woolworths.media/content/wowproductimages/large/032731.jpg" width="100%" height="20%;" alt="">
                        </div>
                        <div class="card-footer text-white text-center bg-dark rounded-0">
                            <h5>ចេកអាំង</h5>
                        </div>
                    </div>
                    <div class="card mb-4 rounded-0 " style="width: 100%">
                        <div class="card-body ">
                            <img src="https://cdn0.woolworths.media/content/wowproductimages/large/032731.jpg" width="100%" height="20%;" alt="">
                        </div>
                        <div class="card-footer text-white text-center bg-dark rounded-0">
                            <h5>ចេកអាំង</h5>
                        </div>
                    </div>
                    <div class="card mb-4 rounded-0 " style="width: 100%">
                        <div class="card-body ">
                            <img src="https://cdn0.woolworths.media/content/wowproductimages/large/032731.jpg" width="100%" height="20%;" alt="">
                        </div>
                        <div class="card-footer text-white text-center bg-dark rounded-0">
                            <h5>ចេកអាំង</h5>
                        </div>
                    </div>



                </div>

            </div>

            <div class="col-sm-10 bg-dark scrollbar" id="style-1">
                <div class="row text-center">
                    <div class="">
                        <h5 class="p-3">Products:</h5>
                    </div>
                </div>
                <div class="row m-2 mb-4 ">
                    <div class="col-sm-3 border-success">
                        <div class="card mb-4 rounded-0 " style="width: 100%">
                            <div class="card-body ">
                                <img src="https://4.imimg.com/data4/QB/WX/MY-1850306/coca-cola-diet-coke-500x500.jpg" alt="" width="100%" height="100%">

                            </div>
                            <div class="card-footer text-white text-center bg-success rounded-0">
                                <h5>ពងក្រួច</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 border-success">
                        <div class="card mb-4 rounded-0 " style="width: 100%">
                            <div class="card-body ">
                                <img src="https://4.imimg.com/data4/QB/WX/MY-1850306/coca-cola-diet-coke-500x500.jpg" alt="" width="100%" height="100%">

                            </div>
                            <div class="card-footer text-white text-center bg-success rounded-0">
                                <h5>ពងក្រួច</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 border-success">
                        <div class="card mb-4 rounded-0 " style="width: 100%">
                            <div class="card-body ">
                                <img src="https://4.imimg.com/data4/QB/WX/MY-1850306/coca-cola-diet-coke-500x500.jpg" alt="" width="100%" height="100%">

                            </div>
                            <div class="card-footer text-white text-center bg-success rounded-0">
                                <h5>ពងក្រួច</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 border-success">
                        <div class="card mb-4 rounded-0 " style="width: 100%">
                            <div class="card-body ">
                                <img src="https://4.imimg.com/data4/QB/WX/MY-1850306/coca-cola-diet-coke-500x500.jpg" alt="" width="100%" height="100%">

                            </div>
                            <div class="card-footer text-white text-center bg-success rounded-0">
                                <h5>ពងក្រួច</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row m-2 mb-4 ">
                    <div class="col-sm-3 border-success">
                        <div class="card mb-4 rounded-0 " style="width: 100%">
                            <div class="card-body ">
                                <img src="https://4.imimg.com/data4/QB/WX/MY-1850306/coca-cola-diet-coke-500x500.jpg" alt="" width="100%" height="100%">

                            </div>
                            <div class="card-footer text-white text-center bg-success rounded-0">
                                <h5>ពងក្រួច</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 border-success">
                        <div class="card mb-4 rounded-0 " style="width: 100%">
                            <div class="card-body ">
                                <img src="https://4.imimg.com/data4/QB/WX/MY-1850306/coca-cola-diet-coke-500x500.jpg" alt="" width="100%" height="100%">

                            </div>
                            <div class="card-footer text-white text-center bg-success rounded-0">
                                <h5>ពងក្រួច</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 border-success">
                        <div class="card mb-4 rounded-0 " style="width: 100%">
                            <div class="card-body ">
                                <img src="https://4.imimg.com/data4/QB/WX/MY-1850306/coca-cola-diet-coke-500x500.jpg" alt="" width="100%" height="100%">

                            </div>
                            <div class="card-footer text-white text-center bg-success rounded-0">
                                <h5>ពងក្រួច</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 border-success">
                        <div class="card mb-4 rounded-0 " style="width: 100%">
                            <div class="card-body ">
                                <img src="https://4.imimg.com/data4/QB/WX/MY-1850306/coca-cola-diet-coke-500x500.jpg" alt="" width="100%" height="100%">

                            </div>
                            <div class="card-footer text-white text-center bg-success rounded-0">
                                <h5>ពងក្រួច</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row m-2 mb-4 ">
                    <div class="col-sm-3 border-success">
                        <div class="card mb-4 rounded-0 " style="width: 100%">
                            <div class="card-body ">
                                <img src="https://4.imimg.com/data4/QB/WX/MY-1850306/coca-cola-diet-coke-500x500.jpg" alt="" width="100%" height="100%">

                            </div>
                            <div class="card-footer text-white text-center bg-success rounded-0">
                                <h5>ពងក្រួច</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 border-success">
                        <div class="card mb-4 rounded-0 " style="width: 100%">
                            <div class="card-body ">
                                <img src="https://4.imimg.com/data4/QB/WX/MY-1850306/coca-cola-diet-coke-500x500.jpg" alt="" width="100%" height="100%">

                            </div>
                            <div class="card-footer text-white text-center bg-success rounded-0">
                                <h5>ពងក្រួច</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 border-success">
                        <div class="card mb-4 rounded-0 " style="width: 100%">
                            <div class="card-body ">
                                <img src="https://4.imimg.com/data4/QB/WX/MY-1850306/coca-cola-diet-coke-500x500.jpg" alt="" width="100%" height="100%">

                            </div>
                            <div class="card-footer text-white text-center bg-success rounded-0">
                                <h5>ពងក្រួច</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 border-success">
                        <div class="card mb-4 rounded-0 " style="width: 100%">
                            <div class="card-body ">
                                <img src="https://4.imimg.com/data4/QB/WX/MY-1850306/coca-cola-diet-coke-500x500.jpg" alt="" width="100%" height="100%">

                            </div>
                            <div class="card-footer text-white text-center bg-success rounded-0">
                                <h5>ពងក្រួច</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row m-2 mb-4 ">
                    <div class="col-sm-3 border-success">
                        <div class="card mb-4 rounded-0 " style="width: 100%">
                            <div class="card-body ">
                                <img src="https://4.imimg.com/data4/QB/WX/MY-1850306/coca-cola-diet-coke-500x500.jpg" alt="" width="100%" height="100%">

                            </div>
                            <div class="card-footer text-white text-center bg-success rounded-0">
                                <h5>ពងក្រួច</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 border-success">
                        <div class="card mb-4 rounded-0 " style="width: 100%">
                            <div class="card-body ">
                                <img src="https://4.imimg.com/data4/QB/WX/MY-1850306/coca-cola-diet-coke-500x500.jpg" alt="" width="100%" height="100%">

                            </div>
                            <div class="card-footer text-white text-center bg-success rounded-0">
                                <h5>ពងក្រួច</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 border-success">
                        <div class="card mb-4 rounded-0 " style="width: 100%">
                            <div class="card-body ">
                                <img src="https://4.imimg.com/data4/QB/WX/MY-1850306/coca-cola-diet-coke-500x500.jpg" alt="" width="100%" height="100%">

                            </div>
                            <div class="card-footer text-white text-center bg-success rounded-0">
                                <h5>ពងក្រួច</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 border-success">
                        <div class="card mb-4 rounded-0 " style="width: 100%">
                            <div class="card-body ">
                                <img src="https://4.imimg.com/data4/QB/WX/MY-1850306/coca-cola-diet-coke-500x500.jpg" alt="" width="100%" height="100%">

                            </div>
                            <div class="card-footer text-white text-center bg-success rounded-0">
                                <h5>ពងក្រួច</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row m-2 mb-4 ">
                    <div class="col-sm-3 border-success">
                        <div class="card mb-4 rounded-0 " style="width: 100%">
                            <div class="card-body ">
                                <img src="https://4.imimg.com/data4/QB/WX/MY-1850306/coca-cola-diet-coke-500x500.jpg" alt="" width="100%" height="100%">

                            </div>
                            <div class="card-footer text-white text-center bg-success rounded-0">
                                <h5>ពងក្រួច</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 border-success">
                        <div class="card mb-4 rounded-0 " style="width: 100%">
                            <div class="card-body ">
                                <img src="https://4.imimg.com/data4/QB/WX/MY-1850306/coca-cola-diet-coke-500x500.jpg" alt="" width="100%" height="100%">

                            </div>
                            <div class="card-footer text-white text-center bg-success rounded-0">
                                <h5>ពងក្រួច</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 border-success">
                        <div class="card mb-4 rounded-0 " style="width: 100%">
                            <div class="card-body ">
                                <img src="https://4.imimg.com/data4/QB/WX/MY-1850306/coca-cola-diet-coke-500x500.jpg" alt="" width="100%" height="100%">

                            </div>
                            <div class="card-footer text-white text-center bg-success rounded-0">
                                <h5>ពងក្រួច</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 border-success">
                        <div class="card mb-4 rounded-0 " style="width: 100%">
                            <div class="card-body ">
                                <img src="https://4.imimg.com/data4/QB/WX/MY-1850306/coca-cola-diet-coke-500x500.jpg" alt="" width="100%" height="100%">

                            </div>
                            <div class="card-footer text-white text-center bg-success rounded-0">
                                <h5>ពងក្រួច</h5>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>
</div>
@endsection