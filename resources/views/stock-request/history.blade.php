<x-app-layout>
    <x-slot name="header">
        {{ __('Stock Request') }}
    </x-slot>

    @session('success')
        <x-alert-success :message="$value" />
    @endsession

    <div class="w-full border-b border-teal-800/10">
        <nav class="flex space-x-2">
            @role('staff')
                <a href="{{ route('stock-request.index') }}"
                    class="py-4 px-2 inline-flex items-center gap-2 border-b-[3px] hover:border-teal-800/50 font-medium text-sm text-gray-800 whitespace-nowrap hover:text-teal-700 transition-all duration-200 {{ request()->routeIs('stock-request.index') ? 'border-teal-800/50 text-teal-700' : 'border-b-transparent' }}">
                    {{ __('Request List') }}
                </a>
            @endrole
            @role('user|superadmin')
                <a href="{{ route('stock.index') }}"
                    class="py-4 px-2 inline-flex items-center gap-2 border-b-[3px] hover:border-teal-800/50 font-medium text-sm text-gray-800 whitespace-nowrap hover:text-teal-700 transition-all duration-200 {{ request()->routeIs('stock-request.index') ? 'border-teal-800/50 text-teal-700' : 'border-b-transparent' }}">
                    {{ __('Stock List') }}
                </a>
            @endrole
            <a href="{{ route('stock-request.history') }}"
                class="py-4 px-2 inline-flex items-center gap-2 border-b-[3px] hover:border-teal-800/50 font-medium text-sm text-gray-800 whitespace-nowrap hover:text-teal-700 transition-all duration-200 {{ request()->routeIs('stock-request.history') ? 'border-teal-800/50 text-teal-700' : 'border-b-transparent' }}">
                {{ __('Request History') }}
            </a>
        </nav>
    </div>

    <div class="pt-4 pb-10 flex flex-col">
        <livewire:stock-request.index-stock-request :stock_requests="$stock_request_histories" :history="true" />
    </div>
</x-app-layout>
