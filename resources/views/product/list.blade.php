@extends('layout.master')
@push('css')
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/date-1.1.2/fc-4.1.0/fh-3.2.4/kt-2.7.0/r-2.3.0/rg-1.2.0/sc-2.0.7/sb-1.3.4/sl-1.4.0/datatables.min.css" />
@endpush
@section('content')
<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>
    <div class="container">
        <div class="row">

            <!--  <form action="" method="get" class="mb-3">
                    <div class="row">
                        <div class="col-3">
                            <input type="search" class="form-control" placeholder="Search...">
                        </div>
                    </div>
                </form> -->


            <table class="table table-bordered table-hover" id="table-list">
                <!-- <button  class= "btn btn-success " >

                     </button> -->
                <a href=" {{route('addnew')}} ">Add user</a>
                <br>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name Manufacture</th>
                        <th>Name Product</th>
                        <th>Quantity</th>
                        <th>Avatar</th>
                        <th>Price</th>
                        <th>Description</th>

                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($data as $val)

                    <tr>
                        <td>{{$val['id']}}</td>
                        <td>{{$val['manufacturers_id']}}</td>
                        <td>{{$val['name']}}</td>
                        <td>{{$val['quantity']}}</td>
                        <td>
                            <img src="{{ public_path() }}/${avatar} ">
                        </td>
                        <td>{{$val['price']}}</td>
                        <td>{{$val['description']}}</td>
                        <td>{{$val['status']}}</td>
                        <td>
                            <form method="post" action="{{route('products.destroy',$val['id'])}}">
                                @csrf
                                @method('DELETE')
                                <!-- <a href="{{route('products.destroy',$val['id'])}}" class="btn btn-danger">delete</a> -->
                                <a href="{{route('products.edit',$val['id'])}}" class="btn btn-primary">Edit</a>
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!--  pagination -->
            {{ $data -> links() }}

        </div>
    </div>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>

</html>

@endsection
@push('js')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript"
    src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/date-1.1.2/fc-4.1.0/fh-3.2.4/kt-2.7.0/r-2.3.0/rg-1.2.0/sc-2.0.7/sb-1.3.4/sl-1.4.0/datatables.min.js">


</script>