@extends('dashboard.app')

@section('title', 'Add Category')

@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="col-8 mx-auto">
                        <h1 class="font-weight-bold text-center" style="font-size: 2em; color: #007bff;">
                            Add Category
                        </h1>
                        <form class="form border p-3" method="POST" action="{{ route('categories.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Category Name <span
                                        style="color: red;">*</span></label>
                                <input type="text" value="{{ old('title') }}" name="title" class="form-control"
                                    required>
                                @error('title')
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
