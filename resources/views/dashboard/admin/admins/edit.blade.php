@extends('dashboard.app')

@section('title', 'Edit Admin')

@section('content')
    <main role="main" class="main-content">
        <section class="content-header">
            <div class="container-fluid">
                <div class="col-8 mx-auto">
                    <h1 class="font-weight-bold text-center" style="font-size: 2em; color: #007bff;">
                        Edit Admin
                    </h1>
                    <form class="form border p-3" method="POST" action="{{ route('admins.update', $admin->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="">Name <span style="color: red;">*</span></label>
                            <input type="text" name="name" value="{{ $admin->name }}" class="form-control" required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Email <span style="color: red;">*</span></label>
                            <input type="email" name="email" value="{{ $admin->email }}" class="form-control" required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="is_super" class="form-label">Is Super Admin?</label>
                            <select name="is_super" id="is_super" class="form-control">
                                <option value="1" {{ $admin->is_super == 1 ? 'selected' : '' }}>True</option>
                                <option value="0" {{ $admin->is_super == 0 ? 'selected' : '' }}>False</option>
                            </select>
                            @error('is_super')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <span>Current Image</span>
                                <img src="{{ asset("uploads/admins/{$admin->image}") }}" alt="admin"
                                    class="img-fluid rounded" style="max-width: 300px; height: auto;">
                            </div>
                            <div class="mb-3">
                                <label for="image">Upload Image</label>
                                <input type="file" name="image" class="form-control" onchange="previewImage(event)">
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
