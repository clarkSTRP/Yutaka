@extends('admin.layout')

@section('content')

<div class="container-fluid mt-5">
    <div class="row justify-content-between align-items-center mb-4">
        <div class="col-lg-6">
            <h2 class="mb-0">Manage Offers</h2>
        </div>
        <div class="col-lg-6 text-right">
            <a class="btn btn-success" href="{{ route('post.create') }}">Create New Offer</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Type</th>
                <th>Location</th>
                <th>Description</th>
                <th>Salary</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($post as $posts)
            <tr>
                <td>{{ $posts['id'] }}</td>
                <td>{{ $posts['price'] }}</td>
                <td>{{ $posts['name'] }}</td>
                <td>{{ $posts['street'] }}</td>
                <td>{{ $posts['author'] }}</td>
                <td>{{ $posts['adress'] }}</td>
                <td>{{ $posts['content'] }}</td>
                <td>{{ $posts['user_id'] }}</td>
                <td>
                    <form action="{{ route('post.destroy',$posts->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('post.show',$posts->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('post.edit',$posts->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    {!! $post->links() !!}
</div>

@endsection
