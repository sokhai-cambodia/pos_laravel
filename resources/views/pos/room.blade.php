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
    <div class="row offset-1">
        @foreach ($rooms as $room)
    <a class="col-12 col-sm-4 col-md-2 text-center  bg-light tables" href="{{ route('pos.pos', ['room_id' => $room->id]) }}" >{{ $room->room_no }}</a>
        @endforeach
    </div>
</div>
@endsection

@section('footer-src')
@endsection