@extends('layout.master')

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

            <form action="{{route('addnewpost')}}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <legend>Form add new product</legend>

                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Input field">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <input type="text" class="form-control" name="description" placeholder="Input field">
                </div>

                <div class="form-group">
                    <label for="">Quantity</label>
                    <input type="text" class="form-control" name="quantity" placeholder="Input field">
                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input type="text" class="form-control" name="price" placeholder="Input field">
                </div>
                <br>
                <label for="">Avatar</label>
                <input type="file" name="avatar">

                <br>

                Status
                @foreach ($arrProductStatus as $option => $value)
                <input type="radio" name="status" value="{{$value}}" @if($loop->first)checked @endif>{{ $option }}
                @endforeach <button type="submit" class="btn btn-success">Success</button>
                <br>
                Manufacture
                <select name="manufacturers_id">
                    @foreach ($manufacture as $val)
                    <option value="{{$val['id']}}">
                        {{ $val['name'] }}
                    </option>
                    @endforeach
                </select>
                <br />
                <button type="submit" class="btn  btn-sucess">submit</button>
            </form>

        </div>
    </div>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>

@endsection
