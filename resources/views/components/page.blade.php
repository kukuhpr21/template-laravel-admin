@props(['title', 'back' => false, 'routeBack'])
<div class="flex flex-col w-full h-screen overflow-auto py-6 px-4 bg-slate-100 rounded-xl drop-shadow-md shadow-black">
    <div class="flex flex-row gap-2 items-center">
        @if ($back)
            <a href="{{ route($routeBack) }}" class="hover:bg-slate-200 hover:drop-shadow-sm hover:rounded-lg my-2 py-1 px-2">
                <i class="ri-arrow-left-s-line ri-2x text-slate-600"></i>
            </a>
        @endif
        <span class="text-lg text-gray-500 font-semibold">{{ $title }}</span>
    </div>
    <div @class(['pl-12' => $back, 'py-4'])>
        {{ $slot }}
    </div>
</div>
