@props(['title', 'showButtonBack' => true])
<div class="flex flex-col w-full h-screen overflow-auto p-3 bg-slate-100 rounded-xl drop-shadow-md shadow-black">
    <div class="flex flex-row gap-2 items-center">
        @if ($showButtonBack)
            <a href="{{ url()->previous() }}" class="hover:bg-slate-100 hover:drop-shadow-md hover:rounded-lg p-2">
                <i class="ri-arrow-left-fill text-slate-600"></i>
            </a>
        @endif
        <span class="text-lg text-gray-500 font-semibold">{{ $title }}</span>
    </div>
    <div class="py-4">
        {{ $slot }}
    </div>
</div>
