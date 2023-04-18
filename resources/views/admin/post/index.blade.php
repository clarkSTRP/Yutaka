@extends('layouts.app')

@section('content')

<div class="container-fluid mt-5">
    <div class="row justify-content-between align-items-center mb-4">
        <div class="col-lg-6">
            <h2 class="mb-0">Gestion des postes</h2>
        </div>
        
        <div class="col-lg-6 col-md-12 text-md-right text-center">
            <a class="btn btn-success" href="{{ route('post.create') }}">Creer un nouveau poste</a>
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
                <th>id</th>
                <th>nom</th>
                <th>auteur</th>
                <th>prix</th>
                <th>rue</th>
                <th>adresse</th>
                <th>contenu</th>
                <th>date de creation</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($post as $posts)
            <tr>
                <td>{{ $posts['id'] }}</td>
                <td>{{ $posts['name'] }}</td>
                <td>{{ $posts['author'] }}</td>
                <td>{{ $posts['price'] }}</td>
                <td>{{ $posts['street'] }}</td>
                <td>{{ $posts['adress'] }}</td>
                <td>{{ $posts['content'] }}</td>
                <td>{{ $posts['created_at'] }}</td>
                <td>
                    <form action="{{ route('post.destroy',$posts->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('post.edit',$posts->id) }}">Edition</a>
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
