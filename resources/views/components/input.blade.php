@props(['type', 'placeholder' => '...', 'name', 'class' => 'slate', 'form' => false, 'value' => ''])
@php
    $lowerName = str_replace(" ", "_", strtolower($name));
    $model = $form ? 'form.'.$lowerName : $lowerName;
    $color = "bg-".$class."-50 focus:bg-".$class."-50";
    $classes = $color.' py-4 px-3 my-3 rounded-2xl border border-slate-300 focus:outline-none focus:ring-0 hover:drop-shadow-xl focus:drop-shadow-xl';
@endphp

@if ($type != 'password')
    <input
        type="{{ $type }}"
        wire:model="{{$model}}"
        placeholder="{{ $placeholder }}"
        name="{{ $lowerName }}"
        id="{{ $lowerName }}"
        class="{{ $classes }}"
        value="{{ $value }}">
@else
    <div class="flex flex-row">
        <input
            id="hs-toggle-password"
            type="{{ $type }}"
            wire:model="{{$model}}"
            placeholder="{{ $placeholder }}"
            name="{{ $lowerName }}"
            id="{{ $lowerName }}"
            class="{{ $classes }} w-4/5"
            value="{{ $value }}">

        <button type="button" data-hs-toggle-password='{
            "target": "#hs-toggle-password"
            }' class="w-1/5 flex items-center justify-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-none focus:text-blue-600">
            <x-icon-toggle-password/>
        </button>
    </div>
@endif
