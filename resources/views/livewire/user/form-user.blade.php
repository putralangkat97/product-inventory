<div>
    <form wire:submit="save">
        <x-panel>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <x-input-label :value="__('First Name')" for="first_name" />
                    <x-text-input id="first_name" class="block mt-1 w-full" type="text" wire:model="form.first_name"
                        required autocomplete="off" placeholder="{{ __('First Name') }}" />
                    @error('form.first_name')
                        <x-input-error :messages="$message" class="mt-2" />
                    @enderror
                </div>
                <div>
                    <x-input-label :value="__('Last Name')" for="last_name" />
                    <x-text-input id="last_name" class="block mt-1 w-full" type="text" wire:model="form.last_name"
                        autocomplete="off" placeholder="{{ __('Last Name') }}" />
                </div>
                <div class="col-span-2">
                    <x-input-label :value="__('Email Address')" for="email" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" wire:model="form.email"
                        required autocomplete="off" placeholder="{{ __('Email Address') }}" />
                    @error('form.email')
                        <x-input-error :messages="$message" class="mt-2" />
                    @enderror
                </div>
                @if (\App\Helpers\FeatureHelper::isEnabled(\App\Helpers\FeatureHelper::LOGIN_WITH_USERNAME))
                    <div class="col-span-2">
                        <x-input-label :value="__('Username')" for="username" />
                        <x-text-input id="username" class="block mt-1 w-full" type="text" wire:model="form.username"
                            autocomplete="off" placeholder="{{ __('Username') }}" required />
                        @error('form.username')
                            <x-input-error :messages="$message" class="mt-2" />
                        @enderror
                    </div>
                @endif
                @if (is_null($user))
                    <div class="col-span-2">
                        <x-input-label :value="__('Password')" for="password" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password"
                            wire:model="form.password" required autocomplete="off" placeholder="{{ __('Password') }}" />
                        @error('form.password')
                            <x-input-error :messages="$message" class="mt-2" />
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <x-input-label :value="__('Confirm Password')" for="password_confirmation" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            wire:model="form.password_confirmation" required autocomplete="off"
                            placeholder="{{ __('Confirm Password') }}" />
                        @error('form.password_confirmation')
                            <x-input-error :messages="$message" class="mt-2" />
                        @enderror
                    </div>
                @endif
                <div>
                    <x-input-label :value="__('Mobile No')" for="mobile_no" />
                    <x-text-input id="mobile_no" class="block mt-1 w-full" type="text" wire:model="form.mobile_no"
                        autocomplete="off" placeholder="{{ __('Mobile No') }}" />
                </div>
                <div>
                    <x-input-label :value="__('Division')" for="division_id" />
                    <x-select-input id="division_id" class="block mt-1 w-full" wire:model="form.division_id" required>
                        <option value="" selected>{{ __('Select Division') }}</option>
                        @foreach ($divisions as $division)
                            <option value="{{ $division->id }}">{{ $division->name }}</option>
                        @endforeach
                    </x-select-input>
                    @error('form.division_id')
                        <x-input-error :messages="$message" class="mt-2" />
                    @enderror
                </div>
                <div>
                    <x-input-label :value="__('Role')" for="role_name" />
                    <x-select-input id="role_name" class="block mt-1 w-full" wire:model="form.role_name" required>
                        <option value="" selected>{{ __('Select Role') }}</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                        @endforeach
                    </x-select-input>
                    @error('form.role_name')
                        <x-input-error :messages="$message" class="mt-2" />
                    @enderror
                </div>

                @if (!is_null($user))
                    <div>
                        <x-input-label :value="__('Status')" for="is_active" />
                        <x-select-input id="is_active" class="block mt-1 w-full" wire:model="form.is_active" required>
                            <option value="1">{{ ucfirst(__('Active')) }}</option>
                            <option value="0">{{ ucfirst(__('Inactive')) }}</option>
                        </x-select-input>
                        @error('form.is_active')
                            <x-input-error :messages="$message" class="mt-2" />
                        @enderror
                    </div>
                    <input type="hidden" wire:model="form.id" />
                @endif
            </div>
        </x-panel>

        <div class="flex justify-start text-center">
            <x-primary-button class="mt-3">
                @if (!is_null($user))
                    {{ __('Update') }}
                @else
                    {{ __('Save') }}
                @endif
            </x-primary-button>
        </div>
    </form>
</div>
