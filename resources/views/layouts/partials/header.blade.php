<div class="hidden lg:flex lg:items-center lg:ml-6">
    <x-dropdown align="right" width="48">
        <x-slot name="trigger">
            <button
                class="inline-flex items-center px-3 py-2 border border-gray-300 text-sm leading-4 font-medium text-gray-800 bg-white hover:bg-teal-800/10 hover:text-gray-900 focus:outline-none transition ease-in-out duration-200 rounded-md">
                <span class="font-medium text-gray-800">{{ Auth::user()->first_name }}</span>
                <div class="ml-1">
                    <svg class="fill-current h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
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
                <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>
        </x-slot>
    </x-dropdown>
</div>
