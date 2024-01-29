@props([
    'checked' => false,
    'disabled' => false,
])

<?php
    $cursor = '';
    if ($disabled) {
        $cursor = ' cursor-not-allowed';
    } else {
        $cursor = ' cursor-pointer';
    }
?>

<input @if ($checked) checked @endif @if ($disabled) disabled @endif type="checkbox"
    {!! $attributes->merge([
        'class' =>
            'relative w-[2.75rem] h-6 bg-gray-100 checked:bg-none checked:bg-teal-600 border-2 border-gray-300 rounded-full transition-colors ease-in-out duration-300 ring-1 ring-transparent focus:border-teal-600 focus:ring-teal-600 ring-offset-white focus:outline-none appearance-none before:inline-block before:w-5 before:h-5 before:bg-white checked:before:bg-teal-200 before:translate-x-0 checked:before:translate-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-300 ' . $cursor,
    ]) !!} />
