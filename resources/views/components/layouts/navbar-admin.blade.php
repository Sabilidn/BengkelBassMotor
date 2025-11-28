@php
    $role = Auth::user()->role ?? 'customer';
@endphp

<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 shadow-sm">

    <!-- Desktop Navbar -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Left Side -->
            <div class="flex items-center">

                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                        <div class="h-10 w-10 rounded-full bg-[var(--primary)] text-white flex items-center justify-center shadow">
                            <i class="fas fa-tools"></i>
                        </div>
                        <span class="font-semibold text-lg text-[var(--primary)]">Admin Panel</span>
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">

                    <x-nav-link href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">
                        <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                    </x-nav-link>

                    <x-nav-link href="">
                        <i class="fas fa-tools mr-2"></i> Kelola Servis
                    </x-nav-link>

                    <x-nav-link href="">
                        <i class="fas fa-user-cog mr-2"></i> Kelola Mekanik
                    </x-nav-link>

                    <x-nav-link href="">
                        <i class="fas fa-users mr-2"></i> Kelola Customer
                    </x-nav-link>

                    <x-nav-link href="#">
                        <i class="fas fa-file-alt mr-2"></i> Laporan
                    </x-nav-link>
                </div>
            </div>

            <!-- Right Side -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">

                <!-- User Dropdown -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 rounded-md text-gray-700 bg-white hover:text-[var(--primary)] transition">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-[var(--primary)] text-white flex items-center justify-center">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                <span>{{ Auth::user()->name }}</span>
                            </div>
                            <svg class="ml-1 w-4 h-4" fill="currentColor">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            <i class="fas fa-user-circle w-4"></i> Profil
                        </x-dropdown-link>

                        <div class="border-t border-gray-100"></div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link href="{{ route('logout') }}"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="text-red-600">
                                <i class="fas fa-sign-out-alt w-4"></i> Log Out
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Mobile Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = !open"
                    class="p-2 rounded-md text-gray-600 hover:bg-gray-100 hover:text-[var(--primary)]">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none">
                        <path :class="{ 'hidden': open, 'block': !open }" class="block"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'block': open }" class="hidden"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden bg-white">

        <div class="pt-2 pb-3 space-y-1">

            <x-responsive-nav-link href="">
                <i class="fas fa-tachometer-alt w-4"></i> Dashboard
            </x-responsive-nav-link>

            <x-responsive-nav-link href="">
                <i class="fas fa-tools w-4"></i> Kelola Servis
            </x-responsive-nav-link>

            <x-responsive-nav-link href="">
                <i class="fas fa-user-cog w-4"></i> Kelola Mekanik
            </x-responsive-nav-link>

            <x-responsive-nav-link href="">
                <i class="fas fa-users w-4"></i> Kelola Customer
            </x-responsive-nav-link>

        </div>

        <!-- User Info -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4 flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-[var(--primary)] text-white flex items-center justify-center">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div>
                    <div class="font-medium text-base">{{ Auth::user()->name }}</div>
                    <div class="text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link href="{{ route('profile.edit') }}">
                    <i class="fas fa-user-circle w-4"></i> Profile
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link href="{{ route('logout') }}"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="text-red-600">
                        <i class="fas fa-sign-out-alt w-4"></i> Log Out
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>

    </div>

</nav>
