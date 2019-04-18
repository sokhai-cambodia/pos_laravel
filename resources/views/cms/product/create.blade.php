@extends('layouts.cms.template', compact('title','icon')) 
@section('content')
<!-- Basic Form Inputs card start -->
<div class="card">
    <div class="card-header">
        <h5>{{ $title }}</h5>
        <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
    </div>
    <div class="card-block">
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Product Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" placeholder="Enter Product Name" value="{{ old('name') }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea rows="5" cols="4" name="description" class="form-control" placeholder="Enter Description"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Photo</label>
                <div class="col-sm-10">
                    <input type="file" name="photo" class="form-control dropify">
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Stock Type</label>
                <div class="col-sm-10">
                    <select class=" col-sm-12 border border-1 " name="stockType" tabindex="-1" aria-hidden="true" style="height:40px;">           
                                {{-- @foreach ($stockType as $stock)
                                    <option value="{{ $stock }}" {{  UtilHelper::selected($stock, old('stock')) }}>{{ $stock }}</option>
                                @endforeach            --}}

                                <option value="product"> Product</option>
                                <option value="ingredient"> Ingredient</option>

                    </select>
                </div>
                <span class="dropdown-wrapper" aria-hidden="true"></span>
            </div>


            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Is Ingredient</label>
                <div class="col-sm-10 col-sm-offset-2">
                    <div class="border-checkbox-section">
                        <div class="border-checkbox-group border-checkbox-group-primary">
                            <input class="border-checkbox" type="checkbox" id="active" name="isIngredient" checked>
                            <label class="border-checkbox-label" for="active">is ingredient</label>
                        </div>
                    </div>
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input type="text" name="price" class="form-control" placeholder="Enter Price">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Quality for cut stock</label>
                <div class="col-sm-10">
                    <input type="text" name="quanityForCutStock" class="form-control" placeholder="Enter Quantitiy for cut stock">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Units</label>
                <div class="col-sm-10">
                    <select class=" col-sm-12 border border-1 " name="unitId" tabindex="-1" aria-hidden="true" style="height:40px;">
                               
                                @foreach ($units as $un)
                                    <option value="{{ $un->id }}" {{  UtilHelper::selected($un->id, old('unit_id')) }}>{{ $un->name }}</option>
                                @endforeach
                        
                                
                            </select>
                </div>
                <span class="dropdown-wrapper" aria-hidden="true"></span>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Product Category</label>
                <div class="col-sm-10">
                    <select class=" col-sm-12 border border-1 " name="categoryId" tabindex="-1" aria-hidden="true" style="height:40px;">           
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}" {{  UtilHelper::selected($cat->id, old('cat_id')) }}>{{ $cat->name }}</option>
                                @endforeach           
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