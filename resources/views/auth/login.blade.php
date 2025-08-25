@extends('site.app')
@section('title', 'Login')
@section('content')
    <div class="wrapper pt-5">
        <div class="row justify-content-center">
            <form class="col-lg-5 col-md-6 col-10 text-center p-4 shadow rounded bg-white" method="Post"
                action="{{ route('auth.submit.login') }}">
                @csrf
                <h2 class="mb-4">Sign in</h2>
                <div class="form-group mb-3 text-start">
                    <label for="inputEmail">Email <span style="color: red;">*</span></label>
                    <input type="email" id="inputEmail" name="email" value="{{ old('email') }}"
                        class="form-control form-control-lg" placeholder="Enter your email" required autofocus>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-4 text-start">
                    <label for="inputPassword">Password <span style="color: red;">*</span></label>
                    <input type="password" id="inputPassword" name="password" class="form-control form-control-lg"
                        placeholder="Enter your password" required>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button class="btn btn-lg btn-primary w-100" type="submit">Let me in</button>
            </form>
        </div>
        <p class="mt-3 text-center">
            Don’t have an account?
            <a href="{{ route('auth.register') }}">Register</a>
        </p>
    </div>
@endsection
