@extends('layouts.cms.template', compact('title','icon'))

@section('content')
 <!-- Basic Form Inputs card start -->
 <div class="card">
    <div class="card-header">
        <h5>{{ $title }}</h5>
        <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
    </div>
    <div class="card-block">
        <form action="{{ route('product.update', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control"
                    placeholder="Enter Name" value="{{ UtilHelper::hasValue(old('name'), $product->name) }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Photo</label>
                <div class="col-sm-10">
                    <input type="file" name="photo" class="form-control dropify" data-default-file="{{ $product->getPhoto() }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea rows="5" cols="5" name="description" class="form-control"
                        placeholder="Enter Description">{{ UtilHelper::hasValue(old('description'), $product->description) }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                    <select name="category_id" class="form-control">
                        @foreach ($categories as $category)
                            @php 
                                $cSelected = UtilHelper::hasValue(old('category_id'), $product->category_id);
                            @endphp
                            <option value="{{ $category->id }}" {{  UtilHelper::selected($category->id, $cSelected) }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Unit</label>
                <div class="col-sm-10">
                    <select name="unit_id" class="form-control">
                        @foreach ($units as $unit)
                            @php 
                                $uSelected = UtilHelper::hasValue(old('unit_id'), $unit->unit_id);
                            @endphp
                            <option value="{{ $unit->id }}" {{  UtilHelper::selected($unit->id, $uSelected) }}>{{ $unit->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input type="number" required step="0.01" name="price" class="form-control"
                    placeholder="Enter Price" value="{{ UtilHelper::hasValue(old('price'), $product->price) }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Quanity For Cut Stock</label>
                <div class="col-sm-10">
                    <input type="number" required step="0.01" name="quanity_for_cut_stock" class="form-control"
                    placeholder="Enter Name" value="{{ UtilHelper::hasValue(old('quanity_for_cut_stock'), $product->quanity_for_cut_stock) }}">
                </div>
            </div>
          
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Is Ingredient</label>
                <div class="col-sm-10 col-sm-offset-2">
                    <div class="border-checkbox-section">
                        <div class="border-checkbox-group border-checkbox-group-primary">
                            @php 
                                $active = UtilHelper::hasValue(old('is_ingredient'), $product->is_ingredient);
                            @endphp
                            <input class="border-checkbox" type="checkbox" id="is_ingredient" name="is_ingredient" {{ UtilHelper::checked($active, 1) }} value="1">
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
                            @php 
                                $stSelected = UtilHelper::hasValue(old('stock_type'), $product->stock_type);
                            @endphp
                            <option value="{{ $stock_type }}" {{  UtilHelper::selected($stock_type, $stSelected) }}>{{ $stock_type }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div id="product-ingredient">
                {{-- Search --}}
                <div class="form-group row" >
                    <label class="col-sm-2 col-form-label">Search</label>
                    <div class="col-sm-10">
                        <input type="text" name="search" id="search-product-ingredient" class="form-control"
                        placeholder="Search By Product Name">
                    </div>
                </div>
                {{-- #Search --}}
                {{-- Detail --}}
                <div>
                    <div class="table-responsive">
                        <table class="table table-styling" id="product-ingredient-table">
                            <thead>
                                <tr class="table-primary">
                                    <th>
                                        Photo
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Unit
                                    </th>
                                    <th>
                                        Quanity
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody id='product-ingredient-list'>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- #Detail --}}
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

    
    $('body').on('change', '#stock_type', function() {
        var val = $(this).val();
        if(val == 'ingredient') {
            $("#product-ingredient").show();
        } else {
            $("#product-ingredient").hide();
            $("#product-ingredient-list").html('');
        }
    });

    function updateStockTypeChange() {
        var val = $("#stock_type").val();
        if(val == 'ingredient') {
            $("#product-ingredient").show();
            $.ajax({
                url: "{{ route('ajax.find-update-product-ingredient-by-id') }}",
                method: 'get',
                dataType : 'json',
                data: {
                    id : "{{ $product->id }}"
                },
                success: function(result){
                    if(result.status == 1) {
                        $("#product-ingredient-list").append(result.tr);
                    } else {
                        alert('no data');
                    }
                }
            })
        } else {
            $("#product-ingredient").hide();
            $("#product-ingredient-list").html('');
        }
    }

    updateStockTypeChange();

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

    // autocomplete
    $( "#search-product-ingredient" ).autocomplete({
        source: function( request, response ) {
        // Fetch data
        console.log(request);
        $.ajax({
            url: "{{ route('ajax.find-product-ingredient') }}",
            type: 'get',
            dataType: "json",
            data: {
                search: request.term
            },
            success: function( data ) {
                response( data );
            }
        });
        },
        select: function (event, ui) {
            if(!existProductIngredient(ui.item.value)) getProductIngredient(ui.item.value);
            return false;
        }
    });

    function existProductIngredient(id) {
        $result = false;
        $('#product-ingredient-table > tbody  > tr').each(function(ind, tr) {
            var bookid = $(tr).find('.i_product_id').val();
            if(bookid == id) {
                $result = true;
                return false;
            }
        });
        return $result;
    }

    function getProductIngredient(id) {

        $.ajax({
            url: "{{ route('ajax.find-product-ingredient-by-id') }}",
            method: 'get',
            dataType : 'json',
            data: {
                id : id
            },
            success: function(result){
                if(result.status == 1) {
                    $("#product-ingredient-list").append(result.tr);
                } else {
                    alert('no data');
                }
                
                
            }
        })
    }

})
</script>
@endsection