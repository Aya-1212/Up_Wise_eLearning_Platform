@extends('dashboard.app')

@section('title', "Instructor {$instructor->id}")

@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12 text-center">
                            <h1 class="font-weight-bold" style="font-size: 2em; color: #007bff;">Instructor:
                                {{ $instructor->name }}
                            </h1>
                            <p class="font-weight-normal" style="font-size: 1.2em;">Detailed information about the instructor
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- instructor Info -->
            <section class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="card">
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><strong>Name:</strong> {{ $instructor->name }}</li>
                                        <li class="list-group-item"><strong>Email:</strong> {{ $instructor->email }}</li>
                                        <li class="list-group-item"><strong>Image:</strong> <img
                                                src="{{ asset("uploads/instructors/{$instructor->image}") }}"
                                                alt="{{ $instructor->title }}" class="img-fluid rounded"
                                                style="max-width: 300px; height: auto;">
                                        </li>
                                        <li class="list-group-item"><strong>LinkedIn:</strong> <a
                                                href="{{ $instructor->linkedin_url }}">{{ $instructor->linkedin_url }}</a></li>
                                        <li class="list-group-item"><strong>Created At:</strong>
                                            {{ $instructor->created_at ? $instructor->created_at->format('Y-m-d H:i') : '---' }}
                                        </li>
                                        <li class="list-group-item"><strong>Updated At:</strong>
                                            {{ $instructor->updated_at ? $instructor->updated_at->format('Y-m-d H:i') : '---' }}
                                        </li>
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
