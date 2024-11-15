@props(['action' => 'submit', 'width' => 'w-full'])
<form wire:submit="{{ $action }}" class="flex flex-col gap-3 py-3 px-4 bg-blue-50 rounded-xl {{ $width }}">
{{ $slot }}
</form>
