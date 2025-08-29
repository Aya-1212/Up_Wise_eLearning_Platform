@extends('dashboard.app')

@section('title', 'Create Instructor')

@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="col-8 mx-auto">
                        <h1 class="font-weight-bold text-center" style="font-size: 2em; color: #007bff;">
                            Add Instructor
                        </h1>
                        <form class="form border p-3" method="POST" action="{{ route('instructors.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Instructor Name <span
                                        style="color: red;">*</span></label>
                                <input type="text" value="{{ old('name') }}" name="name" class="form-control"
                                    required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Instructor Email <span
                                        style="color: red;">*</span></label>
                                <input type="email" value="{{ old('email') }}" name="email" class="form-control"
                                    required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="speciality_input" class="form-label">Speciality <span
                                        style="color: red;">*</span></label>
                                <select name="speciality_id" id="speciality_input" class="form-control">
                                    @foreach ($specialities as $speciality)
                                        <option value="{{ $speciality->id }}">{{ $speciality->title }}</option>
                                    @endforeach
                                </select>
                                @error('speciality')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Instructor LinkedIn <span
                                        style="color: red;">*</span></label>
                                <input type="url" value="{{ old('linkedin_url') }}" name="linkedin_url"
                                    class="form-control" required>
                                @error('linkedin_url')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <img id="preview" src="#" alt="Preview"
                                    style="max-width: 200px; height: 200px; display: none; border: 1px solid #ccc; padding: 5px; border-radius: 8px;">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Image <span style="color: red;">*</span></label>
                                <input type="file" id="image" name="image" class="form-control"
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
