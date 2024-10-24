@props(['addclass'])
<div class="{{ $addclass }} drop-shadow-md shadow-gray-50 py-7 px-5 rounded-lg" {{ $attributes }}>
{{ $slot }}
</div>
