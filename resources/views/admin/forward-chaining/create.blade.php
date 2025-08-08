@extends('admin.layouts.AdminApp')

@section('content')
    <div class="max-w-6xl mx-auto p-6">
        <div class="bg-white rounded-xl shadow-md overflow-hidden p-8">
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800">Tambah Forward Chaining Rule</h2>
                <p class="text-gray-600 mt-1">Masukkan data rule baru untuk penyakit dan gejala terkait</p>
            </div>

            <form action="{{ route('admin.forward-chaining.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Penyakit Selection -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Penyakit</label>
                    <select name="penyakit_id" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 py-2 px-3 border text-base">
                        <option value="">Pilih Penyakit</option>
                        @foreach ($penyakits as $penyakit)
                            <option value="{{ $penyakit->id }}">
                                {{ $penyakit->kode_p }} - {{ $penyakit->nama_penyakit }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Gejala Selection -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-3">Pilih Gejala</label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        @foreach ($gejalas as $gejala)
                            <div
                                class="flex items-start p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                                <div class="flex items-center h-5 mt-1">
                                    <input id="gejala_{{ $gejala->id }}" name="gejala_id[]" type="checkbox"
                                        value="{{ $gejala->id }}"
                                        class="h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                </div>
                                <div class="ml-3">
                                    <label for="gejala_{{ $gejala->id }}"
                                        class="block text-base font-medium text-gray-700">
                                        {{ $gejala->kode_g }}
                                    </label>
                                    <p class="text-sm text-gray-900 mt-1">{{ $gejala->nama_gejala }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Bagian tombol yang dimodifikasi -->
                    <div class="flex justify-end mt-6 space-x-3">
                        <a href="{{ route('admin.forward-chaining.index') }}"
                            class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Kembali
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            Simpan Rule
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
