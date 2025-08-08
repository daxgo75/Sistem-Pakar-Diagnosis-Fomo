<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Diagnosis Fomo</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Flowbite CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <style>
        /* Smooth transitions for sidebar */
        .sidebar-collapse {
            transition: all 0.3s ease-in-out;
        }

        /* Active menu item styling */
        .active-menu {
            background-color: #ebf5ff;
            border-left: 4px solid #3b82f6;
            font-weight: 500;
            color: #1d4ed8;
        }

        /* Hover effects */
        .hover-scale {
            transition: transform 0.2s ease;
        }

        .hover-scale:hover {
            transform: translateY(-1px);
        }

        /* Professional shadow for cards */
        .pro-card {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            transition: box-shadow 0.3s ease;
        }

        .pro-card:hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.07), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        /* Subtle animation for dropdowns */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-5px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .dropdown-animate {
            animation: fadeIn 0.2s ease-out forwards;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-50">
    <div class="flex">
        <!-- Navbar - Dark Blue Professional -->
        <nav
            class="fixed top-0 z-50 w-full bg-gradient-to-r from-blue-800 to-blue-700 border-b border-blue-700 shadow-sm">
            <div class="px-3 py-3 lg:px-5 lg:pl-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center justify-start rtl:justify-end">
                        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                            aria-controls="logo-sidebar" type="button"
                            class="inline-flex items-center p-2 text-sm text-white rounded-lg sm:hidden hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300 transition-colors duration-200">
                            <span class="sr-only">Open sidebar</span>
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                                </path>
                            </svg>
                        </button>
                        <a href="{{ route('admin.dashboard') }}"
                            class="flex items-center gap-3 ms-2 md:me-24 hover-scale">
                            <div
                                class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-600 to-blue-400 flex items-center justify-center shadow-md">
                                <i class="fas fa-brain text-white text-lg"></i>
                            </div>
                            <span class="self-center text-xl font-bold sm:text-2xl whitespace-nowrap text-white">
                                Diagnosis Fomo
                            </span>
                        </a>
                    </div>
                    <div class="flex items-center">
                        <div class="flex items-center ms-3">
                            <nav x-data="{ open: false }" class="bg-transparent">
                                <!-- Primary Navigation Menu -->
                                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                                    <div class="flex justify-between h-12">
                                        <div class="flex ml-auto">
                                            <!-- Settings Dropdown -->
                                            <div class="hidden sm:flex sm:items-center sm:ms-6 relative">
                                                <!-- Parent element dengan relative positioning -->
                                                <!-- Trigger Button -->
                                                <button id="userDropdownButton" data-dropdown-toggle="userDropdown"
                                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-600 border border-blue-500 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300 transition-colors duration-200 shadow-sm"
                                                    type="button">
                                                    <div
                                                        class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center mr-2 shadow-inner">
                                                        <span
                                                            class="text-blue-800 font-medium text-sm">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                                                    </div>
                                                    <span class="mr-1">{{ Auth::user()->name }}</span>
                                                    <svg class="w-4 h-4 ms-1 transform transition-transform duration-200"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 20 20">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2" d="M6 8l4 4 4-4" />
                                                    </svg>
                                                </button>

                                                <!-- Dropdown Menu -->
                                                <div id="userDropdown"
                                                    class="z-50 hidden bg-white rounded-lg shadow-lg w-48 absolute right-0 top-full mt-1 border border-gray-100">
                                                    <!-- Header dengan user info -->
                                                    <div
                                                        class="px-4 py-3 text-sm border-b border-gray-200 bg-gray-50 rounded-t-lg">
                                                        <div class="font-medium text-gray-900 truncate">
                                                            {{ Auth::user()->name }}</div>
                                                        <div class="text-gray-500 text-xs truncate">
                                                            {{ Auth::user()->email }}</div>
                                                    </div>

                                                    <!-- Menu Items -->
                                                    <ul class="py-1 text-sm" aria-labelledby="userDropdownButton">
                                                        <li>
                                                            <a href="{{ route('profile.edit') }}"
                                                                class="flex items-center px-4 py-2.5 text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition-colors duration-150">
                                                                <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-blue-600"
                                                                    fill="none" stroke="currentColor"
                                                                    viewBox="0 0 24 24"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="1.5"
                                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                                    </path>
                                                                </svg>
                                                                <span>Profile</span>
                                                            </a>
                                                        </li>
                                                    </ul>

                                                    <!-- Footer dengan logout -->
                                                    <div class="py-1 border-t border-gray-200 bg-gray-50 rounded-b-lg">
                                                        <form method="POST" action="{{ route('logout') }}">
                                                            @csrf
                                                            <button type="submit"
                                                                class="flex items-center w-full px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 transition-colors duration-150">
                                                                <svg class="w-5 h-5 mr-3" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="1.5"
                                                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                                                    </path>
                                                                </svg>
                                                                <span>Sign out</span>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Hamburger -->
                                            <div class="-me-2 flex items-center sm:hidden">
                                                <button @click="open = ! open"
                                                    class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-white hover:bg-blue-600 focus:outline-none focus:bg-blue-600 focus:text-white transition duration-150 ease-in-out">
                                                    <svg class="h-6 w-6" stroke="currentColor" fill="none"
                                                        viewBox="0 0 24 24">
                                                        <path :class="{ 'hidden': open, 'inline-flex': !open }"
                                                            class="inline-flex" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M4 6h16M4 12h16M4 18h16" />
                                                        <path :class="{ 'hidden': !open, 'inline-flex': open }"
                                                            class="hidden" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- SideBar Open/Close -->
                                    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
                                        <div class="pt-2 pb-3 space-y-1">
                                            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                                                class="text-white hover:bg-blue-600">
                                                {{ __('Dashboard') }}
                                            </x-responsive-nav-link>
                                        </div>

                                        <!-- Responsive Settings Options -->
                                        <div class="pt-4 pb-1 border-t border-blue-600">
                                            <div class="px-4">
                                                <div class="font-medium text-base text-white">
                                                    {{ Auth::user()->name }}</div>
                                                <div class="font-medium text-sm text-blue-200">
                                                    {{ Auth::user()->email }}</div>
                                            </div>
                                            <div class="mt-3 space-y-1">
                                                <x-responsive-nav-link :href="route('profile.edit')"
                                                    class="text-white hover:bg-blue-600">
                                                    {{ __('Profile') }}
                                                </x-responsive-nav-link>

                                                <!-- Authentication -->
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <x-responsive-nav-link :href="route('logout')"
                                                        onclick="event.preventDefault();
                                                        this.closest('form').submit();"
                                                        class="text-white hover:bg-blue-600">
                                                        {{ __('Log Out') }}
                                                    </x-responsive-nav-link>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Sidebar - Light Blue Professional -->
        <aside id="logo-sidebar"
            class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 shadow-sm"
            aria-label="Sidebar">
            <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
                <ul class="space-y-2 font-medium">
                    <!-- Dashboard -->
                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                            class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-blue-50 group transition-colors duration-200 {{ request()->routeIs('admin.dashboard') ? 'active-menu' : '' }}">
                            <svg class="w-5 h-5 text-blue-600 transition duration-75 group-hover:text-blue-800"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            <span class="ms-3">Dashboard</span>
                        </a>
                    </li>

                    <!-- Heading -->
                    <li class="mt-6 mb-2">
                        <span
                            class="text-xs font-semibold uppercase text-gray-500 px-2 tracking-wider">Pengetahuan</span>
                    </li>

                    <!-- Gejala -->
                    <li>
                        <a href="{{ route('admin.gejala.index') }}"
                            class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-blue-50 group transition-colors duration-200 {{ request()->routeIs('admin.gejala.*') ? 'active-menu' : '' }}">
                            <svg class="w-5 h-5 text-blue-600 transition duration-75 group-hover:text-blue-800"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                            <span class="ms-3">Gejala</span>
                        </a>
                    </li>

                    <!-- Penyakit -->
                    <li>
                        <a href="{{ route('admin.penyakit.index') }}"
                            class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-blue-50 group transition-colors duration-200 {{ request()->routeIs('admin.penyakit.*') ? 'active-menu' : '' }}">
                            <svg class="w-5 h-5 text-blue-600 transition duration-75 group-hover:text-blue-800"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                            </svg>
                            <span class="ms-3">Penyakit</span>
                        </a>
                    </li>

                    <!-- Forward Chaining -->
                    <li>
                        <a href="{{ route('admin.forward-chaining.index') }}"
                            class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-blue-50 group transition-colors duration-150 {{ request()->routeIs('admin.forward-chaining.*') ? 'active-menu' : '' }}">
                            <svg class="w-5 h-5 text-blue-600 transition duration-75 group-hover:text-blue-800"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                            </svg>
                            <span class="ms-3">Forward Chaining</span>
                        </a>
                    </li>

                    <!-- Certainty Factor -->
                    <li>
                        <a href="{{ route('admin.certainty-factor.index') }}"
                            class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-blue-50 group transition-colors duration-150 {{ request()->routeIs('admin.certainty-factor.*') ? 'active-menu' : '' }}">
                            <svg class="w-5 h-5 text-blue-600 transition duration-75 group-hover:text-blue-800"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            <span class="ms-3">Certainty Factor</span>
                        </a>
                    </li>

                    <!-- Sidebar footer -->
                    <div class="absolute bottom-0 left-0 right-0 p-4 bg-gray-50 border-t border-gray-200">
                        <div class="text-xs text-gray-500 text-center">
                            Diagnosis Fomo<br>
                            &copy; {{ date('Y') }} All Rights Reserved
                        </div>
                    </div>
        </aside>
    </div>

    <div class="p-4 sm:ml-64 mt-16">
        <!-- Modified Main content with background -->
        <div class="w-full bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            @yield('content')
        </div>
    </div>

    <!-- Flowbite JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

</body>

</html>
