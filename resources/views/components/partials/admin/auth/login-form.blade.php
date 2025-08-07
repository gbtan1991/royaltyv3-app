<x-ui.app-form method="POST" action="{{ route('admin.login') }}">
    {{-- Error Validator --}}
    @if ($errors->any())
        <div class="alert alert-danger text-red-500">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {{-- Username --}}
    <div class="mb-5">
        <x-ui.app-label for="username" required>
            Username
        </x-ui.app-label>

        <x-ui.app-input name="username" type="text" placeholder="Enter your username" required
            class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300" />
    </div>

    {{-- Password --}}
    <div class="mb-5">
        <x-ui.app-label for="password" required>
            Password
        </x-ui.app-label>

        <x-ui.app-input name="password" type="password" placeholder="Enter your password" required
            class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800" />
    </div>

    {{-- Submit --}}
    <div class="mt-6">

        <x-ui.app-button type="submit"
            class="w-full h-11 px-6 bg-brand-600 text-white rounded-lg hover:bg-brand-700 transition">
            Sign In
        </x-ui.app-button>


    </div>

</x-ui.app-form>
