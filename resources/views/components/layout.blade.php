@props(['class'])
@php
    $classLayout = "$class bg-gradient-to-r from-teal-50 to-teal-100"
@endphp
<div class="{{ $classLayout }}">
    {{ $slot }}
</div>
