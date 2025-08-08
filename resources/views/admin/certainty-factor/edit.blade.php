@extends('admin.layouts.AdminApp')

@section('content')
    <div class="max-w-2xl mx-auto p-6">
        <div class="bg-white rounded-xl shadow-md overflow-hidden p-8">
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800">Edit Data</h2>
                <p class="text-gray-600 mt-1">Perbarui data certainty factor</p>
            </div>

            <form action="{{ route('admin.certainty-factor.update', $certaintyFactor->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Gejala</label>
                        <select name="gejala_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @foreach ($gejalas as $gejala)
                                <option value="{{ $gejala->id }}"
                                    {{ $certaintyFactor->gejala_id == $gejala->id ? 'selected' : '' }}>
                                    {{ $gejala->kode_g }} - {{ $gejala->nama_gejala }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">CF Pakar</label>
                        <input type="number" step="0.1" name="cf_pakar" min="0" max="1"
                            value="{{ old('cf_pakar', $certaintyFactor->cf_pakar) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                            placeholder="Masukkan nilai CF pakar (0-1)">
                    </div>
                </div>

                <div class="flex justify-end pt-6 gap-4">
                    <a href="{{ route('admin.certainty-factor.index') }}"
                        class="px-4 py-2 text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200">
                        Batal
                    </a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
