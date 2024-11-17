@props(['name', 'val_default_select' => '', 'selected' => '', 'items', 'form' => false])
@php
    $lowerName = strtolower($name);
    $valDefaultSelect = empty($val_default_select) ? 'Choose '.$name : $val_default_select;
    $model = $form ? 'form.'.$lowerName : $lowerName;

@endphp
<select wire:model="{{$model}}" name="{{ $lowerName }}" class="py-3 px-4 pe-9 block w-full bg-slate-50 focus:bg-slate-50 border border-slate-300 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
    <option value="" {{ empty($selected) ? 'selected' : '' }}>{{ $valDefaultSelect }}</option>
    @foreach ($items as $item)
        <option value="{{ $item->key }}" {{ (!empty($selected) && $selected == $item->key) ? 'selected' : ''}}>{{ $item->val }}</option>
    @endforeach
</select>
