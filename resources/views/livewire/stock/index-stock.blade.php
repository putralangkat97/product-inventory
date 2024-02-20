<div>
    <div class="flex flex-wrap justify-between items-center mb-4">
        <x-text-input class="w-full sm:w-80 mb-4 sm:mb-0 placeholder:text-gray-400" placeholder="Search here..." />
        <div class="flex space-x-3">
            <x-secondary-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button
                        class="inline-flex items-center px-3 py-2 border border-gray-300 text-sm leading-4 font-medium text-gray-800 bg-white hover:bg-teal-800/10 hover:text-gray-900 focus:outline-none transition ease-in-out duration-200 rounded-md">
                        <span class="font-medium text-gray-600">Sort By</span>
                        <div class="ml-1 text-gray-600">
                            <svg class="h-6 w-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <div class="p-2 space-y-2">
                        <label for="name" class="flex items-center">
                            <x-checkbox-input id="name" name="name" />
                            <span class="ms-2 text-sm text-gray-600">{{ __('Name') }}</span>
                        </label>
                        <label for="email" class="flex items-center">
                            <x-checkbox-input id="email" name="email" />
                            <span class="ms-2 text-sm text-gray-600">{{ __('Email') }}</span>
                        </label>
                        <label for="point" class="flex items-center">
                            <x-checkbox-input id="point" name="point" />
                            <span class="ms-2 text-sm text-gray-600">{{ __('Point') }}</span>
                        </label>
                        <label for="level" class="flex items-center">
                            <x-checkbox-input id="level" name="level" />
                            <span class="ms-2 text-sm text-gray-600">{{ __('Level') }}</span>
                        </label>
                    </div>
                </x-slot>
            </x-secondary-dropdown>
            <x-secondary-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button
                        class="inline-flex items-center px-3 py-2 border border-gray-300 text-sm leading-4 font-medium text-gray-800 bg-white hover:bg-teal-800/10 hover:text-gray-900 focus:outline-none transition ease-in-out duration-200 rounded-md">
                        <span class="font-medium text-gray-600">Level</span>
                        <div class="ml-1 text-gray-600">
                            <svg class="h-6 w-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <div class="p-4 space-y-2">
                        <label for="silver" class="flex items-center">
                            <x-checkbox-input id="silver" name="silver" />
                            <span class="ms-2 text-sm text-gray-600">{{ __('Silver') }}</span>
                        </label>
                        <label for="gold" class="flex items-center">
                            <x-checkbox-input id="gold" name="gold" />
                            <span class="ms-2 text-sm text-gray-600">{{ __('Gold') }}</span>
                        </label>
                        <label for="platinum" class="flex items-center">
                            <x-checkbox-input id="platinum" name="platinum" />
                            <span class="ms-2 text-sm text-gray-600">{{ __('Platinum') }}</span>
                        </label>
                        <label for="diamond" class="flex items-center">
                            <x-checkbox-input id="diamond" name="diamond" />
                            <span class="ms-2 text-sm text-gray-600">{{ __('Diamond') }}</span>
                        </label>
                    </div>
                </x-slot>
            </x-secondary-dropdown>
            @role('superadmin')
                <x-primary-link-button :href="route('stock.create')">
                    {{ __('Add Stock') }}
                </x-primary-link-button>
            @endrole
        </div>
    </div>

    <div class="-my-2 -mx-4 sm:-mx-6 lg:-mx-8 overflow-x-auto">
        <div class="inline-block min-w-full py-2 aling-middle md:px-6 lg:px-8">
            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                <table class="min-w-full divide-y divide-teal-800/10">
                    <thead class="bg-teal-800/10">
                        <tr>
                            <th scope="col" class="pl-3 lg:pl-0 w-10">
                                <x-checkbox-input />
                            </th>
                            <th scope="col"
                                class="py-3 pl-4 sm:pl-6 pr-3 text-left text-sm font-semibold text-gray-800">
                                {{ __('Stock Code') }}
                            </th>
                            <th scope="col"
                                class="hidden lg:table-cell py-3 pl-3 pr-3 text-left text-sm font-semibold text-gray-800">
                                {{ __('Stock Name') }}
                            </th>
                            <th scope="col"
                                class="hidden sm:table-cell py-3 pl-3 pr-3 text-left text-sm font-semibold text-gray-800">
                                {{ __('Stock Qty') }}
                            </th>
                            <th scope="col" class="py-3 pl-3 pr-3 text-center text-sm font-semibold text-gray-800">
                                {{ __('Satuan') }}
                            </th>
                            <th scope="col"
                                class="py-3 pl-3 pr-3 text-left sm:text-center text-sm font-semibold text-gray-800">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 bg-white">
                        @foreach ($stocks as $stock)
                            <tr>
                                <td class="pl-3 w-10">
                                    <x-checkbox-input />
                                </td>
                                <td
                                    class="whitespace-nowrap w-full max-w-0 sm:w-auto truncate py-4 pl-4 pr-3 text-sm font-medium text-gray-800 sm:pl-6 sm:max-w-0">
                                    <a href="{{ route('stock.show', $stock) }}"
                                        class="hover:underline text-gray-800 hover:text-teal-800 transition-colors duration-200">
                                        <div class="flex items-center">
                                            {{ $stock->stock_code }}
                                            @if ($stock->is_private)
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="inline icon icon-tabler icon-tabler-eye-off w-5 h-5 text-gray-500 ml-2"
                                                    width="44" height="44" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M10.585 10.587a2 2 0 0 0 2.829 2.828" />
                                                    <path
                                                        d="M16.681 16.673a8.717 8.717 0 0 1 -4.681 1.327c-3.6 0 -6.6 -2 -9 -6c1.272 -2.12 2.712 -3.678 4.32 -4.674m2.86 -1.146a9.055 9.055 0 0 1 1.82 -.18c3.6 0 6.6 2 9 6c-.666 1.11 -1.379 2.067 -2.138 2.87" />
                                                    <path d="M3 3l18 18" />
                                                </svg>
                                            @endif
                                        </div>
                                    </a>
                                    <dl class="lg:hidden font-normal">
                                        <dt class="sr-only lg:hidden">{{ __('Stock Name') }}</dt>
                                        <dd class="lg:hidden text-gray-600">{{ $stock->stock_name }}</dd>
                                        <dt class="sr-only sm:hidden">{{ __('Stock Qty') }}</dt>
                                        <dd class="text-gray-400 sm:text-gray-600 sm:hidden">
                                            {{ $stock->stock_qty }}
                                        </dd>
                                    </dl>
                                </td>
                                <td class="hidden lg:table-cell whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{ $stock->stock_name }}
                                </td>
                                <td class="hidden sm:table-cell whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{ $stock->stock_qty }}
                                </td>
                                <td class="whitespace-nowrap text-center px-3 py-4 text-sm text-gray-500">
                                    {{ $stock->satuan->name }}
                                </td>
                                <td
                                    class="relative whitespace-nowrap py-4 pl-3 pr-4 text-left sm:text-center text-sm font-medium sm:pr-6">
                                    @role('superadmin')
                                        <a href="{{ route('stock.edit', $stock) }}"
                                            class="hover:underline text-teal-500 hover:text-teal-800 transition-colors duration-200">Edit</a>
                                    @endrole
                                    @role('user')
                                        <a href="{{ route('stock-request.create', $stock) }}"
                                            class="hover:underline text-teal-500 hover:text-teal-800 transition-colors duration-200">Request</a>
                                    @endrole
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
