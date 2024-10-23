@props(['type', 'placeholder' => '...', 'name'])
@php
    $lowerName = strtolower($name);
@endphp
<input type="{{ $type }}" wire:model="form.{{$lowerName}}" placeholder="{{ $placeholder }}" name="{{ $lowerName }}" id="{{ $lowerName }}"
    class="bg-slate-100 focus:bg-slate-200 py-4 px-3 my-3 rounded-2xl focus:outline-none focus:ring-0 border-0 ">
