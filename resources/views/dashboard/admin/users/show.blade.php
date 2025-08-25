@extends('dashboard.app')

@section('title', "User {$user->id} Profile")

@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12 text-center">
                            <h1 class="font-weight-bold" style="font-size: 2em; color: #007bff;">User: {{ $user->name }}
                            </h1>
                            <p class="font-weight-normal" style="font-size: 1.2em;">Detailed information about the user</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- user Info -->
            <section class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="card">
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><strong>Name:</strong> {{ $user->name }}</li>
                                        <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
                                        <li class="list-group-item"><strong>Image:</strong> <img
                                                src="{{ asset("uploads/users/{$user->image}" ) }}" alt="{{ $user->name }}"
                                                width="120" height="120" class="rounded">
                                        </li>
                                        <li class="list-group-item"><strong>Phone:</strong> {{ $user->phone ?? '-' }}</li>
                                        <li class="list-group-item"><strong>Created At:</strong>
                                            {{ $user->created_at->format('Y-m-d H:i') ?? '-' }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
