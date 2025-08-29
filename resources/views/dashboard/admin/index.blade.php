@extends('dashboard.app')

@section('title', 'Home')

@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <!-- <h2>Section title</h2> -->
                    <h2 class="h5 page-title">Dashboard</h2>
                    <p class="text-muted">Welcome to your dashboard. Here's a quick snapshot of your key metrics and
                        activities.

                    </p>
                    <div class="row">
                        {{-- Admins --}}
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>Admins</h3>
                                    <p>{{ $admins ?: 'N/A' }}</p>
                                </div>
                                <div class="icon">
                                    <i class="fa-solid fa-user-tie"></i>
                                </div>
                                <a href="{{ route('admins.index') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        {{-- Categories --}}
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>Categories</h3>
                                    <p>{{ $categories ?: 'N/A' }}</p>
                                </div>
                                <div class="icon">
                                    <i class="fa-solid fa-list"></i>
                                </div>
                                <a href="{{ route('categories.index') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        {{-- Courses --}}
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-light">
                                <div class="inner">
                                    <h3>Courses</h3>
                                    <p>{{ $courses ?: 'N/A' }}</p>
                                </div>
                                <div class="icon">
                                    <i class="fa-solid fa-book-open-reader"></i>
                                </div>
                                <a href="{{ route('courses.index') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        {{-- Feedbacks  --}}
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>Feedbacks</h3>
                                    <p>{{ $feedbacks ?: 'N/A' }}</p>
                                </div>
                                <div class="icon">
                                    <i class="fa-solid fa-star"></i>
                                </div>
                                <a href="" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        {{-- Instructors --}}
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>Instructors</h3>
                                    <p>{{ $instructors ?: 'N/A' }}</p>
                                </div>
                                <div class="icon">
                                    <i class="fa-solid fa-user-tie"></i>
                                </div>
                                <a href="{{ route('instructors.index') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        {{--  Messages --}}
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-secondary">
                                <div class="inner">
                                    <h3>Messages</h3>
                                    <p>{{ $messages ?: 'N/A' }}</p>
                                </div>
                                <div class="icon">
                                    <i class="fa-solid fa-message"></i>
                                </div>
                                <a href="{{ route('messages.index') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        {{-- Specialities --}}
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3>Specialities</h3>
                                    <p>{{ $specialities ?: 'N/A' }}</p>
                                </div>
                                <div class="icon">
                                    <i class="fa-solid fa-user-tie"></i>
                                </div>
                                <a href="{{ route('specialities.index') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        {{-- Users --}}
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>Users</h3>
                                    <p>{{ $users ?: 'N/A' }}</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <a href="{{ route('users.index') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div> <!-- end section -->

                </div>
                <div class="col-12">
                    <!-- <h2>Section title</h2> -->
                    <h2 class="h5 page-title">Website Settings</h2>
                    <div class="row">
                        {{-- Contacts --}}
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>Contacts</h3>
                                    <p>{{ $contacts ?: 'N/A' }}</p>
                                </div>
                                <div class="icon">
                                    <i class="fa-solid fa-address-card"></i>
                                </div>
                                <a href="" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        {{-- Sliders --}}
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3>Sliders</h3>
                                    <p>{{ $sliders ?: 'N/A' }}</p>
                                </div>
                                <div class="icon">
                                    <i class="fa-solid fa-sliders"></i>
                                </div>
                                <a href="" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div> <!-- .row -->
            </div>
        </div> <!-- .container-fluid -->
    </main>


@endsection
