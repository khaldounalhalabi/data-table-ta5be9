@extends('layout')
@section('content')
    <main id="main" class="main">
        <section class="section profile">
            <div class="card">
                <div class="card-body">
                    <div class="card-header card-title">Manage Users
                        <a href="{{route('users.create')}}" class="btn btn-primary float-end">
                            <i class="bi bi-file-earmark-plus"></i>
                        </a>
                    </div>
                    <table class="table table-striped table-bordered pt-2" style="width:100%;margin: -2%;" id="table">
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
                    <style>
                        table.dataTable td {
                            text-align: center;
                        }

                        table.dataTable th {
                            text-align: center;
                        }
                    </style>
                </div>
            </div>
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
                                confirmButtonColor: '#0d6efd',
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
        </section>
    </main>
@endsection
