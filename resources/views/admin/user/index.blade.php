@extends('admin.layout')

@section('content')

<div class="container-fluid mt-5">
    <div class="row justify-content-between align-items-center mb-4">
        <div class="col-lg-6">
            <h2 class="mb-0">Manage Users</h2>
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
            @foreach ($user as $users)
            <tr>
                <td>{{ $users['id'] }}</td>
                <td>{{ $users['name'] }}</td>
                <td>{{ $users['email'] }}</td>
                <td>
                    <form action="{{ route('user.destroy',$users->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    {!! $user->links() !!}
</div>

@endsection
