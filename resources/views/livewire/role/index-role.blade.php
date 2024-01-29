<div class="w-full xl:w-3/4">
    <div class="flex flex-wrap justify-between items-center mb-4">
        <x-text-input class="w-full sm:w-80 mb-4 sm:mb-0 placeholder:text-gray-400" placeholder="Search here..." />
        <div class="flex space-x-3">
            @role('superadmin')
                @if (\App\Helpers\FeatureHelper::isEnabled(\App\Helpers\FeatureHelper::CUSTOM_USER_ROLE))
                    <x-primary-link-button :href="route('role.create')">
                        {{ __('Add Role') }}
                    </x-primary-link-button>
                @endif
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
                            <th scope="col" class="py-3 pl-3 pr-3 text-center text-sm font-semibold text-gray-800">
                                {{ __('Role Name') }}
                            </th>
                            <th scope="col"
                                class="py-3 pl-3 pr-3 text-left sm:text-center text-sm font-semibold text-gray-800">
                                {{ __('Action') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 bg-white">
                        @foreach ($roles as $role)
                            <tr>
                                <td class="pl-3 w-10">
                                    <x-checkbox-input />
                                </td>
                                <td class="whitespace-nowrap text-center px-3 py-4 text-sm text-gray-800">
                                    <a href="{{ route('role.show', $role) }}"
                                        class="hover:opacity-70 transition-opacity duration-200">
                                        {{ ucfirst($role->name) }}
                                    </a>
                                </td>
                                <td
                                    class="relative whitespace-nowrap py-4 pl-3 pr-4 text-left sm:text-center text-sm font-medium sm:pr-6">
                                    <a href="{{ route('role.edit', $role) }}"
                                        class="hover:underline text-teal-500 hover:text-teal-800 transition-colors duration-200">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
