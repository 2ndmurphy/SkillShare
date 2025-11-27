@extends('layouts.mentor')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            Dashboard
        </h1>
        <a href="{{ route('mentor.rooms.create') }}" 
           class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300">
            Buat Room Baru
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
        @forelse ($rooms as $room)
            @include('partials._room-card', ['room' => $room])
        @empty
            <div class="md:col-span-2 lg:col-span-3 bg-white p-6 rounded-lg shadow-md text-center text-gray-500">
                <p>Anda belum membuat room. Klik "Buat Room Baru" untuk memulai.</p>
            </div>
        @endforelse
        
    </div>
@endsection