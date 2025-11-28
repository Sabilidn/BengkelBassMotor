<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 shadow-sm">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            {{-- Left Side --}}
            <div class="flex items-center">

                {{-- Logo --}}
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('mechanic.dashboard') }}" class="flex items-center gap-3">
                        <div class="h-10 w-10 rounded-full bg-[var(--primary)] text-white flex items-center justify-center shadow">
                            <i class="fas fa-wrench"></i>
                        </div>
                        <span class="font-semibold text-lg text-[var(--primary)]">Panel Mekanik</span>
                    </a>
                </div>

                {{-- Navigation --}}
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">

                    <x-nav-link href="{{ route('mechanic.dashboard') }}" 
                                :active="request()->routeIs('mechanic.dashboard')">
                        <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                    </x-nav-link>

                    <x-nav-link href="">
                        <i class="fas fa-tools mr-2"></i> Servis Ditugaskan
                    </x-nav-link>

                    <x-nav-link href="">
                        <i class="fas fa-history mr-2"></i> Riwayat Servis
                    </x-nav-link>
                </div>
            </div>

            {{-- Right Side --}}
            <div class="hidden sm:flex sm:items-center sm:ms-6">

                {{-- Profile Dropdown --}}
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 
                                   font-medium rounded-md text-gray-700 bg-white hover:text-[var(--primary)] 
                                   focus:outline-none transition">

                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-[var(--primary)] text-white flex items-center justify-center font-semibold">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                <span>{{ Auth::user()->name }}</span>
                            </div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">

                        <x-dropdown-link href="{{ route('profile.edit') }}" class="flex items-center gap-2">
                            <i class="fas fa-user-circle w-4 text-center"></i>
                            Profil
                        </x-dropdown-link>

                        <div class="border-t border-gray-100"></div>

                        {{-- Logout --}}
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link href="{{ route('logout') }}"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="flex items-center gap-2 text-red-600 hover:bg-red-50">
                                <i class="fas fa-sign-out-alt w-4 text-center"></i>
                                Keluar
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            {{-- Mobile Menu Button --}}
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-600 hover:text-[var(--primary)] 
                           hover:bg-gray-50 focus:outline-none transition">

                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    {{-- Mobile Menu --}}
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">

        <div class="pt-2 pb-3 space-y-1 bg-white">

            <x-responsive-nav-link href="{{ route('mechanic.dashboard') }}" 
                :active="request()->routeIs('mechanic.dashboard')">
                <i class="fas fa-tachometer-alt w-4 text-center"></i> Dashboard
            </x-responsive-nav-link>

            <x-responsive-nav-link href="">
                <i class="fas fa-tools w-4 text-center"></i> Servis Ditugaskan
            </x-responsive-nav-link>

            <x-responsive-nav-link href="">
                <i class="fas fa-history w-4 text-center"></i> Riwayat Servis
            </x-responsive-nav-link>

        </div>

        {{-- Profile & Logout --}}
        <div class="pt-4 pb-1 border-t border-gray-200 bg-white">
            <div class="px-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-[var(--primary)] text-white flex items-center justify-center font-semibold">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div>
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>
            </div>

            <div class="mt-3 space-y-1">

                <x-responsive-nav-link href="{{ route('profile.edit') }}" class="flex items-center gap-3">
                    <i class="fas fa-user-circle w-4 text-center"></i> Profil
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link href="{{ route('logout') }}"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="flex items-center gap-3 text-red-600 hover:bg-red-50">
                        <i class="fas fa-sign-out-alt w-4 text-center"></i> Keluar
                    </x-responsive-nav-link>
                </form>

            </div>
        </div>
    </div>

</nav>
