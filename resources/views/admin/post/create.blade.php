@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Offers</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('post.index') }}"> Back</a>
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
                    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <label>Filtrer par localisation</label>
                                <select name="cities_id" class="form-select">
                                @foreach ($city as $cities)
                                    <option   value="{{ $cities['id'] }}">{{ $cities['id'] }}{{ $cities['name'] }}</option>
                                @endforeach
                                </select>
                        <div class="form-group">
                            <label for="title">Price:</label>
                            
                            <input type="text" name="price" class="form-control" placeholder="Enter price">
                        </div>
                        <div class="form-group">
                            <label for="location">Street:</label>
                            <input type="text" name="street" class="form-control" placeholder="Enter street">
                        </div>
                        <!-- <div class="form-group">
                            <label for="location">Userid:</label>
                            <input type="text" name="user_id" class="form-control" placeholder="userid">
                        </div> -->
                        <div class="form-group">
                            <label for="type">Name:</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="salary">Author:</label>
                            <input type="text" name="author" class="form-control" placeholder="Enter author">
                        </div>
                        <div class="form-group">
                            <label for="available_for">Adress:</label>
                            <input type="text" name="adress" class="form-control" placeholder="Enter adress">
                        </div>
                        <div class="form-group">
                            <label for="description">Content:</label>
                            <textarea class="form-control" name="content" rows="5" placeholder="Enter content"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="available_for">Image:</label>
                            <input type="file" name="image" class="form-control" placeholder="image">
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
