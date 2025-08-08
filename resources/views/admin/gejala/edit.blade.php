@extends('admin.layouts.AdminApp')

@section('content')
    <div class="max-w-2xl mx-auto p-6">
        <div class="bg-white rounded-xl shadow-md overflow-hidden p-8">
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800 flex items-center justify-center">
                    <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                    Edit Data Gejala
                </h2>
                <p class="text-gray-500 text-sm mt-1">Perbarui informasi gejala</p>
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

            <form action="{{ route('admin.gejala.update', $gejala->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-6">
                    <div class="space-y-2">
                        <label for="kode_g" class="block text-sm font-medium text-gray-700">
                            Kode Gejala <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" id="kode_g" name="kode_g" value="{{ old('kode_g', $gejala->kode_g) }}"
                                required
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
                            Gejala <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <textarea id="nama_gejala" name="nama_gejala" rows="4" required
                                class="block w-full px-4 py-3 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">{{ old('nama_gejala', $gejala->nama_gejala) }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between pt-4">
                    <a href="{{ route('admin.gejala.index') }}"
                        class="text-gray-600 hover:text-gray-800 text-sm font-medium inline-flex items-center transition duration-200">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali ke Daftar
                    </a>
                    <div class="space-x-2">
                        <button type="submit"
                            class="text-white bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center transition duration-200 shadow-md">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
