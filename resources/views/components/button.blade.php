@props(['type', 'bg' => 'yellow', 'textColor' => 'white', 'full' => true])
@php
    $bgColor       = "bg-$bg-500 hover:bg-$bg-700";
    $textColor     = "text-$textColor";
    $full          = $full ? 'w-full' : 'w-fit';
    $generateClass = "$bgColor $textColor $full text-lg font-medium rounded-2xl hover:shadow-xl my-3 p-5"
@endphp
<button type="{{ $type }}" class="{{ $generateClass }}" {{ $attributes }}>{{ $slot }}</button>
