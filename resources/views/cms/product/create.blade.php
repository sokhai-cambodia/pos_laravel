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
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control"
                    placeholder="Enter Name" value="{{ old('last_name') }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Photo</label>
                <div class="col-sm-10">
                    <input type="file" name="photo" class="form-control dropify">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea rows="5" cols="5" name="description" class="form-control"
                        placeholder="Enter Description"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                    <select name="category_id" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{  UtilHelper::selected($category->id, old('category_id')) }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Unit</label>
                <div class="col-sm-10">
                    <select name="unit_id" class="form-control">
                        @foreach ($units as $unit)
                            <option value="{{ $unit->id }}" {{  UtilHelper::selected($unit->id, old('unit_id')) }}>{{ $unit->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input type="number" required step="0.01" name="price" class="form-control"
                    placeholder="Enter Price" value="{{ old('price') }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Quanity For Cut Stock</label>
                <div class="col-sm-10">
                    <input type="number" required step="0.01" name="quanity_for_cut_stock" class="form-control"
                    placeholder="Enter Name" value="{{ old('quanity_for_cut_stock') }}">
                </div>
            </div>
          
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Is Ingredient</label>
                <div class="col-sm-10 col-sm-offset-2">
                    <div class="border-checkbox-section">
                        <div class="border-checkbox-group border-checkbox-group-primary">
                            <input class="border-checkbox" type="checkbox" id="is_ingredient" name="is_ingredient">
                            <label class="border-checkbox-label" for="is_ingredient">Is Ingredient</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Stock Type</label>
                <div class="col-sm-10">
                    <select name="stock_type" id="stock_type" class="form-control">
                        @foreach ($stock_types as $stock_type)
                            <option value="{{ $stock_type }}" {{  UtilHelper::selected($stock_type, old('stock_type')) }}>{{ $stock_type }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div id="product-ingredient">
                            
            </div>
            <button type="submit" class="btn btn-success waves-effect waves-light pull-right">Save</button>
        </form>
    </div>
</div>
<!-- Basic Form Inputs card end -->
@endsection


@section('footer-src')

<script>
$(function(){
    var productIngredientList = '';

    function initProductIngredientList() {
        getProductIngredientList();
        
    }

    function addNewProductIngredientRow() {
        $("#product-ingredient-list").append(productIngredientList);
        refreshSelect2();
    }

    function refreshSelect2() {
        $(".iProductIngredientList").select2();
    }


    function getProductIngredientList() {
        var _token = "{{ csrf_token() }}";
        $.ajax({
            type:'POST',
            url:"{{ route('ajax.find-product-ingredient') }}",
            data: {
                _token: _token
            },
            success:function(data) {
                if(data.status == 1) {
                    productIngredientList = data.data.row
                    $("#product-ingredient").html(data.data.table);
                    refreshSelect2();
                }
            }
        });
    }
    

    $('body').on('change', '.iProductId', function() {
        // var val = $(this).val();
        var src = $('.iProductId option:selected').attr('data-image');
        var tr = $(this).closest('tr').find('img').attr('src', src);
    });

    $('body').on('change', '#stock_type', function() {
        var val = $(this).val();
        if(val == 'ingredient') {
            initProductIngredientList();
        } else {
            $("#product-ingredient").html('');
        }
    });


    $('body').on('click', '.btn-new-row', function() {
        addNewProductIngredientRow();
    });

    $('body').on('click', '.btn-delete', function() {
        var tr = $(this).closest('tr')
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3f51b5',
            cancelButtonColor: '#ff4081',
            confirmButtonText: 'Great ',
            buttons: {
                cancel: {
                    text: "Cancel",
                    value: null,
                    visible: true,
                    className: "btn btn-danger",
                    closeModal: true,
                },
                confirm: {
                    text: "OK",
                    value: true,
                    visible: true,
                    className: "btn btn-primary",
                    closeModal: true
                }
            }
        }).then((result) => {
            if (result) {
                tr.remove();
            }
        })
    });
})
</script>
@endsection