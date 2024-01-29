<div>
    <form wire:submit="save">
        <x-panel>
            <div class="grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-4 gap-4">
                @foreach ($permissions as $perms)
                    <div wire:key="{{ $perms->id }}">
                        <x-input-label :value="$perms->name" for="{{ $perms->name }}" />
                        <x-switch-input :checked="in_array($perms->name, $permission)" id="{{ $perms->name }}"
                            wire:model="permission.{{ $perms->name }}" />
                    </div>
                @endforeach
            </div>
        </x-panel>

        <div class="flex justify-start text-center">
            <x-primary-button class="mt-3">
                {{ __('Save') }}
            </x-primary-button>
        </div>
    </form>
</div>
