@extends('layouts.cms.template', compact('title','icon'))

@section('content')
<!-- Default ordering table start -->
<form action="{{ route('stock.stock-in') }}" method="POST">
<div class="card">
    <div class="card-header">
        Search
    </div>
    <div class="card-block">
        <div class="form-group row">
            <div class="col-sm-3">
                <select class="browser-default custom-select" name="from_branch_id">
                    @foreach ($branches as $branch)
                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-9">
                <div class="form-group">
                <input type="text" id="search-product" class="form-control" placeholder="Search Product" onkeypress="if (event.keyCode == 13) return false;">
                </div>
            </div>
        </div>
    </div>

</div>
<div class="card">
    <div class="card-header">
        <h5>Stock In</h5>
    </div>

    <div class="card-block">

            @csrf
            <table class="table" id="product-table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Name</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id='table-list'>

                </tbody>
            </table>
            <button type="submit" class="btn btn-success waves-effect waves-light pull-right">Save</button>

    </div>
</div>
</form>
<!-- Default ordering table end -->
@endsection

@section('footer-src')
<script>
$(function(){
    // delete pop up
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
                generateProductNo();
            }
        })
    });

    // autocomplete
    $( "#search-product" ).autocomplete({
        source: function( request, response ) {
        $.ajax({
            url: "{{ route('stock.find-stock-in-product') }}",
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
            event.preventDefault();
            return false;
        }
    });

    function existProductIngredient(id) {
        $result = false;
        $('#product-table > tbody  > tr').each(function(ind, tr) {
            var bookid = $(tr).find('.product_id').val();
            if(bookid == id) {
                $result = true;
                return false;
            }
        });
        return $result;
    }

    function generateProductNo() {
        $('#product-table > tbody  > tr').each(function(ind, tr) {
            $(tr).find('.product_no').text(ind + 1);
            $(tr).find('.product_id').attr('name', 'inventory['+ ind +'][product_id]');
            $(tr).find('.unit_id').attr('name', 'inventory['+ ind +'][unit_id]');
            $(tr).find('.quantity').attr('name', 'inventory['+ ind +'][quantity]');
        });
    }

    function getProductIngredient(id) {

        $.ajax({
            url: "{{ route('stock.find-stock-in-product-by-id') }}",
            method: 'get',
            dataType : 'json',
            data: {
                id : id
            },
            success: function(result){
                if(result.status == 1) {
                    $("#table-list").append(result.tr);
                    generateProductNo();
                } else {
                    alert('no data');
                }


            }
        })
    }
})
</script>
@endsection




