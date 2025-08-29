@extends('dashboard.app')

@section('title', 'Create Course')

@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="col-8 mx-auto">
                        <h1 class="font-weight-bold text-center" style="font-size: 2em; color: #007bff;">
                            Add Course
                        </h1>
                        <form class="form border p-3" method="POST" action="{{ route('courses.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Course Title <span
                                        style="color: red;">*</span></label>
                                <input type="text" value="{{ old('title') }}" name="title" class="form-control"
                                    required>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description_input" class="form-label">Description for The Course <span
                                        style="color: red;">*</span></label>
                                <textarea name="description" id="description" class="form-control" rows="6" cols="50"
                                    placeholder="Enter Course description here...">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="price_input" class="form-label">Price <span style="color: red;">*</span></label>
                                <input type="number" value="{{ old('price') }}" id="price_input" name="price"
                                    class="form-control" required>
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="category_input" class="form-label">Category <span
                                        style="color: red;">*</span></label>
                                <select name="category_id" id="category_input" class="form-control">
                                    <option value="" disabled selected>-- Select Category --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                                    <option value="" disabled selected>-- Select Instructor --</option>
                                    @foreach ($instructors as $instructor)
                                        <option value="{{ $instructor->id }}"
                                            {{ old('instructor_id') == $instructor->id ? 'selected' : '' }}>
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
                                    <option value="" disabled selected>-- Select Level --</option>
                                    <option value="beginner" {{ old('level') == 'beginner' ? 'selected' : '' }}>
                                        Beginner</option>
                                    <option value="intermediate" {{ old('level') == 'intermediate' ? 'selected' : '' }}>
                                        Intermediate</option>
                                    <option value="advanced" {{ old('level') == 'advanced' ? 'selected' : '' }}>
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
                                    <option value="" disabled selected>-- Select Language --</option>
                                    <option value="english" {{ old('language') == 'english' ? 'selected' : '' }}>
                                        English</option>
                                    <option value="arabic" {{ old('language') == 'arabic' ? 'selected' : '' }}>
                                        Arabic</option>
                                </select>
                                @error('language')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <img id="preview" src="#" alt="Preview"
                                    style="max-width: 200px; height: 200px; display: none; border: 1px solid #ccc; padding: 5px; border-radius: 8px;">
                            </div>
                            <div class="mb-3">
                                <label for="image_input" class="form-label">Image <span style="color: red;">*</span></label>
                                <input type="file" id="image_input" name="image" class="form-control"
                                    onchange="previewImage(event)" required>
                                @error('image')
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
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('preview');
                output.src = reader.result;
                output.style.display = "block";
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

@endsection
