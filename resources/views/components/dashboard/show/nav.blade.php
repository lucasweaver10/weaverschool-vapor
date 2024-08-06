<div>
    <nav class="bg-gray-900 text-gray-100 pt-4 pb-2 sm:pb-0 px-4 sm:px-8" x-data="{ mobileMenuOpen: false }">
        <div class="flex justify-between items-center">
            <div class="flex items-center">
                <a href="/{{ session('locale') ?? 'en' }}/dashboard" class="">
                    <img src="{{ config('app.logo_dark') }}" alt="{{ config('app.name') . ' logo'}}" class="w-32 mr-8">
                </a>
            </div>
            <!-- Hamburger Button -->
            <div class="relative text-gray-300">
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="px-2 py-1 rounded">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                </button>

                <!-- Dropdown Flyout Menu -->
                <div x-cloak x-show="mobileMenuOpen"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95"
                    class="absolute right-0 mt-2 w-48 bg-gray-700 text-gray-100 rounded-md shadow-lg z-50 overflow-hidden">
                    <div class="py-2">
                        <a href="{{ route('dashboard.index', ['locale' => session('locale', 'en')])}}" class="block px-4 py-2 hover:text-teal-300 font-bold text-sm sm:text-base">Dashboard</a>
                        <a href="/flashcards/sets" class="block px-4 py-2 hover:text-teal-300 font-bold text-sm sm:text-base">Flashcards</a>
                        <a href="{{ route('learning-paths.index', ['locale' => session('locale', 'en')])}}" class="block px-4 py-2  hover:text-teal-300 font-bold text-sm sm:text-base">Learning Paths</a>
                        <a href="/quick-notes" class="block px-4 py-2  hover:text-teal-300 font-bold text-sm sm:text-base">Quick Notes</a>                        
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>