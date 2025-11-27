<!-- INI HALAMAN MEMBUAT MATERI UNTUK ROOM (MENTOR)-->
@extends('layouts.mentor')

@section('content')
    <h1 class="text-3xl font-bold text-gray-800 mb-6">
        Tambah Materi Baru <span class="text-xl text-gray-500 font-normal">di {{ $room->title }}</span>
    </h1>

    <form action="{{ route('mentor.rooms.materials.store', $room) }}" method="POST" enctype="multipart/form-data"
        x-data="{ type: '{{ old('type', 'file') }}' }" class="bg-white p-6 md:p-8 rounded-lg shadow-md max-w-2xl">
        @csrf

        @include('partials._form-errors')

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul Materi</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}"
                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Singkat</label>
            <textarea id="description" name="description" rows="3"
                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('description') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Tipe Materi</label>
            <select name="type" id="type" x-model="type"
                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="file">File (PDF, Doc, dll)</option>
                <option value="link">Link (URL)</option>
                <option value="text">Teks (Artikel)</option>
            </select>
        </div>

        <div x-show="type === 'file'" class="mb-4 p-4 bg-gray-50 rounded-md border">
            <label for="file_upload" class="block text-sm font-medium text-gray-700 mb-1">Upload File</label>
            <input type="file" id="file_upload" name="file_upload"
                class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
        </div>

        <div x-show="type === 'link'" class="mb-4 p-4 bg-gray-50 rounded-md border">
            <label for="link_url" class="block text-sm font-medium text-gray-700 mb-1">URL / Link</label>
            <input type="url" id="link_url" name="link_url" value="{{ old('link_url') }}"
                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm"
                placeholder="https://contoh.com/materi-anda">
        </div>

        <div x-show="type === 'text'" class="mb-4 p-4 bg-gray-50 rounded-md border">
            <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Konten Teks</label>
            <textarea id="content" name="content" rows="10"
                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">{{ old('content') }}</textarea>
        </div>
        <div class="flex justify-end space-x-3">
            <a href="{{ route('mentor.rooms.show', $room) }}"
                class="px-5 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                Batal
            </a>
            <button type="submit"
                class="px-5 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition duration-300">
                Simpan Materi
            </button>
        </div>
    </form>
@endsection