@props(['addclass'])
<div class="{{ $addclass }} bg-white shadow-white drop-shadow-lg py-4 px-5 rounded-lg" {{ $attributes }}>
{{ $slot }}
</div>
