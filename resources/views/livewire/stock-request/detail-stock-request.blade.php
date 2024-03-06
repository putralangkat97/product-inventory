<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
        <x-input-label :value="__('Transaction Code')" class="font-medium" />
        <span class="text-gray-800 font-medium mt-1">{{ $stock_request->transaction_code }}</span>
    </div>
    <div>
        <x-input-label :value="__('Stock Name')" class="font-medium" />
        <span class="text-gray-800 font-medium mt-1">{{ $stock->stock_name ?? '-' }}</span>
    </div>
    <div>
        <x-input-label :value="__('Stock Qty')" class="font-medium" />
        <span class="text-gray-800 font-medium mt-1">{{ $stock_request->qty }} {{ $stock_request->satuan }}</span>
    </div>
    <div>
        <x-input-label :value="__('Applicant')" class="font-medium" />
        <span class="text-gray-800 font-medium mt-1">{{ $stock_request->user->full_name }}</span>
    </div>
    <div>
        <x-input-label :value="__('Status')" class="font-medium" />
        <span class="text-gray-800 font-medium mt-1">{{ $stock_request->status }}</span>
    </div>
</div>
