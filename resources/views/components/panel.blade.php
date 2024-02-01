@props([
    'width' => '3/4',
])

<?php
$lebar = '';
if ($width == '1/4') {
    $lebar = ' lg:w-1/4';
} elseif ($width == '1/2') {
    $lebar = ' lg:w-2/4';
} elseif ($width == '3/4') {
    $lebar = ' lg:w-3/4';
} else {
    $lebar = ' lg:w-full';
}
?>

<div {{ $attributes->merge(['class' => 'bg-white border border-gray-300 rounded-lg p-6 w-full' . $lebar]) }}>
    {{ $navigation ?? '' }}
    {{ $slot }}
</div>
