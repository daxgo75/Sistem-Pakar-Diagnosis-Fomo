@extends('admin.layouts.AdminApp')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="mb-8 pt-6">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Dashboard Admin</h1>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
            <!-- Card Total Users -->
            <div class="bg-white rounded-lg p-5 shadow border-l-4 border-blue-500">
                <div class="flex items-center">
                    <div class="p-3 bg-blue-100 rounded-lg text-blue-600">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Pengguna</p>
                        <p class="text-xl font-semibold text-gray-800">{{ $totalUsers }}</p>
                    </div>
                </div>
            </div>

            <!-- Card Total Gejala -->
            <div class="bg-white rounded-lg p-5 shadow border-l-4 border-green-500">
                <div class="flex items-center">
                    <div class="p-3 bg-green-100 rounded-lg text-green-600">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Gejala</p>
                        <p class="text-xl font-semibold text-gray-800">{{ $totalGejala }}</p>
                    </div>
                </div>
            </div>

            <!-- Card Total Penyakit -->
            <div class="bg-white rounded-lg p-5 shadow border-l-4 border-purple-500">
                <div class="flex items-center">
                    <div class="p-3 bg-purple-100 rounded-lg text-purple-600">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Penyakit</p>
                        <p class="text-xl font-semibold text-gray-800">{{ $totalPenyakit }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            <!-- Metode Diagnosa Section -->
            <div class="bg-white p-6 rounded-lg shadow col-span-2">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Metode Diagnosa</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Forward Chaining Card -->
                    <div class="bg-white rounded-lg p-5 shadow border border-gray-100 hover:shadow-md transition-shadow">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="p-3 bg-indigo-100 rounded-lg text-indigo-600">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Forward Chaining
                                    </p>
                                    <p class="text-xl font-semibold text-gray-800">{{ $totalForwardChaining }}</p>
                                </div>
                            </div>
                            <a href="{{ route('admin.forward-chaining.index') }}"
                                class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">
                                Kelola →
                            </a>
                        </div>
                    </div>

                    <!-- Certainty Factor Card -->
                    <div class="bg-white rounded-lg p-5 shadow border border-gray-100 hover:shadow-md transition-shadow">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="p-3 bg-pink-100 rounded-lg text-pink-600">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Certainty Factor
                                    </p>
                                    <p class="text-xl font-semibold text-gray-800">{{ $totalCertaintyFactor }}</p>
                                </div>
                            </div>
                            <a href="{{ route('admin.certainty-factor.index') }}"
                                class="text-pink-600 hover:text-pink-800 text-sm font-medium">
                                Kelola →
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
