<aside class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-lg transform transition-transform duration-300 ease-in-out" :class="open ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'">
    <!-- Sidebar Header -->
    <div class="flex items-center justify-between h-16 px-6 border-b border-blue-100">
        <div class="flex justify-center items-center">
            <img src="{{ asset('images/jpeg/sic_logo.jpg') }}" class="w-8 h-8" alt="Logo" />
            <span class="ml-2 text-lg font-semibold text-blue-900">San Isidro</span>
        </div>
        <button @click="open = false" class="lg:hidden p-2 text-blue-900 hover:text-blue-700 rounded-md hover:bg-blue-50 transition-colors duration-200">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>

    <!-- Navigation Menu -->
    <nav class="mt-6 px-3 flex-1 overflow-y-auto">
        <div class="space-y-1">
            <!-- Dashboard -->
            <a href="{{ route('dashboard') }}" @click="open = false" class="group flex items-center px-3 py-3 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-700 shadow-sm' : 'text-blue-900 hover:bg-blue-50 hover:text-blue-900' }}">
                <svg class="mr-3 h-5 w-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z"></path>
                </svg>
                <span class="truncate">Dashboard</span>
            </a>

          

            <!-- Content Management -->
            <a href="{{ route('content-management.index') }}" @click="open = false" class="group flex items-center px-3 py-3 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs('content-management.*') ? 'bg-blue-50 text-blue-700 shadow-sm' : 'text-blue-900 hover:bg-blue-50 hover:text-blue-900' }}">
                <svg class="mr-3 h-5 w-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                </svg>
                <span class="truncate">Content Management</span>
            </a>

            <!-- Events -->
            <a href="{{ route('admin.events.index') }}" @click="open = false" class="group flex items-center px-3 py-3 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs('admin.events.*') ? 'bg-blue-50 text-blue-700 shadow-sm' : 'text-blue-900 hover:bg-blue-50 hover:text-blue-900' }}">
                <svg class="mr-3 h-5 w-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span class="truncate">Events</span>
            </a>

            <!-- Announcements -->
            <a href="{{ route('admin.announcements.index') }}" @click="open = false" class="group flex items-center px-3 py-3 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs('admin.announcements.*') ? 'bg-blue-50 text-blue-700 shadow-sm' : 'text-blue-900 hover:bg-blue-50 hover:text-blue-900' }}">
                <svg class="mr-3 h-5 w-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                </svg>
                <span class="truncate">Announcements</span>
            </a>

            <!-- File Management -->
            <a href="{{ route('admin.files.index') }}" @click="open = false" class="group flex items-center px-3 py-3 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs('admin.files.*') ? 'bg-blue-50 text-blue-700 shadow-sm' : 'text-blue-900 hover:bg-blue-50 hover:text-blue-900' }}">
                <svg class="mr-3 h-5 w-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-4l-2-2H5a2 2 0 00-2 2z"></path>
                </svg>
                <span class="truncate">File Management</span>
            </a>

              <!-- Profile -->
              <a href="{{ route('profile.edit') }}" @click="open = false" class="group flex items-center px-3 py-3 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs('profile.*') ? 'bg-blue-50 text-blue-700 shadow-sm' : 'text-blue-900 hover:bg-blue-50 hover:text-blue-900' }}">
                <svg class="mr-3 h-5 w-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <span class="truncate">Profile</span>
            </a>
        </div>
    </nav>

    <!-- User Section -->
    <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-blue-100">
        @auth
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                    <span class="text-sm font-medium text-white">{{ substr(Auth::user()->name, 0, 1) }}</span>
                </div>
            </div>
            <div class="ml-3 flex-1 min-w-0">
                <p class="text-sm font-medium text-blue-900 truncate">{{ Auth::user()->name }}</p>
                <p class="text-xs text-blue-700 truncate">{{ Auth::user()->email }}</p>
            </div>
        </div>

        <!-- Logout Button -->
        <form method="POST" action="{{ route('logout') }}" class="mt-3">
            @csrf
            <button type="submit" @click="open = false" class="w-full flex items-center px-3 py-3 text-sm font-medium text-blue-900 hover:bg-blue-50 hover:text-blue-900 rounded-lg transition-all duration-200 active:scale-95">
                <svg class="mr-3 h-5 w-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                <span class="truncate">Log Out</span>
            </button>
        </form>
        @endauth

        @guest
        <div class="flex items-center justify-between">
            <a href="{{ route('login') }}" class="text-sm text-blue-700 hover:underline" @click="open = false">Log in</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="text-sm text-blue-700 hover:underline" @click="open = false">Register</a>
            @endif
        </div>
        @endguest
    </div>
</aside>

<!-- Mobile Overlay -->
<div x-show="open" x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-40 bg-blue-900 bg-opacity-40 lg:hidden" @click="open = false" style="display: none;"></div>
