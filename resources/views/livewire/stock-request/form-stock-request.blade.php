<div>
    <form wire:submit="save">
        <x-panel width="1/2">
            <div class="grid grid-cols-1 gap-4 mb-3">
                <div>
                    <input type="hidden" wire:model="form.stock_id" />
                    <x-input-label :value="__('Stock Name')" for="stock_name" />
                    <x-text-input :disabled="true" id="stock_name" class="block mt-1 w-full" type="text"
                        wire:model="form.stock_name" required autocomplete="off" placeholder="{{ __('Stock Name') }}" />
                    @error('form.stock_name')
                        <x-input-error :messages="$message" class="mt-2" />
                    @enderror
                </div>
                <div>
                    <div class="flex justify-between">
                        <x-input-label :value="__('Qty')" for="qty" />
                        <small class="{{ $stock_left == 0 ? 'text-red-500' : 'text-gray-800' }}">Stock left:
                            {{ $stock_left }}</small>
                    </div>
                    <div class="flex mt-1">
                        <div class="flex w-5/6 mr-2">
                            <x-text-input id="qty" class="w-full" type="number" wire:model="form.qty" required
                                autocomplete="off" placeholder="{{ __('0') }}" />
                            <button type="button" wire:click="dec" @disabled($form->qty < 1)
                                class="text-white rounded-md ml-2 px-4 {{ $form->qty < 1 ? 'bg-red-500/50 cursor-not-allowed' : 'bg-red-500' }}">-</button>
                            <button type="button" wire:click="inc" @disabled($form->qty == $stock->stock_qty)
                                class="text-white rounded-md ml-2 px-4 {{ $form->qty == $stock->stock_qty ? 'bg-green-500/50 cursor-not-allowed' : 'bg-green-500' }}">+</button>
                        </div>
                        <x-text-input :disabled="true" class="block w-1/6 text-center" wire:model="form.satuan" />
                    </div>
                    @error('form.qty')
                        <x-input-error :messages="$message" class="mt-2" />
                    @enderror
                </div>
                <div>
                    <x-input-label :value="__('Request Date')" for="request_date" />
                    <x-text-input id="request_date" class="block mt-1 w-full" type="date"
                        wire:model="form.request_date" required autocomplete="off" />
                    @error('form.request_date')
                        <x-input-error :messages="$message" class="mt-2" />
                    @enderror
                </div>
                <div>
                    <x-input-label :value="__('Remarks')" for="remarks" />
                    <x-textarea id="remarks" class="block mt-1 w-full" type="date" wire:model="form.remarks"
                        required autocomplete="off" placeholder="{{ __('Remarks') }}"></x-textarea>
                    @error('form.remarks')
                        <x-input-error :messages="$message" class="mt-2" />
                    @enderror
                </div>
            </div>
        </x-panel>
        @if (!is_null($stock_request))
            <input type="hidden" wire:model="form.id" />
        @endif

        <div class="flex justify-start text-center">
            <x-primary-button class="mt-3">
                @if (!is_null($stock_request))
                    {{ __('Update') }}
                @else
                    {{ __('Save') }}
                @endif
            </x-primary-button>
        </div>
    </form>
</div>
