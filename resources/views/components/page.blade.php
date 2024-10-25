@props(['title'])
<div class="flex flex-col w-full h-screen overflow-auto p-3 bg-white rounded-xl drop-shadow-md shadow-black">
    <span class="text-lg text-gray-500 font-semibold">{{ $title }}</span>
    <div class="py-4">
        {{ $slot }}
    </div>
</div>
