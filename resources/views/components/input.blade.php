@props([
    'type',
    'placeholder' => '...',
    'name',
    'color' => 'slate',
    'form' => false,
    'value' => '',
    'label' => true,
    'withInvalidInput' => true,
    'desc' => '',
    ])
@php
    $lowerName = str_replace(" ", "_", strtolower($name));
    $model = $form ? 'form.'.$lowerName : $lowerName;
    $baseColor = "bg-".$color."-50 focus:bg-".$color."-50";
    $classes = $baseColor.' py-4 px-3 my-3 rounded-2xl border border-slate-300 focus:outline-none focus:ring-0 hover:drop-shadow-xl focus:drop-shadow-xl placeholder:italic';
    $placeholder = $placeholder != '...' ? $placeholder : $name;
@endphp

<div class="flex flex-col">
    @if ($label)
        <x-label :name="$name" />
    @endif

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
        <div class="flex flex-row gap-1">
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
                }' class="border border-slate-300 bg-slate-100 hover:bg-slate-50 focus:ring-0 w-1/5 flex items-center justify-center z-20 px-3 my-3 cursor-pointer text-gray-400 rounded-2xl focus:outline-none focus:text-blue-600">
                <x-icon-toggle-password/>
            </button>
        </div>
    @endif

    @if (!empty($desc))
        <x-description-input>{{ $desc }}</x-description-input>
    @endif

    @if ($withInvalidInput)
        @error($model)
            <x-invalid-input>{{$message}}</x-invalid-input>
        @enderror
    @endif
</div>
