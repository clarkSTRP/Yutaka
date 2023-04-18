@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center align-items-center mb-4">
            <div class="col-lg-6 text-center">
                <h2>Welcome, Admin!</h2>
                <p class="lead">This is your dashboard where you can manage users and offers.</p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Manage Users</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text">View, add, edit, and delete users from the system.</p>
                        <a href="{{route('user.index')}}" class="btn btn-primary">Voir les utilisateurs</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Postes des utilisateurs</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text">View, add, edit, and delete job offers in the system.</p>
                        <a href="{{route('post.index')}}" class="btn btn-primary">Voir les postes</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Gestion des villes</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text">View, add, edit, and delete job offers in the system.</p>
                        <a href="{{route('city.index')}}" class="btn btn-primary">Voir les villes</a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

@endsection