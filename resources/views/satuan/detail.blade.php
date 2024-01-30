<x-app-layout>
    <x-slot name="header">
        {{ $satuan->name }}
    </x-slot>

    <div x-data="{ activeTab: 'detail' }">
        <div class="w-full border-b border-teal-800/10">
            <nav class="flex space-x-2">
                <button type="button"
                    class="py-4 px-2 inline-flex items-center gap-2 border-b-[3px] hover:border-teal-800/50 font-medium text-sm text-gray-800 whitespace-nowrap hover:text-teal-700 transition-all duration-200"
                    :class="activeTab === 'detail' ? 'border-teal-800/50 text-teal-700' : 'border-b-transparent'"
                    @click="activeTab = 'detail'">
                    {{ __('Satuan Detail') }}
                </button>
            </nav>
        </div>

        <div class="pt-6 pb-10 flex flex-col">
            {{-- detail --}}
            <div x-show="activeTab === 'detail'">
                <x-panel width="1/4">
                    <x-slot name="navigation">
                        @role('superadmin')
                            @if (\App\Helpers\FeatureHelper::isEnabled(\App\Helpers\FeatureHelper::CUSTOM_USER_ROLE))
                                <a href="{{ route('satuan.edit', $satuan) }}"
                                    class="mb-2 flex justify-end hover:underline text-teal-500 hover:text-teal-800 transition-colors duration-200">Edit</a>
                            @endif
                        @endrole
                    </x-slot>
                    <livewire:satuan.detail-satuan :satuan="$satuan" />
                </x-panel>
            </div>
        </div>
    </div>
</x-app-layout>
