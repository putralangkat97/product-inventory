<div>
    <form wire:submit="save">
        <x-panel>
            <div class="grid grid-cols-1 gap-4 mb-3">
                <div>
                    <x-input-label :value="__('Role')" for="name" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" wire:model="form.name" required
                        autocomplete="off" placeholder="{{ __('Role Name') }}" />
                    @error('form.name')
                        <x-input-error :messages="$message" class="mt-2" />
                    @enderror
                </div>
            </div>
            <x-input-label :value="__('Permissions')" for="permission" />
            <div class="grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-4 gap-4 mt-2 border border-gray-300 p-4 rounded-md">
                @foreach ($permissions as $perms)
                    <div wire:key="{{ $perms->id }}">
                        <x-input-label :value="$perms->name" for="{{ $perms->name }}" />
                        <x-switch-input :checked="in_array($perms->name, $permission)" id="{{ $perms->name }}"
                            wire:model="form.permission.{{ $perms->name }}" />
                    </div>
                @endforeach
            </div>
        </x-panel>
        @if (!is_null($role))
            <input type="hidden" wire:model="form.id" />
        @endif

        <div class="flex justify-start text-center">
            <x-primary-button class="mt-3">
                @if (!is_null($role))
                    {{ __('Update') }}
                @else
                    {{ __('Save') }}
                @endif
            </x-primary-button>
        </div>
    </form>
</div>
