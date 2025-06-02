<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bright Star') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <nav class="bg-white border-b border-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('properties.index') }}" class="text-green-600 hover:text-green-800">
                                Bright Star
                            </a>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <a href="{{ route('properties.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-green-600 hover:text-green-800 hover:border-green-300 focus:outline-none focus:text-green-800 focus:border-green-300 transition duration-150 ease-in-out">
                                {{ __('Properties') }}
                            </a>
                            <a href="{{ route('contact') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-green-600 hover:text-green-800 hover:border-green-300 focus:outline-none focus:text-green-800 focus:border-green-300 transition duration-150 ease-in-out">
                                {{ __('Contact') }}
                            </a>
                        </div>
                    </div>

                    <!-- Settings Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        @auth
                            <div class="ml-3 relative">
                                <div class="relative">
                                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-green-600 hover:text-green-800 focus:outline-none transition ease-in-out duration-150">
                                        <div>{{ Auth::user()->name }}</div>
                                        <div class="ml-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                    <div class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                                        <div class="py-1">
                                            <a href="{{ route('viewings.index') }}" class="block px-4 py-2 text-sm text-green-600 hover:text-green-800">
                                                {{ __('My Viewings') }}
                                            </a>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                                    class="block px-4 py-2 text-sm text-green-600 hover:text-green-800">
                                                    {{ __('Log Out') }}
                                                </a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <a href="{{ route('login') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-green-600 hover:text-green-800 hover:border-green-300 focus:outline-none focus:text-green-800 focus:border-green-300 transition duration-150 ease-in-out">
                                    {{ __('Login') }}
                                </a>
                                <a href="{{ route('register') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-green-600 hover:text-green-800 hover:border-green-300 focus:outline-none focus:text-green-800 focus:border-green-300 transition duration-150 ease-in-out">
                                    {{ __('Register') }}
                                </a>
                            </div>
                        @endauth
                    </div>

                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-green-600 hover:text-green-800 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Responsive Navigation Menu -->
            <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                <div class="pt-2 pb-3 space-y-1">
                    <a href="{{ route('properties.index') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-green-600 hover:text-green-800 hover:bg-gray-50 hover:border-green-300 focus:outline-none focus:text-green-800 focus:bg-gray-50 focus:border-green-300 transition duration-150 ease-in-out">
                        {{ __('Properties') }}
                    </a>
                    <a href="{{ route('contact') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-green-600 hover:text-green-800 hover:bg-gray-50 hover:border-green-300 focus:outline-none focus:text-green-800 focus:bg-gray-50 focus:border-green-300 transition duration-150 ease-in-out">
                        {{ __('Contact') }}
                    </a>
                </div>

                <!-- Responsive Settings Options -->
                <div class="pt-4 pb-1 border-t border-gray-200">
                    @auth
                        <div class="px-4">
                            <div class="font-medium text-base text-green-600">{{ Auth::user()->name }}</div>
                            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <a href="{{ route('viewings.index') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-green-600 hover:text-green-800 hover:bg-gray-50 hover:border-green-300 focus:outline-none focus:text-green-800 focus:bg-gray-50 focus:border-green-300 transition duration-150 ease-in-out">
                                {{ __('My Viewings') }}
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-green-600 hover:text-green-800 hover:bg-gray-50 hover:border-green-300 focus:outline-none focus:text-green-800 focus:bg-gray-50 focus:border-green-300 transition duration-150 ease-in-out">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </div>
                    @else
                        <div class="mt-3 space-y-1">
                            <a href="{{ route('login') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-green-600 hover:text-green-800 hover:bg-gray-50 hover:border-green-300 focus:outline-none focus:text-green-800 focus:bg-gray-50 focus:border-green-300 transition duration-150 ease-in-out">
                                {{ __('Login') }}
                            </a>
                            <a href="{{ route('register') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-green-600 hover:text-green-800 hover:bg-gray-50 hover:border-green-300 focus:outline-none focus:text-green-800 focus:bg-gray-50 focus:border-green-300 transition duration-150 ease-in-out">
                                {{ __('Register') }}
                            </a>
                        </div>
                    @endauth
                </div>
            </div>
        </nav>

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html> 