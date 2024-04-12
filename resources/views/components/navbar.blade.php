<!-- resources/views/components/navbar.blade.php -->


<div class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-gray-800 shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <div>
                    <h1 class="text-white text-lg font-semibold">Neutron 0</h1>
                </div>
                <!-- Navigation Links -->
                <div class="hidden md:block">

                    @if(Auth::check())
                    <a href="/" class="text-gray-300 hover:text-white px-4">Panel użytkownika</a>
                    <a href="/reports" class="text-gray-300 hover:text-white px-4">Strona Główna</a>

                    @else
                    <a href="/login" class="text-gray-300 hover:text-white px-4">Zaloguj</a>
                    <a href="/register" class="text-gray-300 hover:text-white px-4">Zarejestruj</a>
                    @endif
                </div>
                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button class="text-white focus:outline-none">
                        <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

</div>