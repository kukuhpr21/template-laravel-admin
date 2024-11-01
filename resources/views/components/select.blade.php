@props(['name', 'val_default_select' => '', 'selected' => '', 'items'])
@php
    $lowerName = strtolower($name);
    $valDefaultSelect = empty($val_default_select) ? 'Choose '.$name : $val_default_select;

@endphp
<select wire:model="form.{{$lowerName}}" name="{{ $lowerName }}" class="py-3 px-4 pe-9 block w-full bg-gray-100 border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
    <option value="" {{ empty($selected) ? 'selected' : '' }}>{{ $valDefaultSelect }}</option>
    @foreach ($items as $item)
        <option value="{{ $item->key }}" {{ (!empty($selected) && $selected == $item->key) ? 'selected' : ''}}>{{ $item->val }}</option>
    @endforeach
</select>
