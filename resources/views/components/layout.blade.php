@props(['class'])
@php
    $classLayout = "$class bg-teal-50"
@endphp
<div class="{{ $classLayout }}">
    {{ $slot }}
</div>
