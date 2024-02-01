<div>
    <form wire:submit="save">
        <x-panel width="1/2">
            <div class="grid grid-cols-1 gap-4 mb-3">
                <div>
                    <x-input-label :value="__('Stock Name')" for="stock_name" />
                    <x-text-input id="stock_name" class="block mt-1 w-full" type="text" wire:model="form.stock_name" required
                        autocomplete="off" placeholder="{{ __('Stock Name') }}" />
                    @error('form.stock_name')
                        <x-input-error :messages="$message" class="mt-2" />
                    @enderror
                </div>
                <div>
                    <x-input-label :value="__('Stock Qty')" for="stock_qty" />
                    <x-text-input id="stock_qty" class="block mt-1 w-full" type="number" wire:model="form.stock_qty" required
                        autocomplete="off" placeholder="{{ __('0') }}" />
                    @error('form.stock_qty')
                        <x-input-error :messages="$message" class="mt-2" />
                    @enderror
                </div>
                <div>
                    <x-input-label :value="__('Unit')" for="satuan_id" />
                    <x-select-input id="satuan_id" class="block mt-1 w-full" wire:model="form.satuan_id" required>
                        <option value="" selected>{{ __('Select Unit') }}</option>
                        @foreach ($satuans as $satuan)
                            <option value="{{ $satuan->id }}">{{ $satuan->name }}</option>
                        @endforeach
                    </x-select-input>
                    @error('form.satuan_id')
                        <x-input-error :messages="$message" class="mt-2" />
                    @enderror
                </div>
                <div>
                    <x-input-label :value="__('Make Private')" for="is_private" />
                    <x-switch-input id="is_private" :checked="!is_null($stock) ? $stock->is_private : false"
                        wire:model="form.is_private" />
                </div>
            </div>
        </x-panel>
        @if (!is_null($stock))
            <input type="hidden" wire:model="form.id" />
        @endif

        <div class="flex justify-start text-center">
            <x-primary-button class="mt-3">
                @if (!is_null($stock))
                    {{ __('Update') }}
                @else
                    {{ __('Save') }}
                @endif
            </x-primary-button>
        </div>
    </form>
</div>
