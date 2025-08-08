<x-app-layout>
    <div class="py-12 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl rounded-2xl">
                <!-- Header Section with Gradient -->
                <div class="bg-gradient-to-r from-blue-500 to-indigo-600 px-8 py-6 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-2xl font-bold">Hasil Diagnosis</h1>
                            <p class="text-blue-100">Berdasarkan gejala yang Anda pilih</p>
                        </div>
                        <div class="bg-white/10 p-3 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="p-8">
                    @php
                        $bestMatch = null;
                        if (!empty($diagnosis) && count($diagnosis) > 0) {
                            $bestMatch = collect($diagnosis)->sortByDesc('match_count')->first();
                        }
                    @endphp
                    <!-- All Symptoms & Status Section -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Ringkasan Gejala</h3>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <h4 class="font-medium text-gray-700 mb-2">Gejala Dipilih</h4>
                                    <ul class="space-y-2">
                                        @foreach ($allGejala as $gejala)
                                            @if (collect($selectedGejala)->contains('id', $gejala->id))
                                                <li class="flex items-start">
                                                    <svg class="h-5 w-5 text-green-500 mr-2" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                    <span class="text-gray-700">{{ $gejala->kode_g }} -
                                                        {{ $gejala->nama_gejala }}</span>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-700 mb-2">Gejala Tidak Dipilih</h4>
                                    <ul class="space-y-2">
                                        @foreach ($allGejala as $gejala)
                                            @if (!collect($selectedGejala)->contains('id', $gejala->id))
                                                <li class="flex items-start">
                                                    <svg class="h-5 w-5 text-gray-400 mr-2" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                    <span class="text-gray-500">{{ $gejala->kode_g }} -
                                                        {{ $gejala->nama_gejala }}</span>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tampilkan jika tidak ada gejala dipilih -->
                    @if (empty($selectedGejala) || count($selectedGejala) == 0)
                        <div class="text-center py-8 bg-blue-50 rounded-lg mb-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-blue-400"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6 1a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h4 class="mt-3 text-lg font-medium text-blue-700">Anda tidak mengalami FOMO</h4>
                            <p class="mt-1 text-blue-500">Tidak ada gejala yang dipilih.</p>
                        </div>
                    @else
                        <!-- Diagnosis Results -->
                        <div class="space-y-4">
                            <h3 class="text-lg font-semibold text-gray-800">Hasil Diagnosis</h3>
                            @if ($bestMatch && $bestMatch['match_count'] > 0)
                                <div class="border rounded-lg p-6 bg-green-50 border-green-200">
                                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                                        <div>
                                            <h4 class="text-xl font-bold text-gray-900">
                                                {{ $bestMatch['penyakit']->nama_penyakit }}
                                            </h4>
                                            <p class="text-sm text-gray-600">Kode: {{ $bestMatch['penyakit']->kode_p }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="text-center py-8 bg-gray-50 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <h4 class="mt-3 text-lg font-medium text-gray-700">Tidak ditemukan diagnosis yang
                                        sesuai
                                    </h4>
                                    <p class="mt-1 text-gray-500">Gejala yang dipilih tidak cukup untuk menentukan
                                        diagnosis
                                        tertentu.</p>
                                </div>
                            @endif
                        </div>
                    @endif

                    <!-- Saran -->
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-8 rounded-r-lg mt-6">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-yellow-500" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-yellow-800">Saran</h3>
                                <div class="mt-2 text-sm text-yellow-700">
                                    <p class="mt-2">
                                        Berdasarkan hasil diagnosis, Anda menunjukkan kecenderungan terhadap gejala
                                        <strong>Fear of Missing Out (FOMO)</strong>. Disarankan untuk:
                                    </p>
                                    <ul class="list-disc pl-5 mt-2 space-y-1">
                                        <li>Mengurangi waktu penggunaan media sosial secara bertahap.</li>
                                        <li>Menetapkan waktu bebas gadget (digital detox) setiap hari.</li>
                                        <li>Fokus pada aktivitas sosial secara langsung untuk meningkatkan interaksi
                                            nyata.</li>
                                        <li>Mengenali bahwa tidak semua hal di media sosial mencerminkan kenyataan.</li>
                                        <li>Melatih kesadaran diri (self-awareness) dan praktik mindfulness.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row justify-center gap-4 pt-8 mt-8 border-t">
                        <a href="{{ route('forward-chaining.form') }}"
                            class="inline-flex items-center justify-center px-5 py-3 border border-gray-300 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            Diagnosis Ulang
                        </a>
                        @if ($bestMatch && $bestMatch['match_count'] > 0)
                            <form action="{{ route('forward-chaining.store') }}" method="POST"
                                class="w-full sm:w-auto">
                                @csrf
                                <input type="hidden" name="diagnosis_result" value="{{ json_encode([$bestMatch]) }}">
                                <input type="hidden" name="selected_gejala"
                                    value="{{ json_encode($selectedGejala) }}">

                                <button type="submit"
                                    class="w-full sm:w-auto inline-flex items-center justify-center px-5 py-3 border border-transparent text-sm font-medium rounded-lg text-white bg-green-600 hover:bg-green-700 transition-colors duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    Simpan Hasil Diagnosis
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
