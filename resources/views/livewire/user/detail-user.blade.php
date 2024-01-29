<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
        <x-input-label :value="__('First Name')" class="font-medium" />
        <span class="text-gray-800 font-medium mt-1">{{ $user->first_name }}</span>
    </div>
    <div>
        <x-input-label :value="__('Last Name')" class="font-medium" />
        <span class="text-gray-800 font-medium mt-1">{{ $user->last_name ?? '-' }}</span>
    </div>
    <div>
        <x-input-label :value="__('Email')" class="font-medium" />
        <span class="text-gray-800 font-medium mt-1">{{ $user->email }}</span>
    </div>
    @if (\App\Helpers\FeatureHelper::isEnabled(\App\Helpers\FeatureHelper::LOGIN_WITH_USERNAME))
        <div>
            <x-input-label :value="__('Username')" class="font-medium" />
            <span class="text-gray-800 font-medium mt-1">{{ $user->username ?? '-' }}</span>
        </div>
    @endif
    <div>
        <x-input-label :value="__('Mobile No')" class="font-medium" />
        <span class="text-gray-800 font-medium mt-1">{{ $user->mobile_no ?? '-' }}</span>
    </div>
    <div>
        <x-input-label :value="__('Role')" class="font-medium" />
        <span class="text-gray-800 font-medium mt-1">
            {{ ucfirst($user->roles[0]->name) }}
        </span>
    </div>
    <div>
        <x-input-label :value="__('Status')" class="font-medium" />
        <span class="text-gray-800 font-medium mt-1">
            <x-user-status-badge :status="$user->is_active" />
        </span>
    </div>
</div>
