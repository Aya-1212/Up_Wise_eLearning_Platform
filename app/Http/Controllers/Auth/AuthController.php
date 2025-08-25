<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function submitLogin(LoginRequest $request)
    {
        $data = $request->validated();
        
        if(Auth::guard('web')->attempt($data)){
           return to_route('site.home');
        }else if(Auth::guard('admin')->attempt($data)){
              return to_route('admin.home');
        }
        return back()->withErrors([
            'password' => 'Invalid Email or Password',
        ]);
    }

    public function register()
    {
        return view('auth.register');
    }

    public function submitRegister(RegisterRequest $request)
    {
        $data = $request->validated();

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $password = Hash::make($data['password']);
        $user->password = $password;
        $user->save();

        Auth::login($user);

        return to_route('site.home');
    }

    public function logout()
    {
        Auth::logout();
        return to_route('auth.login');
    }
}
