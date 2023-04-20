<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/b-2.3.6/datatables.min.js"></script>

</head>
<body>
<div class="card p-5 w-70 h-100 container-fluid mt-5">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 border">
                <h5>First Name : </h5>
            </div>
            <div class="col-md-6 border">
                <h5>{{$user->first_name}}</h5>
            </div>

            <div class="col-md-6 border">
                <h5>Last Name : </h5>
            </div>
            <div class="col-md-6 border">
                <h5>{{$user->last_name}}</h5>
            </div>

            <div class="col-md-6 border">
                <h5>Email : </h5>
            </div>
            <div class="col-md-6 border">
                <h5>{{$user->email}}</h5>
            </div>

            <div class="col-md-6 border">
                <h5>House : </h5>
            </div>
            <div class="col-md-6 border">
                <h5>{{$userHouse->address}}</h5>
            </div>

            <div class="col-md-12 pt-5 text-center">
                <h5>Friends</h5>
            </div>

            <div class="col-md-12 pt-2 text-center">
                <table class="table table-bordered">
                    <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($friends as $friend)
                        <tr>

                            <td>{{$friend->id}}</td>
                            <td>{{$friend->name}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

            <div class="col-md-12 pt-5 text-center">
                <h5>Files</h5>
            </div>
            <div class="col-md-12 pt-2 text-center">
                <table class="table table-bordered">
                    <thead class="table-warning">
                    <tr>
                        <th>Id</th>
                        <th>Path</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @foreach($files as $file)
                            <td>{{$file->id}}</td>
                            <td>{{$file->path}}</td>
                            <td>{{$file->type}}</td>
                        @endforeach
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="text-center">
                <a href="{{route('users.edit' , $user->id)}}">
                    <button class="btn btn-primary">Edit</button>
                </a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
