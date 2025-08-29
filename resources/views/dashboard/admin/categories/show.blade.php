@extends('dashboard.app')

@section('title', "Category {$category->id}")

@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12 text-center">
                            <h1 class="font-weight-bold" style="font-size: 2em; color: #007bff;">Category:
                                {{ $category->title }}
                            </h1>
                            <p class="font-weight-normal" style="font-size: 1.2em;">Detailed information about the category
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- category Info -->
            <section class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="card">
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><strong>Title:</strong> {{ $category->title }}</li>
                                        <li class="list-group-item"><strong>Image:</strong> <img
                                                src="{{ asset("uploads/categories/{$category->image}") }}"
                                                alt="{{ $category->title }}" class="img-fluid rounded"
                                                style="max-width: 300px; height: auto;">
                                        </li>
                                        <li class="list-group-item"><strong>Created At:</strong>
                                            {{ $category->created_at ? $category->created_at->format('Y-m-d H:i') : '---' }}
                                        </li>
                                        <li class="list-group-item"><strong>Updated At:</strong>
                                            {{ $category->updated_at ? $category->updated_at->format('Y-m-d H:i') : '---' }}
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
