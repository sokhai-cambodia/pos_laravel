@extends('layouts.cms.template', compact('title','icon')) 
@section('content')
<!-- Basic Form Inputs card start -->
<div class="card">
    <div class="card-header">
        <h5>{{ $title }}</h5>
        <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
    </div>
    <div class="card-block">
        <form action="{{ route('branch.update', ['id' => $room->id]) }}" method="POST">
            @csrf

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Room No</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" placeholder="Enter Room" value="{{ $room->room_no }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Branch</label>
                <div class="col-sm-10">
                    <select class=" col-sm-12 border border-1 " name="branch" tabindex="-1" aria-hidden="true" style="height:40px;" value="{{ $room->branch_id }}">
                        @foreach ($branch as $bh)
                            <option value="{{ $bh->id }}" {{  UtilHelper::selected($bh->id, old('branch_id')) }}>{{$bh->name}}</option>
                        @endforeach    
                    </select>
                </div>
                <span class="dropdown-wrapper" aria-hidden="true"></span>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Bed</label>
                <div class="col-sm-10">
                    <input type="text" name="bed" class="form-control" placeholder="Enter Room" value="{{ $room->bed }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <select class=" col-sm-12 border border-1 " name="status" value="{{ $room->status }}" tabindex="-1" aria-hidden="true" style="height:40px;">
                        <option value="available">Available</option>
                        <option value="checked_in">Checked_in</option>
                        <option value="blocked">Blocked</option>       
                    </select>
                </div>
                <span class="dropdown-wrapper" aria-hidden="true"></span>
            </div>

            <button type="submit" class="btn btn-success waves-effect waves-light pull-right">Save</button>
        </form>
    </div>
</div>
<!-- Basic Form Inputs card end -->
@endsection