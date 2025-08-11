@extends('site.app')
@section('title', 'Register')
@section('content')
    <div class="wrapper pt-5">
        <div class="row justify-content-center">
            <form class="col-lg-5 col-md-6 col-10 text-center p-4 shadow rounded bg-white">
                <h2 class="mb-4">Register</h2>

                <div class="form-group mb-3 text-start">
                    <label for="firstname">Name</label>
                    <input type="text" id="firstname" class="form-control form-control-lg" placeholder="First name" required>
                </div>
                <div class="form-group mb-3 text-start">
                    <label for="inputEmail">Email</label>
                    <input type="email" id="inputEmail" class="form-control form-control-lg"
                        placeholder="Enter your email" required>
                </div>

                <div class="form-group mb-3 text-start">
                    <label for="inputPassword">Password</label>
                    <input type="password" id="inputPassword" class="form-control form-control-lg"
                        placeholder="Enter password" required>
                </div>

                <div class="form-group mb-4 text-start">
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" id="confirmPassword" class="form-control form-control-lg"
                        placeholder="Confirm password" required>
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
