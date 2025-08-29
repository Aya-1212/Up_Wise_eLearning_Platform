@extends('dashboard.app')

@section('title', "Edit Course {$course->id}")

@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="col-8 mx-auto">
                        <h1 class="font-weight-bold text-center" style="font-size: 2em; color: #007bff;">
                            Edit Course
                        </h1>
                        <form class="form border p-3" method="POST" action="{{ route('courses.update', $course->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="" class="form-label">Course Title <span
                                        style="color: red;">*</span></label>
                                <input type="text" value="{{ old('title',$course->title)  }}" name="title" class="form-control"
                                    required>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description_input" class="form-label">Description for The Course <span
                                        style="color: red;">*</span></label>
                                <textarea name="description" id="description" class="form-control"  rows="6" cols="50"
                                    placeholder="Enter Course description here...">{{ old('description',$course->description) }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="price_input" class="form-label">Price <span style="color: red;">*</span></label>
                                <input type="number" value="{{ old('price',$course->price) }}" id="price_input" name="price"
                                    class="form-control" required>
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="category_input" class="form-label">Category <span
                                        style="color: red;">*</span></label>
                                <select name="category_id" id="category_input" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id',$course->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="instructor_input" class="form-label">Instructor <span
                                        style="color: red;">*</span></label>
                                <select name="instructor_id" id="instructor_input" class="form-control">
                                    @foreach ($instructors as $instructor)
                                        <option value="{{ $instructor->id }}"
                                            {{ old('instructor_id',$course->instructor_id) == $instructor->id ? 'selected' : '' }}>
                                            {{ $instructor->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('instructor_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="level_input" class="form-label">Level <span style="color: red;">*</span></label>
                                <select name="level" id="level_input" class="form-control">
                                    <option value="beginner" {{ old('level',$course->level) == 'beginner' ? 'selected' : '' }}>
                                        Beginner</option>
                                    <option value="intermediate" {{ old('level',$course->level) == 'intermediate' ? 'selected' : '' }}>
                                        Intermediate</option>
                                    <option value="advanced" {{ old('level',$course->level) == 'advanced' ? 'selected' : '' }}>
                                        Advanced</option>
                                </select>
                                @error('level')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="language_input" class="form-label">Language <span
                                        style="color: red;">*</span></label>
                                <select name="language" id="language_input" class="form-control">
                                    <option value="english" {{ old('language', $course->language ) == 'english' ? 'selected' : '' }}>
                                        English</option>
                                    <option value="arabic" {{ old('language', $course->language ) == 'arabic' ? 'selected' : '' }}>
                                        Arabic</option>
                                </select>
                                @error('language')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="mb-3">
                                    <span>Current Image</span>
                                    <img src="{{ asset("uploads/courses/{$course->image}") }}"
                                        alt="course"class="img-fluid rounded" style="max-width: 300px; height: auto;">
                                </div>
                                <div class="mb-3">
                                    <label for="image">Upload Image</label>
                                    <input type="file" name="image" class="form-control"
                                        onchange="previewImage(event)">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-3">
                                <p id="image-text" style="display: none; font-weight: bold; margin-bottom: 5px;"></p>
                                <img id="preview" src="#" alt="Preview"
                                    style="max-width: 200px; display: none; border: 1px solid #ccc; padding: 5px; border-radius: 8px;">
                            </div>
                            <div class="mb-3">
                                <input type="submit" value="Update" class="form-control text-white bg-success">
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            const file = event.target.files[0];

            if (file) {
                reader.onload = function() {
                    const output = document.getElementById('preview');
                    const text = document.getElementById('image-text');

                    output.src = reader.result;
                    output.style.display = "block";

                    text.innerText = "Selected Image";
                    text.style.display = "block";
                };
                reader.readAsDataURL(file);
            }
        }
    </script>

@endsection
