<x-layouts.app-layout>

<div class="container mx-auto p-4">
        <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-bold mb-4">Admins</h1>
        <a href="{{route('admin.create')}}">Add Admin</a>
        </div>
        <x-app-list 
            :items="$admins"
            :columns="[
                'username' => 'Username',
                'email' => 'Email',
                'first_name' => 'First Name',
                'last_name' => 'Last Name',
                'account_status' => 'Status',
                'admin_type' => 'Type'
            ]"
            :actions="[
                ['label' => 'View', 'route' => 'admin.show', 'color' => 'blue'],
                ['label' => 'Edit', 'route' => 'admin.edit', 'color' => 'green'],
                ['label' => 'Delete', 'route' => 'admin.destroy', 'color' => 'red']
            ]"
        />
    </div>

</x-layouts.app-layout>




