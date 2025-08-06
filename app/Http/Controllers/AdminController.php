<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    //index

    public function index()
    {

        $admins = Admin::latest()->get();
        return view('admin.index', compact('admins'));


    }


    //show  
    public function show($id)
    {

        $admin = Admin::findOrFail($id);
        return view('admin.show', compact('admin'));

    }


    //create
    public function create()
    {

        return view('admin.create');
    }


    //store
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:admins',
            'email' => 'required|email|unique:admins',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'password' => 'required|min:6|confirmed',
            'admin_type' => 'required|in:super_admin,admin,moderator',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($request->password);

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
            $data['avatar'] = $path;
        }

        Admin::create($data);

        return redirect()->route('admin.index')->with('success', 'Admin created successfully.');


    }


    //edit
    public function edit($id)
    {

        $admin = Admin::findOrFail($id);
        return view('admin.edit', compact('admin'));


    }


    //update
    public function update(Request $request, $id)
    {

        $admin = Admin::findOrFail($id);

        $request->validate([
            'username' => 'required|unique:admins,username,' . $id,
            'email' => 'required|email|unique:admins,email,' . $id,
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'admin_type' => 'required|in:super_admin,admin,moderator',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'password' => 'nullable|min:6|confirmed',


        ]);


        $data = $request->except('password', 'avatar');

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
            $data['avatar'] = $path;
        }

        $admin->update($data);

        return redirect()->route('admin.index')->with('success', 'Admin updated successfully.');

    }


    //destroy
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);

        //Deleting the avatar if it exists
        if ($admin->avatar && \Storage::disk('public')->exists($admin->avatar)){
            \Storage::disk('public')->delete($admin->avatar);
        }

        $admin->delete();

        return redirect()->route('admin.index')->with('success', 'Admin deleted successfully.');

    }





}
