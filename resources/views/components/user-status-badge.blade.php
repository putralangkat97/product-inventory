@props(['status' => ''])

<?php
$color = '';

$color = match ($status) {
    1 => ($color = ' bg-green-100 text-green-600'),
    0 => ($color = ' bg-gray-100 text-gray-600'),
};
?>

<span
    {{ $attributes->merge(['class' => 'inline-flex items-center py-1 px-2.5 text-sm font-medium rounded-md' . $color]) }}>{{ ucfirst($status ? __('Active') : __('Inactive')) }}</span>
