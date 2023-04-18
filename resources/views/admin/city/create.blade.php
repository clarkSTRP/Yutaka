@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>ajout d'une ville</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('city.index') }}">retour</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('city.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name:</label>
                            
                            <input type="text" name="name" class="form-control" placeholder="Enter price">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('styles')
    <style>
        .margin-tb {
            margin: 20px 0;
        }
        .card {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        .card-body {
            padding: 20px;
        }
        label {
            font-weight: bold;
        }
    </style>
@endsection
