@inject('crypt', 'App\Utils\CryptUtils')
@props([
    'value'
])

@php
    $value = $crypt::enc($value);
@endphp
<div class="flex">
    <div class="flex flex-row gap-2">
        <x-columns.action-button color="red" action="delete('{{ $value }}')">DELETE</x-columns.action-button>
        <x-columns.action-link color="teal" href="{{ route('roles-edit', ['id' => $value]) }}">EDIT</x-columns.action-link>
    </div>
</div>
