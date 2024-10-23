@props(['class'])
@php
    $classLayout = "$class bg-green-50"
@endphp
<div class="{{ $classLayout }}">
    {{ $slot }}
</div>
