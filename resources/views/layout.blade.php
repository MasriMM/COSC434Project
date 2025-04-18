<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitForge | @yield('title')</title>
    @vite('resources/css/app.css')
    <script src="/js/layout.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
<nav class="bg-zinc-950">
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:outline-hidden focus:ring-inset" aria-controls="mobile-menu" aria-expanded="false">
          <span class="absolute -inset-0.5"></span>
          <span class="sr-only">Open main menu</span>
          <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex shrink-0 items-center">
          <img class="h-14 w-auto" src="{{ asset('imgs/FitForgeLogo.png') }}" alt="FitForge">
        </div>
        <div class="hidden sm:ml-6 sm:flex items-center">
          <div class="flex space-x-4">
            <a href="/home" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:text-red-600 transition-colors duration-300">Home</a>
            <a href="/about" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:text-red-600 transition-colors duration-300">About Us</a>
            <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:text-red-600 transition-colors duration-300">Programs</a>
            <a href="/supplements" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:text-red-600 transition-colors duration-300">Shop</a>
            <a href="/contact-us" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:text-red-600 transition-colors duration-300">Contact Us</a>
            @auth
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.users.index') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:text-red-600 transition-colors duration-300">
                        Dashboard
                    </a>
                @endif
            @endauth
          </div>
        </div>
      </div>
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
        <div class="relative ml-3">
          <div>
            <button type="button" class="relative flex rounded-full bg-gray-800 text-sm focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
              <span class="absolute -inset-1.5"></span>
              <span class="sr-only">Open user menu</span>
              <img class="size-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
            </button>
          </div>
          <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 ring-1 shadow-lg ring-black/5 focus:outline-hidden hidden" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="sm:hidden hidden" id="mobile-menu">
    <div class="space-y-1 px-2 pt-2 pb-3">
      <a href="/home" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Home</a>
      <a href="/about" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">About Us</a>
      <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Programs</a>
      <a href="/supplements" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Shop</a>
      <a href="/contact-us" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Contact Us</a>
      @auth
          @if(auth()->user()->role === 'admin')
              <a href="{{ route('admin.users.index') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:text-red-600 transition-colors duration-300">
                  Dashboard
              </a>
          @endif
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
                        <a href="{{ route('admin.users.index') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:text-red-600 transition-colors duration-300">
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

</body>
</html>