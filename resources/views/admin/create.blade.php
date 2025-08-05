<x-layouts.app-layout>
 <div class="container mx-auto max-w-lg p-6">
        <h1 class="text-2xl font-bold mb-6">Create Admin</h1>

        @if ($errors->any())
            <div class="mb-4 text-red-500">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data" class="space-y-4">
            @csrf

        <x-app-form-input name="username" />
        <x-app-form-input name="email" type="email" />
        <x-app-form-input name="first_name" label="First Name" />
        <x-app-form-input name="last_name" label="Last Name" />
        <x-app-form-input name="password" type="password" />
        <x-app-form-input name="password_confirmation" type="password" label="Confirm Password" />

            <div>
                <label class="block">Admin Type:</label>
                <select name="admin_type" class="w-full border rounded p-2">
                    <option value="super_admin">Super Admin</option>
                    <option value="admin">Admin</option>
                    <option value="moderator">Moderator</option>
                </select>
            </div>

            <div>
                <label class="block">Avatar (optional):</label>
                <input type="file" name="avatar" class="w-full border rounded p-2">
            </div>

            <div class="pt-4">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Create Admin</button>
                <a href="{{ route('admin.index') }}" class="ml-4 text-gray-600 hover:underline">Cancel</a>
            </div>
        </form>
    </div>


</x-layouts.app-layout>