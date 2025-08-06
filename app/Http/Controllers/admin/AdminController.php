<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // Index: List all admins
    public function index()
    {
        $admins = Admin::latest()->get();

        return view('admin.index', compact('admins'));
    }

    // Show: Display a specific admin
    public function show($id)
    {
        $admin = Admin::findOrFail($id);

        return view('admin.show', compact('admin'));
    }

    // Create: Show the admin creation form
    public function create()
    {
        return view('admin.create');
    }

    // Store: Save a new admin
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:admins,username',
            'email' => 'required|email|unique:admins,email',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'admin_type' => 'required|in:super_admin,admin,moderator',
            'account_status' => 'required|in:active,inactive,pending',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'password' => 'required|min:6|confirmed',
        ]);

        $data = $request->except('avatar');
        $data['password'] = Hash::make($request->password);

        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        Admin::create($data);

        return redirect()->route('admin.index')->with('success', 'Admin created successfully.');
    }

    // Edit: Show the admin edit form
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);

        return view('admin.edit', compact('admin'));
    }

    // Update: Save changes to an admin
    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $request->validate([
            'username' => 'required|unique:admins,username,' . $id,
            'email' => 'required|email|unique:admins,email,' . $id,
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'admin_type' => 'required|in:super_admin,admin,moderator',
            'account_status' => 'required|in:active,inactive,pending',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'password' => 'nullable|min:6|confirmed',
        ]);

        $data = $request->except('password', 'avatar');

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('avatar')) {
            // Delete old avatar
            if ($admin->avatar && Storage::disk('public')->exists($admin->avatar)) {
                Storage::disk('public')->delete($admin->avatar);
            }

            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $admin->update($data);

        return redirect()->route('admin.index')->with('success', 'Admin updated successfully.');
    }

    // Destroy: Delete an admin
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);

        if ($admin->avatar && Storage::disk('public')->exists($admin->avatar)) {
            Storage::disk('public')->delete($admin->avatar);
        }

        $admin->delete();

        return redirect()->route('admin.index')->with('success', 'Admin deleted successfully.');
    }
}
    