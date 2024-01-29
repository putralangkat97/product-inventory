@props([
    'leftLink' => '',
    'leftLabel' => '',
    'rightLink' => '',
    'rightLabel' => '',
])

<div {{ $attributes->merge(['class' => 'flex justify-between items-center mb-5']) }}>
    <x-secondary-link-button :href="$leftLink">{{ $leftLabel ?? __('Back') }}</x-secondary-link-button>
    <x-primary-link-button :href="$rightLink">{{ $rightLabel ?? __('Label') }}</x-primary-link-button>
</div>
