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

    <!-- Flowbite CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #1a5f7a 0%, #159895 50%, #57C5B6 100%);
        }

        .gradient-text {
            background: linear-gradient(135deg, #1a5f7a 0%, #159895 50%, #57C5B6 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .nav-bg {
            background-color: #f8fafc;
        }

        .body-bg {
            background-color: #f1f5f9;
        }

        .professional-blue {
            color: #1a5f7a;
        }

        .professional-teal {
            color: #159895;
        }

        .professional-light-teal {
            color: #57C5B6;
        }

        .hover-effect {
            transition: all 0.3s ease;
        }

        .hover-effect:hover {
            color: #1a5f7a;
            transform: translateY(-2px);
        }
    </style>
</head>

<body class="font-sans antialiased body-bg">
    @if (!request()->routeIs('profile.edit'))
        <!-- Navbar with Flowbite -->
        <nav class="nav-bg border-b border-gray-200 fixed w-full z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 flex items-center">
                            <div class="w-10 h-10 rounded-full gradient-bg flex items-center justify-center mr-3">
                                <i class="fas fa-brain text-white text-lg"></i>
                            </div>
                            <span class="text-xl font-bold gradient-text">Diagnosis FOMO</span>
                        </div>
                    </div>

                    <div class="hidden sm:ml-6 sm:flex sm:items-center">
                        <!-- User Dropdown (Flowbite) -->
                        <div class="ml-3 relative">
                            <button type="button"
                                class="flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <div class="w-8 h-8 rounded-full gradient-bg flex items-center justify-center">
                                    <i class="fas fa-user text-white text-sm"></i>
                                </div>
                            </button>

                            <!-- Dropdown Menu -->
                            <div id="userDropdown"
                                class="z-50 hidden bg-white rounded-lg shadow-lg w-48 absolute right-0 top-full mt-1 border border-gray-100">
                                <div class="px-4 py-3 text-sm text-gray-900 border-b border-gray-100">
                                    <div class="font-medium truncate">User Name</div>
                                    <div class="truncate text-gray-500">user@example.com</div>
                                </div>
                                <ul class="py-1 text-sm text-gray-700" aria-labelledby="userDropdownButton">
                                    <li>
                                        <a href="{{ route('profile.edit') }}"
                                            class="block px-4 py-2 hover:bg-gray-100 transition-colors duration-200 flex items-center">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                </path>
                                            </svg>
                                            Profile
                                        </a>
                                    </li>
                                </ul>
                                <div class="py-1 border-t border-gray-100">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit"
                                            class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors duration-200 flex items-center">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                                </path>
                                            </svg>
                                            Sign out
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Mobile menu button (Flowbite) -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button type="button"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-teal-500"
                            aria-controls="mobile-menu" aria-expanded="false" id="mobile-menu-button">
                            <span class="sr-only">Open main menu</span>
                            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu (Flowbite) -->
            <div class="sm:hidden hidden" id="mobile-menu">
                <div class="pt-2 pb-3 space-y-1">
                    <a href="#"
                        class="block pl-3 pr-4 py-2 border-l-4 border-teal-500 text-base font-medium text-teal-700 bg-teal-50">
                        <i class="fas fa-clipboard-list mr-2"></i> Kuisioner
                    </a>
                    <a href="#"
                        class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300">
                        <i class="fas fa-chart-bar mr-2"></i> Hasil Diagnosis
                    </a>
                </div>
                <div class="pt-4 pb-3 border-t border-gray-200">
                    <div class="flex items-center px-4">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 rounded-full gradient-bg flex items-center justify-center">
                                <i class="fas fa-user text-white text-sm"></i>
                            </div>
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium text-gray-800">{{ Auth::user()->name ?? 'Pengguna' }}
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 space-y-1">
                        <a href="{{ route('profile.edit') }}"
                            class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100 hover-effect">
                            Profile
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="block w-full text-left px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100 hover-effect">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    @endif

    <!-- Page Content -->
    <div class="min-h-screen pt-16"> <!-- Added pt-16 to account for fixed navbar -->
        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{ $slot }}
        </main>
    </div>

    <!-- Flowbite JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            const isHidden = menu.classList.contains('hidden');

            // Toggle mobile menu
            menu.classList.toggle('hidden');

            // Toggle hamburger icon
            const svgs = this.querySelectorAll('svg');
            svgs.forEach(svg => svg.classList.toggle('hidden'));
        });

        // User dropdown toggle
        document.getElementById('user-menu-button').addEventListener('click', function() {
            const menu = this.nextElementSibling;
            menu.classList.toggle('hidden');
        });
    </script>
</body>

</html>
