@props(['color'])
<div class="{{ $color }} flex flex-col gap-3 py-7 px-5 rounded-lg hover:drop-shadow-xl" {{ $attributes }}>
{{ $slot }}
</div>
