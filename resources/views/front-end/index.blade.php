@extends('layouts.front-end.template')
@section('content')

<style>
    .room-size {
        height: 180px;
        width: 180px;
    }
</style>
<div class="container">
    <div class=" row ">
        <div class="mr-3 ml-3 ">
            @foreach($room as $rm)
            <a href=" {{ route('front-ent.view.room{$rm->id}') }} " class="border border-dark text-white bg-dark p-5 m-4 d-inline-block room-size">
                <p class="text-center mt-5">{{ $rm->name}}</p>
            </a>
            @endforeach

            <a class="border border-dark text-white bg-dark p-5 m-4 d-inline-block room-size">
                <p class="text-center mt-5"> Room</p>
            </a>
            <a class="border border-dark text-white bg-dark p-5 m-4 d-inline-block room-size">
                <p class="text-center mt-5"> Room</p>
            </a>
            <a class="border border-dark text-white bg-dark p-5 m-4 d-inline-block room-size">
                <p class="text-center mt-5"> Room</p>
            </a>

            <a class="border border-dark text-white bg-dark p-5 m-4 d-inline-block room-size">
                <p class="text-center mt-5"> Room</p>
            </a>
        </div>
    </div>

    <div class=" row mt-3">
        <div class="mr-3 ml-3 ">
            <a class="border border-dark text-white bg-dark p-5 m-4 d-inline-block room-size">
                <p class="text-center mt-5"> Room</p>
            </a> <a class="border border-dark text-white bg-dark p-5 m-4 d-inline-block room-size">
                <p class="text-center mt-5"> Room</p>
            </a>
            <a class="border border-dark text-white bg-dark p-5 m-4 d-inline-block room-size">
                <p class="text-center mt-5"> Room</p>
            </a>
            <a class="border border-dark text-white bg-dark p-5 m-4 d-inline-block room-size">
                <p class="text-center mt-5"> Room</p>
            </a>
            <a class="border border-dark text-white bg-dark p-5 m-4 d-inline-block room-size">
                <p class="text-center mt-5"> Room</p>
            </a>
        </div>
    </div>
</div>


</div>
@endsection
