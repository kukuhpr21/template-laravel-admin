@props(['addclass', 'title' => 'map', 'description' => 'no description'])
<div class="{{ $addclass }} py-7 px-5 rounded-lg hover:drop-shadow-xl">
    <x-card-title>{{ $title }}</x-card-title>
    <div class="flex h-full rounded-lg py-2 my-2" {{ $attributes }}>
        {{ $slot }}
    </div>
    <x-card-description>{{ $description }}</x-card-description>
</div>
