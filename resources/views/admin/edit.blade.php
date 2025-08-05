<x-layouts.app-layout>
<div class="container mx-auto max-w-lg p-6">
        <h1 class="text-2xl font-bold mb-6">Edit Admin</h1>

        @if ($errors->any())
            <div class="mb-4 text-red-500">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.update', $admin->id) }}" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <x-app-form-input name="username" :value="$admin->username"/>
            <x-app-form-input name="email" :value="$admin->email"/>
            <x-app-form-input name="first_name" :value="$admin->first_nameusername"/>
            <x-app-form-input name="last_name" :value="$admin->username"/>
            <x-app-form-input name="password" type="password" placeholder="New Password" />
            <x-app-form-input name="password_confirmation" type="password" placeholder="Confirm New Password" />


            <div>
                <label class="block">Admin Type:</label>
                <select name="admin_type" class="w-full border rounded p-2">
                    <option value="super_admin" {{ $admin->admin_type === 'super_admin' ? 'selected' : '' }}>Super Admin</option>
                    <option value="admin" {{ $admin->admin_type === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="moderator" {{ $admin->admin_type === 'moderator' ? 'selected' : '' }}>Moderator</option>
                </select>
            </div>

            <div>
                <label class="block">Avatar:</label>
                <input type="file" name="avatar" class="w-full border rounded p-2">
                @if($admin->avatar)
                    <img src="{{ asset('storage/' . $admin->avatar) }}" class="w-20 h-20 rounded-full mt-2" alt="Current Avatar">
                @endif
            </div>

            <div class="pt-4">
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Update Admin</button>
                <a href="{{ route('admin.index') }}" class="ml-4 text-gray-600 hover:underline">Cancel</a>
            </div>
        </form>
    </div>
</x-layouts.app-layout>