@extends('dashboard.app')

@section('title', 'Courses')

@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12 text-center">
                            <h1 class="font-weight-bold" style="font-size: 2em; color: #007bff;">Courses</h1>
                            <p class="font-weight-normal" style="font-size: 1.2em;">List of all Available Courses</p>
                            <a href="{{ route('courses.create') }}" class="btn btn-primary position-absolute"
                                style="top: 0; right: 0;">Add Course</a>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- courses -->
            <section class="content">
                <div class="container-fluid">
                    <x-success-state />
                    <x-error-state />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body p-0">
                                    @if (empty($courses->items()))
                                        <x-empty-state>{{ 'Courses' }}</x-empty-state>
                                    @else
                                        <div class="card-header">
                                            <h3 class="card-title text-center" style="font-size: 1.5em;">Courses</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <table class="table table-sm table-bordered border-primary "
                                            style="table-layout: fixed; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5%; text-align: center; padding: 10px;">#</th>
                                                    <th style="width: 15%; text-align: center; padding: 10px;">Title</th>
                                                    <th style="width: 23%; text-align: center; padding: 10px;">Image</th>
                                                    <th style="width: 25%; text-align: center; padding: 10px;">Description
                                                    </th>
                                                    <th style="width: 9%; text-align: center; padding: 10px;">Price</th>
                                                    <th style="width: 7%; text-align: center; padding: 10px;">Show</th>
                                                    <th style="width: 6%; text-align: center; padding: 10px;">Edit</th>
                                                    <th style="width: 8%; text-align: center; padding: 10px;">Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($courses as $course)
                                                    <tr>
                                                        <td style="text-align: center; word-wrap: break-word;">
                                                            {{ $loop->iteration }}
                                                        </td>
                                                        <td style="text-align: center; word-wrap: break-word;">
                                                            {{ $course->title }}
                                                        </td>
                                                        <td style="text-align: center; word-wrap: break-word;">
                                                            <img src="{{ asset("uploads/courses/{$course->image}") }}"
                                                                alt="=course" class="img-fluid rounded"
                                                                style="max-width: 200px; height: auto;">
                                                        </td>
                                                        <td style="text-align: center; word-wrap: break-word;">
                                                            {{ Str::limit($course->description, end: '...') }}
                                                        </td>
                                                        <th style="text-align: center; word-wrap: break-word;">
                                                            {{ number_format($course->price, 2) }} EGP</th>
                                                        </th>
                                                        <td style="text-align: center;">
                                                            <a class="btn btn-primary"
                                                                href="{{ route('courses.show', $course->id) }}">Show</a>
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <a class="btn btn-success"
                                                                href="{{ route('courses.edit', $course->id) }}">Edit</a>
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <form action="{{ route('courses.destroy', $course->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    {{ $courses->links() }}
                </div>
            </section>
            <!-- end courses -->
        </div>
    </main>


@endsection
