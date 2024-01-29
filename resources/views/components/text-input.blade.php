@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'px-4 border-gray-300 bg-white text-gray-800 focus:border-teal-500 focus:ring-teal-500 rounded-md shadow-sm placeholder:text-gray-300',
]) !!}>
