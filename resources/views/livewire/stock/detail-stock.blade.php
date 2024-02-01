<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
        <x-input-label :value="__('Stock Code')" class="font-medium" />
        <span class="text-gray-800 font-medium mt-1">{{ $stock->stock_code }}</span>
    </div>
    <div>
        <x-input-label :value="__('Stock Name')" class="font-medium" />
        <span class="text-gray-800 font-medium mt-1">{{ $stock->stock_name ?? '-' }}</span>
    </div>
    <div>
        <x-input-label :value="__('Stock Qty')" class="font-medium" />
        <span class="text-gray-800 font-medium mt-1">{{ $stock->stock_qty }} {{ $stock->satuan->name }}</span>
    </div>
    <div>
        <x-input-label :value="__('Status')" class="font-medium" />
        <span class="{{ $stock->is_private ? 'text-gray-800' : 'text-green-600' }} font-medium mt-1">
            {{ $stock->is_private ? 'Private' : 'Public' }}
            @if ($stock->is_private)
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="inline icon icon-tabler icon-tabler-eye-off w-5 h-5 text-gray-500 ml-2" width="44"
                    height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M10.585 10.587a2 2 0 0 0 2.829 2.828" />
                    <path
                        d="M16.681 16.673a8.717 8.717 0 0 1 -4.681 1.327c-3.6 0 -6.6 -2 -9 -6c1.272 -2.12 2.712 -3.678 4.32 -4.674m2.86 -1.146a9.055 9.055 0 0 1 1.82 -.18c3.6 0 6.6 2 9 6c-.666 1.11 -1.379 2.067 -2.138 2.87" />
                    <path d="M3 3l18 18" />
                </svg>
            @endif
        </span>
    </div>
</div>
