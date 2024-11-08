@props(['type', 'placeholder' => '...', 'name', 'class' => 'bg-slate-200 focus:bg-slate-200', 'form' => false])
@php
    $lowerName = strtolower($name);
    $model = $form ? 'form.'.$lowerName : $lowerName;
@endphp
<input type="{{ $type }}" wire:model="{{$model}}" placeholder="{{ $placeholder }}" name="{{ $lowerName }}" id="{{ $lowerName }}"
    class="{{ $class }} py-4 px-3 my-3 rounded-2xl focus:outline-none focus:ring-0 border-0 ">
