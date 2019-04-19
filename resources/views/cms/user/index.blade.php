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
            <div class="modal-body" id="model-body">
                
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
                        <th>Branch User</th>
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

