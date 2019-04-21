@extends('layouts.cms.template', compact('title','icon'))

@include('layouts.cms.data-table-header')

@section('content')
<!-- Default ordering table start -->
<div class="card">
    <div class="card-header">
        {{-- <h5>{{ $title }}</h5> --}}
    </div>
    <div class="card-block">
        <div class="dt-responsive table-responsive">
            <table id="listing" class="table table-striped table-bordered nowrap" style="width: 100%">
                <thead>
                    <tr>
                        <th>Invoice No</th>
                        <th>Product</th>
                        <th>Category</th>
                        <th>Quantiry</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Order Date</th>
                        <th>Employee</th>
                        <th>Customer</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>000</td>
                        <td>Sanwidch</td>
                        <td>Food</td>
                        <td>2</td>
                        <td>3.00</td>
                        <td>6.00</td>
                        <td>11/02/2019</td>
                        <td>Dan</td>
                        <td>Room S2</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Default ordering table end -->
@endsection

@section('footer-src')
    @include('layouts.cms.data-table-footer')

    <script>
        $(document).ready(function() {
            $('#listing').DataTable({
                serverSide: true,
                processing: true,
                ajax: "{{ route('product.lists') }}",
                columns: [
                    { name: 'name' },
                    { name: 'thumbnail', orderable: false, searchable: false },
                    { name: 'category', orderable: false, searchable: false },
                    { name: 'stock', orderable: false, searchable: false },
                    { name: 'ingredient', orderable: false, searchable: false},
                    { name: 'price', orderable: false, searchable: false },
                    { name: 'action', orderable: false, searchable: false },
                ],
            });



            // open modal
            //$('#view-info').modal('show');
            $('body').on('click', '.view-info', function() {
                var _token = "{{ csrf_token() }}";
                var user_id = $(this).attr('data-id');
                $.ajax({
                    type:'POST',
                    url:"{{ route('ajax.find-user-info') }}",
                    data: {
                        _token: _token,
                        user_id: user_id
                    },
                    success:function(data) {
                        if(data.status == 1) {
                            $('#model-body').html(data.data);
                            $('#view-info').modal('show');
                        }
                    }
                });

            });

        });
    </script>
@endsection

