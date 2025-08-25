@extends('dashboard.app')

@section('title', 'Edit Speciality')

@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="col-8 mx-auto">
                        <h1 class="font-weight-bold text-center" style="font-size: 2em; color: #007bff;">
                            Edit Speciality
                        </h1>
                        <form class="form border p-3" method="POST" action="{{ route('specialities.update', $speciality) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="">Speciality Title <span style="color: red;">*</span></label>
                                <input type="text" name="title" value="{{ $speciality->title }}" class="form-control"
                                    required>
                                @error('title')
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
