<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Diagnosis FOMO -
        {{ isset($title) ? $title : (request()->is('login') ? 'Login' : (request()->is('register') ? 'Register' : '')) }}
    </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        teal: {
                            50: '#f0fdfa',
                            100: '#ccfbf1',
                            200: '#99f6e4',
                            300: '#5eead4',
                            400: '#2dd4bf',
                            500: '#14b8a6',
                            600: '#0d9488',
                            700: '#0f766e',
                            800: '#115e59',
                            900: '#134e4a',
                        },
                        slate: {
                            50: '#f8fafc',
                            100: '#f1f5f9',
                            200: '#e2e8f0',
                            300: '#cbd5e1',
                            400: '#94a3b8',
                            500: '#64748b',
                            600: '#475569',
                            700: '#334155',
                            800: '#1e293b',
                            900: '#0f172a',
                        },
                        blue: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            200: '#bfdbfe',
                            300: '#93c5fd',
                            400: '#60a5fa',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        }
                    },
                    height: {
                        'input': '3.5rem',
                    },
                    spacing: {
                        '18': '4.5rem',
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.3s ease-out',
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #0d9488 0%, #1d4ed8 50%, #4c1d95 100%);
        }

        .gradient-text {
            background: linear-gradient(135deg, #0d9488 0%, #1d4ed8 50%, #4c1d95 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .glass-effect {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
        }

        .shadow-custom {
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1), 0 0 0 1px rgba(255, 255, 255, 0.05);
        }

        .bg-pattern {
            background-image:
                radial-gradient(circle at 25% 25%, rgba(13, 148, 136, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, rgba(29, 78, 216, 0.1) 0%, transparent 50%);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="font-sans text-slate-900 antialiased bg-pattern">
    <div class="min-h-screen flex flex-col justify-center items-center py-12 px-4 sm:px-6 lg:px-8">
        <!-- Container with wider max-width -->
        <div class="w-full max-w-lg sm:max-w-xl lg:max-w-2xl">
            <!-- Logo Section -->
            <div class="text-center mb-10">
                <div class="flex justify-center items-center space-x-4 mb-4">
                    <div class="relative">
                        <div
                            class="w-16 h-16 rounded-2xl gradient-bg flex items-center justify-center shadow-lg transform hover:scale-105 transition-transform duration-200">
                            <i class="fas fa-brain text-white text-2xl"></i>
                        </div>
                    </div>
                    <div>
                        <h1 class="text-3xl lg:text-3xl font-bold gradient-text">Diagnosis FOMO</h1>
                    </div>
                </div>
            </div>

            <!-- Main Card -->
            <div class="glass-effect shadow-custom rounded-2xl border border-white/20 overflow-hidden">
                <!-- Header -->
                <div class="px-8 py-6 border-b border-slate-100 bg-gradient-to-r from-blue-50 to-slate-50">
                    <h2 class="text-2xl lg:text-3xl font-bold text-center text-slate-800">
                        @if (request()->is('login'))
                            <span class="flex items-center justify-center space-x-2">
                                <i class="fas fa-sign-in-alt text-blue-600"></i>
                                <span>Masuk ke Akun Anda</span>
                            </span>
                        @elseif(request()->is('register'))
                            <span class="flex items-center justify-center space-x-2">
                                <i class="fas fa-user-plus text-blue-700"></i>
                                <span>Buat Akun Baru</span>
                            </span>
                        @endif
                    </h2>
                    <p class="text-center text-slate-600 mt-2 text-sm">
                        @if (request()->is('login'))
                            Selamat datang kembali! Silakan masuk untuk melanjutkan.
                        @elseif(request()->is('register'))
                            Bergabunglah dengan ribuan pengguna lainnya.
                        @endif
                    </p>
                </div>

                <!-- Form Content -->
                <div class="px-8 py-10 lg:px-12 lg:py-12">
                    <!-- Form Fields Container -->
                    <div class="space-y-8">
                        {{ $slot }}
                    </div>

                    <!-- Divider -->
                    <div class="my-8">
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-slate-200"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-4 bg-white text-slate-500">atau</span>
                            </div>
                        </div>
                    </div>

                    <!-- Alternative Links -->
                    <div class="text-center space-y-4">
                        <p class="text-sm text-slate-600">
                            @if (request()->is('login'))
                                Belum punya akun?
                                <a href="/register"
                                    class="font-semibold text-blue-600 hover:text-blue-500 hover:underline transition-colors duration-200">
                                    Daftar sekarang →
                                </a>
                            @elseif(request()->is('register'))
                                Sudah punya akun?
                                <a href="/login"
                                    class="font-semibold text-blue-700 hover:text-blue-600 hover:underline transition-colors duration-200">
                                    Masuk di sini →
                                </a>
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="mt-8 text-center">
                <p class="text-xs text-slate-500">
                    © 2025 Diagnosis FOMO.
                </p>
            </div>
        </div>
    </div>

    <!-- Animation script -->
    <script>
        // Add smooth animations
        document.addEventListener('DOMContentLoaded', function() {
            const card = document.querySelector('.glass-effect');
            if (card) {
                card.style.animation = 'slideUp 0.5s ease-out';
            }
        });
    </script>
</body>

</html>
