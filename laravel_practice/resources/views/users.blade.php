<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8 Datatables Tutorial - ItSolutionStuff.com</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
    
<div class="container">
    <h1>Laravel 8 Datatables </h1>
    <a href="{{URL::to('/')}}/saveInDB" class="edit btn btn-info btn-sm mb-3 mt-3 ">Add User</a>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Full Data</th>
                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<!-- $btn = '<div class="d-flex"><a href="fullNameBtn/' .data . '" class="edit btn btn-warning btn-sm m-1">FullName</a><a href="editControllerBtn/' . data . '" class="edit btn btn-info btn-sm m-1">Edit</a> <a href="deleteControllerBtn/' . data . '" class=" btn btn-danger btn-sm m-1">Delete</a><div>'; -->

   
</body>
   
<script type="text/javascript">
  $(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
       // ajax: "{{ route('users.index') }}",
        ajax: {
            url: "{{ route('users.index') }}",
            type: "GET",
            data: function (d) {
                // You can pass additional data here
                d.custom_param = 'Mansi';
            },
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'FullName', name: 'FullName'},
            
            {data: 'action', name: 'Actiona', orderable: false, searchable: false,render:function (data,type,row){
                console.log(data);
                 var btn = '<div class="d-flex"><a href="fullNameBtn/' +data + '" class="edit btn btn-warning btn-sm m-1">FullName</a><a href="editControllerBtn/' + data + '" class="edit btn btn-info btn-sm m-1">Edit</a> <a href="deleteControllerBtn/' +data + '" class=" btn btn-danger btn-sm m-1">Delete</a><div>';

               return btn;
            }},
        ]
    });
    
  });
</script>
</html>