<aside class="w-64 bg-gray-800 text-white flex-shrink-0">
    <div class="p-4">
        <a href="{{ route('mentor.dashboard.index') }}" class="text-2xl font-bold text-white">
            Mentor Area
        </a>
    </div>

    <nav class="mt-6">
        <a href="{{ route('mentor.dashboard.index') }}" 
           class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white
                  {{ request()->routeIs('mentor.dashboard.index') ? 'bg-gray-900 text-white' : '' }}">
            <svg class="h-6 w-6 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6-4a1 1 0 001-1v-1a1 1 0 10-2 0v1a1 1 0 001 1z" />
            </svg>
            Dashboard
        </a>

        <a href="{{ route('mentor.profile.edit', auth()->user()) }}" 
           class="flex items-center px-4 py-3 mt-2 text-gray-300 hover:bg-gray-700 hover:text-white
                  {{ request()->routeIs('mentor.profile.edit') ? 'bg-gray-900 text-white' : '' }}">
            <svg class="h-6 w-6 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            Profil Mentor
        </a>

        <form method="POST" action="{{ route('logout') }}" class="mt-2">
            @csrf
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); this.closest('form').submit();"
               class="flex items-center w-full px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white">
                <svg class="h-6 w-6 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                Log Out
            </a>
        </form>
    </nav>
</aside>