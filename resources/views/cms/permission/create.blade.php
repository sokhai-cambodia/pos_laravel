@extends('layouts.cms.template', compact('title','icon')) 
@section('content')
<!-- Basic Form Inputs card start -->
<div class="card">
    <div class="card-header">
        <h5>{{ $title }}</h5>
        <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
    </div>
    <div class="card-block">
        <form action="{{ route('permission.create') }}" method="POST">
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Permission</label>
                <div class="col-sm-10">
                    <select class=" col-sm-12 border border-1 " name="permission_id" tabindex="-1" aria-hidden="true" style="height:40px;">
                        @foreach ($permissions as $permission)
                            <option value="">not select</option>
                            <option value="{{ $permission->id }}" {{  UtilHelper::selected($permission->id, old('permission_id')) }}>{{ $permission->name }}</option>
                        @endforeach
                    </select>
                </div>
                <span class="dropdown-wrapper" aria-hidden="true"></span>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ old('name') }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Route Name</label>
                <div class="col-sm-10">
                    <input type="text" name="route_name" class="form-control" placeholder="Enter Route Name" value="{{ old('route_name') }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">User For Action</label>
                <div class="col-sm-10 col-sm-offset-2">
                    <div class="border-checkbox-section">
                        <div class="border-checkbox-group border-checkbox-group-primary">
                            <input class="border-checkbox" type="checkbox" id="use_for_action" name="use_for_action" value="1">
                            <label class="border-checkbox-label" for="use_for_action">User For Action</label>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success waves-effect waves-light pull-right">Save</button>
        </form>
    </div>
</div>
<!-- Basic Form Inputs card end -->
@endsection