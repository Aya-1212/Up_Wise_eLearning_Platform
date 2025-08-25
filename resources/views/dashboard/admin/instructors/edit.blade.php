@extends('dashboard.app')

@section('title', 'Edit Instructor')

@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="col-8 mx-auto">
                        <h1 class="font-weight-bold text-center" style="font-size: 2em; color: #007bff;">
                            Edit Instructor
                        </h1>
                        <form class="form border p-3" method="POST" action="{{ route('instructors.update', $instructor) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="">Instructor Name <span style="color: red;">*</span></label>
                                <input type="text" name="name" value="{{ $instructor->name }}" class="form-control"
                                    required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Instructor Email <span style="color: red;">*</span></label>
                                <input type="text" name="email" value="{{ $instructor->email }}" class="form-control"
                                    required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Instructor Speciality <span style="color: red;">*</span></label>
                                <select name="speciality_id" id="speciality_input" class="form-control">
                                    @foreach ($specialities as $speciality)
                                        <option value="{{ $speciality->id }}"
                                            {{ $speciality->id == $instructor->speciality_id ? 'selected' : '' }}>
                                            {{ $speciality->title }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('speciality_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Instructor LinkedIn <span
                                        style="color: red;">*</span></label>
                                <input type="url" value="{{ $instructor->linkedin_url }}" name="linkedin_url"
                                    class="form-control" required>
                                @error('linkedin_url')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="mb-3">
                                    <span>Current Image</span>
                                    <img src="{{ asset("uploads/instructors/{$instructor->image}") }}" alt="instructor"
                                        class="img-fluid " height="200" width="200">
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
                            <br>
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
