@extends('admin.layouts.main')

@section('style')
    <link rel="stylesheet" href="{{ asset('dashboard/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('dashboard/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
    <div>
        <div class="alert  alert-success alert-dismissible fade show d-none" role="alert">
            <span class="badge badge-pill badge-success mr-2">Success</span> <span id="success"></span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>

    <div uk-spinner class="justify-content-center d-none" id="spinner"></div>

    <div>
        <div class="alert  alert-danger alert-dismissible fade show d-none" role="alert">
            <span class="badge badge-pill badge-danger mr-2">Error</span><span id="error"></span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Admins Table</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="show-users">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div>
@endsection

@section('script')
    <script src="{{ asset('dashboard/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/init-scripts/data-table/datatables-init.js') }}"></script>

    <script>
        function getAllUsers() {
            $('#show-users').html(
                `<tr><td colspan='5'><div uk-spinner class="justify-content-center d-flex" id="spinner"></div></td></tr>`
            );
            $.ajax({
                url: '/seller/read',
                method: 'get',
                dataType: 'JSON',
                success: function(response) {
                    let users = response.message;
                    let row = '';
                    users.forEach((user) => {
                        row += `
                        <tr>
                            <td>${user.name}</td>
                            <td>${user.email}</td>
                            <td>${user.phone}</td>
                            <td><button class='d-block m-auto btn btn-warning btn-sm'><a href='/admin/seller/${user.id}/cars'>Show Cars</a></button></td>
                        </tr>
                    `;
                    });

                    if (row == '') {
                        row =
                            `<tr><td class='text-center' colspan='4'>No data available in table</td></tr>`;
                    }
                    $('#show-users').html(row);
                }
            });
        }
        getAllUsers();
    </script>
@endsection
