@props(['class'])
@php
    $classLayout = "$class bg-slate-200 scrollbar-hide"
@endphp
<div class="{{ $classLayout }}">
    {{ $slot }}
</div>
