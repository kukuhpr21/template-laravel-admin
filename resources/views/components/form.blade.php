@props(['action' => 'submit', 'width' => 'w-full'])
<form wire:submit="{{ $action }}" class="flex flex-col gap-3 py-3 px-4 bg-zinc-100 rounded-lg border-2 border-dotted border-zinc-200 hover:drop-shadow-xl {{ $width }}">
{{ $slot }}
</form>
