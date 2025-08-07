<x-layouts.guest-layout>


    {{-- PAGE WRAPPER --}}
    <div class="relative p-6 bg-white z-1 dark:bg-gray-900 sm:p-0">
        <div class="relative flex flex-col justify-center w-full h-screen dark:bg-gray-900 lg:flex-row">

            <div class="flex flex-col flex-1 w-full lg:w-1/2">


                <div class="w-full max-w-md pt-10 mx-auto">
                    <a href=""
                        class="inline-flex items-center text-sm text-gray-500 transition-colors hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                        <svg class="stroke-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            viewBox="0 0 20 20" fill="none">
                            <path d="M12.7083 5L7.5 10.2083L12.7083 15.4167" stroke="" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Back to Introduction
                    </a>
                </div>

                
                <div class="flex flex-col justify-center flex-1 w-full max-w-md mx-auto">
                    <div>
                        <div class="mb-5 sm:mb-8">
                            <h1
                                class="mb-2 font-semibold text-gray-800 text-title-sm dark:text-white/90 sm:text-title-md">
                                Sign In
                            </h1>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Enter your username and password to sign in!
                            </p>
                        </div>
                        <div>





                            <x-partials.admin.auth.login-form />


                        </div>
                    </div>
                </div>

            </div>



            <x-partials.admin.auth.common-grid />


        </div>
    </div>


</x-layouts.guest-layout>
