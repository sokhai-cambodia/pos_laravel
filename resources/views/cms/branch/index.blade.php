@php 
$title = 'List Branch';
@endphp
@extends('layouts.cms.template', ['title' => $title])

@include('layouts.cms.data-table-header')

@section('content')
<!-- Default ordering table start -->
<div class="card">
    <div class="card-header">
        <h5>{{ $title }}</h5>
    </div>
    <div class="card-block">
        <div class="dt-responsive table-responsive">
            <table id="listing" class="table table-striped table-bordered nowrap" style="width: 100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
               
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
                responsive: true,
                ajax: "{{ route('branch.lists') }}",
                columns: [
                    { name: 'id' },
                    { name: 'name' },
                    { name: 'address', orderable: false, searchable: false },
                    { name: 'description', orderable: false, searchable: false },
                    { name: 'action', orderable: false, searchable: false },
                ],
            });
        });
    </script>
@endsection