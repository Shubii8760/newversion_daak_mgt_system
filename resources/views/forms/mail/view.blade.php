@extends('layouts.app')
@section('content')
    <div class="container ">
        <div class="row">
                <div class="card mt-3 " style="width: 130%; border-radius:15px;">
                    <div class="card-body">
                        <div class="container-fluid ">
                            <table id="yajra-datatable" class="table">

                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Is Valid</th>
                                        <th>Phone Number</th>
                                        <th>Message</th>
                                        <th>Type</th>
                                        <th>File</th>
                                        @if (Auth::user()->role_id == '1')
                                            <th>Edit </th>
                                            <th>Delete</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            {{-- </div> --}}
        </div>
    </div>
@endsection
@push('style')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css"
        integrity="sha512-0V10q+b1Iumz67sVDL8LPFZEEavo6H/nBSyghr7mm9JEQkOAm91HNoZQRvQdjennBb/oEuW+8oZHVpIKq+d25g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-radius: 4px;
        }

        table.dataTable tbody td {
            word-break: break-word;
            word-break: break-all;
            white-space: normal;
        }
    </style>
@endpush
@push('scripts')
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"
        integrity="sha512-zP5W8791v1A6FToy+viyoyUUyjCzx+4K8XZCKzW28AnCoepPNIXecxh9mvGuy3Rt78OzEsU+VCvcObwAMvBAww=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js">
    </script>
    <script type="text/javascript">
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(function() {

            var table = $('#yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('view') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'is_verified',
                        name: 'is_verified'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'message',
                        name: 'message'
                    },
                    {
                        data: 'type',
                        name: 'type'
                    },
                    {
                        data: 'file',
                        name: 'file'
                    },

                    @if (Auth::user()->role_id == '1')
                        {
                            data: 'edit',
                            name: 'edit'
                        }, {
                            data: 'delete',
                            name: 'delete'
                        }
                    @endif

                ]
            });

        });
    </script>


    <script>
        $(document).on('click', '.delete-application', function() {
            console.log('test')
            let id = $(this).data("id");
            let url = "{{ route('delete', ['id' => ':id']) }}";
            url = url.replace(':id', id)
            $.confirm({
                title: 'Confirm!',
                content: 'Are you sure you want to delete this application?',
                buttons: {
                    confirm: function() {
                        $.ajax({
                            url: url,
                            type: 'DELETE',
                            data: {
                                "_token": '{{ csrf_token() }}'
                            },
                            success: function(res) {
                                if (res.success) {
                                    toastr.success(res.message);
                                    $('#yajra-datatable').DataTable().ajax
                                        .reload();
                                    $.LoadingOverlay("hide");
                                } else {
                                    toastr.error(res.message);
                                }
                            }
                        });
                    },
                    cancel: function() {

                    }
                }
            });
        });
    </script>
@endpush
