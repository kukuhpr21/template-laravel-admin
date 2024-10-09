@php
    $name = ucwords(config('app.name'));
    $letter = strtoupper(substr($name, 0, 1));
@endphp
<a href="{{ route('dashboard') }}" class="lg:flex items-end ms-2 md:me-24 hidden">
    <span class="font-bold text-xl text-white bg-blue-500 rounded-md px-3 py-2">{{ $letter }}</span>
    <span class="font-semibold text-xl text-gray-600 pl-2">{{ $name }}</span>
</a>
