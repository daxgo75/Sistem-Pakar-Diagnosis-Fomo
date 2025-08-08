@extends('admin.layouts.AdminApp')

@section('content')
    <div class="max-w-4xl mx-auto p-6"> <!-- Changed from max-w-2xl to max-w-4xl for wider layout -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden p-8">
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800">Tambah Data Certainty Factor</h2> <!-- More specific title -->
                <p class="text-gray-600 mt-1">Masukkan data certainty factor baru untuk gejala tertentu</p>
                <!-- More descriptive -->
            </div>

            <form action="{{ route('admin.certainty-factor.store') }}" method="POST" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Gejala</label> <!-- Added mb-1 -->
                        <select name="gejala_id"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 py-2 px-3 border">
                            <option value="">Pilih Gejala</option>
                            @foreach ($gejalas as $gejala)
                                <option value="{{ $gejala->id }}">
                                    {{ $gejala->kode_g }} - {{ $gejala->nama_gejala }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">CF Pakar</label> <!-- Added mb-1 -->
                        <input type="number" step="0.1" name="cf_pakar" min="0" max="1"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 py-2 px-3 border"
                            placeholder="Masukkan nilai CF pakar (0-1)">
                        <p class="mt-1 text-sm text-gray-500">Nilai antara 0.0 sampai 1.0</p> <!-- Added helper text -->
                    </div>
                </div>

                <div class="flex justify-end pt-6 space-x-4"> <!-- Added space-x-4 -->
                    <a href="{{ route('admin.certainty-factor.index') }}"
                        class="text-gray-600 hover:text-gray-800 text-sm font-medium inline-flex items-center transition duration-200">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali ke Daftar
                    </a>
                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
