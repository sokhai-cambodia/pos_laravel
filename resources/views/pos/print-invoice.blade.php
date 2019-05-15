@extends('layouts.front-end.template')
@section('header-src')
<style>
    .container {
    margin-top:70px;
    }
    .tables {
    border:1px solid black;
    padding: 70px 0px;
    margin:5px;
    }
</style>
@endsection

@section('content')
<div class="container">
    {{-- Navbar --}}
    @include('layouts.front-end.navbar')
    {{-- #Narbar --}}
    <div id="print_area" class="m-auto">
        <div >
            <img class=" mx-2 logo" src="http://localhost:8000/plugin/front-end/image/logo.jpg" alt="">
            <span >Koh Andet Eco Resort</span>
        </div>
        Print Invoice
    </div>
</div>
@endsection

@section('footer-src')
@endsection