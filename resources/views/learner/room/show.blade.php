@extends('layouts.app') @section('content')
<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900">{{ $room->title }}</h1>
            <p class="text-lg text-gray-600">
                Dibimbing oleh: 
                <span class="font-semibold">{{ $room->mentor->name }}</span>
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <main class="lg:col-span-2">
                
                <div x-data="{ tab: 'materi' }" class="bg-white shadow-md rounded-lg overflow-hidden">
                    
                    <nav class="border-b border-gray-200">
                        <div class="px-6">
                            <ul class="flex">
                                <li class="mr-1">
                                    <button @click="tab = 'materi'" 
                                            :class="tab === 'materi' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                                            class="py-4 px-1 border-b-2 font-medium text-sm focus:outline-none">
                                        Materi & Progres
                                    </button>
                                </li>
                                <li class="mr-1">
                                    <button @click="tab = 'diskusi'" 
                                            :class="tab === 'diskusi' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                                            class="py-4 px-1 border-b-2 font-medium text-sm focus:outline-none">
                                        Diskusi
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </nav>

                    <div class="p-6 md:p-8">
                        
                        <div x-show="tab === 'materi'">
                            <h2 class="text-2xl font-semibold text-gray-800 mb-5">
                                Daftar Materi
                            </h2>
                            <ul class="space-y-5">
                                @forelse ($room->materials as $material)
                                <li class="flex items-center justify-between p-4 bg-gray-50 rounded-lg border border-gray-200">
                                    <div class="flex items-center">
                                        <input type="checkbox" class="h-5 w-5 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 mr-4">
                                        
                                        <span class="mr-3 text-2xl">
                                            @if($material->type == 'file') 📄
                                            @elseif($material->type == 'link') 🔗
                                            @else 📝
                                            @endif
                                        </span>
                                        
                                        <div>
                                            <h3 class="font-semibold text-gray-800">{{ $material->title }}</h3>
                                            <p class="text-sm text-gray-600">{{ $material->description }}</p>
                                        </div>
                                    </div>
                                    <button class="px-3 py-1 text-sm bg-indigo-100 text-indigo-700 rounded-full hover:bg-indigo-200">
                                        Lihat
                                    </button>
                                </li>
                                @empty
                                <p class="text-gray-500 italic">Belum ada materi yang dipublikasikan oleh mentor.</p>
                                @endforelse
                            </ul>
                        </div>

                        <div x-show="tab === 'diskusi'" style="display: none;">
                            <h2 class="text-2xl font-semibold text-gray-800 mb-5">
                                Diskusi Room
                            </h2>
                            <p class="text-gray-500 italic">
                                Fitur diskusi akan segera hadir. Di sini Anda bisa bertanya kepada mentor dan rekan satu room.
                            </p>
                            </div>

                    </div>
                </div>
            </main>

            <aside class="lg:col-span-1 space-y-6">
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Progres Saya</h3>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-green-600 h-2.5 rounded-full" style="width: 0%"></div>
                    </div>
                    <p class="text-sm text-gray-500 mt-2">0% Selesai</p>
                </div>

                <div class="bg-white shadow-md rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Tentang Room Ini</h3>
                    <ul class="space-y-3 text-sm">
                        <li class="flex justify-between items-center">
                            <span class="font-medium text-gray-600">🗓️ Mulai</span>
                            <span class="text-gray-800 font-semibold">{{ $room->started_at->format('j M Y') }}</span>
                        </li>
                        <li class="flex justify-between items-center">
                            <span class="font-medium text-gray-600">🏁 Selesai</span>
                            <span class="text-gray-800 font-semibold">{{ $room->end_at->format('j M Y') }}</span>
                        </li>
                        <li class="flex justify-between items-center">
                            <span class="font-medium text-gray-600">💻 Mode</span>
                            <span class="text-gray-800 font-semibold capitalize">{{ $room->mode }}</span>
                        </li>
                    </ul>
                </div>
            </aside>

        </div>
    </div>
</div>
@endsection