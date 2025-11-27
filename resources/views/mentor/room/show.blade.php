<!-- INI HALAMAN UNTUK MELIHAT DETAIL ROOM (MENTOR) -->
@extends('layouts.mentor')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">{{ $room->title }}</h1>
            <p class="text-lg text-gray-600">{{ $room->roomType->name }} - <span class="font-medium {{ $room->status == 'open' ? 'text-green-600' : 'text-red-600' }}">{{ $room->status }}</span></p>
        </div>
        <a href="{{ route('mentor.rooms.edit', $room) }}" 
           class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition duration-300">
            Edit Detail Room
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-semibold text-gray-700">Manajemen Materi</h2>
                <a href="{{ route('mentor.rooms.materials.create', $room) }}" 
                   class="px-3 py-1 bg-blue-600 text-white rounded-md hover:bg-blue-700 text-sm">
                   + Tambah Materi
                </a>
            </div>
            
            <ul class="space-y-3">
                @forelse ($room->materials->sortBy('created_at') as $material)
                    <li class="flex justify-between items-center p-3 border rounded-md">
                        <div>
                            @if($material->type == 'file') 📄
                            @elseif($material->type == 'link') 🔗
                            @else 📝
                            @endif
                            <span class="ml-2 text-gray-800">{{ $material->title }}</span>
                        </div>
                        <div class="flex space-x-2">
                            <a href="{{ route('mentor.rooms.materials.edit', [$room, $material]) }}" class="text-sm text-indigo-600 hover:text-indigo-800">Edit</a>
                            <form action="{{ route('mentor.rooms.materials.destroy', [$room, $material]) }}" method="POST" onsubmit="return confirm('Yakin hapus materi ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-sm text-red-600 hover:text-red-800">Hapus</button>
                            </form>
                        </div>
                    </li>
                @empty
                    <p class="text-gray-500 text-center py-4">Belum ada materi di room ini.</p>
                @endforelse
            </ul>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-semibold text-gray-700">Manajemen Post</h2>
                <a href="{{ route('mentor.rooms.posts.create', $room) }}" 
                   class="px-3 py-1 bg-green-600 text-white rounded-md hover:bg-green-700 text-sm">
                   + Tulis Post
                </a>
            </div>

            <ul class="space-y-3">
                @forelse ($room->posts->sortByDesc('created_at') as $post)
                    <li class="flex justify-between items-center p-3 border rounded-md">
                        <span class="text-gray-800">{{ $post->title }}</span>
                        <div class="flex space-x-2">
                            <a href="{{ route('mentor.rooms.posts.edit', [$room, $post]) }}" class="text-sm text-indigo-600 hover:text-indigo-800">Edit</a>
                            <form action="{{ route('mentor.rooms.posts.destroy', [$room, $post]) }}" method="POST" onsubmit="return confirm('Yakin hapus post ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-sm text-red-600 hover:text-red-800">Hapus</button>
                            </form>
                        </div>
                    </li>
                @empty
                    <p class="text-gray-500 text-center py-4">Belum ada post undangan untuk room ini.</p>
                @endforelse
            </ul>
        </div>

    </div>
@endsection