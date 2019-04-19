@extends('layouts.cms.template', compact('title','icon'))

@section('content')
 <!-- Basic Form Inputs card start -->
 <div class="card">
    <div class="card-header">
        <h5>{{ $title }}</h5>
        <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
    </div>
    <div class="card-block">
        <form action="{{ route('user.assign-branch', ['id' => $user->id]) }}" method="POST">
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Last Name</label>
                <div class="col-sm-10">
                    <input type="text" name="last_name" class="form-control"
                    placeholder="Enter Last Name" value="{{ UtilHelper::hasValue(old('last_name'), $user->last_name) }}">
                </div>
            </div>
                        
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Photo</label>
                <div class="col-sm-10">
                    <input type="file" name="photo" class="form-control dropify" data-default-file="{{ $user->getPhoto() }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Active</label>
                <div class="col-sm-10 col-sm-offset-2">
                    <div class="border-checkbox-section">
                        <div class="border-checkbox-group border-checkbox-group-primary">
                            @php 
                                $active = UtilHelper::hasValue(old('is_active'), $user->is_active);
                            @endphp
                            <input class="border-checkbox" type="checkbox" id="is_active" name="is_active" {{ UtilHelper::checked($active, 1) }} value="1">
                            <label class="border-checkbox-label" for="is_active">Active</label>
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