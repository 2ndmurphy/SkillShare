@extends('layouts.mentor')

@section('content')
    <h1 class="text-3xl font-bold text-gray-800 mb-6">
        Buat Room Baru
    </h1>

    <form action="{{ route('mentor.rooms.store') }}" method="POST" 
          x-data="{ mode: '{{ old('mode', 'online') }}' }"
          class="bg-white p-6 md:p-8 rounded-lg shadow-md max-w-2xl">
        @csrf

        @include('partials._form-errors')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="md:col-span-2">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul Room</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                       placeholder="Contoh: Belajar Laravel 11 dari Nol">
            </div>

            <div>
                <label for="type_id" class="block text-sm font-medium text-gray-700 mb-1">Tipe Room</label>
                <select name="type_id" id="type_id" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">-- Pilih Tipe Room --</option>
                    @foreach($roomTypes as $type)
                        <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="mode" class="block text-sm font-medium text-gray-700 mb-1">Mode Room</label>
                <select name="mode" id="mode" x-model="mode"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="online">Online</option>
                    <option value="offline">Offline</option>
                    <option value="hybrid">Hybrid</option>
                </select>
            </div>

            <div class="md:col-span-2" 
                 x-show="mode === 'offline' || mode === 'hybrid'" 
                 x-transition>
                <label for="location" class="block text-sm font-medium text-gray-700 mb-1">
                    Lokasi <span class="text-red-500">(Wajib jika Offline/Hybrid)</span>
                </label>
                <input type="text" id="location" name="location" value="{{ old('location') }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                       placeholder="Contoh: Gedung A, Ruang 101">
            </div>

            <div>
                <label for="started_at" class="block text-sm font-medium text-gray-700 mb-1">Waktu Mulai</label>
                <input type="datetime-local" id="started_at" name="started_at" value="{{ old('started_at') }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label for="end_at" class="block text-sm font-medium text-gray-700 mb-1">Waktu Selesai</label>
                <input type="datetime-local" id="end_at" name="end_at" value="{{ old('end_at') }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div class="md:col-span-2">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Singkat (Opsional)</label>
                <textarea id="description" name="description" rows="4" 
                          class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                          placeholder="Apa yang akan dipelajari di room ini?">{{ old('description') }}</textarea>
            </div>

            <div class="md:col-span-2">
                <label for="requirements" class="block text-sm font-medium text-gray-700 mb-1">Persyaratan (Opsional)</label>
                <textarea id="requirements" name="requirements" rows="4" 
                          class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                          placeholder="Contoh: Wajib install PHP, Composer, dan VS Code.">{{ old('requirements') }}</textarea>
            </div>
        </div>

        <div class="flex justify-end space-x-3 mt-8">
            <a href="{{ route('mentor.dashboard.index') }}" class="px-5 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                Batal
            </a>
            <button type="submit" 
                    class="px-5 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition duration-300">
                Buat Room
            </button>
        </div>
    </form>
@endsection