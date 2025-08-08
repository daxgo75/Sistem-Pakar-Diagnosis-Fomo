<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!--Header Section -->
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 -m-6 p-6 mb-6 border-b">
                    <div class="max-w-3xl mx-auto text-center">
                        <h2 class="text-3xl font-bold text-gray-900 mb-2">Diagnosis Penyakit</h2>
                        <p class="text-gray-600">Jawab pertanyaan berikut sesuai dengan gejala yang Anda alami
                        </p>
                        <div
                            class="mt-4 inline-flex items-center px-4 py-2 bg-blue-100 text-blue-700 rounded-full text-sm">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Pilih Ya atau Tidak untuk setiap gejala
                        </div>
                    </div>
                </div>

                <form action="{{ route('forward-chaining.diagnose') }}" method="POST">
                    @csrf
                    <div class="space-y-4">
                        @foreach ($gejalas as $gejala)
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="flex items-center justify-between">
                                    <div class="flex-grow">
                                        <p class="font-medium text-gray-900">{{ $gejala->kode_g }}</p>
                                        <p class="text-gray-600">{{ $gejala->nama_gejala }}</p>
                                    </div>
                                    <div class="ml-4 flex items-center space-x-4">
                                        <label class="inline-flex items-center">
                                            <input type="radio" name="gejala[{{ $gejala->id }}]" value="1" required
                                                class="form-radio text-green-600 border-gray-300 focus:ring-green-500">
                                            <span class="ml-2 text-sm text-green-600">Ya</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="radio" name="gejala[{{ $gejala->id }}]" value="0" required
                                                class="form-radio text-red-600 border-gray-300 focus:ring-red-500">
                                            <span class="ml-2 text-sm text-red-600">Tidak</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="flex justify-end mt-6">
                        <button type="submit"
                            class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                            Proses Diagnosis
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
