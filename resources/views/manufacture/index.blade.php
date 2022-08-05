@extends('layout.master')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('manufactures.create') }}"> Create New manufactures</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $n=1;?>
        @foreach ($manufacture as $val)
        <tr>
            <td>{{$n++}}</td>
            <td>{{ $val['name'] }}</td>

            <td>
                <form action="{{ route('manufactures.destroy',$val->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('manufactures.show',$val->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('manufactures.edit',$val->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>

{!! $manufacture->links() !!}

@endsection
