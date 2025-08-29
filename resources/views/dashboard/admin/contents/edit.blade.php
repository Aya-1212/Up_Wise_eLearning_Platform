@extends('dashboard.app')

@section('title', ' Edit Content')

@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="col-8 mx-auto">
                        <h1 class="font-weight-bold text-center" style="font-size: 2em; color: #007bff;">
                            Edit Content
                        </h1>
                        <form class="form border p-3" method="POST" action="{{ route('contents.update',[$course->id,$content->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="" class="form-label">Content Title <span
                                        style="color: red;">*</span></label>
                                <input type="text" value="{{ old('title',$content->title) }}" name="title" class="form-control"
                                    required>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description_input" class="form-label">Description for The Content <span
                                        style="color: red;">*</span></label>
                                <textarea name="description" id="description" class="form-control" rows="6" cols="50"
                                    placeholder="Enter Content description here...">{{ old('description',$content->description) }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
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
@endsection
