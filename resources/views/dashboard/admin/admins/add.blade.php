@extends('dashboard.app')

@section('title', 'Add Admin')

@section('content')
    <main role="main" class="main-content">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="col-8 mx-auto">
                    <h1 class="font-weight-bold text-center" style="font-size: 2em; color: #007bff;">
                        Add Admin
                    </h1>
                    <form class="form border p-3" method="POST" action="{{ route('admins.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Name <span style="color: red;">*</span></label>
                            <input type="text" value="{{ old('name') }}" name="name" class="form-control">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email <span style="color: red;">*</span></label>
                            <input type="email" value="{{ old('email') }}" name="email" class="form-control">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Password <span style="color: red;">*</span></label>
                            <input type="password" value="{{ old('password') }}" name="password" class="form-control"
                                placeholder="********">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Password Confirmation <span
                                    style="color: red;">*</span></label>
                            <input type="password" value="{{ old('password_confirmation') }}" name="password_confirmation"
                                class="form-control" placeholder="********">
                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="is_super" class="form-label">Is Super Admin? <span
                                    style="color: red;">*</span></label>
                            <select name="is_super" id="is_super" class="form-control">
                                <option value="1">True</option>
                                <option value="0">False</option>
                            </select>
                            @error('is_super')
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
                            <input type="submit" value="Add" class="form-control text-white bg-success">
                        </div>
                    </form>
                </div>
            </div>
        </section>
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
