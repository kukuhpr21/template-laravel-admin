@props(['color', 'action'])
@php

    $baseClasses = 'inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent hover:bg-slate-200 hover:rounded-lg p-3 focus:outline-none disabled:opacity-50 disabled:pointer-events-none';

    $colorClasses = match ($color) {
        'blue'   => 'text-blue-600 hover:text-blue-800 focus:text-blue-800',
        'red'    => 'text-red-600 hover:text-red-800 focus:text-red-800',
        'green'  => 'text-green-600 hover:text-green-800 focus:text-green-800',
        'gray'   => 'text-gray-600 hover:text-gray-800 focus:text-gray-800',
        'teal'   => 'text-teal-600 hover:text-teal-800 focus:text-teal-800',
        'yellow' => 'text-yellow-600 hover:text-yellow-800 focus:text-yellow-800',
        default  => 'text-blue-600 hover:text-blue-800 focus:text-blue-800',
    };
@endphp
<button wire:click="{{ $action }}" type="button" {{ $attributes->merge(['class' => "{$baseClasses} {$colorClasses}"]) }}>
    {{ $slot }}
</button>
