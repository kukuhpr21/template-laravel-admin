@props(['class'])
@php
    $classLayout = "$class bg-gradient-to-r from-gray-50 to-gray-100"
@endphp
<div class="{{ $classLayout }}">
    {{ $slot }}
</div>
