@extends('layouts.front-end.template')
@section('content')

<style>
body{
    background-size: cover;
    background-repeat: no-repeat;
    height: 100%;
    font-family: 'Numans', sans-serif;
    background-color: black;
    }
.container {
    margin-top:70px;
  }

  .tables {
    border:1px solid black;
    padding: 70px 0px;
    margin:5px;
  }


</style>
<div class="container">
<div class="row offset-1">
<a class="col-12 col-sm-4 col-md-2 text-center  bg-light tables" href="order.html" >Room</a>
<a class="col-12 col-sm-4 col-md-2 text-center  bg-light tables" href="order.html" >Walk In</a>
</div>
</div>
</div>
@endsection
