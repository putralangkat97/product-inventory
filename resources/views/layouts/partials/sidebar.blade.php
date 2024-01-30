<aside
    class="lg:fixed lg:flex flex-col lg:flex-row lg:h-screen w-full lg:w-80 bg-teal-800/10 z-50 lg:z-0 lg:overflow-y-auto">
    <div @click.away="open = false" class="flex flex-col w-full text-white flex-shrink-0 border-b lg:border-0"
        x-data="{ open: false }">
        <div
            class="flex-shrink-0 px-4 lg:px-8 text-left pt-4 pb-4 lg:pt-8 lg:pb-4 flex flex-row lg:flex-col gap-4 items-start justify-between lg:mb-4">
            <a href="{{ route('dashboard') }}">
                {{-- <x-application-logo class="hidden lg:inline h-10 -mt-1 mr-3 mb-6" /> --}}
                <span
                    class="text-sm text-left lg:text-lg font-medium tracking-widest uppercase text-gray-800 focus:outline-none focus:shadow-outline lg:mt-5">
                    {{ config('app.name', 'Admin Dashboard') }}</span>
                <div class="hidden lg:flex items-center space-x-3 mt-6">
                    <div class="flex flex-col">
                        <span class="text-gray-800 font-medium text-lg">{{ Auth::user()->first_name }}</span>
                        <span class="text-gray-500 text-sm">{{ 'superadmin' }}</span>
                    </div>
                </div>
            </a>
            <button class="lg:hidden focus:outline-none focus:shadow-outline text-gray-800" @click="open = !open">
                <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                    <path x-show="!open" fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                    <path x-show="open" fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <hr class="hidden lg:block h-px bg-teal-800/10 border-0">
        <nav :class="{ 'block': open, 'hidden': !open }"
            class="flex-grow items-left lg:block px-2 lg:px-6 pb-0 lg:pb-8">
            <div class="space-y-3 mb-6 mt-2 lg:mt-6">
                <a href="{{ route('dashboard') }}"
                    class="flex flex-row items-center hover:bg-teal-800/10 hover:text-gray-800 mt-3 lg:mt-0 px-4 py-2 transition-colors duration-300 rounded-md {{ request()->routeIs('dashboard') ? 'text-gray-800 bg-teal-800/10' : 'text-gray-800' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-dashboard w-7 h-7 mr-2"
                        width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 13m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                        <path d="M13.45 11.55l2.05 -2.05" />
                        <path d="M6.4 20a9 9 0 1 1 11.2 0z" />
                    </svg>
                    <span class="font-medium">{{ __('Dashboard') }}</span>
                </a>
                @role('superadmin')
                    <a href="{{ route('user.index') }}"
                        class="flex flex-row items-center hover:bg-teal-800/10 hover:text-gray-800 mt-3 lg:mt-0 px-4 py-2 transition-colors duration-300 rounded-md {{ request()->routeIs('user.*') ? 'text-gray-800 bg-teal-800/10' : 'text-gray-800' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users w-7 h-7 mr-2"
                            width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                            <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                        </svg>
                        <span class="font-medium">{{ __('User') }}</span>
                    </a>
                    <a href="{{ route('satuan.index') }}"
                        class="flex flex-row items-center hover:bg-teal-800/10 hover:text-gray-800 mt-3 lg:mt-0 px-4 py-2 transition-colors duration-300 rounded-md {{ request()->routeIs('satuan.*') ? 'text-gray-800 bg-teal-800/10' : 'text-gray-800' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-filters w-7 h-7 mr-2"
                            width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 8m-5 0a5 5 0 1 0 10 0a5 5 0 1 0 -10 0" />
                            <path d="M8 11a5 5 0 1 0 3.998 1.997" />
                            <path d="M12.002 19.003a5 5 0 1 0 3.998 -8.003" />
                        </svg>
                        <span class="font-medium">{{ __('Unit') }}</span>
                    </a>
                @endrole
            </div>
            <div class="ml-3 text-gray-800 font-bold mt-6 mb-3">Setting</div>
            <div class="space-y-3 mb-4">
                @role('superadmin')
                    <a href="{{ route('role.index') }}"
                        class="flex flex-row items-center hover:bg-teal-800/10 hover:text-gray-800 mt-3 lg:mt-0 px-4 py-2 transition-colors duration-300 rounded-md {{ request()->routeIs('role.*') ? 'text-gray-800 bg-teal-800/10' : 'text-gray-800' }}">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-shield-lock w-7 h-7 mr-2" width="44" height="44"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 3a12 12 0 0 0 8.5 3a12 12 0 0 1 -8.5 15a12 12 0 0 1 -8.5 -15a12 12 0 0 0 8.5 -3" />
                            <path d="M12 11m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                            <path d="M12 12l0 2.5" />
                        </svg>
                        <span class="font-medium">{{ __('Role') }}</span>
                    </a>
                @endrole
                <a href="{{ route('profile.edit') }}"
                    class="flex flex-row items-center hover:bg-teal-800/10 hover:text-gray-800 mt-3 lg:mt-0 px-4 py-2 transition-colors duration-300 rounded-md {{ request()->routeIs('profile.edit') ? 'text-gray-800 bg-teal-800/10' : 'text-gray-800' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-cog w-7 h-7 mr-2"
                        width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h2.5" />
                        <path d="M19.001 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                        <path d="M19.001 15.5v1.5" />
                        <path d="M19.001 21v1.5" />
                        <path d="M22.032 17.25l-1.299 .75" />
                        <path d="M17.27 20l-1.3 .75" />
                        <path d="M15.97 17.25l1.3 .75" />
                        <path d="M20.733 20l1.3 .75" />
                    </svg>
                    <span class="font-medium">{{ __('Profile Setting') }}</span>
                </a>
            </div>
            <hr class="lg:hidden block h-px bg-teal-800/10 border-0">
            <div class="lg:hidden flex-grow lg:mt-0">
                <div class="flex flex-row items-center mb-3 text-gray-800 hover:text-gray-800">
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <a href="#"
                            class="flex flex-row items-center hover:bg-teal-800/20 hover:text-gray-800 mt-3 lg:mt-0 px-4 py-2 transition-colors duration-300 text-gray-800 font-semibold rounded-md"
                            onclick="event.preventDefault();
                                this.closest('form').submit();">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-logout w-7 h-7 mr-1.5 ml-1" width="44"
                                height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                                <path d="M9 12h12l-3 -3" />
                                <path d="M18 15l3 -3" />
                            </svg>
                            <span>{{ __('Logout') }}</span>
                        </a>
                    </form>
                </div>
                <div class="lg:hidden flex items-center space-x-3 mb-6 ml-4">
                    <div class="flex flex-col">
                        <span class="text-gray-800 font-medium text-lg">{{ Auth::user()->full_name }}</span>
                        <span class="text-gray-500 text-sm">{{ 'superadmin' }}</span>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</aside>
