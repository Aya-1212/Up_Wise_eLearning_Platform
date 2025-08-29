@extends('dashboard.app')

@section('title', "Course {$course->id} || Content {$content->id}")

@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <!-- Header -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12 text-center">
                            <h1 class="font-weight-bold" style="font-size: 2em; color: #007bff;">Course #
                                {{ $course->id }}, Content # {{ $content->id }} Details
                            </h1>
                            <p class="font-weight-normal" style="font-size: 1.2em;">Details of the selected content</p>
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
                                    <h5 class="mb-3">Content Information</h5>
                                    <ul>
                                        <li class="list-group-item"><strong>Title:</strong>
                                            {{ $content->title }}
                                        </li>
                                        <li class="list-group-item"><strong>Description:</strong>
                                            {{ $content->description }}
                                        </li>
                                        <li class="list-group-item"><strong>Created At:</strong>
                                            {{ $content->created_at ? $content->created_at->format('Y-m-d H:i') : '---' }}
                                        </li>
                                        <li class="list-group-item"><strong>Updated At:</strong>
                                            {{ $content->updated_at ? $content->updated_at->format('Y-m-d H:i') : '---' }}
                                        </li>
                                    </ul>
                                    <h5 class="mt-4 mb-3">Lessons of this Content</h5>
                                    @if ($content->lessons->isEmpty())
                                        <ul>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <span class="text-muted">No Lessons added for this content.</span>
                                                <a href="{{ route('lessons.create', [$course->id, $content->id]) }}"
                                                    class="btn btn-success">Add Lessons</a>
                                            </li>
                                        </ul>
                                    @else
                                        <div class="d-flex justify-content-end align-items-center mb-2">
                                            <a href="{{ route('lessons.create', [$course->id, $content->id]) }}"
                                                class="btn btn-primary">
                                                + Add Lesson
                                            </a>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-sm table-bordered border-primary "
                                                style="table-layout: fixed; width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 5%;text-align: center;">#</th>
                                                        <th style="width: 15%;text-align: center;">Title</th>
                                                        <th style="width: 30%;text-align: center;">Description</th>
                                                        <th style="width: 10%;text-align: center;">Type</th>
                                                        <th style="width: 8%;text-align: center;">Show</th>
                                                        <th style="width: 8%;text-align: center;">Edit</th>
                                                        <th style="width: 9%;text-align: center;">Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($content->lessons as $lesson)
                                                        <tr>
                                                            <td style="width: 25%;text-align: center;">
                                                                {{ $loop->iteration }}
                                                            </td>
                                                            <td style="width: 25%;text-align: center;">
                                                                {{ $lesson->title }}
                                                            </td>
                                                            <td style="width: 25%;text-align: center;">
                                                                {{ Str::limit($lesson->description, 150, '...') }}
                                                            </td>
                                                            <td style="width: 25%;text-align: center;">
                                                                {{ $lesson->lesson_type }}
                                                            </td>
                                                            
                                                            <td style="text-align: center;">
                                                                <a class="btn btn-primary"
                                                                    href="{{ route('lessons.show', [$course->id, $content->id, $lesson->id]) }}">Show</a>
                                                            </td>
                                                            <td style="text-align: center;">
                                                                <a class="btn btn-success" href="{{ route('lessons.edit',[$course->id,$content->id,$lesson->id]) }}">Edit</a>
                                                            </td>
                                                            <td style="text-align: center;">
                                                                <form method="POST"
                                                                    action="{{ route('lessons.destroy', [$course->id, $content->id, $lesson->id]) }}">
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
                                    <a href="{{ route('courses.show', $course->id) }}" class="btn btn-secondary mt-3">Back
                                        to
                                        Course</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>


@endsection
