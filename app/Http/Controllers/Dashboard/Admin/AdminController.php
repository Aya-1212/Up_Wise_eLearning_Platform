<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\Admin\AddAdminRequest;
use App\Http\Requests\Dashboard\Admin\Admin\EditAdminRequest;
use App\Http\Traits\FileSystem;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    use FileSystem;
    public function index()
    {
        $admins = Admin::cursorPaginate(10);
        return view('dashboard.admin.admins.index', compact('admins'));

    }

    public function add()
    {
        return view('dashboard.admin.admins.add');
    }

    public function store(AddAdminRequest $request)
    {
        $data = $request->validated();
        $image_name = $this->uploadImage('admins');
        $admin = new Admin();
        $admin->name = $data['name'];
        $admin->email = $data['email'];
        $admin->password = Hash::make($data['password']);
        $admin->image = $image_name;
        $admin->is_super = $data['is_super'];
        $admin->save();
        return to_route('admins.index')->with('success', 'Admin added successfully.');
    }

    public function edit(Admin $admin)
    {
        return view('dashboard.admin.admins.edit', compact('admin'));
    }

    public function update(EditAdminRequest $request, Admin $admin)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $image_name = $this->uploadImage('admins');
            if ($admin->image != 'user.png') {
                $this->deleteImage("admins/{$admin->image}");
            }
            $admin->image = $image_name;
        }
        $admin->name = $data['name'];
        $admin->email = $data['email'];
        $admin->is_super = $data['is_super'];
        $admin->save();
        return to_route('admins.index')->with('success', 'Admin updated successfully.');
    }

    public function destroy(Admin $admin)
    {
        if ($admin->id === auth()->guard('admin')->user()->id) {
            return back()->with('error', 'You cannot delete your own account.');
        }
        if ($admin->is_super) {
            return back()->with('error', 'You cannot delete a super admin.');
        }
        if ($admin->image != 'user.png') {
            $this->deleteImage("admins/{$admin->image}");
        }
        $admin->delete();
        return to_route('admins.index')->with('success', 'Admin deleted successfully.');
    }
}
