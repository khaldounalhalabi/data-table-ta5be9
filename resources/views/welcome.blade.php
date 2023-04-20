<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap.min.css">
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/b-2.3.6/datatables.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"/>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css"/>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css"/>

    <script src="https://code.jquery.com/jquery-3.6.4.js"
            integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/b-2.3.6/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.8/sweetalert2.min.js"
            integrity="sha512-ySDkgzoUz5V9hQAlAg0uMRJXZPfZjE8QiW0fFMW7Jm15pBfNn3kbGsOis5lPxswtpxyY3wF5hFKHi+R/XitalA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
<div class="container border">
    <div class="card-header card-title">Manage Users</div>
    <a href="{{route('users.create')}}" class="btn btn-primary float-end"><i
            class="bi bi-file-earmark-plus"></i></a>
    <div class="card-body">
        <div>
            <table class="table table-striped border" id="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>first_name</th>
                    <th>last_name</th>
                    <th>Email</th>
                    <th>house</th>
                    <th>books</th>
                    <th>friends</th>
                    <th>actions</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<style>
    table.dataTable td {
        text-align: center;
    }

    table.dataTable th {
        text-align: center;
    }
</style>

@vite(['resources/js/app.js'])
<script type="module">
    $(document).ready(function () {
        let table;
        $(function () {
            table = $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("user.data") }}',
                columns: [
                    {'data': 'id'},
                    {"data": 'first_name', orderable: true},
                    {"data": 'last_name', orderable: true},
                    {"data": 'email', orderable: true},
                    {"data": 'house', searchable: true, orderable: false},
                    {"data": 'books', searchable: true, orderable: false},
                    {"data": 'friends', searchable: true, orderable: false},
                    {"data": 'action', searchable: false, orderable: false},
                ]
            });

            table.on('click', '.remove-item-from-table-btn', function () {
                let $this = $(this);
                let url = $this.data('deleteurl');
                Swal.fire({
                    title: 'Do you want to delete this item?',
                    showDenyButton: true,
                    confirmButtonText: 'Yes',
                    confirmButtonColor:'#0d6efd',
                    denyButtonText: `No`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': "{{csrf_token()}}"
                            }
                        });
                        $.ajax({
                            "method": "DELETE",
                            "url": url,
                            success: function () {
                                $this.parent().parent().parent().remove();
                            }
                        });
                        Swal.fire('Deleted!', '', 'success')
                    }
                })
            });
        });
    });
</script>
</body>

</html>
