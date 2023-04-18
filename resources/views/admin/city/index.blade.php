@extends('layouts.app')

@section('content')

<div class="container-fluid mt-5">
    <div class="row justify-content-between align-items-center mb-4">
        <div class="col-lg-6">
            <h2 class="mb-0">Gestion des villes</h2>
        </div>
        <div class="col-lg-6 col-md-12 text-md-right text-center">
            <a class="btn btn-success" href="{{ route('city.create') }}">Ajouter une nouvelle ville</a>
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
                <th>Nom</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($city as $cities)
            <tr>
                <td>{{ $cities ['name'] }}</td>

                <td>
                    <form action="{{ route('city.destroy',$cities->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    {!! $city->links() !!}
</div>

@endsection
