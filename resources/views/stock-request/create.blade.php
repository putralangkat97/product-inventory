<x-app-layout>
    <x-slot name="header">
        {{ __('Create New Stock') }}
    </x-slot>

    <div>
        <div class="w-full border-b border-teal-800/10">
            <nav class="flex space-x-2">
                <button type="button"
                    class="py-4 px-2 inline-flex items-center gap-2 border-b-[3px] hover:border-teal-800/50 font-medium text-sm text-gray-800 whitespace-nowrap hover:text-teal-700 transition-all duration-200 {{ request()->routeIs('stock-request.create') ? 'border-teal-800/50 text-teal-700' : 'border-b-transparent' }}">
                    {{ __('Stock Request Form') }}
                </button>
            </nav>
        </div>

        <div class="pt-6 pb-10 flex flex-col">
            <livewire:stock-request.form-stock-request :stock="$stock" />
        </div>
    </div>
</x-app-layout>
