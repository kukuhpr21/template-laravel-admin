@props(['type', 'placeholder' => '...', 'name'])
@php
    $lowerName = strtolower($name);
@endphp
<input type="{{ $type }}" wire:model="form.{{$lowerName}}" placeholder="{{ $placeholder }}" name="{{ $lowerName }}" id="{{ $lowerName }}"
    class="bg-slate-100 focus:bg-slate-200 py-4 px-3 my-3 rounded-2xl focus:outline-none focus:ring-0 border-0 ">
    <button type="button"
    @click="show = !show"
    class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
<svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12A3 3 0 118 9m0 6a9 9 0 019.25-6" />
</svg>

<svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10L21" />
</svg>
</button>
