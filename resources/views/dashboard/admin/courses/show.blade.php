@extends('dashboard.app')

@section('title', "Course {$course->id}")

@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <!-- Header -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12 text-center">
                            <h1 class="font-weight-bold" style="font-size: 2em; color: #007bff;">Course #
                                {{ $course->id }}
                            </h1>
                            <p class="font-weight-normal" style="font-size: 1.2em;">Details of the selected course</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Content -->
            <section class="content">
                <div class="container-fluid">
                    <x-success-state />
                    <x-error-state />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="mb-3">Course Information</h5>
                                    <ul>
                                        <li class="list-group-item"><strong>Title:</strong>
                                            {{ Str::ucfirst($course->title) }}
                                        </li>
                                        <li class="list-group-item"><strong>Image:</strong>
                                            <img src="{{ asset("uploads/courses/{$course->image}") }}" alt="=course"
                                                class="img-fluid rounded" style="max-width: 200px; height: auto;">
                                        </li>
                                        <li class="list-group-item"><strong>Description:</strong>
                                            {{ $course->description }}
                                        </li>
                                        <li class="list-group-item"><strong>Price:</strong>
                                            {{ number_format($course->price, 2) }} EGP
                                        </li>
                                        <li class="list-group-item"><strong>Level:</strong>
                                            {{ Str::ucfirst($course->level) }}
                                        </li>
                                        <li class="list-group-item"><strong>Language:</strong>
                                            {{ Str::ucfirst($course->language) }}
                                        </li>
                                        <li class="list-group-item"><strong>Category:</strong>
                                            <a href="{{ route('categories.show', $course->category_id) }}">
                                                {{ $course->category_id }}
                                            </a>
                                        </li>
                                        <li class="list-group-item"><strong>Instructor:</strong>
                                            <a href="{{ route('instructors.show', $course->instructor_id) }}">
                                                {{ $course->instructor_id }}
                                            </a>
                                        </li>
                                        <li class="list-group-item"><strong>Created At:</strong>
                                            {{ $course->created_at ? $course->created_at->format('Y-m-d H:i') : '---' }}
                                        </li>
                                        <li class="list-group-item"><strong>Updated At:</strong>
                                            {{ $course->updated_at ? $course->updated_at->format('Y-m-d H:i') : '---' }}
                                        </li>

                                    </ul>
                                    <h5 class="mt-4 mb-3">Quizzes</h5>
                                    <ul>
                                        @if ($course->quiz)
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <div>
                                                    <strong>{{ $course->quiz->title }}</strong>
                                                </div>
                                                <div>
                                                    <a href="" class="btn btn-primary">Show Quiz</a>
                                                    <a href="" class="btn btn-warning">Edit Quiz</a>
                                                </div>
                                            </li>
                                        @else
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <span class="text-muted">No quiz added for this course.</span>
                                                <a href="" class="btn btn-success">Add Quiz</a>
                                            </li>
                                        @endif
                                    </ul>
                                    <h5 class="mt-4 mb-3">Contents of Course</h5>

                                    @if ($course->contents->isEmpty())
                                        <ul>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <span class="text-muted">No contents added for this course.</span>
                                                <a href="{{ route('contents.create', $course->id) }}" class="btn btn-success">Add Content</a>
                                            </li>
                                        </ul>
                                    @else
                                        <div class="d-flex justify-content-end align-items-center mb-2">
                                            <a href="{{ route('contents.create', $course->id) }}" class="btn btn-primary">
                                                + Add Content
                                            </a>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-sm table-bordered border-primary "
                                           style="table-layout: fixed; width: 100%;">
                                                >
                                                <thead>
                                                    <tr>
                                                        <th style="width: 5%;text-align: center;">#</th>
                                                        <th style="width: 15%;text-align: center;">Title</th>
                                                        <th style="width: 25%;text-align: center;">Description</th>
                                                        <th style="width: 15%;text-align: center;">Created_at</th>
                                                        <th style="width: 15%;text-align: center;">Updated_at</th>
                                                        <th style="width: 8%;text-align: center;">Show</th>
                                                        <th style="width: 8%;text-align: center;">Edit</th>
                                                        <th style="width: 9%;text-align: center;">Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($course->contents as $content)
                                                        <tr>
                                                            <td style="width: 25%;text-align: center;">
                                                                {{ $loop->iteration }}
                                                            </td>
                                                            <td style="width: 25%;text-align: center;">
                                                                {{ Str::ucfirst($content->title) }}
                                                            </td>
                                                            <td style="width: 25%;text-align: center;">
                                                                {{ Str::limit($content->description, 150, '...') }}
                                                            </td>
                                                            <td style="width: 25%;text-align: center;">
                                                                {{ $content->created_at ? $content->created_at->format('Y-m-d H:i') : '---' }}
                                                            </td>
                                                             <td style="width: 25%;text-align: center;">
                                                                {{ $content->updated_at ? $content->updated_at->format('Y-m-d H:i') : '---' }}
                                                            </td>
                                                            <td style="text-align: center;">
                                                                <a class="btn btn-primary"
                                                                    href="{{ route('contents.show', [$course->id, $content->id]) }}">Show</a>
                                                            </td>
                                                            <td style="text-align: center;">
                                                                <a class="btn btn-success" href="{{ route('contents.edit',[$course->id,$content->id]) }}">Edit</a>
                                                            </td>
                                                            <td style="text-align: center;">
                                                                <form method="POST"
                                                                    action="{{ route('contents.destroy', [$course->id, $content->id]) }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="btn btn-danger">Delete</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @endif
                                    <a href="{{ route('courses.index') }}" class="btn btn-secondary mt-3">Back to
                                        Courses</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>


@endsection
