@props([
    'name',
    'val_default_select' => '',
    'selected' => '',
    'items',
    'form' => false,
    'label' => true,
    'withInvalidInput' => true,
    'desc' => '',
    ])
@php
    $lowerName = strtolower($name);
    $model = $form ? 'form.'.$lowerName : $lowerName;

@endphp
<div class="flex flex-col">
    @if ($label)
        <x-label :name="$name" />
    @endif

    <select wire:model="{{$model}}" name="{{ $lowerName }}" class="py-3 px-4 pe-9 block w-full bg-slate-50 focus:bg-slate-50 border border-slate-300 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none hover:drop-shadow-xl">
        @if (!empty($val_default_select))
            <option value="" {{ empty($selected) ? 'selected' : '' }}>{{ $val_default_select }}</option>
        @endif
        @foreach ($items as $item)
            <option value="{{ $item->key }}" {{ (!empty($selected) && $selected == $item->key) ? 'selected' : ''}}>{{ $item->val }}</option>
        @endforeach
    </select>

    @if (!empty($desc))
        <x-description-input>{{ $desc }}</x-description-input>
    @endif

    @if ($withInvalidInput)
        @error($model)
            <x-invalid-input>{{$message}}</x-invalid-input>
        @enderror
    @endif
</div>
