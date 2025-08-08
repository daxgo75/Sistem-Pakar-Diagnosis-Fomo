<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Halo, ') }} {{ Auth::user()->name }} 👋
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Hero Section -->
            <div class="bg-blue-500 rounded-xl shadow-md overflow-hidden mb-8">
                <div class="p-8 md:p-12 flex flex-col md:flex-row items-center">
                    <div class="md:w-1/2 mb-6 md:mb-0">
                        <h1 class="text-2xl md:text-4xl font-bold text-white mb-4">Tes Tingkat FOMO Anda</h1>
                        <p class="text-blue-100 text-lg mb-6">
                            Pilih metode diagnosa yang ingin Anda gunakan untuk menganalisis tingkat FOMO Anda!
                        </p>
                    </div>
                    <div class="md:w-1/2 flex justify-center">
                        <img src="/images/checklist.png" class="h-64 object-contain">
                    </div>
                </div>
            </div>

            <!-- Method Selection Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                <!-- Forward Chaining Method -->
                <div
                    class="bg-white rounded-xl shadow-lg hover:shadow-xl transition duration-300 overflow-hidden border-2 border-transparent hover:border-blue-200">
                    <div class="bg-blue-500 p-6">
                        <div class="flex items-center mb-4">
                            <div class="bg-white bg-opacity-20 p-3 rounded-full mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-white">Forward Chaining</h3>
                        </div>
                        <p class="text-blue-100 text-lg">
                            Metode inferensi berbasis aturan yang bekerja dari fakta menuju kesimpulan
                        </p>
                    </div>

                    <div class="p-6">
                        <div class="mb-6">
                            <h4 class="font-semibold text-gray-800 mb-3">Keunggulan Metode:</h4>
                            <ul class="space-y-2 text-gray-600">
                                <li class="flex items-start">
                                    <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Analisis sistematis dan terstruktur
                                </li>
                                <li class="flex items-start">
                                    <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Hasil diagnosis yang jelas dan tegas
                                </li>
                                <li class="flex items-start">
                                    <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Proses reasoning yang dapat dilacak
                                </li>
                            </ul>
                        </div>

                        <div class="bg-blue-50 p-4 rounded-lg mb-6">
                            <p class="text-sm text-blue-800">
                                <strong>Cocok untuk:</strong> Anda yang ingin diagnosis definitif berdasarkan
                                gejala-gejala FOMO yang dialami
                            </p>
                        </div>

                        <a href="{{ route('forward-chaining.form') }}"
                            class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-4 px-6 rounded-full transition duration-300 inline-flex items-center justify-center group">
                            Mulai Tes Forward Chaining
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 ml-2 group-hover:translate-x-1 transition-transform" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                        <div class="mt-4">
                            <a href="{{ route('forward-chaining.history') }}"
                                class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-4 px-6 rounded-full transition duration-300 inline-flex items-center justify-center group">
                                Lihat Riwayat Tes Forward Chaining
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 ml-2 group-hover:translate-x-1 transition-transform"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Certainty Factor Method -->
                <div
                    class="bg-white rounded-xl shadow-lg hover:shadow-xl transition duration-300 overflow-hidden border-2 border-transparent hover:border-blue-200">
                    <div class="bg-green-500 p-6">
                        <div class="flex items-center mb-4">
                            <div class="bg-white bg-opacity-20 p-3 rounded-full mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-white">Certainty Factor</h3>
                        </div>
                        <p class="text-green-100 text-lg">
                            Metode probabilitas yang memberikan tingkat kepercayaan dalam diagnosis
                        </p>
                    </div>

                    <div class="p-6">
                        <div class="mb-6">
                            <h4 class="font-semibold text-gray-800 mb-3">Keunggulan Metode:</h4>
                            <ul class="space-y-2 text-gray-600">
                                <li class="flex items-start">
                                    <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Memberikan persentase tingkat kepercayaan
                                </li>
                                <li class="flex items-start">
                                    <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Menangani ketidakpastian dengan baik
                                </li>
                                <li class="flex items-start">
                                    <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Analisis probabilistik yang akurat
                                </li>
                            </ul>
                        </div>

                        <div class="bg-green-50 p-4 rounded-lg mb-6">
                            <p class="text-sm text-green-800">
                                <strong>Cocok untuk:</strong> Anda yang ingin mengetahui tingkat FOMO dengan persentase
                                kepercayaan yang spesifik
                            </p>
                        </div>

                        <a href="{{ route('certainty-factor.form') }}"
                            class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-4 px-6 rounded-full transition duration-300 inline-flex items-center justify-center group">
                            Mulai Tes Certainty Factor
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 ml-2 group-hover:translate-x-1 transition-transform"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>

                        <div class="mt-4">
                            <a href="{{ route('certainty-factor.history') }}"
                                class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-4 px-6 rounded-full transition duration-300 inline-flex items-center justify-center group">
                                Lihat Riwayat Tes Certainty Factor
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 ml-2 group-hover:translate-x-1 transition-transform"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Info Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div
                    class="bg-white p-6 rounded-xl shadow-md border-l-4 border-blue-500 hover:shadow-lg transition duration-300">
                    <div class="flex items-center mb-4">
                        <div class="bg-blue-100 p-3 rounded-full mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-lg">Apa itu FOMO?</h3>
                    </div>
                    <p class="text-gray-600">
                        Fear of Missing Out adalah kecemasan sosial karena takut ketinggalan pengalaman yang mungkin
                        didapatkan orang lain.
                    </p>
                </div>

                <div
                    class="bg-white p-6 rounded-xl shadow-md border-l-4 border-green-500 hover:shadow-lg transition duration-300">
                    <div class="flex items-center mb-4">
                        <div class="bg-green-100 p-3 rounded-full mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-lg">Proses Tes</h3>
                    </div>
                    <p class="text-gray-600">
                        Pilih metode yang sesuai, lalu isi kuesioner tentang kebiasaan dan perasaan Anda terhadap media
                        sosial.
                    </p>
                </div>

                <div
                    class="bg-white p-6 rounded-xl shadow-md border-l-4 border-blue-400 hover:shadow-lg transition duration-300">
                    <div class="flex items-center mb-4">
                        <div class="bg-blue-100 p-3 rounded-full mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-lg">Hasil & Solusi</h3>
                    </div>
                    <p class="text-gray-600">
                        Dapatkan analisis tingkat FOMO sesuai metode yang dipilih beserta saran untuk mengatasinya.
                    </p>
                </div>
            </div>

            <!-- Comparison Section -->
            <div class="bg-white p-8 rounded-xl shadow-md mb-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">Perbandingan Metode</h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="border-b">
                                <th class="pb-4 text-gray-700 font-semibold">Aspek</th>
                                <th class="pb-4 text-blue-500 font-semibold text-center">Forward Chaining</th>
                                <th class="pb-4 text-green-500 font-semibold text-center">Certainty Factor</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600">
                            <tr class="border-b">
                                <td class="py-3 font-medium">Jenis Hasil</td>
                                <td class="py-3 text-center">Diagnosis definitif (Ya/Tidak)</td>
                                <td class="py-3 text-center">Persentase kepercayaan (0-100%)</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-3 font-medium">Pendekatan</td>
                                <td class="py-3 text-center">Berbasis aturan logika</td>
                                <td class="py-3 text-center">Berbasis probabilitas</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-3 font-medium">Waktu Tes</td>
                                <td class="py-3 text-center">2-3 menit</td>
                                <td class="py-3 text-center">4-5 menit</td>
                            </tr>
                            <tr>
                                <td class="py-3 font-medium">Detail Analisis</td>
                                <td class="py-3 text-center">Kategori FOMO yang terdeteksi</td>
                                <td class="py-3 text-center">Tingkat kepercayaan tiap kategori</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="text-center bg-blue-500 p-8 rounded-xl shadow-md text-white">
                <h3 class="text-2xl font-bold mb-4">Tidak yakin metode mana yang cocok?</h3>
                <p class="mb-6 max-w-2xl mx-auto opacity-90">
                    Coba kedua metode untuk mendapatkan perspektif yang lebih lengkap tentang tingkat FOMO Anda!
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('forward-chaining.form') }}"
                        class="bg-white text-blue-500 hover:bg-gray-100 font-bold py-3 px-6 rounded-full transition duration-300 inline-flex items-center justify-center">
                        Coba Forward Chaining
                    </a>
                    <a href="{{ route('certainty-factor.form') }}"
                        class="bg-white text-green-500 hover:bg-gray-100 font-bold py-3 px-6 rounded-full transition duration-300 inline-flex items-center justify-center">
                        Coba Certainty Factor
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
