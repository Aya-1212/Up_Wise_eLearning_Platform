<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\User\AddUserRequest;
use App\Http\Traits\FileSystem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use FileSystem;
    public function index()
    {
        $users = User::cursorPaginate(10);
        return view('dashboard.admin.users.index', compact('users'));

    }

    public function show(User $user)
    {
        return view('dashboard.admin.users.show', compact('user'));

    }

    public function add()
    {
        return view('dashboard.admin.users.add');

    }

    public function store(AddUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->phone = $data['phone'] ?? null;
        $user->password = $data['password'];
        if ($request->hasFile('image')) {
            $image_name = $this->uploadImage('users');
            $user->image = $image_name;
        }
        $user->save();
        return to_route('users.index')->with('success', 'User added successfully.');
    }

    public function destroy(User $user)
    {
        if ($user->image != 'user.png') {
            $this->deleteImage("/users/$user->image");
        }
        $user->delete();
        return to_route('users.index')->with('success', 'User deleted successfully.');

    }
}
