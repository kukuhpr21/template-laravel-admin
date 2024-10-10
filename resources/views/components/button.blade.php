@props(['type', 'text', 'bg' => 'blue', 'textColor' => 'white', 'full' => true])
@php
    $bgColor      = "bg-$bg-500";
    $hoverBGColor = "hover:bg-$bg-700";
    $textColor    = "text-$textColor";
    $full         = $full ? 'w-full' : 'w-fit';
@endphp
<button type="{{ $type }}" class="{{$full}} {{$bgColor}} text-lg font-medium {{$textColor}} rounded-2xl {{$hoverBGColor}} hover:shadow-xl my-3 p-5">{{ $slot }}</button>
