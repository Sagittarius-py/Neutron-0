<!-- resources/views/components/navbar.blade.php -->


<div class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-gray-800 shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <div class="flex" style="gap: 10px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none"
                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-activity">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="6" x2="12" y2="12"></line>
                        <line x1="12" y1="12" x2="16" y2="16"></line>
                        <line x1="12" y1="12" x2="8" y2="16"></line>
                    </svg>
                    <h1 class="text-white text-lg font-semibold">Neutron 0</h1>
                </div>
                <!-- Navigation Links -->
                <div class="hidden md:block">

                    @if (Auth::check())
                        <a href="/" class="text-gray-300 hover:text-white px-4">Panel użytkownika</a>
                        <a href="/protocols" class="text-gray-300 hover:text-white px-4">Protokoły</a>
                    @else
                        <a href="/login" class="text-gray-300 hover:text-white px-4">Zaloguj</a>
                        <a href="/register" class="text-gray-300 hover:text-white px-4">Zarejestruj</a>
                    @endif
                </div>
                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button class="text-white focus:outline-none">
                        <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

</div>
