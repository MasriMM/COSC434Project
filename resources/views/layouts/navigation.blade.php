<nav x-data="{ open: false }" class="bg-zinc-950 text-white">
    <div class="mx-auto max-w-full px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <img class="h-14 w-auto" src="{{ asset('imgs/FitForgeLogo.png') }}" alt="FitForge">
            </div>

            <!-- Desktop Menu -->
            <div class="hidden sm:flex flex-wrap items-center space-x-4 overflow-x-auto">
                @foreach ([
                    ['route' => 'admin.users.index', 'label' => 'Users'],
                    ['route' => 'admin.orders.index', 'label' => 'Orders'],
                    ['route' => 'admin.supplements.index', 'label' => 'Supplements'],
                    ['route' => 'admin.messages.index', 'label' => 'Messages'],
                    ['route' => 'admin.statistics.index', 'label' => 'Statistics'],
                    ['route' => 'admin.programs.index', 'label' => 'Programs'],
                    ['route' => 'admin.exercises.index', 'label' => 'Exercises'],
                    ['route' => 'home', 'label' => 'Home']
                ] as $nav)
                    <x-nav-link :href="route($nav['route'])" :active="request()->routeIs(str_replace('.index', '.*', $nav['route']))">
                        {{ __($nav['label']) }}
                    </x-nav-link>
                @endforeach
            </div>

            <!-- User Dropdown (Desktop) -->
            <div class="hidden sm:flex sm:items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 text-sm font-medium bg-zinc-900 rounded-md hover:text-red-400 focus:outline-none transition">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ml-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">{{ __('Profile') }}</x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger Button -->
            <div class="flex sm:hidden">
                <button @click="open = ! open" class="text-gray-400 hover:text-white focus:outline-none focus:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Dropdown -->
    <div :class="{ 'block': open, 'hidden': !open }" class="sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @foreach ([
                ['route' => 'admin.users.index', 'label' => 'Users'],
                ['route' => 'admin.orders.index', 'label' => 'Orders'],
                ['route' => 'admin.supplements.index', 'label' => 'Supplements'],
                ['route' => 'admin.messages.index', 'label' => 'Messages'],
                ['route' => 'admin.statistics.index', 'label' => 'Statistics'],
                ['route' => 'admin.programs.index', 'label' => 'Programs'],
                ['route' => 'admin.exercises.index', 'label' => 'Exercises'],
                ['route' => 'home', 'label' => 'Home']
            ] as $nav)
                <x-responsive-nav-link :href="route($nav['route'])" :active="request()->routeIs(str_replace('.index', '.*', $nav['route']))">
                    {{ __($nav['label']) }}
                </x-responsive-nav-link>
            @endforeach
        </div>
        <div class="pt-4 pb-1 border-t border-gray-700">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-400">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">{{ __('Profile') }}</x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>