<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitForge | @yield('title')</title>
    @vite('resources/css/app.css')
    <script src="/js/layout.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
<nav class="bg-zinc-950 text-white" x-data="{ open: false }">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <!-- Mobile menu button -->
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <button @click="open = !open" type="button" class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                    <span class="sr-only">Open main menu</span>
                    <svg :class="{ 'hidden': open, 'block': !open }" class="block h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg :class="{ 'block': open, 'hidden': !open }" class="hidden h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Logo -->
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0 flex items-center">
                    <img class="h-14 w-auto" src="{{ asset('imgs/FitForgeLogo.png') }}" alt="FitForge">
                </div>

                <!-- Desktop menu -->
                <div class="hidden sm:ml-6 sm:flex sm:items-center">
                    <div class="flex space-x-4">
                        <a href="/home" class="px-3 py-2 text-sm font-medium text-gray-300 hover:text-red-600 transition">Home</a>
                        <a href="/about" class="px-3 py-2 text-sm font-medium text-gray-300 hover:text-red-600 transition">About Us</a>
                        <a href="#" class="px-3 py-2 text-sm font-medium text-gray-300 hover:text-red-600 transition">Programs</a>
                        <a href="/supplements" class="px-3 py-2 text-sm font-medium text-gray-300 hover:text-red-600 transition">Shop</a>
                        <a href="/contact-us" class="px-3 py-2 text-sm font-medium text-gray-300 hover:text-red-600 transition">Contact Us</a>
                        @auth
                            @if(auth()->user()->role === 'admin')
                                <a href="{{ route('admin.users.index') }}" class="px-3 py-2 text-sm font-medium text-gray-300 hover:text-red-600 transition">Dashboard</a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>

            <!-- Right section (user dropdown) -->
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <div class="relative ml-3">
                    @auth
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2 text-sm font-medium bg-zinc-900 rounded-md hover:text-red-400 focus:outline-none transition">
                                    <div>{{ Auth::user()->name }}</div>
                                    <div class="ml-1">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 
                                                  1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div class="sm:hidden" x-show="open" x-transition>
        <div class="space-y-1 px-2 pt-2 pb-3">
            <a href="/home" class="block px-3 py-2 text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700">Home</a>
            <a href="/about" class="block px-3 py-2 text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700">About Us</a>
            <a href="#" class="block px-3 py-2 text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700">Programs</a>
            <a href="/supplements" class="block px-3 py-2 text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700">Shop</a>
            <a href="/contact-us" class="block px-3 py-2 text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700">Contact Us</a>
            <a href="{{ route('programs.create') }}" class="block bg-blue-600 text-white px-3 py-2 rounded-md">Add New Program</a>
            @auth
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.users.index') }}" class="block px-3 py-2 text-base font-medium text-gray-300 hover:text-red-600">Dashboard</a>
                @endif
                <a href="{{ route('profile.edit') }}" class="block px-3 py-2 text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700">Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="w-full text-left px-3 py-2 text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                        Log Out
                    </button>
                </form>
            @endauth
        </div>
    </div>
</nav>


<div>
  @yield('content')
</div>

<footer id="footer" class="bg-zinc-950 text-white py-6 px-10">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        <div>
            <h3 class="text-xl font-bold text-red-600 mb-6">About Us</h3>
            <p class="text-gray-300 text-base leading-relaxed mb-6">
                We bring you the best in fitness supplements and programs to help you reach your health and fitness goals. Join our community today!
            </p>
            <div class="flex gap-4 mt-4">
                <a href="https://facebook.com" aria-label="Facebook" class="text-white text-2xl hover:text-red-600 transition-colors duration-300">
                    <i class="fab fa-facebook"></i>
                </a>
                <a href="https://twitter.com" aria-label="Twitter" class="text-white text-2xl hover:text-red-600 transition-colors duration-300">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://instagram.com" aria-label="Instagram" class="text-white text-2xl hover:text-red-600 transition-colors duration-300">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://linkedin.com" aria-label="LinkedIn" class="text-white text-2xl hover:text-red-600 transition-colors duration-300">
                    <i class="fab fa-linkedin"></i>
                </a>
            </div>
        </div>

        <div>
            <h3 class="text-xl font-bold text-red-600 mb-6">Quick Links</h3>
            <ul class="space-y-3">
                <li>
                    <a href="/home" class="text-gray-300 hover:text-red-600 transition-colors duration-300">
                        Home
                    </a>
                </li>
                <li>
                    <a href="/about" class="text-gray-300 hover:text-red-600 transition-colors duration-300">
                        About Us
                    </a>
                </li>
                <li>
                    <a href="#how-it-works" class="text-gray-300 hover:text-red-600 transition-colors duration-300">
                        Programs
                    </a>
                </li>
                <li>
                    <a href="/supplements" class="text-gray-300 hover:text-red-600 transition-colors duration-300">
                        Shop
                    </a>
                </li>
                <li>
                    <a href="/contact-us" class="text-gray-300 hover:text-red-600 transition-colors duration-300">
                        Contact Us
                    </a>
                </li> 
                <li>
                @auth
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.users.index') }}" class="text-gray-300 hover:text-red-600 transition-colors duration-300">
                            Dashboard
                        </a>
                    @endif
                @endauth
                </li>
            </ul>
        </div>

        <div>
            <h3 class="text-xl font-bold text-red-600 mb-6">Reach out to Us:</h3>
            <ul class="space-y-3">
                <li class="flex items-center gap-2 text-gray-300">
                    <i class="fas fa-map-marker-alt text-red-600"></i> Hamra Street, Beirut
                </li>
                <li class="flex items-center gap-2 text-gray-300">
                    <i class="fas fa-envelope text-red-600"></i> support@fitnesstracker.com
                </li>
                <li class="flex items-center gap-2 text-gray-300">
                    <i class="fas fa-phone text-red-600"></i> +961 76 863 887
                </li>
            </ul>
        </div>
        <div class="max-w-xs">
          <h3 class="text-xl font-bold text-red-600 mb-4">Check Your BMI</h3>
          <input id="weightInput" type="number" placeholder="Weight (kg)" class="w-full mb-2 px-3 py-2 rounded-md bg-zinc-900 text-white placeholder-gray-400 border border-gray-600 focus:border-red-500 focus:ring-2 focus:ring-red-500 focus:outline-none">
          <input id="heightInput" type="number" placeholder="Height (cm)" class="w-full mb-2 px-3 py-2 rounded-md bg-zinc-900 text-white placeholder-gray-400 border border-gray-600 focus:border-red-500 focus:ring-2 focus:ring-red-500 focus:outline-none">
          <button id="bmiButton" class="w-full bg-red-600 text-white py-2 rounded-md hover:bg-red-500 transition">Calculate</button>
          <p id="bmiOutput" class="text-gray-300 mt-3"></p>
        </div>
    </div>

    <div class="mt-8 pt-4 border-t border-gray-700 text-center text-gray-300">
        <p>&copy; 2025 FitForge. All rights reserved.</p>
    </div>
</footer>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</body>
</html>