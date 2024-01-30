<div>
    <form wire:submit="save">
        <x-panel>
            <div class="grid grid-cols-1 gap-4 mb-3">
                <div>
                    <x-input-label :value="__('Unit')" for="name" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" wire:model="form.name" required
                        autocomplete="off" placeholder="{{ __('Unit Name') }}" />
                    @error('form.name')
                        <x-input-error :messages="$message" class="mt-2" />
                    @enderror
                </div>
            </div>
        </x-panel>
        @if (!is_null($satuan))
            <input type="hidden" wire:model="form.id" />
        @endif

        <div class="flex justify-start text-center">
            <x-primary-button class="mt-3">
                @if (!is_null($satuan))
                    {{ __('Update') }}
                @else
                    {{ __('Save') }}
                @endif
            </x-primary-button>
        </div>
    </form>
</div>
