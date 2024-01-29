<div class="grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-4 gap-4 opacity-60">
    @foreach ($permissions as $perms)
        <div wire:key="{{ $perms->id }}">
            <x-input-label :value="$perms->name" for="{{ $perms->name }}" />
            <x-switch-input :checked="in_array($perms->name, $permission)" id="{{ $perms->name }}" wire:model="permission.{{ $perms->name }}" :disabled="$disabled" />
        </div>
    @endforeach
</div>
