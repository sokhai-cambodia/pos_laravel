@php 
    $title = 'Edit Branch';
@endphp

@extends('layouts.cms.template', ['title' => $title])

@section('content')
 <!-- Basic Form Inputs card start -->
 <div class="card">
    <div class="card-header">
        <h5>{{ $title }}</h5>
        <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
    </div>
    <div class="card-block">
        <form action="{{ route('branch.update', ['id' => $branch->id]) }}" method="POST">
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control"
                placeholder="Enter Name" value="{{ $branch->name }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea rows="5" cols="5" name="description" class="form-control"
                        placeholder="Enter Description">{{ $branch->description }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <textarea rows="5" cols="5" name="address" class="form-control"
                        placeholder="Enter Address">{{ $branch->address }}</textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-success waves-effect waves-light pull-right">Save</button>
        </form>
    </div>
</div>
<!-- Basic Form Inputs card end -->
@endsection