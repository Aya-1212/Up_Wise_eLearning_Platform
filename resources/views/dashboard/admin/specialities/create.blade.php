@extends('dashboard.app')

@section('title', 'Add Speciality')

@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="col-8 mx-auto">
                        <h1 class="font-weight-bold text-center" style="font-size: 2em; color: #007bff;">
                            Add Speciality
                        </h1>
                        <form class="form border p-3" method="POST" action="{{ route('specialities.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Speciality Title <span
                                        style="color: red;">*</span></label>
                                <input type="text" value="{{ old('title') }}" name="title" class="form-control"
                                    required>
                                @error('title')
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
@endsection
