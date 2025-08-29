@extends('dashboard.app')

@section('title', 'Add Lesson')

@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="col-8 mx-auto">
                        <h1 class="font-weight-bold text-center" style="font-size: 2em; color: #007bff;">
                            Add Lesson
                        </h1>
                        <form class="form border p-3" method="POST"
                            action="{{ route('lessons.store', [$course->id, $content->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Lesson Title <span
                                        style="color: red;">*</span></label>
                                <input type="text" value="{{ old('title') }}" name="title" class="form-control"
                                    required>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description_input" class="form-label">Description for The Lesson <span
                                        style="color: red;">*</span></label>
                                <textarea name="description" id="description_input" class="form-control" rows="6" cols="50"
                                    placeholder="Enter Lesson description here...">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="lesson_type_input" class="form-label">Lesson Type <span
                                        style="color: red;">*</span></label>
                                <select name="lesson_type" id="lesson_type_input" class="form-control">
                                    <option value="" disabled selected>-- Select Type --</option>
                                    <option value="video" {{ old('lesson_type') == 'video' ? 'selected' : '' }}>
                                        Video</option>
                                    <option value="article" {{ old('lesson_type') == 'article' ? 'selected' : '' }}>
                                        Article</option>
                                </select>
                                @error('lesson_type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-3" id="video_preview" style="display:none;">
                                <video width="320" height="240" controls></video>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Upload Video</label>
                                <input type="file" name="video_content" class="form-control" accept="video/*"
                                    onchange="previewVideo(event)">
                                @error('video_content')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Article Body</label>
                                <textarea name="text_content" class="form-control" rows="5">{{ old('text_content') }}</textarea>
                                @error('text_content')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <input type="submit" value="Add" class="form-control text-white bg-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <script>
        function previewVideo(event) {
            const file = event.target.files[0];
            const previewDiv = document.getElementById("video_preview");
            const video = previewDiv.querySelector("video");

            if (file) {
                const url = URL.createObjectURL(file);
                video.src = url;
                previewDiv.style.display = "block";
            } else {
                previewDiv.style.display = "none";
            }
        }

        window.onload = toggleFields;
    </script>
@endsection
