@props(['class'])
@php
    $classLayout = "$class bg-slate-200"
@endphp
<div class="{{ $classLayout }}">
    {{ $slot }}
</div>
