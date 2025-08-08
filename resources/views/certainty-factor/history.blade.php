<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- Header Section -->
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">Riwayat Diagnosis FOMO</h2>
                            <p class="text-gray-600 mt-1">Catatan lengkap semua hasil pemeriksaan Fear of Missing Out
                                (FOMO)</p>
                        </div>
                        <div class="mt-4 md:mt-0">
                            <a href="{{ route('dashboard') }}"
                                class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 shadow-sm transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                Kembali ke Dashboard
                            </a>
                        </div>
                    </div>

                    @if ($histories->isEmpty())
                        <div class="text-center py-12 bg-gray-50 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <h3 class="mt-2 text-lg font-medium text-gray-900">Belum ada riwayat diagnosis FOMO</h3>
                            <p class="mt-1 text-gray-500">Hasil diagnosis FOMO Anda akan muncul di halaman ini.</p>
                        </div>
                    @else
                        <!-- User Profile Card -->
                        <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-6 mb-8">
                            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                <div class="flex items-center mb-4 md:mb-0">
                                    <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-3 rounded-full mr-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900">{{ auth()->user()->name }}</h3>
                                        <p class="text-gray-600">ID Pengguna: {{ auth()->user()->id }}</p>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                    <div>
                                        <p class="text-sm text-gray-500">Jenis Kelamin</p>
                                        <p class="font-medium">{{ auth()->user()->gender ?? 'Tidak disebutkan' }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Total Diagnosis</p>
                                        <p class="font-medium">{{ $histories->total() }} kali</p>
                                    </div>
                                    <div class="col-span-2 md:col-span-1">
                                        <p class="text-sm text-gray-500">Diagnosis Terakhir</p>
                                        <p class="font-medium">{{ $histories->first()->created_at->format('d M Y') }}
                                        </p>
                                    </div>
                                    <div class="col-span-2 md:col-span-1">
                                        <p class="text-sm text-gray-500">Alamat</p>
                                        <p class="font-medium">{{ auth()->user()->address ?? 'Tidak disebutkan' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- FOMO Level Indicators -->
                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Tingkat Keyakinan FOMO</h3>
                            <div class="space-y-4">
                                @foreach ($histories as $history)
                                    @php
                                        $percentage = number_format($history->cf_value * 100, 2);
                                        $bgColor = '';
                                        $textColor = '';
                                        $level = '';

                                        if ($percentage >= 70) {
                                            $bgColor = 'bg-red-100';
                                            $textColor = 'text-red-800';
                                            $level = 'Tinggi';
                                        } elseif ($percentage >= 40) {
                                            $bgColor = 'bg-yellow-100';
                                            $textColor = 'text-yellow-800';
                                            $level = 'Sedang';
                                        } else {
                                            $bgColor = 'bg-green-100';
                                            $textColor = 'text-green-800';
                                            $level = 'Rendah';
                                        }
                                    @endphp
                                    <div
                                        class="bg-white border border-gray-200 rounded-lg p-5 hover:shadow-md transition-shadow">
                                        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                            <div class="flex items-center mb-3 md:mb-0">
                                                <span
                                                    class="text-gray-500 font-medium mr-4 text-lg">{{ $loop->iteration }}.</span>
                                                <div>
                                                    <h4 class="text-lg font-semibold text-gray-800">Tingkat Keyakinan
                                                        FOMO</h4>
                                                    <div class="w-full bg-gray-200 rounded-full h-2.5 mt-2">
                                                        <div class="h-2.5 rounded-full {{ $bgColor }} {{ $textColor }}"
                                                            style="width: {{ $percentage }}%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex flex-col items-end">
                                                <span
                                                    class="text-sm text-gray-500 mb-1">{{ $history->created_at->format('d M Y H:i') }}</span>
                                                <span
                                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $bgColor }} {{ $textColor }}">
                                                    {{ $percentage }}% ({{ $level }})
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Statistics Section -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                            <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
                                <div class="flex items-center">
                                    <div class="bg-red-100 p-2 rounded-lg mr-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Tingkat Tertinggi</p>
                                        <p class="text-2xl font-semibold">
                                            {{ number_format($histories->max('cf_value') * 100, 2) }}%</p>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
                                <div class="flex items-center">
                                    <div class="bg-green-100 p-2 rounded-lg mr-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Tingkat Terendah</p>
                                        <p class="text-2xl font-semibold">
                                            {{ number_format($histories->min('cf_value') * 100, 2) }}%</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
