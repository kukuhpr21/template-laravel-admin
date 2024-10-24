@props(['addclass'])
<div class="{{ $addclass }} bg-gray-300 shadow-white py-4 px-5 rounded-lg" {{ $attributes }}>
{{ $slot }}
</div>
