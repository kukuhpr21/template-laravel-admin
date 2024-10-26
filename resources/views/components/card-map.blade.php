@props(['color' => 'bg-white', 'title' => 'Map', 'description' => 'no description'])
<div class="{{ $color }} flex flex-col py-7 px-5 gap-2 rounded-lg hover:drop-shadow-xl">
    <x-card-title>{{ $title }}</x-card-title>
    <div class="flex h-full rounded-lg" {{ $attributes }}>
        {{ $slot }}
    </div>
    <x-card-description>{{ $description }}</x-card-description>
</div>
