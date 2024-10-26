@props(['addclass'])
<div class="{{ $addclass }} py-7 px-5 rounded-lg hover:drop-shadow-xl" {{ $attributes }}>
{{ $slot }}
</div>
