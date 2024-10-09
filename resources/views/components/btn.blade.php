@props(['type', 'text', 'bgColor' => 'blue', 'textColor' => 'white', 'full' => 'true'])
@php
    $full = $full == 'true' ? 'full' : 'fit';
    $classes = "w-$full bg-$bgColor-500 text-$textColor rounded-2xl hover:bg-$bgColor-600 hover:shadow-xl my-3 p-5";
@endphp
<button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>{{ $text }}</button>
