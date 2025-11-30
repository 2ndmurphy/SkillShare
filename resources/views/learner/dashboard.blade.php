<x-learner-layout>
  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 md:p-8">
          <h3 class="mb-6 text-2xl font-bold">
            Room yang Saya Ikuti
          </h3>

          <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">

            @forelse ($joinedRooms as $room)
              <div class="flex flex-col justify-between overflow-hidden rounded-lg border border-gray-200 shadow-md">

                <div class="p-5">
                  <span
                    class="mb-2 inline-flex items-center rounded-full bg-indigo-100 px-3 py-0.5 text-sm font-medium text-indigo-800">
                    {{ $room->roomType->name }}
                  </span>

                  <h4 class="mb-1 text-xl font-semibold text-gray-800">
                    {{ $room->title }}
                  </h4>

                  <p class="text-sm text-gray-500">
                    oleh: {{ $room->mentor->name }}
                  </p>
                </div>

                <div class="bg-gray-50 p-4">
                  <a class="block w-full rounded-md bg-indigo-600 px-4 py-2 text-center text-sm font-semibold text-white transition duration-300 hover:bg-indigo-700"
                    href="{{ route('learner.rooms.show', $room) }}">
                    Masuk Kelas
                  </a>
                </div>
              </div>
            @empty
              <div class="py-10 text-center text-gray-500 md:col-span-2 lg:col-span-3">
                <p class="mb-4">Anda belum bergabung dengan room manapun.</p>
                <a class="rounded-lg bg-green-600 px-5 py-2 text-white transition duration-300 hover:bg-green-700"
                  href="{{ route('explore.index') }}">
                  Jelajahi Room Baru
                </a>
              </div>
            @endforelse

          </div>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
