<x-layouts.app-layout>

<div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Admin Details</h1>

        <div class="bg-white shadow-md rounded-lg p-6 max-w-xl">
            <div class="mb-4">
                <strong>Username:</strong> {{ $admin->username }}
            </div>
            <div class="mb-4">
                <strong>Email:</strong> {{ $admin->email }}
            </div>
            <div class="mb-4">
                <strong>Name:</strong> {{ $admin->first_name }} {{ $admin->last_name }}
            </div>
            <div class="mb-4">
                <strong>Admin Type:</strong> {{ ucfirst($admin->admin_type) }}
            </div>
            <div class="mb-4">
                <strong>Account Status:</strong> 
                <span class="inline-block px-2 py-1 rounded 
                    {{ $admin->account_status === 'active' ? 'bg-green-200 text-green-800' : ($admin->account_status === 'pending' ? 'bg-yellow-200 text-yellow-800' : 'bg-red-200 text-red-800') }}">
                    {{ ucfirst($admin->account_status) }}
                </span>
            </div>
            <div class="mb-4">
                <strong>Last Login:</strong> {{ $admin->last_login_at ? $admin->last_login_at->diffForHumans() : 'Never' }}
            </div>

            <div class="mt-6">
                <a href="{{ route('admin.index') }}" class="text-blue-600 hover:underline">← Back to list</a>
            </div>
        </div>
    </div>

</x-layouts.app-layout>