@extends('site.app')
@section('title', 'Register')
@section('content')
    <div class="wrapper pt-5">
        <div class="row justify-content-center">
            <form class="col-lg-5 col-md-6 col-10 text-center p-4 shadow rounded bg-white" method="POST"
                action="{{ route('auth.submit.register') }}">
                @csrf
                <h2 class="mb-4">Register</h2>
                <div class="form-group mb-3 text-start">
                    <label for="inputName">Name <span style="color: red;">*</span></label>
                    <input type="text" id="inputName" name ="name" value="{{ old('name') }}"
                        class="form-control form-control-lg" placeholder="Enter your Name" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3 text-start">
                    <label for="inputEmail">Email <span style="color: red;">*</span></label>
                    <input type="email" id="inputEmail" name ="email" value="{{ old('email') }}"
                        class="form-control form-control-lg" placeholder="Enter your email" required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3 text-start">
                    <label for="inputPassword">Password <span style="color: red;">*</span></label>
                    <input type="password" id="inputPassword" name ="password" class="form-control form-control-lg"
                        placeholder="Enter password" required>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-4 text-start">
                    <label for="confirmPassword">Confirm Password <span style="color: red;">*</span></label>
                    <input type="password" id="confirmPassword" name ="password_confirmation"
                        class="form-control form-control-lg" placeholder="Confirm password" required>
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button class="btn btn-lg btn-primary w-100" type="submit">Sign up</button>
            </form>
        </div>
        <p class="mt-3 text-center">
            Already have an account?
            <a href="{{ route('auth.login') }}">Sign in</a>
        </p>
    </div>
@endsection
