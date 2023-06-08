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
                    <style>
                        .small-font {
                            font-size: 14px; /* Adjust the font size as needed */
                        }
                    </style>

                    <div class="card-body">
                        <p class="card-text">View, add, edit, and delete users from the system.</p>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('user.index') }}" class="btn btn-primary btn-block small-font">Voir les utilisateurs</a>
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-warning btn-block small-font" href="{{ route('users.needing.authorization') }}">
                                    {{ $countWaitingUsers }} Utilisateurs en attente d'authentification
                                </a>
                            </div>
                        </div>
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