@extends('dashboard.app')

@section('title', "Course {$course->id} || Content {$content->id} || Lesson {$lesson->id}")

@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <!-- Header -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12 text-center">
                            <h1 class="font-weight-bold" style="font-size: 2em; color: #007bff;">Course #
                                {{ $course->id }}, Content # {{ $content->id }}, Lesson # {{ $lesson->id }} Details
                            </h1>
                            <p class="font-weight-normal" style="font-size: 1.2em;">Details of the selected lesson</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Lesson -->
            <section class="content">
                <div class="container-fluid">
                    <x-success-state />
                    <x-error-state />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="mb-3">Lesson Information</h5>
                                    <ul>
                                        <li class="list-group-item"><strong>Title:</strong>
                                            {{ $lesson->title }}
                                        </li>
                                        <li class="list-group-item"><strong>Description:</strong>
                                            {{ $lesson->description }}
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Lesson Type: </strong>
                                            {{ Str::ucfirst($lesson->lesson_type) }}
                                        </li>
                                        <li class="list-group-item"><strong>Content: </strong>
                                            @if ($lesson->lesson_type === 'video')
                                                <video width="250" controls>
                                                    <source src="{{ asset("uploads/lessons/{$lesson->video_content}") }}"
                                                        type="video/mp4">
                                                    Your browser does not support video.
                                                </video>
                                            @else
                                                {{ Str::limit($lesson->text_content, 250, '...') }}
                                            @endif
                                        </li>

                                        <li class="list-group-item"><strong>Created At:</strong>
                                            {{ $lesson->created_at ? $lesson->created_at->format('Y-m-d H:i') : '---' }}
                                        </li>
                                        <li class="list-group-item"><strong>Updated At:</strong>
                                            {{ $lesson->updated_at ? $lesson->updated_at->format('Y-m-d H:i') : '---' }}
                                        </li>
                                    </ul>

                                    <a href="{{ route('contents.show', [$course->id, $content->id]) }}"
                                        class="btn btn-secondary mt-3">Back
                                        to
                                        Content</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>


@endsection
