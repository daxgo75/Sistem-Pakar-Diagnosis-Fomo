<x-app-layout>
    <div class="py-12 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Card Container -->
            <div class="bg-white overflow-hidden shadow-xl rounded-2xl">
                <!-- Header Section with Gradient -->
                <div class="bg-gradient-to-r from-blue-500 to-indigo-600 px-8 py-6 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-2xl font-bold">Hasil Diagnosis FOMO Menggunakan Certainty Factor</h1>
                            <p class="text-blue-100">Berdasarkan gejala yang Anda pilih</p>
                        </div>
                        <div class="bg-white/10 p-3 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="p-8">
                    <!-- Result Card -->
                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-6 mb-8 border border-blue-100">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-gray-800">Tingkat Kecenderungan FOMO Anda</h3>
                            <span class="px-3 py-1 bg-blue-100 text-blue-800 text-sm font-medium rounded-full">
                                {{ number_format($result['percentage'], 2) }}%
                            </span>
                        </div>

                        <!-- Progress Bar with Animation -->
                        <div class="mb-2">
                            <div class="flex justify-between text-sm text-gray-600 mb-1">
                                <span>Rendah</span>
                                <span>Tinggi</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-3">
                                <div class="bg-gradient-to-r from-blue-400 to-indigo-600 h-3 rounded-full transition-all duration-1000 ease-out"
                                    style="width: {{ number_format($result['percentage'], 2) }}%"></div>
                            </div>
                        </div>

                        <!-- Interpretation -->
                        <div class="mt-4 text-sm text-gray-600">
                            @if ($result['percentage'] < 30)
                                <p>Kecenderungan FOMO Anda termasuk <span
                                        class="font-medium text-green-600">rendah</span>. Anda tampaknya cukup nyaman
                                    dengan kehidupan Anda sendiri tanpa terlalu terpengaruh oleh aktivitas orang lain.
                                </p>
                            @elseif($result['percentage'] < 70)
                                <p>Anda menunjukkan <span class="font-medium text-yellow-600">sedikit kecenderungan
                                        FOMO</span>. Terkadang Anda mungkin merasa khawatir melewatkan hal-hal penting
                                    yang dilakukan orang lain.</p>
                            @else
                                <p>Anda memiliki <span class="font-medium text-red-600">kecenderungan FOMO yang
                                        tinggi</span>. Anda mungkin sering merasa cemas atau tidak nyaman ketika melihat
                                    aktivitas orang lain di media sosial.</p>
                            @endif
                        </div>
                    </div>

                    <!-- Calculation Details -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-500"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd" />
                            </svg>
                            Gejala yang Dipilih
                        </h3>

                        <div class="space-y-3">
                            @foreach ($result['gejala_terpilih'] as $index => $gejala)
                                <div
                                    class="bg-gray-50 p-4 rounded-lg border border-gray-200 hover:border-blue-200 transition-colors">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="font-medium text-gray-800">Gejala {{ $index + 1 }}</p>
                                            <p class="text-sm text-gray-600">{{ $gejala['nama_gejala'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Recommendations -->
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-8 rounded-r-lg">
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
                                    <p>Berdasarkan hasil diagnosis, pertimbangkan untuk membatasi waktu penggunaan media
                                        sosial dan fokus pada aktivitas yang benar-benar penting bagi Anda.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row justify-center gap-4 pt-4">
                        <a href="{{ route('certainty-factor.form') }}"
                            class="inline-flex items-center justify-center px-5 py-3 border border-gray-300 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            Diagnosis Ulang
                        </a>
                        <a href="{{ route('dashboard') }}"
                            class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 shadow-sm transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Kembali ke Dashboard
                        </a>
                        <form action="{{ route('certainty-factor.store') }}" method="POST" class="w-full sm:w-auto">
                            @csrf
                            <input type="hidden" name="final_cf" value="{{ $result['cf_value'] }}">
                            <input type="hidden" name="selected_gejala" value='@json($selectedGejala)'>

                            <button type="submit"
                                class="w-full sm:w-auto inline-flex items-center justify-center px-5 py-3 border border-transparent text-sm font-medium rounded-lg text-white bg-green-600 hover:bg-green-700 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Simpan Hasil Diagnosis
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
