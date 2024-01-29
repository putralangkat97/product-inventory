@props(['disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'border-gray-300 bg-white text-gray-800 px-4 focus:border-teal-500 focus:ring-teal-500 rounded-md shadow-sm',
]) !!}>
    {{ $slot }}
</select>
