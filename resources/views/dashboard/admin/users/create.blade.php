@extends('dashboard.app')

@section('title', 'Create User')

@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="col-8 mx-auto">
                        <h1 class="font-weight-bold text-center" style="font-size: 2em; color: #007bff;">
                            Add User
                        </h1>
                        <form class="form border p-3" method="POST" action="{{ route('users.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Name <span style="color: red;">*</span></label>
                                <input type="text" value="{{ old('name') }}" name="name" class="form-control"
                                    required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Email <span style="color: red;">*</span></label>
                                <input type="email" value="{{ old('email') }}" name="email" class="form-control"
                                    required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <img id="preview" src="#" alt="Preview"
                                    style="max-width: 200px; height: 200px; display: none; border: 1px solid #ccc; padding: 5px; border-radius: 8px;">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Image</label>
                                <input type="file" name="image" class="form-control" onchange="previewImage(event)">
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Phone</label>
                                <input type="tel" value="{{ old('phone') }}" name="phone" class="form-control">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Password <span style="color: red;">*</span></label>
                                <input type="password" name="password" placeholder="********" class="form-control" required>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Password Confirmation <span
                                        style="color: red;">*</span></label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="********">
                            </div>
                            <div class="mb-3">
                                <input type="submit" value="Add" class="form-control text-white bg-success">
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
