@extends('admin.layouts.AdminApp')

@section('content')
    <div class="max-w-2xl mx-auto p-6">
        <div class="bg-white rounded-xl shadow-md overflow-hidden p-8">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-800 flex items-center justify-center">
                    <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                    Tambah Data Gejala
                </h2>
                <p class="text-gray-500 text-sm mt-1">Isi form berikut untuk menambahkan gejala baru</p>
            </div>

            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-red-500 mr-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <h3 class="text-red-800 font-medium">Periksa kesalahan berikut:</h3>
                    </div>
                    <ul class="mt-2 text-red-700 text-sm list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.gejala.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 gap-6">
                    <div class="space-y-2">
                        <label for="kode_g" class="block text-sm font-medium text-gray-700">
                            Kode Gejala <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" id="kode_g" name="kode_g" required
                                class="block w-full px-4 py-3 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                            @error('kode_gejala')
                                <span class="text-red-600 text-xs mt-1 block">
                                    {{ $message == 'The kode g has already been taken.' ? 'Kode gejala sudah terdaftar. Silakan gunakan kode lain yang unik.' : $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="nama_gejala" class="block text-sm font-medium text-gray-700">
                            Nama Gejala <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <textarea id="nama_gejala" name="nama_gejala" rows="3" required
                                class="block w-full px-4 py-3 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between pt-6">
                    <a href="{{ route('admin.gejala.index') }}"
                        class="text-gray-600 hover:text-gray-800 text-sm font-medium inline-flex items-center transition duration-200">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali ke Daftar
                    </a>
                    <button type="submit"
                        class="text-white bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center transition duration-200 shadow-md">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4">
                            </path>
                        </svg>
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
