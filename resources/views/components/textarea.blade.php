@props(['disabled' => false])

<?php
$class_name = 'px-4 border-gray-300 text-gray-800 focus:border-teal-500 focus:ring-teal-500 rounded-md shadow-sm placeholder:text-gray-300';
$class = '';
if ($disabled) {
    $class = $class_name . ' bg-gray-800/10';
} else {
    $class = $class_name . ' bg-white';
}

?>

<textarea {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge(['class' => $class]) }} rows="6" cols="10"></textarea>
