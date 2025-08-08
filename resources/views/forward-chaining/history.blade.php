<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- Header Section -->
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
                        <div>
                            <h2 class="text-2xl font-semibold text-gray-800">Riwayat Diagnosis Pasien</h2>
                            <p class="text-gray-600 mt-1">Catatan lengkap semua diagnosis yang pernah dilakukan</p>
                        </div>
                        <div class="mt-4 md:mt-0">
                            <a href="{{ route('dashboard') }}"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
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
                            <h3 class="mt-2 text-lg font-medium text-gray-900">Belum ada riwayat diagnosis</h3>
                            <p class="mt-1 text-gray-500">Diagnosis yang Anda lakukan akan muncul di halaman ini.</p>
                        </div>
                    @else
                        <!-- Patient Profile Card -->
                        <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-6 mb-8">
                            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                <div class="flex items-center mb-4 md:mb-0">
                                    <div class="bg-blue-100 p-3 rounded-full mr-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900">{{ auth()->user()->name }}</h3>
                                        <p class="text-gray-600">ID Pasien: {{ auth()->user()->id }}</p>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                    <div>
                                        <p class="text-sm text-gray-500">Jenis Kelamin</p>
                                        <p class="font-medium">{{ auth()->user()->gender ?? 'Tidak disebutkan' }}</p>
                                    </div>
                                    <div class="col-span-2 md:col-span-1">
                                        <p class="text-sm text-gray-500">Alamat</p>
                                        <p class="font-medium">{{ auth()->user()->address ?? 'Tidak disebutkan' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Statistics Card -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                            <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
                                <div class="flex items-center">
                                    <div class="bg-blue-100 p-2 rounded-lg mr-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Total Diagnosis</p>
                                        <p class="text-2xl font-semibold">{{ $histories->total() }}</p>
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
                                        <p class="text-sm text-gray-500">Diagnosis Terakhir</p>
                                        <p class="text-lg font-semibold">
                                            {{ $histories->first()->created_at->format('d M Y') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
                                <div class="flex items-center">
                                    <div class="bg-purple-100 p-2 rounded-lg mr-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Hasil Diagnosis</p>
                                        <p class="text-lg font-semibold">
                                            {{ $histories->first()->penyakit->nama_penyakit }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- History Section -->
                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Detail Riwayat Diagnosis</h3>
                            <div class="overflow-hidden border border-gray-200 rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Tanggal</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Diagnosis</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Gejala</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($histories as $history)
                                            <tr class="hover:bg-gray-50">
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">
                                                        {{ $history->created_at->format('d M Y') }}</div>
                                                    <div class="text-sm text-gray-500">
                                                        {{ $history->created_at->format('H:i') }}</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $history->penyakit->nama_penyakit }}</div>
                                                    <div class="text-sm text-gray-500">
                                                        {{ $history->penyakit->kategori ?? '' }}</div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="flex flex-wrap gap-1 max-w-xs">
                                                        @foreach ($history->gejala as $gejala)
                                                            <span
                                                                class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-800">
                                                                {{ $gejala->kode_g }}
                                                            </span>
                                                        @endforeach
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
