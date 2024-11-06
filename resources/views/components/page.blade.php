@props(['title', 'back' => false, 'routeBack'])
<div class="flex flex-col w-full h-screen overflow-auto py-6 px-4 bg-slate-100 rounded-xl drop-shadow-md shadow-black">
    <div class="flex flex-row gap-2 items-center">
        @if ($back)
            <a href="{{ route($routeBack) }}" class="hover:bg-slate-200 hover:drop-shadow-sm hover:rounded-lg py-2 px-4">
                <i class="ri-arrow-left-fill text-slate-600"></i>
            </a>
        @endif
        <span class="text-lg text-gray-500 font-semibold">{{ $title }}</span>
    </div>
    <div class="py-4">
        {{ $slot }}
    </div>
</div>
