@props([
    'width' => '3/4',
])

<div {{ $attributes->merge(['class' => 'bg-white border border-gray-300 rounded-lg p-6 w-full lg:w-' . $width]) }}>
    {{ $navigation ?? '' }}
    {{ $slot }}
</div>
