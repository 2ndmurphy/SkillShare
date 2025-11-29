<div class="bg-white shadow-lg rounded-lg overflow-hidden">
    <div class="p-6">
        <h3 class="text-xl font-semibold mb-2 text-gray-800">{{ $room->title }}</h3>
        
        <p class="text-sm text-gray-500 mb-3">{{ $room->roomType->name }}</p>
        
        <p class="text-gray-600 mb-4 text-sm line-clamp-3">
            {{ $room->description }}
        </p>

        <div class="mb-4">
            @if($room->status == 'waiting')
                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    Dibuka
                </span>
            @elseif($room->status == 'started')
                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                    Sedang Berlangusng
                </span>
            @else
                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                    Selesai
                </span>
            @endif
        </div>

        <a href="{{ route('mentor.rooms.show', $room) }}" 
           class="inline-block w-full text-center px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition duration-300">
            Kelola Room
        </a>
    </div>
</div>