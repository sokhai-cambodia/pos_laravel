@extends('layouts.cms.template', compact('title','icon'))

@include('layouts.cms.data-table-header')

@section('content')
 <!-- animation modal Dialogs start -->
<div class="modal fade" id="view-info" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View User Information</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="card-sub">
                    <img class="card-img-top" src="http://localhost:8000/assets/uploads/1555473507user.png" alt="Card image cap" style="width: 50%; margin: 0 auto;">
                    <div class="card-block">
                        <h3 class="card-title text-center">User Name</h3>
                        <h6 class="card-title text-center">User Role</h6>
                        <div class="col-sm-12">
                                <h4 class="sub-title">User Detail</h4>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="input-group input-group-warning">
                                            <span class="input-group-prepend"><label class="input-group-text"><i class="icofont icofont-queen"></i></label></span>
                                            <input type="text" class="form-control" placeholder="input-group-warning">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-group input-group-default">
                                            <span class="input-group-prepend"><label class="input-group-text"><i class="icofont icofont-shield"></i></label></span>
                                            <input type="text" class="form-control" placeholder="input-group-default">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="input-group input-group-danger">
                                            <span class="input-group-prepend"><label class="input-group-text"><i class="icofont icofont-volume-down"></i></label></span>
                                            <input type="text" class="form-control" placeholder="input-group-danger">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-group input-group-success">
                                            <span class="input-group-prepend"><label class="input-group-text"><i class="icofont icofont-volume-off"></i></label></span>
                                            <input type="text" class="form-control" placeholder="input-group-success">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="input-group input-group-inverse">
                                            <span class="input-group-prepend"><label class="input-group-text"><i class="icofont icofont-wifi"></i></label></span>
                                            <input type="text" class="form-control" placeholder="input-group-inverse">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-group input-group-info">
                                            <span class="input-group-prepend"><label class="input-group-text"><i class="icofont icofont-signal"></i></label></span>
                                            <input type="text" class="form-control" placeholder="input-group-info">
                                        </div>
                                    </div>
                                </div>
                            </div>
                       
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--animation modal  Dialogs ends -->

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
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Gender</th>
                        <th>DOB</th>
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
                ajax: "{{ route('user.lists') }}",
                columns: [
                    { name: 'id' },
                    { name: 'thumbnail', orderable: false, searchable: false },
                    { name: 'name' },
                    { name: 'username' },
                    { name: 'gender', searchable: false},
                    { name: 'dob', orderable: false, searchable: false },
                    { name: 'action', orderable: false, searchable: false },
                ],
            });

            // delete popup
            $('body').on('click', '.btn-delete', function() {
                var url = $(this).attr('data-url');
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
                        window.location.href = url;
                    }
                })
            });

            // open modal
            $('#view-info').modal('show');
            $('body').on('click', '.view-info', function() {
                $('#view-info').modal('show');
            });

        });
    </script>
@endsection

